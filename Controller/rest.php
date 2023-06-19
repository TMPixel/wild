<?php
 /*
    $permittedDomain = "http://localhost:8080/cliente";
    header("Access-Control-Allow-Origin: $permittedDomain");
    header("Access-Control-Allow-Headers: content-type");
    header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");
    header("Content-Type: application/json");
    */

    require_once('../Model/personDataAccess.php');

    $serverMethod = $_SERVER['REQUEST_METHOD'];

    switch($serverMethod){
        case 'GET':
            CRUDPerson::readPersons();
            break;
        case 'POST':
            CRUDPerson::insertPerson($_POST['CEDULA'], $_POST['NOMBRE'], $_POST['APELLIDO'], $_POST['EDAD']);
            break;
        case 'PUT':
            CRUDPerson::updatePerson($_GET['CEDULA'], $_GET['NOMBRE'], $_GET['APELLIDO'], $_GET['EDAD']);
            break;
        case 'DELETE':
            CRUDPerson::deletePerson($_GET['CEDULA']);
            break;
    }
?>