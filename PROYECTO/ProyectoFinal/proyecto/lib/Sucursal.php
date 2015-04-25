<?php
require_once("lib/ConectorBD.php");



class Sucursal {

    static function AgregarSucursal($Ubicacion, $NombreSucursal, $NombrePOS, $NombreBD,$usuarioBD,$URL, $Bucket,$archivo)
    {

            $sql = "INSERT INTO TSucursal(Ubicacion, NombreSucursal, NombrePOS, usuarioBD, NombreBD, URL, Bucket, archConfig) VALUES ('$Ubicacion', '$NombreSucursal', '$NombrePOS', '$NombreBD','$usuarioBD', '$URL', '$Bucket','$archivo')";
            ConectorBD::ejecutarFila($sql);


    }

     /*  static function ModificarCampo ($IdSucursal, $Campo, $Valor,$arch2){

            $sql="UPDATE TSucursal SET archConfig='$arch2' WHERE IdSucursal=$IdSucursal";
            $sql2="UPDATE TSucursal SET $Campo='$Valor' WHERE IdSucursal=$IdSucursal";
            ConectorBD::ejecutarQuery($sql);
            ConectorBD::ejecutarQuery($sql2);




    }*/


    static function ModificarCampo ($IdSucursal, $Campo, $Valor){


        $sql="UPDATE TSucursal SET $Campo='$Valor' WHERE IdSucursal=$IdSucursal";
        ConectorBD::ejecutarQuery($sql);



    }

      static function crearArchSucursal($bdname,$usuario,$sucursal,$hostpos){

            date_default_timezone_set("America/Costa_Rica");
            $fecha=date("h:i:sa");
            $passwd="unicenta";
            $archivo="configs".$sucursal.$fecha.".sh";
            $varoper1='$host';
            $varoper2='$nuevohost';
            $varoper3='$SQL';


            /*paramteros lubuntu*/
            $varhost="host=$(cat /etc/hostname)";
            $nuevohost="nuevohost=".$sucursal;
            $export1="export nuevohost";
            $create1="S1="."\"CREATE DATABASE IF NOT EXISTS"." ".$bdname.";\"";
            $create2="S2="."\"GRANT ALL ON *.* TO"." "."'$usuario'"."@"."'$hostpos'"." "."IDENTIFIED BY"." "."'$passwd'".";\"";
            $create3="S3=\"FLUSH PRIVILEGES;\"";
            $create4="SQL="."\""."$"."{S1}"."$"."{S2}"."$"."{S3}"."\"";
            $create5="sed -i \"s/$varoper1/$varoper2/g\" /etc/hosts";
            $create6="sed -i \"s/$varoper1/$varoper2/g\" /etc/hostname";
            $create7="mysql -uroot -pproyecto2015 -e \"$varoper3\"";
            $create8="/unicenta/configure.sh";
            /*parametros lubuntu*/

            $wizard = fopen("configuraciones/$archivo","w");
            fwrite($wizard,$varhost."\n");
            fwrite($wizard,$nuevohost."\n");
            fwrite($wizard,$export1."\n");
            fwrite($wizard,$create1."\n");
            fwrite($wizard,$create2."\n");
            fwrite($wizard,$create3."\n");
            fwrite($wizard,$create4."\n");
            fwrite($wizard,$create5."\n");
            fwrite($wizard,$create6."\n");
            fwrite($wizard,$create7."\n");
            fwrite($wizard,$create8."\n");
            fclose($wizard);

          return $archivo;


      }

    static function modArchSucursal($bdname,$usuario,$sucursal,$hostpos,$id){

        date_default_timezone_set("America/Costa_Rica");
        $fecha=date("h:i:sa");
        $passwd="unicenta";
        $archivo="configs".$sucursal.$fecha.".sh";
        $varoper1='$host';
        $varoper2='$nuevohost';
        $varoper3='$SQL';
        /*paramteros lubuntu*/
        $varhost="host=$(cat /etc/hostname)";
        $nuevohost="nuevohost=".$sucursal;
        $export1="export nuevohost";
        $create1="S1="."\"CREATE DATABASE IF NOT EXISTS"." ".$bdname.";\"";
        $create2="S2="."\"GRANT ALL ON *.* TO"." "."'$usuario'"."@"."'$hostpos'"." "."IDENTIFIED BY"." "."'$passwd'".";\"";
        $create3="S3=\"FLUSH PRIVILEGES;\"";
        $create4="SQL="."\""."$"."{S1}"."$"."{S2}"."$"."{S3}"."\"";
        $create5="sed -i \"s/$varoper1/$varoper2/g\" /etc/hosts";
        $create6="sed -i \"s/$varoper1/$varoper2/g\" /etc/hostname";
        $create7="mysql -uroot -pproyecto2015 -e \"$varoper3\"";
        $create8="/unicenta/configure.sh";
        /*parametros lubuntu*/

        $wizard = fopen("configuraciones/$archivo","w");
        fwrite($wizard,$varhost."\n");
        fwrite($wizard,$nuevohost."\n");
        fwrite($wizard,$export1."\n");
        fwrite($wizard,$create1."\n");
        fwrite($wizard,$create2."\n");
        fwrite($wizard,$create3."\n");
        fwrite($wizard,$create4."\n");
        fwrite($wizard,$create5."\n");
        fwrite($wizard,$create6."\n");
        fwrite($wizard,$create7."\n");
        fwrite($wizard,$create8."\n");
        fclose($wizard);

        $sql="UPDATE TSucursal SET archConfig='$archivo' WHERE IdSucursal=$id";

        ConectorBD::ejecutarQuery($sql);


    }


}


