<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <title>Photos</title>
  <link rel="stylesheet" href="styles/stylesPhotos.css" />

</head>
<body>

  <div id="wrapper">
    <header>
      <h1>Mon site personnel</h1>
      <h2>Ma gallerie de photos</h2>
    </header>
    <!-- le menu de navigation -->
    <nav>
      <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="cv.html">Mon CV</a></li>
        <li><a href="agenda.html">Agenda</a></li>
        <li><a href="photos.php">Photos</a></li>
        <li id="admin"><a href="../admin/ajoutPhoto.html">Administration</a></li>
      </ul>
    </nav>

  <section class="gallery">
    <?php
    
    /* Retourne la description attribuée par le couple clé valeur dans le fichier description.txt */
    function descriptionCleValeur($nomImage){

    	$filename = 'images/photos/description.txt';
    	if (file_exists($filename)) {

    		// echo "Le fichier existe <br/>";
			$file = fopen($filename, "r") or exit("Unable to open file!");

			// Output a line of the file until the end is reached
			while(!feof($file)){
		  		$uneLigne = fgets($file). "\n";  		// on stock chaque nouvelle ligne
		  		$tabLigne = explode(":", $uneLigne);	// création d'un tableau de chaine de caracteres
	  			$key = substr(trim($tabLigne[0]), 0,6) ;// clé
	  			$value = trim($tabLigne[1]);			// valeur

		  		// si la valeur cherché correspond à une clé du fichier description.txt
		  		if ($key === $nomImage) {
		  			return $value;
		  		}
		  	} // fin du while
			fclose($file); // fermeture du fichier à la fin de la lecture
    	}
       	else{
    		echo "nop il exite pas ou erreur d'acces au fichier";
       	} //fin du if/else file_exists

	    $retnull = "Aucune description trouvée pour cette photo : " . isset($value);
	    return $retnull;
	}

	/* Debut du programme */
	$rep= "images/photos";
  $id_rep = opendir($rep);

  $thumb = "thumb";
  $small = "Small";
	$nameChanged ="";


	echo "<ul>";
	while ($fichier = readdir($id_rep)) {

		if (substr($fichier, 0,5) === $thumb) {
		
        	$nameChanged = substr($fichier, 6, -4);
        	$description = descriptionCleValeur($nameChanged);
			
			echo "<div class='image'>";
			echo "<a href='./images/photos/" . $nameChanged . ".jpg'>
            	<img src='images/photos/" . $nameChanged . ".jpg' width='220' height='180'/> </a> <br/>";
				echo "<div class='desc'>";
					echo "<li> Type thumb: " . $fichier ."<br/>";
    	       		echo "Description de l'image: ". $description . "<br/>";
	    		echo "</div> </li>";	
            echo "</div>";
        }elseif (substr($fichier, strlen($fichier)-9,5) === $small) {

        	$nameChanged = substr($fichier, 0, strlen($fichier)-9);
        	$description = descriptionCleValeur($nameChanged);

			echo "<div class='image'>";
	      		echo "<a href='./images/photos/" . $nameChanged . ".jpg'>
            	<img src='images/photos/" . $nameChanged . ".jpg' width='220' height='180'/>  </a> <br/>";
  				echo "<div class='desc'>";
					echo "<li> Type small: " . $fichier . "<br/>";
           			echo "Description de l'image: ". $description . " <br/>";
				echo "</div> </li>";
   			echo "</div>";

        }else{
        	// TODO if something else, do somehing else ..
        }
    }
    echo"</ul>";
    /* closedir attend une ressource(ç.à.d l'ouverture du dossier(opendir) en question) en paramètre,
    	et là on lui passe une string ! Donc il faut assigner cette action(l'ouverture) a une variable 
    	que l'on passeras ensuite en paramètre a closedir. Dans notre cas $id_rep = opendir($rep);
    */
    closedir($id_rep);	



    /* Fin du progrmme*/
    ?>
    </section>
  </div> <!-- div du wrapper  -->
</body>
</html>
