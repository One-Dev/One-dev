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
		<li><a href='sucursal.php'><span>Crear nueva Sucursal</span></a></li>
		<li><a href='Sucursales.php'><span>Listar Sucursales</span></a></li>
		<li><a href="Usuario.php">Crear Usuario</a></li>
		<li><a href="ListarUsuarios.php">Listar Usuarios</a></li>
		<li><a href="listado.php">Listar Respaldos</a></li>
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
    $lista=ConectorS3::listadoS3();
    $bucketS3 = new ConectorS3();
    if($_POST) {        
    if ($_POST['accion'] === 'borrar') {
        $bucketS3->borrarS3($_POST['objetoXborrar']);
     }
    if ($_POST['accion'] === 'descargar') {
          
         $s3 = ConectorS3::conectarS3();
         $bucket='webproyecto2015';
         $filename=$_POST['objetoXborrar'];
         $result = $s3->putObject(array(
    'Bucket' => $bucket,
    'Key'    => $filename,
    'Body'   => $filename,
    'ACL'    => 'public-read',
   ));
   $data=$result->toArray();
   $object_url=$data['ObjectURL'];
   $url= print_r($object_url,TRUE);
   header ('Location: '. $url);        
        }
   }
   ?>
     <form id="ListaAWS" action="listado.php" method="post">
        <?php
         foreach ($lista as $file) {?>
         <input id="valor" name="objetoXborrar" type="checkbox" value="<?php echo $file['Key'];?>">
         <?php echo $file['Key']."<br>";?>
         <?php }?>
        <button type="submit" name="accion" value="borrar" class="button" style="float:left; margin: 2px 2px 2px 2px;"> Borrar</button>
        <button type="submit" name="accion" value="descargar"class="button" style="float:left; margin: 2px 2px 2px 2px;"> Descargar </button>   
      </form>
	</ul>
	</div>   
	</div>
  </body>
  </html>
