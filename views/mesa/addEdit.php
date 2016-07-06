

<div class="container" style="padding: 50px"> 

    <div class="well col-md-8 col-md-offset-2 ">

        <div class="row">
            <div class="col-md-12 ">
                <h1 class="page-header" style="margin: 20px 0 20px;">    <?= $this->subTitulo ?> </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form id="addEditMesa" method="post" action="<?= URL?>mesa/<?php ($this->acao == 'criar')? print 'addMesa': print 'editMesa';?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Número da mesa</label>
                                    <input type="text" class="form-control" name="numeroMesa" value="<?= $this->mesa->getNumeroMesa() ?>" placeholder="Informe aqui o número da mesa"  required="">
                                </div>
                            </div>
                        </div>    
                    </div> 
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelarAcao('<?php echo $this->acao ?>')"> Cancelar</button>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>