<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setor
 *
 * @author 08714567610
 */
class SetorDOM {
    private $codigo;
    private $descricao;
    private $ativo = true;
    
    /**
     * Construtor do Setor
     * $descricao String<br>
     */
    public function __construct($descricao, $codigo = null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }
    /**
     * Retorna o codigo do setor
     */
    public function getCodSetor(){
        return $this->codigo;
    }
    /**
     * Retorna a descricao do setor
     */
    public function getDescricao(){
        return $this->descricao;
    }
}
