<div id="page-wrapper">
    <!--    Painel de informações-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">                
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?></small></h1>                
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".inserirComanda">
                <i class="fa fa-plus-circle"> </i> Adicionar nova comanda
            </button>
            <a href="<?= URL ?>dashboard" type="button" class="btn btn-default">
                <i class="fa fa-reply"> </i> Ver todas as mesas
            </a>            
        </div><br><br>        

        <div class="row">
            <?php for ($y = 0; $y < 4; $y++) { ?>
            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-blue">
                    <a href="<?= URL?>pedido">     
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil-square-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">6</div>
                                    <div>Pedidos</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left"> Comanda #11 </span>
                            <span class="pull-right">Total : R$ 0 </i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
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
                <h4 class="modal-title" >Messa #01 - Breakfast </h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    Inserir comanda na mesa #01 ?   
                </div> 
                <div class="modal-footer">
                    <a href="" type="submit" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Não</button>                    
                </div>
            </form>
        </div>
    </div>
</div>