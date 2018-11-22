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

$colname_RsConteudos = "-1";
if (isset($_GET['pg'])) {
  $colname_RsConteudos = $_GET['pg'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsConteudos = sprintf("SELECT * FROM paginas WHERE pg = %s", GetSQLValueString($colname_RsConteudos, "text"));
$RsConteudos = mysql_query($query_RsConteudos, $ConBD) or die(mysql_error());
$row_RsConteudos = mysql_fetch_assoc($RsConteudos);
$totalRows_RsConteudos = mysql_num_rows($RsConteudos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>||    Jhow Folia    ||</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="img/recortes/images/img_01.png" alt="JhowFolia.com.br" width="800" height="225" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_02.png" alt="Menu" width="800" height="62" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="210" align="left" valign="top" background="img/recortes/images/img_03.png"><!-- InstanceBeginEditable name="conteudo" -->
      <div>
      <h2 class="titulo_pg"><?php echo $row_RsConteudos['titulo']; ?></h2>
      <div id="texto">
                <table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">

          <tr>
            <td height="108" align="left" bgcolor="#FFFFFF">
                <table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="54"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsConteudos.imagem}");?>" /></td>
                  </tr>
                </table>
            
              <div align="justify" class="fonte_not"><?php echo $row_RsConteudos['texto']; ?></div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </div></div>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td align="center" background="img/recortes/images/img_03.png"><img src="img/recortes/images/img_.png" width="800" height="100" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_07.png" width="800" height="205" /></td>
  </tr>
  <tr>
    <td><img src="img/recortes/images/img_08.png" alt="Rodap&eacute;" width="800" height="47" /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="31,14,82,45" href="index.php" alt="Home" />
<area shape="rect" coords="91,14,190,45" href="conteudo.php?pg=programacao" alt="Programa&ccedil;&atilde;o" />
<area shape="rect" coords="196,15,276,43" href="conteudo.php?pg=ingressos" />
<area shape="rect" coords="282,12,409,44" href="conteudo.php?pg=pontos" alt="Pontos de Vendas" />
<area shape="rect" coords="416,12,561,45" href="conteudo.php?pg=entrega" alt="Entrega de Abad&aacute;s" />
<area shape="rect" coords="569,12,640,45" href="conteudo.php?pg=evento" alt="O Evento" />
<area shape="rect" coords="649,12,695,44" href="fotos.php" alt="Fotos" />
<area shape="rect" coords="705,13,768,45" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsConteudos);
?> 
