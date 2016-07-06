<?php

class Comanda extends Controller {

    function __construct() {
        parent::__construct();          
        $this->view->subTitulo = '';
         $this->view->js = array('comanda/js/default.js');
    }

    public function index($mesa) {
        $this->view->comandas = $this->model->listaComandas($mesa);
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('comanda/index');
        $this->view->render('footer');
    }
    
    public function listMesa($mesa){
        $this->view->titulo = 'Mesa #'.$mesa;
        $this->view->mesa = $mesa;
        $this->view->comandas = $this->model->listaComandas($mesa);
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('comanda/index');
        $this->view->render('footer');
    }
    
    public function adicionarComanda(){
        $modelMesa = new Mesa_Model();
        $mesa = $modelMesa->selecionar($_POST['mesa']);
        $comanda = new ComandaDOM($mesa, null);
        $this->model->create($comanda);
    }

}