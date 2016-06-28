<div class="modal-header btn-primary">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Editar produto</h4>
</div>
<form method="post" action="<?= URL . 'produto/salvarEdicao/' . $this->produtoSingleLista[0]['codProduto'] ?>">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição do produto" required="" value="<?= $this->produtoSingleLista[0]['descricao'] ?>">
                    <p class="help-block">Informe a descrição da produto.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Valor:</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-usd"></i>
                        </span>
                        <input type="text" placeholder="Valor do produto" class="form-control" name="valor" checked required="" onkeypress="return(MascaraMoeda(this, '', '.', event))" value="<?= $this->produtoSingleLista[0]['valor'] ?>" >                                   
                    </div>
                    <p class="help-block">Informe o valor do produto.(Apenas números)</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Possui pré-preparo:</label>
                    <div class="radio">
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="preProduzido" id="optionsRadios2" value="0" 
                                <?php
                                (!$this->produtoSingleLista[0]['preProduzido']) ? print 'checked' : print "";
                                ?>
                                       > Não 
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="preProduzido" id="optionsRadios2" value="1"
                                <?php
                                ($this->produtoSingleLista[0]['preProduzido']) ? print 'checked' : print "";
                                ?>
                                       > Sim
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Setor de atendimento:</label>
                    <select type="text" class="form-control" name="setor_codSetor" required>
                        <option value="false">Selecione um setor...</option>
                        <?php
                        foreach ($this->listaSetor as $key => $value) {
                            ?>
                            <option value="<?= $value['codSetor'] ?>"
                            <?php
                            ($this->produtoSingleLista[0]['setor_codSetor'] == $value['codSetor']) ? print 'selected' : print "";
                            ?>
                                    ><?= $value['descricao'] ?></option>
                                    <?php
                                }
                                ?>
                    </select>
                    <p class="help-block">Selecione a setor de atendimento da produto.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoria:</label>
                    <select type="text" class="form-control" name="categoria_codCategoria" required="">
                        <option value="false">Selecione uma categoria...</option>
                        <?php
                        foreach ($this->listaCategoria as $key => $value) {
                            ?>
                            <option value="<?= $value['codCategoria'] ?>"
                            <?php
                            ($this->produtoSingleLista[0]['categoria_codCategoria'] == $value['codCategoria']) ? print 'selected' : print "";
                            ?>

                                    ><?= $value['descricao'] ?></option>
                                    <?php
                                }
                                ?>
                    </select>
                    <p class="help-block">Selecione a categoria do produto.</p>
                </div>
            </div>
        </div> 
    </div> 
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Fechar</button>                    
    </div>
</form>