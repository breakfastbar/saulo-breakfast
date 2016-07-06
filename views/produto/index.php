<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="margin: 10px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small></h1>
                <div class="row">                   
                    <div  class="col-lg-12 col-xs-12 text-right"; >
                        <button type="button" class="btn btn-primary  btn-md" 
                                data-toggle="modal" 
                                data-target="#cadastrarProduto" 
                                data-toggle-tool="tooltip" 
                                data-placement="top" title="Cadastrar novo"><i class="fa fa-plus-circle"> </i>
                            Cadastrar produto </button>
                    </div>
                </div>
                <div style=" padding: 5px "></div>                  
                <div class="row">                   
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->titulo ?>                          
                            </div>                       
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-setor">
                                        <thead>
                                            <tr>
                                                <th width="20%">Código</th>
                                                <th>Descrição</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>                                  
                                        <tbody>
                                            <?php foreach ($this->listaProduto as $key => $value) { ?>                                      
                                                <tr class="odd gradeX">
                                                    <td><?= $value['codProduto'] ?></td>
                                                    <td><?= $value['descricao'] ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= URL . 'produto/editar/' . $value['codProduto'] ?>" class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Editar" data-toggle="modal" data-target="#editarProduto"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <button class="btn btn-xs btn-danger"  data-toggle-tool="tooltip" data-placement="top" title="Deletar" data-toggle="modal" data-target="#excluirProduto"><i class="glyphicon glyphicon-trash"></i></button>
                                                    </td>                                           
                                                </tr>
                                            <?php } ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
        </div>            
    </div>
</div>
<!-- Modal cadastro -->
<div class="modal fade" id="cadastrarProduto" data-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar produto</h4>
            </div>
            <form method="post" action="<?php echo URL; ?>produto/novo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" class="form-control" name="descricao" placeholder="Descrição do produto" required="">
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
                                    <input type="text" placeholder="Valor do produto" class="form-control" name="valor" required="" onkeypress="return(MascaraMoeda(this, '', '.', event))">                                   
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
                                            <input type="radio" name="preProduzido" id="optionsRadios2" value="0" checked> Não 
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="preProduzido" id="optionsRadios2" value="1"> Sim
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
                                <select type="text" class="form-control" name="setor_codSetor" required="">
                                    <option value="false">Selecione um setor...</option>
                                    <?php
                                        foreach ($this->listaSetor  as $key => $value) {
                                            ?>
                                            <option value="<?=$value['codSetor']?>"><?=$value['descricao']?></option>
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
                                        foreach ($this->listaCategoria  as $key => $value) {
                                            ?>
                                            <option value="<?=$value['codCategoria']?>"><?=$value['descricao']?></option>
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
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Cancelar</button>                    
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal editar -->
<div class="modal fade" id="editarProduto" data-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <!-- aqui vem o conteudo da pagina produto/editar -->
        </div>
    </div>
</div>

<!-- Modal confirma exclusão -->
<div class="modal fade modal-danger in" id="excluirProduto" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Deletar</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    Tem certeza que deseja excluir ?   
                </div> 
                <div class="modal-footer">
                    <a href="<?= URL . 'produto/deletar/' . $value['codProduto'] ?>" type="submit" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Não</button>                    
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
