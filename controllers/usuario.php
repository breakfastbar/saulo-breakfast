<?php

class Usuario extends Controller {

    private $usuario;

    public function __construct() {
        parent::__construct();
        //Auth::handleLogin();
        $this->view->titulo = 'Gerenciamento de usuário';
        $this->view->subTitulo = null;
        $this->view->js = array('usuario/js/default.js');
    }

    public function index() {
        $this->view->usuarios = $this->model->getUsuarios();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('usuario/index');
        $this->view->render('footer');
    }

    public function addEdit($cpf = null) {
        if ($cpf == null) {
            $this->view->usuario = new UsuarioDOM();
            $this->view->acao = 'criar';
            $this->view->subTitulo = 'Adicionar novo usuário';
        } else {
            $this->usuario = $this->model->selecionar($cpf);
            $this->view->usuario = $this->usuario;
            $this->view->acao = 'editar';
            $this->view->subTitulo = 'Editar usuário';
        }

        $this->view->render('header');
        $this->view->render('navbar');        
        $this->view->render('usuario/addEdit');
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

    public function editUsuario() {
       echo $this->model->editSave($_POST);
    }

    public function deletar() {
        $cpf = $_POST['cpf'];
        $this->model->delete($cpf);
    }

    public function selecionar($cpf) {
        print_r($this->model->selecionar($cpf));
    }

}
