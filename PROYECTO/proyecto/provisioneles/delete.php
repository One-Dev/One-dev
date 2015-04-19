<?php
require_once 'lib/ConectorS3.php';
$file='.txt';
ConectorS3::borrarS3($file);
// Include the AWS SDK using the Composer autoloader.
#require_once 'lib/aws.phar';

#use Aws\S3\S3Client;

#$s3 = S3Client::factory(array(
 #   'key' => 'AKIAI4HRXTASI5NMJICA',
 #   'secret' => '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',
#));


#$bucket = 'onedev/Unicenta';
#$keyname = 'hola123.txt';

#$result = $s3->deleteObject(array(
 #   'Bucket' => $bucket,
  #  'Key'    => $keyname
#));


