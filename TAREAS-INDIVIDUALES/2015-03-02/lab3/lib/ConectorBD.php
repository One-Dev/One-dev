<?php


class ConectorBD {
    private static $host = "localhost";
    private static $port = "3306";
    private static $user = "root";
    private static $password = "hola123";
    private static $dbh;
    private static $db = "bitic_25_dev_db";


    private static function abrirConexion() {
        try{

            $msqldb=self::$db;
            $servidor=self::$host;
            /**
             * Conección a base de datos exitosa
             */
            //modificar el string de conexion para que funcione con su base de datos
          self::$dbh = new PDO("mysql:host=$servidor;dbname=$msqldb", self::$user, self::$password);

        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    public static function ejecutarQuery() {
        ConectorBD::abrirConexion();
        //$sql= "SELECT id_marca,nombre FROM marca";
        $sql="select m.nombre,p.id,p.modelo,p.precio from marca m inner join productos p on m.id_marca=p.id_marca";
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


}