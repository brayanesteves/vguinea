<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS  

$Actn = (isset($_POST['Actn'])) ? $_POST['Actn'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$Ordr = (isset($_POST['Ordr'])) ? $_POST['Ordr'] : '';
$Ordrs = (isset($_POST['Ordrs'])) ? $_POST['Ordrs'] : '';

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$pais = (isset($_POST['pais'])) ? $_POST['pais'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';

$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){

    case 0:
        $consulta = "SELECT * FROM `tu_empresa_segura` WHERE MD5(`Pedido`) = '" . $Ordr . "';";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 1:
        $consulta = "SELECT MAX(`Pedido`) AS `MXMM` FROM `tu_empresa_segura`;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: //alta
        if(isset($Ordrs["HA"]) == "")     { $Ordrs["HA"] = 0;     } else { $Ordrs["HA"] = 1; }
        if(isset($Ordrs["Anlyss"]) == "") { $Ordrs["Anlyss"] = 0; } else { $Ordrs["Anlyss"] = 1; }
        if(isset($Ordrs["Exctn"]) == "")  { $Ordrs["Exctn"] = 0;  } else { $Ordrs["Exctn"] = 1; }
        if(isset($Ordrs["Pndng"]) == "")  { $Ordrs["Pndng"] = 0;  } else { $Ordrs["Pndng"] = 1; }
        if(isset($Ordrs["Prvsnd"]) == "") { $Ordrs["Prvsnd"] = 0; } else { $Ordrs["Prvsnd"] = 1; }
        if(isset($Ordrs["Fnshd"]) == "")  { $Ordrs["Fnshd"] = 0;  } else { $Ordrs["Fnshd"] = 1; }

        if(isset($Ordrs["FMG"]) == "")  { $Ordrs["FMG"] = 0;  } else { $Ordrs["FMG"] = 1; }
        if(isset($Ordrs["Ready"]) == "")  { $Ordrs["Ready"] = 0;  } else { $Ordrs["Ready"] = 1; }
        if(isset($Ordrs["Unified"]) == "")  { $Ordrs["Unified"] = 0;  } else { $Ordrs["Unified"] = 1; }
        if(isset($Ordrs["Direccionamiento"]) == "")  { $Ordrs["Direccionamiento"] = 0;  } else { $Ordrs["Direccionamiento"] = 1; }
        if(isset($Ordrs["AgendadoCl"]) == "")  { $Ordrs["AgendadoCl"] = 0;  } else { $Ordrs["AgendadoCl"] = 1; }
        if(isset($Ordrs["AgendadoCoyser"]) == "")  { $Ordrs["AgendadoCoyser"] = 0;  } else { $Ordrs["AgendadoCoyser"] = 1; }
        if(isset($Ordrs["MailCl"]) == "")  { $Ordrs["MailCl"] = 0;  } else { $Ordrs["MailCl"] = 1; }
        if(isset($Ordrs["MailBackup"]) == "")  { $Ordrs["MailBackup"] = 0;  } else { $Ordrs["MailBackup"] = 1; }
        if(isset($Ordrs["FortiCloud"]) == "")  { $Ordrs["FortiCloud"] = 0;  } else { $Ordrs["FortiCloud"] = 1; }

        $consulta = "INSERT INTO `tu_empresa_segura` (`Pedido`, `Nombre`, `Cif`, `ClNombre`, `Clmail`, `Cltelefono`, `Cldireccion`, `AMD`, `Modelo`, `Cotelefono`, `Escenario`, `Nserie1`, `Nserie2`, `HA`, `Analisis`, `Ejecucion`, `Pendiente`, `Provisionado`, `Finalizado`, `FMG`, `Ready`, `Unified`, `Direccionamiento`, `AgendadoCl`, `AgendadoCoyser`, `MailCl`, `MailBackup`, `FortiCloud`) VALUES (NULL , '" . $Ordrs["Nm"] . "', '" . $Ordrs["CIF"] . "', '" . $Ordrs["Cstmr"] . "', '" . $Ordrs["CstmrEml"] . "', '" . $Ordrs["CstmrPhn"] . "', '" . $Ordrs["StrtAddrss"] . "', '" . $Ordrs["AMD"] . "', '" . $Ordrs["Mdl"] . "', '" . $Ordrs["AMDPhnNmbr"] . "', '" . $Ordrs["Scn"] . "', '" . $Ordrs["SrlNmbr"] . "', '" . $Ordrs["SrlNmbrBkp"] . "', '" . $Ordrs["HA"] . "', '" . $Ordrs["Anlyss"] . "', '" . $Ordrs["Exctn"] . "', '" . $Ordrs["Pndng"] . "', '" . $Ordrs["Prvsnd"] . "', '" . $Ordrs["Fnshd"] . "', '" . $Ordrs["FMG"] . "', '" . $Ordrs["Ready"] . "', '" . $Ordrs["Unified"] . "', '" . $Ordrs["Direccionamiento"] . "', '" . $Ordrs["AgendadoCl"] . "', '" . $Ordrs["AgendadoCoyser"] . "', '" . $Ordrs["MailCl"] . "', '" . $Ordrs["MailBackup"] . "', '" . $Ordrs["FortiCloud"] . "');";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        //echo $consulta;

        $consulta = "SELECT * FROM `tu_empresa_segura` AS `A`;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3: //modificación
        $consulta = "UPDATE `tu_empresa_segura` SET `Nombre` = '" . $Ordrs["Nm"] . "', `Cif` = '" . $Ordrs["CIF"] . "', `ClNombre` = '" . $Ordrs["Cstmr"] . "', `Clmail` = '" . $Ordrs["CstmrEml"] . "', `Cltelefono` = '" . $Ordrs["CstmrPhn"] . "', `Cldireccion` = '" . $Ordrs["StrtAddrss"] . "', `AMD` = '" . $Ordrs["AMD"] . "', `Modelo` = '" . $Ordrs["Mdl"] . "', `Cotelefono` = '" . $Ordrs["AMDPhnNmbr"] . "', `Escenario` = '" . $Ordrs["Scn"] . "', `Nserie1` = '" . $Ordrs["SrlNmbr"] . "', `Nserie2` = '" . $Ordrs["SrlNmbrBkp"] . "', `HA` = '" . $Ordrs["HA"] . "', `Analisis` = '" . $Ordrs["Anlyss"] . "', `Ejecucion` = '" . $Ordrs["Exctn"] . "', `Pendiente` = '" . $Ordrs["Pndng"] . "', `Provisionado` = '" . $Ordrs["Prvsnd"] . "', `Finalizado` = '" . $Ordrs["Fnshd"] . " WHERE MD5(`Pedido`)='" . md5($Ordrs["Ordr"]) . "';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM `tu_empresa_segura` AS `A` WHERE MD5(`Pedido`)='". $Ordrs["Ordr"] ."';";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  

    case 4: //modificación
        if(isset($Ordrs["FMG"]) == "")  { $Ordrs["FMG"] = 0;  } else { $Ordrs["FMG"] = 1; }
        if(isset($Ordrs["Ready"]) == "")  { $Ordrs["Ready"] = 0;  } else { $Ordrs["Ready"] = 1; }
        if(isset($Ordrs["Unified"]) == "")  { $Ordrs["Unified"] = 0;  } else { $Ordrs["Unified"] = 1; }
        if(isset($Ordrs["Direccionamiento"]) == "")  { $Ordrs["Direccionamiento"] = 0;  } else { $Ordrs["Direccionamiento"] = 1; }
        if(isset($Ordrs["AgendadoCl"]) == "")  { $Ordrs["AgendadoCl"] = 0;  } else { $Ordrs["AgendadoCl"] = 1; }
        if(isset($Ordrs["AgendadoCoyser"]) == "")  { $Ordrs["AgendadoCoyser"] = 0;  } else { $Ordrs["AgendadoCoyser"] = 1; }
        if(isset($Ordrs["MailCl"]) == "")  { $Ordrs["MailCl"] = 0;  } else { $Ordrs["MailCl"] = 1; }
        if(isset($Ordrs["MailBackup"]) == "")  { $Ordrs["MailBackup"] = 0;  } else { $Ordrs["MailBackup"] = 1; }
        if(isset($Ordrs["FortiCloud"]) == "")  { $Ordrs["FortiCloud"] = 0;  } else { $Ordrs["FortiCloud"] = 1; }
        
        $consulta = "UPDATE `tu_empresa_segura` SET `FMG` = '" . $Ordrs["FMG"] . "', `Ready` = '" . $Ordrs["Ready"] . "', `Unified` = '" . $Ordrs["Unified"] . "', `Direccionamiento` = '" . $Ordrs["Direccionamiento"] . "', `AgendadoCl` = '" . $Ordrs["AgendadoCl"] . "', `AgendadoCoyser` = '" . $Ordrs["AgendadoCoyser"] . "', `MailCl` = '" . $Ordrs["MailCl"] . "', `MailBackup` = '" . $Ordrs["MailBackup"] . "', `FortiCloud` = '" . $Ordrs["FortiCloud"] . "' WHERE MD5(`Pedido`)='" . md5($Ordrs["Ordr"]) . "';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM `tu_empresa_segura` AS `A` WHERE MD5(`Pedido`)='". $Ordrs["Ordr"] ."';";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  

    case 5://baja
        $consulta = "DELETE FROM `tu_empresa_segura` WHERE MD5(`Pedido`)='" . $Ordr . "';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
