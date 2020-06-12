<!DOCTYPE html>
<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
$categorias = listaCategorias($conexao);
?>
        <h1>Formulário de Cadastro</h1>
		<form action="adiciona-produto.php" method=post >
			<table>
				<tr>
					<td>Nome:</td>
					<td><input class="form-control" type="text" name="nome"/><br></td>
				</tr>
				<tr>
					<td>Preço:</td>
					<td><input class="form-control" type="numer" name="preco"/><br></td>
				</tr>
				<tr>
					<td>Descrição</td>
					<td><textarea name="descricao" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td>Nome_Imagem</td>
					<td><input type="text" name="nomeimg" class="form-control"></input></td>
				</tr>
				<tr>
				</br>
					<td>Categoria</td>
					<td>
						<select name="categoria_id">
							<?php foreach($categorias as $categoria):?>
								<option value="<?=$categoria['id']?>">
									<?=$categoria['nome']?></br>
								</option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="usado" value="true"/>USADO
						</td>
				</tr>
			</table>
			<br>
			<input class="btn btn-primary" type="submit" value="Cadastrar"/></td>
		</form>
<?php include("rodape.php"); ?>