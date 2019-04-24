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

function obtenerNumeroActividades(){
	$sql = "SELECT COUNT(idActividad ) as value FROM actividadalumno";
	$resultado = ConectarBaseDatos($sql);
	

	$data['numeroActividades'] = $resultado->fetch_array(MYSQLI_ASSOC)['value'];
	$data['numeroActividadesEspanol'] =obtenerNumeroActividadesEspañol();
	$data['numeroActividadesMatematicas'] = obtenerNumeroActividadesMatematicas();

	return json_encode($data);
}

function obtenerNumeroActividadesEspañol(){
	$sql = "SELECT COUNT(idAreaActividad ) as value FROM actividades where 
	idAreaActividad=1";
	$resultado = ConectarBaseDatos($sql);
	return $resultado->fetch_array(MYSQLI_ASSOC)['value'];
}

function obtenerNumeroActividadesMatematicas(){
	$sql = "SELECT COUNT(idAreaActividad ) as value FROM actividades where 
	idAreaActividad=2";
	$resultado = ConectarBaseDatos($sql);
	return $resultado->fetch_array(MYSQLI_ASSOC)['value'];
}

function obtenerTiposActividades(){
	$sql = "SELECT DISTINCT idTipoActividad FROM `actividades` WHERE 1";
	$resultado = ConectarBaseDatos($sql);

	if ($resultado->num_rows > 0){
		$numeroActiviades = $resultado->num_rows > 0;
		$listaActividades = "[";
		for ($i=0; $i < $numeroActiviades; $i++) { 
			$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
			$sql = "SELECT * FROM tipoactividad WHERE idTipoActividad =".$fila["idTipoActividad"];
			$resultado = ConectarBaseDatos($sql);
			$fila =  $resultado->fetch_array(MYSQLI_ASSOC);
			$idTipoActividad = $fila["idTipoActividad"];
			$nombreTipo = $fila["nombreTipo"];
			$listaActividades .= '{'.'"idTipoActividad":'.'"'.$idTipoActividad.'",'.'"nombreTipo":'.'"'.$nombreTipo.'"}';
			if ($i < $numeroActiviades - 1){
				$listaActividades .= ",";
			}
		}
		return $listaActividades."]";
	}
	return "[]";
}

function obtenerReporteGrupal(){
	$idTipoActividad = $_POST["idTipoActividad"];
	$listaAlumnos = obtenerAlumnosGrupo($_POST["idGrupo"]);
	$fechaInicio = date($_POST["fechaInicio"]); //La fecha tiene que estar en formato d-m-y
	$fechaFin = date("d-m-Y",strtotime($fechaInicio."+ 1 week"));
	$semanaAnterior = date("d-m-Y",strtotime($fechaInicio."- 1 week"));

	$calificacionesAlumnos = array();
	$calificacionGrupal = 0;
	$calificacionGrupalAnterior = 0;
	$numeroAlumnos = count($listaAlumnos);

	for ($i=0; $i < $numeroAlumnos; $i++) { 
		$calificacion = obtenerPromedioPorPeriodo($fechaInicio,$fechaFin,$listaAlumnos["$i"]);
		$calificacionAnterior = obtenerPromedioPorPeriodo($semanaAnterior,$fechaInicio,$listaAlumnos[$i]);
		$calificacionGrupal += ($calificacion / $numeroAlumnos);
		$calificacionGrupalAnterior += ($calificacionAnterior / $numeroAlumnos);
		$alumno = array();
		$alumno["nombre"] = obtenerDatosAlumno($listaAlumnos[$i]);
		$alumno["calificacion"] = $calificacion;
		$calificacionesAlumnos[] = $alumno;
	}

	$porcentajeAvance = $calificacionGrupal - $calificacionGrupalAnterior;
	$listaAlumnosJSON = json_encode($calificacionesAlumnos);

	$reporteGrupalJSON = '{"calificacionGrupal":'.$calificacionGrupal.', "listaAlumnos":'.$listaAlumnosJSON.', "porcentajeAvance":'. $porcentajeAvance.'}';
	return $reporteGrupalJSON;
}

function obtenerReporteIndividual(){
	$idTipoActividad = $_POST["idTipoActividad"];
	$listaAlumnos = obtenerAlumnosGrupo($_POST["idGrupo"]);
	$idAlumnoSeleccionado  = $_POST["idAlumnoSeleccionado"];
	$fechaInicio = date($_POST["fechaInicio"]); //La fecha tiene que estar en formato d-m-y
	$fechaFin = date("d-m-Y",strtotime($fechaInicio."+ 1 week"));
	$semanaAnterior = date("d-m-Y",strtotime($fechaInicio."- 1 week"));


	$calificacionAlumno= obtenerPromedioPorPeriodo($fechaInicio,$fechaFin,$idAlumnoSeleccionado);
	$calificacionAnteriorAlumno = obtenerPromedioPorPeriodo($semanaAnterior,$fechaInicio,$idAlumnoSeleccionado);


	$calificacionGrupal = 0;
	$numeroAlumnos = count($listaAlumnos);
	$alumnoMasAlto = 0;
	$alumnoMasBajo = 0;
	$calificacionMasBaja = 100;
	$calificacionMasAlta = 0;

	for ($i=0; $i < $numeroAlumnos; $i++) { 
		$calificacion = obtenerPromedioPorPeriodo($fechaInicio,$fechaFin,$listaAlumnos["$i"]);
		$calificacionGrupal += ($calificacion / $numeroAlumnos);
		if ($calificacion > $calificacionMasAlta){
			$alumnoMasAlto = $listaAlumnos[$i];
			$calificacionMasAlta = $calificacion;
		}

		if ($calificacion < $calificacionMasBaja){
			$alumnoMasBajo = $listaAlumnos[$i];
			$calificacionMasBaja = $calificacion;
		}
	}

	$porcentajeAvance = $calificacionAlumno - $calificacionAnteriorAlumno;
	$alumnoMasAlto = obtenerDatosAlumno($alumnoMasAlto);
	$alumnoMasBajo = obtenerDatosAlumno($alumnoMasBajo);

	$reporteIndividualJSON = '"calificacionPromedioAlumno":'.$calificacionAlumno.', "promedioGrupal":'.$calificacionGrupal.', "porcentajeAvance":'.$porcentajeAvance.', "alumnoMasAlto": "'.$alumnoMasAlto.'", "calificacionMasAlta":'.$calificacionMasAlta.', "alumnoMasBajo" : "'.$alumnoMasBajo.'", "calificacionMasBaja":'.$calificacionMasBaja;
	return $reporteIndividualJSON;
}

function obtenerAlumnosGrupo($idGrupo){
	$sql = "SELECT idAlumno FROM alumnos WHERE idGrupo = $idGrupo";
	$resultado = ConectarBaseDatos($sql);
	$idAlumnos = array();
	$numeroAlumnos = $resultado->num_rows;
	if ($numeroAlumnos > 0){
		for ($i=0; $i < $numeroAlumnos; $i++) { 
			$fila = $resultado->fetch_array(MYSQLI_ASSOC);
			$idAlumnos[] = $fila["idAlumno"];
		}
	}

	return $idAlumnos;
}

function obtenerDatosAlumno($idAlumno){
	$sql = "SELECT nombreAlumno, apellidoAlumno FROM alumnos WHERE idAlumno = $idAlumno";
	$resultado = ConectarBaseDatos($sql);
	$fila = $resultado->fetch_array(MYSQLI_ASSOC);
	return $fila["nombreAlumno"].' '.$fila["apellidoAlumno"];
}

function obtenerPromedioPorPeriodo($fechaInicio, $fechaFin, $idAlumno){
	$fechaInicio = explode("-", $fechaInicio);
	$fechaFin = explode("-", $fechaFin);
	$formatoFechaInicio = $fechaInicio[2]."-".$fechaInicio[1]."-".$fechaInicio[0];
	$formatoFechaFin = $fechaFin[2]."-".$fechaFin[1]."-".$fechaFin[0];
	$sql = "SELECT SUM(calificacion) as calificacion, count(*) as numeroFilas FROM `actividadalumno` WHERE idAlumno = $idAlumno AND fechaRealizada BETWEEN '$formatoFechaInicio' AND '$formatoFechaFin'";
	$resultado = ConectarBaseDatos($sql);
	$fila = $resultado->fetch_array(MYSQLI_ASSOC);
	if ($fila["numeroFilas"] > 0){
		return $fila["calificacion"] / $fila["numeroFilas"];
	} else {
		return 0;
	}

}

if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$action = $_POST['tipo'];
	switch($action) {
		case "reporteIndividual" : echo obtenerReporteIndividual(); break;
		case "reporteGrupal" : echo obtenerReporteGrupal(); break;
		case "obtenerNumeroActividadesRealizadas": echo obtenerNumeroActividades(); break;
		case "obtenerTiposActividades": echo obtenerTiposActividades();
	}
}
