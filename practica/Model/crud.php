<?php
header("Content-Type: application/json");
    
include_once('connection.php');
class CRUDTransacciones{
    static $dbcon;
    private static function establecerConexion(){
        self::$dbcon = connection::conectar();
    }

    public static function mostrarTransacciones(){
        self::establecerConexion();
        $sql = "SELECT numTra, monto, cueEnv, cueRec FROM transacciones";
        //$sql="SELECT * FROM cuentas";
        $preparedStatement = self::$dbcon->prepare($sql);
        if(!$preparedStatement->execute()){
            die("Error en la operación mostrar transacciones");
        }
        $answer = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($answer);
        return;
        
    }
    public static function insertarTransaccion(){
        self::establecerConexion();
        $serverAnswer = json_decode(file_get_contents("php://input"));
        $monto = $serverAnswer->monto;
        $cueEnv = $serverAnswer->cueEnv;
        $cueRec = $serverAnswer->cueRec;
        $sql = "INSERT INTO transacciones(monto, cueEnv, cueRec) VALUES('$monto','$cueEnv','$cueRec')";
        $preparedStatement = self::$dbcon->prepare($sql);

    }

    public static function buscarTransaccionPorCuenta($cuenta){
        self::establecerConexion();
        $sql = "SELECT numTra, monto, cueEnv, cueRec FROM transacciones WHERE cueEnv = :cuenta OR cueRec = :cuenta";
        $preparedStatement = self::$dbcon->prepare($sql);
        $preparedStatement->bindParam(':cuenta', $cuenta, PDO::PARAM_STR);
        if (!$preparedStatement->execute()) {
            die("Error en la operación buscar transacción por cuenta");
        }
        $answer = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($answer);
        return;
    }

    public static function buscarTransaccionPorId($numTra){
        self::establecerConexion();
        $sql = "SELECT numTra, monto, cueEnv, cueRec FROM transacciones WHERE numTra = :numTra";
        $preparedStatement = self::$dbcon->prepare($sql);
        $preparedStatement->bindParam(':numTra', $numTra, PDO::PARAM_INT);
        if (!$preparedStatement->execute()) {
            die("Error en la operación buscar transacción por ID");
        }
        $answer = $preparedStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($answer);
        return;
    }
}
?>