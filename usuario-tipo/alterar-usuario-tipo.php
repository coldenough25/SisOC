<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-usuario-tipo.php");

$id = $_GET["id-alterar"];
$tipos = mostrarTipoUsuario($conexao, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = strtoupper($_POST["nome"]);
  $descricao = $_POST["descricao"];

  $resposta = alterarTipoUsuario($conexao, $nome, $descricao, $id);
  if (isset($resposta) && $resposta != false) {
    header("Location:http://localhost/TCC/SisOC/usuario-tipo/listar-usuario-tipo.php?alterado=true");
  }
}
?>

<?php foreach ($tipos as $tipo) { ?>

  <div class="row col-sm-12">
      <h1>Alterar tipo de usuário</h1>
  </div>
  <div class="row col-sm-12">
    <form action="" method="post" class="col-sm-12">
      <div class="form-group col-sm-12">
        <label for="nome">Nome do tipo</label>
        <input class="form-control" name="nome" id="nome" value="<?= $tipo["nome"] ?>" />
      </div>
      <div class="form-group col-sm-12">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao"><?= $tipo["descricao"] ?></textarea>
      </div>


      <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>

    </form>
  </div>
<?php } ?>


<?php include("../rodape.php"); ?>