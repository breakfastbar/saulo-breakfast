<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author user
 */

class UsuarioDOM {

    private $cpf;
    private $nome;
    private $dataNascimento;
    private $usuarioSistema;
    private $senha;
    private $nivelAcesso;
    private $email;
    private $telefoneFixo;
    private $telefoneCelular;
    private $cep;
    private $bairro;
    private $numero;
    private $complemento;
    private $logradouro;
    private $cidade;
    private $estado;
    private $ativo = true;

    /**
     * Construtor da Classe Usuario com todos seus atributos, chamando a Classe Contato.
     *
     *      
     */
    public function __construct($cpf = null, $nome = null, $dataNascimento = null, $usuarioSistema = null, $senha = null, $nivelAcesso = null, $email = null, $telefoneFixo = null, $telefoneCelular = null, $cep = null, $numero = null , $complemento = null, $logradouro = null, $cidade = null, $estado = null) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->usuarioSistema = $usuarioSistema;
        $this->senha = $senha;
        $this->nivelAcesso = $nivelAcesso;
        $this->email = $email;
        $this->telefoneFixo = $telefoneFixo;
        $this->telefoneCelular = $telefoneCelular;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    /**
     * Calcula Idade do usuário atraves da sua data de nascimento com a data atual      
     */
    public function calculaIdade() {
        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $this->dataNascimento);
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
        // Depois apenas fazemos o cálculo já citado
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
    }

    /**
     * Fecha uma comanda por vez      
     */
    public function fechaComanda(Comanda $c,Double $valorPago) {
        $c->fecharComanda($valorPago);
    }

    /**
     * Abrir uma comanda      
     */
    public function abreComanda(int $numeroMesa) {
        
    }

    /**
     * Fechar todas as comandas da Mesa       
     */
    public function fechaMesa(Mesa $m) {
        $numeroMesa = $m->getNumeroMesa();
        $valorMesa;
        for ($i = 0; $i < $numeroMesa; $i++) {
            $valorMesa; //= $this->fechaComanda();
        }
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getUsuarioSistema() {
        return $this->usuarioSistema;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefoneFixo() {
        return $this->telefoneFixo;
    }

    function getTelefoneCelular() {
        return $this->telefoneCelular;
    }

    function getCep() {
        return $this->cep;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getAtivo() {
        return $this->ativo;
    }
    
    function getBairro() {
        return $this->bairro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }

        
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setUsuarioSistema($usuarioSistema) {
        $this->usuarioSistema = $usuarioSistema;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivelAcesso($nivelAcesso) {
        $this->nivelAcesso = $nivelAcesso;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefoneFixo($telefoneFixo) {
        $this->telefoneFixo = $telefoneFixo;
    }

    function setTelefoneCelular($telefoneCelular) {
        $this->telefoneCelular = $telefoneCelular;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

}
