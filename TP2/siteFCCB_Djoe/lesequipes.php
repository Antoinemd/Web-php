<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>Equipes du FCCB</title>
</head>
<body>
  <div id="wrapper">
    <header>
      <h1>FCCB</h1>
      <h2>Les Equipes</h2>
    </header>
    <nav>
      <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="lesequipes.html" >Les équipes</a></li>
        <li><a href="terrains.html" >Terrains</a></li>
        <li>	
          &nbsp;&nbsp;&nbsp;&nbsp; 
          <form action="connexion.php" method="post">
          	Identifiant : <input type="text" size="16" name="login" />
          	Mot de passe : <input type="password" size="16" name="passwd" />
          	<input type="submit" value="Se connecter" />
          </form>
        </li>
      </ul>
    </nav>         

    <?php 

    $host="localhost";
    $dbname="les_equipes";
    $user="root";
    $pass="root";

    $idcom = new PDO("mysql:host=$host;dbname=$base",$user,$pass);


     ?>


    <section>


      <h1>Equipes Masculines </h1>



      <ul>  <!-- Début du listing des équipes  -->
      	
        <li> <!-- Début affichage de une équipe  -->

          <img src="images/u18Small.jpg"/>
          <img src="images/chris.jpg"/>
          <h2>u18 Promotion d'excellence</h2>
          <ul>
            <li>Entraineur : Chris</li>
            <li><a href="equipe.php?equipe=u18">Composition</a></li>
            <li>Championnat
              <ul>
                <li><a href="http://isere.fff.fr/competitions/php/championnat/championnat_resultat.php?sa_no=2012&cp_no=284409&ph_no=1&gp_no=1">Résultats dernière journée</a></li>
                <li><a href="http://isere.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2012&cp_no=284409&ph_no=1&gp_no=1">Classement</a></li>
              </ul>
            </li>
          </ul>

        </li> <!-- Fin affichage de une équipe  -->


      </ul>   <!-- Fin du listing de UNE équipe -->


    </section> <!-- Fin du listing DES équipes MASCULINES -->



    <section> <!-- Debut du listing DES équipes FEMININES -->


      <h1>Equipes Féminines</h1>
      <ul>
      	<li>
      	  <img src="images/seniors_F.jpg"/>
      	  <img src="images/sandra.jpg"/>
      	  <h2>Seniors Feminines a 11 Seniors</h2>
      	  <ul>
      	  	<li>Entraineur : Sandra</li>
      	  	<li><a href="equipe.php?equipe=Seniors">Composition</a></li>
      	  	<li>Championnat
              <ul>
                <li><a href="http://isere.fff.fr/competitions/php/championnat/championnat_resultat.php?sa_no=2012&cp_no=284438&ph_no=1&gp_no=1">Résultats dernière journée</a></li>
                <li><a href="http://isere.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2012&cp_no=284438&ph_no=1&gp_no=1">Classement</a></li>
              </ul>
            </li>
          </ul>
        </li>
       
      </ul>
    </section>
  </div>
</body>
</html>