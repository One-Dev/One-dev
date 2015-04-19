<?php
session_start();
require_once("lib/UtilidadesSesion.php");
UtilidadesSesion::revisarSesionActiva();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <style>
div { border: solid 1px grey;padding: 5px;}
    </style>
</head>
<body>
<div id="header">
    Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
</div>
<div id="menu">
    <a href="Sucursales.php">Listar Sucursales</a><br>
    <a href="sucursal.php">Crear Sucursal Nueva</a><br>
    <a href="Usuario.php">Crear Usuario Nuevo</a><br>
</div>
</body>
</html>
