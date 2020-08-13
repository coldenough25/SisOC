<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-setor.php"); ?>
<?php

$id = $_GET["id-alterar"];
$setores = mostrarSetor($conexao, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $sigla = $_POST["sigla"];
  $email = $_POST["email"];

  $resposta = alterarSetor($conexao, $nome, $sigla, $email, $id);
  if (isset($resposta) && $resposta != false) {
    header("Location:http://localhost/TCC/SisOC/setor/listar-setor.php?alterado=true");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<?php foreach ($setores as $setor) { ?>
  <div class="container">
    <div class="row col-md-12">
      <div class="">
        <h1>Alterar setor</h1>
      </div>
    </div>
    <div class="row col-md-12">
      <form action="" method="post">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" id="nome" value="<?=$setor["nome"]?>" />
          </div>

          <div class="form-group col-md-6">
            <label for="nome">Sigla</label>
            <input class="form-control" name="sigla" id="sigla" value="<?=$setor["sigla"]?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-12">
            <label for="nome">E-mail</label>
            <input class="form-control" name="email" id="email" value="<?=$setor["email"]?>" />
          </div>
        </div>


        <div class="row">
          <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>


<?php include("../rodape.php"); ?>
