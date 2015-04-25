<?php
session_start();
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");
UtilidadesSesion::revisarSesionActiva();
var_dump($_POST);

$aSucursales = new Sucursal();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $archivo=$aSucursales->crearArchSucursal($_POST['$NombreBD'],$_POST['$usuarioBD'],$_POST['$NombreSucursal'],$_POST['$URL']) ;
        $aSucursales->AgregarSucursal($_POST['$Ubicacion'], $_POST['$NombreSucursal'], $_POST['$NombrePOS'], $_POST['$NombreBD'], $_POST['$usuarioBD'], $_POST['$URL'], $_POST['$Bucket'],$archivo);

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
<form class="square" id=CrearSucursal action="sucursal.php" method="post" onsubmit="alert('Sucursal Creada Correctamente')">
    <div id='divMenu' style="float:left;width:200px;height:100%;">
        <img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
        <ul>
		<li><a href='sucursal.php'><span>Crear nueva Sucursal</span></a></li>
		<li><a href='Sucursales.php'><span>Listar Sucursales</span></a></li>
		<li><a href="Usuario.php">Crear Usuario</a></li>
		<li><a href="ListarUsuarios.php">Listar Usuarios</a></li>
		<li><a href="listado.php">Listar Respaldos</a></li>
		<li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
        </ul>
    </div>
    <div id="divContenido" style="height:100%">
        <br>
        <center><b>Crear Nuevo Usuario</b></center>
        <hr>
        <div id="NuevaSucursal">
            <table style="width:50%">
                <tr>
                    <th>Ubicacion de la sucursal</th>
                    <td><input name="$Ubicacion" id="$Ubicacion" type="text" required></td>
                </tr>
                <tr>
                    <th>Nombre de la Sucursal</th>
                    <td><input name="$NombreSucursal" id="$NombreSucursal" type="text" required></td>
                </tr>
                <th>Nombre del POS</th>
                <td><input name="$NombrePOS" id="$NombrePOS" type="text" required></td>
                </tr>
                <th>Nombre de la BD</th>
                <td><input name="$NombreBD" id="$NombreBD" type="text" required></td>
                </tr>
                <th>Usuario Base de Datos</th>
                <td><input name="$usuarioBD" id="$usuarioBD" type="text" required></td>
                </tr>
                <th>Direccion IP</th>
                <td><input name="$URL" id="$URL" type="text" required></td>
                </tr>
                <th>Bucket S3</th>
                <td><input name="$Bucket" id="$Bucket" type="text" required></td>
                </tr>

            </table>

                <input name="idSucursal" type="hidden" value=''><br>
                <input name="accion" type="hidden" value="agregar"><br>
                <input type="submit" value="Crear Nueva Sucursal"><br>

        </div>


    </div>
</form>
</body>
</html>
