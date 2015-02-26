<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

//creamos el carrito
$oCarrito = new Carrito();
$aProductosCarro = $oCarrito->listadoItemesCarrito();
if($_POST) {
    if($_POST['accion'] === 'eliminar') {
        $aEliminar=$oCarrito->eliminarDelCarrito($_POST['idProductoXEliminar']);
    }
    elseif($_POST['accion'] === 'modificar') {
        $oCarrito->modificarDelCarrito($_POST['idProductoXModificar'],$_POST['cantProducto']);
    }
    elseif($_POST['accion'] === 'eliminarCarrito') {
        $oCarrito->eliminarCarrito();
    }
}

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
        <div>Productos agregados</div>
        <a href="productos.php">Volver a los productos</a>
        <div id="productosDeCarrito">
            <hr>
            <?php foreach($aProductosCarro as $aDatosProducto) { ?>
                <ul>
                    <li>Producto:<?php echo $aDatosProducto['modelo']; ?></li>
                    <li>Marca:<?php echo $aDatosProducto['marca']; ?></li>
                    <li>Precio:<?php echo $aDatosProducto['precio']*$aDatosProducto['cantidad']; ?></li>
                    <li>Cantidad:<?php echo $aDatosProducto['cantidad']; ?></li>
                    <li>
                        <form id="eliminarProducto-<?php echo $aDatosProducto['id']; ?>" action="carrito.php" method="post">
                            <input name="idProductoXEliminar" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                            <input name="accion" type="hidden" value="eliminar">
                            <input type="submit" value="Eliminar uno del Carrito">
                        </form>
                    </li>
                    <li>
                        <form id="modificarCantProducto-<?php echo $aDatosProducto['id']; ?>" action="carrito.php" method="post">
                            <input name="idProductoXModificar" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                            <input id="cantProducto" name="cantProducto" type="text" value="<?php echo $aDatosProducto['cantidad']; ?>">
                            <input name="accion" type="hidden" value="modificar">
                            <input type="submit" value="Modificar cantidad del Carrito">
                        </form>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <div>
            <ul>
                <form id="eliminarCarrito" action="carrito.php" method="post">
                    <input name="eliminarCarrito" type="hidden">
                    <input name="accion" type="hidden" value="eliminarCarrito">
                    <input type="submit" value="Eliminar todo el Carrito">
                </form>
            </ul>
        </div>
    </body>
</html>
