<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Controle de mesas';
        $this->view->subTitulo = '';
    }

    function index() {
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }

}