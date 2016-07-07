<?php

class Setor_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaSetor() {
        return $this->db->select('SELECT * FROM setor');
    }
    
    public function listaSetorObj($codComanda) {
                $aSetor = $this->db->select("SELECT DISTINCT setor.* FROM setor setor, produto pd, pedido ped where setor.codSetor in (SELECT pd.setor_codSetor FROM produto pd, pedido ped where pd.codProduto = ped.produto and ped.comanda_codComanda =$codComanda)");
               
            $setor = array();
            foreach ($aSetor as $key => $value) {
                $aux = new SetorDOM($value['descricao'], $value['codSetor']);
                array_push($setor, $aux);
            }
            return $setor;
        
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
