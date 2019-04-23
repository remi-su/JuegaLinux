<!DOCTYPE html>
<html>
<head>
	<title>Control Alumnos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS/PanelControl.css">
</head>
<body class="body">

	<?php include 'header.php';  ?>
	<br>

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#consultarAlumno" role="tab" data-toggle="tab">Lista de alumnos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#registrarAlumno" role="tab" data-toggle="tab">Registrar nuevo alumno</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#modificarAlumnoTab" role="tab" data-toggle="tab">Modificar alumno</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#eliminarAlumno" role="tab" data-toggle="tab">Eliminar alumno</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane in active" id="consultarAlumno">
  	
	 	<table class="table table-bordered table-striped table-hover" id="tabla-grupos">
 
  <thead>
    <tr>
      	<th>Identificador</th>
      	<th>Nombre</th>
 		<th>Apellido</th>
      	<th>Opciones</th> 
    </tr>
  </thead>
 
  <tbody id="tabla">
  </tbody>
 
</table>

  </div>
  <div role="tabpanel" class="tab-pane" id="registrarAlumno">
  	
	<div class="container"><!--Inicio de Formulario-->
		<h3>Agregar alumno al sistema</h3>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Grado y grupo </label>
			</div>
			<select class="custom-select" id="listaGrupos"></select>
		</div>

		<h5>Datos personales del alumno: </h5>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Nombre"
			aria-describedby="basic-addon1"
			name="nombreAlumno"
			id="nombreAlumno" >
		</div>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Apellido"
			aria-describedby="basic-addon1"
			name="apellidoAlumno"
			id="apellidoAlumno" >
		</div>
		<div class="input-group mb-3">
			<input type="file"
			class=""
			name="imagen"
			id="imagen">
		</div>
		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="crearAlumno"
			id="crearAlumno"
			value="Crear">
		</div>
  	</div>
  </div>
  <div role="tabpanel" class="tab-pane" id="modificarAlumnoTab">
  	
<div class="container"><!--Inicio de Formulario-->
<h3>Modificar información del alumno</h3>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Grado y grupo </label>
			</div>
			<select class="custom-select" id="listaModificarGrupos">
			</select>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Alumno a modificar </label>
			</div>
			<select class="custom-select" id="listaAlumnosAModificar">
			</select>
		</div>

		<h5>Rellena los nuevos datos personales del alumno. </h5>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Nombre"
			aria-describedby="basic-addon1"
			name="nombreAlumnoModificar"
			id="nombreAlumnoModificar" >
		</div>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Apellido"
			aria-describedby="basic-addon1"
			name="apellidoAlumnoModificar"
			id="apellidoAlumnoModificar" >
		</div>
		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="modificarAlumno"
			id="modificarAlumno"
			value="Modificar">
		</div>

	</div><!--Fin de Formulario-->


  </div>
  <div role="tabpanel" class="tab-pane" id="eliminarAlumno">
  	<div class="container"><!--Inicio de Formulario-->

		<h3>Eliminar alumno del sistema</h3>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Grado y grupo </label>
			</div>
			<select class="custom-select" id="listaEliminarGrupos"></select>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Alumno a eliminar </label>
			</div>
			<select class="custom-select" id="listaAlumnosAEliminar">
				<option value="0">---</option>
			</select>
		</div>

		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="eliminarAlumno"
			id="eliminarAlumno"
			value="Eliminar">
		</div>
	</div>

  </div>
</div>


	

				<hr>

		
	<!--
	Insertar Alumno al Sistema<br>
	Selecciona el grado y grupo : 
	<SELECT id="listaGrupos"></SELECT>
	<br>
	Rellena datos personales de los alumnos. <br>
	Nombre: <input type="text" name="nombreAlumno" id="nombreAlumno"><br>
	Apellido: <input type="text" name="apellidoAlumno" id="apellidoAlumno"><br>
	<input type="button" name="crearAlumno" id="crearAlumno" value="Crear Alumno">

	Eliminar Alumno al Sistema <br>
	Seleccione el grado y grupo : 
	<SELECT id="listaEliminarGrupos">

	</SELECT>
	<br>
	Seleccione al Alumno a eliminar:
	<SELECT id="listaAlumnosAEliminar">
		<option value="0">---</option>
	</SELECT>
	<br>
	<input type="button" name="eliminarAlumno" id="eliminarAlumno" value="Eliminar Alumno"><br>
	<hr>
	Modificar Información del Alumno <br>
	Selecciones el grado y el grupo : 
	<SELECT id="listaModificarGrupos">

	</SELECT>
	<br>
	Seleccione al Alumno a Modificar:
	<SELECT id="listaAlumnosAModificar">
	<option value="0">---</option>
	</SELECT>

	<br>
	Rellena los nuevos datos personales del alumno. <br>
	Nombre: <input type="text" name="nombreAlumnoModificar" id="nombreAlumnoModificar"><br>
	Apellido: <input type="text" name="apellidoAlumnoModificar" id="apellidoAlumnoModificar"><br>
	<input type="button" name="modificarAlumno" id="modificarAlumno" value="Modificar Alumno">
	<hr>-->


</body>
</html>
<script type="text/javascript" src="./JS/maestroControlAlumnos.js"></script>