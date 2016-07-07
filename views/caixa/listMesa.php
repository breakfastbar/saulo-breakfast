<div id="page-wrapper">
    <!--    Painel de informações-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">                
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?></small></h1>                
            </div>
        </div>

        <div class="text-center">
            <a href="<?= URL ?>caixa" type="button" class="btn btn-default">
                <i class="fa fa-reply"> </i> Ver todas as mesas
            </a>            
        </div><br><br>        

        <div class="row">
            <?php
            if (count($this->comandas) > 0) {
                foreach ($this->comandas as $comanda) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <a href="<?= URL ?>caixa/listPedidos/<?= $comanda->getCodigo() ?> ">     
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-pencil-square-o fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $comanda->getNumeroPedidos() ?></div>
                                            <div>Pedidos</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-left"> Comanda #<?= $comanda->getCodigo() ?>  </span>
                                    <br>
                                    <span class="pull-right">Total : R$ <?= $comanda->getValorTotal() ?> </i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>  
                <div class="col-lg-12 text-center">                
                <h4 class="page-header">A <?= $this->titulo?> ainda não possui nenhuma comanda </h4>                
            </div>
<?php } ?>
        </div>
    </div>                 
</div>
<!--  Confirma inserção de comanda  -->

<div class="modal fade inserirComanda" tabindex="-1" role="dialog" aria-labelledby="" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" ><?= $this->titulo ?> - Breakfast </h4>
            </div>
            <form id="adicionarComanda" action="<?php echo URL?>comanda/adicionarComanda" method="post">
                <input type="hidden" value="<?=$this->mesa?>" name="mesa" >
                <div class="modal-body">
                    Inserir comanda na <?= $this->titulo ?>  ?   
                </div> 
                <div class="modal-footer">
                    <a href="" type="submit" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Não</button>                    
                </div>
            </form>
        </div>
    </div>
</div>