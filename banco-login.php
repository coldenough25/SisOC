<?php
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado, $nomeimagem){
	$query = "insert into produtos(nome, preco, descricao, categoria_id, usado, imagem) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado}, '{$nomeimagem}')";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}
function verificarLogin($conexao, $email, $data, $raSiape){
	$resultado = mysqli_query($conexao, "select usuario from usuarios where email = '{$email}' and data = {$data} and raSiape = {$raSiape}");
	return $resultado;
}
function removeProdutos($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}
?>