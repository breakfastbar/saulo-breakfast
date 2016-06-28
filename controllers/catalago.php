<?php

class Catalago extends Controller {

    function __construct() {
        parent::__construct();
         $this->view->titulo = 'Catálogo';
        $this->view->subTitulo = 'Gerenciamento de produtos';
    }
    
    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('catalago/index');
        $this->view->render('footer');
    }
    
}