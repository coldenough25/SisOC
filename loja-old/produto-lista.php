<?php include("cabecalho.php");?>
<?php include("conecta.php");?>
<?php include("banco-produto.php");?>
<?php
if((array_key_exists("removido", $_GET)) && ($_GET['removido']=='true')){
?>
	<p class="alert-success"> Produto apagado com sucesso.</p>
<?php } ?>
<?php
	$produtos = listaProdutos($conexao);
?>
<table class="table table-striped table-bordered">
		<tr>
			<th>IMAGEM</th>
			<th>NOME</th>
			<th>PREÇO</th>
			<th>DESCRIÇÃO</th>
			<th>CATEGORIA</th>
			<th>USADO</th>
			<th>OPÇÕES</th>
			<th>Alterar</th>
		</tr>
	<?php
		foreach($produtos as $produto){
			if($produto['usado'] == 1) {
				$usado = "Sim";
			} else {
				$usado = "Não";
			}?>
			<tr>
				<?php $caminho=$produto["imagem"]; ?>
				<td><img src="<?=$produto["imagem"]?>" style="width:80px;" /></td>
				<td><?=$produto['nome']?></td>
				<td><?=$produto['preco']?></td>
				<td><?=substr($produto['descricao'],0.15) ?></td>
				<td><?=$produto['categoria_nome']?></td>
				<td><?=$usado?></td>
				<td>
					<form action="remove-produto.php" method="post">
					<input type="hidden" name="id" value="<?=$produto['id']?>" />
					<button class="btn btn-danger">REMOVER</button>
					</form>
				</td>
				<td>
					<form action="produto-altera-formulario.php" method="post">
						<input type="hidden" name="id" value="<?=$produto["id"]?>"/>
						<button class="bnt bnt-primary">alterar</button>
					</form>
				</td>
			</tr>
		<?php } ?>
</table>
<?php include("rodape.php");?>