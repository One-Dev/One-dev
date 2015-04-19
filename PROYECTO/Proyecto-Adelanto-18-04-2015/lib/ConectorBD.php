<?php

class ConectorBD {
    private static $user = 'root';
    private static $password = 'hola123';
    private static $dbh;

    private static function abrirConexion() {
        try{
            self::$dbh = new PDO('mysql:host=localhost; dbname=Proyecto', self::$user, self::$password);
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
    public static function ejecutarFila($Sql) {
        ConectorBD::abrirConexion();
        $query = self::$dbh->prepare($Sql);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
