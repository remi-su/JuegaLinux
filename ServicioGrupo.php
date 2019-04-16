<?php
session_start();
function ConectarBaseDatos($sql){

	$mysqli = new mysqli('127.0.0.1', 'root', '', 'proyecto_2');
	if(!$mysqli){
		return false; 
	}
	else{
		$resultado = $mysqli->query($sql);
		$mysqli->close();
		return $resultado;               
	}

}

function crearGrupo (){
	$usuarioMaestro = $_SESSION["usuario"];
	$grado = $_POST["grado"];
	$grupo = $_POST["grupo"];
	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT * FROM grupos where idMaestro = $idMaestro AND grado = $grado AND grupo = '$grupo'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows <= 0){
		$sql = "INSERT INTO `grupos`(`idMaestro`, `grado`, `grupo`,`estado`) VALUES ($idMaestro,$grado,'$grupo',1)";
		$resultado = ConectarBaseDatos($sql);

		if ($resultado){
			return '{ "Mensaje": "¡Creación del grupo exitosa!"}';
		} else {
			return '{ "Mensaje": "Error en la creación del grupo, intentelo de nuevo"}';
		}
	} else {
		return '{ "Mensaje": "Ya se encuentra un grupo con esa descripción"}';
	}
}

function obtenerGrupos(){
	$estado = $_POST["estado"];
	$listaString = '{"lista":[';
	$sql = "SELECT * FROM grupos WHERE estado= $estado";
	$resultado = ConectarBaseDatos($sql);
	$numeroElementos = $resultado->num_rows;
	for ($i=0; $i < $numeroElementos; $i++) {
		$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
		$grado = $fila["grado"];
		$grupo = $fila["grupo"];
		$idGrupo = $fila["idGrupo"];
		$listaString .='{"idGrupo":'.'"'.$idGrupo.'"'.',"grado":'.'"'.$grado.'"'.', "grupo":'.'"'.$grupo.'"}';
		if ($i < $numeroElementos - 1){
			$listaString .= ",";
		}
	}
	return $listaString."]}";
}

//Modificar
function eliminarGrupos(){
	
	$idGrupo = $_POST["idGrupo"];

	$sql = "SELECT idGrupo FROM grupos where idGrupo = $idGrupo";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "UPDATE `grupos` SET `estado`=0 where idGrupo = $idGrupo";
		$resultado = ConectarBaseDatos($sql);

		if ($resultado){
			return '{ "Mensaje":"¡Deshabilitación del grupo exitosa!"}';
		} else {
			return '{ "Mensaje": "Error en la deshabilitación del grupo, intentelo de nuevo"}';
		}
	} else {
		return '{"Mensaje":"No hay ningun grupo con esa descripción"}';
	}
}


function modificarGrupos(){
	$idGrupo = $_POST["idGrupo"];
	$gradoNuevo = $_POST["gradoNuevo"];
	$grupoNuevo = $_POST["grupoNuevo"];



	$sql = "SELECT * FROM grupos where idGrupo = $idGrupo";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		
		$sql = "UPDATE `grupos` SET `grado`=$gradoNuevo,`grupo`='$grupoNuevo' WHERE idGrupo = $idGrupo";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado){
			return '{"Mensaje":"La modificación se realizó exitosamente"}';
		} else {
			return '{"Mensaje":"Hubo un error en el proceso, intente nuevamente más tarde"}';
		}
	
	} else {
		return '{"Mensaje":"No existe el grupo al que se quiere modificar"}';
	}
}

function activarGrupo(){
	$usuarioMaestro = $_SESSION["usuario"];
	$gradoActivar = $_POST["gradoActivar"];
	$grupoAactivar = $_POST["grupoActivar"];

	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT * FROM grupos where idMaestro = $idMaestro AND grado = $gradoActivar AND grupo = '$grupoActivar'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		
		$sql = "UPDATE `grupos` SET `estado`= 1 WHERE idMaestro = $idMaestro AND grado = $gradoActivo AND grupo = '$grupoActivo'";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado){
			return '{"Mensaje":"La activación se realizó exitosamente"}';
		} else {
			return '{"Mensaje":"Hubo un error en el proceso, intente nuevamente más tarde"}';
		}
	} else {
		return '{"Mensaje":"No existe el grupo al que se quiere activar"}';
	}	
}

if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$action = $_POST['tipo'];
	switch($action) {
		case "crearGrupo" : echo crearGrupo();break;
		case "obtenerGrupos" : echo obtenerGrupos();break;
		case "modificarGrupo" : echo modificarGrupos();break;
		case "eliminarGrupo" : echo eliminarGrupos(); break;
		case "activarGrupo" : echo activarGrupo(); break;
	}
}