<?php

//$sInd = "$sMas $sFem";

//$arrOpciones[] = 'Masculino';
/*
$arrOpciones['opc1'] = 'Masculino';
$arrOpciones['opc2'] = 'Femenino';
*/
session_start();
$sMas = 'Masculino';
$sFem = 'Femenino';
$arrOpciones = array($sMas,$sFem);
//require_once('/lab3/lib/ConectorDatos.php');
$arrEstadoCivil = array(
    'casado' => 'CASADO',
    'soltero' => 'SOLTERO',
    'divorciado' => 'DIVORCIADO',
    'union_libre' => 'UNION LIBRE'
);

$arrayMoviles=array('HTC' => array( '1VX' => 649.95 ),
            'Samsung' => array( 'Note2' => 699.95,
    'Galaxy S5' => 499.95,
    'Galaxy Ace' => 249.95),
            'Nokia' => array( 'Lumia' => 999.95),
            'OnePlus' => array( 'One Plus One' => 299.50 )

        );
var_dump($arrOpciones);
var_dump($arrEstadoCivil);
var_dump($arrayMoviles);



?>
<!DOCTYPE html>
<!-- saved from url=(0057)file:///Users/vsecades/Desktop/LAB3/html5-formulario.html -->
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <!-- estilos en pagina -->
            <style>


        </style>
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <script type="application/javascript" src="scripts/scripts.js"></script>
    </head>
    <body>
    Login
    <!-- id -->
    <form id="loginForm" method="post" action="html5-formularios.php" onsubmit="validarDatos();return false;">
        <div id="titulo">Lista desordenada</div>
        <!-- unordered list -->
        <ul class="eliminarVineta">
            <li>
                <label for="nombreUsuario">Nombre de usuario: </label>
                <br>
                <input type="text" name="nombreUsuario" id="nombreUsuario" value="" maxlength="10">
            </li>
            <li>
                <label for="clave">Password: </label>
                <br>
                <input type="password" name="clave" id="clave">
            </li>
            <li>
                <select name="genero" id="genero">
                    <?php 
                        foreach($arrOpciones as $opcion) {
                    ?>        
                      <option value="<?php echo $opcion; ?>"><?php echo $opcion; ?></option>

                    <?php
                        }
                    ?>
                </select>

                <select name="genero2" id="genero2">
                    <?php
                    foreach($arrOpciones as $opcion1) {
                        $sPlantilla = '<option value="{opcion}">{opcion}</option>';
                        echo str_replace('{opcion}',$opcion1,$sPlantilla);
                    }
                    ?>
                </select>

                <select name="estadoCivil" id="estadoCivil">
                    <?php
                    foreach($arrEstadoCivil as $llaveBD=>$sValorPantalla) {
                        $sPlantilla = '<option value="{llaveBD}">{sValorPantalla}</option>';
                        echo str_replace(array("{llaveBD}","{sValorPantalla}"),
                            array($llaveBD,$sValorPantalla),
                            $sPlantilla);
                    }
                    ?>
                </select>
            </li>
            <li>
                <label for="codigo">Código secreto</label>
                <br>
                        <textarea name="codigo" id="codigo" cols="30">
                        </textarea>
            </li>
            <li>
                <input type="submit" id="enviarDatos" name="enviarDatos">
            </li>
        </ul>
    </form>
    <ol>
        <br/>
        <li>
            <select name="marcaCelular" id="marcaCelular">
            <?php
           /* $arrayunico= array($marcasCel,$marcasCel,$sValorPantalla);*/
           // $arrayunico2=array_unique($arrayunico);
            foreach($arrayMoviles as $marcasCel =>$modCel){
                foreach($modCel as $modeloCel => $precioCel){
                    $sPlantilla1 = '<option value="{marcascel}">{sValorPantalla}</option>';
                    echo str_replace(array ("{marcasCel}","{sValorPantalla}"),
                        array($marcasCel,$marcasCel,$sValorPantalla),$sPlantilla1);


                }
            }
            ?>
            </select>
        </li>
        </br>
        <li>
            <select name="modeloCelular" id="modeloCelular">
                <?php
                foreach($arrayMoviles as $marcasCel =>$modCel){
                    foreach($modCel as $modeloCel => $precioCel){
                        $sPlantilla1 = '<option value="{marcascel}">{sValorPantalla}</option>';
                        echo str_replace(array("{marcasCel}","{sValorPantalla}"),
                            array($marcasCel,$modeloCel,$sValorPantalla), $sPlantilla1);
                    }
                }
                ?>
             </select>
        </li>
        </br>
        <li>
            <select name="precioCelular" id="precioCelular">
                <?php
                foreach($arrayMoviles as $marcasCel =>$modCel){
                    foreach($modCel as $modeloCel => $precioCel){
                        $sPlantilla1 = '<option value="{marcascel}">{sValorPantalla}</option>';
                        echo str_replace(array("{marcasCel}","{sValorPantalla}"),
                            array($marcasCel,$precioCel,$sValorPantalla), $sPlantilla1);
                    }
                }
                ?>
                </select>
        </li>

         <?php /*
         foreach($arrayMoviles as $marcasCel =>$modCel){
             foreach($modCel as $modeloCel => $precioCel){
                echo"\n ".$marcasCel." ".$modeloCel." ".$precioCel;
             }
         }*/
         ?>

        </li>

        <li></li>
        <li></li>
    </ol>




    </body></html>

