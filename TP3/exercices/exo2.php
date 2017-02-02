Écrivez une fonction dont le paramètre passé par référence est un tableau de chaînes de caractères et qui 
transforme chacun des éléments du tableau de manière que le premier caractère soit en majuscule et les 
autres en minuscules, quelle que soit la casse initiale des éléments, même si elle est mixte.

Indice: Utilisez les fonctions ucfirst et strtolower.


<?php 
	

	function firstCharToUpper(array $tableauDeChaines){
		foreach ($tableauDeChaines as $value) {
			echo ucfirst(strtolower($value)) . " ";
		}
	}

	echo "<br><br>";
	$tab = array("couCou","tOuT","Le","monde");
	
	firstCharToUpper($tab);	

?>

