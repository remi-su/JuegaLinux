<!DOCTYPE html>
<html>
<head>
	<title>Reporte indivual</title>
		<script src="../JS/jquery.min.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="../JS/chart.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	<style>
		.date-container{
			margin: 5px; 
			flex-grow: 1;
		}.all{
			flex-grow: 1;
		}
		
		.grafica{
			margin: auto;
		}
		.button-container{
			margin: 5px;
		}

		.firstRow{
			padding: 20px;
		}
		.label{
			margin: 5px;
		}
		.card{
			margin: 10px;
		}
		.card-row{
			width: 100%;
		}
		.card-container{
			display: flex;
		}
	</style>
</head>
<body>
		<!-- Inicio de navBar -->
	<nav class='navbar navbar-expand-sm bg-dark navbar-dark'>
		<!-- Brand/logo -->
		<a class='navbar-brand' href='../PanelControl'>Maestro Linux</a>

		<!-- Links -->
		<ul class='navbar-nav'>
			<li class='nav-item'>
				<a class='nav-link' href='../controlGrupos'>Grupos</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='../controlAlumnos'>Alumnos</a>
			</li>
			
		</ul>

		<ul class='navbar-nav ml-auto'>
			<li class='nav-item'>
				<a class='nav-link nombreUsuario' id='nombreUsuario'></a>
			</li>
			<li class='nav-item'>
				<a class='nav-link'><button class='btn btn-sm btn-light' id='desconectar'>Cerrar Sesión</button></a>
			</li>
		</ul>
	</nav><!-- Fin de navBar -->
	<div class="container">
		<div class="row firstRow">
			<div class="date-container">
				<div class="input-group mb-3">
					 <label class="label" for="fecha-inicial">Fecha inicial</label>
					<input type="date"

					class="form-control"
					placeholder="fecha-inicial"
					aria-describedby="basic-addon1"
					name="fecha-inicial"
					id="fecha-inicial" >
				</div>
			</div>

		
			<div class="button-container">
				<div class="input-group mb-3">
					<button id="generar-reporte" class="btn"> Generar reporte</button>
				</div>
			</div>
		</div>
	
	<div class="row">
		<div class="card all">
			<canvas id="grafica-promedios" class="grafica" width="400" height="400"></canvas>
		</div>
		<div class="card all">
			<canvas id="grafica-comparacion" class="grafica" width="400" height="400"></canvas>
		</div>
	</div>
	<div class="row ">
		<div class="card card-row">
			<div class="card-header">Información general del alumno</div>
			<div class="card-body card-container">
				<div class="card all">
					<div class="card-header">Porcentaje de avance contra la semana anterior</div>

					<div class="card-body">
						<span>El porcentaje de mejora en el estudiante esta semana fue de </span>
						<table class="table table-bordered table-striped table-hover" id="tabla-grupos">
						  <thead>
						    <tr>
						      	<th>Nombre de actividad</th>
						      	
						      	<th>porcentaje de avance</th>
						    </tr>
						  </thead>
						 
						  <tbody id="tabla-avance">
						  </tbody>
						 
						</table>
					</div>
				</div>
				<div class="card all">
					<div class="card-header">Actividades con mayor dificultad para el alumno (puntaje menor a 70%)</div>

					<div class="card-body">
						<table class="table table-bordered table-striped table-hover" id="tabla-grupos">
						 
						  <thead>
						    <tr>
						      	<th>Nombre de actividad</th>
						      	
						      	<th>Calificación</th>
						    </tr>
						  </thead>
						 
						  <tbody id="tabla">
						  </tbody>
						 
						</table>
					</div>
				</div>


			</div>
		</div>
	</div>
	</div>

	</div>
	<script type="text/javascript" src="../JS/controladorReporteIndividual.js"></script>
</body>
</html>