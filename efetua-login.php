<?php include("cabecalho.php") ?>
<?php include("conecta.php"); ?>
<?php include("banco-login.php"); ?>

<?php
$email = $_POST["email"];
$data = $_POST["data"];
$raSiape = $_POST["raSiape"];

$resultado = verificarLogin($conexao, $email, $data, $raSiape);
$resultado = true;
?>


<?php if ($resultado) { ?>
    <p class="alert-success">Usuário logado com sucesso! Bem vindo </p>
    <a href="index.php">
        <div class="btn btn-primary">Início</div>
    </a>
<?php } else { ?>
    <p class="alert-danger">Usuário ou senha incorretos</p>
    <a href="login.php">
        <div class="btn btn-primary">Retornar</div>
    </a>
<?php
}
mysqli_close($conexao); ?>
<?php include("rodape.php"); ?>

<?php include("rodape.php") ?>