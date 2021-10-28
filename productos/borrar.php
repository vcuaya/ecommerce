<?php 
include("funciones.php");
$id = $_GET['idproducto'];
delete('producto','idproducto',$id);
header("location: verproductos.php");
?>