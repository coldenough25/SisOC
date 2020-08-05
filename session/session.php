<?php
   session_start();

   if(!isset($_SESSION['logado'])){
        header("location:session/login.php");
        die();
   }
?>
