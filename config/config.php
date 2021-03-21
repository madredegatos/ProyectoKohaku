<?php

require_once 'configApp.php';
try {
  // Nos conectamos a la base de datos
    $conexion = new mysqli(SERVER, USER, PASS, DB);	
// Definimos que nuestros datos vengan en utf8
$conexion->set_charset('utf8');

// verificamos si hubo algun error y lo mostramos
if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>

