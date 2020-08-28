<?php

function listaOcorrencias($conexao, $situacao)
{
  $ocorrencias = [];
  if (isset($situacao) && $situacao != "") {
    $resultado = pg_query($conexao, "SELECT oc.id, oc.descricao, oc.alvo ,oc.data_hora AS data, oc.situacao AS situacao,
                us.nome AS criador, us.ra_siape AS ra,
                st.nome AS setor
                    FROM ocorrencia oc
                    JOIN usuario us ON oc.criador = us.id
                    JOIN ocorrencia_tipo oct ON oc.ot_id = oct.id
                    JOIN setor st ON oct.id_setor = st.id
                    WHERE situacao = ANY('{{$situacao}}')
                ");
  } else {
    $resultado = pg_query($conexao, "SELECT oc.id, oc.descricao, oc.alvo ,oc.data_hora AS data, oc.situacao AS situacao,
    us.nome AS criador, us.ra_siape AS ra,
    st.nome AS setor
        FROM ocorrencia oc
        JOIN usuario us ON oc.criador = us.id
        JOIN ocorrencia_tipo oct ON oc.ot_id = oct.id
        JOIN setor st ON oct.id_setor = st.id
    ");
  }
  if (!$resultado) {
    echo pg_last_error();
  }
  while ($ocorrencia = pg_fetch_assoc($resultado)) {
    array_push($ocorrencias, $ocorrencia);
  }
  return $ocorrencias;
}

function mostraOcorrencia($conexao, $id)
{
  $resultado = pg_query_params(
    $conexao,
    "SELECT o.id, o.descricao, o.alvo, o.criador, o.data_hora, o.situacao, ot.nome, u.nome 
    FROM ocorrencia AS o, ocorrencia_tipo AS ot, usuario AS u 
    WHERE o.ot_id = ot.id AND o.criador = u.id AND o.id = $1",
    array($id)
  );
  return pg_fetch_assoc($resultado);
}

function adicionaOcorrencias($conexao, $parametro)
{

  $data = new DateTime();
  $ot_id = (int) $parametro['tipo'] ?? 123;
  $date = $parametro['date'] . ' ' . $parametro['horario'] ?? $data->format('Y-m-d H:i:s');
  $descricao = $parametro['descricao'] ?? '123';
  $alvo = $parametro['alvo'] ?? 'alvo';
  $dominio = (int) $parametro['dominio'] ?? 123;
  $criador = (int) $parametro['criador'] ?? 123;
  $situacao = "ENVIADO";

  $resultado = pg_query_params(
    $conexao,
    "INSERT INTO ocorrencia
        (descricao, criador, alvo, data_hora, situacao, ot_id)
        VALUES ($1, $2, $3, $4, $5, $6, $7)",
    array($descricao, $criador, $alvo, $date, $situacao, $ot_id)
  );

  if ($resultado) {
    echo 'Ocorrencia Cadastrada';
  } else {
    echo pg_last_error();
  }
}

function removerOcorrencia($conexao, $id)
{
  return pg_query_params($conexao, "DELETE FROM ocorrencia WHERE id = $1;", array((int) $id));
}

function alterarOcorrencia($conexao, $parametro)
{

  $data = new DateTime();
  $ot_id = (int) $parametro['tipo'] ?? 123;
  $date = $parametro['date'] . ' ' . $parametro['horario'] ?? $data->format('Y-m-d H:i:s');
  $descricao = $parametro['descricao'] ?? '123';
  $alvo = $parametro['alvo'] ?? 'alvo';
  $criador = (int) $parametro['criador'] ?? 123;
  $situacao = $parametro['situacao'];
  $id = $parametro['id-alterar'] ?? 123;

  $resultado = pg_query_params($conexao, "UPDATE ocorrencia SET descricao = $1, criador = $2, alvo = $3, data_hora = $4, situacao = $5, ot_id = $6 WHERE id = $7", array($descricao, $criador, $alvo, $date, $situacao, $ot_id, $id));

  return $resultado;
}

function organizaOcorrencias($conexao, $situacao)
{
  $ocorrencias = [];
  $resultado = pg_query($conexao, "SELECT id FROM ocorrencia WHERE situacao = ANY('{{$situacao}}');");
  while ($ocorrencia = pg_fetch_assoc($resultado)) {
    array_push($ocorrencias, $ocorrencia);
  }
  return $ocorrencias;
}
