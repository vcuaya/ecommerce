<?php

session_start();

require_once '../conexion/database.php';
$user = null;

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM cliente WHERE idcliente = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    if (count($results) > 0) {
        $user = $results;
    }
}
if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];

    $mysql = "UPDATE pedido SET status='orden' WHERE idpedido = :idpedido";

    $agregard = $conn->prepare($mysql);


    $agregard->bindParam(':idpedido', $idpedido);


    if ($agregard->execute()) {
        $status = "carrito";
        $mysql2 = "INSERT INTO pedido (status, idcliente) values (:status, :idcliente)";
        $agregard2 = $conn->prepare($mysql2);
        $agregard2->bindParam(':status', $status);
        $agregard2->bindParam(':idcliente', $user['idcliente']);
        $agregard2->execute();
        header('Location: ../carrito.php');
    } else {
        echo 'Error al realizar la orden';
    }
}
