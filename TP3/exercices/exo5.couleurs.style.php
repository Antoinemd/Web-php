<?php

header("Content-type: text/css");
// $userColor = $_POST['bgColorForm'];
// if (empty($_POST['bgColorForm'])) {
if (!isset($_COOKIE['cookie_bgColor'])&& !isset($_COOKIE['cookie_textColor'])){
	echo "erreur cookie unset \n";
	// echo "value: " . $_COOKIE['cookie_bgColor'];
}else{

	echo "
	div {
		background-color:". $_COOKIE['cookie_bgColor'] . ";
		color:". $_COOKIE['cookie_textColor'] . ";
	}
	";
}
echo "<a hreh='exo5.couleurs.php'>retour</a>";

?>

