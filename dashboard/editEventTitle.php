<?php
// Conexion a la base de datos
include_once './bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "UPDATE `0_Schdl` SET  `Rmvd` = 1 WHERE `Rfrnc` = $id;";
	$query = $conexion->prepare( $sql );
	if ($query == false) {
	 print_r($conexion->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['Nms']) && isset($_POST['Dscrptn']) && isset($_POST['Pntr']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$Pntr = $_POST['Pntr'];
	$Nms = $_POST['Nms'];
	$Dscrptn = $_POST['Dscrptn'];
	
	$sql = "UPDATE `0_Schdl` SET  `Pntr` = '$Pntr', `Nms` = '$Nms', `Dscrptn` = '$Dscrptn' WHERE `Rfrnc` = $id;";

	
	$query = $conexion->prepare( $sql );
	if ($query == false) {
	 print_r($conexion->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: calendar.php');

	
?>