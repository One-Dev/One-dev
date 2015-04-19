<?php
require_once 'lib/aws.phar';
#use Aws\S3\S3Client;

#$bucket = 'onedev/Unicenta';
#$keyname = 'hola123.txt';

// Instantiate the S3 client with your AWS credentials
#$s3 = S3Client::factory(array(
 #   'key' => 'AKIAI4HRXTASI5NMJICA',
 #   'secret' => 'Zhy+H7v0+dUIR2OYokoI+wrsUk/1iW3dbBzuic+m',
#));

// Upload data.
#$result = $s3->putObject(array(
 #   'Bucket' => $bucket,
  #  'Key'    => $keyname,
   # 'Body'   => 'Hello, world!'
#));.

require_once 'lib/ConectorS3.php';
$file='archivo.txt';
ConectorS3::subirS3($file);

?>