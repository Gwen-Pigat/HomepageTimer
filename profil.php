<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="version_1/fr/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
</head>


<?php

session_start();

$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr");
$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));

if ($row == 0) {
	header('Location: index.php');
}

 ?>

<title><?php echo $row['email']; ?></title>

<div class="position text-center">
    <div class="col-md-12 spot">
        <p class="col-md-2 col-md-offset-2">Votre position :<br><span class="spot"><?php echo $row['id']; ?></span></p>
         <?php $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(id) FROM Catcher WHERE adresse_ip!='$_SERVER[REMOTE_ADDR]'")); 

         if ($row){ ?>
             <i class="col-md-2 col-md-offset-1 fa fa-user"></i><p class="col-md-2 col-md-offset-1">Derrière vous :<br><span class="behind"><?php echo $row['id']; ?></span></p>
         <?php }
         else{ ?>
         <i class="col-md-2 col-md-offset-1 fa fa-user"></i><p class="col-md-2 col-md-offset-1">Derrière vous :<br><span class="behind">0</span></p>
         <?php } ?>
    </div>
<br>
<h1>Merci de votre inscription !<br>Textr sera bientot lancé !</h1>
<br>

<?php 

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));
$url = "index.php?token_invite=$row[identifiant]";

echo "<div class='container'>
<h5 class='col-md-6 col-md-offset-3'>Partagez ce lien afin de remonter votre place dans le classement<br><a href=$url>http://www.textr.com/	$url</a></h5>
<br>";

?>

<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style col-md-2 col-md-offset-5">
<a class="a2a_dd" href=<?php echo $url; ?> /></a>
<a class="a2a_button_facebook"href=<?php echo $url; ?> /></a>
<a class="a2a_button_twitter" href=<?php echo $url; ?> /></a>
<a class="a2a_button_google_plus" href=<?php echo $url; ?> /></a>
</div>
<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
</div>

 <footer class="footer">
        <div class="logo">
  <img src="img/Untitled.png"><p>All rights reserved</p>
</div>
    </footer>