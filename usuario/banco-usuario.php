<?php
  function listarUsuario($conexao) {
    $usuarios = array();
    $resultado = pg_query($conexao, "SELECT u.id, u.nome, u.ra_siape, u.email, t.nome FROM usuario AS u INNER JOIN usuario_tipo AS t ON u.id_tipo = t.id");
    while ($usuario = pg_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    return $usuarios;
  }

  function adicionarUsuario($conexao, $nome, $ra_siape, $email, $tipo) {
    $senha = "202cb962ac59075b964b07152d234b70";
    $lista_id = array();
    $id_tipo = pg_query_params("SELECT * FROM usuario_tipo WHERE nome = $1", array($tipo));
    while ($resultado = pg_fetch_assoc($id_tipo)) {
      array_push($lista_id, $resultado);
    }
    $resultado = pg_query_params($conexao, "INSERT INTO usuario (nome, ra_siape, email, senha, id_tipo) VALUES ($1, $2, $3, $4, $5)", array($nome, $ra_siape, $email, $senha, reset($lista_id[0])));
    return $resultado;
  }

  function removerUsuario($conexao, $id) {
    $int_id = (int) $id;
    $resultado = pg_query_params($conexao, "DELETE FROM usuario WHERE id = $1;", array($int_id));
    return $resultado;
  }

  function mostrarUsuario($conexao, $id) {
    $usuarios = array();
    $resultado = pg_query_params($conexao, "SELECT u.id, u.nome, u.ra_siape, u.email, t.nome FROM usuario AS u INNER JOIN usuario_tipo AS t ON u.id_tipo = t.id WHERE u.id = $1", array($id));
    while ($usuario = pg_fetch_assoc($resultado)) {
      array_push($usuarios, $usuario);
    }
    return $usuarios;
  }

  function alterarUsuario($conexao, $nome, $ra_siape, $email, $tipo, $id) {
    $lista_id = array();
    $id_tipo = pg_query_params("SELECT * FROM usuario_tipo WHERE nome = $1", array($tipo));
    while ($resultado = pg_fetch_assoc($id_tipo)) {
      array_push($lista_id, $resultado);
    }
    $resultado = pg_query_params($conexao, "UPDATE usuario SET nome = $1, ra_siape = $2, email = $3, id_tipo = $4 WHERE id = $5", array($nome, $ra_siape, $email, reset($lista_id[0]), $id));
    return $resultado;
  }
