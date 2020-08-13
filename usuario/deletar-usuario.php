
<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-usuario.php"); ?>
<?php
	$id = $_GET["id-deletar"];
    $resultado = removerUsuario($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=true");
    }else{
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=false");
    }
    ?>


<?php include("../rodape.php"); ?>
