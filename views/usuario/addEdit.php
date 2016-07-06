<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header" style="margin: 20px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small></h1>
                <div class="row">
                    <form id="addEditUsuario" action="<?php echo URL ?>usuario/<?php ($this->acao == 'criar') ? print 'addUsuario' : print 'editUsuario'; ?>" method="POST">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dados pessoais</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nome:</label>
                                            <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $this->usuario->getNome() ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Data de nascimento: (dd/mm/aaaa)</label>
                                            <input type="text" class="form-control" id="inputDataNascimento" name="dataNascimento" value="<?php echo $this->usuario->getDataNascimento() ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CPF: (Somente números)</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf"  value="<?php echo $this->usuario->getCpf() ?>"  onKeyPress="inserirMascara('cpf', 'xxx.xxx.xxx-xx')">
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
                                        <input type="text" class="form-control" name="cep" id='cep' maxlength="10"  onchange="getEndereco(this.value)"  value="<?php echo $this->usuario->getCep() ?>"    required >
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-md-7 ">
                                        <label>Logradouro:</label>
                                        <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $this->usuario->getLogradouro() ?>"  >
                                    </div>
                                    <div class="col-md-2 col-xs-4">
                                        <label>Número:</label>
                                        <input type="text" class="form-control" name="numero" required value="<?php echo $this->usuario->getNumero() ?>"  >
                                        <p class="help-block"> </p>
                                    </div>                
                                    <div class="col-md-5  col-xs-8">
                                        <label>Bairro:</label> 
                                        <input type="text" class="form-control" name="bairro" id="bairro"  value="<?php echo $this->usuario->getBairro() ?>">
                                        <p class="help-block"></p>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-md-5 ">
                                        <label>Cidade:</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $this->usuario->getCidade() ?>" >
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-md-2 ">
                                        <label>Estado:</label>
                                        <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $this->usuario->getEstado() ?>" >
                                    </div><!-- /.col-lg-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <label>Complemento:</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $this->usuario->getComplemento() ?>" > 
                                    </div><!-- /.col-lg-6 -->
                                </div>
                                <div style="margin-top: 10px"> </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Telefone celular:</label>
                                        <input type="text" class="form-control" id="telefonecelular" name="telefoneCelular" value="<?php echo $this->usuario->getTelefoneCelular() ?>" maxlength="15" >
                                        <p class="help-block">Digite apenas números, e o DDD sem o zero.</p>
                                    </div> 
                                    <div class="col-md-5">
                                        <label>Telefone fixo:</label>
                                        <input type="text" class="form-control" id="telefonefixo" name="telefoneFixo" value="<?php echo $this->usuario->getTelefoneFixo() ?>" maxlength="14">
                                        <p class="help-block">Digite apenas números, e o DDD sem o zero.</p>
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
                                            <input type="text" class="form-control" id="usuarioAcesso" name="usuarioSistema" value="<?php echo $this->usuario->getUsuarioSistema() ?>"  >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nivel de acesso:</label>
                                            <select class="form-control" id="nivelAcesso" name="nivelAcesso" >
                                                <option value="1"    <?php ($this->usuario->getNivelAcesso() == 1) ? print 'selected' : print ''; ?> >Administrador</option>
                                                <option value="2"    <?php ($this->usuario->getNivelAcesso() == 2) ? print 'selected' : print ''; ?> >Cozinha</option>
                                                <option value="3"    <?php ($this->usuario->getNivelAcesso() == 3) ? print 'selected' : print ''; ?> >Caixa</option>
                                                <option value="4"    <?php ($this->usuario->getNivelAcesso() == 4) ? print 'selected' : print ''; ?> >Garçom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($this->acao == 'criar') { ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Senha:</label>
                                                <input type="password" name="senha" class="form-control" id="senha" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Confirme sua senha:</label>
                                                <input type="password" name="confirmeSenha" class="form-control" id="confirmarSenha" >
                                            </div>
                                        </div>
                                    </div> 
                                <?php } ?>
                            </div>                         
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <!--<button type="button" class="btn btn-danger" onclick="cancelarAcao('<?php echo $this->acao ?>')"> Cancelar</button>-->                            
                        </div>                    
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
