<?php
class Test
{
    private static $nameUtente = "root";
    private static $password  = "";
    private static $nameHost  = "10.10.20.15";
    private static $nameDatabase = "vagrant";
    private static $_connection;

    private function __construct() { 
    }

    public static function getConnection() {
        if(self::$_connection == null){
            self::$_connection = new mysqli(self::$nameHost, self::$nameUtente, self::$password, self::$nameDatabase);
            if (self::$_connection->connect_error) {
                die('Errore di connessione (' . self::$_connection->connect_errno . ') ' . self::$_connection->connect_error);
            } else {
                echo 'Connesso. ' . self::$_connection->host_info . "\n";
            }
            return self::$_connection;
        }
    }
}
Test::getConnection();
?>