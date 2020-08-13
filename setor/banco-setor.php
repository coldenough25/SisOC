<?php
    function incluirSetor($conexao, $sigla, $nome, $email) {
        $resultado = pg_query_params("insert into setor values (default, $1, $2, $3)", array($sigla, $nome, $email));
    }
    function listaSetores($conexao) {
        $setores = array();
        $resultado = pg_query($conexao, "select * from setor");
        while ($setor = pg_fetch_assoc($resultado)) {
            array_push($setores, $setor);
        }
        return $setores;
    }
?>
