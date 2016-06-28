<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="margin: 10px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small></h1>
                <div class="row">                   
                    <div  class="col-lg-12 col-xs-12 text-right"; >
                        <button type="button" class="btn btn-primary  btn-md" 
                                data-toggle="modal" 
                                data-target="#cadastrarMesa" 
                                data-toggle-tool="tooltip" 
                                data-placement="top" title="Cadastrar novo"><i class="fa fa-plus-circle"> </i>
                            Cadastrar mesa </button>
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
                                                <th>Código da mesa</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>                                  
                                        <tbody>
                                            <?php foreach ($this->listaMesa as $key => $value) { ?>                                      
                                                <tr class="odd gradeX">
                                                    <td><?= $value['numeroMesa'] ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= URL . 'mesa/editar/' . $value['numeroMesa'] ?>" class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Editar" data-toggle="modal" data-target="#editarMesa"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <button class="btn btn-xs btn-danger"  data-toggle-tool="tooltip" data-placement="top" title="Deletar" data-toggle="modal" data-target="#excluirMesa"><i class="glyphicon glyphicon-trash"></i></button>
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
<div class="modal fade" id="cadastrarMesa" data-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar mesa</h4>
            </div>
            <form method="post" action="<?php echo URL; ?>mesa/novo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Número</label>
                                <input type="text" class="form-control" name="numeroMesa" required="">
                                <p class="help-block">Informe o codigo(número) da mesa.</p>
                            </div>
                        </div>
                    </div>    
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelaEdicao()"> Fechar</button>                    
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal editar -->
<div class="modal fade" id="editarMesa" data-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <!-- aqui vem o conteudo da pagina mesa/editar -->
        </div>
    </div>
</div>

<!-- Modal confirma exclusão -->
<div class="modal fade modal-danger in" id="excluirMesa" data-backdrop="static">
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
                    <a href="<?= URL . 'mesa/deletar/' . $value['numeroMesa'] ?>" type="submit" class="btn btn-success">Sim</a>
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
