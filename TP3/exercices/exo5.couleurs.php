<?php

	$black = "black";
    $white = "white";

    $cookie_textColor = $black;
    $cookie_bgColor = $white;

    if (empty($_POST['bgColor']) && empty($_POST['textColor'])) {
    	echo "auccune donnée entré <br>";
    } else {
    	echo "Post value bgColor = " . $_POST['bgColor'] . " et Post value textColor = " . $_POST['textColor'] . "<br>";
    }

    if (!isset($_COOKIE['cookie_bgColor']) && !isset($_COOKIE['cookie_textColor'])) {
    	// couleur par défaut: rouge
    	echo "premiere visite <br>";
		$_COOKIE['cookie_bgColor'] = $white;
		$_COOKIE['cookie_textColor'] = $black;

	} else {
		if (isset($_POST['bgColor']) && isset($_POST['textColor'])) {
			$cookie_bgColor = $_POST['bgColor'];
			$cookie_textColor = $_POST['textColor'];
			echo "etat changé <br>";
		}
	}

	// expiration fixée à t0 + 15s pour le test
	setcookie('cookie_bgColor', $cookie_bgColor, time()+15);
	setcookie('cookie_textColor', $cookie_textColor, time()+15);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" media="screen" href="exo5.couleurs.style.php"> 
  <title>TP3 - Les formulaires</title>
</head>
<body>
<div>
	Choisissez vos couleurs <br>
	<form method='post' action="#">
		<p> Couleur du text: <input type='text' name=textColor> </p>
		<p> Couleur de fond: <input type='text' name=bgColor> </p>
		<p> <input type='submit' value='Envoyer'> </p>
	</form>
</div>
	<?php  
		if (isset($_COOKIE['cookie_bgColor'])) {
			echo"<p> <a href='unsetAllCookies.php'> Unset cookie </a> </p>";
		}
	?>
</body>
</html>