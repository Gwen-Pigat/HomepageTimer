<?php include "../../include/header.php";


// Page de l'écran noir, se charge après 30 sec sur l'index

$shuffle = str_shuffle("iamthepixofheaven1234567890");

if (isset($_GET['Timer_end'])) { 

  $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Timer_end WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));
    
    if ($row == 0) {
      mysqli_query($link, "INSERT INTO Timer_end(adresse_ip) VALUES ('$_SERVER[REMOTE_ADDR]')");
    }

  ?>

<title>Fin du timer</title>

<div class="col-md-12 col-xs-12 col-sm-12">

<div class="text-center main col-md-6 col-md-offset-5 col-xs-12 col-sm-12">
<h1>Vous n'avez pas réussi à vous inscrire dans les temps</h1>
<h3>Vous pourrez ré-essayer en recevant une invitation d'un de vos amis</h3>
</div>


<!-- <p class="text-center demande">Demander une invitation</p> -->
    <div class="btn btn-info col-md-6 col-md-offset-6 col-xs-12 col-sm-6 inscription">
      <p class="acces text-center"><i class="fa fa-remove"></i> Vous avez échoué</p>
    </div>
</div>      

<?php }

elseif(isset($_GET['token_invite'])) {

  $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE identifiant='$_GET[token_invite]'"));?>

<title>Textr | Invitation</title>

<body>

  <div class="col-md-12 col-xs-12 col-sm-12">

<div class="text-center main col-md-6 col-md-offset-5 col-xs-12 col-sm-9 col-sm-offset-2">
<h1>Chattez en temps réel avec vos  marques préférées</h1>
<h3>Réservez, achetez, ou demandez des informations</h3>
</div>

<?php

echo "<div class='col-md-6 col-md-offset-6 col-xs-12 col-sm-6 col-sm-offset-6 inscription'>
<p class='acces text-center'>45 secondes pour recevoir une invitation</p>
<form class='catcher' action='inscription.php?token_invite=$row[identifiant]' method='POST'>
<input id='email' type='email' name='email' placeholder='Ton adresse e-mail' required>
<button class='btn-send'>M'inviter</button>
</form>
<form name='counter' class='timer'>
  <input type='text' size='8' name='d2'>
</form> 
</div>"; 
  
?>

<!-- Le timer -->



<script type="text/javascript">

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

</script>

<!--  Fin du timer -->

  </div>

</body>
</html>

<?php

header("Refresh: 45; url=index.php?Timer_end=$shuffle");

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


<!-- <p class="text-center demande">Demander une invitation</p> -->
    <div class="col-md-6 col-md-offset-6 col-xs-12 col-sm-6 col-sm-offset-6 inscription">
      <p class="acces text-center">45 secondes pour recevoir une invitation</p>
      <form class="catcher" action="inscription.php" method="POST">
      <input type="email" name="email" placeholder="Ton adresse e-mail" required>
      <button class="btn-send">M'inviter</button>
      </form>
      <form name="counter" class="timer">
        <input type="text" size="8" name="d2">
      </form> 
    </div>
  </div>
</body>
<!-- Le timer -->


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
</html>

<?php

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Timer_end WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));

if ($row) {
  header("Location: index.php?Timer_end=$shuffle");
}

header("Refresh: 45; url=index.php?Timer_end=$shuffle");

 } 

// Calcul de l'adresse ip et disparition du formulaire si déja existante

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE adresse_ip='$_SERVER[REMOTE_ADDR]'"));

if ($row) {
        header("Location: ../../profil.php?token_invite=$row[identifiant]");

}


include "include/footer.php"; ?>