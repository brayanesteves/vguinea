<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>



    <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM `tu_empresa_segura`;";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- CONTAINER Nº0 -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevoPedido" type="button" class="btn btn-success" data-toggle="modal">Nuevo
                    pedido</button>
            </div>
        </div>
    </div>
    <!-- .CONTAINER Nº0 -->
    <br>
    <!-- CONTAINER Nº1 -->
    <div class="container">
        <!-- ROW Nº0 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPedidos" class="table table-striped table-bordered table-condensed"
                        style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Númnero de pedido</th>
                                <th>Nombre</th>
                                <th>CIF</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;                         
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $dat['Pedido']; ?>
                                </td>
                                <td>
                                    <?php echo $dat['Nombre']; ?>
                                </td>
                                <td>
                                    <?php echo $dat['Cif']; ?>
                                </td>
                                <td>
                                    <div class='text-center'>
                                        <div class='btn-group'><button id="<?= md5($dat['Pedido']); ?>"
                                                class='btn btn-primary EdtOrdrBttn'>Editar</button><button
                                                id="<?= md5($dat['Pedido']); ?>"
                                                class='btn btn-danger DltOrdrBttn'>Borrar</button></div>
                                    </div>
                                </td>
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
        <!-- .ROW Nº0 -->
    </div>
    <!-- CONTAINER Nº1 -->

    <!--Modal para CRUD-->
    <div class="modal fade" id="WndwsOrdrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Pedido</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Seguimiento</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form id="FrmOrdrs" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="actn" id="actn" value="">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="CIF">CIF</label>
                                    <input type="text" class="form-control" id="CIF">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Nm">Nombre</label>
                                    <input type="text" class="form-control" id="Nm">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Ordr">Pedido</label>
                                    <input type="text" class="form-control" id="Ordr">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Cstmr">Cliente</label>
                                    <input type="text" class="form-control" id="Cstmr">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="CstmrEml">Correo cliente</label>
                                    <input type="text" class="form-control" id="CstmrEml">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="CstmrPhn">Telefono cliente</label>
                                    <input type="text" class="form-control" id="CstmrPhn">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="StrtAddrss">Dirección</label>
                                    <textarea type="text" class="form-control" id="StrtAddrss"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="AMD">AMD</label>
                                    <input type="text" class="form-control" id="AMD">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Mdl">Modelo</label>
                                    <input type="text" class="form-control" id="Mdl">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="AMDPhnNmbr">Nº Telefono AMD</label>
                                    <input type="text" class="form-control" id="AMDPhnNmbr">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Scn">Escenario</label>
                                    <input type="text" class="form-control" id="Scn">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="SrlNmbr">Nº Serie</label>
                                    <input type="text" class="form-control" id="SrlNmbr">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="SrlNmbrBkp">Nº Serie Bkp</label>
                                    <input type="text" class="form-control" id="SrlNmbrBkp">
                                </div>
                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="HA">
                                        <label class="form-check-label" for="HA">
                                            HA
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Anlyss">
                                        <label class="form-check-label" for="Anlyss">
                                            Análisis
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Exctn">
                                        <label class="form-check-label" for="Exctn">
                                            Ejecución
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Pndng">
                                        <label class="form-check-label" for="Pndng">
                                            Pendiente
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Prvsnd">
                                        <label class="form-check-label" for="Prvsnd">
                                            Provisionado
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Fnshd">
                                        <label class="form-check-label" for="Fnshd">
                                            Finalizado
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="AddOrdrBttn" class="btn btn-dark">Guardar</button>
                                <button type="submit" id="EdtOrdrBttn" class="btn btn-dark">Actualizar</button>
                            </div>
                        </div>
                        <!--  -->
                    </form>
                    </div>

                    <!-- SEGUIMIENTO -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form id="FrmOrdrsTrcng" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="ActnTrcng" id="ActnTrcng" value="">                            
                            <input type="hidden" name="OrdrTrcng" id="OrdrTrcng" value="">                            

                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="FMG">
                                        <label class="form-check-label" for="FMG">
                                            FMG
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Ready">
                                        <label class="form-check-label" for="Ready">
                                            Ready
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Unified">
                                        <label class="form-check-label" for="Unified">
                                            Unified
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Direccionamiento">
                                        <label class="form-check-label" for="Direccionamiento">
                                            Direccionamiento
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="AgendadoCl">
                                        <label class="form-check-label" for="AgendadoCl">
                                            AgendadoCl
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="AgendadoCoyser">
                                        <label class="form-check-label" for="AgendadoCoyser">
                                            AgendadoCoyser
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="MailCl">
                                        <label class="form-check-label" for="MailCl">
                                            MailCl
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="MailBackup">
                                        <label class="form-check-label" for="MailBackup">
                                            MailBackup
                                        </label>
                                    </div>
                                </div>                                

                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="FortiCloud">
                                        <label class="form-check-label" for="FortiCloud">
                                            FortiCloud
                                        </label>
                                    </div>
                                </div>                               

                            </div>

                            <div id="ActnTrcng" class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>                                
                                <button type="submit" id="EdtTrcngBttn" class="btn btn-dark">Actualizar seguimiento</button>
                            </div>
                        </div>
                        <!--  -->
                    </form>
                    </div>
                    <!-- .SEGUIMIENTO -->

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>