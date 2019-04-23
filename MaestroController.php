<?php

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
	
		case "cargarPalabra" : echo cargarPalabrasSopaLetras(); break;
	}
}