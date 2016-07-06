<!-- Pagina do conteudo -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="margin: 20px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small>
                </h1>
                <div class="row">                   
                    <div  class="col-lg-12 col-xs-12 text-right"; >
                        <a href="<?php echo URL ?>usuario/addEdit/"  class="btn btn-primary  btn-md" 

                           data-toggle-tool="tooltip" 
                           data-placement="top" title="Cadastrar novo"><i class="fa fa-plus-circle"> </i>
                            Cadastrar usuário </a>
                    </div>
                </div>
                <div style=" padding: 5px "></div>   
                <div class="row">                   
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Usuário                          
                            </div>                       
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-setor">
                                        <thead>
                                            <tr>
                                                <th width="20%">#</th>
                                                <th>Nome</th>
                                                <th>Usuário de acesso</th>
                                                <th>Nivel de acesso</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($this->usuarios); $i++) {
                                                ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?php echo $this->usuarios[$i]->getNome(); ?> </td>
                                                    <td><?php echo $this->usuarios[$i]->getUsuarioSistema(); ?> </td>
                                                    <td>
                                                        <?php
                                                        switch ($this->usuarios[$i]->getNivelAcesso()) {
                                                            case '1':
                                                                echo 'Administrador';
                                                                break;
                                                            case '2':
                                                                echo 'Cozinha';
                                                                break;
                                                            case '3':
                                                                echo 'Caixa';
                                                                break;
                                                            case '4':
                                                                echo 'Garçom';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-xs btn-success"  data-toggle-tool="tooltip" data-placement="top" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></button>
                                                        <a href="<?php echo URL ?>usuario/addEdit/<?php echo $this->usuarios[$i]->getCpf() ?>" class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <button class="btn btn-xs btn-danger"  data-toggle-tool="tooltip" data-placement="top" title="Deletar" onclick="deletarUsuario('<?php echo $this->usuarios[$i]->getCpf() ?>')" ><i class="glyphicon glyphicon-trash"></i></button>
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


<script>
    function cancelaEdicao() {
        location.reload();
    }
</script>
