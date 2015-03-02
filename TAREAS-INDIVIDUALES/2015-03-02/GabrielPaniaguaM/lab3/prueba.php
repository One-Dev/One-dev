<?php
require_once("lib/ConectorBD.php");
/**
* Created by PhpStorm.
* User: estudiante
* Date: 28/02/15
* Time: 08:23 PM
*/

$arregloBD=ConectorBD::ejecutarQuery();
var_dump($arregloBD);
//foreach($arregloBD as $row){
    //echo "<li>{$row['id_marca']}  {$row['nombre']}</li>";
 //   echo "<li>Marca: {$row['nombre']} Id: {$row['id']}  Precio: {$row['precio']} Modelo: {$row['modelo']}</li>";
//}
?>
<!DOCTYPE html>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <style>
div { border: solid 1px grey;padding: 5px;}
        </style>
    </head>
    <body>
        <div id="header">
    Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
</div>
<div><?php include('menu.php'); ?></div>
<div id="productos">
    <?php
    //foreach($aTelefonos as $sMarca=>$aProductosMarca) {
      //  foreach($aProductosMarca as $sIdProducto=>$aDatosProducto) {
    foreach($arregloBD as $filaBD){
    //echo "<li>{$row['id_marca']}  {$row['nombre']}</li>";
    //   echo "<li>Marca: {$row['nombre']} Id: {$row['id']}  Precio: {$row['precio']} Modelo: {$row['modelo']}</li>";
    //}
            ?>

            <ul class="telefonoEspecifico">
                <li>Marca:<?php echo $filaBD['nombre']; ?></li>
                <li>Modelo: <?php echo $filaBD['modelo']; ?></li>
                <li>Precio: <?php echo $filaBD['precio']; ?></li>
                <li>
                    <form id="agregarProducto-<?php echo $sIdProducto; ?>" action="productos.php" method="post">
                        <input name="idProductoXAgregar" type="hidden" value="<?php echo $sIdProducto; ?>">
                        <input name="accion" type="hidden" value="agregar">
                        <input type="submit" value="Agregar a Carrito">
                    </form>
                </li>
            </ul>
        <?php
      //  }
    }
    ?>

</div>
</body>
</html>

