<?php

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
  }

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
  }
  function listarAlvos($conexao, $tipo) {
    $alvos = array();
    $resultado = pg_query_params($conexao, "select * from usuario where tipo = $1", array($tipo));
    while($alvo = pg_fetch_assoc($resultado)) {
        array_push($alvos, $alvo);
    }
    return $alvos;
  }

  function removerOcorrencia($conexao, $id){
      return pg_query_params($conexao, "DELETE FROM ocorrencia WHERE id = $1;", array((int) $id));
  }
