<?php include "include/header.php";


$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr");


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

if (isset($_GET["position"])) { 

session_start();

    ?>


<title><?php echo $_SESSION['email']; ?> | Position</title>

<div class="container position text-center">
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

<?php 

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Catcher WHERE email='$_SESSION[email]'"));

echo "<h5 class='col-md-6 col-md-offset-3'>Partagez ce lien afin de remonter votre place dans le classement</a><br><a href=index.php?token_invite=$row[identifiant]>localhost/PHP/Homepage/fr/fr/index.php?token_invite=$row[identifiant]</a></h5>";

?>

</div>

<?php } ?>