<?php
session_start();
if(session_destroy()) {
    header("Location: http://localhost/TCC/SisOC/session/login.php");
}
?>
