<?php
include("../conecta.php");
include("banco-setor.php");
include("../cabecalho.php");
include("../menu.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $sigla = $_POST['sigla'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $resposta = incluirSetor($conexao, $sigla, $nome, $email);
    }
?>

<div class="row col-md-12">
    <h1>Registrar novo setor</h1>
</div>

<div class="row col-md-12">
    <form action="" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="sigla">Sigla</label>
                <input class="form-control" name="sigla" id="sigla" />
            </div>
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input class="form-control" name="nome" id="nome" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="email">E-mail</label>
                <input class="form-control" name="email" id="email" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>

<?php include("../rodape.php"); ?>
