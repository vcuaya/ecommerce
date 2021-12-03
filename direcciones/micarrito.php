<?php
require_once '../conexion/database.php';
if (isset($_GET['idpedido'])) {
    $idpedido = $_GET['idpedido'];
    
    $mysql = "UPDATE pedido SET status='orden' WHERE idpedido = :idpedido";

    $agregard = $conn->prepare($mysql);


    $agregard->bindParam(':idpedido', $idpedido);


    if ($agregard->execute()) {
        header('Location: ../carrito.php');
    } else {
        echo 'Error al realizar la orden';
    }
}

?>