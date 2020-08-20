<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-tipo-usuario.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $resposta = incluirTipoUsuario($conexao, $nome, $descricao);

    if(isset($resposta)){
        header("Location: /usuario-tipo/listar-tipo-usuario.php");
    }
}
?>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h1>Registrar novo Tipo de Usuario</h1>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nome">Nome</label>
                        <input class="form-control" name="nome" id="nome" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <input class="form-control" name="descricao" id="descricao" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php include("rodape.php"); ?>
