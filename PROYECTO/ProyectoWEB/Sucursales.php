<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

$aSucursales = new Sucursal();
if($_POST) {
    if($_POST['accion'] === 'modificarSucursal') {
        $aSucursales->ModificarCampo($_POST['IdSucursal'], $_POST['Campo'], $_POST['Valor']);
    }
}

$sql="SELECT * FROM TSucursal";
$rows=ConectorBD::ejecutarQuery($sql);
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
<div>Sucursales</div>
<div id="NuevaSucursal">
    <hr>
    <?php foreach($rows as $row){ ?>
        <ul>
            <li> IdSucursal: <?php echo "{$row["IdSucursal"]}" ?></li>
            <li> Ubicacion: <?php echo "{$row['Ubicacion']}" ?></li>
            <li> NombreSucursal: <?php echo "{$row['NombreSucursal']}" ?></li>
            <li> NombrePOS: <?php echo "{$row['NombrePOS']}" ?></li>
            <li> NombreBD: <?php echo "{$row['NombreBD']}" ?></li>
            <li> Cantidad: <?php echo "{$row['Cantidad']}" ?></li>
            <li> Version: <?php echo "{$row['Version']}" ?></li>
            <li> URL: <?php echo "{$row['URL']}" ?></li>
            <li> Bucket: <?php echo "{$row['Bucket']}" ?></li>
            <li>
                <form id="modificarSucursal-<?php echo "{$row['IdSucursal']}"; ?>" action="Sucursales.php" method="post">
                    <input list="Campo" name="Campo">
                    <datalist id="Campo">
                        <option value="Ubicacion">
                        <option value="NombreSucursal">
                        <option value="NombrePOS">
                        <option value="NombreBD">
                        <option value="Cantidad">
                        <option value="Version">
                        <option value="URL">
                        <option value="Bucket">
                    </datalist>
                    <input type="text" name="Valor" id="Valor">
                    <input name="IdSucursal" value="<?php echo "{$row['IdSucursal']}"; ?>" type="hidden">
                    <input name="accion" value="modificarSucursal" type="hidden">
                    <input type="submit" value="Modificar Sucursal">
                </form>
            </li>
        </ul>
    <?php } ?>
</div>
</body>
</html>
