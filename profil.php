<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
</head>
<html>
    <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=104375239900632";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php

session_start();
$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");
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

<h1>Merci de votre inscription !<br><img src="img/Logo.png" width="80" style="margin-top: -0.5%"> sera bientot lancé !</h1>

<?php 

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));
$url = "index.php?token_invite=$row[identifiant]";
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

echo "<h5 class='col-md-6 col-md-offset-3'>Partagez ce lien afin de remonter votre place dans le classement<br><a href=$url>http://www.gettextr.com/$lang/version_$row[version]/index.php?token_invite=$row[identifiant]</a></h5>
    <br>
    <div class='col-md-4 col-md-offset-4'>
    <a target='_blank' href='http://www.facebook.com/share.php?u=http://www.gettextr.com/$lang/version_$row[version]/index.php?token_invite=$row[identifiant]'>
    <img alt='logo facebook' class='social' alt='Facebook'src='http://www.univ-orleans.fr/sites/default/files/Universit%C3%A9/images/facebook.png'/></a><br>
    <a target='_blank' href='http://www.facebook.com/share.php?u=http://www.gettextr.com/$lang/version_$row[version]/index.php?token_invite=$row[identifiant]'><span class='text-center'>Partagez sur facebook</span></a>
    </div>"; ?>
</div>
 <footer class="footer">
        <div class="logo">
  <img src="img/Untitled.png"><p>All rights reserved</p>
</div>
    </footer>
    </body>
</html>    