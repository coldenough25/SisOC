<?php
  function listarTipoOcorrencia($conexao) {
    
    $tipo_ocorrencias = array();
    $resultado = pg_query($conexao, "SELECT ot.id, ot.nome, ot.descricao, s.sigla FROM ocorrencia_tipo AS ot INNER JOIN setor AS s ON ot.id_setor = s.id");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($tipo_ocorrencias, $ocorrencia);
    }
    return $tipo_ocorrencias;
    //
  }


  function adicionarTipoOcorrencia($conexao, $nome, $setor, $descricao) {
    $lista_id = array();
    $id_setor = pg_query_params("SELECT * FROM setor WHERE sigla = $1", array($setor));
    while ($resultado = pg_fetch_assoc($id_setor)) {
      array_push($lista_id, $resultado);
    }
    $resultado = pg_query_params($conexao, "INSERT INTO ocorrencia_tipo (nome, descricao, id_setor) VALUES ($1, $2, $3)", array($nome, $descricao, reset($lista_id[0])));
    return $resultado;
  }

  function removerTipoOcorrencia($conexao, $id) {
    $int_id = (int) $id;
    $resultado = pg_query_params($conexao, "DELETE FROM ocorrencia_tipo WHERE id = $1;", array($int_id));
    return $resultado;
  }
  
  function mostrarTipoOcorrencia($conexao, $id) {
    $tipo_ocorrencias = array();
    $resultado = pg_query_params($conexao, "SELECT ot.id, ot.nome, ot.descricao, s.sigla FROM ocorrencia_tipo AS ot INNER JOIN setor AS s ON ot.id_setor = s.id WHERE ot.id = $1", array($id));
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($tipo_ocorrencias, $ocorrencia);
    }
    return $tipo_ocorrencias;
  }

  function alterarTipoOcorrencia($conexao, $nome, $setor, $descricao, $id){
    $lista_id = array();
    $id_setor = pg_query_params($conexao, "SELECT * FROM setor WHERE sigla = $1", array($setor));
    while ($resultado = pg_fetch_assoc($id_setor)) {
      array_push($lista_id, $resultado);
    }
    $resultado = pg_query_params($conexao, "UPDATE ocorrencia_tipo SET nome = $1, descricao = $2, id_setor = $3 WHERE id = $4", array($nome, $descricao, reset($lista_id[0]), $id));
    return $resultado;
  }
