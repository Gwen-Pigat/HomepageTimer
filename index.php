<html>
<head>
	<title>Textr</title>
</head>
<body>
</body>
</html>

<?php 

$link = mysqli_connect("localhost","root","motdepasselocalhostgwen","Textr")or die("Erreur de connexion");

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

	$a = rand(1,4);

 	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  if ($lang != 'fr')
      $index = '$lang/index.php';

	header("Location :version_$a/$lang/$index",TRUE,301);

// else{
//  	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

//   if ($lang != 'fr')
//       $index = 'index.php';

// 	header("url: /$lang/$index",TRUE,301);	

// }

 ?>