<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-ocorrencia.php");

$situacao = $_GET['situacao'];
$ocorencias = listaOcorrencias($conexao, $situacao);

?>


<div class="container">

  <div class="col-sm-12">
    <h1>Lista de Ocorrência</h1>
  </div>


  <div class="col-sm-3"><button class="btn btn-primary" onclick="Criar()">Criar Ocorrência</button></div>

  <br>

  <div class="col-sm-12">
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
          <th>Alterar</th>
          <th>PDF</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ocorencias as $ocorencia) : ?>
          <tr>
            <td><?= $ocorencia['id'] ?></td>
            <td><?= $ocorencia['criador'] ?></td>
            <td><?= $ocorencia['ra'] ?></td>
            <td><?= $ocorencia['data'] ?></td>
            <td><?= $ocorencia['alvo'] ?></td>
            <td><?= $ocorencia['situacao'] ?></td>
            <td><?= $ocorencia['setor'] ?></td>
            <td>
              <form action="alterar-ocorrencia.php" method="get">
                <input type="hidden" name="id-alterar" value="<?= $ocorencia['id'] ?>" />
                <button class="btn btn-warning">ALTERAR</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function Criar() {
    location.href = "./registrar-ocorrencia.php";
  }
</script>

<?php include("../rodape.php"); ?>