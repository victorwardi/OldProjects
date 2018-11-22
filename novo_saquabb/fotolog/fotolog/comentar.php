<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
if (isset($_GET["foto"]) && isset($_GET["autor"])) {
	$id_foto = $_GET["foto"];
	$autor_foto = $_GET["autor"];
	$query = "Select * from tab_fotos where id=$id_foto";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$retorno = mysql_num_rows($resultado);
	if ($retorno>0) {
		mysql_data_seek($resultado,0);
		$row=mysql_fetch_array($resultado);
		$autor_id = $row["id_usuario"];
		$query = "Select login from usuarios where id=$autor_id";
		$resultado = mysql_query($query,$conexao) or die($error_conexao);
		$row=mysql_fetch_array($resultado);
		$temp = $row["login"];
		if ($autor_foto === $temp) {
			if (isset($_SESSION["login"])) {
				$login = $_COOKIE["login"];
				echo "
				<script language='javascript' type='text/javascript'>
				function verificar_dados(form) {
					if (form.comentario.value == '') {
						alert('Preencha o Comentário!');
						form.comentario.focus();
						return false;
					} else {
						return true;
					}
				}
				</script>
				<form name='form1' method='post' action='comentar.php'>
				  <table width='100%' border='0'>
				    <tr>
				      <td colspan='2'>Login: &nbsp;&nbsp;&nbsp;<b>$login</b><i> * Obs: se voc&ecirc; n&atilde;o for esse usu&aacute;rio,</i> 
			        	<a href='logoff.php'>clique Aqui!</a><input type='HIDDEN' name='autor' value='$login'><input type='HIDDEN' name='id_foto' value='$id_foto'></td>
				    </tr>
					    <tr>
				      <td>Coment&aacute;rio: </td>
				      <td><textarea name='comentario' cols='80' rows='4'></textarea></td>
				    </tr>
				    <tr>
				      <td><input name='pbEnviar' type='submit' id='pbEnviar' value='Enviar' onClick='return verificar_dados(this.form)'></td>
				      <td><input name='pbLimpar' type='reset' id='pbLimpar' value='Limpar'></td>
				    </tr>
					<input type='HIDDEN' name='autor_foto' value='$autor_foto'>
				  </table>
				</form>";
			} else {
				header("Location: logar.php");
				echo "Você precisa ser usuário Registrado no Site para enviar comentário!";
				exit;
			}
		} else {
			header("Location: index.php");
			echo "Foto não pertence ao Autor especificado!";
			exit;
		}
	} else {
		header("Location: index.php");
		echo "Foto não existe!";
		exit;
	}
} else if (isset($_POST["pbEnviar"]) && isset($_POST["comentario"]) && isset($_POST["autor"]) && isset($_POST["id_foto"]) && isset($_POST["autor_foto"])) {
	$comentario = $_POST["comentario"];
	$autor = $_POST["autor"];
	$id_foto = $_POST["id_foto"];
	$autor_foto = $_POST["autor_foto"];
	$data_comentario = date("Y/n/j H:i:s");
	$query = "Select email from usuarios where login='$autor'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$row = mysql_fetch_array($resultado);
	$email_autor = $row["email"];
	$query = "Insert into tab_comentarios values(NULL,$id_foto,'$data_comentario','$autor','$email_autor','$comentario')";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$retorno = mysql_affected_rows();
	if ($retorno>0) {
		header("Location: info.php?nome=$autor_foto&visualizar=sim#$id_foto");
		echo "Comentário adicionado com êxito!";
		exit;
	} else {
		header("Location: comentar.php?foto=$id_foto&autor=$autor_foto");
		echo "Ocorreu algum erro na hora de adicionar o comentário, tente novamente.";
		exit;
	}
} else {
	header("Location: index.php");
}
?>