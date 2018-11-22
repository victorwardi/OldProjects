<?php
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
ini_set("session.use_trans_sid",1);
$header = "<HTML>\n<HEAD>\n";
$titulo = "<TITLE>cYbEr'S Fotolog - www.cybersfotolog.com.br</TITLE>\n</HEAD>\n<BODY>\n";
$footer = "</BODY>\n</HTML>\n";
function registrar($error_registro) {
	echo $header;
	echo "<TITLE>www.cybersfotolog.com.br - Novo Registro de Usuário</TITLE>\n";
	echo "</HEAD>\n<BODY OnLoad='Registrar.dfLogin.focus()'>\n";
	$form = "<script language='JavaScript' type='text/javascript'>
			function validarCampos(form) {
				if (form.dfLogin.value == '') {
					alert('Preencha o Campo Login!');
					form.dfLogin.focus();
					return false;
				} else if ( (form.dfSenha.value == '' ) || (form.dfConfirmaSenha.value == '' || form.dfConfirmaSenha.value != form.dfSenha.value)) {
					alert('Verifique se os campos Senha e Confirma senha não estão em branco e são iguais!');
					form.dfSenha.focus();
					return false;
				} else if (form.dfEmail.value == '') {
					alert('Preencha o campo E-mail!');
					form.dfEmail.focus();
					return false;
				} else if (form.dfNome.value == '') {
					alert('Preencha o campo Nome!');
					form.dfNome.focus();
					return false;
				} else if (form.dfCidade.value == '') {
					alert('Preencha o campo Cidade!');
					form.dfCidade.focus();
					return false;
				} else if (form.dfBairro.value == '') {
					alert('Preencha o campo Bairro!');
					form.dfBairro.focus();
					return false;
				} else if (form.dfEndereco.value == '') {
					alert('Preencha o campo Endereço!');
					form.dfEndereco.focus();
					return false;
				} else if (form.titulo.value == '') {
					alert('Preencha o campo Título!');
					form.titulo.focus();
					return false;
				} else if (form.background.value == '') {
					alert('Preencha o Campo Cor de Fundo!');
					form.background.focus();
					return false;
				} else if (form.cor_fonte.value == '') {
					alert('Preencha o campo Cor da Fonte');
					form.cor_fonte.focus();
					return false;
				} else if (form.nome_fonte.value == '') {
					alert('Preencha o Campo Nome da Fonte!');
					form.nome_fonte.focus();
					return false;
				} else {
					form.submit();
					return true;
				}
			}
			</script>
			<p align='center'><strong>$error_registro</strong></p><form name='Registrar' action='$pagina' method='post'>
			<table width='100%' border='0'>
			  <tr> 
			      <td width='18%'>Login de acesso<strong>*</strong>:</td>
			    <td width='82%'><input name='dfLogin' type='text' id='dfLogin'></td>
			  </tr>
			  <tr> 
			      <td>Senha<strong>*</strong>:</td>
			    <td><input name='dfSenha' type='password' id='dfSenha'></td>
			  </tr>
			  <tr> 
			      <td>Confirma&ccedil;&atilde;o de Senha<strong>*</strong>:</td>
			    <td><input name='dfCofnrimaSenha' type='password' id='dfConfirmaSenha'></td>
			  </tr>
			  <tr> 
			      <td>E-mail<strong>*</strong>:</td>
			    <td><input name='dfEmail' type='text' id='dfEmail'></td>
			  </tr>
			  <tr> 
			      <td>Nome Completo<strong>*</strong>:</td>
			    <td><input name='dfNome' type='text' id='dfNome'></td>
			  </tr>
			  <tr> 
			      <td>Cidade<strong>*</strong>:</td>
			    <td><input name='dfCidade' type='text' id='dfCidade'></td>
			  </tr>
			  <tr> 
			      <td>Bairro<strong>*</strong>:</td>
			    <td><input name='dfBairro' type='text' id='dfBairro'></td>
			  </tr>
			  <tr>
			      <td>Endere&ccedil;o<strong>*</strong>:</td>
			    <td><input name='dfEndereco' type='text' id='dfEndereco'></td>
			  </tr>
			  <tr> 
			    <td>ICQ:</td>
			    <td><input name='dfICQ' type='text' id='dfICQ'></td>
			  </tr>
			  <tr> 
			    <td>MSN:</td>
			    <td><input name='dfMSN' type='text' id='dfMSN'></td>
			  </tr>
			  <tr>
			  <td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td>Escolha o Estilo do Título: </td>
			  </tr>
			  <td><input type='radio' name='style' value='b'>Negrito</td>
			  <td><input type='radio' name='style' value='i'>Itálico</td>
			  </tr>
			  <tr>
			  <td><input type='radio' name='style' value='u'>Sublinhado</td>
			  <td><input type='radio' name='style' value='u' checked>Nenhum </td>
			  </tr>
			  <tr>
			  <td>Título do Fotolog: <strong>*</strong></td>
			  <td><input type='text' name='titulo'></td>
			  </tr>
			  <td>Cor de Fundo do Fotolog: <strong>*</strong></td>
			  <td><input type='text' name='background' value='#FFFFFF' onFocus='this.select()'></td>
			  </tr>
			  <tr>
			  <td>Cor do Texto: <strong>*</strong></td>
			  <td><input type='text' name='cor_fonte' value='#000000' onFocus='this.select()'></td>
			  </tr>
			  <tr>
			  <td>Nome da Fonte: <strong>*</strong></td>
			  <td><input type='text' name='nome_fonte' value='Arial' onFocus='this.select()'></td>
			  </tr>
			  <tr> 
			    <td><input name='pbRegistrar' type='submit' id='pbRegistrar' value='Registrar' onClick='return validarCampos(this.form)'></td>
			    <td><input name='pbLimpar' type='reset' id='pbLimpar' value='Limpar'></td>
			  </tr>
			</table>
			</form>";
	echo $form;
	echo $footer;
	return true;
}
$pagina = $_SERVER['PHP_SELF'];
if (isset($_POST["dfLogin"]) && isset($_POST["dfSenha"]) && isset($_POST["dfNome"]) && isset($_POST["dfCidade"]) && isset($_POST["dfBairro"]) && isset($_POST["dfEndereco"]) && 
   isset($_POST["dfICQ"]) && isset($_POST["dfMSN"]) &&  isset($_POST["style"]) && isset($_POST["titulo"]) && isset($_POST["background"])
	&& isset($_POST["cor_fonte"]) && isset($_POST["nome_fonte"]) && isset($_POST["pbRegistrar"])) {
	# Parte de adicionar usuário registrado
	$login = trim($_POST["dfLogin"]);
	$senha = md5(trim($_POST["dfSenha"]));
	$nome = ucwords($_POST["dfNome"]);
	$endereco = ucwords($_POST["dfEndereco"]);
	$bairro = ucwords($_POST["dfBairro"]);
	$cidade = ucwords($_POST["dfCidade"]);
	$endereco = ucwords($_POST["dfEndereco"]);
	$email = strtolower($_POST["dfEmail"]);
	$icq = $_POST["dfICQ"];
	$msn = strtolower($_POST["dfMSN"]);
	$style = $_POST["style"];
	$titulo = $_POST["titulo"];
	$background = $_POST["background"];
	$cor_fonte = $_POST["cor_fonte"];
	$nome_fonte = $_POST["nome_fonte"];
	$data = date("Y/n/j");
	$ultimo_login = date("Y/n/j H:i:s");
	$query = "Select login from usuarios where login='$login'";
	$resultado = mysql_query($query,$conexao) or die($error_conexao);
	$retorno = mysql_num_rows($resultado);
	if ($retorno>0) {
		$error = "Usuário digitado já existe!";
		registrar($error);		
	} else {
		$query = "Insert into usuarios values(NULL,'$login','$senha','$email','$nome','$icq','$msn','$cidade','$endereco','$bairro','$data','$ultimo_login')";
		$resultado = mysql_query($query,$conexao) or die($error_conexao);
		$retorno = mysql_affected_rows();
		$query = "Select id from usuarios where login='$login'";
		$resultado=mysql_query($query,$conexao) or die($error_conexao);
		$row=mysql_fetch_array($resultado);
		$id = $row["id"];
		$query = "Insert into config_usuarios values(NULL,$id,'$background','$titulo','$cor_fonte','$nome_fonte','$style')";
		$resultado = mysql_query($query,$conexao) or die($error_conexao);
		$retorno2 = mysql_affected_rows();
		if ($retorno>0 && $retorno2>0) {
			mkdir($path . "/usuarios/" . $login,"077");
			mkdir($path . "/usuarios/" . $login . "/fotos","077");
			mkdir($path . "/usuarios/" . $login . "/favoritos","077");
			copy($path . "/usuarios/index.php", $path . "/usuarios/" . $login . "/index.php");
			header("Location: logar.php");
			echo $header;
			echo $titulo;
			$msg = "Cadastro realizado com Sucesso!";
			echo $footer;
		} else {
			header("Location: $pagina");
			echo $header;
			echo $titulo;
			$msg = "Ocorreu algum erro, não foi possível completar o Cadastro, tente novamente.";
			echo $footer;
		}
	}
} else {
	$error = "";
	registrar($error);
}
	
?>
