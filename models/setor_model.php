<?php

class Setor_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaSetor() {
        return $this->db->select('SELECT * FROM setor');
    }

    public function setorSingleLista($codSetor) {
        return $this->db->select('SELECT * FROM setor WHERE codSetor = :codSetor', array(':codSetor' => $codSetor));
    }

    public function novo($data) {
        $this->db->insert('setor', array(
            'descricao' => $data['descricao']
        ));
    }

    public function salvarEdicao($data) {
        $postData = array(
            'descricao' => $data['descricao']
        );

        $this->db->update('setor', $postData, "codSetor = {$data['codSetor']}");
    }

    public function deletar($codSetor) {
        $this->db->delete('setor', "codSetor = '$codSetor'");
    }

}
