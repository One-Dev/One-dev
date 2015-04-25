<?php

class Validation {

    static $validationErrors;

    static function noEstaVacio($nombreCampo,$contenido) {
        $contenido = str_replace(" ","",$contenido);
        if(!$contenido || strlen($contenido) === 0){
            return array('resultado'=>false,
                'mensajeError' => "El campo $nombreCampo está vacío",
                'campoDelError' => $nombreCampo
            );
        }
        return true;
    }

    static function esAlfanumerico() {

    }

    static function tieneXLongitud() {

    }

    static function esNumerico() {

    }


    static function esEmail($nombreCampo,$contenido) {
        $bEsEmail = filter_var($contenido,FILTER_VALIDATE_EMAIL);
        echo 'valor de $bEsEmail ';
        var_dump($bEsEmail);
        if($bEsEmail === false){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }


}