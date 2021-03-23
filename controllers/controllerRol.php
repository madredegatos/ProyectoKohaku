<?php

if($petitionAjax){
    require_once "../config/mainModel.php";
}else{
    // si la eticion ajax es fale aceder a la configuración DB
    require_once "./config/mainModel.php";
}
class controllerRol extends mainModel{
	public function ejecutarConsulta ($mysql) {
		$sql= mainModel::connect()->prepare($mysql);
        $sql->execute();
		$contenedor=$sql->fetchall();
		return $contenedor;
	}

	public function ejecutarActualizacion ($sql) {
        $contenedor = mainModel::connect()->prepare($sql);
        $contenedor->execute();
	}

	public function cerrarConexion () {
        $contenedor = mainModel::connect();
        $contenedor->execute();
		$contenedor->close();
	}
}
