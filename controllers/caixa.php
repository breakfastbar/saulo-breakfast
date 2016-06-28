<?php

class Caixa extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Caixa';
        $this->view->subTitulo = 'Gerenciar caixa';
    }

    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('caixa/index');
        $this->view->render('footer');
    }

}
