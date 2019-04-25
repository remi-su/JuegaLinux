	function solicitarDatosAlumno(){
		var fechaInicial = $("#fecha-inicial").val();
		var idGrupo = 2;
		var idAlumno = 2;
		window.localStorage.getItem('idAlumno');
		$.ajax({ url: '../ActividadServicio.php',
			data: {tipo: "reporteIndividual", fechaInicio: fechaInicial, idAlumno: idAlumno, idGrupo:idGrupo},
			type: 'post',
			success: function(output) {
				console.log(output);	
			}
		});
	}

	document.getElementById("generar").onclick = function () { solicitarDatosAlumno(); };