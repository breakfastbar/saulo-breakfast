<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author 08714567610
 */
class ProdutoDOM {
    
    private $codigo;
    private $descricao;
    private $valor;
    private $preProduzido;
    private $ativo = true;
    
    //Variavel de associação
    private $setor;
    private $categoria;
    
    /**
     * Construtor do Objeto Produto<br>
     * $codigo inteiro<br>
     * $descricao string<br>
     * $valor double<br>
     * $preProduzido boolean<br>
     * $setor objeto do tipo setor<br>
     */
    public function __construct($descricao, $valor, $preProduzido, $setor, $categoria, $codigo = null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->preProduzido = $preProduzido;
        $this->setor = $setor;
        $this->categoria = $categoria;
    }
    /**
     * Retorna a descriçao do produto
     */    
    public function getDescricao(){
        return $this->descricao;
    }
    /**
     * Retorna a Valor do produto
     */    
    public function getValor(){
        return $this->valor;
    }
    /**
     * Retorna a descriçao do produto
     */    
    public function getPreProduzido(){
        return $this->preProduzido;
    }
    /**
     * Retorna o codigo do produto
     */
    public function getCodigo(){
        return $this->codigo;
    }
    /**
     * Retorna o setor de atendimento
     */
    function getSetor() {
        return $this->setor;
    }
    
    /**
     * Retorna a categoria do produto
     */
    function getCategoria() {
        return $this->categoria;
    }
    
}

