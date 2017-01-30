<?php

session_start();

if (isset($_SESSION['is_auth'])) {    

   session_destroy();
   header("location: ../siteFCCB_Djoe/index.php");

   // echo "<br> you are logged out successufuly!";
} 
   // echo "<br/><a href='login.php'>login</a>";
   header("location: ../siteFCCB_Djoe/index.php");
 ?>