<?php


// Incluimos nuestro archivo config
include '../config/config.php';



$idUsuarioSesion=$_GET['id_user'];

// Sentencia sql para traer los agenda desde la base de datos
$sql="SELECT c.id, c.titulo as title, c.descripcion as body, c.start, c.end, c.inicio_normal, c.final_normal FROM clase c where c.id in(select uc.clases_id_clases from usuario_has_clase uc where uc.usuario_id_usuario=".$idUsuarioSesion.");"; 


// Verificamos si existe un dato
if ($conexion->query($sql)->num_rows)
{ 

    // creamos un array
    $datos = array(); 

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0; 

    // Ejecutamos nuestra sentencia sql
    $e = $conexion->query($sql); 

    while($row=$e->fetch_array()) // realizamos un ciclo while para traer los agenda encontrados en la base de dato
    {
        // Alimentamos el array con los datos de los agenda
        $datos[$i] = $row; 
        $i++;
    }

    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        // Si no existen agenda mostramos este mensaje.
        echo "No hay datos"; 
    }


?>
