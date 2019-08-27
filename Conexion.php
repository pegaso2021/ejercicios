<?php 

/*
Caracteres Especiales en español: ñ,ó,ü

Ejm:
conexión  => conexiÃ³n 
conexiÃ³n => conexión 

*/

class Conexion{

function get_conexion()
{

try {

$conexion = new PDO(

'mysql:host=localhost;dbname=edith',
'root',
'root',
array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' )

);

$conexion->setAttribute(

PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION

);

return $conexion;


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}

}


 ?>