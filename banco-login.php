<?php
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado, $nomeimagem){
	$query = "insert into produtos(nome, preco, descricao, categoria_id, usado, imagem) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado}, '{$nomeimagem}')";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}
function verificarLogin($conexao, $user, $encrypted_password){
	$resultado = mysqli_query($conexao, "select usuario, senha from usuarios where usuario = {$user} and senha = {$encrypted_password}");
	return $resultado;
}
function removeProdutos($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}
?>