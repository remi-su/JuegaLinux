<!DOCTYPE html>
<html>

<head>
	<title>Control Grupos</title>
	<meta charset="utf-8">
	<script src="./JS/jquery.min.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./CSS/PanelControl.css">
</head>
<body class="body">
	
<?php include 'header.php';  ?>
	<br>

	<div class="container"><!--Inicio de Formulario-->
		<h3>Crear grupo</h3>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Grado"
			aria-describedby="basic-addon1"
			name="grado"
			id="grado">
		</div>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Grupo"
			aria-describedby="basic-addon1"
			name="grupo"
			id="grupo" >
		</div>
		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="crearGrupo"
			id="crearGrupo"
			value="Crear">
		</div>

		<hr>

		<h3>Modificar Grupos</h3>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaArea">Grado y grupo a modificar: </label>
			</div>
			<select class="custom-select" id="listaGrupos"></select>
		</div>


		<h5>Nuevos valores: </h5>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Grado"
			aria-describedby="basic-addon1"
			name="grado"
			id="gradoNuevo">
		</div>
		<div class="input-group mb-3">
			<input type="text"
			class="form-control"
			placeholder="Grupo"
			aria-describedby="basic-addon1"
			name="grupo"
			id="grupoNuevo">
		</div>
		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="crearGrupo"
			id="modificarGrupo"
			value="Modificar">
		</div>

		<hr>

		<h3>Eliminar grupos</h3>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="listaAEliminarGrupos">Grado y grupo a eliminar: </label>
			</div>
			<select class="custom-select" id="listaAEliminarGrupos"></select>
		</div>
		<div class="input-group mb-3">
			<input type="button"
			class="btn btn-secondary"
			name="eliminarGrupo"
			id="eliminarGrupo"
			value="Eliminar">
		</div>
	</div> <!--Fin de Formulario-->

	<!--<p>Crear Grupo</p>
	Grado : <input type="text" name="grado" id="grado"><br>
	Grupo : <input type="text" name="grupo" id="grupo"><br>
	<input type="button" name="crearGrupo" value="Crear Grupo" id="crearGrupo">
	<hr>
	<p>Modificar Grupos</p>

	Seleccione el grado y grupo a modificar: 
	<select id="listaGrupos"></select>

	<br>
	Ingrese los nuevos valores: <br>

	Grado : <input type="text" name="grado" id="gradoNuevo"> <br>
	Grupo : <input type="text" name="grupo" id="grupoNuevo"> <br>
	<input type="button" name="crearGrupo" value="Modificar Grupo" id="modificarGrupo">
	<hr>
	<p>Eliminar Grupos</p>
	Seleccione el grado y grupo a eliminar: 
	<select id="listaAEliminarGrupos">

	</select>
	<br>
	<input type="button" name="eliminarGrupo" value="Eliminar Grupo" id="eliminarGrupo">
	
	<smt/>-->
	

</body>
</html>

<script type="text/javascript" src="./JS/maestroControlGrupos.js"></script>