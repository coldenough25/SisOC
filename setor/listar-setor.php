<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-setor.php");

$setores = listarSetor($conexao);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Setores de Ocorrência</h1>
        </div>
    </div>

    <?php if (isset($_GET["removido"]) && $_GET["removido"]) : ?>
        <div class="alert alert-success" role="alert">
            Setor deletado!!!
        </div>
    <?php  elseif (isset($_GET["removido"]) && $_GET["removido"] == false): ?>
        <div class="alert alert-danger" role="alert">
            Não foi possivel deletar o setor!!!
        </div>
    <?php endif;

    if (isset($_GET["alterado"]) && $_GET["alterado"]) : ?>
        <div class="alert alert-success" role="alert">
            Setor alterado!!!
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="Criar()">Criar Setor</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <tr>
                  <th width="25%">NOME</th>
                  <th width="25%">SIGLA</th>
                  <th width="25%">EMAIL</th>
                  <th>OPÇÕES</th>
                </tr>
            <?php foreach ($setores as $setor) { ?>
                <tr>
                    <td><?= $setor['nome'] ?></td>
                    <td><?= $setor['sigla'] ?></td>
                    <td><?= $setor['email'] ?></td>
                    <td>
                          <div class="row">
                              <div class="col-md-6">
                                  <form action="deletar-setor.php" method="get" class="form-inline ">
                                      <input type="hidden" name="id-deletar" value="<?= $setor["id"]?>" />
                                      <button class="btn btn-danger">REMOVER</button>
                                  </form>
                              </div>
                              <div class="col-md-6">
                                  <form action="alterar-setor.php" method="get" class="form-inline ">
                                      <input type="hidden" name="id-alterar" value="<?= $setor["id"]?>"/>
                                      <button class="btn btn-warning">ALTERAR</button>
                                  </form>
                              </div>
                          </div>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>

<script>
  function Criar() {
    location.href = "./registrar-setor.php";
  }
</script>

<?php include("../rodape.php"); ?>
