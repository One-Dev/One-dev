<?php
session_start();
require_once("lib/UtilidadesSesion.php");
UtilidadesSesion::revisarSesionActiva()
?>
<!DOCTYPE html>
<html>
<head lang"en">
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<form class="square">
	<div id='divMenu' style="float:left;width:200px;height:100%;">
	<img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
  	<ul>
		<li><a href='sucursal.php'><span>Crear nueva Sucursal</span></a></li>
		<li><a href='Sucursales.php'><span>Listar Sucursales</span></a></li>
		<li><a href="Usuario.php">Crear Usuario</a></li>
		<li><a href="ListarUsuarios.php">Listar Usuarios</a></li>
		<li><a href="Recuperar.php">Recuperar MV</a></li>
		<li><a href="listado.php">Listar Respaldos</a></li>
		<li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
	</ul>
	</div>
	<div id="divContenido" style="height:100%">
	<p class="ex"><br><br><br><br><br><br>Bienvenido al sistema<br>Seleccione una opci&oacuten del menu de navegaci&oacuten.</p>
	</div>
	</form>
</body>
</html>
