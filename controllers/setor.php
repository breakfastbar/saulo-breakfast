<?php
class Setor extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->titulo = 'Setor';
        $this->view->subTitulo = 'Gerenciar setor';
    }
    
    public function index(){   
        $this->view->listaSetor = $this->model->listaSetor();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('setor/index');
        $this->view->render('footer');
    }
    
    public function novo(){
        $data = array();
        $data['descricao'] = $_POST['descricao'];
        $this->model->novo($data);
        header('location: ' . URL . 'setor');
    }
    
    public function editar($codSetor){
        $this->view->setorSingleLista = $this->model->setorSingleLista($codSetor);
        $this->view->render('setor/editar');
    }
    
    public function salvarEdicao($codSetor)
    {
        $data = array();
        $data['codSetor'] = $codSetor;
        $data['descricao'] = $_POST['descricao'];
        
        // @TODO: Do your error checking!
        
        $this->model->salvarEdicao($data);
        header('location: ' . URL . 'setor');
    }
    
    public function deletar($codSetor)
    {
        $this->model->deletar($codSetor);
        header('location: ' . URL . 'setor');
    }
}