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
        $mesas = $modelMesas->listaMesa();
        $this->view->disponivel = count($modelMesas->listMesaDisponivel());
        $this->view->ocupado = count($modelMesas->listMesaOcupada());
        
        $mesasObj = array();
        foreach ($mesas as $key => $value) {
            $aux =  $modelComandas->listaComandas($value->getNumeroMesa());
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
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }

}
