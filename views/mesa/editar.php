<?php $this->mesaSingleLista;?>

<div class="modal-header btn-primary">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Editar mesa</h4>
</div>
<form method="post" action="<?= URL . 'mesa/salvarEdicao/' . $this->mesaSingleLista[0]['numeroMesa'] ?>">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="numeroMesa" value="<?= $this->mesaSingleLista[0]['numeroMesa'] ?>"  required="">
                    <p class="help-block">Informe a nova descrição da mesa.</p>
                </div>
            </div>
        </div>    
    </div> 
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Fechar</button>                    
    </div>
</form>