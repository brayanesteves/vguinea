<?php
    include_once './bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
        $id = $_POST['Event'][0];
        $start = $_POST['Event'][1];
        $end = $_POST['Event'][2];
     
        $sql = "UPDATE `0_Schdl` SET  `IntlDt` = '$start', `FnlDt` = '$end' WHERE `Rfrnc` = $id;";
     
        
        $query = $conexion->prepare( $sql );
        if ($query == false) {
         print_r($conexion->errorInfo());
         die ('Error');
        }
        $sth = $query->execute();
        if ($sth == false) {
         print_r($query->errorInfo());
         die ('Error');
        }else{
            die ('OK');
        }
     
    }
    //header('Location: '.$_SERVER['HTTP_REFERER']);
?>