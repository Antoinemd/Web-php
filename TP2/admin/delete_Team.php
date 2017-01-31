<?php

include('./connexpdo.php');

if (!empty($_POST['deleteById'])) {
	// parametres 
	$base = "les_equipes";
	$paramFile = "myparam";

	$equipe_id = $_POST['deleteById'];

	echo "check de la ligne récupérée: $equipe_id <br>";

	$requete = "DELETE FROM equipes WHERE equipe_id=$equipe_id";

	echo "$requete <br>";

	if($idcom = connexpdo($base,$paramFile)) {
		echo "request ready <br>";
		$statement = $idcom->exec($requete);

		echo "Entrée effacée ! <br>";
		echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";
	} else {
		echo "requete failed";
	}

} else {
	echo "aucune ligne";
}
?>
