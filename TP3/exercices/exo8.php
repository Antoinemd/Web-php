<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>TP3 - Les formulaires</title>
</head>
<body>
	<?php

	$base = "webphp_tp3";
	$param = "exo8.myparam";
	include_once("exo8.connexpdo.php");

	if($idcom = connexpdo($base,$param)) {

		// requete
		$requete = "SELECT * FROM article ORDER BY categorie";
	    $resultat = $idcom->query($requete);

	    echo "<table>
	    		<tr> <th>Code article</th>
	    			 <th>Description</th>
	    			 <th>Prix</th>
	    			 <th>Catégorie</th>
	    		</tr>";

	    $lignes = $resultat->fetchAll(PDO::FETCH_NUM);
	    for($i=0; $i<count($lignes); $i++){
	    	echo "<tr>";
	    	for($j=0; $j<count($lignes[$i]); $j++) {
	    		echo "<td>" . utf8_encode($lignes[$i][$j]) . "</td>"; 
	    	}
	    	echo "</tr>";  
	    }     
	    echo "</table>";
	    $resultat->closeCursor();
		$idcom = NULL;  
	}
	?>
</body>
</html>