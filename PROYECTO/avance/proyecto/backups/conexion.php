<?php
/*require 'lib/aws.phar';
require 'lib/ConnectS3.php';


use Aws\S3\S3Client;

$bucket = 'onedev';

// Instantiate the S3 client with your AWS credentials
$s3 = S3Client::factory(array(
    'key' => 'AKIAI4HRXTASI5NMJICA',
    'secret' => 'Zhy+H7v0+dUIR2OYokoI+wrsUk/1iW3dbBzuic+m',
));



$objects = $s3->getListObjectsIterator(array(
    'Bucket' => $bucket,
    'Prefix' => 'Unicenta/'
));

foreach ($objects as $object) {
    echo $object['Key'] . "<br>";
}*/
require 'lib/ConectorS3.php';

$lista=ConectorS3::listadoS3();

foreach ($lista as $object) {
    echo $object['Key']."<br>";

}
?>