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
            <label for="email">Endereço de E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="raSiape">RA/SIAPE</label>
            <input type="number" class="form-control" id="raSiape" name="raSiape" placeholder="RA/SIAPE">
        </div>
        <div class="form-group">
            <label for="data">Data de Nascimento</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Data de Nascimento">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php include("rodape.php"); ?>
