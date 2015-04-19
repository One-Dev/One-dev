<?php
require_once("lib/ConectorBD.php");


class Sucursal {

    static function AgregarSucursal($Ubicacion, $NombreSucursal, $NombrePOS, $NombreBD, $Cantidad, $Version, $URL, $Bucket)
    {
        $sql="Select NombreSucursal FROM TSucursal WHERE NombreSucursal=$NombreSucursal";
        if(ConectorBD::ejecutarFila($sql)){
            echo 'La sucursal' .$NombreSucursal.' ya existe';
        }else {
            $sql = "INSERT INTO TSucursal(Ubicacion, NombreSucursal, NombrePOS, NombreBD, Cantidad, Version, URL, Bucket) VALUES ('$Ubicacion', '$NombreSucursal', '$NombrePOS', '$NombreBD', $Cantidad, '$Version', '$URL', '$Bucket')";
            ConectorBD::ejecutarFila($sql);
            echo "Se Agrego la sucursal $NombreSucursal correctamente";
        }
    }

    static function ModificarCampo ($IdSucursal, $Campo, $Valor){
        $sql="UPDATE TSucursal SET $Campo='$Valor' WHERE IdSucursal=$IdSucursal";
        ConectorBD::ejecutarQuery($sql);
        $sql="SELECT NombreSucursal FROM TSucursal WHERE IdSucursal=$IdSucursal";
        $Nombre=ConectorBD::ejecutarValor($sql);
        echo "Se Modifico Correctamente el campo $Campo por $Valor en la sucursal $Nombre";
    }
}