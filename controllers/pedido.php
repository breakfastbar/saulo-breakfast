<?php

class Pedido extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Pedido #001';
        $this->view->subTitulo = '';
        $this->view->js = array('pedido/js/default.js');
    }

    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('pedido/index');
        $this->view->render('footer');
    }

}