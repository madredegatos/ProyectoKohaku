<?php



// incluimos el archivo de configuracion
include '../config/config.php';


if(isset($_POST) ) 
{
   
    $id_alumno=$_POST['id_alumno'];
    $id_clase=$_POST['id_clase'];
    $query="INSERT INTO usuario_has_clase VALUES('$id_alumno','$id_clase')";
 
    
    // Ejecutamos nuestra sentencia sql
    $conexion->query($query)or die('<script type="text/javascript">alert("No se pudo agragar la clase ")</script>');
    
   
}

