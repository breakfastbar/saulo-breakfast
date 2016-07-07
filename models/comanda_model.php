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

    public function categoriaSingleLista($codComanda) {
        return $this->db->select('SELECT * FROM comanda WHERE codComanda = :codComanda', array(':codComanda' => $codComanda));
    }

    /**
     * 
     * @param type $codComanda
     * @return \ComandaDOM
     */
    public function comandaSingleObj($codComanda) {
        $modelPedido = new Pedido_Model();
        $pedidos = $modelPedido->listaPedidosObj($codComanda);

        $modelMesa = new Mesa_Model();

        $acomanda = $this->db->select('SELECT * FROM comanda WHERE codComanda = :codComanda', array(':codComanda' => $codComanda));
        $acomanda = $acomanda[0];
        $mesa = $modelMesa->selecionar($acomanda['numeroMesa']);

        $comanda = new ComandaDOM($mesa, $acomanda['codComanda'], $acomanda['status'], $acomanda['valorPago'], $acomanda['observacao'], $acomanda['criadaPor'], $acomanda['fechadaPor']);
        foreach ($pedidos as $key => $pedido) {
            $comanda->addPedidoPronto($pedido);
        }


        return $comanda;



        //$comanda = new ComandaDOM($acomanda['numeroMesa'], $acomanda['codComanda']);
        //return $comanda;
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

    public function fecharComanda($comanda) {

       
        $postData = array(
            'valorPago' => $comanda->getValorPago(),
            'observacao' => $comanda->getObservacao(),
            'status' => $comanda->getStatus()
        );
        $codComanda = $comanda->getCodigo();
        $atualizou = $this->db->update('comanda', $postData, "codComanda = " . $codComanda);
        $mesaOcupada = $this->db->select('SELECT * FROM comanda where numeroMesa =' . $comanda->getMesa()->getNumeroMesa() . ' and status = 1');
        if(count($mesaOcupada) == 0){        
        $dadosMesa = array(
            'status' => M_DISPONIVEL
        );
        $this->db->update('mesa', $dadosMesa, "numeroMesa = " . $comanda->getMesa()->getNumeroMesa());
        }
        
    }

}
