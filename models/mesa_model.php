<?php

class Mesa_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaMesa() {
        return $this->db->select('SELECT * FROM mesa');
    }

    public function mesaSingleLista($numeroMesa) {
        return $this->db->select('SELECT * FROM mesa WHERE numeroMesa = :numeroMesa', array(':numeroMesa' => $numeroMesa));
    }

    public function novo($data) {
        $this->db->insert('mesa', array(
            'numeroMesa' => $data['numeroMesa']
        ));
    }

    public function salvarEdicao($data) {
        $postData = array(
            'numeroMesa' => $data['numeroMesaNovo']
        );

        $this->db->update('mesa', $postData, "numeroMesa = {$data['numeroMesa']}");
    }

    public function deletar($numeroMesa) {
        $this->db->delete('mesa', "numeroMesa = '$numeroMesa'");
    }

}
