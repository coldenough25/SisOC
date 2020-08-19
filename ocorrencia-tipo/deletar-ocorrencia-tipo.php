
<?php include("../cabecalho.php");
 include("../conecta.php");
 include("banco-ocorrencia-tipo.php");

	$id = $_GET["id-deletar"];
    $resultado = removerTipoOcorrencia($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location: /ocorrencia-tipo/listar-ocorrencia-tipo.php?removido=true");
    }else{
        header("Location: /ocorrencia-tipo/listar-ocorrencia-tipo.php?removido=false");
    }
