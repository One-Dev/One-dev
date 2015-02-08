<?php


define('servidorBD', 'localhost');
define('nombreBD', 'unicenta');
define('usuarioBD', 'root');
define('pswdBD', 'hola123');
define('rutaResp', '/home/estudiante/One-dev/TAREAS-GRUPALES/2015-2-7/backupsUnicenta'); /*cambiar usuario  si se modifica el codigo*/

$hora = time();
$fecHa = date("d-m-Y_H_i_s",$hora);
$archSQL= rutaResp . '/' ."RespaldoFull"."_". nombreBD . '_' . $fecHa.'.sql';
$archResp =  $archSQL.'.tar'.'.gz';
$cmdDump = 'mysqldump  -h ' . servidorBD . ' -u ' . usuarioBD. ' -p' . pswdBD  . ' ' . nombreBD .'>'.$archSQL;
$cmdTar= 'tar -czf' .$archSQL .$archResp;
system($cmdDump);
/*system($cmdTar);*/
?>