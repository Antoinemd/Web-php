<?php

include('./connexpdo.php');

// TODO rajouter les test des champs vides etc..
if (!empty($_POST['teamID'])) {
	// parametres 
	$base = "les_equipes";
	$paramFile = "myparam";

	$equipe_id = $_POST['teamID'];
	$championnat = $_POST['championnat'];
	$sexe = $_POST['equipeSexe'];
	$coach = $_POST['nomCoach'];
	$photo_c = $_POST['imageCoach'];
	$photo_e = $_POST['imageTeam'];
	$url_res = $_POST['resultats'];
	$url_classmnt = $_POST['classement'];

	echo "check des valeurs entrées: $equipe_id, $championnat, $sexe, $coach, $photo_c, $photo_e, $url_res, $url_classmnt <br>";

	$requete = "INSERT INTO equipes (equipe_id, championnat, sexe, coach, photo_c, photo_e, url_res, url_classmnt) VALUES (:equipe_id, :championnat, :sexe, :coach, :photo_c, :photo_e, :url_res, :url_classmnt)";

	echo "$requete <br>";

	if($idcom = connexpdo($base,$paramFile)) {
		echo "requete préparée<br>";

		$statement = $idcom->prepare($requete);
		$statement->execute(array(
			"equipe_id"=>$equipe_id,
			"championnat"=>$championnat,
			"sexe"=>$sexe,
			"coach"=>$coach,
			"photo_c"=>$photo_c,
			"photo_e"=>$photo_e,
			"url_res"=>$url_res,
			"url_classmnt"=>$url_classmnt
			));

		echo "Entrée ajoutée ! <br>";
		echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";
  	} else {
  		echo "requete fail<br>";
  	}

  	if($idcom){
		echo "fermeture<br>";
		$idcom = NULL;
	}

}else{
	echo "erreur: un des champs entré est vide !";
	echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";

}
?>

