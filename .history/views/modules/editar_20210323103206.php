<?php
	require_once '../dao/Roles.dao.php';

	$rol = RolesDAO::buscarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
</head>
<body>
	<header>
		<h1>Roles</h1>
		<h2>Editar</h2>
	</header>

	<form action="../controladores/Roles.controlador.php?a=edit" method="POST">
		<input type="hidden" name="id" value="<?=$rol[0]?>" />
		<input name="nombre" placeholder="Nombre" value="<?=$rol[1]?>" />
		<input type="submit" value="Editar" />
	</form>
</body>
</html>