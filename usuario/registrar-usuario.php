<?php
include("../cabecalho.php");
include("../conecta.php");
include("../menu2.php");
include("banco-usuario.php");
include("../usuario-tipo/banco-usuario-tipo.php");

$tiposUsuario = listarTipoUsuario($conexao);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ra_siape = $_POST["ra_siape"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $tipo = $_POST["tipoUsuario"];

    $resposta = adicionarUsuario($conexao, $nome, $ra_siape, $email, $senha, $tipo);
    if (isset($resposta)) {
        header("Location: /usuario/listar-usuario.php");
    }
}
?>



<div class="col-md-12">
    <div class="col-md-12">
        <h1>Registrar novo usuário</h1>
    </div>
    <form action="" method="post">
        <div class="form-group col-md-6">
            <label for="nome">Nome do usuário</label>
            <input class="form-control" name="nome" id="nome" />
        </div>

        <div class="form-group col-md-3">
            <label for="tipoUsuario">Tipo do usuário</label>
            <select required name="tipoUsuario" class="form-control" id="tipoUsuario">
                <option value="">Selecione...</option>
                <?php foreach ($tiposUsuario as $tipo) : ?>
                    <option value="<?= $tipo['id'] ?>"><?= $tipo['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="nome">RA/Siape</label>
            <input class="form-control" name="ra_siape" id="ra_siape" />
        </div>



        <div class="form-group col-md-12">
            <label for="nome">E-mail</label>
            <input class="form-control" name="email" id="email" />
        </div>

        <div class="form-group col-md-12">
            <label for="nome">Senha</label>
            <input class="form-control" name="senha" id="email" type="password" />
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>



</div>
<?php include("../rodape.php"); ?>