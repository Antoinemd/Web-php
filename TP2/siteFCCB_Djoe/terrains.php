<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>Terrains du FCCB</title>
</head>
<body>
  <div id="wrapper">
    <header>
      <h1>FCCB</h1>
      <h2>Terrains du FCCB</h2>
    </header>
    <nav>
      <ul>
        <li><a href='index.php'>Accueil</a></li>
        <li><a href='lesequipes.php' >Les équipes</a></li>
        <li><a href='terrains.php' >Terrains</a></li>
        <li>  
          &nbsp;&nbsp;&nbsp;&nbsp;

        <?php

          include("./blockLoggin.php");
          session_start();
          afficherBlockLoggin();
        ?>
        </li>
      </ul>
    </nav> 
    <section>
      <h1>Under construction ! <img src="./images/enConstruction.gif" /></h1>
    </section>
  </div>
</body>
</html>