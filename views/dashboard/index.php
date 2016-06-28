<div id="page-wrapper">
    <!--    Painel de informações-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?></small></h1>
                <a class="btn btn-success btn-sm"></a><label>&nbsp;LIVRE (6)</label>
                <br/>
                <a class="btn btn-danger btn-sm"></a><label>&nbsp;OCUPADA (6)</label>                
                <hr>                 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!--    Painel de Mesas-->
        <div class="row">
            <?php
            for ($i = 0; $i < 6; $i++) {
                ?>

                <div class="col-lg-3 col-md-6">                 
                    <div class="panel panel-green">
                        <a href="<?= URL ?>comanda">                        
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Comanda(s)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left"> <?= "Mesa #" . $i ?></span>
                                <span class="pull-right">Total : R$ 0 </i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>                        
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            for ($i = 0; $i < 6; $i++) {
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <a href="<?= URL ?>comanda">                        
                            <div class="panel-heading">                                                    
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">5</div>
                                        <div>Comanda(s)</div>
                                    </div>
                                </div>
                            </div>                                               
                            <div class="panel-footer">
                                <span class="pull-left"><?= "Mesa #" . $i ?></span>
                                <span class="pull-right">Total : R$ 98,50 </i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>