<?php
  function listaOcorrencias($conexao) {
    $ocorrencias = array();
    $resultado = pg_query($conexao, "select * from ocorrencia");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($ocorrencias, $ocorrencia);
    }
    return $ocorrencias;
  }
  function listarTipos($conexao) {
      $tipos = array();
      $resultado = pg_query($conexao, "select * from ocorrencia_tipo");
      while($tipo = pg_fetch_assoc($resultado)) {
        array_push($tipos, $tipo);
      }
      return $tipos;
  }
  function listarAlvos($conexao, $tipo) {
    $alvos = array();
    $resultado = pg_query_params($conexao, "select * from usuario where tipo = $1", array($tipo));
    while($alvo = pg_fetch_assoc($resultado)) {
        array_push($alvos, $alvo);
    }
    return $alvos;
  }
?>
