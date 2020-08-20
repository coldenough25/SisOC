<?php
  function listarTipoOcorrencia($conexao) {
    $tipo_ocorrencias = [];
    $resultado = pg_query($conexao, "SELECT ot.id, ot.nome, ot.descricao, s.sigla FROM ocorrencia_tipo AS ot INNER JOIN setor AS s ON ot.id_setor = s.id");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($tipo_ocorrencias, $ocorrencia);
    }
    return $tipo_ocorrencias;
  }


  function adicionarTipoOcorrencia($conexao, $nome, $setor, $descricao) {
    $lista_id = [];
    $id_setor = pg_query_params("SELECT * FROM setor WHERE id = $1", array((int)$setor));
    while ($resultado = pg_fetch_assoc($id_setor)) {
      array_push($lista_id, $resultado);
    }

    return pg_query_params($conexao, "INSERT INTO ocorrencia_tipo (nome, descricao, id_setor) VALUES ($1, $2, $3)", array($nome, $descricao, reset($lista_id[0])));
  }

  function removerTipoOcorrencia($conexao, $id) {
    return pg_query_params($conexao, "DELETE FROM ocorrencia_tipo WHERE id = $1;", array((int) $id));
  }

  function mostrarTipoOcorrencia($conexao, $id) {
    $resultado = pg_query_params($conexao, "SELECT ot.id, ot.nome, ot.descricao, s.sigla FROM ocorrencia_tipo AS ot INNER JOIN setor AS s ON ot.id_setor = s.id WHERE ot.id = $1", array($id));
    return pg_fetch_assoc($resultado);
  }

  function alterarTipoOcorrencia($conexao, $nome, $setor, $descricao, $id){
    return pg_query_params($conexao, "UPDATE ocorrencia_tipo SET nome = $1, descricao = $2, id_setor = $3 WHERE id = $4", array($nome, $descricao, (int)$setor, (int)$id));
  }
