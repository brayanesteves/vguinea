$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    TblMdls = $("#TblMdls").DataTable({
       
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    TblScnrs = $("#TblScnrs").DataTable({
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    tablaPedidos = $("#tablaPedidos").DataTable({       
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});   


    function EmptyFlds(Flds) {
        if(Flds.length != 0) {
            for (var Rfrnc = 0; Rfrnc < Flds.length; Rfrnc++) {
                $("#" + Flds[Rfrnc]).val("");
            }
        }
    }
    function Checked(Flds) {
        if(Flds.length != 0) {
            for (var Rfrnc = 0; Rfrnc < Flds.length; Rfrnc++) {                
                $("#" + Flds[Rfrnc]) .prop( "checked", false );
            }
        }
    }
$("#btnNuevoPedido").click(function(e){
    e.preventDefault();
    EmptyFlds(["CIF", "Nm", "Cstmr", "CstmrEml", "CstmrPhn", "StrtAddrss", "AMD", "Mdl", "AMDPhnNmbr", "Scn", "SrlNmbr", "SrlNmbrBkp"]);
    Checked(["HA", "Anlyss", "Exctn", "Pndng", "Prvsnd", "Fnshd"]);
    $('#actn').val("Add");
    $.ajax({
        url: "bd/pedido.php",
        type: "POST",
        dataType: "json",
        data: {opcion:1},
        success: function (data) {
            console.log(data);
            $("#Ordr").prop('disabled', true);
            $("#Ordr").val(parseInt(data[0].MXMM) + 1);
            
            /*id = data[0].id;            
            nombre = data[0].nombre;
            pais = data[0].pais;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();} */           
        }        
    });    
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Pedido");
    $("#AddOrdrBttn").show();
    $("#EdtOrdrBttn").hide();
    $("#ActnTrcng").hide();
    $("#WndwsOrdrs").modal("show");
    opcion = 1; //alta
});    
$("#btnNuevoModelo").click(function(){
    $("#FrmMdls").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Modelo");            
    $("#WndwsMdls").modal("show");        
    Rfrnc=null;
    opcion = 1; //alta
});    
$("#btnNuevoEscenario").click(function(){
    $("#FrmScnrs").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Escenario");            
    $("#WndwsScnrs").modal("show");        
    Rfrnc=null;
    opcion = 1; //alta
});    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    $(document).on("click", "#AddOrdrBttn", function(e){    
        e.preventDefault();        
    var Ordrs = {
        CIF: $("#CIF").val(),
        Nm: $("#Nm").val(),
        Cstmr: $("#Cstmr").val(),
        CstmrEml: $("#CstmrEml").val(),
        CstmrPhn: $("#CstmrPhn").val(),
        StrtAddrss: $("#StrtAddrss").val(),
        AMD: $("#AMD").val(),
        Mdl: $("#Mdl").val(),
        AMDPhnNmbr: $("#AMDPhnNmbr").val(),
        Scn: $("#Scn").val(),
        SrlNmbr: $("#SrlNmbr").val(),
        SrlNmbrBkp: $("#SrlNmbrBkp").val(),
        HA: $("#HA:checked").val(),
        Anlyss: $("#Anlyss:checked").val(),
        Exctn: $("#Exctn:checked").val(),
        Pndng: $("#Pndng:checked").val(),
        Prvsnd: $("#Prvsnd:checked").val(),
        Fnshd: $("#Fnshd:checked").val(),

        FMG: $("#FMG:checked").val(),
        Ready: $("#Ready:checked").val(),
        Unified: $("#Unified:checked").val(),
        Direccionamiento: $("#Direccionamiento:checked").val(),
        AgendadoCl: $("#AgendadoCl:checked").val(),
        AgendadoCoyser: $("#AgendadoCoyser:checked").val(),
        MailCl: $("#MailCl:checked").val(),
        MailBackup: $("#MailBackup:checked").val(),
        FortiCloud: $("#FortiCloud:checked").val(),
    }
    $.ajax({
        url: "bd/pedido.php",
        type: "POST",
        dataType: "json",
        data: {opcion:2, Ordrs:Ordrs},
        success: function(data){  
            console.log(data);
            /*id = data[0].id;            
            nombre = data[0].nombre;
            pais = data[0].pais;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();} */           
        }        
    });    
    $("#WndwsOrdrs").modal("hide");  
    });
$(document).on('click', '.EdtOrdrBttn', function(){  
    var Ordr = $(this).attr("id");
    $('#OrdrTrcng').val(Ordr);    
    $.ajax({  
         url:"bd/pedido.php",  
         method:"POST",  
         data:{opcion:0, Ordr:Ordr},  
         dataType:"json",  
        success: function (data) {
            console.log(data[0]);
                
            $('#CIF').val(data[0].Cif);
            $('#Nm').val(data[0].Nombre);
            $("#Ordr").prop('disabled', true);
            $('#Ordr').val(data[0].Pedido); 
            $('#Cstmr').val(data[0].Clnombre); 
            $('#CstmrEml').val(data[0].Clmail); 
            $('#CstmrPhn').val(data[0].Cltelefono); 
            $('#StrtAddrss').val(data[0].Cldireccion); 
            $('#AMD').val(data[0].AMD); 
            $('#Mdl').val(data[0].Modelo); 
            $('#AMDPhnNmbr').val(data[0].Cotelefono); 
            $('#Scn').val(data[0].Escenario); 
            $('#SrlNmbr').val(data[0].Nserie1); 
            $('#SrlNmbrBkp').val(data[0].Nserie2); 
            
             if(data[0].HA == 1) {
                $( "#HA" ).prop( "checked", true );
            } else {
                $( "#HA" ).prop( "checked", false );
            }
            if(data[0].Analisis == 1) {
                $( "#Anlyss" ).prop( "checked", true );
            } else {
                $( "#Anlyss" ).prop( "checked", false );
            }
            if(data[0].Ejecucion == 1) {
                $( "#Exctn" ).prop( "checked", true );
            } else {
                $( "#Exctn" ).prop( "checked", false );
            }
            if(data[0].Pendiente == 1) {
                $( "#Pndng" ).prop( "checked", true );
            } else {
                $( "#Pndng" ).prop( "checked", false );
            }
            if(data[0].Provisionado == 1) {
                $( "#Prvsnd" ).prop( "checked", true );
            } else {
                $( "#Prvsnd" ).prop( "checked", false );
            }
            if(data[0].Finalizado == 1) {
                $( "#Fnshd" ).prop( "checked", true );
            } else {
                $( "#Fnshd" ).prop( "checked", false );
            }

            if(data[0].FMG == 1) {
                $( "#FMG" ).prop( "checked", true );
            } else {
                $( "#FMG" ).prop( "checked", false );
            }
            if(data[0].Ready == 1) {
                $( "#Ready" ).prop( "checked", true );
            } else {
                $( "#Ready" ).prop( "checked", false );
            }
            if(data[0].Unified == 1) {
                $( "#Unified" ).prop( "checked", true );
            } else {
                $( "#Unified" ).prop( "checked", false );
            }
            if(data[0].Direccionamiento == 1) {
                $( "#Direccionamiento" ).prop( "checked", true );
            } else {
                $( "#Direccionamiento" ).prop( "checked", false );
            }
            if(data[0].AgendadoCl == 1) {
                $( "#AgendadoCl" ).prop( "checked", true );
            } else {
                $( "#AgendadoCl" ).prop( "checked", false );
            }
            if(data[0].AgendadoCoyser == 1) {
                $( "#AgendadoCoyser" ).prop( "checked", true );
            } else {
                $( "#AgendadoCoyser" ).prop( "checked", false );
            }
            if(data[0].MailCl == 1) {
                $( "#MailCl" ).prop( "checked", true );
            } else {
                $( "#MailCl" ).prop( "checked", false );
            }
            if(data[0].MailBackup == 1) {
                $( "#MailBackup" ).prop( "checked", true );
            } else {
                $( "#MailBackup" ).prop( "checked", false );
            }
            if(data[0].FortiCloud == 1) {
                $( "#FortiCloud" ).prop( "checked", true );
            } else {
                $( "#FortiCloud" ).prop( "checked", false );
            }
            $(".modal-header").css("background-color", "#4e73df");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("Editar Pedido");  
            $("#btnGuardar").text("Actualizar");
            $("#AddOrdrBttn").hide();
            $("#EdtOrdrBttn").show();
            $("#ActnTrcng").show();
            $("#WndwsOrdrs").modal("show");  
         }  
    });  
});
    
    $(document).on('click', '#EdtOrdrBttn', function (e) {
        e.preventDefault();
    $('#actn').val("Edt");
    var Ordrs = {
        Ordr: $("#Ordr").val(),
        CIF: $("#CIF").val(),
        Nm: $("#Nm").val(),
        Cstmr: $("#Cstmr").val(),        
        CstmrEml: $("#CstmrEml").val(),
        CstmrPhn: $("#CstmrPhn").val(),
        StrtAddrss: $("#StrtAddrss").val(),
        AMD: $("#AMD").val(),
        Mdl: $("#Mdl").val(),
        AMDPhnNmbr: $("#AMDPhnNmbr").val(),
        Scn: $("#Scn").val(),
        SrlNmbr: $("#SrlNmbr").val(),
        SrlNmbrBkp: $("#SrlNmbrBkp").val(),
        HA: $("#HA:checked").val(),
        Anlyss: $("#Anlyss:checked").val(),
        Exctn: $("#Exctn:checked").val(),
        Pndng: $("#Pndng:checked").val(),
        Prvsnd: $("#Prvsnd:checked").val(),
        Fnshd: $("#Fnshd:checked").val(),
    }
    $.ajax({  
         url:"bd/pedido.php",  
         method:"POST",  
         data:{opcion:3, Ordrs:Ordrs},  
         dataType:"json",  
        success: function (data) {
            console.log(data[0]);
            $("#WndwsOrdrs").modal("hide");  
         }  
    });  
});
    $(document).on('click', '#EdtTrcngBttn', function (e) {
        e.preventDefault();
    $('#ActnTrcng').val("EdtTrcng");
    var Ordrs = {
        Ordr: $("#Ordr").val(),
        FMG: $("#FMG:checked").val(),
        Ready: $("#Ready:checked").val(),
        Unified: $("#Unified:checked").val(),
        Direccionamiento: $("#Direccionamiento:checked").val(),
        AgendadoCl: $("#AgendadoCl:checked").val(),
        AgendadoCoyser: $("#AgendadoCoyser:checked").val(),
        MailCl: $("#MailCl:checked").val(),
        MailBackup: $("#MailBackup:checked").val(),
        FortiCloud: $("#FortiCloud:checked").val(),
    }
    $.ajax({  
         url:"bd/pedido.php",  
         method:"POST",  
         data:{opcion:4, Ordrs:Ordrs},  
         dataType:"json",  
        success: function (data) {
            console.log(data[0]);
            $("#WndwsOrdrs").modal("hide");  
         }  
    });  
});
    
$(document).on("click", "#AddOrdrBttn", function(e){    
    e.preventDefault();
var Ordrs = {
    CIF: $("#CIF").val(),
    Nm: $("#Nm").val(),
    Ordr: $("#Ordr").val(),
    Cstmr: $("#Cstmr").val(),
    CstmrEml: $("#CstmrEml").val(),
    CstmrPhn: $("#CstmrPhn").val(),
    StrtAddrss: $("#StrtAddrss").val(),
    AMD: $("#AMD").val(),
    Mdl: $("#Mdl").val(),
    AMDPhnNmbr: $("#AMDPhnNmbr").val(),
    Scn: $("#Scn").val(),
    SrlNmbr: $("#SrlNmbr").val(),
    SrlNmbrBkp: $("#SrlNmbrBkp").val(),
    HA: $("#HA:checked").val(),
    Anlyss: $("#Anlyss:checked").val(),
    Exctn: $("#Exctn:checked").val(),
    Pndng: $("#Pndng:checked").val(),
    Prvsnd: $("#Prvsnd:checked").val(),
    Fnshd: $("#Fnshd:checked").val(),
}
$.ajax({
    url: "bd/pedido.php",
    type: "POST",
    dataType: "json",
    data: {opcion:3, Ordrs:Ordrs},
    success: function(data){  
        console.log(data);
        /*id = data[0].id;            
        nombre = data[0].nombre;
        pais = data[0].pais;
        edad = data[0].edad;
        if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
        else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();} */           
    }        
});
$("#WndwsOrdrs").modal("hide");  
});
    
    /**
     * MODELO
     */
    
//botón EDITAR Modelo
$(document).on("click", ".UpdtdMdl", function(){
    fila = $(this).closest("tr");
    Rfrnc = fila.find('td:eq(0)').text();
    MD5 = fila.find('td:eq(1)').text();
    Nms = fila.find('td:eq(2)').text();
    Dscrptn = fila.find('td:eq(3)').text();
    
    $("#mdls_md5").val(MD5);
    $("#mdls_rfrnc").val(Rfrnc);
    $("#nms").val(Nms);
    $("#dscrptn").val(Dscrptn);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#WndwsMdls").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$(document).on("click", ".btnBorrarPedido", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});

function ChckbxAlrt(Actvtd, Typ) {
    
    switch (Actvtd) {
        case 0:
            break;
        
        case 1:
            $(document).on("click", "#" + Typ, function () {
                if ($("#" + Typ).prop("checked")) {
                    
                    Swal.fire({
                        title: '¿Quieres activar esta opción?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Activar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Activado',
                                'Has activado',
                                'success'
                            )
                            $("#" + Typ).prop("checked", true);
                        } else {
                            $("#" + Typ).prop("checked", false);
                        }
                    });

                } else {
                    Swal.fire({
                        title: '¿Quieres desactivar esta opción?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Desactivar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Activado',
                                'Has activado',
                                'success'
                            )
                            $("#" + Typ).prop("checked", false);
                        } else {
                            $("#" + Typ).prop("checked", true);
                        }
                    });
                }
            });
            break;
    }

    }
    
    ChckbxAlrt(1, "HA");
    ChckbxAlrt(1, "Anlyss");
    ChckbxAlrt(1, "Exctn");
    ChckbxAlrt(1, "Pndng");
    ChckbxAlrt(1, "Prvsnd");
    ChckbxAlrt(1, "Fnshd");
    
    ChckbxAlrt(1, "FMG");
    ChckbxAlrt(1, "Ready");
    ChckbxAlrt(1, "Unified");
    ChckbxAlrt(1, "Direccionamiento");
    ChckbxAlrt(1, "AgendadoCl");
    ChckbxAlrt(1, "AgendadoCoyser");
    ChckbxAlrt(1, "MailCl");
    ChckbxAlrt(1, "MailBackup");
    ChckbxAlrt(1, "FortiCloud");
    
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    pais = $.trim($("#pais").val());
    edad = $.trim($("#edad").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, pais:pais, edad:edad, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            pais = data[0].pais;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});
    
/*$("#FrmOrdrs").submit(function(e){
      
    
});*/
    
    
    $("#FrmMdls").submit(function(e){
        e.preventDefault();    
        Nms     = $.trim($("#nms").val());
        Dscrptn = $.trim($("#dscrptn").val());
        $.ajax({
            url: "bd/modelo.php",
            type: "POST",
            dataType: "json",
            data: { Rfrnc: Rfrnc, Nms: Nms, Dscrptn: Dscrptn, Optn: opcion }, 
            success: function (data) {                
                console.log(data);
                Rfrnc = data[0].Rfrnc;            
                MD5 = data[0].MD5;            
                Nms = data[0].Nms;
                Dscrptn = data[0].Dscrptn;
                DtAdmssn = data[0].DtAdmssn;
                ChckTm = data[0].ChckTm;
                if(opcion == 1){TblMdls.row.add([Rfrnc, MD5, Nms,Dscrptn,DtAdmssn,ChckTm]).draw();}
                else{TblMdls.row(fila).data([Rfrnc, MD5, Nms,Dscrptn,DtAdmssn,ChckTm]).draw();}         
            }        
        });
        $("#WndwsMdls").modal("hide");    
        
    });

    $("#FrmScnrs").submit(function(e){
        e.preventDefault();    
        Nms     = $.trim($("#nms").val());
        Dscrptn = $.trim($("#dscrptn").val());
        $.ajax({
            url: "bd/escenario.php",
            type: "POST",
            dataType: "json",
            data: { Rfrnc: Rfrnc, Nms: Nms, Dscrptn: Dscrptn, Optn: opcion }, 
            success: function (data) {                
                console.log(data);
                Rfrnc = data[0].Rfrnc;            
                MD5 = data[0].MD5;            
                Nms = data[0].Nms;
                Dscrptn = data[0].Dscrptn;
                DtAdmssn = data[0].DtAdmssn;
                ChckTm = data[0].ChckTm;
                if(opcion == 1){TblScnrs.row.add([Rfrnc, MD5, Nms,Dscrptn,DtAdmssn,ChckTm]).draw();}
                else{TblScnrs.row(fila).data([Rfrnc, MD5, Nms,Dscrptn,DtAdmssn,ChckTm]).draw();}         
            }        
        });
        $("#WndwsScnrs").modal("hide");    
        
    });
    
});