<?php

class Pedido_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaPedidos($comanda) {
        return $this->db->select('SELECT ped.*, p.descricao FROM pedido ped inner join produto p on ped.produto = p.codProduto where comanda_codComanda = ' . $comanda);
    }

    public function listaPedidosObj($codComanda) {
        $modelProduto = new Produto_Model();
        $produtos = $modelProduto->listaProdutosObj($codComanda);
        $aPedidos = $this->db->select('SELECT * FROM pedido  WHERE comanda_codComanda = ' . $codComanda);

        $pedidos = array();

        foreach ($aPedidos as $key => $pedido) {
            foreach ($produtos as $keyPro => $produto) {
                if ($produto->getCodigo() == $pedido['produto']) {
                    $aux = new PedidoDOM($pedido['codPedido'], $pedido['quantidade'], $pedido['status'], $pedido['horaSolicitado'], $pedido['valor'], $pedido['produto'], $pedido['comanda_codComanda']);
                    array_push($pedidos, $aux);
                }
            }
        }
        return $pedidos;
    }

    public function categoriaSingleLista($codCategoria) {
        return $this->db->select('SELECT * FROM categoria WHERE codCategoria = :codCategoria', array(':codCategoria' => $codCategoria));
    }

    public function create($pedido) {
        $dadosPedido = array(
            'quantidade' => $pedido['quantidade'],
            'status' => P_PENDENTE,
            'valor' => $pedido['valor'],
            'comanda_codComanda' => $pedido['codComanda'],
            'produto' => $pedido['codigo']
        );
        $inseriu = $this->db->insert('pedido', $dadosPedido);
        if ($inseriu[0] == 00000) {
            $mensagem = array('tipo' => 'INFORMACAO', 'mensagem' => MSG036);
            echo json_encode($mensagem);
        } else {
            $mensagem = array('tipo' => 'ERRO', 'mensagem' => MSG037 . " - " . $inseriu[2]);
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
