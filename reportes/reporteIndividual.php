<!DOCTYPE html>
<html>
<head>
	<title>Reporte indivual</title>
		<script src="../JS/jquery.min.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="../JS/chart.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	<style>
		.rightDate{
			margin-right: auto;
		}
		.leftDate{
			margin-left: auto;
		}

		.firstRow{
			padding: 20px;
		}
		.label{
			margin: 5px;
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
			<div class="col">
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
			<div class="col">
				<div class="input-group mb-3">
					<label class="label" for="fecha-final">Fecha final</label>
					<input type="date"
					class="form-control"
					placeholder="fecha-final"
					aria-describedby="basic-addon1"
					name="fecha-final"
					id="fecha-final" >
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col">

			</div>
			<div class="col">
				<div class="input-group mb-3">
					<button class="btn"> asdasd</button>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="../JS/controladorReporteIndividual.js"></script>
</body>
</html>