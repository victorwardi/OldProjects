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

$colname_RsNovidade = "-1";
if (isset($_GET['id'])) {
  $colname_RsNovidade = $_GET['id'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidade = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_RsNovidade, "int"));
$RsNovidade = mysql_query($query_RsNovidade, $ConBD) or die(mysql_error());
$row_RsNovidade = mysql_fetch_assoc($RsNovidade);
$totalRows_RsNovidade = mysql_num_rows($RsNovidade);
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
        <table width="93%" border="0" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td colspan="2" align="left" valign="top" class="titulo_novidades"><?php echo $row_RsNovidade['titulo']; ?></td>
          </tr>
          <tr>
            <td width="27%" align="left" valign="top"><span class="data">Data:</span><span class="data_"> <?php echo $row_RsNovidade['data']; ?></span></td>
            <td align="left" valign="top"><span class="data">Fonte:</span> <span class="data_"><?php echo $row_RsNovidade['fonte']; ?></span></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top" class="texto"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsNovidade.imagem}");?>" class="contorno_1px" /></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top" class="texto"><?php echo $row_RsNovidade['materia']; ?></td>
          </tr>
        </table>
      </div>
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
</map></body><!-- InstanceEnd --></html>
<?php
mysql_free_result($RsNovidade);
?> 
