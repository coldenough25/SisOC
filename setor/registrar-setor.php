<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-setor.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $sigla = $_POST["sigla"];
  $email = $_POST["email"];

  $resposta = adicionarSetor($conexao, $nome, $sigla, $email);
  if(isset($resposta)){
    header("Location: /setor/listar-setor.php");
  }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Registrar novo setor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input required class="form-control" name="nome" id="nome"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome">Sigla</label>
                        <input required class="form-control" name="sigla" id="sigla"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nome">E-mail</label>
                        <input required class="form-control" name="email" id="email" type="email" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>
</div>

<?php include("../rodape.php"); ?>
