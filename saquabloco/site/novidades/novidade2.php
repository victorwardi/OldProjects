<?php require_once('../Connections/ConBD.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_RsNovidades = "-1";
if (isset($_GET['id'])) {
  $colname_RsNovidades = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_RsNovidades, "int"));
$RsNovidades = mysql_query($query_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);
$totalRows_RsNovidades = mysql_num_rows($RsNovidades);

$colname_RsOutras = "-1";
if (isset($_GET['id'])) {
  $colname_RsOutras = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsOutras = sprintf("SELECT * FROM noticias WHERE id <> %s ORDER BY id DESC", GetSQLValueString($colname_RsOutras, "int"));
$RsOutras = mysql_query($query_RsOutras, $ConBD) or die(mysql_error());
$row_RsOutras = mysql_fetch_assoc($RsOutras);
$totalRows_RsOutras = mysql_num_rows($RsOutras);
?>
<?php
setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$materia = "".$_POST["materia"]."";
		$titulo .= "".$_POST["titulo"]."";
		$mensagem = "<HTML><BODY><div id=\"texto\">
      <h2 class=\"titulos_novidades\">$titulo</h2>
      <p><span class=\"novidade_texto_espaco\">$materia</span>        </p>
      </p>
      <div align=\"left\"><span class=\"depoimento_ass\">Fonte: </span><span class=\"novidade_texto\">vc</span> <span class=\"depoimento_ass\">- Data:</span> <span class=\"novidade_texto\">10/04/08</span></div>
      </div>
      
          <div id=\"texto\"></BODY></HTML>";
		
	}

	$remetente = "contato@saquabloco.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Novidade Saquabloco\n"; 
	$cabecalho .= "Content-Type: text/html; charset=iso-8859-1/n";
	$destinatario = " <".$_POST["EmailAmigo"].">";
	$assunto = "Seu amigo,".$_POST["Nome"].", indicou esta noticia ";
	
	
	
	
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado!";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Victor Caetano Preuss Sthel Wardi - victor@saquabb.com.br - http://www.saquabb.com.br" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SaquaBloco, o Melhor Bloco de Saquarema</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<link href="../faleconosco/contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<table width="617" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="523" align="center" valign="middle" scope="col"><img src="../img/jpg/bandeira.jpg" width="523" height="346" /></th>
    <th width="94" align="center" valign="middle" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','277','height','346','src','../flash/menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="277" height="346">
       <param name="wmode" value="transparent"/>
      <param name="movie" value="../flash/menu.swf" />
      <param name="quality" value="high" />
      <embed src="../flash/menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="277" height="346"></embed>
    </object></noscript></th>
  </tr>
  <tr>
    <td height="48" colspan="2" align="center" valign="middle"><!-- InstanceBeginEditable name="Titulo" --><img src="../img/jpg/titulos.jpg" width="800" height="57" /><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="163" colspan="2" align="center" valign="top" background="../img/png/fundo_tabela.png"><!-- InstanceBeginEditable name="conteudo" -->
      <div id="texto">
      <h2 class="titulos_novidades"><?php echo $row_RsNovidades['titulo'];?></h2>
      <p><span class="novidade_texto_espaco"><?php echo $row_RsNovidades['materia'];?></span>        </p>
      </p>
      <div align="left"><span class="depoimento_ass">Fonte: </span><span class="novidade_texto"><?php echo $row_RsNovidades['fonte'];?></span> <span class="depoimento_ass">- Data:</span> <span class="novidade_texto"><?php echo $row_RsNovidades['data'];?></span></div>
      </div>
      
          <div id="texto">
          <div class="novidades_titulo">
            <p>&nbsp;</p>
            <p>Confira outras novidades</p>
          </div>
        <?php do { ?>
          <div class="titulos_novidades"><a href="novidade.php?id=<?php echo $row_RsOutras['id'];?>"><?php echo $row_RsOutras['titulo'];?></a></div>
          <?php } while ($row_RsOutras = mysql_fetch_assoc($RsOutras)); ?>
          <div id="conteudo_interno" class="left">
                                  <h2>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
                                  </h2>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $row_RsNovidades['id'];?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
                                      <label for="Nome" class="txt_novidades_data">Nome:</label>
                                      <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Cidade" class="txt_novidades_data">Cidade:</label>
                                      <input name="Cidade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Email" class="txt_novidades_data">E-mail:</label>
                                      <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="EmailAmigo" class="txt_novidades_data">E-mail do seu Amigo:</label>
                                      <input name="EmailAmigo" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" /> 
                                      <div id="mail"> <label for="Titulo" class="txt_novidades_data">Titulo:</label>
                                      <input name="titulo" type="text" class="textbox" tabindex="3" value="<?php echo $row_RsNovidades['titulo']; ?>" size="37" maxlength="50" />
                                      <label for="materia" class="txt_novidades_data">Mensagem:</label>
                                      <textarea name="materia" cols="37" rows="5" class="textbox" id="materia" tabindex="4"><?php echo $row_RsNovidades['materia']; ?></textarea></div>
                                     
                                      <label for="Telefone" class="txt_novidades_data">Telefone:</label>
                                      <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Endereco" class="txt_novidades_data">Mensagem:</label>
                                      <textarea name="Bairro" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
                                      <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                                      </fieldset>
                                    </form>
                                </div>
                              </div>
          </div>
          
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle"><img src="../img/png/menu_baixo.png" width="800" height="42" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="../img/png/rodape.png" width="800" height="74" border="0" usemap="#Map2" /></td>
  </tr>
</table>
&nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp; 
<map name="Map" id="Map">
  <area shape="rect" coords="93,8,184,30" href="../index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="201,8,279,25" href="../novidades" alt="Novidades" />
<area shape="rect" coords="293,8,405,28" href="../fotos" alt="&Aacute;lbum de Fotos" />
<area shape="rect" coords="419,7,483,30" href="../bloco" alt="O Bloco" />
<area shape="rect" coords="500,8,576,31" href="../integrantes" alt="Integrantes" />
<area shape="rect" coords="595,9,692,31" href="../faleconosco" alt="Fale Conosco" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="650,53,754,70" href="http://www.saquabb.com.br/victor" target="_blank" alt="Acesse meu Portif&oacute;lio - Victor Caetano" />
<area shape="rect" coords="140,54,241,72" href="#" alt="Andr&eacute; Pesco&ccedil;o - Montagem Manuten&ccedil;ao" onclick="MM_openBrWindow('../andre.php','','width=400,height=500')" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsNovidades);

mysql_free_result($RsOutras);
?>
