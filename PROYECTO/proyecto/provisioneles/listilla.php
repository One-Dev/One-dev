<?php

// Include the AWS SDK using the Composer autoloader.
require 'aws.phar';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'onedev';

// Instantiate the client.
$s3 = S3Client::factory(array(
    'key' => 'AKIAI4HRXTASI5NMJICA',
    'secret' => 'Zhy+H7v0+dUIR2OYokoI+wrsUk/1iW3dbBzuic+m',
));
// Use the high-level iterators (returns ALL of your objects).
try {
    $objects = $s3->getIterator('ListObjects', array(
        'Bucket' => $bucket,
        'Prefix'
    ));

    echo "Keys retrieved!\n";
    foreach ($objects as $object) {
        echo $object['Key'] . "\n";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}

// Use the plain API (returns ONLY up to 1000 of your objects).
try {
    $result = $s3->listObjects(array('Bucket' => $bucket));

    echo "Keys retrieved!\n";
    foreach ($result['Contents'] as $object) {
        echo $object['Key'] . "\n";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}