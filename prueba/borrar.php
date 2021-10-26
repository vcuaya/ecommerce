<?php 
include("function.php");
$id = $_GET['iddireccion'];
delete('direccion','iddireccion',$id);
header("location:index.php");
?>