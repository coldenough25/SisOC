<?php
include("../cabecalho.php");
include("../menu2.php");
include("../conecta.php");
include("banco-tipo-usuario.php");

$tipos = listaTipoUsuario($conexao);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de Tipos de Usuario</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <button class="btn btn-primary" onclick="Criar()">Criar Tipo Usuario</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Opção</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($tipos as $tipo): ?>
            <tr>
                <td> <?= $tipo['id']?></td>
                <td> <?= $tipo['nome']?></td>
                <td> <?= $tipo['descricao']?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function Criar() {
      location.href = "./registrar-tipo-usuario.php";
    }
  </script>

<?php include("rodape.php"); ?>
