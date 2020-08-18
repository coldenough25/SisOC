<?php
  function listaTipoUsuario($conexao) {
    $ocorrencias = [];
    $resultado = pg_query($conexao, "select * from usuario_tipo");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($ocorrencias, $ocorrencia);
    }
    return $ocorrencias;
  }

  function incluirTipoUsuario($conexao, $nome, $descricao){
      return pg_query_params($conexao, "INSERT INTO usuario_tipo (nome, descricao)
                    VALUES ($1, $2)", array($nome, $descricao));
  }


