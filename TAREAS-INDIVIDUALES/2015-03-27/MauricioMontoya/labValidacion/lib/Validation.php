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
        $bEsAlfaNum = ctype_alnum($contenido);
        echo 'valor de $bEsAlfaNum ';
        var_dump($bEsAlfaNum);
        if($bEsAlfaNum === false){
            return array('resultado'=>false,
                'mensajeError' => "El dato introducido en el campo $nombreCampo es invalido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function tieneXLongitud($nombreCampo,$contenido,$longMinima) {
        $longitudX = $longMinima; //Establecemos el largo de "X", el valor contra el que se compara.
        $longitudContenido = strlen($contenido);
        echo 'longitud de $contenido ';
        var_dump($longitudContenido);
        if($longitudContenido < $longitudX){
            return array('resultado'=>false,
                'mensajeError' => "El dato introducido en el campo $nombreCampo es muy corto, debe exceder los $longMinima caracteres.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function esNumero($nombreCampo,$contenido) {
        $bEsNumero = filter_var($contenido,FILTER_VALIDATE_INT);
        echo 'valor de $bEsNumero ';
        var_dump($bEsNumero);
        if($bEsNumero === false){
            return array('resultado'=>false,
                'mensajeError' => "El dato introducido en el campo $nombreCampo es invalido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
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

    static function esAlfa($nombreCampo,$contenido) {
        $bEsAlfa = ctype_alpha($contenido);
        echo 'valor de $bEsAlfa ';
        var_dump($bEsAlfa);
        if($bEsAlfa === false){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

}