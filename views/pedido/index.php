<div id="page-wrapper">
    <!--    Painel de informações-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">                
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?></small></h1>                
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target=".inserirItem">
                    <i class="fa fa-plus-circle"> </i> Adicionar pedido
                </button>
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
                    <?php for ($y = 0; $y < 5; $y++) { ?>                                                
                        <tr>
                            <td class="text-center">Bhramma</td>
                            <td class="text-center">3</td>
                            <td class="text-center">R$ 3,50</td>
                            <td class="text-center">R$ 45,00</td>  
                            <td class="text-center">
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".deletaPedido">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>                                                
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;">Total : </td>
                        <td style="background-color: #c5c5c5; text-align: center">R$ 190,00</td>
                        <td></td>
                    </tr>
                </tfoot>                                
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
            <form method="post" action="<?php echo URL; ?>produto/novo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Código do produto</label>
                                <input type="text" class="form-control" name="codigo" placeholder="insira aqui o mesmo codigo do cardápio" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" class="form-control" name="descricao" placeholder="Está informação será inserida automática" required="" disabled="">
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantidade</label>
                                <input type="number" class="form-control" min="1" max="250">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><b>R$</b>
                                    </span>
                                    <input type="text" placeholder="0.00" class="form-control" name="valor" required="" disabled="">                                   
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