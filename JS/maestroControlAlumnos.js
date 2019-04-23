$(document).ready(function(){

	document.getElementById("crearAlumno").onclick = function () { solicitarCreacionAlumno(); };
	document.getElementById("desconectar").onclick = function () { desconectar(); };
	document.getElementById("eliminarAlumno").onclick = function () { eliminarAlumno(); };
	document.getElementById("modificarAlumno").onclick = function () { modificarAlumno(); };

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

	function modificarAlumno(){
		var alumnoVerificador = $("#listaAlumnosAModificar option:selected").val();
		if (alumnoVerificador != 0){
			var idAlumno = $("#listaAlumnosAModificar option:selected").val();
			var nombreAlumno = $("#nombreAlumnoModificar").val();
			var apellidoAlumno = $("#apellidoAlumnoModificar").val();
			$.ajax({ url: './AlumnoServicio.php',
				data: {tipo: "modificarAlumno", idAlumno: idAlumno, nombreNuevo: nombreAlumno, apellidoNuevo: apellidoAlumno},
				type: 'post',
				success: function(output) {
					alert(output);
				}
			});
		}
	}

	function eliminarAlumno(){
		var alumnoVerificador = $("#listaAlumnosAEliminar option:selected").val();
		if (alumnoVerificador != 0){
			var idAlumno = $("#listaAlumnosAEliminar option:selected").val();
			$.ajax({ url: './AlumnoServicio.php',
				data: {tipo: "deshabilitarAlumno", idAlumno: idAlumno},
				type: 'post',
				success: function(output) {
					alert(output);
				}
			});
		} else {
			alert("Seleccione un alumno");
		}
	}

	function solicitarCreacionAlumno(){
		var indiceGrupoSeleccionado = $("#listaGrupos option:selected").val();
		if (indiceGrupoSeleccionado != 0){
			var idGrupo = $("#listaGrupos option:selected").val();
			var nombreAlumno = $("#nombreAlumno").val();
			var apellidoAlumno = $("#apellidoAlumno").val();


			$.ajax({ url: './AlumnoServicio.php',
				data: {tipo: "crearAlumno", idGrupo: idGrupo, 
											nombreAlumno: nombreAlumno, 
											apellidoAlumno: apellidoAlumno,	
										},
				type: 'post',
				success: function(output) {
					alert(output);
				}
			});
		} else {
			alert("Seleccione un grupo");
		}

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

	function obtenerGrupos(){
		$.ajax({ url: './ServicioGrupo.php',
			data: {estado: 1, tipo: "obtenerGrupos"},
			type: 'post',
			success: function(output) {

				var listaGrupos = JSON.parse(output);
				var htmlListas = "<option value = '0'> Seleccione Grupo </option>";

				for (var i = 0; i < listaGrupos.lista.length; i++) {
					htmlListas += "<option value=\""+listaGrupos.lista[i].idGrupo+"\"> Grado: "+listaGrupos.lista[i].grado+" Grupo: "+ listaGrupos.lista[i].grupo +"</option>";
				}
				$("#listaGrupos").append(htmlListas);
				$("#listaEliminarGrupos").append(htmlListas);
				$("#listaModificarGrupos").append(htmlListas);
			}
		});
	}

	function generarTablaAlumnos(){
		$.ajax({ url: './AlumnoServicio.php',
			data: {tipo: "obtenerTodosAlumnos", estado: 1},
			type: 'post',
			success: function(output) {

				var listaAlumnos = JSON.parse(output);
				var tabla = $('#tabla');
				alert(tabla.html());
				var htmlListas=tabla.html();
				for (var i = 0; i < listaAlumnos.lista.length; i++) {
					htmlListas =htmlListas+ "<tr><th>"+listaAlumnos.lista[i].idAlumno+" </th><th> "+ listaAlumnos.lista[i].nombreAlumno +"</th><th>"+ listaAlumnos.lista[i].apellidoAlumno+ " </th><th><button>Generar reporte de alumno</button></th></tr>";
				}
				tabla.html(htmlListas);
			}
		});

	}

	function obtenerAlumno(listaACambiar,listaGrupo){
		var idGrupo = $(listaGrupo + " option:selected").val();

		$.ajax({ url: './AlumnoServicio.php',
			data: {tipo: "obtenerAlumnos", idGrupo: idGrupo, estado: 1},
			type: 'post',
			success: function(output) {
				console.log(output);
				var listaGrupos = JSON.parse(output);
				var htmlListas = "<option value = '0'> Seleccione Alumno </option>";
				for (var i = 0; i < listaGrupos.lista.length; i++) {
					htmlListas += "<option value=\""+listaGrupos.lista[i].idAlumno+"\">"+listaGrupos.lista[i].nombreAlumno + " " + listaGrupos.lista[i].apellidoAlumno +"</option>";
				}
				$(listaACambiar).empty();
				$(listaACambiar).append(htmlListas);
			}
		});
	}

	$("#listaEliminarGrupos").change(function(){
		obtenerAlumno("#listaAlumnosAEliminar", "#listaEliminarGrupos");
	});
	$("#listaModificarGrupos").change(function(){
		obtenerAlumno("#listaAlumnosAModificar", "#listaModificarGrupos");
	});
	generarTablaAlumnos();
	obtenerGrupos();
	verificarInicioSesion();
});