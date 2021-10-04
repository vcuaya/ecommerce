<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.goggleapis.com/css/css?family=Roboto">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos1.css">
</head>
<body>

	<?php require 'partials/header.php' ?>

	<h1>Login</h1>

	<form action="login.php" method="post">
		<input type="text" name="email" placeholder="Correo electronico">
		<input type="password" name="contraseña" placeholder="Contraseña">
		<input type="submit" name="send">
	</form>
	<span><a href="signup.php">Registrarse</a></span>

</body>
</html>