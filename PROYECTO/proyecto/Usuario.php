<?php
require_once('lib/UtilidadesSesion.php');
require_once("lib/ConectorBD.php");
require_once("lib/Usuarios.php");

$aUsuario=New Usuarios();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $aUsuario->AgregarUsuario($_POST['$NombreCompleto'], $_POST['$UsuarioNuevo'], $_POST['$Password'], $_POST['$Tipo']);
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<form class="square" id=CrearUsuario action="Usuario.php" method="post" onsubmit="alert('Usuario Creado Correctamente')">
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
        <div id="NuevoUsuario">
            <ul class="NuevoUsuario">
               <form id=CrearUsuario action="Usuario.php" method="post" onsubmit="alert('Usuario Creado Correctamente')">
		<table style="width:100%">
		<tr>
                    <th>Nombre Completo</th>
		    <td><input name="$NombreCompleto" id="$NombreCompleto" type="text"required><br></td>
		</tr>		
		<tr>
                    <th>Usuario Nuevo</th>
		    <td><input name="$UsuarioNuevo" id="$UsuarioNuevo" type="text" required><br></td>
		</tr>
		<tr>                    
		    <th>Password</th>
		    <td><input name="$Password" id="$Password" type="password" required><br></td>
		</tr>
		<tr>                    
		    <th>Tipo</th>
		    <td><input list="Tipo" name="$Tipo" required>
                    <datalist id="Tipo">
                        <option value="Administrador">
                        <option value="Soportista">
                        <option value="Cron">
                    </datalist></td>
		</tr>
		<tr>
                    <th><input name="idUsuario" type="hidden" value=''><br></th>
                    <th><input name="accion" type="hidden" value="agregar"><br></th>
                    <th><input type="submit" value="Crear Nuevo Usuario"><br></th>
		</tr>
		</table>
                </form>
            </ul>
        </div>
    </div>
</form>
</body>
</html>
