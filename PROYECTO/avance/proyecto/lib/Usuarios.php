<?php
require_once("lib/ConectorBD.php");

class Usuarios {
    static function AgregarUsuario($IdUsuario, $NombreCompleto, $Usuario, $Password, $Tipo)
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
            $sql = "INSERT INTO TUsuarios (Id, NombreCompleto, Password, Tipo, Estado, Usuario) VALUES ('$IdUsuario', '$NombreCompleto', AES_ENCRYPT('$Password','$frase'), '$cTipo', '1', '$Usuario')";
            ConectorBD::ejecutarQuery($sql);
            echo "Se Agrego el Usuario $Usuario correctamente";
        }
    }
}