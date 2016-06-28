<?php

require_once 'models/categoria_model.php'; 
require_once 'models/setor_model.php';

class Produto extends Controller {

   public function __construct() {
        parent::__construct();
        $this->view->titulo = 'Produto';
        $this->view->subTitulo = 'Gerenciar produtos';
    }

    public function index() {
        $this->view->listaProduto = $this->model->listaProduto();
        $categoriaModel = new Categoria_Model();
        $this->view->categoriaModel = $categoriaModel->listaCategoria();
        $this->view->listaCategoria = $categoriaModel->listaCategoria();
        $setorModel = new Setor_Model();
        $this->view->listaSetor = $setorModel->listaSetor();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('produto/index');
        $this->view->render('footer');
    }

    public function novo() {
        $data = array();
        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }
        $this->model->novo($data);
        header('location: ' . URL . 'produto');
    }

    public function editar($codProduto) {
        $categoriaModel = new Categoria_Model();
        $this->view->listaCategoria = $categoriaModel->listaCategoria();
        $setorModel = new Setor_Model();
        $this->view->listaSetor = $setorModel->listaSetor();
        $this->view->produtoSingleLista = $this->model->produtoSingleLista($codProduto);
        $this->view->render('produto/editar');
    }

    public function salvarEdicao($codProduto) {
        $data = array();
        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }
        $data['codProdutoEditar'] = $codProduto;

        $this->model->salvarEdicao($data);
        header('location: ' . URL . 'produto');
    }

    public function deletar($codProduto) {
        $this->model->deletar($codProduto);
        header('location: ' . URL . 'produto');
    }

}
