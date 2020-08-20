<?php
include("../cabecalho.php");
include("../conecta.php");
include("./banco-usuario.php");
include("../menu2.php");
include("../usuario-tipo/banco-tipo-usuario.php");

$tiposUsuario = listaTipoUsuario($conexao);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $ra_siape = $_POST["ra_siape"];
  $email = $_POST["email"];
  $tipo = $_POST["tipoUsuario"];

  $resposta = adicionarUsuario($conexao, $nome, $ra_siape, $email, $tipo);
  if(isset($resposta)){
    header("Location: /usuario/listar-usuario.php");
  }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Registrar novo usuário</h1>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome do usuário</label>
                        <input class="form-control" name="nome" id="nome"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipoUsuario">Tipo do usuário</label>
                        <select required name="tipoUsuario" class="form-control" id="tipoUsuario">
                            <option value="">Selecione...</option>
                            <?php foreach ($tiposUsuario as $tipo) { ?>
                                <option value="<?= $tipo['id'] ?>"><?= $tipo['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nome">RA/Siape</label>
                        <input class="form-control" name="ra_siape" id="ra_siape"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nome">E-mail</label>
                        <input class="form-control" name="email" id="email"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>


</div>
<?php include("../rodape.php"); ?>
