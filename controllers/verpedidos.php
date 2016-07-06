<?php

class Verpedidos extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = "Ver pedido";
        $this->view->subTitulo = "Consultar pedido";
    }
    
    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('verpedidos/index');
        $this->view->render('footer');

    }
    
}