<?php
include("conecta.php");
include("ocorrencia/banco-ocorrencia.php");

$tipo = $_GET['tipo'];
$alvoLista = listarAlvos($conexao, $tipo);
$alvoJson = json_encode($alvoLista);
echo($alvoJson);
?>
