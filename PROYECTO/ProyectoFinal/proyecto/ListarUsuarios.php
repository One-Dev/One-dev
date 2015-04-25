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
<head lang="en">
    <style>
        table, td, th {
            align-self: center;
            border: 1px solid dodgerblue;
        }

        th {
            background-color: dodgerblue;
            color: white;
        }
    </style>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
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
    <div id="divContenido" style="float:left;width:1100px;height:100%;align-self:center">
        <div id="ListarUsuarios">

            <center><b>Listado de Usuarios</b></center>
            <hr>


            <?php foreach($rows as $row){ ?>

                    <form id="modificarUsuario" action="ListarUsuarios.php" method="post">
                        <ul>
                            <br>
                        <table>

                            <tr>
                                <th>IdUsuario</th>
                                <th>NombreCompleto</th>
                                <th>Usuario</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                            </tr>
                            <tr>
                                <td><?php echo "{$row["IdUsuario"]}" ?></td>
                                <td><?php echo "{$row['NombreCompleto']}" ?></td>
                                <td><?php echo "{$row['Usuario']}"?></td>
                                <td><?php echo "{$row['Tipo']}" ?></td>
                                <td><?php echo "{$row['Estado']}" ?></td>
                            </tr>
                            <br>
                            </table>
                            <table>
                                <input list="Campo" name="Campo">
                                <datalist id="Campo">
                                    <option value="NombreCompleto">
                                    <option value="Usuario">
                                    <option value="Tipo">
                                    <option value="Estado">
                                </datalist>

                                <input type="text" name="Valor" id="Valor">
                                <input name="IdUsuario" value="<?php echo "{$row['IdUsuario']}"; ?>" type="hidden">
                                <input name="accion" value="modificarUsuario" type="hidden">
                                <input type="submit" value="Modificar Usuario">
                            </table>
                </ul>
                </form>
            <?php } ?>
        </div>
    </div>

</body>
</html>
