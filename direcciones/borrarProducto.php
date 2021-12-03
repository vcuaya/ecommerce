<?php 
include("funciones.php");
$id = $_GET['idproducto'];
delete('producto','idproducto',$id);
header("location: ../vistas/perfil_admin_productos.php");
?>