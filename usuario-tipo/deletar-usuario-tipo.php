
<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-usuario-tipo.php");

$id = $_GET["id-deletar"];
$resultado = removerTipoUsuario($conexao, $id);

if (isset($resultado) && $resultado != false) {
    header("Location:http://localhost/TCC/SisOC/usuario-tipo/listar-usuario-tipo.php?removido=true");
} else {
    header("Location:http://localhost/TCC/SisOC/usuario-tipo/listar-usuario-tipo.php?removido=false");
}
?>
	

<?php include("../rodape.php"); ?>  