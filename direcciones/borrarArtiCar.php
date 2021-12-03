<?php
include("funciones.php");
$idproducto = $_GET['idproducto'];
$idpedido = $_GET['idpedido'];
require_once '../conexion/database.php';

$mysql = "DELETE FROM detallepedido WHERE idpedido=:idpedido AND idproducto=:idproducto";
$agregard = $conn->prepare($mysql);
$agregard->bindParam(':idpedido', $idpedido);
$agregard->bindParam(':idproducto', $idproducto);

if ($agregard->execute()) {
    header('Location: ../carrito.php');
} else {
    echo 'Error al realizar la orden';
}
?>