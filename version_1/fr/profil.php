<?php include "include/header.php";

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
<h5 class='col-md-6 col-md-offset-3'>Partagez ce lien afin de remonter votre place dans le classement<br><a href=$url>$url</a></h5>
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