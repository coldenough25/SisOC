<?php

include("../conecta.php");
include("banco-ocorrencia.php");

$id = $_GET["id-deletar"];
$resultado = removerOcorrencia($conexao, $id);

if(isset($resultado) && $resultado != false){
    header("Location: /ocorrencia/listar-ocorrencias.php?removido=true");
}else{
    header("Location: /ocorrencia/listar-ocorrencias.php?removido=false");
}
