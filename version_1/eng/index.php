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


// Page lancée par défault

else { ?>

<title>Textr</title>

<body>

<div class="container">
  <div class="col-md-12 col-xs-12 col-sm-6">

<script src="modernizer.js"></script>

<h1 class="text-center main">Ne cherchez plus !! Contactez toutes les entreprises autour de vous</h1>

<div id="counter" class="cf"><span>00 : 30 : 00<em></em></span></div>	

<!-- Le téléphone + ses bulles de texte -->

<img class="col-md-5 col-md-offset-1 col-xs-2 col-sm-1 phone" src="img/test.png">
<div class="bulle-1 col-md-1">Hey toi !!</div>
<div class="bulle-2 col-md-2">Attention !! Ca fait déja 15 secondes que t'es la...</div>
<div class="bulle-3 col-md-3">Dans 5 secondes, mon bot va détruire ton PC, ahahahahaha</div>


<form class='col-md-5 col-xs-2 col-sm-1 col-md-offset-6' action="inscription.php" method="POST">
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

// header("Refresh: 30; url=index.php?Black_screen=$shuffle!!PixOFHeaven_made_this");

 } 

?>