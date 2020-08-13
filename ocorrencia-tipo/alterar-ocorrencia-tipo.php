<?php include("../cabecalho.php"); ?>
<?php include("../conecta.php"); ?>
<?php include("banco-ocorrencia-tipo.php"); ?>
<?php

$id = $_GET["id-alterar"];
$tipos = mostrarTipoOcorrencia($conexao, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $setor = strtoupper($_POST["setor"]);

  $resposta = alterarTipoOcorrencia($conexao, $nome, $setor, $descricao, $id);
  if (isset($resposta) && $resposta != false) {
    header("Location:http://localhost/TCC/SisOC/ocorrencia-tipo/listar-ocorrencia-tipo.php?alterado=true");
  }
}
?>

<head>
  <link rel="stylesheet" href="../css/global.css">
</head>

<?php foreach ($tipos as $tipo) { ?>
  <div class="container">
    <div class="row col-md-12">
      <div class="">
        <h1>Alterar tipo de ocorrência</h1>
      </div>
    </div>
    <div class="row col-md-12">
      <form action="" method="post">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="nome">Nome do tipo</label>
            <input class="form-control" name="nome" id="nome" value="<?=$tipo["nome"]?>" />
          </div>

          <div class="form-group col-md-6">
            <label for="nome">Nome do setor</label>
            <input class="form-control" name="setor" id="setor" value="<?=$tipo["sigla"]?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-12">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao"><?=$tipo["descricao"]?></textarea>
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