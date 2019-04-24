	function solicitarDatosAlumno(){
		window.localStorage.getItem('idAlumno');
		$.ajax({ url: '../ActividadServicio.php',
			data: {tipo: "desconectar"},
			type: 'post',
			success: function(output) {
				alert(output);	
			}
		});
	}