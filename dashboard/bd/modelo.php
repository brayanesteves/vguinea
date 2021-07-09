<?php
ini_set('display_errors', 1);
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$MD5     = (isset($_POST['MD5'])) ? $_POST['MD5'] : '';
$Rfrnc   = (isset($_POST['Rfrnc'])) ? $_POST['Rfrnc'] : '';
$Nms     = (isset($_POST['Nms'])) ? $_POST['Nms'] : '';
$Dscrptn = (isset($_POST['Dscrptn'])) ? $_POST['Dscrptn'] : '';
$Optn    = (isset($_POST['Optn'])) ? $_POST['Optn'] : '';
switch($Optn){
    case 1: //alta
        $consulta = "INSERT INTO `0_Mdls` (`Rfrnc`, `Nms`, `Dscrptn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES(NULL, '$Nms', '$Dscrptn', 1, 0, 0, '" . Date("Y-m-d") . "', '" . Date("H:i:s") . "');";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT MD5(CONCAT(`Rfrnc`, `DtAdmssn`, `ChckTm`)) AS `MD5`, `Rfrnc`, `Nms`, `Dscrptn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm` FROM `0_Mdls` WHERE `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0 ORDER BY `Rfrnc` DESC LIMIT 1;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE `0_Mdls` SET `Nms`='$Nms', `Dscrptn`='$Dscrptn' WHERE MD5(CONCAT(`Rfrnc`, `DtAdmssn`, `ChckTm`))='$MD5';";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT MD5(CONCAT(`Rfrnc`, `DtAdmssn`, `ChckTm`)) AS `MD5`, `Rfrnc`, `Nms`, `Dscrptn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm` FROM `0_Mdls` WHERE MD5(CONCAT(`Rfrnc`, `DtAdmssn`, `ChckTm`))='$MD5';";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "UPDATE `0_Mdls` SET `Nms`='$nombre', `Dscrptn`='$pais', edad='$edad' WHERE MD5(CONCAT(`Rfrnc`, `DtAdmssn`, `ChckTm`)) ='$id';";  
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 
        
    default:
        $data = "Unknow";
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>