<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-usuario-tipo.php");
?>

<div class="container">

  <?php
  if (isset($_GET["removido"]) && $_GET["removido"]) { ?>
    <p class="alert-success">Tipo deletado!!!</p>
  <?php } else if (isset($_GET["removido"]) && $_GET["removido"] == false) { ?>
    <p class="alert-danger">Tipo não-deletado</p>
  <?php }

  $tipos = listarTipoUsuario($conexao);

  if (isset($_GET["alterado"]) && $_GET["alterado"]) { ?>
    <p class="alert-success">Tipo alterado!!!</p>
  <?php }
  ?>



  <div class="row col-md-12">
    <h1>Lista de Tipos de Usuário</h1>
  </div>

  <div class="row">
    <div class="row col-md-12">
      <table class="table table-striped table-bordered">
        <tr>
          <th>NOME</th>
          <th>DESCRIÇÃO</th>
          <th>DELETAR</th>
          <th>ALTERAR</th>
        </tr>
        <?php
        foreach ($tipos as $tipo) {
        ?>
          <tr>
            <td><?= $tipo['nome'] ?></td>
            <td><?= $tipo['descricao'] ?></td>
            <td>
              <form action="deletar-usuario-tipo.php" method="get">
                <input type="hidden" name="id-deletar" value="<?= $tipo["id"] ?>" />
                <button class="btn btn-danger">REMOVER</button>
              </form>
            </td>
            <td>
              <form action="alterar-usuario-tipo.php" method="get">
                <input type="hidden" name="id-alterar" value="<?= $tipo["id"] ?>" />
                <button class="btn btn-warning">ALTERAR</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>

    </div>
    <div class="row col-md-12">
      <button class="btn btn-primary" onclick="Criar()">Criar Tipo</button>
    </div>
  </div>
</div>

<script>
  function Criar() {
    location.href = "./registrar-usuario-tipo.php";
  }
</script>

<?php include("../rodape.php"); ?>