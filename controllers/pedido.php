<?php

class Pedido extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Pedido #001';
        $this->view->subTitulo = '';
        $this->view->js = array('pedido/js/default.js');
    }

    function listPedidos($comanda) {
        $modelComanda = new Comanda_Model();
        //$this->view->comanda = $comanda;    
        $this->view->comanda = $modelComanda->comandaSingleObj($comanda);
        $this->view->pedidos = $this->model->listaPedidos($comanda);
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('pedido/index');
        $this->view->render('footer');
    }

    public function addPedido() {
//        $modelProduto = new Produto_Model();
//        $modelComanda = new Comanda_Model();
//        $produto = $modelProduto->produtoSingleObj($_POST['codigo']);
//        $comanda = $modelComanda->comandaSingleObj($_POST['codComanda']);
//        $pedido = new PedidoDOM($produto, $comanda, $_POST['quantidade']);
       $this->model->create($_POST);
    }

}
