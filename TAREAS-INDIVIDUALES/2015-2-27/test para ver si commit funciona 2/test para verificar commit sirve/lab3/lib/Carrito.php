<?php

class Carrito {

    var $redirectUrl = 'carrito.php';

    function __construct() {
        $this->revisarCarrito();
    }

   //function __destruct() {
     //   $this->DestruirCarrito();
    //}

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
    //esta es la funcion que el profesor nombre como eliminar de Carrito que en mi caso para destruir un producto
    function eliminarUnProducto($idProducto, $idProducto=1) {
        $eliminarProducto = $_SESSION['carrito'];
        foreach
        if(array_key_exists($idProducto,$eliminarProducto){
            //unset($agregarACarrito[$idProducto]);
            $eliminarProducto[$idProducto] -=$idProducto;


        }

        $_SESSION['carrito'] = $eliminarProducto;
        header("Location: $this->redirectUrl");

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

    //esta la funcion que destruye el carrito
    function DestruirCarrito() {
        if (array_key_exists('carrito',$_SESSION) === true){
           unset($_SESSION['carrito']);

       }

    }

}
?>