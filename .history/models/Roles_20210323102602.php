<?php
require_once '../modelos/Conexion.clase.php';
require_once '../modelos/Rol.clase.php';

class RolesDAO {
	public static function listarDatos () {
		$con = new Conexion();
		$cont = $con->ejecutarConsulta('SELECT * FROM roles');
		$con->cerrarConexion();
		return $cont;
	}

	public static function ingresarDato ($rol) {
		$con = new Conexion();
		$con->ejecutarActualizacion("INSERT INTO roles (Nombre) VALUES ('$rol->nombre')");
		$con->cerrarConexion();
	}

	public static function buscarPorId ($id) {
		$con = new Conexion();
		$cont = $con->ejecutarConsulta("SELECT * FROM roles WHERE Id = $id");
		$con->cerrarConexion();
		return $cont[0];
	}

	public static function editarDato ($rol) {
		$con = new Conexion();
		$con->ejecutarActualizacion("UPDATE roles SET Nombre = '$rol->nombre' WHERE Id = $rol->id");
		$con->cerrarConexion();
	}

	public static function eliminarPorId ($id) {
		$con = new Conexion();
		$con->ejecutarActualizacion("DELETE FROM roles WHERE Id = $id");
		$con->cerrarConexion();
	}
}