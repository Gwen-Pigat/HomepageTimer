<html>
<head>
	<title>Redirect</title>
</head>
<body>
</body>
</html>


<?php 

$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");
$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM Adresse_ip WHERE adresse='$_SERVER[REMOTE_ADDR]'"));

// Detection de l'IP en BDD et redirection selon la version ( la version est déterminée à l'avance et sera donc une valeur par défault), si le client est nouveau, dans ce cas la redirection sera pour l'instant la première version

if ($row['version'] == 1) {
 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = '$lang/index.php';

	header("Location: version_1/$lang/$index",TRUE,301);
}

elseif($row['version'] == 2) {
 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = 'index.php';

	header("Location: version_2/$lang/$index",TRUE,301);
}

elseif($row['version'] == 3) {
 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = 'index.php';

	header("Location: version_3/$lang/$index",TRUE,301);
}

elseif($row['version'] == 4) {
 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = 'index.php';

	header("Location: version_4/$lang/$index",TRUE,301);	
}

else{
 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = 'index.php';

	header("Location: version_1/$lang/$index",TRUE,301);	

}

 ?>