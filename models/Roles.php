<?php
require_once './controllers/controllerRol.php';
require_once './config/Rol.clase.php';

class RolesDAO {
	public static function listarDatos () {
		$con = new controllerRol();
		$cont = $con->ejecutarConsulta("SELECT * FROM usuario");
		//$con->cerrarConexion();
		return $cont;
	}

	public static function ingresarDato ($rol) {
		$con = new controllerRol();
		$con->ejecutarActualizacion("INSERT INTO usuario (Nombre) VALUES ('$rol->nombre')");
		$con->cerrarConexion();
	}

	public static function buscarPorId ($id) {
		$con = new controllerRol();
		$cont = $con->ejecutarConsulta("SELECT * FROM usuario WHERE Id_usuario = $id_usuario");
		$con->cerrarConexion();
		return $cont[0];
	}

	public static function editarDato ($rol) {
		$con = new controllerRol();
		$con->ejecutarActualizacion("UPDATE usuario SET Nombre = '$rol->nombre' WHERE Id_usuario = $rol->id_usuario");
		$con->cerrarConexion();
	}

	public static function eliminarPorId ($id_usuario) {
		$con = new controllerRol();
		$con->ejecutarActualizacion("DELETE FROM usuario WHERE Id_usuario = $id_usuario");
		$con->cerrarConexion();
	}
}