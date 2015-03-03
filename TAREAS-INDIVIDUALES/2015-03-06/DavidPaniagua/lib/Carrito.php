<?php

require_once("lib/ConectorBD.php");

class Carrito {

    var $redirectUrl = 'carrito.php';

    function __construct() {
    }

    function __destruct() {
    }

    function agregarACarrito($idProducto) {
        $session=session_id();
        $query="SELECT id_Producto FROM carrito WHERE id_Producto=$idProducto and id_Sesion='$session' ";
        if(ConectorBD::ejecutarQuery($query)) {
            $cant=ConectorBD::ejecutarValor("SELECT cantidad FROM carrito WHERE id_Producto=$idProducto and id_Sesion='$session' ");
            $cant_Producto=$cant+1;
            $sql="UPDATE carrito SET cantidad=$cant_Producto WHERE id_Producto=$idProducto and id_Sesion='$session' ";
        }else{
            $sql="INSERT INTO carrito(id_Producto, id_Sesion, cantidad) VALUES ($idProducto,'$session',1)";
        }

        $carrito=ConectorBD::ejecutarQuery($sql);
        foreach($carrito as $row){
            echo "<li>{$row['id_Producto']}  {$row['id_Sesion']}  {$row['cantidad']}</li>";
        }
    }

    /**
     *
     */
    function borrarCarrito() {
        $sql="DELETE FROM carrito ";
        ConectorBD::ejecutarQuery($sql);
    }

    /**
     * @param $idArticulo
     * @param $cantidad
     */
    function modificarArticulo($idProducto,$cantidad){
        $session = session_id();
        $query = "SELECT id_Producto FROM carrito WHERE id_Producto=$idProducto and id_Sesion='$session' ";
        if (ConectorBD::ejecutarQuery($query)) {
            if ($cantidad == 0) {
                $this->eliminarArticuloDeCarrito($idProducto);
            } else {
                $sql = "UPDATE carrito SET cantidad=$cantidad WHERE id_Producto=$idProducto and id_Sesion='$session' ";
                ConectorBD::ejecutarQuery($sql);
            }
        }
    }

    /**
     * Elimina artículo específico del carrito en sesión
     * @param $idArticulo Id del artículo
     */
    function eliminarArticuloDeCarrito($idProducto) {
        $session = session_id();
        $query = "SELECT id_Producto FROM carrito WHERE id_Producto=$idProducto and id_Sesion='$session' ";
        if (ConectorBD::ejecutarQuery($query)) {
            $sql = "DELETE FROM carrito WHERE id_Producto=$idProducto and id_Sesion='$session' ";
            ConectorBD::ejecutarQuery($sql);
        }
    }
}
?>