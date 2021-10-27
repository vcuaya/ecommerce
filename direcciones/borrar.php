<?php 
include("funciones.php");
$id = $_GET['iddireccion'];
delete('direccion','iddireccion',$id);
header("location:principal.php");
?>