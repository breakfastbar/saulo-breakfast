<?php

class Despensa extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = "Despensa";
        $this->view->subTitulo = "Atualizar despensa";
    }
    
    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('despensa/index');
        $this->view->render('footer');

    }
    
}