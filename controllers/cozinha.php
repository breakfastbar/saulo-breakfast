<?php

class Cozinha extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = "Cozinha";
        $this->view->subTitulo = "Gerenciar pedido";
    }
    
    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('cozinha/index');
        $this->view->render('footer');

    }
    
}