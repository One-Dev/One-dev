<?php
session_start();
var_dump($_SESSION);
$idModelo= $_SESSION['idBoton']; //si le paso idModelo la funcion no acepta string
$idModelo2=(int)$idModelo;
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
$valorImp=ConectorDatos::buscarProductoEspecifico($idModelo2);
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
        <div id="productosDeCarrito">
            <label>Celular Seleccionado:</label>
            <?php foreach($valorImp as $sImpresion => $valor ){ echo " \n".$valor;}?>
        </div>
    </body>
</html>
