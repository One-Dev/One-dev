<?php
require_once("lib/ConectorBD.php");
class Carrito {


    var $redirectUrl = 'carrito.php';

    function __construct() {
        $this->revisarCarrito();
    }

    function __destruct() {

    }

      /*
       * agrega itemes a carrito
       */

    function agregarACarrito($idProducto) {
        $sesionLog=session_start();
        $sql="INSERT INTO carrito(id_Producto, id_Sesion,cantidad) VALUES ($idProducto,'$sesionLog',1)";
        ConectorBD::ejecutarQuery($sql);
        header("Location: $this->redirectUrl");
    }


    /**
     * Retorna itemes de carro de la bd
     *
     */
    function listadoItemesCarrito() {
       $sql="select cc.id_Sesion,cc.id_producto,m.nombre,p.modelo,p.precio,cc.cantidad from carrito cc INNER JOIN  productos p on cc.id_producto=p.id INNER JOIN marca m on m.id_marca = p.Id_marca ";
        $listaCarr=ConectorBD::ejecutarQuery($sql);
        return $listaCarr;
    }

    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }

    /**
     *elimina todos los registros de la tabla carrito
     */
    function borrarCarrito() {
        $sql="TRUNCATE TABLE carrito";
        ConectorBD::ejecutarQuery($sql);
    }

    /**
     * modifica el artuiculo en la tabla carrito
     * @param $idArticulo
     * @param $cantidad
     */
    function modificarArticulo($idProducto,$cantidad) {

        $sql = "UPDATE carrito SET cantidad=$cantidad WHERE id_Producto=$idProducto ";
        ConectorBD::ejecutarQuery($sql);
        header("Location: $this->redirectUrl");
    }

    /**
     * Elimina artículo específico del carrito en sesión
     * @param $idArticulo Id del artículo
     */
    function eliminarArticuloDeCarrito($idProducto) {

        $sql = "DELETE FROM carrito WHERE id_Producto=$idProducto ";
        ConectorBD::ejecutarQuery($sql);
    }
}
?>