<?php

header("Content-type: text/css");

session_start();

if (!isset($_COOKIE['cookie_bgColor'])&& !isset($_COOKIE['cookie_textColor'])){
	echo "erreur cookie unset \n";
	// echo "value: " . $_COOKIE['cookie_bgColor'];
}else{

	echo "
	div {
		background-color:". $_SESSION['session_bgColor'] . ";
		color:". $_SESSION['session_textColor'] . ";
	}
	";
}
echo "<a hreh='exo5.couleurs.php'>retour</a>";

?>

