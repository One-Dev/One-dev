<?php
require 'aws.phar';
require_once 'lib/ConectorS3.php';

use Aws\S3\S3Client;
$s3 = ConectorS3::conectarS3();
$bucket='webproyecto2015';
$filename='bash.txt';


$result = $s3->putObject(array(
    'Bucket' => $bucket,
    'Key'    => $filename,
    'Body'   => $filename,
    'ACL'    => 'public-read',
));
$data=$result->toArray();
$object_url=$data['ObjectURL'];
?>

<a href="<?php print_r($object_url); ?>">Click Here</a>
