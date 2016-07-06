<?php
class Mesa extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->titulo = 'Mesa';
        $this->view->subTitulo = 'Gerenciar mesas';
    }
    
    public function index(){   
        $this->view->listaMesa = $this->model->listaMesa();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('mesa/index');
        $this->view->render('footer');
    }
    
    public function novo(){
        $data = array();
        $data['numeroMesa'] = $_POST['numeroMesa'];
        $this->model->novo($data);
        header('location: ' . URL . 'mesa');
    }
    
    public function editar($numeroMesa){
        $this->view->mesaSingleLista = $this->model->mesaSingleLista($numeroMesa);
        $this->view->render('mesa/editar');
    }
    
    public function salvarEdicao($numeroMesa)
    {
        $data = array();
        $data['numeroMesa'] = $numeroMesa;
        $data['numeroMesaNovo'] = $_POST['numeroMesa'];
        
        // @TODO: Do your error checking!
        
        $this->model->salvarEdicao($data);
        header('location: ' . URL . 'mesa');
    }
    
    public function deletar($numeroMesa)
    {
        $this->model->deletar($numeroMesa);
        header('location: ' . URL . 'mesa');
    }
}