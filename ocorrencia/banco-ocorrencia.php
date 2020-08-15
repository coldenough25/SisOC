<?php
include("../conecta.php");

  function listaOcorrencias($conexao) {
    $ocorrencias = [];
    $resultado = pg_query($conexao, "select * from ocorrencia");
    while ($ocorrencia = pg_fetch_assoc($resultado)) {
      array_push($ocorrencias, $ocorrencia);
    }
    return $ocorrencias;
  }

  function adicionaOcorrencias($parametro) {

        $ot_id = $parametro['tipo'] ?? '123';
        $data_hora =  $parametro['date'].' '.$parametro['horario'] ?? '123';
        $descricao = $parametro['descricao'] ?? '123';
        $alvo = $parametro['alvo'] ?? '123';
        $dominio = $parametro['dominio'] ?? '123';
        $criador = $parametro['criador'] ?? '123';

        $resultado = pg_query($conexao, "insert into ocorrencia
        (descricao,dominio,criador,alvo,data_hora,situacao,ot_id) values
        ('$descricao','$dominio','$criador','$alvo','$data_hora','$ot_id')");
        pg_close($conexao);
        if($resultado){
            echo 'Usuario Cadastrado';
        }else{
            echo 'Usuario não Cadastrado';
        }
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
