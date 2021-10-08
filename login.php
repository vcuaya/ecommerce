<?php
session_start();
$alert ='';
require "database.php";

if(!empty($_POST))
{
	if(empty($_POST['correo']) || empty($_POST['pass']))
	{
		$alert = 'Ingrese usuario y contraseña';
	}
	else{
		

		$correo = $_POST['correo'];
		$password = password_hash($_POST['pass'], PASSWORD_BCRYPT);

		/*$query = $conn->prepare('SELECT idcliente, correo, pass FROM cliente WHERE correo = :correo and pass = :pass');
		$query->bindParam(':correo', $_POST['correo']);
		$query->bindParam(':pass', $password);
		$query->execute();*/

		$query = mysqli_query($conn,"SELECT * FROM cliente WHERE correo = '$correo' and pass = '$password'");
		//$result = 0;
		//$result = count($query);
		//$result = mysqli_num_rows($query);
		$result = mysqli_num_rows($query);

		
		
		
		
		if($result > 0)
		{
			$data = mysqli_fetch_array($query);
			$_SESSION['correo'] = $data['correo'];
			$_SESSION['pass'] = $data['pass'];

			header('location:indice.php');
		}
		else
		{
			$alert= 'Usuario o contraseña inválidos';
			session_destroy();
		}
	}
}
?>

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

	<?php if(!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif;?>

	<form action="login.php" method="post">
		<input type="text" name="correo" placeholder="Correo electronico">
		<input type="password" name="pass" placeholder="Contraseña">
		<input type="submit" name="send">
	</form>
	<span><a href="signup.php">Registrarse</a></span>

</body>
</html>