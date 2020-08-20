<?php
require("cabecalho.php");
require("menu.php");
?>

<div id="welcome" class="col-md-12">
    <h1 class="head">Bem vindo ao SisOC!</h1>
    <div id="box-div" class="col-md-12">
        <div class="col-md-3 occurencies-boxes">
            <h4>Ocorrências recebidas</h4>
            <span>0</span>
        </div>
        <div class="col-md-3 occurencies-boxes">
            <h4>Ocorrências enviadas</h4>
            <span>0</span>
        </div>
        <div class="col-md-3 occurencies-boxes">
            <h4>Ocorrências visualizadas</h4>
            <span>0</span>
        </div>
        <div class="col-md-3 occurencies-boxes">
            <h4>Ocorrências finalizadas</h4>
            <span>0</span>
        </div>
    </div>
</div>

<script>
    const boxes = [...$(".occurencies-boxes")].forEach(box => {

    })
</script>

<?php include("rodape.php"); ?>
