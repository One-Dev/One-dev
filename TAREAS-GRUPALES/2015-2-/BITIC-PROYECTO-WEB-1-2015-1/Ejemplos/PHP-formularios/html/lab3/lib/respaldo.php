<?php
/**
 * Created by PhpStorm.
 * User: estudiante
 * Date: 20/02/15
 * Time: 10:19 PM
 */
<?php
               foreach( as $llaveBD=>$sValorPantalla) {
                   $sPlantilla = '<option value="{llaveBD}">{sValorPantalla}</option>';
                   echo str_replace(array("{llaveBD}","{sValorPantalla}"),
                       array($llaveBD,$sValorPantalla), $sPlantilla);
               }
                    ?>


<?php /*
            require_once('lab3/lib/ConectorDatos.php');
            $arrCelulares=new ConectorDatos();
            $arrCelularesDatos=$arrCelulares->buscarProductos();

                foreach($arrCelularesDatos as $llaveBD=>$sValorPantalla) {
                    echo "<option>$arrCelulares</option>";

                /*$sPlantilla = '<option value="{llaveBD}">{sValorPantalla}</option>';
                echo str_replace(array("{llaveBD}","{sValorPantalla}"),
                array($llaveBD,$sValorPantalla), $sPlantilla);*/
//}
?>