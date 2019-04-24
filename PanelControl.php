<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control</title>
	<meta charset="utf-8">
	<script src="./JS/jquery.min.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
	<script type="text/javascript" src="JS/chart.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./CSS/PanelControl.css">
</head>
<body class="body">
	<?php include 'header.php';  ?>

	<div class="presentacion">
		<h1>¡Bienvenido <a id="nombreMaestro"> Nombre Maestro</a>! </h1>
	</div>

	<div class="container">

		<div class="card">
			<div class="card-header"> Información de actividades </div>
			 <div class="card-body">
			 	<h5 class="card-title">Información general de los actividades</h5>
<table class=   "table table-user-information">
                <tbody>
                  <tr>
                    <td>Número de actividades realizadas</td>
                    <td id="numero-actividades"></td>
                  </tr>
                  <tr>
                    <td>Actividades de español</td>
                    <td id="actividades-español"></td>
                  </tr>

                   <tr>
                    <td>Actividades de matematicas</td>
                    <td id="actividades-matematicas"></td>
                  </tr>
               </tbody>
              </table> 
   				
  			</div>
		</div>
		<div class="card">
			<div class="card-header"> Promedios </div>
			 <div class="card-body">
    			<h5 class="card-title">Información general de los estudiantes</h5>
    			<p class="card-text">
<table class=   "table table-user-information">
                <tbody>
                  <tr>
                    <td>Número de estudiantes</td>
                    <td id="numero-estudiantes"></td>
                  </tr>
                  <tr>
                    <td>Número de grupos</td>
                    <td id="cantidad-grupos"></td>
                  </tr>

                   <tr>
                    <td>Alumnos del grupo 1</td>
                    <td id="cantidad-grupo-1"></td>
                  </tr>
                  <tr>
                    <td>Alumnos del grupo 2</td>
                    <td id="cantidad-grupo-2"></td>
                  </tr>
               </tbody>
              </table>  
    			</p>
   				
  			</div>
		</div>
	<div class="card">
		<div class="card-header"> Informacion del hardware </div>
			 <div class="card-body">
    			<h5 class="card-title">Estado del disco</h5>
    			<p class="card-text">
					<canvas id="oilChart" width="60" height="40"></canvas>
    			</p>	
  			</div>
	</div>
<div class="card contenedor-cartas-pequeñas">
	<div class="">
		<div class="card-header"> Configuracion de la base de datos </div>
			 <div class="card-body">
    			<h5 class="card-title">Opciones</h5>
    			<div>
    				<button type="button" id="respaldar" class="btn btn-success">Respaldar base de datos</button>
    				<button type="button" id="formatear" class="btn btn-danger">Formatear base de datos</button>
    			</div>	
  			</div>
	</div>
  <div class="">
    <div class="card-header"> Actividades </div>
       <div class="card-body">
          <h5 class="card-title"> Lista de juegos disponibles</h5>
          <div>
            <ul id="actividades-disponibles">
            </ul>
          </div>
      </div>
  </div>
</div>
</div>
</body>
</html>

<script type="text/javascript">

	document.getElementById("desconectar").onclick = function () { desconectar(); };
	
	function desconectar(){
		$.ajax({ url: './auth.php',
			data: {tipo: "desconectar"},
			type: 'post',
			success: function(output) {
				alert(output);
					location.href="./index";
			}
		});
	}



	function verificarInicioSesion(){
		$.ajax({ url: './auth.php',
			data: {tipo: "verificar"},
			type: 'post',
			success: function(output) {
				if (output === "0"){
					location.href="/index";
				} else {
					$("#nombreUsuario").empty();
					$("#nombreMaestro").empty();
					$("#nombreUsuario").append(output);
					$("#nombreMaestro").append(output);
				}
			}
		});
	}
	verificarInicioSesion();
	

function agregarJuegosDisponibles(){
	$("#actividades-disponibles").html("<li>Pescando con pingu</li><li>Crucigrama</li><li>Sopa de letras</li>");
}

function generarDatosActividades(){
		$.ajax({ url: './ActividadServicio.php',
			data: {tipo: "obtenerNumeroActividadesRealizadas"},
			type: 'post',
			success: function(output) {
				
				var JSONObject = JSON.parse(output);
				
				$('#numero-actividades').html(JSONObject['numeroActividades']);
				$('#actividades-español').html(JSONObject['numeroActividadesEspanol']);
				$('#actividades-matematicas').html(JSONObject['numeroActividadesMatematicas']);
			}
		});
}

function generarDatosAlumnos(){
	$.ajax({ url: './AlumnoServicio.php',
			data: {tipo: "obtenerNumeroAlumnos"},
			type: 'post',
			success: function(output) {
				var JSONObject = JSON.parse(output);

				$('#numero-estudiantes').html(JSONObject['numeroEstudiantes']);
				$('#cantidad-grupos').html(JSONObject['cantidadGrupos']);
				$('#cantidad-grupo-1').html(JSONObject['cantidadGrupo1']);
				$('#cantidad-grupo-2').html(JSONObject['cantidadGrupo2']);
			}
	});
}

generarDatosActividades();
generarDatosAlumnos();
function generarGraficaEspacioDisco(espacioLibre, espacioOcupado){

var oilCanvas = document.getElementById("oilChart");
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 10;

var datos = {
    labels: [
        "Libre",
        "Ocupado"
    ],
    datasets: [
        {
            data: [espacioLibre,espacioOcupado],
            backgroundColor: [
            "#63FF84",
                "#FF6384"     
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: datos
});
}

 $(document).ready(function(){
        $("#respaldar").click(function(){

            $.ajax({
                type: 'POST',
                url: 'databaseServiceResp.php',
                success: function(data) {
                   alert(data);
                }
            });
   });

});

  $(document).ready(function(){
        $("#formatear").click(function(){

            $.ajax({
                type: 'POST',
                url: 'databaseServiceFormat.php',
                success: function(data) {
                   alert(data);
                }
            });
   });

});

agregarJuegosDisponibles();
generarGraficaEspacioDisco(12,88);
</script>