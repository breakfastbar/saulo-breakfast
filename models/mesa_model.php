<?php

class Mesa_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaMesa() {
        $aMesas = $this->db->select('SELECT * FROM mesa ');
        $mesas = array();
        foreach ($aMesas as $value) {
            $a = new MesaDOM($value['numeroMesa'], $value['status']);
            array_push($mesas, $a);
        }
        return $mesas;
    }

    public function selecionar($numeroMesa) {
        $aMesa = $this->db->select('SELECT * FROM mesa WHERE numeroMesa = ' . $numeroMesa);
        return new MesaDOM($aMesa[0]['numeroMesa'], $aMesa[0]['status']);
    }

    public function create($mesa) {
        $inseriu = $this->db->insert('mesa', array(
            'numeroMesa' => $mesa->getNumeroMesa(),
            'status' => $mesa->getStatus(),
            'ativo' => $mesa->getAtivo()
        ));
        if ($inseriu[0] == 00000) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG2);
            echo json_encode($mensagem);
        } else {
            if ($inseriu[0] != 23000) {
                $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG033);
                echo json_encode($mensagem);
            } else {
                $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG033 . " - " . $inseriu[2]);
                echo json_encode($mensagem);
            }
        }
    }

    public function deletar($numeroMesa) {
        $numComanda = $this->db->select('SELECT count(*) FROM comanda WHERE numeroMesa =' . $numeroMesa);
        if ($numComanda == 0) {
            $delete = $this->db->delete('mesa', "numeroMesa = '$numeroMesa'");
            if ($delete) {
                $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG4);
                echo json_encode($mensagem);
            }
        }
    }

}
