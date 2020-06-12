<?php
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado, $nomeimagem){
	$query = "insert into produtos(nome, preco, descricao, categoria_id, usado, imagem) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado}, '{$nomeimagem}')";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}
function listaProdutos($conexao){
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.* , c.nome as categoria_nome
		from produtos as p
		join categorias as c
		on p.categoria_id = c.id");
	while ($produto = mysqli_fetch_assoc($resultado)){
		array_push($produtos, $produto);
	}
	return $produtos;
}
function removeProdutos($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}
?>