<?php 
include("funciones.php");
$id = $_GET['idcategoria'];
delete('categoria','idcategoria',$id);
header("location: ../vistas/perfil_admin_categorias.php");
?>