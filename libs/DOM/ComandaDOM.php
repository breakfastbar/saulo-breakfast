<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comanda
 *
 * @author 08714567610
 */
require_once('barcode.inc.php');

class ComandaDOM extends Exception {

    private $codigo;
    private $status = C_ABERTA;
    private $valorPago;
    private $observacao;

    /**
     * Atributos de associação
     */
    private $pedidos = array();
    private $mesa;
    private $criadaPor;
    private $fechadaPor;

    /**
     * Construtor do Objeto Comanda 
     * <p>Constroi um objeto do tipo comanda, gerando o codigo da comanda atomatico com seu codigo de barra </p><br> 
     * $mesa => objeto do tipo Mesa <br>   
     */
    function __construct(MesaDOM $mesa, $codigo = null, $status = C_ABERTA, $valorPago = null, $observacao = null, $criadaPor = null, $fechadaPor = null) {
        
        $this->status = $status;
        $this->valorPago = $valorPago;
        $this->observacao = $observacao;
        $this->mesa = $mesa;
        $this->criadaPor = $criadaPor;
        $this->fechadaPor = $fechadaPor;
        if ($codigo == null) {
            $this->codigo = $this->gerarCodigo();
            //new barCodeGenrator($this->codigo, 1, 'codeBarra/' . $this->codigo . '.png');        
        } else {
            $this->codigo = $codigo;
        }
    }

    /**
     * 
     * Gera o codigo da comanda
     */
    private function gerarCodigo() {
        date_default_timezone_set('America/Sao_Paulo');
        $codigo = date('YmdHis');
        $codigo .= $this->mesa->getNumeroMesa();
        return $codigo;
    }

    function getCodigo() {
        return $this->codigo;
    }

    /**
     * Calcula o valor total da comanda, e retornar seu valor.<br>
     * 
     * 
     */
    public function getValorTotal() {
        $valorTotal = 0;
        foreach ($this->pedidos as $pedido) {
            $valorTotal += $pedido->getValorTotal();
        }
        return $valorTotal;
    }
    
    public function addPedidoPronto($pedido){
        if(array_push($this->pedidos, $pedido)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Calcula o valor total da pedidos , e retornar seu valor.<br>
     * 
     * 
     */
    public function getNumeroPedidos() {
        return count($this->pedidos);
    }

    /**
     * Adiciona o um produto a lista de pedido<br>  
     * $p => objeto do tipo Produto <br>
     * $quantidade => quantidade do respectivo produto no pedido<br>
     */
    public function addPedido(Produto $p, $quantidade) {//olhar a quantidade
        $pedidoTemp = new Pedido($p, $quantidade);
        array_push($this->pedidos, $pedidoTemp);
    }

    /**
     * Remove o pedido passado como parametro.<br> 
     * $p => Objeto do tipo Pedido<br>
     */
    public function removePedido(Pedido $p) {
        $numremove = $p->getCodPedido();
        foreach ($this->pedidos as $key => $pedido) {
            if ($numremove == $pedido->getCodPedido()) {
                unset($this->pedidos[$key]);
                $this->pedidos = array_values($this->pedidos);
                break;
            }
        }
    }

    /**
     * 
     * Retorna array de pedidos <br>  
     */
    function getPedidos() {
        return $this->pedidos;
    }

    /**
     * Retorna quantidade de produtos dentro da comanda <br>  
     * $p = null --> Retorna a numero total de produtos da comanda, independente da descriçao.<br>  
     * Caso contrario faça --> Retorna quantidade de prodtudos de acordo com o parametro passado.<br>  
     */
    public function getNumeroProdutos(Produto $p = null) {
        $numeroProduto = 0;
        if ($p == null) {
            foreach ($this->pedidos as $pedido) {
                $numeroProduto += $pedido->getQuantidade();
            }
        } else {
            $numremove = $p->getDescricao();
            foreach ($this->pedidos as $key => $pedido) {
                if ($numremove == $pedido->getProduto()->getDescricao()) {
                    $numeroProduto += $pedido->getQuantidade();
                }
            }
        }
        return $numeroProduto;
    }

    /**
     * Retorna o objeto Mesa
     */
    function getMesa() {
        return $this->mesa;
    }

    /**
     * Realiza o fechamento comanda alterando status e demais informações de fechamento
     * 
     */
    public function fecharComanda($valorPago) {
        if ($this->status == C_ABERTA) {
            $this->valorPago = $valorPago;
            if ($valorPago == 0) {
                $this->observacao = "Comanda fechada sem pagamento";
            } else {
                if ($valorPago == $this->getValorTotal()) {
                    $this->observacao = "Comanda fechada com o pagamento integral";
                } else {
                    $this->observacao = "Comanda fechada com o pagamento parcial";
                }
            }
            $this->status = C_FECHADA;
        } else {
            throw new Exception("A comanda em questão já foi fechada");
        }
    }

    function getStatus() {
        return $this->status;
    }

    function getValorPago() {
        return $this->valorPago;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getCriadaPor() {
        return $this->criadaPor;
    }

    function getFechadaPor() {
        return $this->fechadaPor;
    }

}
