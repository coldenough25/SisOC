<!DOCTYPE html>
<?php 
    include("cabecalho.php");
    include("conecta.php");
?>
        <h1>Efetuar Login</h1>
		<form action="efetua-login.php" method="post">
			<table>
				<tr>
					<td>Login:</td>
					<td><input class="form-control" type="text" name="nome"/><br></td>
				</tr>
				<tr>
					<td>Senha:</td>
					<td><input class="form-control" type="password" name="preco"/><br></td>
				</tr>
			</table>
			<br>
			<input class="btn btn-primary" type="submit" value="Login"/></td>
        </form>
<?php include("rodape.php"); ?>