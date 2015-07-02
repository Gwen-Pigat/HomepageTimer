<?php 

session_start();

$_SESSION['email'] = $_POST['email'];

$link = mysqli_connect("gettextrjpgwen.mysql.db","gettextrjpgwen","War12wick","gettextrjpgwen")or die("Erreur de connexion");


if (empty($_SESSION['email'])) {
	header('Location: index.php');
}

 ?>