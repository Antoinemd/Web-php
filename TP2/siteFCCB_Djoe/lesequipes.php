<?php 

  // session_start();

  include("../admin/connexpdo.php");
  include("./blockLoggin.php");
  // require_once('./index.php');
    // session_start();
// session_destroy();
//   $connexionBar = "Authentification:";

//   if(isset($_SESSION["is_auth"])) {
//   // if(isset($_SESSION['login'])){

//     $connexionBar = "Bonjour " . $_SESSION['login'] . " ! ";
//     $connectBtn = "Deconnexion";
//     $menuHTML = <<<EOT

//     <ul>
//       <li><a href='index.php'>Accueil</a></li>
//       <li><a href='lesequipes.php' >Les équipes</a></li>
//       <li><a href='terrains.php' >Terrains</a></li>
//       <li>  
//         &nbsp;&nbsp;&nbsp;&nbsp;

//         <form action="../admin/logout.php">
//           $connexionBar
//           <input type='submit' value="$connectBtn" />
//         </form>
//       </li>
//     </ul>
// EOT;
//   $_SESSION["espaceMembre"] = $menuHTML;

//   } else {
//     $connectBtn = "Connexion";

//     // EOT => permet de stocker une variable sur plusieurs lignes
//     $menuHTML = <<<EOT
    
//     <ul>
//       <li><a href='index.php'>Accueil</a></li>
//       <li><a href='lesequipes.php' >Les équipes</a></li>
//       <li><a href='terrains.php' >Terrains</a></li>
//       <li>  
//         &nbsp;&nbsp;&nbsp;&nbsp; 
        
//         <form action="../admin/login.php" method="post">
//           $connexionBar
//           <input type="text" size="8" name="login" />
//           <input type="password" size="8" name="pwd" />
//           <input type="submit" value="$connectBtn"/>
//         </form>
//       </li>
//     </ul>
// EOT;
//     $_SESSION["espaceVisiteur"] = $menuHTML;
//   }


  
  function afficherEquipe($sexe,$base,$param) {
    if($sexe == 'M'){
      $requette = "SELECT * FROM equipes WHERE sexe = 'M' ";
    } 
    if($sexe == 'F'){
      $requette = "SELECT * FROM equipes WHERE sexe = 'F' ";
    }

    // Ajouter une équipe
    if(isset($_SESSION["is_auth"])) {
      echo "<img src='images/addTeam.jpg' height='60' width='60'/>";
    }    

    if($idcom = connexpdo($base,$param)) {
      // if($idcom = connexpdo()) {
      $resultat = $idcom->query($requette);
        
      echo "<ul>";
      while($ligne = $resultat->fetch(PDO::FETCH_NUM)){
        echo "<li>";

          //Affichage des éléments d'édition pour la partie admin
          if(isset($_SESSION["is_auth"])) {
            echo "<img src='images/edit.jpg' height='32' width='32'/>";
            echo "<img src='images/trash.jpg' height='32' width='32'/>";
           }

          // Affichage des images
          echo "<img src= 'images/". $ligne[5] ."'> ";
          echo "<img src= 'images/". $ligne[4] ."'> ";
          
          // Affichage de la promotion
          echo "<h2>" . $ligne[0] . " - " . $ligne[1] . "</h2>";
            
          //Affichage des détails de l'équipe
          echo "<ul>";
            echo "<li> Entraineur : ". $ligne[3] ."</li>";
            echo "<li> <a href= 'equipe.php'> Composition </a> </li>";
            echo "<li> Championnat </li>";
              
            echo "<ul>";
              echo "<li> <a href=" . $ligne[6] . "> Résultats dernières journées </a> </li>";
              echo "<li> <a href=" . $ligne[7] . "> Classement </a> </li>";
            echo "</ul>";
          echo "</ul>";

          // echo "</td>";
          // echo "</tr>";
        echo "</li>"; // FIN du listing DES équipe 
      }
      echo "</ul>";
 
      $resultat->closeCursor();
      $idcom = NULL; 
    }
  }
  ?>

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
        <li><a href='index.php'>Accueil</a></li>
        <li><a href='lesequipes.php' >Les équipes</a></li>
        <li><a href='terrains.php' >Terrains</a></li>
        <li>  
          &nbsp;&nbsp;&nbsp;&nbsp;
           <?php
             session_start();
             afficherBlockLoggin();
          ?>
        </li>
      </ul>
    </nav>         

    <section> <!-- Debut du listing DES équipes MASCULINES -->
      <h1>Equipes Masculines </h1>
        <?php
          $var1 = 'M';
          $varBase = "les_equipes";
          $paramFile = "myparam";
          afficherEquipe($var1,$varBase,$paramFile);
        ?> 
    </section>

    <section> <!-- Debut du listing DES équipes FEMININES -->
      <h1>Equipes Féminines</h1>
       <?php
          $var1 = 'F';
          $varBase = "les_equipes";
          $paramFile = "myparam";
          afficherEquipe($var1,$varBase,$paramFile);
        ?> 
    </section>
  </div>
</body>
</html>