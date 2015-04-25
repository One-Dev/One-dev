<?php
require_once("lib/ConectorBD.php");

class Usuarios {
    static function AgregarUsuario($NombreCompleto, $Usuario, $Password, $Tipo)
    {
        $sql="Select * FROM TUsuarios WHERE Usuario='$Usuario'";
        $frase='onedev';

        if(ConectorBD::ejecutarQuery($sql)){
            echo 'El Usuario ' .$Usuario.' ya existe';
        }else {
            if($Tipo=='Administrador'){
                $cTipo='A';
            }elseif($Tipo=='Soportista'){
                $cTipo='S';
            }else{
                $cTipo='C';
            }
            $sql = "INSERT INTO TUsuarios (NombreCompleto, Usuario, Password, Tipo, Estado) VALUES ('$NombreCompleto', '$Usuario', AES_ENCRYPT('$Password','$frase'), '$cTipo', '1')";
            ConectorBD::ejecutarQuery($sql);

        }
    }


    static  function ModificarCampo($IdUsuario,$Campo,$Valor){

        $sql="UPDATE TUsuarios SET $Campo='$Valor' WHERE IdUsuario=$IdUsuario";
        ConectorBD::ejecutarQuery($sql);


    }



}