<?php 
$pagina = $_SERVER['PHP_SELF'];
if (isset($_COOKIE["login"])) {
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\conexao.php");
require_once("C:\inetpub\wwwroot\novo_saquabb\fotolog\fotolog\funcao.php");
	if (isset($_GET["tipo"]) && isset($_GET["nome"]) && isset($_GET["logado"])) {
		if ($_GET["tipo"] == "Informacoes" && $_GET["logado"] == "sim") {
			$login = $_COOKIE["login"];
			if ($login === $_GET["nome"]) {
				$query = "Select ID from usuarios where login='$login'";
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$row=mysql_fetch_array($resultado);
				$id = $row["ID"];
				$query = "Select * from usuarios where ID=$id";
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$row=mysql_fetch_array($resultado);
				$nome = $row["nome"];
				$endereco = $row["endereco"];
				$bairro = $row["bairro"];
				$cidade = $row["cidade"];
				$ICQ = $row["icq"];
				$MSN = $row["msn"];
				$email = $row["email"];
				$form = "<script language='JavaScript' type='text/javascript'>
				function validarCampos(form) {
				   if (form.dfNome.value == '') {
						alert('Preencha o campo Nome!');
						form.dfNome.focus();
						return false;
					} else if (form.dfEndereco.value == '') {
						alert('Preencha o Campo Endereço!')
						form.dfEndereco.focus();
						return false;
					} else if (form.dfBairro.value == '') {
						alert('Preencha o campo Bairro!');
						form.dfBairro.focus();
						return false;
					} else if (form.dfCidade.value == '') {
						alert('Preencha o campo Cidade!');
						form.dfCidade.focus();
						return false;
		 			} else if (form.dfEmail.value == '') {
						alert('Preencha o campo E-mail!');
						form.dfEmail.focus();
						return false;
					} else if ( form.dfConfirmaSenha.value != form.dfSenha.value) {
						alert('Verifique se os campos Senha e Confirma senha não estão em branco e são iguais!');
						form.dfSenha.focus();
						return false;
					} else {
						return true;
					}
				}
			  </script>			
				<form name='frmSalvar' action='editar.php' method='POST'><table width='100%' border='0'>
						  <tr> 
						    <td>Nome Completo:</td>
						    <td><input name='dfNome' type='text' id='dfNome' value='$nome' size='100'></td>
						  </tr>
						  <tr> 
						    <td>Endere&ccedil;o:</td>
						    <td><input name='dfEndereco' type='text' id='dfEndereco' value='$endereco' size='100'></td>
						  </tr>
						  <tr> 
						    <td>Bairro:</td>
						    <td><input name='dfBairro' type='text' id='dfBairro' value='$bairro' size='100'></td>
						  </tr>
						  <tr> 
						    <td>Cidade:</td>
						    <td><input name='dfCidade' type='text' id='dfCidade' value='$cidade' size='100'></td>
						  </tr>
						  <tr> 
						    <td>MSN:</td>
						    <td><input name='MSN' type='text' id='MSN' value='$MSN'></td>
						  </tr>
						  <tr> 
						    <td>ICQ:</td>
						    <td><input name='ICQ' type='text' id='ICQ' value='$ICQ'></td>
						  </tr>
						  <tr> 
						    	<td>E-mail:</td>
							    <td><input name='dfEmail' type='text' id='dfEmail' value='$email'></td>
						  </tr>
						  <tr>
							    <td>Senha:</td>
							    <td><input name='dfSenha' type='password' id='dfSenha'></td>
						  </tr>
						  <tr> 
						    <td>Confirmação de Senha</td>
						    <td><input name='dfConfirmaSenha' type='password' id='dfConfirmaSenha'></td>
						  </tr>
						  <tr> 
						    <td width='17%'><input type='submit' name='pbSalvar' id='pbSalvar' value='Salvar' onClick='return validarCampos(this.form)'></td>
						    <td width='83%'>&nbsp;</td>
						  </tr>
						</table>
						<input type='HIDDEN' name='id' value='$id'></form>";
     					echo $form;
				} else {
					header("Location: index.php");
					exit;
				}
		} else if ($_GET["tipo"] == "PaginaPessoal" && $_GET["logado"] == "sim" && $_GET["nome"]) {
					
		} else if ($_GET["tipo"] == "Fotos" && $_GET["logado"] == "sim" && $_GET["nome"]) {
			if ($_GET["nome"] == $_COOKIE["login"]) {
				$form = "<form action='$pagina' method='GET'><table width='100%' height='100%' border='0'>
						  <tr>
						    <td align='center' valign='top'><table width='100%' border='0' align='left'>";
				$login = $_COOKIE["login"];
				$query = "Select id from usuarios where login='$login'";
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				if ($row=mysql_fetch_array($resultado)) {
					$id = $row["id"];
				}
				$query = "Select * from tab_fotos where id_usuario=$id";
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$total = mysql_num_rows($resultado);
				if ($total>0) {
					mysql_data_seek($resultado,0);
					$query2 = "Select * from config";
					$resultado2 = mysql_query($query2,$conexao) or die($error_conexao);
					$row2=mysql_fetch_array($resultado2);
					$path_user = $row2["path_usuarios"];
					echo $form;
					while($row=mysql_fetch_array($resultado)) {
						$id_foto = $row["id"];
						$descricao = $row["descricao"];
						$imagem = $row["imagem"];
						if (strlen($descricao)>50) {
							$descricao = substr($descricao,0,47);
							$descricao+="...";
						}
						$post = $row["data_post"];
						echo "<tr> 
						          <td width='2%'>ID:</td>
						          <td width='5%'>$id_foto</td>
						          <td width='7%'>Descri&ccedil;&atilde;o:</td>
						          <td width='38%'>$descricao</td>
						          <td width='10%'>Postado em:</td>
						          <td width='18%'>$post</td>
						          <td width='20%'><strong>x</strong><a href='editar.php?tipo=EditarFoto&escolha=Editar&ID=$id_foto&nome=$login&logado=sim'> Editar</a> <strong>x</strong><a href='editar.php?tipo=EditarFoto&escolha=Apagar&ID=$id&nome=$login&logado=sim'> Apagar</a> 
						            <strong>x </strong><a href='{$path_user}{$login}/fotos/{$imagem}' target='_blank'>Ver</a><strong>x</strong></td>
						        </tr>";
					}
					echo "</table></td>
						  </tr>
						</table></form>";
				} else {
					echo "Não foi encontrada nenhuma foto!";
				}
			} else {
				header("Location: logar.php");
			}					
	
		} else {
			header("Location: index.php");
			exit;
		}
	} else if (isset($_GET["tipo"]) && isset($_GET["escolha"]) && isset($_GET["ID"]) && isset($_GET["nome"]) && isset($_GET["logado"])) {
		if ($_GET["nome"] == $_COOKIE["login"]) {
			if ($_GET["tipo"] == "EditarFoto" && $_GET["escolha"] == "Editar") {
				$id_foto = $_GET["ID"];
				$query = "Select id from tab_fotos where id=$id";
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$total = mysql_num_rows($resultado);
				if ($total>0) {
					$login = $_GET["nome"];
					$query = "Select id from usuarios where login='$login'";
					$resultado = mysql_query($query,$conexao) or die($error_conexao);
					$row=mysql_fetch_array($resultado);
					$id = $row["id"];
					$query = "Select id_usuario,descricao from tab_fotos where id=$id_foto and id_usuario=$id";
					$resultado = mysql_query($query,$conexao) or die($error_conexao);
					$total = mysql_num_rows($resultado);
					if ($total>0) {
						mysql_data_seek($resultado,0);
						$row=mysql_fetch_array($resultado);
						$descricao = $row["descricao"];
					    $form = "<form action='$pagina' method='POST' name='frm1'>
							<table width='100%' height='100%' border='0'>
							  <tr>
							    <td align='center' valign='middle'> 
							      <table width='100%' border='0'>
							        <tr> 
							          <td width='8%'>Descri&ccedil;&atilde;o: </td>
							          <td colspan='2'><input name='dfLimpar' type='text' id='dfLimpar' size='90' value='$descricao'></td>
							        </tr>
							        <tr> 
							          <td><input name='pbModificar' type='submit' id='pbEnviar' value='Enviar'></td>
							          <td width='7%'><input name='pbLimpar' type='reset' id='pbLimpar' value='Limpar'></td>
							          <td width='85%'>&nbsp;</td>
							        </tr>
						      </table>
						    </td>
							  </tr>
							</table>
							<input type='HIDDEN' name='id_foto'>
							</form>";					
					} else {
						################# Foto Não Encontrada ou não pertence ao Autor Selecionado ###########################
					
					}
				} else {
					  ################# Foto não existe no Banco de Dados #######################
				
				}
			} else if ($_GET["tipo"] == "EditarFoto" && $_GET["escolha"] == "Apagar") {
				$id_foto = $_GET["ID"];
				?><script language="JavaScript" type="text/javascript">
				    if (window.confirm("Deseja realmente apagar essa foto?!")) {
						<?php 
						$query = "Delete from tab_fotos where id=$id_foto";
						$resultado = mysql_query($query,$conexao) or die($error_conexao);
						$retorno = mysql_affected_rows();
						if ($retorno>0) {
							$query = "Delete from tab_comentarios where id_foto=$id_foto";
							$resultado = mysql_query($query,$conexao) or die($error_conexao);
							$retorno = mysql_affected_rows();
							if ($retorno>0) {
								echo "Foto foi deletada com sucesso!";
							} else {
								echo "Ocorreu algum erro na hora de apagar a Foto!";
							}
						} else {
							echo "Ocorreu algum erro na hora de apagar a Foto!";
						} ?>
					} else {
						<?php header("Location: conta.php");exit; ?>
					}
				</script>
<?php 			
			}
		} else {
			################## O Autor Indicado não é o Verdadeiro Autor da Foto, Permissão Negada ######################
	
		}
	} else if (isset($_POST["pbModificar"]) && isset($_POST["pbLimpar"]) && isset($_POST["dfDescricao"]) && isset($_POST["id_foto"])) {
		$descricao = $_POST["dfDescricao"];
		$id_foto = $_POST["id_foto"];
		$query = "Update tab_fotos set descricao='$descricao' where id=$id_foto";
		$resultado = mysql_query($query,$conexao) or die($error_conexao);
		$retorno = mysql_affected_rows();
		if ($retorno>0) {
			header("Location: conta.php");
			echo "Descrição da Foto foi modificada com Sucesso!";
		} else {
			header("Location: conta.php");
			echo "Ocorreu algum erro na hora de modificar a Descrição da Foto!";
		}
		
	} else if(isset($_POST["dfNome"]) && isset($_POST["dfEndereco"]) && isset($_POST["dfBairro"]) && isset($_POST["dfCidade"]) && 
				  isset($_POST["ICQ"]) && isset($_POST["MSN"]) && isset($_POST["dfEmail"]) && isset($_POST["dfSenha"]) && isset($_POST["dfConfirmaSenha"])
				  && isset($_POST["pbSalvar"]) && isset($_POST["id"])) {
		  	if ($_POST["dfSenha"] != '') {
				$mudar_senha = 1;
				$senha = $_POST["dfSenha"];
			} else {
				$mudar_senha = 0;
			}
			$id = $_POST["id"];
			$nome = ucwords($_POST["dfNome"]);
			$endereco = ucwords($_POST["dfEndereco"]);
			$bairro = ucwords($_POST["dfBairro"]);
			$cidade = ucwords($_POST["dfCidade"]);
			$email = strtolower($_POST["dfEmail"]);
			$icq = $_POST["ICQ"];
			$msn = strtolower($_POST["MSN"]);
			if ($mudar_senha == 0) {
				$query = "Update usuarios set nome='$nome', endereco='$endereco', bairro='$bairro', cidade='$cidade', email='$email', icq='$icq', msn='$msn' WHERE id=$id";						
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$retorno = mysql_affected_rows();
				if ($retorno>0) {
					echo "Informações foram alteradas com sucesso!</p><a href='conta.php'>Voltar para Minha Conta</a>";
				} else {
					echo "Não foi possível alterar Informaçoes!</p><a href='conta.php'>Voltar para Minha Conta</a>";
				}
			} else {
				$senha = md5(strtolower(trim($senha)));
				$query = "Update usuarios set nome='$nome', endereco='$endereco', bairro='$bairro', cidade='$cidade', email='$email', icq='$icq', msn='$msn', senha='$senha' WHERE id=$id";						
				$resultado = mysql_query($query,$conexao) or die($error_conexao);
				$retorno = mysql_affected_rows();
				if ($retorno>0) {
					setcookie("login","",time()-36000);
					echo "Informações foram alteradas com sucesso!<br>
					Como você alterou sua senha, será necessário logar-se novamente!<br>
					<a href='logar.php'>Logar!</a>";						
				} else {
					echo "Não foi possível alterar Informaçoes!</p><a href='conta.php'>Voltar para Minha Conta</a>";
 				}
    		}
   } else {
		header("Location: index.php");
		exit;
	}
} else {
	header("Location: index.php");
	exit;
}
?>