<?php

session_start();
function ConectarBaseDatos($sql){

	$mysqli = new mysqli('127.0.0.1', 'root', '', 'proyectolinux');
	if(!$mysqli){
		return false; 
	}
	else{
		$resultado = $mysqli->query($sql);
		$mysqli->close();
		return $resultado;               
	}

}

 function obtenerPalabrasActividad (){
 	$idActividad = $_POST["idActividad"];
 	$sql = "SELECT palabra FROM palabrassopaletras WHERE idActividad = $idActividad";
 	$resultado = ConectarBaseDatos($sql);

 	if ($resultado->num_rows > 0){
 		$htmlInner = "";
 		for ($i=0; $i < $resultado->num_rows; $i++) { 
 			$fila = $resultado->fetch_array(MYSQLI_ASSOC);
 			$htmlInner .= $fila["palabra"].";";
 		}
 		return $htmlInner;
 	} else {
 		return 0;
 	}

 }

 if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$action = $_POST['tipo'];
	switch($action) {
		case "obtenerPalabrasActividad": echo obtenerPalabrasActividad(); break;
	}
}