
<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
	<?php
		$nome = $_POST["nome"];
		$preco = $_POST["preco"];
		$usado = $_POST["usado"];
		$descricao = $_POST["descricao"];
		$categoria_id = $_POST['categoria_id'];
		$nomeimagem = $_POST['nomeimg'];
		if(array_key_exists('usado', $_POST)){
			$usado = "true";
		} else {
			$usado = "false";
		}
		
	?>
	<?php include("banco-produto.php");
	$resultado = insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado, $nomeimagem);
	
	if($resultado){ ?>
	<p class="alert-success">
		Produto <?=$nome; ?>, R$<?=$preco; ?> adicionado com sucesso!</p>
	<?php }else{ ?>
	<p class="alert-danger">O produto <?=$nome; ?> não foi adicionado! </p>
	<?php
	}
	mysqli_close($conexao); ?>
<?php include("rodape.php"); ?>