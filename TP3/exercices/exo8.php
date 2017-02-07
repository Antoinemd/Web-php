<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" media="screen" href="exo5.couleurs.style.php"> 
  <title>TP3 - Les formulaires</title>
</head>
<body>



<?php

$base = "webphp_tp3";
$param = "exo8.myparam";
include_once("exo8.connexpdo.php");

if($idcom = connexpdo($base,$param)) {

	// echo $idcom;
	$requete = "SELECT * FROM code_article ORDER BY categorie";
	// $resultat = $idcom->query($requete);


	// $stmt = $pdo->query('SELECT name FROM users');
     
    // while($ligne = $resultat->fetch(PDO::FETCH_NUM)){

	// while ($ligne = $resultat->fetch(PDO::FETCH_NUM))
	// {
	//     echo $ligne['name'] . "\n";
	// }

	$resultat = $idcom->query('SELECT name FROM users');
	foreach ($resultat as $row)
	{
	    echo $row['name'] . "\n";
	}

	// echo "<table>";
	
	// echo "<tr><th>Code article</th><th>Description</th>
	// <th>Prix</th><th>Catégorie</th></tr>";

	//       while($ligne = $resultat->fetch(PDO::FETCH_NUM)){

	
	// $lignes = $resultat->fetchAll(PDO::FETCH_NUM);
	
	// for($i=0; $i<count($lignes); $i++){
	// 	echo "<tr>";
	// 	for($j=0; $j<count($lignes[i]); $j++) {
	// 		echo "<td>" . utf8_encode($lignes[i][j]) .
	// 		"</td>";
	// 	}
	// 	echo "</tr>";
	// }

	// echo "</table>";
	
	$resultat->closeCursor();
	$idcom = NULL;
}
?>
<!-- code html -->

</body>
</html>