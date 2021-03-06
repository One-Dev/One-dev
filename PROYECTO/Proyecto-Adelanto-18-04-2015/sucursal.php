<?php

require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");


//Creamos la Sucursal
$aSucursales = new Sucursal();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $aSucursales->AgregarSucursal($_POST['$Ubicacion'], $_POST['$NombreSucursal'], $_POST['$NombrePOS'], $_POST['$NombreBD'], $_POST['$Cantidad'], $_POST['$Version'], $_POST['$URL'], $_POST['$Bucket']);
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
		<li><a href="Recuperar.php">Recuperar MV</a></li>
		<li><a href="listado.php">Listar Respaldos</a></li>
		<li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
        </ul>
    </div>
    <div id="divContenido" style="height:100%">
        <!--<div id="NuevaSucursal">
            <ul class="NuevaSucursal">
                <!--<form id=CrearSucursal action="sucursal.php" method="post">-->
                  <!--  Id de la Sucursal: <input name="$IdSucursal" id="$IdSucursal" type="text"><br>
                    Ubicacion de la sucursal: <input name="$Ubicacion" id="$Ubicacion" type="text"><br>
                    Nombre de la Sucursal: <input name="$NombreSucursal" id="$NombreSucursal" type="text"><br>
                    Nombre del POS: <input name="$NombrePOS" id="$NombrePOS" type="text"><br>
                    Nombre de la BD: <input name="$NombreBD" id="$NombreBD" type="text"><br>
                    Cantidad de POS: <input name="$Cantidad" id="$Cantidad" type="text"><br>
                    Version del Sistema: <input name="$Version" id="$Version" type="text"><br>
                    URL de los respaldos: <input name="$URL" id="$URL" type="text"><br>
                    Bucket S3: <input name="$Bucket" id="$Bucket" type="text"><br>
                    <input name="idSucursal" type="hidden" value=''><br>
                    <input name="accion" type="hidden" value="agregar"><br>
                    <input type="submit" value="Crear Nueva Sucursal"><br>
                </form>
            </ul>
        </div>-->


        <div id="NuevaSucursal">
            <table style="width:100%">
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
                <th>Cantidad de POS</th>
                <td><input name="$Cantidad" id="$Cantidad" type="text" required></td>
                </tr>
                <th>Version del Sistema</th>
                <td><input name="$Version" id="$Version" type="text" required></td>
                </tr>
                <th>URL de los respaldos</th>
                <td><input name="$URL" id="$URL" type="text" required></td>
                </tr>
                <th>Bucket S3</th>
                <td><input name="$Bucket" id="$Bucket" type="text" required></td>
                </tr>
                <tr>
                    <input name="idSucursal" type="hidden" value=''><br>
                    <input name="accion" type="hidden" value="agregar"><br>
                    <input type="submit" value="Crear Nueva Sucursal"><br>
                </tr>
            </table>
        </div>


    </div>
</form>
</body>
</html>
