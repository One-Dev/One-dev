<?php
/**
 * Created by PhpStorm.
 * User: estudiante
 * Date: 23/03/15
 * Time: 06:41 PM
 */

class Validation {

    static $validationErrors;
    /* no lo necesitamos
    function __construct() {

    }
    */

    /**
     * Revisar si el $contenido viene vacío
     * @param $contenido El contenido a validar
     */
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

    static function esAlfanumerico($nombreCampo,$contenido) {
     $esAlfa=ctype_alnum($contenido);
        if($esAlfa===false) {

            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );

        }
        return $esAlfa;


        /*$patronCarac = '/^[a-z]+([a-z0-9._]*)?[a-z0-9]+$/i';
        if ( ! preg_match($patronCarac, $contenido))
        {
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );
        }
       return true;*/
  }
    static function tieneXLongitud($nombreCampo,$contenido) {

        if (strlen($contenido)<10) {

            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es demasiado corto.",
                'campoDelError' => $nombreCampo
            );
        }
       return true;
    }

    static function esNumerico($nombreCampo,$contenido) {
        $esNum=is_numeric($contenido);

        if ($esNum===false)
        {
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );
        }

        return $esNum;
    }

    /**
     * Validando si el email es válido
     * @param $nombreCampo Nombre del campo en el formulario para display
     * @param $contenido  Contenido que ingresamos en el input del formulario
     */
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

    static function esSoloAlfa($nombreCampo,$contenido) {

        if(! ctype_alpha($contenido)){

            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es solo para letras.",
                'campoDelError' => $nombreCampo
            );

        }

        return true;

    }

}