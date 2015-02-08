<?php


define('servidorBD', 'localhost');
define('nombreBD', 'unicenta');
define('usuarioBD', 'root');
define('pswdBD', 'hola123');
define('rutaResp', '/home/estudiante/backupsUnicenta');

$hora = time();
$fecHa = date("d-m-Y_H:i:s",$hora);

$archResp = rutaResp . '/' ."RespaldoFull"."_". nombreBD . '_' . $fecHa .'.sql'.'.gz';
$command = 'mysqldump  -h ' . servidorBD . ' -u ' . usuarioBD. ' -p' . pswdBD  . ' ' . nombreBD . ' | gzip > ' . $archResp;
system($command);

?>