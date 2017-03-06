 <?php
  Function connexpdo($base,$param) {

    include_once($param.".inc.php");
    
    $dsn = "mysql:host=" . MYHOST . ";dbname=" . $base;
    $user = MYUSER;
    $pass = MYPASS;
   
    try {
      $idcom = new PDO($dsn,$user,$pass);
      $idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      return $idcom;
    }
    catch(PDOException $except) {
      echo "Echec de la connexion", $except->getMessage();
      return FALSE;
      exit();
    }
  }
?>