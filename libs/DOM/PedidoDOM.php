<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author 08714567610
 */


class PedidoDOM {

    private $codigo;
    private $quantidade;
    private $status;
    private $horaSolicitacao;
    private $valor;
    private $produto;
    
    private $comanda;

    /**
     * Construtor do Objeto Pedido.<br>
     * $p => objeto do tipo produto
     * $quantidade => parametro do tipo int, que indica a quantidade do produto no pedido
     *     
     */
    function __construct($codigo = null, $quantidade = null, $status = null, $horaSolicitacao = null, $valor = null, $produto = null, $comanda = null) {
        $this->codigo = $codigo;
        $this->quantidade = $quantidade;
        $this->status = $status;
        $this->horaSolicitacao = $horaSolicitacao;
        $this->valor = $valor;
        $this->produto = $produto;
        $this->comanda = $comanda;
    }

    public function sa(ProdutoDOM $p,$comanda, $quantidade) {
        $this->produto = $p;
        $this->quantidade = $quantidade;
        $this->horaSolicitacao = date('d-m-y H:i:s');
        $this->valor = $p->getValor();
        $this->codigoProduto = $p->getCodigo();
        $this->comanda = $comanda;
    }
    
    /**
     * Cancelar pedido<br>
     */
    public function cancelarPedido() {
        if($this->status == P_PENDENTE){
            $this->status = P_CANCELADO;
        }else{
            $mensagem = array('tipo'=>'ERRO',MSG031);
            echo json_encode($mensagem);
        }
    }

    /**
     * Valor do pedido<br>
     */
    public function getValorTotal() {
        $valorTotal = $this->valor * $this->quantidade;
        return $valorTotal;
    }

    /**
     * 
     * @return o Produto do pedido
     */
    function getProduto() {
        return $this->produto;
    }

    /**
     * Retorna o codigo do pedido   
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Retorna a quantidade do pedido   
     */
    public function getQuantidade() {
        return $this->quantidade;
    }

    /**
     * Retorna a hora solicitada do pedido   
     */
    public function getHoraSolicitacao() {
        return $this->horaSolicitacao;
    }

    /**
     * Retorna o valor do produto no determinado pedido<br>
     *    
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * Retorna um inteiro que corresponde o status do pedido<br>   
     */
    public function getStatus() {
        return $this->status;
    }
    
    function getCodigoProduto() {
        return $this->codigoProduto;
    }

    function getComanda() {
        return $this->comanda;
    }



}
