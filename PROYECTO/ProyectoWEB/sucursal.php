<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

//Creamos la Sucursal
$aSucursales = new Sucursal();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $aSucursales->AgregarSucursal($_POST['$IdSucursal'], $_POST['$Ubicacion'], $_POST['$NombreSucursal'], $_POST['$NombrePOS'], $_POST['$NombreBD'], $_POST['$Cantidad'], $_POST['$Version'], $_POST['$URL'], $_POST['$Bucket']);
    }
}
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
<div id="NuevaSucursal">
    <ul class="NuevaSucursal">
        <form id=CrearSucursal action="sucursal.php" method="post">
            Id de la Sucursal: <input name="$IdSucursal" id="$IdSucursal" type="text"><br>
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
</div>
</body>
</html>