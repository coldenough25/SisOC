
<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-ocorrencia-tipo.php"); ?>
<?php
	$id = $_GET["id-deletar"];
    $resultado = removerTipoOcorrencia($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location:http://localhost/TCC/SisOC/ocorrencia-tipo/listar-ocorrencia-tipo.php?removido=true");
    }else{
        header("Location:http://localhost/TCC/SisOC/ocorrencia-tipo/listar-ocorrencia-tipo.php?removido=false");
    }
    ?>
	

<?php include("../rodape.php"); ?>  