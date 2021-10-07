<?php
	session_start();

	if(isset($_SESSION['user_id'])){
		header('Location: /indice.php');
	}
	require 'database.php';

	if(!empty($_POST['correo']) && !empty($_POST['password'])){
		$records = $conn->prepare('SELECT idcliente, correo, password FROM cliente WHERE correo = :correo');
		$records->bindParam(':correo', $_POST['correo']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (($num = count($results)) > 0 &&  password_verify($_POST['password'], $results['password'])){
			$message = "Exito";
			$_SESSION['user_id'] = $results['idcliente'];
			header("Location: /indice.php");
		}else{
			if(count($results) != 0)
			{
				echo "$num";
				$message = "Estas credenciales no coinciden, intente de nuevo";
			}else{
				if(password_verify($_POST['password'], $results['password'])){
					$message = "Contraseña incorrecta";
				}
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
		<input type="password" name="password" placeholder="Contraseña">
		<input type="submit" name="send">
	</form>
	<span><a href="signup.php">Registrarse</a></span>

</body>
</html>