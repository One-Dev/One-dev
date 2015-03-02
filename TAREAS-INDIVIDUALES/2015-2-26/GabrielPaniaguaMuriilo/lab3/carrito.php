<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

$oCarrito = new Carrito();

$aProductosCarro = $oCarrito->listadoItemesCarrito();

if($_POST) {


    if($_POST['accion'] === 'eliminar') {
        $aElimProductosCarro=$oCarrito->eliminarDeCarrito($_POST['idProductoXEliminar']);


    } elseif($_POST['accion'] === 'modificar'){
        $aModifProductosCarro=$oCarrito->modificarDeCarrito($_POST['idProductoXModificarCarrito'],$_POST['cantProductos']);



    }elseif($_POST['accion'] === 'vaciar'){
         $aVaciarProductosCarro=$oCarrito->vaciaDeCarrito();

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
        <div  > <link rel="import" href='/lab3/menu.php'></div>
        </div>
        <div>Productos agregados</div>
        <div id="productos" name="productos" ><a href='productos.php'>Agregar</a></div><div id="carrito" name="carrito" ><a href="carrito.php">carrito</a></div>
            <hr>
            <?php foreach($aProductosCarro as $aDatosProducto) { ?>
                <ul>
                    <li>Producto:<?php echo $aDatosProducto['modelo']; ?></li>
                    <li>Marca:<?php echo $aDatosProducto['marca']; ?></li>
                    <li>Precio:<?php echo $resul=$aDatosProducto['precio']*$aDatosProducto['cantidad']; ?></li>
                    <li>Cantidad:<?php echo $aDatosProducto['cantidad'];?></li>

                    <li><form id="modificarCarritoXProducto-<?php echo $aDatosProducto['id']?>" action="carrito.php" method="post">
                            <input name="idProductoXModificarCarrito" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                            <input id="cantProductos" name="cantProductos" type="text" value="<?php echo $aDatosProducto['cantidad']; ?>" >
                            <input name="accion" type="hidden" value="modificar">
                            <input type="submit" value="Modificar el carrito">
                        </form>
                    </li>
                    <li>
                    <form id="eliminarXProducto-<?php echo $aDatosProducto['id']?>" action="carrito.php" method="post">
                        <input name="idProductoXEliminar" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                        <input name="accion" type="hidden" value="eliminar">
                        <input type="submit" value="ELiminar de Carrito">
                    </form>
                    </li>
                </ul>
            <?php }  ?>
        </div>
     <div>
         <form id="vaciarXProducto" action="carrito.php" method="post">
            <input name="idProductoXVaciar" type="hidden" >
            <input name="accion" type="hidden" value="vaciar">
            <input type="submit" value="Vaciar el carrito">
        </form>

     </div>
    </body>
</html>
