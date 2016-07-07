<?php
class Categoria_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaCategoria() {
        return $this->db->select('SELECT * FROM categoria');
    }

    public function categoriaSingleLista($codCategoria) {
        return $this->db->select('SELECT * FROM categoria WHERE codCategoria = :codCategoria', array(':codCategoria' => $codCategoria));
    }

    public function novo($data) {
        $this->db->insert('categoria', array(
            'descricao' => $data['descricao']
        ));
    }

    public function salvarEdicao($data) {
        $postData = array(
            'descricao' => $data['descricao']
        );

        $this->db->update('categoria', $postData, "codCategoria = {$data['codCategoria']}");
    }

    public function deletar($codCategoria) {
        $this->db->delete('categoria', "codCategoria = '$codCategoria'");
    }

}
