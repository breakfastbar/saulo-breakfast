<?php
class Categoria extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->titulo = 'Categoria';
        $this->view->subTitulo = 'Gerenciar categorias';
    }
    
    public function index(){   
        $this->view->listaCategoria = $this->model->listaCategoria();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('categoria/index');
        $this->view->render('footer');
    }
    
    public function novo(){
        $data = array();
        $data['descricao'] = $_POST['descricao'];
        $this->model->novo($data);
        header('location: ' . URL . 'categoria');
    }
    
    public function editar($codCategoria){
        $this->view->categoriaSingleLista = $this->model->categoriaSingleLista($codCategoria);
        $this->view->render('categoria/editar');
    }
    
    public function salvarEdicao($codCategoria)
    {
        $data = array();
        $data['codCategoria'] = $codCategoria;
        $data['descricao'] = $_POST['descricao'];
        
        // @TODO: Do your error checking!
        
        $this->model->salvarEdicao($data);
        header('location: ' . URL . 'categoria');
    }
    
    public function deletar($codCategoria)
    {
        $this->model->deletar($codCategoria);
        header('location: ' . URL . 'categoria');
    }
}