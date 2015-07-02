<?php 

session_start();

$_SESSION['email'] = $_POST['email'];
$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");


if (empty($_SESSION['email'])) {
	header('Location: index.php');
}

 ?>