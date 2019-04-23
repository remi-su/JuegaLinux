<?php
function ConectarBaseDatos($sql){

	$mysqli = new mysqli('127.0.0.1', 'root', '', '');
	if(!$mysqli){
		return false; 
	}
	else{
		$resultado = $mysqli->query($sql);
		$mysqli->close();
		return $resultado;               
	}
}

// no lo termino para que no borren la base de datos

$dbName = "";
$result_t = ConectarBaseDatos("SHOW TABLES");
while($row = $result_t->fetch_array(MYSQLI_ASSOC))
{
   ConectarBaseDatos("TRUNCATE " . $row['Tables_in_' . $dbName]);
}
?>