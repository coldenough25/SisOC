<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-ocorrencia-tipo.php");
include ("../setor/banco-setor.php");

$setores = listarSetor($conexao);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $setor = strtoupper($_POST['setor']);

  $resposta = adicionarTipoOcorrencia($conexao, $nome, $setor, $descricao);
  if(isset($resposta)){
    header("/ocorrencia-tipo/listar-ocorrencia-tipo.php");
  }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h1>Registrar novo tipo de ocorrência</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome do tipo</label>
                        <input class="form-control" name="nome" id="nome" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nome">Nome do setor</label>
                        <select name="setor" id="" class="form-control">
                            <?php foreach ($setores as $setor):?>
                                <option value="<?= $setor['id']?>"><?= $setor['nome']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>

</div>

<?php include("../rodape.php"); ?>
