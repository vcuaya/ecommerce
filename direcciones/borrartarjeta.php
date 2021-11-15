<?php 
include("funciones.php");
$id = $_GET['idpago'];
delete('pago','idpago',$id);
header("location:../perfil_tarjeta.php");
?>