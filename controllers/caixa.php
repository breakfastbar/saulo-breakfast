<?php

class Caixa extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->titulo = 'Caixa';
        $this->view->subTitulo = 'Gerenciar caixa';
        $this->view->js = array('caixa/js/default.js');
    }

    function index() {
        $modelMesas = new Mesa_Model();
        $modelComandas = new Comanda_Model();
        $mesas = $modelMesas->listaMesa();

        
        $this->view->disponivel = count($modelMesas->listMesaDisponivel());
        $this->view->ocupado = count($modelMesas->listMesaOcupada());
        
        
        $mesasObj = array();
        foreach ($mesas as $key => $value) {
            $aux = $modelComandas->listaComandas($value->getNumeroMesa());
            $comandas = array();
            foreach ($aux as $keya => $c) {
                $comanda = $modelComandas->comandaSingleObj($c->getCodigo());
                array_push($comandas, $comanda);
            }
            $x = array(
                'mesa' => $mesas[$key],
                'comandas' => $comandas
            );
            array_push($mesasObj, $x);
        }



        $this->view->mesas = $mesasObj;
        $this->view->comandas = $modelComandas->listaComandas();
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('caixa/index');
        $this->view->render('footer');
    }

    function listPedidos($comanda) {
        $modelComanda = new Comanda_Model();
        $modelPedido = new Pedido_Model();
        //$this->view->comanda = $comanda;    
        $this->view->comanda = $modelComanda->comandaSingleObj($comanda);
        $this->view->pedidos = $modelPedido->listaPedidos($comanda);

        $this->view->titulo = 'Caixa';
        $this->view->subTitulo = 'Comanda #'.$comanda;


        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('caixa/listPedido');
        $this->view->render('footer');
    }

    public function listMesa($mesa) {
        $modelCamanda = new Comanda_Model();
        $this->view->titulo = 'Mesa #' . $mesa;
        $this->view->mesa = $mesa;
        $comandas = $modelCamanda->listaComandas($mesa);
        $comandasObj = array();
        foreach ($comandas as $c) {
            $aux = $modelCamanda->comandaSingleObj($c->getCodigo());
            array_push($comandasObj, $aux);
        }
        $this->view->titulo = 'Caixa';
        $this->view->subTitulo = 'Gerenciar caixa';


        $this->view->comandas = $comandasObj;
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('caixa/listMesa');
        $this->view->render('footer');
    }
    
    public function fecharComanda($comanda){
        $modelCamanda = new Comanda_Model();
        $comanda = $modelCamanda->comandaSingleObj($comanda);
        $comanda->fecharComanda($_POST['valorPago']);
        $modelCamanda->fecharComanda($comanda);
        header('Location:'.URL."caixa");
        }

}
