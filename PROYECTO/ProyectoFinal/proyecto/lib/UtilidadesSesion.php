<?php


class UtilidadesSesion {

    static function revisarSesionActiva() {
        if( array_key_exists('NombreCompleto',$_SESSION) === false ) {
            header('Location: index.php?nosession=1');
        }
    }

    static function guardarEnSesion($sLlave, $sValor) {
        $_SESSION[$sLlave] = $sValor;
    }


}

?>
