<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM `0_Scnrs` WHERE `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0;";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevoEscenario" type="button" class="btn btn-success" data-toggle="modal">Nuevo Escenario</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="TblScnrs" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Referencia Transacción (MD5)</th>                                
                                <th>Nombre</th>                                
                                <th>Descripción</th>                                
                                <th>Fecha</th>  
                                <th>Hora</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;                         
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo md5($dat['Rfrnc'] . $dat['DtAdmssn'] . $dat['ChckTm']); ?></td>
                                <td><?php echo $dat['Nms']; ?></td>
                                <td><?php echo $dat['Dscrptn']; ?></td>
                                <td><?php echo $dat['DtAdmssn']; ?></td>
                                <td><?php echo $dat['ChckTm']; ?></td>    
                                <td></td>
                            </tr>
                            <?php
                            $i++;
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="WndwsScnrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="FrmScnrs">
            <input type="hidden" name="mdls_md5" class="form-control" id="mdls_md5">
            <input type="hidden" name="mdls_rfrnc" class="form-control" id="mdls_rfrnc">
            <div class="modal-body">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nms">Nombres</label>
                    <input type="text" name="nms" class="form-control" id="nms">
                </div>                     
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="dscrptn">Descripción</label>
                    <textarea type="text" name="dscrptn" class="form-control" id="dscrptn"></textarea>
                </div>                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="SvMdls" id="SvMdls" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>