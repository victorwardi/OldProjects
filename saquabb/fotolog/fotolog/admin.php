<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
$pagina = $_SERVER['PHP_SELF'];
function imprime_form($error) {
	$form = "<p align='center'><i>LOGIN ADMINISTRATIVO</i></p>
	<p align='center'><strong>$error</strong></p>
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
if (isset($_COOKIE["administrador"])) {


} else {
if (isset($_POST["dfLogin"]) && isset($_POST["dfSenha"]) && isset($_POST["pbEntrar"])) {
	$senha = md5(trim(strtolower($_POST["dfSenha"])));
	$login = strtolower($_POST["dfLogin"]);
	$query = "Select id,login,senha from administradores where login='$login'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	if ($row=mysql_fetch_array($resultado)) {
		if ($row["login"] == $login && $row["senha"] == $senha) {
			$id = $row["id"];
			$resultado = mysql_query($query,$conexao) or die($error_conexao);
			$retorno = mysql_affected_rows();
			if ($retorno>0) {
				setcookie("administrador",$login,time()*360000);
				$ip = $_SERVER['REMOTE_ADDR'];
				$query = "update administradores set ip='$ip' where id=$id";
				echo "Logado!";
			} else {
				imprime_form("Error de conexão, tente novamente mais tarde!");
			}
		} else {
			imprime_form("Login/Senha Incorretos, IP foi logado!");
		}
	} else {
		$erro = "Login/Senha Incorretos, IP foi logado!";
		imprime_form($erro);
	}
} else {
	$erro = "";
	imprime_form($erro);
}
}
?>