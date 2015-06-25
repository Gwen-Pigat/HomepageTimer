<?php include "include/header.php";

// Page de l'écran noir, se charge après 30 sec sur l'index

$shuffle = str_shuffle("iamthelawbitch1234567890/*-+.");

if (isset($_GET['Black_screen'])) { ?>

<title><?php echo $_GET['Black_screen']; ?></title>

<?php echo "<div class='code text-center'><button class='btn btn-join'>LA LEGION VOUS ATTEND</button><br><span class='first'>++Votre PC va à présent s'autodétruire !!++</span><br>
<span class='second'>Ou pas :)</span><br>
<i class='fa fa-refresh fa-spin fa-5x'></i>
    </div>";
}

elseif(isset($_GET['token_invite'])) {

	$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");
	$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE identifiant='$_GET[token_invite]'"));

	echo "<h1>Invitation de <strong>$row[email]</strong></h1>";

}

// Page lancée par défault

else { ?>

<title>Textr</title>

<body>

<div class="container">
  <div class="col-md-12 col-xs-12 col-sm-6">




<h1 class="text-center main">Ne cherchez plus !!<br> Contactez toutes les entreprises autour de vous</h1>

<!-- Le timer -->

<form name="counter" class="timer text-center">
	<input type="text" size="8" name="d2">
</form> 

<script type="text/javascript">
<!-- 
// 
 var milisec=0 
 var seconds=30 
 document.counter.d2.value='30' 

function display(){ 
 if (milisec<=0){ 
    milisec=9 
    seconds-=1 
 } 
 if (seconds<=-1){ 
    milisec=0 
    seconds+=1 
 } 
 else 
    milisec-=1 
    document.counter.d2.value=seconds+"."+milisec 
    setTimeout("display()",100) 
} 
display() 
--> 
</script>

<!--  Fin du timer -->


<!-- Le téléphone + ses bulles de texte -->

<img class="col-md-5 col-md-offset-2 col-xs-2 col-sm-1 phone" src="img/test.png">
<div class="bulle-1 col-md-1">Hey toi !!</div>
<div class="bulle-2 col-md-2">Attention !! Ca fait déja 15 secondes que t'es la...</div>
<div class="bulle-3 col-md-3">Dans 5 secondes, mon bot va détruire ton PC, ahahahahaha</div>


<form class='col-md-5 col-xs-2 col-sm-1 inscription' action="inscription.php" method="POST">
  <h1>Hello, Operator</h1>
<h3>Looking for something? Make a request and we'll find it for you.</h3>
<input type="email" name="email" placeholder="Ton adresse e-mail" required>
<button class="btn-send">Rejoindre</button>
</form>

  </div>
</div>

</body>
</html>

<?php

// header("Refresh: 27; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");

 } 

?>