$(document).ready(function(){

	var listaGrupos = [];
	document.getElementById("crearGrupo").onclick = function () { solicitarCrearGrupo(); };
	document.getElementById("modificarGrupo").onclick = function () { modificarGrupo(); };
	document.getElementById("eliminarGrupo").onclick = function () { eliminarGrupo(); };
	document.getElementById("desconectar").onclick = function () { obtenerReporteIndividual(); };


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

	function solicitarCrearGrupo(){
		var grado = $("#grado").val();
		var grupo = $("#grupo").val();
		$.ajax({ url: './ServicioGrupo.php',
			data: {grado : grado, grupo: grupo, tipo: "crearGrupo"},
			type: 'post',
			success: function(output) {
				alert(output);
			}
		});
	}

	function eliminarGrupo(){
		var idGrupo = $("#listaAEliminarGrupos option:selected").val();
		alert(idGrupo);
		$.ajax({ url: './ServicioGrupo.php',
			data: {idGrupo : idGrupo, tipo: "eliminarGrupo"},
			type: 'post',
			success: function(output) {

				alert(output);
				
			}
		});
		
		
	}

	function obtenerReporteIndividual(){
		var idGrupo = 2;
		var idTipoActividad = 2;
		var idAlumnoSeleccionado = 2;
		var fechaInicio = "15-04-2019";
		$.ajax({ url: './ActividadServicio.php',
			data: {idGrupo: idGrupo, tipo: "reporteIndividual", idTipoActividad: idTipoActividad, idAlumnoSeleccionado: idAlumnoSeleccionado, fechaInicio: fechaInicio},
			type: 'post',
			success: function(output){
				console.log(output);
			}
		});
	}

	function modificarGrupo(){
		var idGrupo = $("#listaGrupos option:selected").val();
		var gradoNuevo = $("#gradoNuevo").val();
		var grupoNuevo = $("#grupoNuevo").val();

		$.ajax({ url: './ServicioGrupo.php',
			data: {idGrupo: idGrupo, gradoNuevo: gradoNuevo, grupoNuevo: grupoNuevo, tipo: "modificarGrupo"},
			type: 'post',
			success: function(output) {
				alert(output);
			}
		});
	}

	function obtenerGrupos(){
		$.ajax({ url: './ServicioGrupo.php',
			data: {tipo: "obtenerGrupos", estado: 1},
			type: 'post',
			success: function(output) {
				var listaGrupos = JSON.parse(output);
				console.log(listaGrupos);
				generarTablaGrupos(listaGrupos);
				var htmlListas = "";
				for (var i = 0; i < listaGrupos.lista.length; i++) {

					htmlListas += "<option value=\""+listaGrupos.lista[i].idGrupo+"\"> Grado: "+listaGrupos.lista[i].grado+" Grupo: "+ listaGrupos.lista[i].grupo +"</option>";
				}
				$("#listaGrupos").append(htmlListas);
				$("#listaAEliminarGrupos").append(htmlListas);
				
			}
		});
	}

	function generarTablaGrupos(listaGrupos){
		
		var tabla = $('#tabla');

		var htmlListas="";
		for (var i = 0; i < listaGrupos.lista.length; i++) {
			htmlListas =htmlListas+ "<tr><th>"+listaGrupos.lista[i].grado+" </th><th> "+ listaGrupos.lista[i].grupo +"</th><th><button class='action-button' value="+ listaGrupos.lista[i].idGrupo + ">Generar reporte grupal</button></th></tr>";
		}
		tabla.html(htmlListas);
		$("#tabla").on('click','button[class=action-button]',function(){

			var idGrupo = $(this).attr('value');
			window.localStorage.setItem('idGrupo', idGrupo);
			 window.location = "reportes/reporteGrupal.html"
			//alert(window.localStorage.getItem('idAlumno'));
		});
	}


	function verificarInicioSesion(){
		$.ajax({ url: './auth.php',
			data: {tipo: "verificar"},
			type: 'post',
			success: function(output) {
				if (output === "0"){
					location.href="./index";
				} else {
					$("#nombreUsuario").append(output);
				}
			}
		});
	} 
	
	verificarInicioSesion();
	obtenerGrupos();
});