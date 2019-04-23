<?php 
echo "

	<!-- Inicio de navBar -->
	<nav class='navbar navbar-expand-sm bg-dark navbar-dark'>
		<!-- Brand/logo -->
		<a class='navbar-brand' href='./PanelControl'>Maestro Linux</a>

		<!-- Links -->
		<ul class='navbar-nav'>
			<li class='nav-item'>
				<a class='nav-link' href='./controlGrupos'>Grupos</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='./controlAlumnos'>Alumnos</a>
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
";

?>