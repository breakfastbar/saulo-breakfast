<?php

class Usuario extends Controller {

    public function __construct() {
        parent::__construct();
        //Auth::handleLogin();
        $this->view->titulo = 'Usuário(s)';
        $this->view->subTitulo = 'Gerenciamento de usuário(s)';
        $this->view->js = array('usuario/js/default.js');
    }

    public function index() {
        $this->view->usuarios = $this->model->getUsuarios();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('usuario/index');
        $this->view->render('footer');
    }

    public function create() {
        $this->model->create();
    }

    public function addUsuario() {
        if ($_POST['senha'] == $_POST['confirmeSenha']) {
            $this->model->create($_POST);
        } else {
            $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG1);
            echo json_encode($mensagem);
        }
    }

    public function deletar() {
        $cpf = $_POST['cpf'];
        $this->model->delete($cpf);
    }

    public function selecionar($cpf) {
        print_r($this->model->selecionar($cpf));
    }

}
