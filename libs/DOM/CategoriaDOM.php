<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author 08714567610
 */
class CategoriaDOM {
    private $codigo;
    private $descricao;
    private $ativo = true;
    
    /**
     * Construtor da Categoria
     */
    public function __construct($descricao,  $codigo = null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }

    /**
     * Retorna a descricao da Categoria
     */
    public function getDescricao(){
        return $this->descricao;
    }
    
    /**
     * Retorna o codigo da Categoria
     */
    function getCodigo() {
        return $this->codigo;
    }



}
