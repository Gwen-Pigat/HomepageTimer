<?php include "include/header.php"; ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=104375239900632";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php


// Le parrainage


if (isset($_GET['token_invite'])) {

      $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE email='$_POST[email]'"));

      if ($row) {
        echo "<div class='refresh col-md-4 col-md-offset-4 text-center'><span>Adresse e-mail déja utilisée !!</span><br>
        <i class='fa fa-refresh fa-spin fa-5x'></i></div>";
        header("Refresh: 2; url=index.php?token_invite=$_GET[token_invite]");
      }

      else{

      session_start();
      $_SESSION['email'] = $_POST['email'];

      $random = str_shuffle("AKBNGH123456789");
      mysqli_query($link, "INSERT INTO Catcher(email, identifiant) VALUES ('$_POST[email]','$random')");

      require 'PHPMailer/class.phpmailer.php';

      // Instantiate it
      $mail = new phpmailer();

      // Define who the message is from
      $mail->FromName = 'Textr - Catch ';

      // Set the subject of the message
      $mail->Subject = "$_POST[email]";

      // Add the body of the message
      $body="Un nouvel arrivant de Textr :\n\n\n
      Son email : $_POST[email]";
      $mail->Body = $body;

      // Add a recipient address
      $mail->AddAddress('pixofheaven@gmail.com');

      if(!$mail->Send())
          echo ('');
      else
          echo ('');

      $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE identifiant='$_GET[token_invite]'"));
      $parrain = ($row['nbr_partage'] + 1);
      mysqli_query($link, "UPDATE Catcher SET nbr_partage='$parrain' WHERE identifiant='$_GET[token_invite]'");

      // Envoi du mail au parrain

      header("Location: inscription.php?position=$random");

      }

}

else{

//Check la méthode post + si le champ n'était pas vide

  if (isset($_POST) && isset($_POST['email'])) {
  	if (!empty($_POST['email'])) {

      $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE email='$_POST[email]'"));

      if ($row) {
        echo "<div class='refresh col-md-4 col-md-offset-4 text-center'><span>Adresse e-mail déja utilisée !!</span><br>
        <i class='fa fa-refresh fa-spin fa-5x'></i></div>";
        header('Refresh: 2; url=index.php');
      }

      else{

      session_start();

      $_SESSION['email'] = $_POST['email'];

      $random = str_shuffle("AKBNGH123456789");
  	mysqli_query($link, "INSERT INTO Catcher(email, identifiant) VALUES ('$_POST[email]','$random')");
    $date  = date("Y-m-d H:i:s");
    mysqli_query($link, "INSERT INTO Adresse_ip(adresse, version, date) VALUES ('$_SERVER[REMOTE_ADDR]', 1, '$date')")or die("Erreur de l'insert");

      require 'PHPMailer/class.phpmailer.php';

      // Instantiate it
      $mail = new phpmailer();

      // Define who the message is from
      $mail->FromName = 'Textr - Catch ';

      // Set the subject of the message
      $mail->Subject = "$_POST[email]";

      // Add the body of the message
      $body="Un nouvel arrivant de Textr :\n\n\n
      Son email : $_POST[email]";
      $mail->Body = $body;

      // Add a recipient address
      $mail->AddAddress('pixofheaven@gmail.com');

      if(!$mail->Send())
          echo ('');
      else
          echo ('');

      header("Location: inscription.php?position=$random");

      }
  	}
  }
}


if (isset($_GET["position"])) { 

session_start();

    ?>


<title><?php echo $_SESSION['email']; ?> | Position</title>

<div class="position text-center">
    <div class="col-md-12 spot">
        <?php $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE email='$_SESSION[email]'")); ?>
        <p class="col-md-2 col-md-offset-2">Votre position :<br><span class="spot"><?php echo $row['id']; ?></span></p>
         <?php $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(id) FROM Catcher WHERE email!='$_SESSION[email]'")); 

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

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE email='$_SESSION[email]'"));
$url = "index.php?token_invite=$row[identifiant]";

echo "<h5 class='col-md-6 col-md-offset-3'>Partagez ce lien afin de remonter votre place dans le classement</a><br><a href=index.php?token_invite=$row[identifiant]>localhost/PHP/Homepage/fr/fr/index.php?token_invite=$row[identifiant]</a></h5>
<br>";

?>

<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style col-md-12 text-center">
<a class="a2a_dd" href=<?php echo $url; ?> /></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
</div>
<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

<?php } ?>