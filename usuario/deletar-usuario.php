
<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-usuario.php");

	$id = $_GET["id-deletar"];
    $resultado = removerUsuario($conexao, $id);

    if(isset($resultado) && $resultado != false){
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=true");
    }else{
        header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?removido=false");
    }
    ?>


<?php include("../rodape.php"); ?>
