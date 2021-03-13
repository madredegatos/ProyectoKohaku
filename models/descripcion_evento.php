<?php


    
    //incluimos nuestro archivo config
    include '../config/config.php'; 

    // Incluimos nuestro archivo de funciones
    include '../util/funciones.php';
    
    $base_url='vendor/calendario/';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM clase WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['titulo'];

    // cuerpo
    $evento=$row['descripcion'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM clase WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
        
       
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
          <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
</head>
<body>
	 <h3><?=$titulo?></h3>
	 <hr>
     <b>Fecha inicio:</b> <?=$inicio?> <br>
     <b>Fecha termino:</b> <?=$final?> <br>
 	 <b>Descripcion:</b><p><?=$evento?></p>
</body>
<form action="" method="post">
     <div class="modal-footer">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</div>
</form>
</html>
