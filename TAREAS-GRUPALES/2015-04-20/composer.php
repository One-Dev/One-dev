<?php

require_once 'composer/vendor/autoload.php';

use Aws\S3\S3Client;

   $s3 = S3Client::factory(array(

             'key' => '',
            'secret' => '',

               ));
 
 

$bucket = 'webproyecto2015';
					

       $arreglo['objeto'] = array();
        $bucket = 'webproyecto2015';
        
        $archivos = $s3->getListObjectsIterator(array(
                'Bucket' => $bucket,
                 'Prefix'=> ''
        ));



 foreach ($archivos as $file) {
         
         echo $file['Key']."<br>";
      }



?>
