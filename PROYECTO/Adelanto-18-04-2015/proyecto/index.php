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
    $username=$_POST['NombreUsuario'];
    $query="SELECT  IdUsuario, NombreCompleto, Usuario, AES_DECRYPT(Password,'onedev') AS Password, Tipo, Estado from TUsuarios WHERE Usuario='$username'";
    $aUser=ConectorBD::ejecutarFila($query);
    if(ConectorBD::ejecutarQuery($query)){
        //clave exista
        if( $aUser['Password'] === $_POST['clave'] ) {
            UtilidadesSesion::guardarEnSesion('IdUsuario',$aUser['IdUsuario']);
            UtilidadesSesion::guardarEnSesion('NombreCompleto',$aUser['NombreCompleto']);
            UtilidadesSesion::guardarEnSesion('Usuario',$aUser['Usuario']);
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

?>

<!DOCTYPE html>
<html>
<head lang"es">
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
<form id="loginForm" method="post" action="" >
	<div class="loginDiv">
		<img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
		<br>
        <input class="textbox" type="text" name="NombreUsuario" id="NombreUsuario" placeholder="NombreUsuario">
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
