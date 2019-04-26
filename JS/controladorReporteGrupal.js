	


	function solicitarDatosAlumno(){
		var fechaInicial = $("#fecha-inicial").val();
		var idGrupo = window.localStorage.getItem('idGrupo');
		$.ajax({ url: '../ActividadServicio.php',
			data: {tipo: "reporteGrupal", fechaInicio: fechaInicial, idGrupo:idGrupo},
			type: 'post',
			success: function(output) {
				
				//var prueba = "[{ \"NombreActividad\": \"UnidadesDecenas\", \"ReporteActividad\": { \"calificacionGrupal\": 29, \"listaALumnos\": [ { \"nombre\":\"Samuel Ake\", \"calificacion\": 87.5 }, { \"nombre\":\"Alumno2\", \"calificacion\": 90.5 }, { \"nombre\":\"Alumno3\", \"calificacion\": 45.5 } ], \"porcentajeAvance\":3.12 } }, { \"NombreActividad\": \"SopaLetras\", \"ReporteActividad\": { \"calificacionGrupal\": 29.1667, \"listaALumnos\": [ { \"nombre\":\"Samuel Ake\", \"calificacion\": 87.5 }, { \"nombre\":\"Alumno2\", \"calificacion\": 90.5 }, { \"nombre\":\"Alumno3\", \"calificacion\": 45.5 } ], \"porcentajeAvance\":3.212 } }]";
				//alert(prueba);
				var array =JSON.parse(output);
				//var as1 = as[0];
				generarGraficas(array);
			}
		});
	}
	function prepararVentana(){
		var today = new Date();
		var dd = ("0" + (today.getDate())).slice(-2);
		var mm = ("0" + (today.getMonth() +　1)).slice(-2);	
		var yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd ;
		$("#fecha-inicial").attr("value", today);
	}

	function generarGraficas(array){
		//generarGraficaPromedioPorCalificacion(array);
		generarGraficaPromedioPorCalificacion(array);
		generarTablaCalificaciones(array);
		//mostrarAreasDebiles(array);
		mostrarPorcentajeAvance(array);
	}

	function obtenerPorcentajeAvance(listaActividades){
		var porcentajes =[];
		var length = listaActividades.length;
		for (var i = 0; i < length; i++) {
			var actividad = [];
			var nombre = listaActividades[i].NombreActividad;

			var porcentajeAvance = listaActividades[i].ReporteActividad.porcentajeAvance;
				actividad['nombre'] = nombre;
				actividad['porcentajeAvance']= porcentajeAvance;
				porcentajes.push(actividad);
		}
		return porcentajes;
	}

	function generarTablaCalificaciones(datos){
		//var porcentajes = obtenerPorcentajeAvance(datos);
		var length = datos.length;
		//alert(length);*/
		var htmlListas="";
		var tabla = $('#tabla-calificacion');
		for (var i = 0; i < length; i++) {
			for(actividad in datos[i].ReporteActividad.listaALumnos){
				var elemento =datos[i].ReporteActividad.listaALumnos[actividad];
				htmlListas =htmlListas+ "<tr><th>"+datos[i].NombreActividad+"</th><th> "+ elemento.nombre +"</th><th> "+ elemento.calificacion +"</th></tr>";
			}
		}
		tabla.html(htmlListas);
	}

	function mostrarPorcentajeAvance(datos){
		var porcentajes = obtenerPorcentajeAvance(datos);
		var length = porcentajes.length;
		var htmlListas="";
		var tabla = $('#tabla-avance');
		for (var i = 0; i < length; i++) {
			htmlListas =htmlListas+ "<tr><th>"+porcentajes[i]['nombre']+" </th><th> "+ porcentajes[i]['porcentajeAvance'] +"</th></tr>";
		
		}
		tabla.html(htmlListas);
	}
	function mostrarAreasDebiles(datos){
		var areasDebiles = obtenerAreasDebiles(datos);
		var length = areasDebiles.length;
		var htmlListas="";
		var tabla = $('#tabla');
		for (var i = 0; i < length; i++) {
			htmlListas =htmlListas+ "<tr><th>"+areasDebiles[i]['nombre']+" </th><th> "+ areasDebiles[i]['calificacion'] +"</th></tr>";
		
		}
		tabla.html(htmlListas);
		
	}
	function calcularPromedios(json){
		var promedios = [];
		var length = json.length;
		for (var i = 0; i < length; i++) {
			var nombre = json[i].NombreActividad;
			//alert(JSON.stringify(json[i].ReporteActividad));
			promedios.push(json[i].ReporteActividad.calificacionGrupal);

		}
		return promedios;
	}

	function obtenerAreasDebiles(listaActividades){
		var areasDebiles =[];
		var length = listaActividades.length;
		for (var i = 0; i < length; i++) {
			var actividad = [];
			var nombre = listaActividades[i].NombreActividad;

			var ListaEstudiantes = listaActividades[i].ReporteActividad;
			for(estudiante in ListaEstudiantes){
				if( estudiante.calificacion <70){
					actividad['n']
					actividad['nombre'] = estudiante.nombre;
					actividad['calificacion']= estudiante.calificacion;
					areasDebiles.push(actividad);
				}
			}

			
		}
		return areasDebiles;
	}

	function obtenerNombreActividades(listaActividades){
		var nombres = [];
		var length = listaActividades.length;
		for (var i = 0; i < length; i++) {
			var nombre = listaActividades[i].NombreActividad;
			nombres.push(nombre);
		}
		return nombres;
	}
	function prepararColores(datos){
		var colores = [];
		var length = datos.length;
		for (var i = 0; i < length; i++) {
			var color1 = Math.floor(Math.random()*255);
			var color2 = Math.floor(Math.random()*255);
			var color3 = Math.floor(Math.random()*255);

			var rgbString = `rgba(${color1},${color2},${color3},0.5)`;
			colores.push(rgbString);
		}
		return colores;
	}

	function generarGraficaPromedioPorCalificacion(datos){
		var ctx = document.getElementById("grafica-comparacion").getContext('2d');
		var nombresActividades = obtenerNombreActividades(datos);
		var promedios = calcularPromedios(datos);
		var colores =prepararColores(datos);
		var bordes = prepararColores(datos);
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: nombresActividades,
		        datasets: [{
		            label: [],
		            data: promedios,
		            backgroundColor: colores,
		            borderColor: bordes,
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
	}

	function obtenerResultadosEstudiantes(datos){
		var coleccionDatos = [];
		var length = datos.length;
		var resultadosActividades=[];
		var resultadosMejorAlumno =[];
		var resultadosPeorAlumno= [];
		var resultadoGrupal= [];
		var resultadosAlumno= [];
		for (var i = 0; i < length; i++) {
			var datosActividadAlumno=[];
			datosActividadAlumno['label']= 'AlumnoActual';
			datosActividadAlumno['backgroundColor']='rgba(125,0,0,0.2)';
			resultadosAlumno.push(datos[i].ReporteActividad.calificacionPromedioAlumno);

			//resultadosAlumno.push(Math.random()*50);

			var datosActividadPeorAlumno=[];
			datosActividadPeorAlumno['label']= 'Calificación más baja';
			datosActividadPeorAlumno['backgroundColor']='rgba(0,125,0,0.2)';
			resultadosPeorAlumno.push(datos[i].ReporteActividad.calificacionMasBaja);
			//resultadosPeorAlumno.push(Math.random()*20);

			var datosActividadMejorAlumno=[];
			datosActividadMejorAlumno['label']= 'Calificación más Alta';
			datosActividadMejorAlumno['backgroundColor']='rgba(0,0,125,0.2)';
			resultadosMejorAlumno.push(datos[i].ReporteActividad.calificacionMasAlta);
			//resultadosMejorAlumno.push(Math.random()*80);

			var datosActividadGrupal =[];
			datosActividadGrupal['label']= 'Calificación grupal';
			datosActividadGrupal['backgroundColor']='rgba(125,125,125,0.2)';
			resultadoGrupal.push(datos[i].ReporteActividad.promedioGrupal);
			
		}

		datosActividadAlumno['data'] = resultadosAlumno;
		datosActividadPeorAlumno['data'] = resultadosPeorAlumno;
		datosActividadMejorAlumno['data'] = resultadosMejorAlumno;
		datosActividadGrupal['data']= resultadoGrupal;

		coleccionDatos.push(datosActividadAlumno);
		coleccionDatos.push(datosActividadPeorAlumno);
		coleccionDatos.push(datosActividadMejorAlumno);
		coleccionDatos.push(datosActividadGrupal);
		return coleccionDatos;
	}

	function generarGraficaComparacion(datos){
		var ctx = document.getElementById("grafica-comparacion").getContext('2d');
		var nombresActividades = obtenerNombreActividades(datos);
		var promedios = calcularPromedios(datos);
		var colores =prepararColores(datos);
		var bordes = prepararColores(datos);
		var datosPorEstudiante= obtenerResultadosEstudiantes(datos);
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		    labels: nombresActividades,
			datasets: datosPorEstudiante,
		    },
		   	options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }		});
	}

	function generarGraficaAvance(datos){
		var ctx = document.getElementById("grafica-comparacion").getContext('2d');
		var nombresActividades = obtenerNombreActividades(datos);
		var promedios = calcularPromedios(datos);
		var colores =prepararColores(datos);
		var bordes = prepararColores(datos);
		var datosPorEstudiante= obtenerResultadosEstudiantes(datos);
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		    labels: nombresActividades,
			datasets: promedios,
		    },
		   	options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }		});
	}

	$("#generar-reporte").click(solicitarDatosAlumno);
	prepararVentana();
/*
[
{
	"NombreActividad": "UnidadesDecenas",
	"ReporteActividad": {
	"calificacionGrupal": 29.1666667,
	"listaALumnos": [
		{
		"nombre":"Samuel Ake",
		"calificacion": 87.5
		},
		{
			"nombre":"Alumno2",
			"calificacion": 90.5
		},
		{
			"nombre":"Alumno3",
			"calificacion": 45.5
		}

	],
	"porcentajeAvance":3.0000212
	}
}
,
{
	"NombreActividad": "UnidadesDecenas",
	"ReporteActividad": {
	"calificacionGrupal": 29.166667,
	"listaALumnos": [
		{
		"nombre":"Samuel Ake",
		"calificacion": 87.5
		},
		{
			"nombre":"Alumno2",
			"calificacion": 90.5
		},
		{
			"nombre":"Alumno3",
			"calificacion": 45.5
		}

	],
	"porcentajeAvance":3.0000212
	}

}]

*/