<!DOCTYPE html>
<?php
    include("cabecalho.php");
    #include("conecta.php");
?>
<head>
    <link rel="stylesheet" href="css/login.css">
</head>

<div class="content">
    <h1>Efetuar Login</h1>
    <form action="efetua-login.php" method="post">
        <div class="form-group">
            <label for="email">Endereço de email</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="passwd">Senha</label>
            <input type="password" class="form-control" id="passwd" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php include("rodape.php"); ?>
