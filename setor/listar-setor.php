<?php
include("../cabecalho.php");
include("../conecta.php");
include("banco-setor.php");
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>
<div class="container">

  <?php
  if (isset($_GET["removido"]) && $_GET["removido"]) { ?>
    <p class="alert-success">Setor deletado!!!</p>
  <?php } else if (isset($_GET["removido"]) && $_GET["removido"] == false){ ?>
    <p class="alert-danger">Setor não-deletado</p>
  <?php }

  $setores = listarSetor($conexao);

  if (isset($_GET["alterado"]) && $_GET["alterado"]) { ?>
    <p class="alert-success">Setor alterado!!!</p>
  <?php }
  ?>



  <div class="row col-md-12">
    <h1>Lista de Setores de Ocorrência</h1>
  </div>

  <div class="row">
    <div class="row col-md-12">
      <table class="table table-striped table-bordered">
        <tr>
          <th>NOME</th>
          <th>SIGLA</th>
          <th>DELETAR</th>
          <th>ALTERAR</th>
        </tr>
        <?php
        foreach ($setores as $setor) {
        ?>
          <tr>
            <td><?=$setor['nome'] ?></td>
            <td><?=$setor['sigla'] ?></td>
            <td>
              <form action="deletar-setor.php" method="get">
                <input type="hidden" name="id-deletar" value="<?=$setor["id"]?>" />
                <button class="btn btn-danger">REMOVER</button>
              </form>
            </td>
            <td>
              <form action="alterar-setor.php" method="get">
                <input type="hidden" name="id-alterar" value="<?=$setor["id"]?>"/>
                <button class="btn btn-warning">ALTERAR</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>

    </div>
    <div class="row col-md-12">
      <button class="btn btn-primary" onclick="Criar()">Criar Setor</button>
    </div>
  </div>
</div>

<script>
  function Criar() {
    location.href = "./registrar-setor.php";
  }
</script>

<?php include("../rodape.php"); ?>
