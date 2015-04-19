<?php

require_once 'aws.phar';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
class ConectorS3{

  public static function conectarS3(){

        $s3 = S3Client::factory(array(

            

        ));

      return $s3;
    }

    public static function listadoS3()
    {
       $arreglo['objeto'] = array();
        $bucket = 'webproyecto2015';
        $bucketS3 = ConectorS3::conectarS3();
        $archivos = $bucketS3->getListObjectsIterator(array(
                'Bucket' => $bucket,
                 'Prefix'=> ''
        ));

        return $archivos;






    }

    public static function subirS3($archivo){
        $bucketS3 = ConectorS3::conectarS3();
        $bucket = 'webproyecto2015/Unicenta';
        $bucketS3->putObject(array(
        'Bucket' => $bucket,
        'Key' => $archivo,
        'Body' =>''
         ));
    }

   public static function borrarS3($archivo){


       $bucketS3 = ConectorS3::conectarS3();
       $bucket = 'webproyecto2015';
       $bucketS3->deleteObject(array(
           'Bucket' => $bucket,
           'Key'    => $archivo
       ));


   }


  public static function descargaS3($archivo){
       
  
 
  
   }


  }
