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

    
    
    break;

case 2:


    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

      try {
    
    //Query SQL

        
     $query1 = " select nombres, apellidos, correo from usuarios where  correo=:usuario and nickname=:clave ";

     //Sentencia Preparada
     $statement = $conexion->prepare($query1);

    $statement->bindParam(':usuario',$usuario);
      $statement->bindParam(':clave',$clave);

     //Ejecutar el código SQL(Query)
     $statement->execute();

     //Array de Datos
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

   //  echo json_encode($result);
     if (count($result)>0)
     {

        //echo json_encode("existe");

        echo json_encode(
    
                    array(
                   
                    'title'=>'Buen Trabajo',
                    'text' =>'Registro Agregado',
                    'type' =>'success'

                    )

                    );


        //******
     }

     else 
         {

        //echo  json_encode ("no existe");


echo json_encode(
    
    array(
   
    'title'=>'ERROR1',
    'text' =>'XXX',
   'type' =>'ERROR'

    )

    );




        //****
     }

        
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
