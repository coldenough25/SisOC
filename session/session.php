<?php
   session_start();

   if(!isset($_SESSION['logado'])){
        header("location:http://localhost/TCC/SisOC/session/login.php?error=1");
        die();
   }
?>
