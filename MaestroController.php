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
		$sql = "INSERT INTO `grupos`(`idMaestro`, `grado`, `grupo`) VALUES ($idMaestro,$grado,'$grupo')";
		$resultado = ConectarBaseDatos($sql);

		if ($resultado){
			return "Creación del grupo Exitosa!";
		} else {
			return "Error en la creación del grupo, intentelo de nuevo";
		}
	} else {
		return "Ya se encuentra un grupo con esa descripción";
	}
}

function obtenerGrupos(){
	$listaString = "";
	$sql = "SELECT * FROM grupos WHERE 1";
	$resultado = ConectarBaseDatos($sql);
	$numeroElementos = $resultado->num_rows;
	for ($i=0; $i < $numeroElementos; $i++) {
		$fila =  $resultado->fetch_array(MYSQLI_ASSOC); 
		$listaString .=$fila["grado"]."-".$fila["grupo"].",";
	}
	return $listaString;
}

function eliminarGrupos(){
	$usuarioMaestro = $_SESSION["usuario"];
	$grado = $_POST["grado"];
	$grupo = $_POST["grupo"];
	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT * FROM grupos where idMaestro = $idMaestro AND grado = $grado AND grupo = '$grupo'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "DELETE FROM `grupos` WHERE idMaestro = $idMaestro AND grado = $grado AND grupo = '$grupo'";
		$resultado = ConectarBaseDatos($sql);

		if ($resultado){
			return "Eliminación del grupo Exitoso!";
		} else {
			return "Error en la eliminación del grupo, intentelo de nuevo";
		}
	} else {
		return "No hay ningun grupo con esa descripción";
	}
}
function modificarGrupos(){
	$usuarioMaestro = $_SESSION["usuario"];
	$gradoAModificar = $_POST["gradoAModificar"];
	$grupoAModificar = $_POST["grupoAModificar"];
	$gradoNuevo = $_POST["gradoNuevo"];
	$grupoNuevo = $_POST["grupoNuevo"];

	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT * FROM grupos where idMaestro = $idMaestro AND grado = $gradoAModificar AND grupo = '$grupoAModificar'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "SELECT * FROM grupos where idMaestro = $idMaestro AND grado = $gradoNuevo AND grupo = '$grupoNuevo'";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado->num_rows <= 0){
			$sql = "UPDATE `grupos` SET `grado`=$gradoNuevo,`grupo`='$grupoNuevo' WHERE idMaestro = $idMaestro AND grado = $gradoAModificar AND grupo = '$grupoAModificar'";
			$resultado = ConectarBaseDatos($sql);
			if ($resultado){
				return "La modificación se realizó exitosamente";
			} else {
				return "Hubo un error en el proceso, intente nuevamente más tarde";
			}
		}	else {
			return "Ya existe un grupo con las mismas especificaciones";
		}
	} else {
		return "No existe el grupo al que se quiere modificar";
	}
}

function agregarAlumnoSistema(){
	$usuarioMaestro = $_SESSION["usuario"];
	$grado = $_POST["grado"];
	$grupo = $_POST["grupo"];
	$nombreAlumno = $_POST["nombreAlumno"];
	$apellidoAlumno = $_POST["apellidoAlumno"];

	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT idGrupo FROM grupos where idMaestro = $idMaestro AND grado = $grado AND grupo = '$grupo'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
		$idGrupo = $fila["idGrupo"];
		$sql = "SELECT * FROM alumnos where idGrupo = $idGrupo AND nombreAlumno = '$nombreAlumno' AND apellidoAlumno = '$apellidoAlumno'";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado->num_rows <= 0){
			$sql = "INSERT INTO `alumnos`(`idGrupo`, `nombreAlumno`, `apellidoAlumno`) VALUES ($idGrupo,'$nombreAlumno','$apellidoAlumno')";
			$resultado = ConectarBaseDatos($sql);
			if ($resultado){
				return "La Carga del alumno fue exitosa";
			} else {
				return "Hubo un error en el proceso, intente nuevamente";
			}
		} else {
			return "Ya existe un alumno con esas caracteristicas";
		}
	} else {
		return "No existe el grupo al cual se quiere introducir el alumno";
	}

}

function eliminarAlumnoSistema(){
	$usuarioMaestro = $_SESSION["usuario"];
	$idAlumno = $_POST["idAlumno"];
	
	$sql = "SELECT * FROM alumnos WHERE idAlumno = $idAlumno";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "DELETE FROM alumnos where idAlumno = $idAlumno";
		$resultado = ConectarBaseDatos($sql);
		if($resultado){
			return "Eliminación realizada correctamente.";
		} else {
			return "No se pudo eliminar el alumno.";
		}
	} else {
		return "No existe el alumno a eliminar";
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
			echo "Modificación completada correctamente.";
		} else {
			echo "No se realizó correctamente la modificación. Intentar nuevamente.";
		}
	} else {
		return "No existe el alumno a  modificar.";
	}
}

function obtenerAlumnos(){

	$usuarioMaestro = $_SESSION["usuario"];
	$grado = $_POST["grado"];
	$grupo = $_POST["grupo"];
	$listaString = "";
	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT idGrupo FROM grupos where idMaestro = $idMaestro AND grado = $grado AND grupo = '$grupo'";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
		$idGrupo = $fila["idGrupo"];
		$sql = "SELECT * FROM alumnos WHERE idGrupo = $idGrupo";
		$resultado = ConectarBaseDatos($sql);
		$numeroElementos = $resultado->num_rows;
		for ($i=0; $i < $numeroElementos; $i++) {
			$fila =  $resultado->fetch_array(MYSQLI_ASSOC); 
			$listaString .=$fila["idAlumno"]."-".$fila["nombreAlumno"]."-".$fila["apellidoAlumno"].",";
		}
		return $listaString;
	}
}

function obtenerAreas(){
	$sql = "SELECT * FROM areaeducacional WHERE 1";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$listaString = "";
		$numeroElementos = $resultado->num_rows;
		for ($i=0; $i < $numeroElementos; $i++) { 
			$fila = $resultado->fetch_array(MYSQLI_ASSOC);
			$listaString .=  $fila["idArea"]."-".utf8_encode($fila["nombreArea"]).",";
		}
		return $listaString;
	}
}

function obtenerTipoActividades(){
	$sql = "SELECT * FROM tipoactividad WHERE 1";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$listaString = "";
		$numeroElementos = $resultado->num_rows;
		for ($i=0; $i < $numeroElementos; $i++) { 
			$fila = $resultado->fetch_array(MYSQLI_ASSOC);
			$listaString .=  $fila["idTipoActividad"]."-".$fila["nombreTipo"].",";
		}
		return $listaString;
	}
}

function crearActividad(){
	$nombreActividad = $_POST["nombreActividad"];
	$temaActividad = $_POST["temaActividad"];
	$idAreaActividad = $_POST["idAreaActividad"];
	$descripciónActividad = $_POST["descripcionActividad"];
	$fechaLiberacion = $_POST["fechaLiberacion"];
	$fechaCreacion = date("Y-m-d");
	$idTipoActividad = $_POST["idTipoActividad"];
	$usuarioMaestro = $_SESSION["usuario"];
	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql = "SELECT * FROM areaeducacional WHERE idArea = $idAreaActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "SELECT * FROM tipoactividad WHERE idTipoActividad = $idTipoActividad";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado->num_rows > 0){
			
			$sql = "SELECT * FROM actividades WHERE idMaestro = $idMAestro AND nombreActividad = '$nombreActividad' AND idTipoActividad = $idTipoActividad AND idAreaActividad = $idAreaActividad";
			$resultado = ConectarBaseDatos($sql);
			if($resultado->num_rows <= 0){
				$sql = "INSERT INTO `actividades`(`nombreActividad`,`idMaestro`, `temaActividad`, `idAreaActividad`, `descripcion`, `idTipoActividad`, `fechaCreacion`, `fechaLiberacion`) VALUES ('$nombreActividad',$idMaestro,'$temaActividad',$idAreaActividad,'$descripciónActividad','$idTipoActividad','$fechaCreacion','$fechaLiberacion')";
				$resultado = ConectarBaseDatos($sql);
				if ($resultado){
					$sql = "SELECT * FROM actividades WHERE nombreActividad = '$nombreActividad' AND idTipoActividad = $idTipoActividad AND idAreaActividad = $idAreaActividad";
					$resultado = ConectarBaseDatos($sql);
					$fila = $resultado->fetch_array(MYSQLI_ASSOC);
					$idActividad = $fila["idActividad"];
					return $idActividad;
				} else {
					return "Error en carga";
				}
			} else {
				return "Ya existe una actividad con ese nombre, tipo y area.";
			}
		} else {
			return "No existe el tipo de actividad seleccionada.";
		}
	}	else {
		return "No existe el area educaional seleccionada.";
	}
}

function crearActividadUnidades(){
	$unidades = $_POST["unidades"];
	$decenas = $_POST["decenas"];
	$centenas = $_POST["centenas"];
	$respuestasDistractoras = $_POST["respuestasD"];
	$descripcionRetro = $_POST["descripcionRetro"];
	$idActividad = $_POST["idActividad"];
	$

	$sql ="SELECT * FROM unidadesdescenascentenas WHERE idActividad = $idActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows <= 0){
		$sql = "INSERT INTO `unidadesdescenascentenas`(`idActividad`, `numeroUnidades`, `numeroDescenas`, `numeroCentenas`, `respuestasDistractoras`, `textoRetro`) VALUES ($idActividad, $unidades, $decenas, $centenas, '$respuestasDistractoras', '$descripcionRetro')";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado){
			return "Actividad creada correctamente.";
		} else {
			return "Error en el proceso, intentarlo nuevamente.";
		}
	} else {
		return "Ya existe una actividad.";
	}
}

function obtenerActividades(){

	$usuarioMaestro = $_SESSION["usuario"];
	$sql = "SELECT idMaestro FROM maestros where usuario = '$usuarioMaestro'";
	$resultado = ConectarBaseDatos($sql);

	$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
	$idMaestro = $fila["idMaestro"];

	$sql ="SELECT * FROM actividades WHERE idMaestro = $idMaestro";
	$resultado = ConectarBaseDatos($sql);
	$numeroElementos = $resultado->num_rows;
	if ($numeroElementos > 0){
		$listaActividades = array();
		for ($i=0; $i < $numeroElementos; $i++) { 
			$actividad  = array();
			$fila = $resultado->fetch_array(MYSQLI_ASSOC);
			$actividad[] = $fila["idActividad"];
			$actividad[] = $fila["nombreActividad"];
			$actividad[] = $fila["temaActividad"];
			$actividad[] = $fila["descripcion"];
			$actividad[] = $fila["fechaCreacion"];
			$actividad[] = $fila["fechaLiberacion"];
			$actividad[] = $fila["idAreaActividad"];
			$actividad[] = $fila["estadoActividad"];

			$listaActividades[] = $actividad;
		}
		return json_encode($listaActividades);
	} else {
		return "No hay actividades registradas";
	}
}


function eliminarActividad(){
	$idActividad = $_POST["idActividad"];
	$sql = "SELECT * FROM actividades WHERE idActividad = $idActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "DELETE FROM actividades WHERE idActividad = $idActividad";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado){
			return "Eliminación exitosa.";
		} else {
			return "Error en el proceso, intente más tarde.";
		}
	} else {
		return "No existe esta actividad.";
	}
}

function liberarActividad(){
	$idActividad = $_POST["idActividad"];
	$sql = "SELECT * FROM actividades WHERE idActividad = $idActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$fila = $resultado->fetch_array(MYSQLI_ASSOC);
		$estadoActividad = $fila["estadoActividad"];
		if ($estadoActividad == 0){
			$sql = "UPDATE `actividades` SET `estadoActividad`= 1 WHERE idActividad = $idActividad";
			$resultado = ConectarBaseDatos($sql);
			if ($resultado){
				return "Actividad liberada exitosamente.";
			} else {
				return "Error en el proceso, intente más tarde.";
			}
		} else {
			return "La actividad ya esta liberada.";
		}
	} else {
		return "No existe esta actividad.";
	}
}

function cerrarActividad(){
	$idActividad = $_POST["idActividad"];
	$sql = "SELECT * FROM actividades WHERE idActividad = $idActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$fila = $resultado->fetch_array(MYSQLI_ASSOC);
		$estadoActividad = $fila["estadoActividad"];
		if ($estadoActividad == 1){
			$sql = "UPDATE `actividades` SET `estadoActividad`= 0 WHERE idActividad = $idActividad";
			$resultado = ConectarBaseDatos($sql);
			if ($resultado){
				return "Actividad cerrada exitosamente.";
			} else {
				return "Error en el proceso, intente más tarde.";
			}
		} else {
			return "La actividad ya esta cerrada.";
		}
	} else {
		return "No existe esta actividad.";
	}
}

function modificarActividad(){
	$idActividad = $_POST["idActividad"];
	$nombreActividad = $_POST["nombreActividad"];
	$temaActividad = $_POST["temaActividad"];
	$idAreaActividad = $_POST["idAreaActividad"];
	$descripcionActividad = $_POST["descripcionActividad"];
	$fechaLiberacion = $_POST["fechaLiberacion"];
	$sql = "SELECT * FROM actividades WHERE idActividad = $idActividad";
	$resultado = ConectarBaseDatos($sql);
	if ($resultado->num_rows > 0){
		$sql = "UPDATE `actividades` SET `nombreActividad`='$nombreActividad',`temaActividad`='$temaActividad',`idAreaActividad`=$idAreaActividad,`descripcion`='$descripcionActividad',`fechaLiberacion`='$fechaLiberacion' WHERE idActividad = $idActividad";
		$resultado = ConectarBaseDatos($sql);
		if ($resultado){
			return "Actividad modificada correctamente";
		} else {
			return "Error en el proceso, intente más tarde."; 
		}
	}	else {
		return "No existe esta actividad.";
	}

}


function cargarPalabrasSopaLetras(){
	
}

function cambiarCredenciales(){

}

if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$action = $_POST['tipo'];
	switch($action) {
		case "crearGrupo" : echo crearGrupo();break;
		case "obtenerGrupos" : echo obtenerGrupos();break;
		case "modificarGrupo" : echo modificarGrupos();break;
		case "eliminarGrupo" : echo eliminarGrupos(); break;
		case "crearAlumno" : echo agregarAlumnoSistema(); break;
		case "obtenerAlumnos" : echo obtenerAlumnos(); break;
		case "eliminarAlumno" : echo eliminarAlumnoSistema(); break;
		case "modificarAlumno" : echo modificarAlumno(); break;
		case "obtenerAreas" : echo obtenerAreas(); break;
		case "obtenerTipoActividades": echo obtenerTipoActividades(); break;
		case "crearActividadDetalle" : echo crearActividad(); break;
		case "crearActividadUnidades" : echo crearActividadUnidades(); break;
	}
}