<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorBD.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();
$sql="SELECT productos.id_producto, marca.nombre,productos.modelo,productos.precio FROM productos inner join marca on productos.id_marca=marca.id_marca";
$rows=ConectorBD::ejecutarQuery($sql);

//creamos el carrito
$oCarrito = new Carrito();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $oCarrito->agregarACarrito($_POST['idProductoXAgregar']);
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
        <div><?php include('menu.php'); ?></div>
        <div id="productos">
            <?php foreach($rows as $row){ ?>
                    <ul class="telefonoEspecifico">
                            <li> Marca: <?php echo "{$row['nombre']}" ?></li>
                            <li> Modelo: <?php echo "{$row['modelo']}" ?></li>
                            <li> Precio: <?php echo "{$row['precio']}" ?></li>
                            <li>
                            <form id="agregarProducto-<?php echo "{$row['id_producto']}"; ?>" action="productos.php" method="post">
                                <input name="idProductoXAgregar" type="hidden" value="<?php echo "{$row['id_producto']}"; ?>">
                                <input name="accion" type="hidden" value="agregar">
                                <input type="submit" value="Agregar a Carrito">
                            </form>
                        </li>
                    </ul>
            <?php } ?>
        </div>
    </body>
</html>