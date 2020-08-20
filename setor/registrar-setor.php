<?php
include("../cabecalho.php");
include("../conecta.php");
include("banco-setor.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $sigla = strtoupper($_POST["sigla"]);
  $email = $_POST["email"];

  $resposta = adicionarSetor($conexao, $nome, $sigla, $email);
  if(isset($resposta)){
    header("Location:http://localhost/TCC/SisOC/setor/listar-setor.php");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<div class="row col-md-12">
  <div class="">
    <h1>Registrar novo setor</h1>
  </div>
</div>

<div class="row col-md-12">
  <div class="">
    <form action="" method="post">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nome">Nome</label>
          <input class="form-control" name="nome" id="nome"/>
        </div>

        <div class="form-group col-md-6">
          <label for="nome">Sigla</label>
          <input class="form-control" name="sigla" id="sigla"/>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
          <label for="nome">E-mail</label>
          <input class="form-control" name="email" id="email" />
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Criar</button>
    </form>
  </div>
</div>

<?php include("../rodape.php"); ?>
