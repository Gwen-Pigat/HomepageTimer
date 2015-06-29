<?php include "include/header.php";

// Page de l'écran noir, se charge après 30 sec sur l'index

$shuffle = str_shuffle("iamthelawbitch1234567890/*-+.");

if (isset($_GET['Black_screen'])) { ?>

<title><?php echo $_GET['Black_screen']; ?></title>

<?php echo "<div class='code text-center'><button class='btn btn-join'>LA LEGION VOUS ATTEND</button><br><span class='first'>++Processus d'autodestruction en cours...++</span><br>
<span class='second'>Ou pas :)</span><br>
<i class='fa fa-refresh fa-spin fa-5x'></i>
    </div>";
}

elseif(isset($_GET['token_invite'])) {

	$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");
	$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE identifiant='$_GET[token_invite]'"));?>

<title>Textr</title>

<body>
  <img class="logo" src="img/Untitled.png">

<div class="container">
  <div class="col-md-12 col-xs-12 col-sm-6">

<h1 class="text-center main">Contactez toutes les entreprises autour de vous</h1>

<!-- Le timer -->

<form name="counter" class="timer">
  <input type="text" size="8" name="d2">
</form> 

<script type="text/javascript">
<!-- 
// 
 var milisec=0 
 var seconds=45
 document.counter.d2.value='45' 

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

<img class="col-md-5 col-md-offset-1 col-xs-2 col-sm-1 phone" src="img/test-1.png">
<div class="bulle-1 col-md-2">Hey toi, laisse nous ton adresse e-mail</div>
<div class="bulle-2 col-md-2">Attention !! Il ne te reste que 15 secondes !!</div>
<div class="bulle-3 col-md-3">Salut !! Je m'appelle Gwen, et dans très exactement 5 secondes, mon bot va détruire ton PC, ahahahahaha</div>

<div class="inscription">
 <h1>Ne perd pas de temps !!</h1>
<h3>Laisse nous ton adresse e-mail afin de faire partie des premiers heureux élus.</h3>
</div>
<?php echo
"<form class='col-md-5 col-xs-2 col-sm-1 inscription' action='inscription.php?token_invite=$row[identifiant]' method='POST'>
 
<input type='email' name='email' placeholder='Ton adresse e-mail' required>
<button class='btn-send'>Rejoindre</button>
</form>"; ?>

  </div>
</div>

</body>
</html>

<?php

// header("Refresh: 27; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");

 } 

// Page lancée par défault

else { ?>

<title>Textr</title>

<body>

<div class="logo">
 <!--  <ul>
    <a href=""><li>Intro</li></a>
    <a href=""><li>Intro</li></a>
    <a href=""><li>Intro</li></a>
    <a href=""><li>Intro</li></a>
  </ul> -->
  <img src="img/Untitled.png">
</div>

<div class="container">
  <div class="col-md-12 col-xs-12 col-sm-12">

<div class="text-center main col-md-10 col-md-offset-5 col-xs-offset-5 col-sm-offset-5">
<h1>Chattez en temps réel avec vos  marques préférées</h1>
<h3>Réservez, achetez, ou demandez des informations</h3>
</div>

<!-- Le téléphone + ses bulles de texte -->

<div class="col-md-4 col-xs-10 col-sm-5 phone">
<div class="bulle-1 col-md-6 col-xs-10 col-sm-5">Hey toi, laisse nous ton adresse e-mail</div>
<div class="bulle-2 col-md-6 col-xs-10 col-sm-5">Attention !! Il ne te reste que 15 secondes !!</div>
<div class="bulle-3 col-md-8 col-xs-10 col-sm-6">Plus que 5 secondes !!</div>
</div>

<!-- Le timer -->

<form name="counter" class="timer col-md-5 col-xs-12 col-sm-12">
  <input type="text" size="8" name="d2">
</form> 

<script type="text/javascript">
<!-- 
// 
 var milisec=0 
 var seconds=45
 document.counter.d2.value='45' 

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
    document.counter.d2.value=seconds+"."+milisec+ " s" 
    setTimeout("display()",100) 
} 
display() 
--> 
</script>


<!--  Fin du timer -->
<!-- <p class="text-center demande">Demander une invitation</p> -->
<form class='col-md-5 col-xs-12 col-sm-12 inscription' action="inscription.php" method="POST">
  <p class="acces text-center">45 secondes pour recevoir une invitation</p>
<input type="email" name="email" placeholder="Ton adresse e-mail" required>
<button class="btn-send">M'inviter</button>
</form>

  </div>
</div>

</body>
</html>

<?php

// header("Refresh: 27; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");

 } 

include "include/footer.php"; ?>