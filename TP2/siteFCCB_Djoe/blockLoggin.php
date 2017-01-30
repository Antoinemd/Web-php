<?php
  function afficherBlockLoggin(){

    $connexionBar = "Authentification:";
    if(isset($_SESSION["is_auth"])) {
    // if(isset($_SESSION['login'])){

    $connexionBar = "Bonjour " . $_SESSION['login'] . " ! ";
    $connectBtn = "Deconnexion";
    // EOT => permet de stocker une variable sur plusieurs lignes
    $bandeauConnection = <<<EOT

      <form action="../admin/logout.php">
        $connexionBar
        <input type='submit' value="$connectBtn" />
      </form>
EOT;
    } else {
      $connectBtn = "Connexion";

      $bandeauConnection = <<<EOT

        <form action="../admin/login.php" method="post">
          $connexionBar
          <input type="text" size="8" name="login" />
          <input type="password" size="8" name="pwd" />
          <input type="submit" value="$connectBtn"/>
        </form>  
EOT;
    }
    echo $bandeauConnection;
  }

?>