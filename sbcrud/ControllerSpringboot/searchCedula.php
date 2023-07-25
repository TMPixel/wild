<?php

    include_once('../ModelSpringboot/connection.php');

    $connectedInstance = Connection::connect();

    $newCedula = $_POST['txtCedula'];

    $sql = "SELECT COUNT(cedula) CONTEO FROM persona WHERE cedula='$newCedula'";

    $preparedStatement = $connectedInstance->prepare($sql);
    if(!$preparedStatement->execute()){
        die("Error en la operación SELECT");
    }
    $answer = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($answer);
?>