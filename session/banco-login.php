<?php
function loginInstituicao($conexao, $ra_siape, $senha) {
	$array = [];
	$resultado = pg_query_params($conexao, "select id from usuario where ra_siape = $1 and senha = $2", array($ra_siape, md5($senha)));
	while ($row = pg_fetch_assoc($resultado)) {
		array_push($array, $row);
	  }
	  return $array;
}

function loginTerceiros($conexao, $email, $senha) {
	$array = [];
	$resultado = pg_query_params($conexao, "select id from usuario where email = $1 and senha = $2", array($email, md5($senha)));
	while ($row = pg_fetch_assoc($resultado)) {
		array_push($array, $row);
	  }
	  return $array;
}
?>