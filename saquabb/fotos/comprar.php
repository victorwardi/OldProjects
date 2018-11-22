<?php require_once('../Connections/fotos.php'); ?>

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
	$assunto = "Compra de Foto";
	
	// Envia o e-mail
	if(!mail($destinatario, $assunto, $mensagem, $cabecalho))
		$msg = "Falha no envio da mensagem!";
	else 
		$msg = "E-mail enviado com sucesso!";
}
?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_fotos, $fotos);
$query_galerias = "SELECT * FROM galeria ORDER BY id DESC";
$galerias = mysql_query($query_galerias, $fotos) or die(mysql_error());
$row_galerias = mysql_fetch_assoc($galerias);
$totalRows_galerias = mysql_num_rows($galerias);

$colname_foto = "-1";
if (isset($_GET['id_foto'])) {
  $colname_foto = (get_magic_quotes_gpc()) ? $_GET['id_foto'] : addslashes($_GET['id_foto']);
}
mysql_select_db($database_fotos, $fotos);
$query_foto = sprintf("SELECT * FROM fotos_digitais WHERE id_foto = %s", $colname_foto);
$foto = mysql_query($query_foto, $fotos) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);

$colname_album = "-1";
if (isset($_GET['id'])) {
  $colname_album = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_album = sprintf("SELECT * FROM galeria WHERE id = %s ORDER BY id ASC", $colname_album);
$album = mysql_query($query_album, $fotos) or die(mysql_error());
$row_album = mysql_fetch_assoc($album);
$totalRows_album = mysql_num_rows($album);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Saquabb.com.br __________ Fotos Digitais [Bodyboard] [Surf] [Visual] [Gatas] ______________________________</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="contato.css" rel="stylesheet" type="text/css" />
<link href="stilo.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function abrir(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
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
    <td colspan="4" align="center" valign="top" background="imagens/conteudo/conteudo_r8_c1.jpg"><table width="71%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <th height="65" colspan="4" class="negrito" scope="col"><div align="left">Sabe aquela onda, aquele tubo, aquela manobra que s&oacute; voc&ecirc; consegue descrever? <br />
          Agora voc&ecirc; pode mostrar pros seus amigos, familiares, patrocinadores e pra quem quiser.<br />
          Compre sua foto,  revelada com qualidade KODAK, ou em meio DIGITAL com resolu&ccedil;&atilde;o m&aacute;xima. </div></th>
      </tr>
      <tr>
        <th align="left" valign="middle" class="titulo" scope="col"><?php echo $row_foto['descricao']; ?></th>
        <td width="37%" rowspan="4" align="center" valign="top"><img src="<?php echo tNG_showDynamicThumbnail("../", "fotos_digitais/", "{foto.arquivo}", 150, 0, true); ?>" class="borda_galeria" /></td>
        <td width="6%" rowspan="4">&nbsp;</td>
        <td width="6%" rowspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th align="left" valign="middle" scope="row"><span class="negrito">Galeria: </span><span class="fonte"><?php echo $row_album['nome']; ?></span></th>
        </tr>
      <tr>
        <th align="left" valign="middle" scope="row"><span class="negrito">Local:</span> <span class="fonte"><?php echo $row_foto['local']; ?></span></th>
        </tr>
      <tr>
        <th align="left" valign="middle" scope="row"><span class="negrito">Fot&oacute;grafo:</span> <span class="fonte"><?php echo $row_foto['fotografo']; ?></span></th>
        </tr>
      <tr>
        <th height="39" colspan="3" align="center" valign="middle" class="negrito" scope="row"><a href="javascript:abrir('info.php','','width=510,height=610')" class="negrito">Clique aqui para saber das formas de envio e pagamento! </a></th>
        <td>&nbsp;</td>
      </tr>

    </table>
      <table width="68%" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <th align="left" valign="top" scope="col"><form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
      <fieldset>
					<legend title="Entre em contato conosco">Dados para a Compra   <br>
					</legend>
					<label for="Nome" class="titulo">Nome:</label>
					<input name="Nome" type="text" tabindex="1" value="" size="50" maxlength="50" class="textbox" />
					<label for="Email" class="titulo">E-mail:</label>
					<input name="Email" type="text" tabindex="2" value="" size="50" maxlength="50" class="textbox" />
					<label for="Telefone" class="titulo">Telefone:</label>
					<input name="Telefone" type="text" tabindex="3" value="" size="50" maxlength="50" class="textbox2" />
					<label for="cod" class="titulo">C&oacute;digo da Foto :</label>
					<input name="Código da Foto" type="text" class="textbox2" id="cod" tabindex="3" value="<?php echo $row_foto['id_foto']; ?>" size="30" maxlength="30" />
					
					<label for="Tipo" class="titulo">Tipo da Foto :</label>
					


<select name="Tipo de Foto" class="textbox2" id="Categoria">
					  <option> - Selecione - </option>
					  <option value="10X15">impress&atilde;o - 10X15</option>
					  <option value="15X20">impress&atilde;o - 15X20</option>
					   <option value="20X30">impress&atilde;o - 20X30</option>
					  <option value="Digital">Digital</option>
                            </select>
							<label for="quant" class="titulo">Quantidade de C&oacute;pias  :</label>
					


					<select name="Quantidade" class="textbox2" id="quantidade">
					  <option> - Selecione - </option>
					  <option value="1">1 cópia</option>
					  <option value="2">2 cópias</option>
					  <option value="3">3 cópias</option>
</select>
					<label for="Mensagem" class="titulo">Endere&ccedil;o / Observa&ccedil;&otilde;es : </label>
					<textarea name="Mensagem" cols="50" rows="10" tabindex="5" class="textbox"></textarea>
					<label class="nada">&nbsp;</label>
					<input name="Submit" type="submit" class="fonte_colunas" id="botao" tabindex="6" value="Enviar" />
				</fieldset>
			</form>
           
          </p>
          <p>&nbsp;</p></th></tr>
    </table></td><td><img src="imagens/conteudo/spacer.gif" width="1" height="97" border="0" alt="" /></td>
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

mysql_free_result($foto);

mysql_free_result($album);
?>
