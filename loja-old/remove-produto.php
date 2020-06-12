<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>
<?php
	$id = $_POST['id'];
	removeProdutos($conexao, $id);?>
	<?php header("Location: produto-lista.php?removido=false");
	die();?>
?>
<?php include("rodape.php"); ?>  