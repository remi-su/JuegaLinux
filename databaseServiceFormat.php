<?php
function ConectarBaseDatos($sql){

	$mysqli = new mysqli('127.0.0.1', 'root', '', 'foro');
	if(!$mysqli){
		return false; 
	}
	else{
		$resultado = $mysqli->query($sql);
		$mysqli->close();
		return $resultado;               
	}

}



$dbName = "foro";
$result_t = ConectarBaseDatos("SHOW TABLES");
while($row = $result_t->fetch_array(MYSQLI_ASSOC))
{
   ConectarBaseDatos("TRUNCATE " . $row['Tables_in_' . $dbName]);
}
?>