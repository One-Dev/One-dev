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
    <title></title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css"></head>
<body>
<form class="square">
    <div id='divMenu' style="float:left;width:200px;height:100%;">
        <img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
        <ul>
            <li><a href='vmsetup.php'><span>Configurar nueva VM</span></a></li>
            <li><a href="recuperacion.php">Recuperar VM</a></li>
            <li><a href='#'>Listar Sucursales</a></li>
            <li><a href="listado.html">Acceso Backup</a></li>
            <li><a href="crearuser.php">Crear nuevo User</a></li>
            <li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
        </ul>
    </div>
    <div id="divContenido" style="height:100%">

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
    </div>
</form>
</body>
</html>
