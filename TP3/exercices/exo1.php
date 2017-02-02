<?php

// echo "hello";


$ligne = 1;
$colone = 1;

for ($i=1; $i <=6; $i++) { // ligne
	echo "<table>";
	echo "<tr>";

	for ($j=1; $j <= 5 ; $j++) {  // colone

		echo "<td> ". $i ." x ". $j . " = ". $i*$j ."</td>";
		
	} // fin colone
	echo "</tr>"; // fin ligne	
}

echo "</table>";

?>