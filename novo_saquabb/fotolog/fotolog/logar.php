<?php
$portal = "fotolog/";
$local = $_SERVER['DOCUMENT_ROOT']."/".$fotolog;
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
function imprime_form($error) {
	$form = "<p align='center'><strong>$error</strong></p>
	        <form name='Entrar' action='$pagina' method='post'>
			<table width='70%' height='81' border='0' align='center'>
			  <tr> 
			    <td width='10%'>Login:</td>
			    <td width='90%'><input name='dfLogin' type='text' id='dfLogin'></td>
			  </tr>
			  <tr> 
			    <td>Senha:</td>
			    <td><input name='dfSenha' type='password' id='dfSenha'></td>
			  </tr>
			  <tr> 
			    <td colspan='2'><div align='center'>
			          <input name='pbEntrar' type='submit' id='pbEntrar' value='Entrar'>
			        </div></td>
			  </tr>
			</table>
			</form>";
			echo $form;
	return true;
}
if (isset($_POST["dfLogin"]) && isset($_POST["dfSenha"]) && isset($_POST["pbEntrar"])) {
	$login = strtolower(trim($_POST["dfLogin"]));
	$senha = md5(trim($_POST["dfSenha"]));
	$query = "Select login,senha from usuarios where login='$login' and senha='$senha'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$retorno = mysql_num_rows($resultado);
	if ($retorno>0) {
		session_start();
		$_SESSION["login"] = $login;
		setcookie("login",$login,time()+360000);
		$data = date("Y/n/j H:i:s");
		$query = "Update usuarios set ultimo_login='$data' where login='$login'";
		$resultado = mysql_query($query,$conexao) or die($error_conexao);
		header("Location: index.php");
	} else {
		$erro = "Login/Senha inválidos!";
		imprime_form($erro);
	}
} else {
	$erro = "";
	imprime_form($erro);
}
?>