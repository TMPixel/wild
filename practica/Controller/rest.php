<?php
require_once('../Model/crud.php');

$serverMethod = $_SERVER['REQUEST_METHOD'];

switch ($serverMethod) {
    case 'GET':
        if (isset($_GET['cuenta'])) {
            CRUDTransacciones::buscarTransaccionPorCuenta($_GET['cuenta']);
        } elseif (isset($_GET['numTra'])) {
            CRUDTransacciones::buscarTransaccionPorId($_GET['numTra']);
        } else {
            CRUDTransacciones::mostrarTransacciones();
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->monto) && isset($data->cueEnv) && isset($data->cueRec)) {
            CRUDTransacciones::insertarTransaccion();
        } else {
            http_response_code(400); 
            echo json_encode(array("message" => "Faltan datos requeridos para insertar la transacción."));
        }
        break;
    default:
        http_response_code(405); 
        echo json_encode(array("message" => "Método no permitido."));
        break;
}
?>
