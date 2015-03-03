<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

$oCarrito = new Carrito();

if($_POST) {
    if(array_key_exists("accion",$_POST)) {
        if($_POST['accion'] === "borrarCarrito" ) {
            $oCarrito->borrarCarrito();
        } elseif ($_POST['accion'] === "modificarArticulo") {
            $oCarrito->modificarArticulo($_POST['idXModificar'],$_POST['cantidadArticulo']);
        } elseif ($_POST['accion'] === "eliminarArticulo") {
            $oCarrito->eliminarArticuloDeCarrito($_POST['idXEliminar']);
        }
    }
}
$sql="SELECT productos.id_producto, marca.nombre,productos.modelo,productos.precio,carrito.cantidad FROM productos inner join marca on productos.id_marca=marca.id_marca inner join carrito on productos.id_producto=carrito.id_producto";
$rows=ConectorBD::ejecutarQuery($sql);
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
        <div id="vaciarCarrito" >
            <form id="borrarCarrito" action="carrito.php" method="post">
                <input name="accion" value="borrarCarrito" type="hidden">
                <input type="submit" value="Borrar Carrito">
            </form>
        </div>
        <div><?php include('menu.php'); ?></div>
        <div>Productos agregados</div>
        <div id="productosDeCarrito">
            <hr>
                <?php foreach($rows as $row){ ?>
                    <ul>
                        <li> Marca: <?php echo "{$row['nombre']}" ?></li>
                        <li> Modelo: <?php echo "{$row['modelo']}" ?></li>
                        <li> Precio: <?php echo "{$row['precio']}" ?></li>
                        <li> Cantidad: <?php echo "{$row['cantidad']}" ?></li>
                        <li>
                            <form id="modificarCantProducto-<?php echo "{$row['id_producto']}"; ?>" action="carrito.php" method="post">
                                <input type="number" value="<?php echo "{$row['cantidad']}"; ?>" name="cantidadArticulo">
                                <input name="idXModificar" value="<?php echo "{$row['id_producto']}"; ?>" type="hidden">
                                <input name="accion" value="modificarArticulo" type="hidden">
                                <input type="submit" value="Actualizar">
                            </form>
                        </li>
                        <li>
                            <form id="eliminarProducto-<?php echo "{$row['id_producto']}"; ?>" action="carrito.php" method="post">
                                <input name="idXEliminar" value="<?php echo "{$row['id_producto']}"; ?>" type="hidden">
                                <input name="accion" value="eliminarArticulo" type="hidden">
                                <input type="submit" value="Eliminar">
                            </form>
                        </li>
                    </ul>
            <?php } ?>
        </div>
    </body>
</html>
