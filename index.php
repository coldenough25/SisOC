<?php
include("cabecalho.php");
include("menu2.php");
include("conecta.php");
include("ocorrencia/banco-ocorrencia.php");

$enviadas = count(organizaOcorrencias($conexao, "RECEBIDAS"));
$visualizadas = count(organizaOcorrencias($conexao, "EM ANÁLISE, VISUALIZADAS, VISUALIZADA, EM TRÂMITE, EM TRAMITE, EM ANALISE"));
$finalizadas = count(organizaOcorrencias($conexao, "FINALIZADAS"));

?>

<div class="container">
    <h1 class="head text-center mt-3">Bem vindo ao SisOC!</h1>
    <div class="row mt-5">
        <div class="col-sm-4">
            <form action="ocorrencia/listar-ocorrencias.php" method="get">
                <input type="hidden" name="situacao" value="enviadas" />
                <button class="btn btn-outline-success">
                    <div class="card-body text-center">
                        <h5 class="card-title">Enviadas</h5>
                    </div>
                    <div class="text-center">
                        <span id="totais"><?= $enviadas ?></span>
                    </div>
                </button>
            </form>
        </div>
        <div class="col-sm-4">
            <form action="ocorrencia/listar-ocorrencias.php" method="get">
                <input type="hidden" name="situacao" value="finalizadas" />
                <button class="btn btn-outline-success">
                    <div class="card-body text-center">
                        <h5 class="card-title">Visualizadas</h5>
                    </div>
                    <div class="text-center">
                        <span id="totais"><?= $visualizadas ?></span>
                    </div>
                </button>
            </form>
        </div>

        <div class="col-sm-4">
            <form action="ocorrencia/listar-ocorrencias.php" method="get">
                <input type="hidden" name="situacao" value="finalizadas" />
                <button class="btn btn-outline-success">
                    <div class="card-body text-center">
                        <h5 class="card-title">Finalizadas</h5>
                    </div>
                    <div class="text-center">
                        <span id="totais"><?= $finalizadas ?></span>
                    </div>
                </button>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php include("rodape.php"); ?>