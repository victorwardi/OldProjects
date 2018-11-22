<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

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

$colname_RsFotos = "-1";
if (isset($_GET['id'])) {
  $colname_RsFotos = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsFotos = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", GetSQLValueString($colname_RsFotos, "int"));
$RsFotos = mysql_query($query_RsFotos, $ConBD) or die(mysql_error());
$row_RsFotos = mysql_fetch_assoc($RsFotos);
$totalRows_RsFotos = mysql_num_rows($RsFotos);


$colname_RsImovel = "-1";
if (isset($_GET['id'])) {
  $colname_RsImovel = $_GET['id'];
  
}
$colname_RsImovel = "-1";
if (isset($_GET['id'])) {
  $colname_RsImovel = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsImovel = sprintf("SELECT * FROM imovel WHERE id = %s", GetSQLValueString($colname_RsImovel, "int"));
$RsImovel = mysql_query($query_RsImovel, $ConBD) or die(mysql_error());
$row_RsImovel = mysql_fetch_assoc($RsImovel);
$totalRows_RsImovel = mysql_num_rows($RsImovel);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsFotos.arquivo}");
$objDynamicThumb1->setResize(250, 200, false);
$objDynamicThumb1->setWatermark(false);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- InstanceBegin template="file:///C|/xampp/htdocs/ricardo/Templates/TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>||   Bradock    ||</title>

<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<link href="css/contato.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','766','height','374','src','flash/header_V8','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/header_V8' ); //end AC code
</script>
    <noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="766" height="374">
      <param name="movie" value="Templates/flash/header_V8.swf" />
      <param name="quality" value="high" />
      <embed src="Templates/flash/header_V8.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="766" height="374"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td height="19" background="imagens/recotes_02.jpg"><!-- InstanceBeginEditable name="conteudo" -->
    
      <table width="755" height="970" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="535" rowspan="3">
          
          <table width="535" border="0">
            <tr>
              <td width="188" height="100"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="250" height="200" border="0" class="borda_foto" /></td>
              <td width="337" valign="top"> 
              	

                <p>CÓDIGO DO IMÓVEL: <?php echo $row_RsImovel['id']; ?></p>
                <p>TIPO: <?php echo $row_RsImovel['tipo']; ?> </p>
                <p>Descricao: <?php echo $row_RsImovel['descricao']; ?></p>
                <p>Localizacao: <?php echo $row_RsImovel['localizacao']; ?></p>
              <p>Valor do Imóvel:<?php echo $row_RsImovel['valor']; ?></p></td>
            </tr>
            <tr>
              <td height="92" colspan="2">
               <?php
do { // horizontal looper version 3
?>
          <a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsFotos.arquivo}");?>" rel="lightbox" title="<?php echo $row_RsFotos['descricao']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="" width="80" height="60" border="0" class="borda_foto" /></a>
          <?php
$row_RsFotos = mysql_fetch_assoc($RsFotos);
    if (!isset($nested_RsFotos)) {
      $nested_RsFotos= 1;
    }
    if (isset($row_RsFotos) && is_array($row_RsFotos) && $nested_RsFotos++ % 7==0) {
      echo "</tr><tr>";
    }
  } while ($row_RsFotos); //end horizontal looper version 3
?>
</td>
   
            <tr>
              <td height="94" colspan="2">
              <table width="240" border="0" cellpadding="0" cellspacing="0">
  
  <tr>
    <td height="210" align="left" valign="top">
      <h2 class="titulo_pg">Contato</h2>
      <div id="texto">
            <p>Para maiores informações utilize o formul&aacute;rio abaixo.</p>
      <h2>
                                    <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
        </h2>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                                      <fieldset class="link_12px_preto_n">
                                      <label for="Nome" class="novidades_titulo">Nome:</label>
                                      <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Cidade" class="novidades_titulo">Cidade:</label>
                                      <input name="Cidade" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Email" class="novidades_titulo">E-mail:</label>
                                      <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Telefone" class="novidades_titulo">Telefone:</label>
                                      <input name="Telefone" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                                      <label for="Mensagem" class="novidades_titulo">Mensagem:</label>
                                      <textarea name="Mensagem" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
                                      <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                                      </fieldset>
                                    </form>
                                </div>
      </div>
      </div></td>
  </tr>
  <tr>
    <td height="210" align="left" valign="top">&nbsp;</td>
  </tr>
  </table>

              
              
               <div align="left"></div></td>
</tr>
        </table>          </td>
          <td width="220" height="185"><p>sAMSNBabsmABSMa</p>
          <p>ASBasjbBSJ</p></td>
        </tr>
        <tr>
          <td height="586">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="45"><img src="imagens/recotes_03.jpg" width="766" height="179" /></td>
  </tr>
  <tr>
    <td height="9"><img src="imagens/recotes_04.jpg" width="766" height="55" border="0" usemap="#Map" /></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="61,5,103,32" href="index.php" /><area shape="rect" coords="120,7,196,34" href="quem.php" />
<area shape="rect" coords="206,9,251,35" href="html antigas/vende.html" />
<area shape="rect" coords="263,8,309,37" href="html antigas/aluga.html" />
<area shape="rect" coords="318,5,412,38" href="pousada.php" />
<area shape="rect" coords="427,8,507,33" href="#" /><area shape="rect" coords="524,8,578,33" href="contato.html" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsFotos);

mysql_free_result($RsImovel);
?>

