<?php include "include/header.php";



// Page de l'écran noir, se charge après 30 sec sur l'index

$shuffle = str_shuffle("iamthepixofheaven1234567890");

if (isset($_GET['Black_screen'])) { ?>

<title><?php echo $_GET['Black_screen']; ?></title>

<?php echo "<div class='code text-center'><button class='btn btn-join'>LA LEGION VOUS ATTEND</button><br><span class='first'>++Processus d'autodestruction en cours...++</span><br>
<span class='second'>Ou pas :)</span><br>
<i class='fa fa-refresh fa-spin fa-5x'></i>
    </div>";
}

elseif(isset($_GET['token_invite'])) {

  $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE identifiant='$_GET[token_invite]'"));?>

<title>Textr | Invitation</title>

<body>

  <div class="col-md-12 col-xs-12 col-sm-12">

<div class="text-center main col-md-6 col-md-offset-5 col-xs-12 col-sm-9 col-sm-offset-2">
<h1>Chattez en temps réel avec vos  marques préférées</h1>
<h3>Réservez, achetez, ou demandez des informations</h3>
</div>

<!-- Le téléphone + ses bulles de texte -->

<!-- <div class="col-md- col-xs-10 col-sm-5 phone">
<div class="bulle-1 col-md-6 col-xs-10 col-sm-5">Hey toi, laisse nous ton adresse e-mail</div>
<div class="bulle-2 col-md-6 col-xs-10 col-sm-5">Attention !! Il ne te reste que 15 secondes !!</div>
<div class="bulle-3 col-md-8 col-xs-10 col-sm-6">Plus que 5 secondes !!</div>
</div> -->


<!-- Le timer -->

<form name="counter" class="timer col-md-6 col-md-offset-6 col-xs-5 col-xs-offset-5 col-sm-5 col-sm-offset-5">
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


<?php

echo "<form class='col-md-6 col-md-offset-6 col-xs-12 col-sm-6 col-sm-offset-6 inscription' action='inscription.php?token_invite=$row[identifiant]' method='POST'>
<p class='acces text-center'>45 secondes pour recevoir une invitation</p>
<input id='email' type='email' name='email' placeholder='Ton adresse e-mail' required>
<button class='btn-send'>M'inviter</button>
</form>"; 

?>

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

  <div class="col-md-12 col-xs-12 col-sm-12">

<div class="text-center main col-md-6 col-md-offset-5 col-xs-12 col-sm-9 col-sm-offset-2">
<h1>Chattez en temps réel avec vos  marques préférées</h1>
<h3>Réservez, achetez, ou demandez des informations</h3>
</div>

<!-- Le téléphone + ses bulles de texte -->

<!-- <div class="col-md- col-xs-10 col-sm-5 phone">
<div class="bulle-1 col-md-6 col-xs-10 col-sm-5">Hey toi, laisse nous ton adresse e-mail</div>
<div class="bulle-2 col-md-6 col-xs-10 col-sm-5">Attention !! Il ne te reste que 15 secondes !!</div>
<div class="bulle-3 col-md-8 col-xs-10 col-sm-6">Plus que 5 secondes !!</div>
</div> -->


<!-- Le timer -->

<form name="counter" class="timer col-md-6 col-md-offset-6 col-xs-5 col-xs-offset-5 col-sm-5 col-sm-offset-5">
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
<form class='col-md-6 col-md-offset-6 col-xs-12 col-sm-6 col-sm-offset-6 inscription' action="inscription.php" method="POST">
  <p class="acces text-center">45 secondes pour recevoir une invitation</p>
<input type="email" name="email" placeholder="Ton adresse e-mail" required>
<button class="btn-send">M'inviter</button>
</form>

  </div>

</body>
</html>

<?php

// header("Refresh: 27; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");

 } 

// Calcul de l'adresse ip et disparition du formulaire si déja existante

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Adresse_ip WHERE adresse='$_SERVER[REMOTE_ADDR]'"));

if ($row) { ?>

<style type="text/css">
.inscription, .timer{display: none;}
.chance{margin-top: 2%; border: 3px #5AAFED solid; color: #5AAFED; text-shadow: 0 0 1px black;font-size: 3em; padding: 1%;}
</style>

<div class='col-md-6 col-md-offset-5 col-xs-12 col-sm-6 col-sm-offset-6 chance'>
  <p class="text-center">Vous avez déja tenté votre chance, désolé...</p>
</div>

<?php 

}

else{
  $date = date("Y-m-d H:i:s");
  mysqli_query($link, "INSERT INTO Adresse_ip(adresse, version, date) VALUES ('$_SERVER[REMOTE_ADDR]', 1, '$date')")or die("Erreur de l'insert");
header("Refresh: 45; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");
}


include "include/footer.php"; ?>