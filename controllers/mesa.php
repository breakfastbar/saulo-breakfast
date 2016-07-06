    <?php

class Mesa extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->titulo = 'Mesa';
        $this->view->subTitulo = 'Gerenciar mesas';
        $this->view->js = array('mesa/js/default.js');
    }

    public function index() {
        $this->view->listaMesa = $this->model->listaMesa();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('mesa/index');
        $this->view->render('footer');
    }

    public function addEdit($numeroMesa = null) {
        if ($numeroMesa == null) {
            $this->view->mesa = new MesaDOM();
            $this->view->acao = 'criar';
            $this->view->subTitulo = 'Adicionar nova mesa';
        } else {
            $this->view->mesa = $this->model->selecionar($numeroMesa);
            $this->view->acao = 'editar';
            $this->view->subTitulo = 'Editar mesa';
        }

        $this->view->render('header');
        $this->view->render('mesa/addEdit');
        $this->view->render('footer');
    }

    public function addMesa() {
        $data = array();
        $data['numeroMesa'] = $_POST['numeroMesa'];
        $mesa = new MesaDOM($_POST['numeroMesa'], M_DISPONIVEL);
        $this->model->create($mesa);
    }

    public function editMesa() {
        echo $this->model->editSave($_POST);
    }

    public function salvarEdicao($numeroMesa) {
        $data = array();
        $data['numeroMesa'] = $numeroMesa;
        $data['numeroMesaNovo'] = $_POST['numeroMesa'];

        // @TODO: Do your error checking!

        $this->model->salvarEdicao($data);
        header('location: ' . URL . 'mesa');
    }

    public function deletar() {
        $numeroMesa = $_POST['numeroMesa'];
        $this->model->deletar($numeroMesa);
    }

}
