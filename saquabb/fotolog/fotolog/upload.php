<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
verifica_sessao();
ini_set("session.use_trans_sid",1);
if ( ($_SESSION["login"] != "visitante" && !empty($_SESSION["login"])) || ($_COOKIE["login"] != "visitante" && !empty($_COOKIE["login"])) ) {
	if (empty($_SESSION["login"]) || $_SESSION["login"] == "visitante") {
		$user = $_COOKIE["login"];
	} else {
		$user = $_SESSION["login"];
	}
	$pasta = $path . '/usuarios/' .$user . '/fotos/';
	$pagina = "upload.php";
	function imprimir_form($error) {
		$form = "<script language='javascript' type='text/javascript'>
					function verifica_arquivo(form)  {
						if (form.userfile.value == '') {
							alert('Por favor, selecione um arquivo!');
							form.userfile.focus();
							return false;
						} else if (form.descricao.value == '') {
							alert('Por favor, digite uma descrição para a Foto!');
							form.descricao.focus();
							return false;
						} else {
							return true;
						}
					}
				</script>		
		<p align='center'><strong>$error</strong></p><form enctype='multipart/form-data' action='$pagina' method='post'>
				<input type='hidden' name='MAX_FILE_SIZE' value='512000'>
				  Selecione a Foto: 
				  <input name='userfile' type='file'><br>
				  <input type='text' name='descricao'>
				  <input name='pbEnviar' type='submit' id='pbEnviar' value='Enviar Arquivo' onClick='return verifica_arquivo(this.form)'>
			</form>";
		echo $form;
		return true;
	}
	if (isset($_POST["pbEnviar"]) && isset($_POST["descricao"])) {
		$extensoes_aceitas[0] = "image/gif";
		$extensoes_aceitas[1] = "image/jpeg";
		$extensoes_aceitas[2] = "image/jpg";
		$extensoes_aceitas[3] = "image/bmp";
		$extensoes_aceitas[4] = "image/png";
		$ok = 0;
		for($x=0;$x<=sizeof($extensoes_aceitas);$x++) {
			if(strcmp($_FILES['userfile']['type'],$extensoes_aceitas[$x]) == 0) {
				$ok = 1;
				break;
			}
		}
		if ($ok == 1) {		
			if ($_FILES['userfile']['size']>512000) {
				imprimir_form("A foto ultrapassou os 500k permitidos!");
			} else {
				$_FILES['userfile']['name'] = gera_arquivo($_FILES["userfile"]["type"]);
				if (empty($_POST["descricao"])) {
					$descricao = "Foto sem Descrição.";
				} else {
					$descricao = $_POST["descricao"];
				}
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], $pasta . $_FILES['userfile']['name'])) {
					$query = "Select ID from usuarios where login='$user'";
					$resultado = mysql_query($query,$conexao) or die($error_conexao);
					if ($row=mysql_fetch_array($resultado)) {
						mysql_data_seek($resultado,0);
						$id = $row["ID"];
					}
					$data = date("Y/n/j H:i:s");
					$arquivo = $_FILES['userfile']['name'];
					$query = "Insert into tab_fotos (IMAGEM,ID_USUARIO,DESCRICAO,DATA_POST) values('$arquivo',$id,'$descricao','$data')";
					$resultado = mysql_query($query,$conexao) or die($error_conexao);
					$retorno = mysql_affected_rows();
					if ($retorno>0) {
				    	imprimir_form("Arquivo Inserido com Sucesso!\n");
						print_r($_FILES);
					} else {
						imprimir_form("Erro de conexão com banco de Dados!<br>Tente novamente...");
					}
				} else {
					imprimir_form("Possível ataque de Arquivo, seu IP foi logado por medidas de segurança!");
				}
			}
		} else {
			imprimir_form("Extensão de arquivo não permitida! Seu IP foi logado por medidas de segurança!");
		}
	} else {
		imprimir_form("");
	}
} else {
	header("Location: logar.php");
	echo "<p align='center'><strong><i>Permissão Negada!<br>Você precisa se logar antes!</strong></i></p>";
	exit;
}
	
	
	

?>