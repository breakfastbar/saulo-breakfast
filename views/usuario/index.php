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
                                data-target="#cadastrarUsuario" 
                                data-toggle-tool="tooltip" 
                                data-placement="top" title="Cadastrar novo"><i class="fa fa-plus-circle"> </i>
                            Cadastrar usuário </button>
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
                                                        <button class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
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

<!-- Modal user -->
<div class="modal fade" id="cadastrarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar usuário</h4>
            </div>
            <div class="modal-body">
                <form id="adicionarUsuario" action="<?php echo URL . "usuario/addUsuario" ?>" method="POST">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dados pessoais</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nome:</label>
                                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Data de nascimento: (dd/mm/aaaa)</label>
                                        <input type="text" class="form-control" id="inputDataNascimento" name="dataNascimento" placeholder="Data de nascimento">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>CPF: (Somente números)</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"  onKeyPress="inserirMascara('cpf', 'xxx.xxx.xxx-xx')">
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Contatos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <label>CEP: (Somente números)</label>
                                    <input type="text" class="form-control" name="cep" id='cep' maxlength="10" placeholder="CEP" onchange="getEndereco(this.value)"   onKeyPress="inserirMascara('cep', 'xx.xxx-xxx')" required >
                                </div><!-- /.col-lg-6 -->
                                <div class="col-md-7 ">
                                    <label>Logradouro:</label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" >
                                </div>
                                <div class="col-md-2 col-xs-4">
                                    <label>Número:</label>
                                    <input type="text" class="form-control" name="numero" required value="" placeholder="Número">
                                    <p class="help-block"> </p>
                                </div>                
                                <div class="col-md-5  col-xs-8">
                                    <label>Bairro:</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                                    <p class="help-block"></p>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-md-5 ">
                                    <label>Cidade:</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                                </div><!-- /.col-lg-6 -->
                                <div class="col-md-2 ">
                                    <label>Estado:</label>
                                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado">
                                </div><!-- /.col-lg-6 -->
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label>Complemento:</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento" value="" placeholder="Complemento"> 
                                </div><!-- /.col-lg-6 -->
                            </div>
                            <div style="margin-top: 10px"> </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Telefone celular:</label>
                                    <input type="text" class="form-control" id="telefonecelular" name="telefoneCelular" value="" placeholder="Telefone Celular" >
                                </div> 
                                <div class="col-md-5">
                                    <label>Telefone fixo:</label>
                                    <input type="text" class="form-control" id="telefonefixo" name="telefoneFixo" value="" placeholder="Telefone Fixo">
                                </div> 

                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Informações no sistema</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Usuário de acesso:</label>
                                        <input type="text" class="form-control" id="usuarioAcesso" name="usuarioSistema" placeholder="Usuário de acesso">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nivel de acesso:</label>
                                        <select class="form-control" id="nivelAcesso" name="nivelAcesso" >
                                            <option value="1">Administrador</option>
                                            <option value="2">Cozinha</option>
                                            <option value="3">Caixa</option>
                                            <option value="4">Garçom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Senha:</label>
                                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Confirme sua senha:</label>
                                        <input type="password" name="confirmeSenha" class="form-control" id="confirmarSenha" placeholder="Confirme sua senha">
                                    </div>
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
</div>    

<script>
    function cancelaEdicao() {
        location.reload();
    }
</script>
