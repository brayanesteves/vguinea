<?php require_once "vistas/parte_superior.php"?>
<!-- Page Content -->
<div class="container">
<?php
include_once './bd/conexion.php';
ini_set('display_errors', 1);
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM `0_Schdl` WHERE `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0;";
$sql = "SELECT * FROM `0_Schdl` WHERE `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0;";
 
$req = $conexion->prepare($sql);
$req->execute();
$events = $req->fetchAll();

$pedidos = "SELECT * FROM `tu_empresa_segura`; ";
 
$req_ = $conexion->query($pedidos);
$req_->execute();
$events_ = $req_->fetchAll();

?>
 <div class="row">
     <div class="col-lg-12 text-center">
         <h1>FullCalendar PHP MySQL</h1>
         <p class="lead">Completa con rutas de archivo predefinidas que no tendrás que cambiar!</p>
         <div id="calendar" class="col-centered">
         </div>
     </div>
     
 </div>
 <!-- /.row -->
 
 <!-- Modal -->
 <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
     <form class="form-horizontal" method="POST" action="addEvent.php">
        <input type="hidden" name="UsrRfrnc" id="UsrRfrnc" value="<?php /*echo $_SESSION["id_usuario"];*/ echo "0"; ?>" />
        <input type="hidden" name="RfrncClssfctn" id="RfrncClssfctn" value="<?php echo 0; ?>" />
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
       </div>
       <div class="modal-body">
         
           <div class="form-group">
             <label for="Nms" class="col-sm-2 control-label">Titulo</label>
             <div class="col-sm-10">
               <input type="text" name="Nms" class="form-control" id="Nms" placeholder="Titulo">
             </div>
           </div>
           <div class="form-group">
             <label for="Pntr" class="col-sm-2 control-label">Pedidos</label>
             <div class="col-sm-10">
               <select name="Pntr" class="form-control" id="Pntr">
                    <option value="">Seleccionar pedido</option>
                    <?php foreach($events_ as $event):  ?>
                    <option value="<?php echo  $event['Pedido'] ?>"><?php echo $event['Nombre'] ?></option>
                    <?php endforeach; ?>
                   
                 </select>
             </div>
           </div>

           <div class="form-group">
             <label for="Dscrptn" class="col-sm-2 control-label">Descripción</label>
             <div class="col-sm-10">
               <textarea name="Dscrptn" id="Dscrptn" cols="30" rows="10"></textarea>
             </div>
           </div>

           <div class="form-group">
             <label for="IntlDt" class="col-sm-2 control-label">Fecha Inicial</label>
             <div class="col-sm-10">
               <input type="text" name="IntlDt" class="form-control" id="IntlDt" readonly>
             </div>
           </div>

           <div class="form-group">
             <label for="FnlDt" class="col-sm-2 control-label">Fecha Final</label>
             <div class="col-sm-10">
               <input type="text" name="FnlDt" class="form-control" id="FnlDt" readonly>
             </div>
           </div>
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">Guardar</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 
 
 
 <!-- Modal -->
 <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
     <form class="form-horizontal" method="POST" action="editEventTitle.php">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
       </div>
       <div class="modal-body">
         
           <div class="form-group">
             <label for="Nms" class="col-sm-2 control-label">Titulo</label>
             <div class="col-sm-10">
               <input type="text" name="Nms" class="form-control" id="Nms" placeholder="Titulo">
             </div>
           </div>
           <div class="form-group">
             <label for="Pntr" class="col-sm-2 control-label">Pedidos</label>
             <div class="col-sm-10">
               <select name="Pntr" class="form-control" id="Pntr">
                    <option value="">Seleccionar pedido</option>
                    <?php foreach($events_ as $event):  ?>
                    <option value="<?php echo  $event['Pedido'] ?>"><?php echo $event['Nombre'] ?></option>
                    <?php endforeach; ?>
                   
                 </select>
             </div>
           </div>

           <div class="form-group">
             <label for="Dscrptn" class="col-sm-2 control-label">Descripción</label>
             <div class="col-sm-10">
               <textarea name="Dscrptn" id="Dscrptn" cols="30" rows="10"></textarea>
             </div>
           </div>

           <div class="form-group">
             <label for="IntlDt" class="col-sm-2 control-label">Fecha Inicial</label>
             <div class="col-sm-10">
               <input type="text" name="IntlDt" class="form-control" id="IntlDt" readonly>
             </div>
           </div>
           
           <div class="form-group">
             <label for="FnlDt" class="col-sm-2 control-label">Fecha Final</label>
             <div class="col-sm-10">
               <input type="text" name="FnlDt" class="form-control" id="FnlDt" readonly>
             </div>
           </div>

             <div class="form-group"> 
                 <div class="col-sm-offset-2 col-sm-10">
                   <div class="checkbox">
                     <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar pedido</label>
                   </div>
                 </div>
             </div>
           
           <input type="hidden" name="id" class="form-control" id="id">
         
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">Guardar</button>
       </div>
     </form>
     </div>
   </div>
 </div>

</div>
<!-- /.container -->

<?php require_once "vistas/parte_inferior.php"?>