<?php
include("../cabecalho.php");
include("../conecta.php");
include("banco-usuario.php");


$id = $_GET["id-alterar"];
$usuarios = mostrarUsuario($conexao, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $ra_siape = $_POST["ra_siape"];
  $email = $_POST["email"];
  $senha = md5($_POST["senha"]);
  $tipo = $_POST["tipo"];

  $resposta = alterarUsuario($conexao, $nome, $ra_siape, $email, $senha, $tipo, $id);
  if (isset($resposta) && $resposta != false) {
    header("Location:http://localhost/TCC/SisOC/usuario/listar-usuario.php?alterado=true");
  }
}

include("../menu2.php");
?>

<?php foreach ($usuarios as $usuario) : ?>



  <div>
    <form action="" method="post" class="col-sm-12">
      
    <div class="row col-sm-12">
        <h1>Alterar usuário</h1>
      </div>

      <div class="form-group col-sm-6">
        <label for="nome">Nome do usuário</label>
        <input class="form-control" name="nome" id="nome" value="<?= $usuario["nome"] ?>" />
      </div>

      <div class="form-group col-sm-3">
        <label for="nome">Tipo do usuário</label>
        <input class="form-control" name="tipo" id="tipo" value="<?= $usuario["tipo"] ?>" />
      </div>

      <div class="form-group col-sm-3">
        <label for="nome">RA/Siape</label>
        <input class="form-control" name="ra_siape" id="ra_siape" value="<?= $usuario["ra_siape"] ?>" />
      </div>

      <div class="form-group col-sm-12">
        <label for="nome">E-mail</label>
        <input class="form-control" name="email" id="email" value="<?= $usuario["email"] ?>" />
      </div>

      <div class="form-group col-sm-12">
        <label for="nome">Senha</label>
        <input class="form-control" name="senha" id="senha" type="password" placeholder="Digite sua senha..." />
      </div>

      <div class="form-group col-sm-12">
        <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>
      </div>
    </form>
  </div>
<?php endforeach; ?>

<?php include("../rodape.php"); ?>