<?php
session_start();
var_dump($_POST);
require_once('lib/UtilidadesSesion.php');
require_once("lib/ConectorBD.php");
require_once("lib/Usuarios.php");
UtilidadesSesion::revisarSesionActiva();

$aUsuario=New Usuarios();

if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $aUsuario->AgregarUsuario($_POST['$IdUsuario'], $_POST['$NombreCompleto'], $_POST['$UsuarioNuevo'], $_POST['$Password'], $_POST['$Tipo']);
    }
}
$sql="SELECT * FROM TSucursal ORDER BY NombreSucursal ASC";
$rows=ConectorBD::ejecutarQuery($sql);
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
<form class="square" id=CrearUsuario action="Usuario.php" method="post">
    <div id='divMenu' style="float:left;width:200px;height:100%;">
        <img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
        <ul>
            <li><a href='sucursal.php'><span>Configurar nueva VM</span></a></li>
            <li><a href="recuperacion.php">Recuperar VM</a></li>
            <li><a href="Sucursales.php">Listar Sucursales</a></li>
            <li><a href="listado.php">Acceso Backup</a></li>
            <li><a href="Usuario.php">Crear nuevo User</a></li>
            <li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
        </ul>
    </div>
    <div id="divContenido" style="height:100%">
        <div id="NuevoUsuario">
            <ul class="NuevoUsuario">
      <!--          <form id=CrearUsuario action="Usuario.php" method="post">-->
                    Id del Usuario: <input name="$IdUsuario" id="$IdUsuario" type="text"><br>
                    Nombre Completo: <input name="$NombreCompleto" id="$NombreCompleto" type="text"><br>
                    Usuario Nuevo: <input name="$UsuarioNuevo" id="$UsuarioNuevo" type="text"><br>
                    Password: <input name="$Password" id="$Password" type="text"><br>
                    Tipo: <input list="Tipo" name="$Tipo">
                    <datalist id="Tipo">
                        <option value="Administrador">
                        <option value="Soportista">
                        <option value="Cron">
                    </datalist>
                    <input name="idUsuario" type="hidden" value=''><br>
                    <input name="accion" type="hidden" value="agregar"><br>
                    <input type="submit" value="Crear Nuevo Usuario"><br>
                </form>
            </ul>
        </div>
    </div>
</form>
</body>
</html>
