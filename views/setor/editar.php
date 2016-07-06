<?php $this->setorSingleLista;?>

<div class="modal-header btn-primary">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Editar setor</h4>
</div>
<form method="post" action="<?= URL . 'setor/salvarEdicao/' . $this->setorSingleLista[0]['codSetor'] ?>">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Nome do setor:</label>
                    <input type="text" class="form-control" name="descricao" value="<?= $this->setorSingleLista[0]['descricao'] ?>"  required="">
                </div>
            </div>
        </div>    
    </div> 
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Fechar</button>                    
    </div>
</form>