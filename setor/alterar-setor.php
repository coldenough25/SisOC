<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-setor.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $email = $_POST["email"];

    $resposta = alterarSetor($conexao, $nome, $sigla, $email, $id);
    if (isset($resposta) && $resposta != false) {
        header("listar-setor.php");
    }
}

$id = $_GET["id-alterar"];
$setor = current(mostrarSetor($conexao, $id));


?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <h1>Alterar setor</h1>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <input class="form-control" type="hidden" name="id" id="nome" value="<?=$setor["id"]?>" />
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
</div>
<?php include("../rodape.php"); ?>
