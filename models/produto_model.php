<?php
class Produto_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listaProduto() {
        return $this->db->select('SELECT * FROM produto');
    }
    
    public function listaProdutosObj($codComanda) {
        $modelSetor = new Setor_Model();
        $setores = $modelSetor->listaSetorObj($codComanda);
        $modelCategoria = new Categoria_Model();
        $categorias = $modelCategoria->listaCategoriaObj($codComanda);
        
        $aProdutos = $this->db->select('SELECT pd.* FROM produto pd, pedido ped where pd.codProduto = ped.produto and ped.comanda_codComanda = '.$codComanda);
        $produtos = array();
        foreach ($aProdutos as $keyP => $p) {
            foreach ($setores as $keyS => $setor) {
                if($setor->getCodSetor() == $p['setor_codSetor']){
                    foreach ($categorias as $key => $categoria) {
                        if($categoria->getCodigo() == $p['categoria_codCategoria']){
                           $aux = new ProdutoDOM($p['descricao'], $p['valor'], $p['preProduzido'], $setor, $categoria, $p['codProduto']);
                           array_push($produtos, $aux);
                        }
                    }
                }
            }
          
        }
        return $produtos;
    }

    public function produtoSingleArray($codProduto) {
        $aproduto =  $this->db->select('SELECT * FROM produto WHERE codProduto = :codProduto', array(':codProduto' => $codProduto));
        return $aproduto;
    }
    
      public function produtoSingleObj($codProduto) {
        $aproduto =  $this->db->select('SELECT * FROM produto WHERE codProduto = :codProduto', array(':codProduto' => $codProduto));
        $aproduto = $aproduto[0];
        $produto = new ProdutoDOM($aproduto['descricao'], $aproduto['valor'], $aproduto['preProduzido'], $aproduto['setor_codSetor'], $aproduto['categoria_codCategoria'], $aproduto['codProduto']);
        return $produto;
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
