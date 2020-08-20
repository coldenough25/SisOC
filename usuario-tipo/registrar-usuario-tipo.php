<?php
include("../cabecalho.php");
include("../conecta.php");
include("banco-usuario-tipo.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = strtoupper($_POST['nome']);
  $descricao = $_POST['descricao'];

  $resposta = adicionarTipoUsuario($conexao, $nome, $descricao);
  if (isset($resposta)) {
    header("Location:http://localhost/TCC/SisOC/usuario-tipo/listar-usuario-tipo.php");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<div class="container">
  <div class="row col-md-12">
    <div class="">
      <h1>Registrar novo tipo de usuário</h1>
    </div>
  </div>

  <div class="row col-md-12">
    <div class="">
      <form action="" method="post">
        <div class="row">
          <div class="form-group col-md-12">
            <label for="nome">Nome do tipo</label>
            <input class="form-control" name="nome" id="nome" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao"></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
    </div>
  </div>
</div>

<?php include("../rodape.php"); ?>