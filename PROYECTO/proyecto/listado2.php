<html>
    <?php
    require 'lib/ConectorS3.php';
#    require_once 'lib/aws.phar';

    use Aws\S3\Exception\S3Exception;
    $bucketS3 = new ConectorS3();
        if($_POST) {
            if ($_POST['accion'] === 'borrar') {
                $bucketS3->borrarS3($_POST['objetoXborrar']);
            }

            if ($_POST['accion'] === 'descargar') {

            }
        }
    ?>
    <?php
    $lista=ConectorS3::listadoS3();
    foreach ($lista as $file) {
    ?>
    <input id="valor" name="check" type="checkbox" value="<?php echo $file['Key'];?>">
    <?php   echo $file['Key']."<br>";   ?>
    <?php } ?>
    <form id="deleteObjeto-<?php echo $file['Key']; ?>" action="listado.php" method="post">
        <input name="objetoXborrar" type="hidden" value="<?php echo $file['Key']; ?>">
        <input name="accion" type="hidden" value="borrar">
        <input type="submit" value="Borrar">
    </form>
    <form id="descargarObjeto-<?php echo $file['Key']; ?>" action="listado.php" method="post">
        <input name="objetoXdescarga" type="hidden" value="<?php echo $file['Key']; ?>">
        <input name="accion" type="hidden" value="descargar">
        <input type="submit" value="Descargar">
    </form>
</html>




