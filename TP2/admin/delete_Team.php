<?php

include('./connexpdo.php');

if (!empty($_POST['deleteById'])) {
	// parametres 
	$base = "les_equipes";
	$paramFile = "myparam";

	$equipe_to_delete = $_POST['deleteById'];

	echo "check de la ligne récupérée: $equipe_to_delete <br>";

	$requete = "DELETE FROM equipes WHERE equipe_id=:equipe_to_delete";

	echo "$requete <br>";

	if($idcom = connexpdo($base,$paramFile)) {
		echo "request ready <br>";
		$statement = $idcom->prepare($requete);
		$statement->execute(array(
			":equipe_to_delete"=>$equipe_to_delete
			));

		echo "Entrée effacée ! <br>";
		echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";
	} else {
		echo "requete failed <br>";
	}

	if($idcom){
		echo "fermeture<br>";
		$idcom = NULL;
	}

} else {
	echo "erreur: un des champs entré est vide !";
	echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";
}
?>
