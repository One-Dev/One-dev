<?php


class ConectorBD {
    private static $host = 'localhost';
    private static $port = '3306';
    private static $user = 'root';
    private static $password = 'hola123';
    private static $dbh;
    private static $db = 'bitic_25_dev_db';

    private static function abrirConexion() {
        try{
            self::$dbh = new PDO('mysql:host=localhost;dbname=bitic_25_dev_db', self::$user, self::$password);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    public static function ejecutarQuery($Sql) {
        ConectorBD::abrirConexion();
        $query = self::$dbh->prepare($Sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public static function ejecutarValor($Sql) {
        ConectorBD::abrirConexion();
        $query = self::$dbh->prepare($Sql);
        $query->execute();
        $result = $query->fetchColumn();
        return $result;
    }
}
