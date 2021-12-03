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
$recordsc = $conn->prepare("SELECT *  FROM pedido where status= 'carrito' and idcliente =" . $user['idcliente'] . "");
$recordsc->execute();
$resultsc = $recordsc->fetch(PDO::FETCH_ASSOC);

if (is_array($resultsc)) {
  if (count($resultsc) > 0) {
    $pedido = $resultsc;
  }
}

$idproducto = $_GET['idproducto'];
$cantidad = 1;

print $idproducto;
print $cantidad;

$mysql = "INSERT INTO detallepedido (idpedido, idproducto, cantidad) VALUES (:idpedido, :idproducto, :cantidad)";
$agregard = $conn->prepare($mysql);
$agregard->bindParam(':idpedido', $pedido['idpedido']);
$agregard->bindParam(':idproducto', $idproducto);
$agregard->bindParam(':cantidad', $cantidad);
if ($agregard->execute()) {
    header('Location: ../carrito.php');
} else {
    echo 'Error al realizar la orden';
}

?>