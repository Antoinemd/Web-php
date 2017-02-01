<?php 

  include("../admin/connexpdo.php");
  include("./blockLoggin.php");

  function ajouterEquipe(){
    // Ajouter une équipe
    if(isset($_SESSION["is_auth"])) {
     
      echo "<div>";
        echo "<form action='../admin/add_Team.php' method='post'>";
          echo "<span> ID: <input type='text' size='8' name='teamID' /> </span> &nbsp;&nbsp;&nbsp;";
          echo "<span> Championnat: <input type='text' size='8' name='championnat' /> </span> &nbsp;&nbsp;&nbsp;";
          echo "<span> Sexe: 
                  <select name='equipeSexe'> 
                    <option value='M'> Homme </option>
                    <option value='F'> Femme </option>
                  </select>
                </span> <br><br>";
          echo "<span> Nom du coach:<input type='text' size='8' name='nomCoach'/></span><br><br>";
          echo "<span> Image Coach: <input type='text' size='8' name='imageCoach' /></span>";     
          echo "<span> ImageTeam: <input type='text' size='8' name='imageTeam' /><br/><br/>";
          echo "<span> resultats: <input type='text' size='40' name='resultats'/></span> &nbsp;&nbsp;&nbsp;";
          echo "<span> Classement: <input type='text' size='40' name='classement'/></span><br/>";
          echo "<input type='image' src='images/addTeam.jpg' height='42' width='42' border='0' alt='Submit' />";
        echo "</form>";
      echo "</div>";
    } 
  }


  
  function afficherEquipe($sexe,$base,$param) {
    if($sexe == 'M'){
      $requette = "SELECT * FROM equipes WHERE sexe = 'M' ";
    } 
    if($sexe == 'F'){
      $requette = "SELECT * FROM equipes WHERE sexe = 'F' ";
    }

    if($idcom = connexpdo($base,$param)) {
      $resultat = $idcom->query($requette);
        
      echo "<ul>";
      while($ligne = $resultat->fetch(PDO::FETCH_NUM)){
        echo "<li>";

          //Affichage des éléments d'édition pour la partie admin
          if(isset($_SESSION["is_auth"])) {
            echo "<div class='edit'>"; 
                echo "<form action='../admin/delete_Team.php' method='post'>";
                echo "<button type='submit' name='deleteById' value='$ligne[0]' border='0'>
                        <img src='images/trash.jpg' height='32' width='32' alt='Submit'>
                      </button> ";
                // version sans bouton
                // echo "<input type='hidden' name='deleteById' value='$ligne[0]'>";
                // echo "<input type='image' src='images/trash.jpg' height='32' width='32' border='0' alt='Submit'/>";
                echo "</form>";
            echo "</div>";
            echo "<div class='edit'>"; 
                echo "<form action='../admin/edit_Team.php' method='post'>";
              
                // on créer un <input> pour chaque attribut pour les envoyer et les récupérer ensuite via le $_POST dans un type 'array'
                foreach ($ligne as $value) {
                  echo '<input type="hidden" name="result[]" value="'. $value. '">';
                } 

                echo "<button type='submit' name='updateById' border='0'> 
                        <img src='images/edit.jpg' height='32' width='32' alt='Submit'>
                      </button> ";
                echo "</form>";
            echo "</div>";
           }

          // Affichage des images
          echo "<img src= 'images/". $ligne[5] ."' height='180' width='265'> ";
          echo "<img src= 'images/". $ligne[4] ."' height='180' width='150'> ";
          
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

    <?php
      if(isset($_SESSION["is_auth"])) {
        echo "<section>";
        echo "<h1> Ajouter une équipe </h1>";

        ajouterEquipe();
        echo "</section>";
      }
    ?>
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