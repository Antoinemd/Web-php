<?php

include("./connexpdo.php");
include("../siteFCCB_Djoe/blockLoggin.php");

function modifierEquipe(){
	// editer une équipe
	if(isset($_SESSION["is_auth"])) {
		if (!empty($_POST['result'])) {

			$equipe_to_edit = $_POST['result'];
			
			echo "<div>";
			echo "<table>";
				echo "<th> Récapitulatif: </th>";
				echo "<tr><td> Equipe_id: </td> <td>". $equipe_to_edit[0] ." </td></tr>";
				echo "<tr><td> Championnat: </td> <td>". $equipe_to_edit[1] ." </td><tr>";
				echo "<tr><td> Sexe: </td> <td>". $equipe_to_edit[2] ." </td></tr>";
				echo "<tr><td> Coach: </td> <td>". $equipe_to_edit[3] ." </td></tr>";
				echo "<tr><td> photo_c: </td> <td>". $equipe_to_edit[4] ." </td></tr>";
				echo "<tr><td> photo_e: </td> <td>". $equipe_to_edit[5] ." </td></tr>";
				echo "<tr><td> url_res: </td> <td>". $equipe_to_edit[6] ." </td></tr>";
				echo "<tr><td> url_classmnt: </td> <td>". $equipe_to_edit[7] ." </td></tr>";
			echo "</table>";				
			echo "</div>";
		} else {
			echo "erreur: un des champs entré est vide !";
			echo "<a href='../siteFCCB_Djoe/lesequipes.php'> retour </a>";
		}
     
    	echo "<div>";
    	echo "<form action='./update_Team.php' method='post'>";
    	
    	echo "<table>";
		  echo "<th> Changements: </th>";
		  // On ne modifie pas la clé primaire, on la cache. Sinon recréer une nouvelle équipe.
          echo "<tr><td><input type='hidden' name='teamID' value='$equipe_to_edit[0]'/></td></tr>";
          echo "<tr><td>Championnat :&nbsp; <input type='text' size='8' name='championnat' placeholder='$equipe_to_edit[1]'/></td>
	          	<td>&nbsp;Sexe:&nbsp;<select name='equipeSexe'> 
    	           						<option value='M'> Homme </option>
        	       	    				<option value='F'> Femme </option>
            	   					 </select>
				</td>
				</tr>";
          echo "<tr><td>Nom du coach:<input type='text' size='8' name='nomCoach' placeholder='$equipe_to_edit[3]'/></td>
          		<td>Image Coach: <input type='text' size='8' name='imageCoach' placeholder='$equipe_to_edit[4]'/> </td>
          		<td> ImageTeam: <input type='text' size='8' name='imageTeam' placeholder='$equipe_to_edit[5]'/></td>
          		</tr>";

          echo "<tr><td> resultats: <input type='text' size='30' name='resultats' placeholder='$equipe_to_edit[6]'/></td>
          			<td> Classement: <input type='text' size='30' name='classement' placeholder='$equipe_to_edit[7]'/></span><br/></td>
          		</tr>";
          echo "<tr> <td><input type='image' src='../siteFCCB_Djoe/images/edit.jpg' height='42' width='42' border='0' alt='Submit' /></td>
          		</tr>";
          echo "</table>";
          echo "</form>";
      	echo "</div>";
    } 
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="../siteFCCB_Djoe/styles/stylesCommuns.css"/>
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
        <li><a href='../siteFCCB_Djoe/index.php'>Accueil</a></li>
        <li><a href='../siteFCCB_Djoe/lesequipes.php' >Les équipes</a></li>
        <li><a href='../siteFCCB_Djoe/terrains.php' >Terrains</a></li>
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
        echo "<h1> Editer une équipe </h1>";
        modifierEquipe();
        echo "</section>";
      }
    ?>

      </div>
</body>
</html>
