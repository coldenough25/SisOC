<?php include("cabecalho.php") ?>
<?php include("conecta.php"); ?>
<?php include("banco-login.php"); ?>

<?php
$user = $_POST["user"];
$encrypted_password = md5($_POST["password"]);

$resultado = verificarLogin($conexao, $user, $encrypted_password);

?>


<?php if ($resultado) { ?>
    <p class="alert-success">Usuário logado com sucesso!</p>
<?php } else { ?>
    <p class="alert-danger">Usuário ou senha incorretos</p>
    <a href="login.php"><div class="btn btn-primary">Retornar</div></a>
<?php
}
mysqli_close($conexao); ?>
<?php include("rodape.php"); ?>

<?php include("rodape.php") ?>