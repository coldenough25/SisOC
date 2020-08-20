<?php
require("../cabecalho.php");
require("../conecta.php");
require("banco-usuario-tipo.php");

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

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<?php foreach ($tipos as $tipo) { ?>

  <div class="row col-md-12">
    <div class="">
      <h1>Alterar tipo de usuário</h1>
    </div>
  </div>
  <div class="row col-md-12">
    <form action="" method="post">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nome">Nome do tipo</label>
          <input class="form-control" name="nome" id="nome" value="<?= $tipo["nome"] ?>" />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" name="descricao" id="descricao"><?= $tipo["descricao"] ?></textarea>
        </div>
      </div>
      <div class="row">
        <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>
      </div>
    </form>
  </div>
<?php } ?>


<?php include("../rodape.php"); ?>