<?php
require_once("lib/Validation.php");
if($_POST) {
    $arrErrores = array();
    var_dump($_POST);

    $valNombre = Validation::noEstaVacio("Nombre", $_POST['nombre']);
    if (is_array($valNombre)) {
        $arrErrores[] = $valNombre['mensajeError'];
    } else {
        $valNombreFormato = Validation::esSoloAlfa("Nombre",$_POST['nombre']);
        if (is_array($valNombreFormato)) {
            $arrErrores[] = $valNombreFormato['mensajeError'];
        }

    }

    $valApellido1= Validation::noEstaVacio("Apellido1", $_POST['apellido1']);
    if (is_array($valApellido1)) {
        $arrErrores[] = $valApellido1['mensajeError'];
    } else {
        $valApellido1Formato = Validation::esSoloAlfa("Apellido1",$_POST['apellido1']);
        if (is_array($valApellido1Formato)) {
            $arrErrores[] = $valApellido1Formato['mensajeError'];
        }

    }

    $valApellido2 = Validation::noEstaVacio("Apellido2", $_POST['apellido2']);
    if (is_array($valApellido2)) {
        $arrErrores[] = $valApellido2['mensajeError'];
    } else {
        $valApellido2Formato = Validation::esSoloAlfa("Apellido2",$_POST['apellido2']);
        if (is_array($valApellido2Formato)) {
            $arrErrores[] = $valApellido2Formato['mensajeError'];
        }

    }

    $valEmail = Validation::noEstaVacio("Email", $_POST['email']);
    if (is_array($valEmail)) {
        $arrErrores[] = $valEmail['mensajeError'];

    } else {
        $valLongitudCorreo = Validation::tieneXLongitud("Email",$_POST['email']);
        $valEmailFormato = Validation::esEmail("Email",$_POST['email']);
        if (is_array($valEmailFormato)) {
            $arrErrores[] = $valEmailFormato['mensajeError'];
        }
        if (is_array($valLongitudCorreo)) {
            $arrErrores[] = $valLongitudCorreo['mensajeError'];
        }

    }


    $valDireccion = Validation::noEstaVacio("Direccion", $_POST['direccion']);
    if (is_array($valDireccion)) {
        $arrErrores[] = $valDireccion['mensajeError'];
    } else {
        $valDireccionFin = Validation::esAlfanumerico("Direccion", $_POST['direccion']);


        if (is_array($valDireccionFin)) {
            $arrErrores[] = $valDireccionFin['mensajeError'];
        }
    }


    $valEstadoCivil = Validation::noEstaVacio("EstadoCivil", $_POST['estadoCivil']);
    if (is_array($valEstadoCivil)) {
        $arrErrores[] = $valEstadoCivil['mensajeError'];
    } else {
        $valEstadoCivilFin = Validation::esAlfanumerico("EstadoCivil", $_POST['estadoCivil']);

        if (is_array($valEstadoCivilFin)) {
            $arrErrores[] = $valEstadoCivilFin['mensajeError'];
        }
    }

    $valGenero = Validation::noEstaVacio("Genero", $_POST['genero']);
    if (is_array($valEstadoCivil)) {
        $arrErrores[] = $valGenero['mensajeError'];
    } else {
        $valGeneroFin = Validation::esNumerico("Genero",['genero']);
        if (is_array($valGeneroFin)) {
            $arrErrores[] = $valGeneroFin['mensajeError'];
        }
    }


}
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>Ejemplos de validacion</div>
        <form name="frmCedula" method="post" action="index.php" >
            <ul>
                <li><label>Nombre*: </label> <input type="text" name="nombre"></li>
                <li><label>Apellido1*: </label> <input type="text" name="apellido1"></li>
                <li><label>Apellido2*: </label> <input type="text" name="apellido2"></li>
                <li><label>Email*: </label> <input type="text" name="email"></li>
                <li>
                    <label>Género*: </label>
                    <select name="genero">
                        <option value="1">Seleccionar Uno...</option>
                        <option value="mas">Masculino</option>
                        <option value="fem">Femenino</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><label>Dirección*: </label> <textarea cols="10" rows="5" name="direccion"></textarea> </li>
                <li>
                    <label>Estado civil*: </label>
                    <select name="estadoCivil">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="viudo">Viudo</option>
                        <option value="unionLibre">Union Libre</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><input type="submit" value="Enviar Datos"></li>
                <?php if($_POST) { ?>
                <li>

                    <ul class="mensajeError">
                        <?php


                            if(sizeof($arrErrores) > 0){
                                foreach($arrErrores as $strError) {
                                    echo("<li>$strError</li>");
                                }
                            }
                        ?>
                    </ul>

                </li>
                <?php } ?>
            </ul>

        </form>

    </body>
</html>