<?php
	
	session_start();

	$black = "black";
    $green = "green";

    $cookie_textColor = $black;
    $cookie_bgColor = $green;

    if (empty($_POST['bgColor']) && empty($_POST['textColor'])) {
    	echo "auccune donnée entré <br>";
    } else {
    	echo "Post value bgColor = " . $_POST['bgColor'] . " et Post value textColor = " . $_POST['textColor'] . "<br>";
    }

    if (!isset($_COOKIE['cookie_bgColor']) && !isset($_COOKIE['cookie_textColor'])) {
    	// couleur par défaut utilisateur: blanc et noir
    	echo "cookie statues = first visit <br>";
		$_COOKIE['cookie_bgColor'] = $green;
		$_COOKIE['cookie_textColor'] = $black;

		$_SESSION['session_bgColor'] = $_COOKIE['cookie_bgColor'];
		$_SESSION['session_textColor'] = $_COOKIE['cookie_textColor'];

	} else {
		echo "cookie statues = welcome back";
		if (isset($_POST['bgColor']) && isset($_POST['textColor'])) {
			// les variables personnalisées $_SESSION sont persistantes jusqu'à expiration du cookie
			$_COOKIE['cookie_bgColor'] = $_POST['bgColor'];
			$_COOKIE['cookie_textColor'] = $_POST['textColor'];

			$_SESSION['session_bgColor'] = $_COOKIE['cookie_bgColor'];
			$_SESSION['session_textColor'] = $_COOKIE['cookie_textColor'];
		}
	}

	// expiration fixée à t0 + 20s pour le test
	setcookie('cookie_bgColor', $cookie_bgColor, time()+20);
	setcookie('cookie_textColor', $cookie_textColor, time()+20);
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
	<p>
		Choisissez vos couleurs (mots clés CSS ou code couleur hexadecimal) <br>
		<form method='post' action="#" accept-charset="utf-8">
			<p> Couleur du text: <input type='text' name=textColor> </p>
			<p> Couleur de fond: <input type='text' name=bgColor> </p>
			<p> <input type='submit' value='Envoyer'> </p>
			<p> <input type="button" value="Reset cookie & Session" onclick="window.location.href='unsetAllCookies.php'"></p>

		</form>
	</p>
</div>

<div> 
	<p>	Contenu de la page A </p>
	<p> <a href="./exo5.couleurs.pageB.php"> Lien vers la page B </a></p>
</div>


</body>
</html>