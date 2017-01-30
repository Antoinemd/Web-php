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

    <?php
    /* redimensionne l'image en fonction de la valeur des paramètres */

    function redimensionneImageJpeg($sourceImageName,$destImageName, $destWidth,$destHeight) {
      
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
    
    function ajouterEntree($nomFichier, $description){
      echo $nomFichier; // nom du fichier à entrer dans le map
      
      $myfile = fopen("../CV/images/photos/description.txt", "a+") or die("Unable to open file!");
      $txt = $nomFichier." : ". $description."\n";
      fwrite($myfile, $txt);
      fclose($myfile);

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

      if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension non supportée. Seulement .jpg, .jpeg et .png sont acceptés";
      }
          
      if($file_size > 2097152) {
        $errors[]='la taille excède 2 Mo';
      }
          
      // s'il n'y a pas d'ereur
      if(empty($errors)==true) {
        // on déplace le fichier reçu vers le répertoire
        move_uploaded_file($file_tmp,"./images/photos/".$file_name);
        echo "Fichier envoyé. <br/>";
      }else{
        print_r($errors);
      }

      $sourceImageName = "./images/photos/".$file_name;
      
      $path_parts = pathinfo($sourceImageName);
      $destImageName = "./images/photos/".$file_name;

      // faire la création d'imagette
      //$destImageName = "./images/photos/".$path_parts['filename']."Small.".$file_ext; // pour small o thumb
      list($originalWidth, $originalHeight) = getimagesize($sourceImageName); 
      
      $destWidth = $originalWidth;
      $destHeight = $originalHeight;
      $ratio = $originalWidth / $originalHeight;  //calcul du ratio de l'image

      // if ($originalHeight > 500) {
      //   // Si on veut changer sa hauteur:
      //   $destWidth = 500 * $ratio;
      // }

      if ($originalWidth > 700) {
        // Si on veut changer la largeur de l'image:
        $destWidth = 700;
        $destHeight = $destWidth / $ratio;
        redimensionneImageJpeg($sourceImageName,$destImageName, $destWidth,$destHeight);
        echo "Le fichier a été redimensionné et ajouté. ";
      }else{
        redimensionneImageJpeg($sourceImageName,$destImageName, $destWidth,$destHeight);
        echo "Le fichier a bien été ajouté.";
      }

      ajouterEntree($file_name, $description);


    }

    /* Fin du programme */
    ?>





    </div> <!-- div du wrapper  -->
</body>
</html>