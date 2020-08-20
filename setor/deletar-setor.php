<?php

include("../cabecalho.php");
include("../conecta.php");
include("banco-setor.php");

	$id = $_GET["id-deletar"];
    $resultado = removerSetor($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location: /setor/listar-setor.php?removido=true");
    }else{
        header("Location: /setor/listar-setor.php?removido=false");
    }
