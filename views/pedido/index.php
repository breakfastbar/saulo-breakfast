<div id="page-wrapper">
    <!--    Painel de informações-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">                
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?></small></h1>                
            </div>
            <div class="row">
                <div class="col-md-5">
                    <strong>Total da comanda : R$ <?= number_format($this->comanda->getValorTotal(), 2, ',', '.'); ?></strong>
                </div>

                <div class="col-md-7 text-right">
                    <a href="javascript:window.history.go(-1)" class="btn btn-large btn-default" >
                        <i class="fa fa-mail-reply"> </i> Voltar pedido
                    </a>
                    <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target=".inserirItem">
                        <i class="fa fa-plus-circle"> </i> Adicionar pedido
                    </button>
                </div>
            </div><br>
        </div>
        <!--Conteudo-->
        <div class="table-responsive">
            <table id="pedidos-table" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Produto</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Valor unitário</th>
                        <th class="text-center">Valor total</th>
                        <th class="text-center">Ação</th>                                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->pedidos as $key => $value) {
                        ?>                                                
                        <tr>
                            <td class="text-center"><?= $value['descricao'] ?></td>
                            <td class="text-center"><?= $value['quantidade'] ?></td>
                            <td class="text-center">R$ <?= $value['valor'] ?></td>
                            <td class="text-center">R$ <?php echo number_format($value['quantidade'] * $value['valor'], 2, ',', '.'); ?>  </td>  
                            <td class="text-center">
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".deletaPedido">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>                                                
                </tbody>

            </table>
        </div>
    </div>
</div>
<!--  Confirma deleta pedido  -->

<div class="modal fade deletaPedido" tabindex="-1" role="dialog" aria-labelledby="" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Deletar</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    Deseja remover este item ?   
                </div> 
                <div class="modal-footer">
                    <a href="" type="submit" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Não</button>                    
                </div>
            </form>
        </div>
    </div>
</div>


<!--  inserção pedido  -->
<div class="modal fade inserirItem" tabindex="-1" role="dialog" aria-labelledby="" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Inserir pedido na comanda</h4>
            </div>
            <form method="post" id="adicionarPedido" action="<?php echo URL; ?>pedido/addPedido">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Código do produto</label>
                                <input type="text" class="form-control" onchange="selecionarProduto(this.value)" name="codigo" placeholder="insira aqui o mesmo codigo do cardápio" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Está informação será inserida automática" required="" disabled="">
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantidade</label>
                                <input type="number" class="form-control" id="quantidade" name="quantidade" value="1" min="1" max="250" onchange="atualizarValor()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><b>R$</b>
                                    </span>
                                    <input type="hidden" id="valorProduto" name="valor">
                                    <input type="hidden" name="codComanda" value="<?php echo $this->comanda->getCodigo() ?>">
                                    <input type="text" placeholder="0.00" id="valor" class="form-control" required="" disabled="">                                   
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Cancelar</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function cancelaEdicao() {
        location.reload();
    }
</script>
