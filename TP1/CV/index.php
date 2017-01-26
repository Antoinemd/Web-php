 
<!DOCTYPE html>

<!-- <?php 

//$countVisit = 0;
// setcookie(name, value, expire, path, domain, security);
//setcookie("nbvisite", $countVisit, time()+(3600/2), "/","", 0);

?> -->

<?php
$visits = 0;
if (!isset($_COOKIE['visits'])) {
	$_COOKIE['visits'] = 0;
}else{
$visits = $_COOKIE['visits'] + 1;
}

setcookie('visits',$visits,time()+(3600/2));

?>


<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesIndex.css" />

  <title>Accueil</title>
</head>
<body>
  <div id="wrapper">
    <header>
      <h1>Mon site personnel</h1>
      <h2>Accueil</h2>
    </header>
    <!-- le menu de navigation -->
    <nav>
      <ul>
        <li><a href="./index.php">Accueil</a></li>
	    <li><a href="cv.html" >Mon CV</a></li>
	    <li><a href="agenda.html" >Agenda</a></li>
	    <li><a href="photos.php" >Photos</a></li>
      </ul>
    </nav>


    
    <!-- le contenu de la page -->
    <section id="section1">

    <?php
	if ($visits > 1) {
		echo "<h2> Bienvenue pour la " . $visits . " ème fois sur mon site ! </h2> <br />";
	} else { // First visit
		echo "<h2> Bienvenue pour la première fois sur mon site ! </h2> <br/>";
	}
	?>
      <img src="images/menu.png" id="menu" usemap="#map" />
      <map name="map" id="map">
        <area shape="rect" coords="56,91, 208, 170" alt="UFR-SHS" href="http://imss.upmf-grenoble.fr" />
        <area shape="rect" coords="256, 76, 437, 172" alt="Master IC2A" href="http://imss-www.upmf-grenoble.fr/master-ic2a/" />
        <area shape="rect" coords="186, 200, 311, 328" alt="Mon CV" href="cv.html" />
      </map>
    </section>
  </div>
</body>
</html>
