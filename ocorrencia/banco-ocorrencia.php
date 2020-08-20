<?php
<<<<<<< HEAD
function listarOcorrencia($conexao)
{

  $tipo_ocorrencias = array();
  $resultado = pg_query(
    $conexao,
    "SELECT ot.id, ot.nome, ot.descricao, s.sigla 
  FROM ocorrencia_tipo AS ot 
  INNER JOIN setor AS s ON ot.id_setor = s.id"
  );
  while ($ocorrencia = pg_fetch_assoc($resultado)) {
    array_push($tipo_ocorrencias, $ocorrencia);
=======

  function listaOcorrencias($conexao) {
    $ocorrencias = [];
    $resultado = pg_query($conexao, "
                select oc.id, oc.descricao, oc.alvo ,oc.data_hora as data, oc.situacao as situacao,
                us.nome as criador, us.ra_siape as ra,
                st.nome as setor
                    from ocorrencia oc
                    JOIN usuario us on oc.criador = us.id
                    join ocorrencia_tipo oct on oc.ot_id = oct.id
                    join setor st on oct.id_setor = st.id
                ");
    if (!$resultado){
        echo pg_last_error();
    }
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($ocorrencias, $ocorrencia);
    }
    return $ocorrencias;
>>>>>>> 36005498dc628262ffe7c1f9415fd56630c2645a
  }
  return $tipo_ocorrencias;
}


<<<<<<< HEAD
function adicionarOcorrencia($conexao, $nome, $setor, $descricao)
{
  $lista_id = array();
  $id_setor = pg_query_params(
    $conexao,
    "SELECT * FROM setor WHERE sigla = $1",
    array($setor)
  );

  while ($resultado = pg_fetch_assoc($id_setor)) {
    array_push($lista_id, $resultado);
  }

  $resultado = pg_query_params(
    $conexao,
    "INSERT INTO ocorrencia_tipo (nome, descricao, id_setor) VALUES ($1, $2, $3)",
    array($nome, $descricao, reset($lista_id[0]))
  );
  return $resultado;
}

function removerOcorrencia($conexao, $id)
{
  $int_id = (int) $id;
  $resultado = pg_query_params(
    $conexao,
    "DELETE FROM ocorrencia_tipo WHERE id = $1;",
    array($int_id)
  );
  return $resultado;
}

function mostrarOcorrencia($conexao, $id)
{
  $tipo_ocorrencias = array();
  $resultado = pg_query_params(
    $conexao,
    "SELECT ot.id, ot.nome, ot.descricao, s.sigla 
    FROM ocorrencia_tipo AS ot INNER JOIN setor AS s ON ot.id_setor = s.id 
    WHERE ot.id = $1",
    array($id)
  );
  while ($ocorrencia = pg_fetch_assoc($resultado)) {
    array_push($tipo_ocorrencias, $ocorrencia);
=======
  function adicionaOcorrencias($conexao,$parametro) {

    $data = new DateTime();
    $ot_id = (int)$parametro['tipo'] ?? 123;
    $date = $parametro['date'].' '.$parametro['horario'] ?? $data->format('Y-m-d H:i:s');
    $descricao = $parametro['descricao'] ?? '123';
    $alvo = $parametro['alvo'] ?? 'alvo';
    $dominio = (int)$parametro['dominio'] ?? 123;
    $criador = 11;

    $resultado = pg_query_params($conexao, "INSERT INTO ocorrencia
        (descricao,dominio,criador,alvo,data_hora,situacao,ot_id)
        VALUES ($1, $2, $3, $4, $5, $6, $7)",
        array($descricao,$dominio,$criador,$alvo,$date,$descricao,$ot_id));

    if($resultado){
        echo 'Ocorrencia Cadastrado';
    }else{
        echo pg_last_error();
    }
  }

  function listarTipos($conexao) {
      $tipos = [];
      $resultado = pg_query($conexao, "select * from ocorrencia_tipo");

      while($tipo = pg_fetch_assoc($resultado)) {
        array_push($tipos, $tipo);
      }
      if (!$resultado){
          echo preg_last_error();
      }
      return $tipos;
>>>>>>> 36005498dc628262ffe7c1f9415fd56630c2645a
  }
  return $tipo_ocorrencias;
}

function alterarOcorrencia($conexao, $nome, $descricao, $id, $nome_tipo_ocorrencia)
{
  $lista_id = array();
  $id_tipo_ocorrencia = pg_query_params(
    $conexao,
    "SELECT id FROM ocorrencia_tipo WHERE nome = $1",
    array($nome_tipo_ocorrencia)
  );

  while ($resultado = pg_fetch_assoc($id_tipo_ocorrencia)) {
    array_push($lista_id, $resultado);
  }

<<<<<<< HEAD
  $resultado = pg_query_params(
    $conexao,
    "UPDATE ocorrencia SET nome = $1, descricao = $2, id_setor = $3 
    WHERE id = $4",
    array($nome, $descricao, reset($lista_id[0]), $id)
  );
  return $resultado;
}
=======
  function removerOcorrencia($conexao, $id){
      return pg_query_params($conexao, "DELETE FROM ocorrencia WHERE id = $1;", array((int) $id));
  }
>>>>>>> 36005498dc628262ffe7c1f9415fd56630c2645a
