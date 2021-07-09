<?php

// Conexion a la base de datos
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


    $UsrRfrnc = (isset($_POST['UsrRfrnc'])    && $_POST['UsrRfrnc']    != NULL ? $_POST['UsrRfrnc']    : '');
	$Pntr     = (isset($_POST['Pntr'])    && $_POST['Pntr']    != NULL ? $_POST['Pntr']    : '');
	$Nms      = (isset($_POST['Nms'])      && $_POST['Nms']      != NULL ? $_POST['Nms']      : '');
	$Dscrptn  = (isset($_POST['Dscrptn']) && $_POST['Dscrptn'] != NULL ? $_POST['Dscrptn'] : '');
	$IntlDt   = (isset($_POST['IntlDt'])  && $_POST['IntlDt']  != NULL ? $_POST['IntlDt']  : '');
	$FnlDt    = (isset($_POST['FnlDt'])   && $_POST['FnlDt']   != NULL ? $_POST['FnlDt']   : '');

	$sql = "INSERT INTO `0_Schdl`(`Rfrnc`, `UsrRfrnc`, `RfrncClssfctn`, `Pntr`, `Nms`, `Dscrptn`, `Cndtn`, `Rmvd`, `Lckd`, `IntlDt`, `FnlDt`, `DtAdmssn`, `ChckTm`) VALUES (NULL, $UsrRfrnc, 0, '$Pntr', '$Nms', '$Dscrptn', 1, 0, 0, '$IntlDt', '$FnlDt', '" . Date('Y-m-d') . "', '" . Date('H:i:s') . "');";
	
	echo $sql;
	
	$query = $conexion->prepare($sql);
	if ($query == false) {
	 print_r($conexion->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}


header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>