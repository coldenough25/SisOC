<?php
  function listarSetor($conexao) {
    $setores = array();
    $resultado = pg_query($conexao, "SELECT id, nome, sigla, email FROM setor");
    while ($setor = pg_fetch_assoc($resultado)) {
      array_push($setores, $setor);
    }
    return $setores;
  }

  function adicionarSetor($conexao, $nome, $sigla, $email) {
    $resultado = pg_query_params($conexao, "INSERT INTO setor (nome, sigla, email) VALUES ($1, $2, $3)", array($nome, $sigla, $email));
    return $resultado;
  }

  function removerSetor($conexao, $id) {
    $int_id = (int) $id;
    $resultado = pg_query_params($conexao, "DELETE FROM setor WHERE id = $1;", array($int_id));
    return $resultado;
  }

  function mostrarSetor($conexao, $id) {
    $setores = [];
    $resultado = pg_query_params($conexao, "SELECT id, nome, sigla, email FROM setor WHERE id = $1", array((int)$id));
    while ($setor = pg_fetch_assoc($resultado)) {
      array_push($setores, $setor);
    }
    return $setores;
  }

  function alterarSetor($conexao, $nome, $sigla, $email, $id){
    $resultado = pg_query_params($conexao, "UPDATE setor SET nome = $1, sigla = $2, email = $3 WHERE id = $4", array($nome, $sigla, $email, $id));
    return $resultado;
  }
