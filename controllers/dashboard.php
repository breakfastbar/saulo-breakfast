<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Controle de mesas';
        $this->view->subTitulo = '';
    }

    function index() {
        $modelMesas = new Mesa_Model();
        $modelComandas = new Comanda_Model();
        $this->view->mesas = $modelMesas->listaMesa();
        $this->view->comandas = $modelComandas->listaComandas();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }

}