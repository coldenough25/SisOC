<?php
  function listarTipoUsuario($conexao) {
    
    $tipo_usuarios = array();
    $resultado = pg_query($conexao, "SELECT * FROM usuario_tipo");
    while ($usuario = pg_fetch_assoc($resultado)) {
      array_push($tipo_usuarios, $usuario);
    }
    return $tipo_usuarios;
  }


  function adicionarTipoUsuario($conexao, $nome, $descricao) {
    $resultado = pg_query_params($conexao, "INSERT INTO usuario_tipo (nome, descricao) VALUES ($1, $2)", array($nome, $descricao));
    return $resultado;
  }

  function removerTipoUsuario($conexao, $id) {
    $int_id = (int) $id;
    $resultado = pg_query_params($conexao, "DELETE FROM usuario_tipo WHERE id = $1;", array($int_id));
    return $resultado;
  }
  
  function mostrarTipoUsuario($conexao, $id) {
    $tipo_usuarios = array();
    $resultado = pg_query_params($conexao, "SELECT * FROM usuario_tipo WHERE id = $1", array($id));
    while ($usuario = pg_fetch_assoc($resultado)) {
      array_push($tipo_usuarios, $usuario);
    }
    return $tipo_usuarios;
  }

  function alterarTipoUsuario($conexao, $nome, $descricao, $id){
    $resultado = pg_query_params($conexao, "UPDATE usuario_tipo SET nome = $1, descricao = $2 WHERE id = $3", array($nome, $descricao, $id));
    return $resultado;
  }
