<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-usuario.php");
?>

<div class="container">

  <?php
  if (isset($_GET["removido"]) && $_GET["removido"]) { ?>
    <p class="alert-success">Usuário deletado!!!</p>
  <?php } else if (isset($_GET["removido"]) && $_GET["removido"] == false){ ?>
    <p class="alert-danger">Usuário não-deletado</p>
  <?php }

  $usuarios = listarUsuario($conexao);

  if (isset($_GET["alterado"]) && $_GET["alterado"]) { ?>
    <p class="alert-success">Usuário alterado!!!</p>
  <?php }
  ?>

<div class="container">
    <div class="row col-md-12">
        <h1>Lista de Usuários</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="Criar()">Criar Tipo</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>NOME</th>
                    <th>RA/SIAPE</th>
                    <th>TIPO</th>
                    <th>DELETAR</th>
                    <th>ALTERAR</th>
                </tr>
                <?php
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?=$usuario['nome'] ?></td>
                        <td><?=$usuario['ra_siape'] ?></td>
                        <td><?=$usuario['tipo'] ?></td>
                        <td>
                            <form action="deletar-usuario.php" method="get">
                                <input type="hidden" name="id-deletar" value="<?=$usuario["id"]?>" />
                                <button class="btn btn-danger">REMOVER</button>
                            </form>
                        </td>
                        <td>
                            <form action="alterar-usuario.php" method="get">
                                <input type="hidden" name="id-alterar" value="<?=$usuario["id"]?>"/>
                                <button class="btn btn-warning">ALTERAR</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>

    </div>
</div>



</div>

<script>
  function Criar() {
    location.href = "./registrar-usuario.php";
  }
</script>

<?php include("../rodape.php"); ?>
