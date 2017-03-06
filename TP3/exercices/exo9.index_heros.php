<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styles/stylesCommuns.css"/>
        <title>TP3</title>
    </head>
    <body style="font-family:sans-serif;">
    <h1>La ligue des super-héros</h1>
    <?php
		// require('exo9.SuperHeros.class.php');
		// require('exo9.conf.php');

		// $bdd = new PDO("mysql:host=localhost;dbname=magasin", USER, PASS);

		// $shManager = new SuperHerosManager(); //manager de base de données pour la classe super héros

		// if (???)
		// {
		// 	if (???)
		// 	{
		// 		$sh = new SuperHeros(
		// 			array(
		// 				'nom'     => $_POST['nom'],
		// 				'pouvoir' => $_POST['pouvoir'],
		// 				'nomreel' => $_POST['nomreel'],
		// 				'univers' => $_POST['univers'],
		// 				'ville'   => $_POST['ville']
		// 			));
		// 		???????????????;

		// 		echo 'Ajout effectué avec l\'id '.$sh->getId();
		// 	} else
		// 	{
		// 		$id = $_POST['action'];

		// 		???????????????;
				
		// 		???????????????;

		// 		$shManager->updateSuperHeros($sh);

		// 		echo 'Modification effectuée pour l\'id '.$sh->getId();
		// 	}

		// }

		// if (isset($_GET['id']))
		// {
		// 	$shm = $shManager->getById($_GET['id']);
		// }

    ?>
    <h2>
        Liste
    </h2>
    <?php
        // $shManager->afficheAll();
    ?>

    <h2>Ajouter un super-héros</h2>
    <form action="index.php" method="post">
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php ?>" />
        </p>
        <input type="hidden" name="action" value="<?php ?>">
        <p>
            <label for="pouvoir">Pouvoirs :</label>
            <input type="text" name="pouvoir" id="pouvoir" value="<?php  ?>" />
        </p>

        <p>
            <label for="nomreel">Identité Réelle :</label>
            <input type="text" name="nomreel" id="nomreel" value="<?php  ?>" />
        </p>

        <p>
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" value="<?php  ?>" />
        </p>

        <p>
            <label for="univers">Univers :</label>
            <div>
                <input type="radio" name="univers" id="univers" value="Marvel" <?php  ?> /> Marvel <br/>
                <input type="radio" name="univers" value="DC" <?php  ?> /> DC <br/>
                <input type="radio" name="univers" value="Autre" <?php  ?> /> Autre
            </div>
        </p>
        <input type="submit" value="Enregistrer" />
    </form>
    </body>
</html>