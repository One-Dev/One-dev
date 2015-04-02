<?php
session_start();
require_once('lib/UtilidadesSesion.php');
require_once("lib/ConectorBD.php");


//nombreUsuario y clave
$bHayError = false;
$sMensajeError = '';
if(array_key_exists('nosession',$_GET)) {
    $bHayError = true;
    $sMensajeError .= 'Necesita autenticar al usuario';
}

//que $_POST exista
if ($_POST) {
    //nombre usuario exista
    $username=$_POST['nombreUsuario'];
    $query= "SELECT * FROM TUsuarios WHERE Usuario='$username' ";
    $aUser=ConectorBD::ejecutarFila($query);

    if(ConectorBD::ejecutarQuery($query)){
        //clave exista
        if( $aUser['Password'] === $_POST['clave'] ) {
            UtilidadesSesion::guardarEnSesion('IdUsuario',$aUser['Id']);
            UtilidadesSesion::guardarEnSesion('nombreCompleto',$aUser['NombreCompleto']);
            UtilidadesSesion::guardarEnSesion('Usuario',$aUser['Usuario']);
            UtilidadesSesion::guardarEnSesion('Password',$aUser['Password']);
            UtilidadesSesion::guardarEnSesion('Tipo',$aUser['Tipo']);
            UtilidadesSesion::guardarEnSesion('Estado',$aUser['Estado']);

            header("Location:sucursal.php");
        } else {
            $sMensajeError .= 'Clave incorrecta. ';
            $bHayError = true;
        }
    } else {
        $sMensajeError .= 'Usuario incorrecto. ';
        $bHayError = true;
    }
}

if($_POST) {
    echo 'imprimiendo POST';
    var_dump($_POST);
} elseif ($_GET) {
    echo 'imprimiendo GET';
    var_dump($_GET);
} elseif ($_REQUEST) {
    echo 'imprimiendo REQUEST';
    var_dump($_REQUEST);
}

?>
<!DOCTYPE html>
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <style>


    </style>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <script type="application/javascript" src="scripts/scripts.js"></script>
</head>
<body>

<form id="loginForm" method="post" action="" >
    <div id="titulo">Login</div>
    <ul class="eliminarVineta">
        <li>
            <label for="nombreUsuario">Nombre de usuario: </label>
            <br>
            <input type="text" name="nombreUsuario" id="nombreUsuario" value="" maxlength="50">
        </li>
        <li>
            <label for="clave">Password: </label>
            <br>
            <input type="password" name="clave" id="clave">
        </li>
        <li>
            <span class="mensajeError" ><?php if($bHayError) { echo $sMensajeError; } ?></span>
            <br/>
            <input type="submit" id="enviarDatos" name="enviarDatos">
        </li>
    </ul>
</form>


</body></html>
