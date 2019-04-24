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

function obtenerInformacionGeneralAlumnos(){
	$data['numeroEstudiantes'] = obtenerNumeroTotalAlumnos();
	$data['cantidadGrupos'] = obtenerNumeroGrupos();
	$data['cantidadGrupo1'] = obtenerNumeroTotalAlumnosGrupo(1);
	$data['cantidadGrupo2'] = obtenerNumeroTotalAlumnosGrupo(2);

	return json_encode($data);
}

function obtenerNumeroTotalAlumnos(){
	$sql = "SELECT count(idAlumno) as value from alumnos";
	$resultado = ConectarBaseDatos($sql);
	return $resultado->fetch_array(MYSQLI_ASSOC)['value'];
}


function obtenerNumeroTotalAlumnosGrupo($grupo){
	$sql = "SELECT count(idAlumno) as value from alumnos where idGrupo=$grupo";
	$resultado = ConectarBaseDatos($sql);
	return $resultado->fetch_array(MYSQLI_ASSOC)['value'];
}

function obtenerNumeroGrupos(){
	$sql = "SELECT count(idGrupo) as value from grupos";
	$resultado = ConectarBaseDatos($sql);
	return $resultado->fetch_array(MYSQLI_ASSOC)['value'];
}

function crearFolder($estructura){
	if(!mkdir($estructura, 0777, true)) {
	    die('Fallo al crear las carpetas...');
	}
}

function agregarImagen(){

}

function agregarAlumnoSistema(){
	$idGrupo = $_POST["idGrupo"];
	$nombreAlumno = $_POST["nombreAlumno"];
	$apellidoAlumno = $_POST["apellidoAlumno"];

	$sql = "SELECT idGrupo FROM grupos where idGrupo = $idGrupo";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "SELECT * FROM alumnos where idGrupo = $idGrupo AND nombreAlumno = '$nombreAlumno' AND apellidoAlumno = '$apellidoAlumno'";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado->num_rows <= 0){
			$sql = "INSERT INTO `alumnos`(`idGrupo`, `nombreAlumno`, `apellidoAlumno`,`estado`) VALUES ($idGrupo,'$nombreAlumno','$apellidoAlumno',1)";
			$resultado = ConectarBaseDatos($sql);
			if ($resultado){
				return '{"Mensaje":"La Carga del alumno fue exitosa"}';
			} else {
				return '{"Mensaje":"Hubo un error en el proceso, intente nuevamente"}';
			}
		} else {
			return '{"Mensaje":"Ya existe un alumno con esas caracteristicas"}';
		}
	} else {
		return '{"Mensaje":"No existe el grupo al cual se quiere introducir el alumno"}';
	}

}

function deshabilitarAlumnoSistema(){
	$idAlumno = $_POST["idAlumno"];
	
	$sql = "SELECT * FROM alumnos WHERE idAlumno = $idAlumno";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "UPDATE `alumnos` SET `estado`=0 WHERE idAlumno = $idAlumno";
		$resultado = ConectarBaseDatos($sql);
		if($resultado){
			return '{"Mensaje":"El Alumno ha sido deshabilitado.."}';
		} else {
			return '{"Mensaje":"No se pudo deshabilitar el alumno. Intente más tarde."}';
		}
	} else {
		return '{"Mensaje":"No existe el alumno a deshabilitar"}';
	}
	
}
//Corregir ALV
function modificarAlumno(){
	$idAlumno = $_POST["idAlumno"];
	$nombreNuevo = $_POST["nombreNuevo"];
	$apellidoNuevo = $_POST["apellidoNuevo"];

	$sql = "SELECT * FROM alumnos WHERE idAlumno = $idAlumno";
	$resultado = ConectarBaseDatos($sql);

	if ($resultado->num_rows > 0){
		$sql = "UPDATE `alumnos` SET `nombreAlumno`='$nombreNuevo',`apellidoAlumno`='$apellidoNuevo' WHERE idAlumno = $idAlumno";
		$resultado = ConectarBaseDatos($sql);
		if($resultado){
			return '{"Mensaje":"Modificación completada correctamente."}';
		} else {
			return '{"Mensaje":"No se realizó correctamente la modificación. Intentar nuevamente."}';
		}
	} else {
		return '{"Mensaje":"No existe el alumno a  modificar."}';
	}
}

function activarAlumno(){
	$idAlumno = $_POST["idAlumno"];

	$sql = "SELECT * FROM alumnos WHERE idAlumno = $idAlumno";
	$resultado = ConectarBaseDatos($sql);

	if ($resultado->num_rows > 0){
		$sql = "UPDATE `alumnos` SET `estado`= 1 WHERE idAlumno = $idAlumno";
		$resultado = ConectarBaseDatos($sql);
		if($resultado){
			return '{"Mensaje":"Habilitación del alumno completada correctamente."}';
		} else {
			return '{"Mensaje":"No se realizó correctamente la habilitación. Intentar nuevamente."}';
		}
	} else {
		return '{"Mensaje":"No existe el alumno a habilitar."}';
	}
}

function obtenerAlumnos(){

	$idGrupo = $_POST["idGrupo"];
	$estado = $_POST["estado"];

	$listaString = '{"lista":[';
	

	$sql = "SELECT idGrupo FROM grupos where idGrupo = $idGrupo";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
		$idGrupo = $fila["idGrupo"];
		$sql = "SELECT * FROM alumnos WHERE idGrupo = $idGrupo AND estado = $estado";
		$resultado = ConectarBaseDatos($sql);
		$numeroElementos = $resultado->num_rows;
		for ($i=0; $i < $numeroElementos; $i++) {
			$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
			$idAlumno = $fila["idAlumno"];
			$nombreAlumno = $fila["nombreAlumno"];
			$apellidoAlumno = $fila["apellidoAlumno"];
			$listaString .='{'.'"idAlumno":'.'"'.$idAlumno.'",'.'"nombreAlumno":'.'"'.$nombreAlumno.'",'.'"apellidoAlumno":'.'"'.$apellidoAlumno.'"}';
			if ($i < $numeroElementos - 1){
				$listaString .= ",";
			}
		}
		return $listaString."]}";
	}
}

function obtenerTodosAlumnos(){

	$estado = $_POST["estado"];
	$listaString = '{"lista":[';

		$sql = "SELECT * FROM alumnos WHERE estado = $estado";
		$resultado = ConectarBaseDatos($sql);
		$numeroElementos = $resultado->num_rows;
		for ($i=0; $i < $numeroElementos; $i++) {
			$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
			$idAlumno = $fila["idAlumno"];
			$idGrupo = $fila['idGrupo'];
			$nombreAlumno = $fila["nombreAlumno"];
			$apellidoAlumno = $fila["apellidoAlumno"];
			$listaString .='{'.'"idAlumno":'.'"'.$idAlumno.'",'.'"idGrupo":'.$idGrupo.','.'"nombreAlumno":'.'"'.$nombreAlumno.'",'.'"apellidoAlumno":'.'"'.$apellidoAlumno.'"}';
			if ($i < $numeroElementos - 1){
				$listaString .= ",";
			}
		}

		return $listaString."]}";
}




if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$action = $_POST['tipo'];

	switch($action) {
		case "crearAlumno" : echo agregarAlumnoSistema(); break;
		case "agregarImagen": echo agregarImagen(); break;
		case "obtenerAlumnos" : echo obtenerAlumnos(); break;
		case "obtenerTodosAlumnos" : echo obtenerTodosAlumnos(); break;
		case "deshabilitarAlumno" : echo deshabilitarAlumnoSistema(); break;
		case "modificarAlumno" : echo modificarAlumno(); break;
		case "activarAlumno" : echo activarAlumno(); break;
		case "obtenerNumeroAlumnos" : echo obtenerInformacionGeneralAlumnos() ;break;
	}
}


