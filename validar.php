<?php 

include'modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();



//op es una variable de tipo GET :recuperando desde la URL
$opcion   = $_REQUEST['op'];

/*

case 1 => Lista
case 2 => insertar
case 3 => actualizar
case 4 => eliminar
case 5 => Consulta por ID

*/


switch ($opcion) {

	
case 1:

     try {
    
  //Query SQL
    $query = " select nombres, apellidos,correo from usuarios order by nombres";

     //Sentencia Preparada
     $statement = $conexion->prepare($query);

     //Ejecutar el código SQL(Query)
     $statement->execute();

     //Array de Datos
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

   
     echo json_encode($result);

        
    } catch (Exception $e) {

    echo "Error: ".$e->getMessage();
        
    }
    
    break;

case 2:


    $usuario = $_REQUEST['usuario'];

      try {
    
    //Query SQL

        
     $query1 = " select nombres, apellidos, correo from usuarios where  correo=:usuario ";

     //Sentencia Preparada
     $statement = $conexion->prepare($query1);

    $statement->bindParam(':usuario',$usuario);

     //Ejecutar el código SQL(Query)
     $statement->execute();

     //Array de Datos
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

     echo json_encode($result);

        
    } catch (Exception $e) {

    echo "Error: ".$e->getMessage();
        
    }

  break;



case 3:

    break;

	default:
	echo "opción no disponible";
		break;


}



 ?>
