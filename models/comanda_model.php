<?php

class Comanda_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaComandas($mesa = null) {
        if ($mesa == null) {
            $acomandas = $this->db->select('SELECT * FROM comanda where status <> 2');
        } else {
            $acomandas = $this->db->select('SELECT * FROM comanda where status <> 2 and numeroMesa =' . $mesa);
        }
        
        $modelMesa = new Mesa_Model();
        $comandas = array();
        foreach ($acomandas as $value) {
            $mesa = $modelMesa->selecionar($value['numeroMesa']);
            $a = new ComandaDOM($mesa, $value['codComanda']);
            array_push($comandas, $a);
        }
        
        return $comandas;
    }

    public function categoriaSingleLista($codCategoria) {
        return $this->db->select('SELECT * FROM categoria WHERE codCategoria = :codCategoria', array(':codCategoria' => $codCategoria));
    }

    public function create($comanda) {
        $dados = array(
            'codComanda' => $comanda->getCodigo(),
            'status' => $comanda->getStatus(),
            'valorPago' => null,
            'observacao' => null,
            'criadaPor' => '094.261.816-52',
            'fechadaPor' => null,
            'numeroMesa' => $comanda->getMesa()->getNumeroMesa()
        );
        print_r($dados);
        $inseriu = $this->db->insert('comanda', $dados);
        if ($inseriu[0] == 00000) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG2);
            echo json_encode($mensagem);
        } else {
            $mensagem = array('tipo' => 'ERRO', 'mensagem' => $inseriu[2]);
            echo json_encode($mensagem);
        }
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
