<?php
class Produto_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaProduto() {
        return $this->db->select('SELECT * FROM produto');
    }

    public function produtoSingleLista($codProduto) {
        return $this->db->select('SELECT * FROM produto WHERE codProduto = :codProduto', array(':codProduto' => $codProduto));
    }

    public function novo($data) {
        $this->db->insert('produto', $data);
    }

    public function salvarEdicao($data) {
        
        $codProduto = $data['codProdutoEditar'];
        unset($data['codProdutoEditar']);

        $this->db->update('produto', $data, "codProduto = $codProduto");
    }

    public function deletar($codProduto) {
        $this->db->delete('produto', "codProduto = '$codProduto'");
    }

}
