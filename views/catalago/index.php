    <!-- Pagina do conteudo -->
    <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="margin: 20px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small>
                </h1>
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
                               Catálogo                          
                           </div>                       
                           <div class="panel-body">
                               <div class="dataTable_wrapper">
                                   <table class="table table-striped table-bordered table-hover" id="dataTables-setor">
                                            <thead>
                                                <tr>
                                                    <th width="20%">#</th>
                                                    <th>Descrição</th>
                                                    <th>Categoria</th>
                                                    <th>Valor</th>
                                                    <th class="text-center">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < 10; $i++) {
                                                    ?>
                                                    <tr>
                                                        <td>00 <?= $i + 1 ?></td>
                                                        <td>Brhama lata 350 ml</td>
                                                        <td>Bebidas</td>
                                                        <td>R$4.65</td>
                                                        <td class="text-center">
                                                            <button class="btn btn-xs btn-success"  data-toggle-tool="tooltip" data-placement="top" title="Visualizar "><i class="glyphicon glyphicon-eye-open"></i></button>
                                                            <button class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Editar "><i class="glyphicon glyphicon-edit"></i></button>
                                                            <button class="btn btn-xs btn-danger"  data-toggle-tool="tooltip" data-placement="top" title="Deletar "><i class="glyphicon glyphicon-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
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

    <!-- Modal Cadastro -->
    <div class="modal fade bs-example-modal-lg" id="cadastrarProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar produto</h4>
                </div>
                <div class="modal-body">
                
                novo

                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

