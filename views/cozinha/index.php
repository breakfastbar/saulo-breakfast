<!-- Pagina do conteudo -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="margin: 10px 0 20px;"><?= $this->titulo ?> <small><?= $this->subTitulo ?> </small></h1>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#despensa" aria-controls="despensa" role="tab" data-toggle="tab">Despensa</a></li>
    <li role="presentation"><a href="#pedido" aria-controls="pedido" role="tab" data-toggle="tab">Pedido</a></li>
  </ul>
  <div style=" padding: 5px "></div> 
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="despensa">
            <div class="row">                   
               <div class="col-lg-12">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Despensa                          
                       </div>                       
                       <div class="panel-body">
                           <div class="dataTable_wrapper">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-despensa">
                                   <thead>
                                       <tr>
                                           <th>Código</th>
                                           <th>Descrição</th>
                                           <th class="text-center">Ações</th>
                                       </tr>
                                   </thead>                                  
                                   <tbody>
                                   <?php for ($i = 0; $i < 30; $i++) { ?>                                      
                                       <tr class="odd gradeX">
                                           <td>0<?=$i + 1 ?></td>
                                           <td>Administrador 00<?=$i + 1 ?></td>
                                           <td class="text-center">
                                                            <button class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Visualizar "><i class="glyphicon glyphicon-refresh"></i></button>
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
    <div role="tabpanel" class="tab-pane" id="pedido">
            <div class="row">                   
               <div class="col-lg-12">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Pedido                          
                       </div>                       
                       <div class="panel-body">
                           <div class="dataTable_wrapper">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-pedido">
                                   <thead>
                                       <tr>
                                           <th>Código</th>
                                           <th>Descrição</th>
                                           <th class="text-center">Ações</th>
                                       </tr>
                                   </thead>                                  
                                   <tbody>
                                   <?php for ($i = 0; $i < 30; $i++) { ?>                                      
                                       <tr class="odd gradeX">
                                           <td>0<?=$i + 1 ?></td>
                                           <td>Administrador 00<?=$i + 1 ?></td>
                                           <td class="text-center">
                                                            <button class="btn btn-xs btn-warning"  data-toggle-tool="tooltip" data-placement="top" title="Visualizar "><i class="glyphicon glyphicon-refresh"></i></button>
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
    </div>            
</div>
</div>
