<?php

class Usuario_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function selecionar($cpf) {
        $aUsuarios = $this->db->select("select *, DATE_FORMAT(us.dataNascimento,'%m/%d/%Y') as dataNascimento from usuario us where cpf = :cpf", array(
            'cpf' => $cpf
        ));

        foreach ($aUsuarios as $value) {
            $a = new UsuarioDOM($value['cpf'], $value['nome'], $value['dataNascimento'], $value['usuarioSistema'], $value['senha'], $value['nivelAcesso'], $value['email'], $value['telefoneFixo'], $value['telefoneCelular'], $value['cep'], $value['numero'], $value['complemento'], $value['logradouro'], $value['cidade'], $value['estado'], $value['ativo']);
        }
        return $a;
    }

    public function getUsuarios() {
        $aUsuarios = $this->db->select('SELECT * FROM usuario');
        $usuarios = array();
        foreach ($aUsuarios as $value) {
            $a = new UsuarioDOM($value['cpf'], $value['nome'], $value['dataNascimento'], $value['usuarioSistema'], $value['senha'], $value['nivelAcesso'], $value['email'], $value['telefoneFixo'], $value['telefoneCelular'], $value['cep'], $value['numero'], $value['complemento'], $value['logradouro'], $value['cidade'], $value['estado'], $value['ativo']);
            array_push($usuarios, $a);
        }
        return $usuarios;
    }

    public function userSingleList(
    $userid) {
        return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }

    public function create($dados) {

        $alterSenha = array('senha' => Hash::create('sha256', $dados['senha'], HASH_PASSWORD_KEY));
        $dn = explode('/', $dados['dataNascimento']);
        $dnas = date('Y-m-d', mktime(0, 0, 0, $dn[1], $dn[0], $dn[2]));
        $aleterNas = array('dataNascimento' => $dnas);
        $dado1 = array_replace($dados, $aleterNas);
        $dado2 = array_replace($dado1, $alterSenha);
        $dado2['ativo'] = true;
        unset($dado2['confirmeSenha']);
        $inseriu = $this->db->insert('usuario', $dado2);
        if ($inseriu[0] == 00000) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG2);
            echo json_encode($mensagem);
        } else {
            $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG3);
            echo json_encode($mensagem);
        }
    }

    public function editSave($data) {
        $dn = explode('/', $data['dataNascimento']);
        $dnas = date('Y-m-d', mktime(0, 0, 0, $dn[1], $dn[0], $dn[2]));
        $aleterNas = array('dataNascimento' => $dnas);
        $dado1 = array_replace($data, $aleterNas);
        unset($dado1['cpf']);
        $atualizou = $this->db->update('usuario', $dado1, "`cpf` = '".$data['cpf']."'");
        
        if ($atualizou[0] == 00000) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG016);
            echo json_encode($mensagem);
        } else {
            $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG017);
            echo json_encode($mensagem);
        }
    }

    public function delete($cpf) {
        $delete = $this->db->delete('usuario', "cpf = '$cpf'");
        if ($delete) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG4);
            echo json_encode($mensagem);
        }
    }

}
