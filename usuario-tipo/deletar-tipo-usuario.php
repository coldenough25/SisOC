<?php
include("../conecta.php");
include("banco-tipo-usuario.php");

	$id = $_GET["id-deletar"];
    $resultado = removerUsuario($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=true");
    }else{
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=false");
    }

