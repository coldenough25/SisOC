<?php
include("cabecalho.php");
include("menu.php");
include("conecta.php");
include("banco-ocorrencia.php");
?>

<div class="container">
    <div class="row" style="margin-top: 10px; text-align: center;">
      <div class="col-md-12"><button class="btn btn-primary" onclick="Criar()">Criar Ocorrência</button></div>
      <!-- <div class="col-md-3"><button class="btn btn-primary" onclick="Alterar()">Alterar Ocorrência</button></div>
      <div class="col-md-3"><button class="btn btn-primary" onclick="Visualizar()">Visualizar Ocorrência</button></div>
      <div class="col-md-3"><button class="btn btn-primary" onclick="Excluir()">Excluir Ocorrência</button></div> -->
    </div>
    <div class="row">
      <!-- <?php var_dump(listaOcorrencias($conexao)); ?> -->
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="itens">
        <thead>
          <tr>
            <th>Criador</th>
            <th>RA/Siape</th>
            <th>Data Registro</th>
            <th>Alvo</th>
            <th>Situação</th>
            <th>Setor</th>
            <th>PDF</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
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
          </tr> -->
        </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function Criar() {
      location.href = "./registrar-ocorrencia.php";
    }
  </script>

<?php include("rodape.php"); ?>
