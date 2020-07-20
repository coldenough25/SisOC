<?php
  function listaOcorrencias($conexao) {
    $ocorrencias = array();
    $resultado = pg_query($conexao, "select * from ocorrencia");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($ocorrencias, $ocorrencia);
    }
    return $ocorrencias;
  }
?>
