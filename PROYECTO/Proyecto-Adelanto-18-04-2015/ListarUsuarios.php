<?php
session_start();
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Usuarios.php");
UtilidadesSesion::revisarSesionActiva();

if($_POST) {
    if($_POST['accion'] === 'modificarUsuario') {
        Usuarios::ModificarCampo($_POST['IdUsuario'], $_POST['Campo'], $_POST['Valor']);
    }
}

$sql="SELECT * FROM TUsuarios";
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
<form>
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
        <div id="ListaUsuarios">
            <hr>
            <?php foreach($rows as $row){ ?>
                <ul>
                    <table>
                        <tr>
                            <th>IdUsuario</th>
                            <td><?php echo "{$row["IdUsuario"]}" ?></td>
                        </tr>
                        <tr>
                            <th>Nombre Completo</th>
                            <td><?php echo "{$row['NombreCompleto']}" ?></td>
                        </tr>
                        <tr>
                            <th>Usuario</th>
                            <td><?php echo "{$row['Usuario']}"?></td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td><?php echo "{$row['Tipo']}" ?></td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td><?php echo "{$row['Estado']}" ?></td>
                        </tr>

                        <tr>
                            <th>
                                <input list="Campo" name="Campo">
                                <datalist id="Campo">
                                    <option value="IdUsuario">
                                    <option value="NombreCompleto">
                                    <option value="Usuario">
                                    <option value="Tipo">
                                    <option value="Estado">
                                </datalist>
                            </th>
                            <td>
                                <input type="text" name="Valor" id="Valor">
                                <input name="IdUsuario" value="<?php echo "{$row['Idusuario']}"; ?>" type="hidden">
                                <input name="accion" value="modificarUsuario" type="hidden">
                                <input type="submit" value="Modificar Usuario">
                            </td>
                        </tr>
                    </table>
                </ul>
            <?php } ?>
        </div>
    </div>
</form>
</body>
</html>
