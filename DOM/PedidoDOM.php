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
    private $status = 1;
    private $horaSolicitacao;
    private $valor;
    private $codigoProduto;
    


    /**
     * Construtor do Objeto Pedido.<br>
     * $p => objeto do tipo produto
     * $quantidade => parametro do tipo int, que indica a quantidade do produto no pedido
     *     
     */
    public function __construct(Produto $p, $quantidade) {
        $this->produto = $p;
        $this->quantidade = $quantidade;
        $this->horaSolicitacao = date('d-m-y H:i:s');
        $this->valor = $p->getValor();
        $this->codigoProduto = $p->getCodigo();
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
        return $this->Status;
    }

}
