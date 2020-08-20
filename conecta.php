<?php
	$conexao = pg_connect("host=127.0.0.1 port=5432 dbname=sisoc user=postgres password=postgres");

	if(!$conexao){
        echo"Falha na conexão com o banco. Veja detalhes técnicos:".pg_last_error($conexao);
    }
