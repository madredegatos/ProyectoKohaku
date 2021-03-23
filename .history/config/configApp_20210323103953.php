<?php
//Conexión de la base de datos
    const SERVER="localhost";
    const DB="kohaku";
    const USER="usuario2026591"; 
    const PASS="usuario2026591";

    const SGBD= "mysql:host=".SERVER.";dbname=".DB;
    
    //LLAVES SECRETASV NO SEPUEDEN CONFIGUAL AL GUARDAR EN LA DB
    const METHOD = "AES-256-CBC";
	const SECRET_KEY ='$SISKHK@2021';
	const SECRET_IV = '2026591';

    public function ejecutarConsulta ($sql) {
		$contenedor = $this->conexion->query($sql);
		return $contenedor->fetch_all();
	}

	public function ejecutarActualizacion ($sql) {
		$this->conexion->query($sql);
	}

	public function cerrarConexion () {
		$this->conexion->close();
	}