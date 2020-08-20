<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-usuario.php"); ?>
<?php

$id = $_GET["id-alterar"];
$usuarios = mostrarUsuario($conexao, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $ra_siape = $_POST["ra_siape"];
  $email = $_POST["email"];
  $tipo = $_POST["tipo"];

  $resposta = alterarUsuario($conexao, $nome, $ra_siape, $email, $tipo, $id);
  if (isset($resposta) && $resposta != false) {
    header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?alterado=true");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<?php foreach ($usuarios as $usuario) { ?>
  <div class="container">
    <div class="row col-md-12">
      <div class="">
        <h1>Alterar usuário</h1>
      </div>
    </div>
    <div class="row col-md-12">
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

        <div class="row">
          <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php include("../rodape.php"); ?>
