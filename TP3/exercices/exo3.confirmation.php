<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>TP3 - Les formulaires</title>
</head>
<body>
<div>
Confirmation.php <br><br>
	<?php

	// $recquis = array($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['ville'],$_POST['cp']);
	$emptyFields = "";
	$erreur = false;

	// On vérifie si chaque attribut est vide ou non
	foreach ($_POST as $name => $val){
		if (empty($val)) {
			$erreur = true;
			 // construit la chaine d'erreur avec le noms des attributs vides
			$emptyFields = $emptyFields . ' "' . $name . '", ';    		
    	}
	}

	if ($erreur === true) {
		// replace les derniers caractère  ", " par un "."
		$emptyFields = substr_replace(rtrim($emptyFields, ", "), ".", strlen($emptyFields)); 
		echo "Des champs sont vides ! <br>" . "Merci d'entrer les champs: " . htmlspecialchars($emptyFields)."\n";	
	} else{
		echo"<table>
			 	<tr> <td> nom </td> <td> " . $_POST['nom'] . "</td> </tr>
				<tr> <td> prenom </td> <td> " . $_POST['prenom'] . "</td> </tr>
				<tr> <td> adresse </td> <td> " . $_POST['adresse'] . "</td> </tr>
				<tr> <td> ville </td> <td> " . $_POST['ville'] . "</td> </tr>
				<tr> <td> cp </td> <td> " . $_POST['cp'] . "</td> </tr>
			 </table>";
	}
?>
</div>

<p>
Solutions pour un seul fichier: <br>
 - faire un seul formulaire.php puis executer la fonction lors du click sur "Envoyer" <br>
 - utiliser les expression régulières pour la vérification ? <br>
 </p>
</body>
</html>