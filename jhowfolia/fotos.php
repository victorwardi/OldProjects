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

mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = "SELECT * FROM galerias ORDER BY id DESC";
$RsGalerias = mysql_query($query_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);
$totalRows_RsGalerias = mysql_num_rows($RsGalerias);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsGalerias.imagem}");
$objDynamicThumb1->setResize(60, 40, false);
$objDynamicThumb1->setWatermark(false);
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
       
        <h2 class="titulo_pg">&Aacute;lbuns de Fotos</h2>
        <div id="texto">       
      <p class="novidade_texto">Confira as melhores fotos tiradas durante as nossas festas!</p>
        <?php do { ?>
        <div class="novidades_titulo">
          <table width="95%" border="0" cellpadding="0" cellspacing="6" class="linha_trecajada">
            <tr>
              <td width="15%" align="left" valign="middle"><table width="121" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3"><img src="img/recortes/moldura/foto_r1_c1.jpg" width="120" height="10" /></td>
                    </tr>
                  <tr>
                    <td width="10"><img src="img/recortes/moldura/foto_r2_c1.jpg" width="10" height="75" /></td>
                    <td width="100"><a href="album.php?id=<?php echo $row_RsGalerias['id'];?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="100" height="75" border="0" class="borda_foto" /></a></td>
                    <td width="11"><img src="img/recortes/moldura/foto_r2_c3.jpg" width="10" height="75" /></td>
                  </tr>
                  <tr>
                    <td colspan="3"><img src="img/recortes/moldura/foto_r3_c1.jpg" width="120" height="10" /></td>
                    </tr>
                </table></td>
              <td width="85%" align="left" valign="middle" class="novidades_titulo"><a href="album.php?id=<?php echo $row_RsGalerias['id'];?>" class="titulo"><?php echo $row_RsGalerias['titulo']; ?> - <?php echo $row_RsGalerias['data']; ?></a></td>
            </tr>
          </table>
          </div>
        <?php } while ($row_RsGalerias = mysql_fetch_assoc($RsGalerias)); ?>
      </div>
      <br />
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
mysql_free_result($RsGalerias);
?>
