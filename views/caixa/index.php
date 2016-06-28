    
<!-- Pagina do conteudo -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small>	</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">  

                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-lg-6  col-md-5 col-sm-3  control-label">Mostrar:</label>
                                                <div class="col-lg-6  col-md-7 col-sm-9 ">
                                                    <select  class="form-control" >
                                                        <option>4</option>
                                                        <option>12</option>
                                                        <option>36</option>
                                                        <option>48</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-5 col-md-9 col-sm-12 col-xs-12 text-right" >
                                        <div class="input-group input-group-md">
                                            <input type="text" class="form-control" placeholder="Informe a descrição do produto">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i> Buscar</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 text-right">
                                        <div class=" btn-group" data-toggle="buttons">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked><i class="fa fa-th-large"></i>
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" id="option2" autocomplete="off"><i class="fa fa-th-list"></i>
                                            </label>  
                                            <button type="button" class="btn btn-primary  btn-md" 
                                                    data-toggle="modal" 
                                                    data-target="#cadastrarUsuario" 
                                                    data-toggle-tool="tooltip" 
                                                    data-placement="top" title="Cadastrar novo"><i class="fa fa-plus"></i> Novo produto</button>                                            

                                        </div>

                                    </div>




                                </div>
                            </div>
                            <div class="panel-body">
                                <div >
                                    <div class="row">
                                        <?php
                                        for ($i = 0; $i < 8; $i++) {
                                            ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-lg-9">
                                                                <?= "#" . $i ?>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="btn-group pull-right" role="group">
                                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fa fa-cog"></i>
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu text-center">
                                                                        <li><a> Editar</a></li>
                                                                        <li><a> Remover</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                     
                                                    <div class="panel-body">

                                                        <p class="cat-descricao"><a href="#">Cerveja Bhrama 350ml</a></p>
                                                        <p class="cat-preco">R$ 3,75</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right" >
                            <nav>
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>                                        
                        </div>                                
                    </div>
                </div>						
            </div>
        </div>
    </div>            
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="cadastrarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar usuário</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>
                <button type="button" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /#wrapper -->

