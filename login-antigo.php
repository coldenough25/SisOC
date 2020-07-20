<?php
include("conecta.php");
include("banco-login.php");

$ra_siape = $_POST["raSiape"];
$senha = $_POST["password"];

$resultado = login($conexao, $ra_siape, $senha);

if (pg_num_rows($resultado) != 1) {
    header('Location: login.php?error=2');
} else {
    $_SESSION['logado'] = true;
    header('Location: index.php');
}
pg_close($conexao);
?>
