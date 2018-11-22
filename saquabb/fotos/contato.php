<?php
if( !empty( $Email ) && is_array( $HTTP_POST_VARS ) )
{
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $HTTP_POST_VARS ) )
	{
		$conteudo  = stripslashes( $conteudo );
		$mensagem .= $campo.": ".$conteudo;
		$mensagem .= "\n";
	}
	$remetente = "contato@saquabb.com.br" ;
	$cabecalho = "From: \"Contato Saquabb.com.br\" <".$remetente.">\n"; 
	$cabecalho .= "X-Mailer: Formulario do site\n"; 
	$destinatario = "contato@saquabb.com.br";
	$assunto = "Mensagem do REAL FOTOS";
	
	// Envia o e-mail
	if(!mail($destinatario, $assunto, $mensagem, $cabecalho))
		$msg = "Falha no envio da mensagem!";
	else 
		$msg = "E-mail enviado com sucesso!";
}
?><?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_galerias = "SELECT * FROM galeria ORDER BY id DESC";
$galerias = mysql_query($query_galerias, $fotos) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="contato.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	plugins : "emotions",
	
	theme_advanced_buttons3_add : "emotions,",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
</head>

<body>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="105" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="552" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="102" height="1" border="0" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="conteudo_r1_c1" src="imagens/conteudo/conteudo_r1_c1.jpg" width="1" height="17" border="0" id="conteudo_r1_c1" alt="" /></td>
    <td rowspan="4"><img name="conteudo_r1_c2" src="imagens/conteudo/conteudo_r1_c2.jpg" width="105" height="422" border="0" id="conteudo_r1_c2" alt="" /></td>
    <td rowspan="2"><img src="imagens/conteudo/conteudo_r1_c3.jpg" alt="" name="conteudo_r1_c3" width="552" height="90" border="0" usemap="#conteudo_r1_c3Map" id="conteudo_r1_c3" /></td>
    <td rowspan="4"><img name="conteudo_r1_c4" src="imagens/conteudo/conteudo_r1_c4.jpg" width="102" height="422" border="0" id="conteudo_r1_c4" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="3"><img name="conteudo_r2_c1" src="imagens/conteudo/conteudo_r2_c1.jpg" width="1" height="405" border="0" id="conteudo_r2_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="73" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" valign="middle"><a href="galeria.php?id=<?php echo $row_galerias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/capa/", "{galerias.imagem}");?>" alt="<?php echo $row_capa['nome']; ?>" border="0" /></a></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="331" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r5_c1" src="imagens/conteudo/conteudo_r5_c1.jpg" width="760" height="36" border="0" id="conteudo_r5_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img src="imagens/conteudo/conteudo_r6_c1.jpg" alt="" name="conteudo_r6_c1" width="760" height="37" border="0" usemap="#conteudo_r6_c1Map" id="conteudo_r6_c1" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="37" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="bottom" background="imagens/fundo_titulo.jpg"><table width="513" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <th width="399" height="25" align="left" valign="middle" scope="col">&nbsp;<span class="titulo">Comprar Foto </span></th>
      </tr>
    </table></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="top" background="imagens/conteudo/conteudo_r8_c1.jpg"><table width="68%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th align="left" valign="top" scope="col"><p><form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
				<fieldset>
					<legend title="Entre em contato conosco">Comprar Foto  <br>
					</legend>
					<label for="Nome" class="titulo">Nome:</label>
					<input name="Nome" type="text" tabindex="1" value="" size="50" maxlength="50" class="textbox" />
					<label for="Email" class="titulo">E-mail:</label>
					<input name="Email" type="text" tabindex="2" value="" size="50" maxlength="50" class="textbox" />
					<label for="Telefone" class="titulo">Telefone:</label>
					<input name="Telefone" type="text" tabindex="3" value="" size="50" maxlength="50" class="textbox" />
					<label for="Endereco" class="titulo">Categoria:</label>
					<select name="Categoria" class="textbox" id="Categoria">
					  <option>Selecione</option>
					  <option value="Cr&iacute;tica">Cr&iacute;tica</option>
					  <option value="Parceria">Parceria</option>
					  <option value="Outros">Outros</option>
                    </select>
					<label for="Mensagem" class="titulo">Mensagem: </label><br />

					<textarea name="Mensagem" cols="30" rows="4" class="textbox" tabindex="5"></textarea>
                    <br />
                    <label class="nada">&nbsp;</label>
					<input name="Submit" type="submit" class="fonte_colunas" id="botao" tabindex="6" value="Enviar" />
				</fieldset>
			</form>&nbsp;</p>
          <p>&nbsp;</p></th></tr>
    </table></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="97" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r9_c1" src="imagens/conteudo/conteudo_r9_c1.jpg" width="760" height="48" border="0" id="conteudo_r9_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="48" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r10_c1" src="imagens/conteudo/conteudo_r10_c1.jpg" width="760" height="14" border="0" id="conteudo_r10_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="14" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><img name="conteudo_r11_c1" src="imagens/conteudo/conteudo_r11_c1.jpg" width="760" height="32" border="0" id="conteudo_r11_c1" alt="" /></td>
    <td><img src="imagens/conteudo/spacer.gif" width="1" height="32" border="0" alt="" /></td>
  </tr>
</table>

<map name="conteudo_r1_c3Map" id="conteudo_r1_c3Map">
<area shape="rect" coords="472,60,495,84" href="index.php" />
<area shape="rect" coords="500,61,526,84" href="contato.php" />
</map>
<map name="conteudo_r6_c1Map" id="conteudo_r6_c1Map"><area shape="rect" coords="112,8,208,27" href="index.php" />
<area shape="rect" coords="245,9,309,25" href="galerias.php" />
<area shape="rect" coords="342,9,424,25" href="quemsomos.php" />
<area shape="rect" coords="450,9,535,25" href="equipamento.php" />
<area shape="rect" coords="570,9,635,24" href="contato.php" />
</map></body>
</html>
<?php
mysql_free_result($galerias);
?>
