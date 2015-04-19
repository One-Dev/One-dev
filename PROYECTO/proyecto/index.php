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
    $query="SELECT  Id,NombreCompleto,AES_DECRYPT(Password,'tclave') AS Password,Estado,Usuario from TUsuarios WHERE Usuario='$username' ";
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

            header("Location:menu.php");
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
<html>
<head lang"en">
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
<form id="loginForm" method="post" action="" >
	<div class="loginDiv">
		<img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
		<br>
        <input class="textbox" type="text" name="nombreUsuario" id="nombreUsuario"placeholder="nombreUsuario">
        <br>
        <input class="textbox" type="password" name="clave" id="clave" placeholder="clave">
        <br>
      	<br>
        <span class="mensajeError" ><?php if($bHayError) { echo $sMensajeError; } ?></span>
	    <input type="submit" id="enviarDatos" name="enviarDatos">
	</label>
	</div>
 </form>
</body>
</html>