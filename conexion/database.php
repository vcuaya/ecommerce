<?php 
	$server = 'localhost';
	$username = 'root';
	$password ='';
	$database = 'ecommerce';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
		//$conn = mysqli_connect('localhost','root','','commerce');
	} catch (PDOException $e){
		die('Connected failed: '.$e->getMessage());
	}

?>