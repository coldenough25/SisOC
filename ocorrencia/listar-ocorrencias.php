<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-ocorrencia.php");

$ocorencias = listaOcorrencias($conexao);

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
                <td><?= $ocorencia['ra']?></td>
                <td><?= $ocorencia['data'] ?></td>
                <td><?= $ocorencia['alvo']?></td>
                <td><?= $ocorencia['situacao']?></td>
                <td><?= $ocorencia['setor']?></td>
                <td>
                    <form action="deletar-ocorrencia.php" method="get">
                        <input type="hidden" name="id-deletar" value="<?=$ocorencia["id"]?>" />
                        <button class="btn btn-danger">REMOVER</button>
                    </form>
                </td>
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
