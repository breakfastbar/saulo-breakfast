<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mesa
 *
 * @author 08714567610
 */
class MesaDOM {
    private $numeroMesa;
    private $status;
    private $ativo = true;
    
    /**
     * Construtor do Objeto Mesa, lembrando que o ativo é um boolean por isso não construi.    
     */
    public function __construct($numeroMesa = null, $status = null) {
        $this->numeroMesa = $numeroMesa;
        $this->status = $status;
    }
    
    /**
     * Retorna o numero da mesa
     */
    public function getNumeroMesa(){
        return $this->numeroMesa;
    }
    
    /**
     * Retorna o status da mesa
     */
    public function getStatus(){
        return $this->status;
    }
    
    function getAtivo() {
        return $this->ativo;
    }


    
    
    

}
