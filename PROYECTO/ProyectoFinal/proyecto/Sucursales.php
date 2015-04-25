<?php
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Sucursal.php");

session_start();
UtilidadesSesion::revisarSesionActiva();
$aSucursales = new Sucursal();

if($_POST) {
    if($_POST['accion'] === 'modificarSucursal') {



        $aSucursales->ModificarCampo($_POST['IdSucursal'], $_POST['Campo'], $_POST['Valor']);

    }

    if($_POST['accion2'] === 'refrescarSucursal') {

        $archivo = $aSucursales->modArchSucursal($_POST['$NombreBD'], $_POST['$usuarioBD'], $_POST['$NombreSucursal'], $_POST['$URL'],$_POST['IdSucursal']);


    }


}

$sql="SELECT * FROM TSucursal ORDER BY NombreSucursal ASC";
$rows=ConectorBD::ejecutarQuery($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <style>
        table, td, th {

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
<div class="square" >
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
    <div id="divContenido" style="float:left;width:1200px;height:100%;">
        <div id="NuevaSucursal">
            <center><b>Listado de Sucursales</b></center>
            <hr>
            <?php
            $directory = "configuraciones";
             foreach($rows as $row){
              foreach(glob($directory.'/*.sh') as $file) {
                  $valor = "{$row['archConfig']}";
                  $valor2 = basename($file);
                  if ($valor2 === $valor) { ?>


                  <ul>
                  <form id="modificarSucursal" action="Sucursales.php" method="post">
                  <table>

                  <tr>
                      <th>Sucursal</th>
                      <th>Ubicacion</th>
                      <th>NombreSucursal</th>
                      <th>NombrePOS</th>
                      <th>NombreBD</th>
                      <th>Usuario BD</th>
                      <th>Conexion</th>
                      <th>Bucket</th>
                      <th>Archivo Configuracion</th>
                  </tr>


                  <tr>
                  <td><?php echo "{$row["IdSucursal"]}" ?></td>
                  <td><?php echo "{$row['Ubicacion']}" ?></td>
                  <td><?php echo "{$row['NombreSucursal']}" ?></td>
                  <td><?php echo "{$row['NombrePOS']}" ?></td>
                  <td><?php echo "{$row['NombreBD']}" ?></td>
                  <td><?php echo "{$row['usuarioBD']}" ?></td>
                  <td><?php echo "{$row['URL']}" ?></td>
                  <td><?php echo "{$row['Bucket']}" ?></td>
                  <td><?php  echo '<a href="' . $file . '">' . "{$row['archConfig']}" . ' ' . '</a>';?> </td>
                        </tr>
                    <br>
                    <table>
                  <input list="Campo" name="Campo">
                    <datalist id="Campo">
                        <option value="Ubicacion">
                        <option value="NombreSucursal">
                        <option value="NombrePOS">
                        <option value="NombreBD">
                        <option value="UsuarioBD">
                        <option value="URL">
                        <option value="Bucket">
                    </datalist>

                        <input type="text" name="Valor" id="Valor">
                        <input name="accion" value="modificarSucursal" type="hidden">
                         <input type="submit" value="Modificar Sucursal">

                        <input name="IdSucursal" value="<?php echo "{$row['IdSucursal']}"; ?>" type="hidden">
                        <input name="$NombreBD" value="<?php echo "{$row['NombreBD']}"; ?>" type="hidden">
                        <input name="$NombreSucursal" value="<?php echo "{$row['NombreSucursal']}"; ?>" type="hidden">
                        <input name="$usuarioBD" value="<?php echo "{$row['usuarioBD']}"; ?>" type="hidden">
                        <input name="$URL" value="<?php echo "{$row['URL']}"; ?>" type="hidden">
                        <input name="$arch1" value="<?php echo "{$row['archConfig']}"; ?>" type="hidden">
                        <input name="accion2" value="refrescarSucursal" type="hidden">
                        <input type="submit" value="Refrescar Archivo">

                        </table>

                  </table>
              </form>

               </ul>
            <?php }
              }
             }?>
        </div>
    </div>
<div>
</body>
</html>
