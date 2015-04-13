<?php

require_once 'aws.phar';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
class ConectorS3{

  public static function conectarS3(){

        $s3 = S3Client::factory(array(
            'key' => 'AKIAI4HRXTASI5NMJICA',
            'secret' => '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',
        ));

            return $s3;
    }

    public static function listadoS3()
    {
        $arreglo['objeto'] = array();
        $bucket = 'onedev';
        $bucketS3 = ConectorS3::conectarS3();
        $archivos = $bucketS3->getListObjectsIterator(array(
                'Bucket' => $bucket,
                 'Prefix'=> 'Unicenta/'
        ));

        return $archivos;

    }

    public static function subirS3($archivo){
        $bucketS3 = ConectorS3::conectarS3();
        $bucket = 'onedev/Unicenta';
        $bucketS3->putObject(array(
        'Bucket' => $bucket,
        'Key' => $archivo,
        'Body' =>''
         ));
    }

   public static function borrarS3($archivo){
       $bucketS3 = ConectorS3::conectarS3();
       $bucket = 'onedev';
       $bucketS3->deleteObject(array(
           'Bucket' => $bucket,
           'Key'    => $archivo
       ));
   }


  public static function descargaS3($archivo){
      $bucketS3 = ConectorS3::conectarS3();
      $bucket = 'onedev/Unicenta';
      try {
          // Get the object
         $descarga= $bucketS3->getObject(array(
              'Bucket' => $bucket,
              'Key'    => $archivo
          ));

          // Display the object in the browser
         header("Content-Type: {$descarga['ContentType']}");

      } catch (S3Exception $e) {
          $e->getMessage() . "\n";
      }
  }

 }


