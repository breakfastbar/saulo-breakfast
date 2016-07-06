<?php

class Dashboard extends Controller {
    
    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->titulo = 'Controle de mesas';
        $this->view->subTitulo = '';
    }

    function index() {
        Session::init();
        if(Session::get('loggedIn') == false){
            header('location:login');
        }
        $this->view->render('header');
        $this->view->render('navbar');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }
       function logout()
    {
        Session::destroy();
        header('location: ../login');
        exit;
    }     
    
}