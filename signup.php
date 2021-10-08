<?php 
	require 'database.php';

	$message = '';

	if(!empty($_POST['user']) && !empty($_POST['correo']) && !empty($_POST['tel']) && !empty($_POST['nombre']) && !empty($_POST['paterno']) && !empty($_POST['pass'])){
		
		$sql = "INSERT INTO cliente (tel, correo, pass, user, nombre, paterno) VALUES (:tel, :correo, :pass, :user, :nombre, :paterno)";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':tel',$_POST['tel']);
		$correosinespacio = preg_replace('/\s+/', '', $_POST['correo']); 

		$stmt->bindParam(':correo',$correosinespacio);

		$password = password_hash($_POST['pass'], PASSWORD_BCRYPT);

		$stmt->bindParam(':pass',$password);
		$stmt->bindParam(':user',$_POST['user']);
		$stmt->bindParam(':nombre',$_POST['nombre']);
		$stmt->bindParam(':paterno',$_POST['paterno']);

		if ($stmt->execute()){
		$message = 'Cuenta creada con exito';
		}else{
		$message = 'Error al crear cuenta';
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://fonts.goggleapis.com/css/css?family=Roboto">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos1.css">
</head>
<body>
	<?php require 'partials/header.php' ?>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Resgistrarse</h1>
	<span><a href="login.php">Iniciar sesion</a></span>
	<form action="signup.php" method="post">
		
		<input type="text" name="correo" placeholder="Correo electronico">
		<input type="text" name="user" placeholder="Nombre de usuario">
		<input type="text" name="nombre" placeholder="Nombre">
		<input type="text" name="paterno" placeholder="Apellido paterno"> 
		<input type="text" name="tel" placeholder="Numero celular">
		<input type="password" name="pass" placeholder="Contraseña">
		<input type="password" name="passwordcon" placeholder="Confirmar contraseña">
		<input type="submit" name="send">

	</form>
</body>
</html>