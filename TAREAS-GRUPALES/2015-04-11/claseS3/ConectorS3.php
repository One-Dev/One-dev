<?php

require_once 'lib/aws.phar';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
class ConectorS3{

  private static function conectarS3(){

        $s3 = S3Client::factory(array(
            'key' => '   ',
            'secret' => '   ',
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
       $bucket = 'onedev/Unicenta';
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
          echo $descarga['Key'];
      } catch (S3Exception $e) {
          echo $e->getMessage() . "\n";
      }
  }

 }


