
<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-setor.php"); ?>
<?php
	$id = $_GET["id-deletar"];
    $resultado = removerSetor($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("setor/listar-setor.php?removido=true");
    }else{
        header("setor/listar-setor.php?removido=false");
    }
    ?>


<?php include("../rodape.php"); ?>
