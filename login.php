<!DOCTYPE html>
<?php
include("cabecalho.php");
include("conecta.php");
?>
<h1>Efetuar Login</h1>
<div class="login-table d-flex justify-content-center">
	<form action="efetua-login.php" method="post">
		<table>
			<tr>
				<td>Login:</td>
				<td><input class="form-control" type="text" name="user" /><br></td>
			</tr>
			<tr>
				<td>Senha:</td>
				<td><input class="form-control" type="password" name="password" /><br></td>
			</tr>
			<br>
			<tr>
				<td colspan="2"><input class="btn btn-primary" type="submit" value="Login" /></td>
			</tr>
		</table>

	</form>
</div>
<?php include("rodape.php"); ?>