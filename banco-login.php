<?php
function loginInstituicao($conexao, $ra_siape, $senha) {
	$resultado = pg_query_params($conexao, "select id_usuario from usuario where ra_siape = $1 and senha = $2", array($ra_siape, md5($senha)));
	return $resultado;
}
function loginTerceiros($conexao, $email, $senha) {
    $resultado = pg_query_params($conexao, "select id_usuario from usuario where email = $1 and senha = $2", array($email, md5($senha)));
	return $resultado;
}
?>
