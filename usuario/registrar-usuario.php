<?php
include("../cabecalho.php");
include("../conecta.php");
include("banco-usuario.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $ra_siape = $_POST["ra_siape"];
  $email = $_POST["email"];
  $tipo = $_POST["tipo"];

  $resposta = adicionarTipoOcorrencia($conexao, $nome, $ra_siape, $email, $tipo);
  if(isset($resposta)){
    header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<div class="row col-md-12">
  <div class="">
    <h1>Registrar novo usuário</h1>
  </div>
</div>

<div class="row col-md-12">
  <div class="">
    <form action="" method="post">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nome">Nome do usuário</label>
          <input class="form-control" name="nome" id="nome" value="<?=$usuario["nome"]?>" />
        </div>

        <div class="form-group col-md-3">
          <label for="nome">Tipo do usuário</label>
          <input class="form-control" name="tipo" id="tipo" value="<?=$usuario["tipo"]?>" />
        </div>

        <div class="form-group col-md-3">
          <label for="nome">RA/Siape</label>
          <input class="form-control" name="ra_siape" id="ra_siape" value="<?=$usuario["ra_siape"]?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
          <label for="nome">E-mail</label>
          <input class="form-control" name="email" id="email" value="<?=$usuario["email"]?>" />
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Criar</button>
    </form>
  </div>
</div>

<?php include("../rodape.php"); ?>
