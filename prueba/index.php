<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Eliminar Registros con Función PHPn</title>
<link type="text/css" href="bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 4px;
}
tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #4CAF50;
    color: white;
}
.main-wrapper{
	width:50%;
	
	background:#E0E4E5;
	border:1px solid #292929;
	padding:25px;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
img{
	width: 50px;
	height: 50px;
}
</style>
</head>

<body>
<div class="main-wrapper">
<h1>Eliminar Registros con Función PHP </h1>
<br><br>

<?php
	include("function.php");
?>
<table border="1" width="50%">
	<tr>
		<th width="41%">Nombres</th>
		<th width="50%">Apellidos</th>
		<th width="9%">Opcion</th>
	</tr>
<?php 
	$sql = "select * from direccion";
	$result = db_query($sql);
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		<td><?php echo $row->iddireccion;?></td>
		<td><?php echo $row->idcliente;?></td>
		<td>
   <a class="btn btn-primary" href="borrar.php?iddireccion=<?php echo $row->iddireccion;?>"><img src="../images/editar.png"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
        </td>
	</tr>
	<?php } ?>
</table>
</div>
</body>
</html>