<!DOCTYPE html>
<html>

<head>
	<title>Control Grupos</title>
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
    <a class="nav-link active" href="#ConsultarGrupos" role="tab" data-toggle="tab">Lista de grupos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#CrearGrupo" role="tab" data-toggle="tab">Crear nuevo grupo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#ModificarGrupo" role="tab" data-toggle="tab">Modificar Grupo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#EliminarGrupo" role="tab" data-toggle="tab">EliminarGrupo</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane  in active" id="ConsultarGrupos">
  	<table class="table table-bordered table-striped table-hover" id="tabla-grupos">
 
  <thead>
 
    <tr>
 
      <th>Grado</th>
 
      <th>Grupo</th>
 
      <th>Opciones</th>
 
    </tr>
 
  </thead>
 
  <tbody id="tabla">
  </tbody>
 
</table>
  </div>
  <div role="tabpanel" class="tab-pane " id="CrearGrupo">
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

  </div>
  <div role="tabpanel" class="tab-pane " id="ModificarGrupo">
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

  </div>
  <div role="tabpanel" class="tab-pane " id="EliminarGrupo">
  	
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

  </div>
</div>
	<div class="container"><!--Inicio de Formulario-->

		<hr>


		<hr>


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