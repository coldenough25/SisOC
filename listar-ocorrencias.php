<?php include("cabecalho.php"); ?>

<div class="container">
    <div class="row" style="margin-top: 10px; text-align: center;">
      <div class="col-md-12"><button class="btn btn-primary" onclick="Criar()">Criar Ocorrência</button></div>
      <!-- <div class="col-md-3"><button class="btn btn-primary" onclick="Alterar()">Alterar Ocorrência</button></div>
      <div class="col-md-3"><button class="btn btn-primary" onclick="Visualizar()">Visualizar Ocorrência</button></div>
      <div class="col-md-3"><button class="btn btn-primary" onclick="Excluir()">Excluir Ocorrência</button></div> -->
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="itens">
        <thead>
          <tr>
            <th>Criador</th>
            <th>RA/Siape</th>
            <th>Data Registro</th>
            <th>Alvo</th>
            <th>Status</th>
            <th>Setor</th>
            <th>PDF</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Aluno 1</td>
            <td>016989</td>
            <td>19/02/2018 13:39</td>
            <td>Infraestrutura</td>
            <td>***</td>
            <td>***</td>
            <td>
              <button type="button" class="limpo">
                <span class="glyphicon glyphicon-download-alt"></span>
              </button>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function Criar() {
      location.href = "/TCC/registrar-ocorrencia.php";
    }
  </script>

<?php include("rodape.php"); ?>