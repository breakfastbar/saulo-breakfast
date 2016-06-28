<?php

class Comanda extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Mesa #001';
        $this->view->subTitulo = '';
    }

    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('comanda/index');
        $this->view->render('footer');
    }

}