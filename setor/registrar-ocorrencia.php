<?php
include("conecta.php");
include("banco-ocorrencia.php");
include("cabecalho.php");
include("menu.php");

$tipolista = listarTipos($conexao);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $alvo = $_POST['alvo'];
  $ot = $_POST['tipo'];
  $data = $_POST['date'];
  $hora = $_POST['horario'];
  $descricao = $_POST['descricao'];

  $resposta = incluirOcorrencia($conexao, $descricao);
}
?>

<div class="row col-md-12">
  <div class="">
    <h1>Registrar nova ocorrência</h1>
  </div>
</div>
<div class="row col-md-12">
  <div class="">
    <form action="" method="post">
      <div class="row">
        <!-- <div class="form-group col-md-12">
          <label for="alvo">Alvo</label>
          <input class="form-control" name="alvo" id="alvo" required>
        </div> -->
        <div class="form-group col-md-12">
          <label for="tipo">Tipo de alvo</label>
          <select class="form-control" id="tipoalvo" name="tipoalvo" required>
            <option value="A">ALUNO</option>
            <option value="S">SERVIDOR</option>
            <option value="T">TERCEIRIZADO</option>
            <option value="O">OUTRO</option>
          </select>
        </div>
        <div id="alvoDiv"></div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="setor">Tipo da Ocorrência</label>
          <select required name="tipo" class="form-control" id="setor">
            <option value="">Selecione...</option>
            <option value="1">Infraestrutura</option>
            <option value="2">Desentendimento</option>
            <option value="3">Mau-uso do ambiente</option>
            <label for="tipo">Tipo</label>
            <select required name="tipo" class="form-control" id="tipo">
              <option value="">Selecione...</option>
              <?php foreach ($tipolista as $tipo) { ?>
                <option value="<?= $tipo['id_ocorrencia_tipo'] ?>"><?= $tipo['descricao'] ?></option>
              <?php } ?>
            </select>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="descricao">Data do acontecimento</label>
          <div class="input-group date">
            <input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text" required />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="horario">Horário do acontecimento</label>
          <input class="form-control" type="time" id="horario" name="horario" required>
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

<script>
  function selectChange(event) {
    let val = event.target.value;
    $("#alvoDiv").empty();
    if (val === 'O') {
      $("#alvoDiv").append(`<div class="form-group col-md-12">
        <label for="alvo">Alvo</label>
        <input class="form-control" name="alvo" id="alvo">
      </div>`);
    } else {
      $.get(`get-alvos.php?tipo=${val}`, function(data) {
        data = JSON.parse(data);
        const options = data.reduce(function(prev, info) {
          return `${prev}<option value="${info.id_usuario}">${info.nome}</option>`
        }, '');
        $("#alvoDiv").append(`<div class="form-group col-md-12">
        <label for="alvo">Alvo</label>
        <select class="form-control" name="alvo" id="alvo">
            ${options}
        </select>
        </div>`);
        $("#alvo").chosen();
      })
    }
  }

  function pageLoad() {
    let val = $("#tipoalvo").val();
    $("#alvoDiv").empty();
    if (val === 'O') {
      $("#alvoDiv").append(`<div class="form-group col-md-12">
        <label for="alvo">Alvo</label>
        <input class="form-control" name="alvo" id="alvo">
      </div>`);
    } else {
      $.get(`get-alvos.php?tipo=${val}`, function(data) {
        data = JSON.parse(data);
        const options = data.reduce(function(prev, info) {
          return `${prev}<option value="${info.id_usuario}">${info.nome}</option>`
        }, '');
        $("#alvoDiv").append(`<div class="form-group col-md-12">
          <label for="alvo">Alvo</label>
          <select class="form-control" name="alvo" id="alvo">
              ${options}
          </select>
          </div>`);
        $("#alvo").chosen();
      })
    }
  }
  document.querySelector("#tipoalvo").addEventListener('change', selectChange)
  $(document).ready(function() {
    pageLoad();
    $("#date").mask("99/99/9999");
  })
</script>

<?php include("rodape.php"); ?>