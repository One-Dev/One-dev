<?php
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");

$aSucursales = new Sucursal();
if($_POST) {
    if($_POST['accion'] === 'modificarSucursal') {
        $aSucursales->ModificarCampo($_POST['IdSucursal'], $_POST['Campo'], $_POST['Valor']);
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
<form class="square" id="modificarSucursal-<?php echo "{$row['IdSucursal']}"; ?>" action="Sucursales.php" method="post">
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
        <div id="NuevaSucursal">
            <hr>
            <?php foreach($rows as $row){ ?>
                <ul>
                    <table style="width:100%">
                        <tr>
                            <th>IdSucursal</th>
                            <td><?php echo "{$row["IdSucursal"]}" ?></td>
                        </tr>
                        <tr>
                            <th>Ubicacion</th>
                            <td><?php echo "{$row['Ubicacion']}" ?></td>
                        </tr>
                        <tr>
                            <th>NombreSucursal</th>
                            <td><?php echo "{$row['NombreSucursal']}"?></td>
                        </tr>
                        <tr>
                            <th>NombrePOS</th>
                            <td><?php echo "{$row['NombrePOS']}" ?></td>
                        </tr>
                        <tr>
                            <th>NombreBD</th>
                            <td><?php echo "{$row['NombreBD']}" ?></td>
                        </tr>
                        <tr>
                            <th>Cantidad</th>
                            <td><?php echo "{$row['Cantidad']}" ?></td>
                        </tr>
                        <tr>
                            <th>Version</th>
                            <td><?php echo "{$row['Version']}" ?></td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td><?php echo "{$row['URL']}" ?></td>
                        </tr>
                        <tr>
                            <th>Bucket</th>
                            <td><?php echo "{$row['Bucket']}" ?></td>
                        </tr>
                        <tr>
                            <th>
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
                            </th>
                            <td> <form id="modificarSucursal-<?php echo "{$row['IdSucursal']}"; ?>" action="Sucursales.php" method="post"></td>
                                <td><input type="text" name="Valor" id="Valor"></td>
                                <td><input name="IdSucursal" value="<?php echo "{$row['IdSucursal']}"; ?>" type="hidden"></td>
                                <td><input name="accion" value="modificarSucursal" type="hidden"></td>
                                <td><input type="submit" value="Modificar Sucursal"></td>
                   		</form>
                        </tr>
                    </table>
                </ul>
            <?php } ?>
        </div>
    </div>
</form>
</body>
</html>
