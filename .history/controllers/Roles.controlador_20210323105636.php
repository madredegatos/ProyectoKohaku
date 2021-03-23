<?php
require_once '../config/Rol.clase.php';
require_once '../models/Roles.dao.php';

switch ($_GET['a']) {
	case 'ingr':
		$r = new Rol();
		$r->nombre = $_POST['nombre'];

		RolesDAO::ingresarDato($r);
		break;
	case 'edit':
		$r = new Rol();
		$r->id_usuario = $_POST['id_usuario'];
		$r->nombre = $_POST['nombre'];

		RolesDAO::editarDato($r);
		break;
	case 'elim':
		RolesDAO::eliminarPorId($_GET['id_usuario']);
		break;
}

header('Location: ../views/modules/');