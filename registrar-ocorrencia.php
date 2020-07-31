<?php include("cabecalho.php"); ?>

<div class="row col-md-12">
  <div class="">
    <h1>Registrar nova ocorrência</h1>
  </div>
</div>
<div class="row col-md-12">
  <div class="">
    <form action="" method="post">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="alvo">Alvo</label>
          <input class="form-control" name="alvo" id="alvo" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="setor">Tipo da Ocorrência</label>
          <select required name="tipo" class="form-control" id="setor">
            <option value="">Selecione...</option>
            <option value="1">Infraestrutura</option>
            <option value="2">Desentendimento</option>
            <option value="3">Mau-uso do ambiente</option>
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
  $(document).ready(function() {
    var date_input = $('input[name="date"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
      format: 'dd/mm/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
  })
</script>

<?php include("rodape.php"); ?>