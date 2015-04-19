<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<form class="square">
	<div id='divMenu' style="float:left;width:200px;height:100%;">
	<img src="img/onedev-logo.png" alt="Mountain View" style="width:200px;height:200px">
  	<ul>
	   <li><a href='sucursal.php'><span>Configurar nueva VM</span></a></li>
	   <li><a href="recuperacion.php">Recuperar VM</a></li>
	   <li><a href="Sucursales.php">Listar Sucursales</a></li>
	   <li><a href='#'>Acceso Backup</a></li>
	   <li><a href="Usuario.php">Crear nuevo User</a></li>
	   <li class='last'><a href="soporte.html"><span>Soporte</span></a></li>
	</ul>
	</div>
	<div id="divContenido" style="height:100%">
	<div id="divBotones">

	<br>
	<center><b>Listado de respaldos</b></center>
	</div>
	<hr width="790px" size="2" color="gray" align="center">
	<div style="height:649px;width:790px;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
    </form>
        <?php
    require_once 'lib/ConectorS3.php';

    $bucketS3 = new ConectorS3();
        if($_POST) {
            if ($_POST['accion'] === 'borrar') {
               $bucketS3->borrarS3($_POST['objetoXborrar']);
        }

        if ($_POST['accion'] === 'descargar') {
            //$bucketS3->descargaS3($_POST['objetoXborrar']);
        }
        }
        ?>
    <form id="deleteObjeto" action="listado.php" method="post">
        <?php
    $lista=ConectorS3::listadoS3();
    foreach ($lista as $file) {
    ?>
        <input id="valor" name="objetoXborrar" type="checkbox" value="<?php echo $file['Key'];?>">
        <?php echo $file['Key']."<br>";?>
       <?php }?>
        <input name="accion" type="hidden" value="borrar">
        <input type="submit" value="Borrar" class="button" style="float:left; margin: 2px 2px 2px 2px;">
        <input name="accion" type="hidden" value="descargar">
        <input type="submit" value="Descargar" class="button" style="float:left; margin: 2px 2px 2px 2px;">
    </form>
	</ul>
	</div>   
	</div>

</body>
</html>