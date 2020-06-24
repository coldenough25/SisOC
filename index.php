<?php include("cabecalho.php"); ?>
<?php include("banco-login.php"); ?>

<script>
    function mudarTela() {
        location.href = "./listar-ocorrencias.php";
    }
</script>

<?php
function verificaTipoOcorrenciaClick($tipo)
{
    if ($tipo == 1) {
        $sql = "SELECT * FROM ocorrencia WHERE situacao = LOWER('recebida')";
        echo($sql);
    }
    if ($tipo == 2) {
        $sql = "SELECT * FROM ocorrencia WHERE situacao = LOWER('enviada')";
        echo($sql);
    }
    if ($tipo == 3) {
        $sql = "SELECT * FROM ocorrencia WHERE situacao = LOWER('visualizada')";
        echo($sql);
    }
    if ($tipo == 4) {
        $sql = "SELECT * FROM ocorrencia WHERE situacao = LOWER('finalizada')";
        echo($sql);
    }
}

?>

<head>
    <link rel="stylesheet" href="css/index.css">
</head>

<div id="welcome" class="col-md-12">
    <h1 class="head">Bem vindo ao SisOC!</h1>
    <div id="box-div" class="col-md-12">
        <div id="occurencies-boxes" class="col-md-3">
            <h4>Ocorrências recebidas: 0</h4>
            <button type="button" onclick="verificaTipoOcorrenciaClick(1), mudarTela()" class="btn btn-primary">Acessar</button>
        </div>
        <div id="occurencies-boxes" class="col-md-3">
            <h4>Ocorrências enviadas: 0</h4>
            <button type="button" onclick="verificaTipoOcorrenciaClick(2), mudarTela()" class="btn btn-primary">Acessar</button>
        </div>
        <div id="occurencies-boxes" class="col-md-3">
            <h4>Ocorrências visualizadas: 0</h4>
            <button type="button" onclick="verificaTipoOcorrenciaClick(3), mudarTela()" class="btn btn-primary">Acessar</button>
        </div>
        <div id="occurencies-boxes" class="col-md-3">
            <h4>Ocorrências finalizadas: 0</h4>
            <button type="button" onclick="verificaTipoOcorrenciaClick(4), mudarTela()" class="btn btn-primary">Acessar</button>
        </div>
    </div>
</div>



<?php include("rodape.php"); ?>