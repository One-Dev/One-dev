<?php

class Carrito {

    var $redirectUrl = 'carrito.php';

    function __construct() {
        $this->revisarCarrito();
    }

    function __destruct() {

    }

    function agregarACarrito($idProducto,$iProducto=1) {
        $aTempCarrito = $_SESSION['carrito'];

        if(array_key_exists($idProducto,$aTempCarrito)) {
            $aTempCarrito[$idProducto] += $iProducto;
        }else{
            $aTempCarrito[$idProducto] = $iProducto;
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location: $this->redirectUrl");
    }

    function eliminarDeCarrito($idProducto) {
        $borrarDelCarrito = $_SESSION['carrito'];
        if(array_key_exists($idProducto,$borrarDelCarrito)) {
            unset($borrarDelCarrito[$idProducto]);
        }
        $_SESSION['carrito'] = $borrarDelCarrito;
        header("Location: $this->redirectUrl ");

    }

    function vaciaDeCarrito(){
            unset($_SESSION['carrito']);
        header("Location: $this->redirectUrl ");
    }


    function  modificarDeCarrito($idProducto,$cantidad){

       $aModifCarrito = $_SESSION['carrito'];

        if(array_key_exists($idProducto,$aModifCarrito)) {

            $aModifCarrito[$idProducto] = $cantidad;

            }

        $_SESSION['carrito']=$aModifCarrito;

        header("Location: $this->redirectUrl ");

    }

    /**
     * Retorna itemes de carro en el SESSION
     * @return array Itemes carro
     */
    function listadoItemesCarrito() {
        $aCarrito = $_SESSION['carrito'];
        // id, modelo, marca, precio
        $aItemesCarro = array();
        //construye itemes de carro
        foreach($aCarrito as $idModeloTelefono => $sCantidadModelo) {
            $aProducto = ConectorDatos::buscarProductoEspecifico($idModeloTelefono);
            $aProducto['cantidad'] = $sCantidadModelo;
            $aItemesCarro[] = $aProducto;
        }

        return $aItemesCarro;

    }




    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }
}
?>