<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-ocorrencia.php");

$ocorencias = listaOcorrenciasUsuarios($conexao);

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de Ocorrência</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-md-3"><button class="btn btn-primary" onclick="Criar()">Criar Ocorrência</button></div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="itens">
        <thead>
          <tr>
            <th>id</th>
            <th>Criador</th>
            <th>RA/Siape</th>
            <th>Data Registro</th>
            <th>Alvo</th>
            <th>Situação</th>
            <th>Setor</th>
            <th>PDF</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ocorencias as $ocorencia): ?>
        <tr>
            <td><?= $ocorencia['id']?></td>
            <td><?= $ocorencia['criador']?></td>
            <td></td>
            <td><?= $ocorencia['data_hora']->format('d/m/Y H:i:s')?></td>
            <td><?= $ocorencia['ot_id']?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function Criar() {
      location.href = "./registrar-ocorrencia.php";
    }
  </script>

<?php include("rodape.php"); ?>
