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
                    <a href="<?php echo URL?>caixa" class="btn btn-large btn-default" >
                        <i class="fa fa-mail-reply"> </i> Voltar a mesas
                    </a>
                    <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target=".inserirItem">
                        <i class="fa fa-minus-circle"> </i> Fechar comanda
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
                <h4 class="modal-title" >Realizar fechamento da comanda #<?php echo $this->comanda->getCodigo() ?> </h4>
            </div>
            <form method="post" id="fecharComanda" action="<?php echo URL; ?>caixa/fecharComanda/<?php echo $this->comanda->getCodigo() ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Valor pago pelo cliente:</label>
                                <input type="text" class="form-control" name="valorPago" placeholder="Insira aqui o valor pago pelo cliente" required="">
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
