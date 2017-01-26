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
        <li><a href="./index.php">Accueil</a></li>
        <li><a href="cv.html">Mon CV</a></li>
        <li><a href="agenda.html">Agenda</a></li>
        <li><a href="photos.php">Photos</a></li>
        <li id="admin"><a href="../admin/ajoutPhoto.html">Administration</a></li>
      </ul>
    </nav>

    <?php
    
    /**
    *  création d'une copie redimensionnée d'une image jpeg.
    *
    *  $sourceImageName : 
    *      le nom (chemin/nomDuFichier) de l'image source à copier
    *      et à redimensionner
    *  $destImageName : 
    *      le nom (chemin/nomDufichier) de l'image à créer.
    *  $destWidth, $destHeight : 
    *      la largeur et la hauteur (en pixel) de $destImage.
    */

    function redimensionneImageJpeg($sourceImageName,$destImageName,$destWidth,$destHeight) {
      
      // calcul de la taille de l'image source
      $imageSize = getimagesize($sourceImageName);

      // crée une ressource image correspondant au fichier jpeg $sourceImageName
      $sourceImage = imagecreatefromjpeg($sourceImageName); 
      
      // crée une ressource image noire pour le moment) correspondante 
      // pour accueillir l'image destination
      $destImage = imagecreatetruecolor($destWidth,$destHeight); 
      
      // recopie l'image source en la redimenssionant dans $destImage
      imagecopyresampled($destImage,$sourceImage,0,0,0,0,
               $destWidth,$destHeight,$imageSize[0],$imageSize[1]); 
           
      // enregistre dans le fichier $destImageName l'image $destImage
      // au format compressé jpeg (qualité par défaut 75)
      imagejpeg($destImage,$destImageName); 
      
      // libère ressources allouées pour l'image source
      imagedestroy($sourceImage);

      // libère les ressources allouées pour l'image destination  
      imagedestroy($destImage);  
    }
    


    /**
    *  ajout d'une entrée dans le ficier de description.txt
    *   $nomFichier: nom du fichier à ajouter (clé)
    *   $description: description du fichier qui sera affichée
    *
    */
    function ajouterEntree($nomFichier, $description){
      echo $nomFichier; // nom du fichier à entrer dans le map
      
      $myfile = fopen("../CV/images/photos/description.txt", "a+") or die("Unable to open file!\n");
      // ajout du retour à la ligne au début pour resecter la structure des données
      $txt = "\n".$nomFichier." : ". $description;
      fwrite($myfile, $txt);
      fclose($myfile);
      echo "La description: '". $description . "' a été ajoutée à l'image ". $nomFichier ."\n";
    }

    /* Debut du programme */
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png");
      $description = htmlspecialchars($_POST['description']);

      // Si présence d'un doublon
      if(strpos(file_get_contents("./images/photos/description.txt"),$file_name) !== false){
        $errors[]="Présence d'un fichier avec le même nom déjà existant \n";
      }
      // Si extension suppotée
      if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension non supportée. Seulement .jpg, .jpeg et .png sont acceptés\n";
      }
      // Si la taille est trop grande    
      if($file_size > 2097152) {
        $errors[]="la taille excède 2 Mo\n";
      }
          
      // s'il n'y a pas d'ereur
      if(empty($errors)===true) {
        // on déplace le fichier reçu vers le répertoire
        move_uploaded_file($file_tmp,"./images/photos/".$file_name);

        $sourceImageName = "./images/photos/".$file_name;
        $destImageName = "./images/photos/".$file_name;

        list($originalWidth, $originalHeight) = getimagesize($sourceImageName); 
        $destWidth = $originalWidth;
        $destHeight = $originalHeight;
        $ratioImg = $originalWidth / $originalHeight;  //calcul du ratio de l'image

        if ($destWidth > 700) {
          // Si on veut changer la largeur de l'image:
          $destWidth = 700;
          $destHeight = $destWidth / $ratioImg;
          echo "Le fichier sera redimensionné sur sa largeur (<=700 px). \n";
        }
        
        // TODO prendre l'image de destination, la vérifier puis la re-redimensionner si nécessaire
        // if ($originalHeight > 500) {
        //   // Si on veut changer sa hauteur:
        //   $destWidth = 500 * $ratio;
        //   redimensionneImageJpeg($sourceImageName,$destImageName, $destWidth,$destHeight);
        //   echo "Fichier ajouté et redimensionné sur sa hauteur. <br/> ";
        // }
        
        else{
          echo "Le fichier sera ajouté au répertoire sans modification. \n";
        }

        //création de l'image sur le serveur
        redimensionneImageJpeg($sourceImageName, $destImageName, $destWidth, $destHeight);
        
        // générer  imagetteSmall.file_ext
        $path_parts = pathinfo($sourceImageName);                  // nom_fichier
        $nameSmall = $path_parts['filename']."Small.";             // nom_fichierSmall
        $fileNameImagette = $nameSmall.$file_ext;                  // nom_fichierSmall.ext
        $destImageName = "./images/photos/".$nameSmall.$file_ext;  // destination du fichier imagette
        $destWidth = 200;                                          // on veut une imagette de 200px de large
        $destHeight = $destWidth / $ratioImg;                      // calcul de la nouvelle hauteur

        redimensionneImageJpeg($sourceImageName, $destImageName, $destWidth, $destHeight);

        // TODO remplacer
        ajouterEntree($file_name, $description);
        echo "Fichier envoyé. \n";


      }else{
        echo "Erreur lors de l'upload du fichier.\n";
        print_r($errors);
      }



    }    /* Fin du programme */
    ?>





    </div> <!-- div du wrapper  -->
</body>
</html>