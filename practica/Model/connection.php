<?php
 class connection{
    public static function conectar(){
        define("server","localhost");
        define("database","banco");
        define("user","root");
        define("password","");

        $conf = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        try{
            $con = new PDO("mysql:host=".server."; dbname=".database,user,password,$conf);
            return $con;
            
        }catch(Exception $e){
            die("Error en la conexión a la base de datos");
        }
    }
 }

?>