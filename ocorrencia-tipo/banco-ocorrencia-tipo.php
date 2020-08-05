<?php
  function listarTipoOcorrencias($conexao) {
    $tipo_ocorrencias = array();
    $resultado = pg_query($conexao, "select * from ocorrencia_tipo");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($tipo_ocorrencias, $ocorrencia);
    }
    return $tipo_ocorrencias;
  }


  function adicionarTipoOcorrencia($conexao, $nome, $descricao) {
    $resultado = pg_query_params($conexao, "insert into ocorrencia_tipo (nome, descricao) values ($1, $2)", array($nome, $descricao));
    return $resultado;
  }

  function removerTipoOcorrencia($conexao, $nome, $descricao) {
    $resultado = pg_query_params($conexao, "delete * from ocorrencia_tipo where nome =  $1 and descricao = $2)", array($nome, $descricao));
    return $resultado;
  }
  
  function alterarTipoOcorrencia($conexao, $nome, $descricao, $valor_antigo) {

    $resultado = pg_query_params($conexao, "update table ocorrencia_tipo set nome =  $1 and descricao = $2 where )", array($nome, $descricao, $valor_antigo));
    return $resultado;
  }
?>
