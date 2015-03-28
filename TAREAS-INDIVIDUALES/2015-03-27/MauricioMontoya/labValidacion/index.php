<?php
require_once("lib/Validation.php");
if($_POST) {
    $arrErrores = array();
    var_dump($_POST);
    $valNombre = Validation::noEstaVacio("Nombre",$_POST['nombre']);
    if(is_array($valNombre)){
        $arrErrores[] = $valNombre['mensajeError'];
    }

    $valEmail = Validation::noEstaVacio("Email", $_POST['email']);
    if(is_array($valEmail)) {
        $arrErrores[] = $valEmail['mensajeError'];
    }else {
        $valEmailFormato = Validation::esEmail("Email", $_POST['email']);
        if(is_array($valEmailFormato)) {
            $arrErrores[] = $valEmailFormato['mensajeError'];
        }
    }

    $valNum = Validation::noEstaVacio("Edad", $_POST['edad']);
    if(is_array($valNum)) {
        $arrErrores[] = $valNum['mensajeError'];
    }else {
        $valNumFormato = Validation::esNumero("Edad", $_POST['edad']);
        if(is_array($valNumFormato)) {
            $arrErrores[] = $valNumFormato['mensajeError'];
        }
    }

    $valAlfaNum = Validation::noEstaVacio("Password", $_POST['password']);
    if(is_array($valAlfaNum)) {
        $arrErrores[] = $valAlfaNum['mensajeError'];
    }else {
        $valAlfaNumFormato = Validation::esAlfanumerico("Password", $_POST['password']);
        if(is_array($valAlfaNumFormato)) {
            $arrErrores[] = $valAlfaNumFormato['mensajeError'];
        }
    }

    $valAlfa = Validation::noEstaVacio("Apellido1", $_POST['apellido1']);
    if(is_array($valAlfa)) {
        $arrErrores[] = $valAlfa['mensajeError'];
    }else {
        $valAlfaFormato = Validation::esAlfa("Apellido1", $_POST['apellido1']);
        if(is_array($valAlfaFormato)) {
            $arrErrores[] = $valAlfaFormato['mensajeError'];
        }
    }

    $valLongitudMinima = Validation::noEstaVacio("Identificacion", $_POST['id']);
    $longMinimaPermitida = 10; //establecemos la longitud minima del campo en 10.
    if(is_array($valLongitudMinima)) {
        $arrErrores[] = $valLongitudMinima['mensajeError'];
    }else{
        $valLongitudMinima = Validation::tieneXLongitud("Identificacion", $_POST['identificacion'],$longMinimaPermitida);
        if(is_array($valLongitudMinima)) {
            $arrErrores[] = $valLongitudMinima['mensajeError'];
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
                <li><label>Edad: </label> <input type="text" name="edad"></li>
                <li><label>Email*: </label> <input type="text" name="email"></li>
                <li>
                    <label>Género*: </label>
                    <select name="genero">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="mas">Masculino</option>
                        <option value="fem">Femenino</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><label>Dirección*: </label> <textarea cols="10" rows="5"></textarea> </li>
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
                <li><label>Contrasena: </label><input type="text" name="password"></li>
                <li><label>Identificacion: </label><input type="text" name="id""></li>;
                <br/>
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