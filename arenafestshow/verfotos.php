<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$colname_RsGalerias = "-1";
if (isset($_GET['id'])) {
  $colname_RsGalerias = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = sprintf("SELECT * FROM galerias WHERE id = %s ORDER BY id DESC", $colname_RsGalerias);
$RsGalerias = mysql_query($query_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);
$totalRows_RsGalerias = mysql_num_rows($RsGalerias);

$maxRows_fotos = 18;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

$colname_fotos = "-1";
if (isset($_GET['id'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_fotos = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_fotos);
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $ConBD) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;

$colname_RsOutros = "-1";
if (isset($_GET['id'])) {
  $colname_RsOutros = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsOutros = sprintf("SELECT * FROM galerias WHERE id <> %s ORDER BY id DESC", $colname_RsOutros);
$RsOutros = mysql_query($query_RsOutros, $ConBD) or die(mysql_error());
$row_RsOutros = mysql_fetch_assoc($RsOutros);
$totalRows_RsOutros = mysql_num_rows($RsOutros);

$queryString_fotos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_fotos") == false && 
        stristr($param, "totalRows_fotos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_fotos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_fotos = sprintf("&totalRows_fotos=%d%s", $totalRows_fotos, $queryString_fotos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{fotos.arquivo}");
$objDynamicThumb1->setResize(90, 60, false);
$objDynamicThumb1->setWatermark(false);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Victor Caetano Preuss Sthel Wardi - victor@saquabb.com.br - http://www.saquabb.com.br" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____ Arena Fest _________________________________________</title>
<link rel="stylesheet" href="Scripts/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="Scripts/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="Scripts/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="Scripts/litbox/js/lightbox.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<link href="../../saquabloco/site/css.css" rel="stylesheet" type="text/css" />
<script src="../../saquabloco/site/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="617" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="523" align="center" valign="middle" scope="col"><img src="../../saquabloco/site/img/jpg/bandeira.jpg" width="523" height="346" /></th>
    <th width="94" align="center" valign="middle" scope="col"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','277','height','346','src','flash/menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="277" height="346">
      <param name="movie" value="../../saquabloco/site/flash/menu.swf" />
      <param name="quality" value="high" />
      <embed src="../../saquabloco/site/flash/menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="277" height="346"></embed>
    </object></noscript></th>
  </tr>
  <tr>
    <td height="48" colspan="2" align="center" valign="middle"><!-- InstanceBeginEditable name="Titulo" --><img src="../../saquabloco/site/img/jpg/titulos.jpg" width="800" height="57" /><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="163" colspan="2" align="center" valign="top" background="../../saquabloco/site/img/png/fundo_tabela.png"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr>
          <td width="70%" height="550" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="6">
            <tr>
              <td width="70%" height="25" align="left" valign="middle" bgcolor="#F3F8A6" class="TITULOS">Galeria de Fotos </td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top"   class="borda_baixo_5px"><span class="txt_novidades_titulo"><?php echo $row_RsGalerias['titulo']; ?> - <?php echo $row_RsGalerias['data']; ?></span></td>
            </tr>
            <tr>
              <td align="left" valign="top"></td>
            </tr>
            <tr>
              <td height="19" align="left" valign="top"><?php if ($totalRows_fotos > 0) { // Show if recordset not empty ?>
                  <table border="0" cellpadding="2">
                    <tr>
                      <?php
  do { // horizontal looper version 3
?>
                      <td><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{fotos.arquivo}");?>" 
				rel="lightbox[<?php echo $row_fotos['galeria']; ?>]" 
				title="<?php echo $row_fotos['descricao']; ?>"> <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_branca" /></a> </td>
                      <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 6==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
                    </tr>
                  </table>
                <?php } // Show if recordset not empty ?></td>
            </tr>
            <tr>
              <td height="19" align="center" valign="top">&nbsp;
                <table width="50%" border="0" align="center" class="txt_novidades_data">
                  <tr>
                    <td width="31%" align="center"><?php if ($pageNum_fotos > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>">Anterior</a>
                        <?php } // Show if not first page ?>                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_fotos < $totalPages_fotos) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, min($totalPages_fotos, $pageNum_fotos + 1), $queryString_fotos); ?>">Pr&oacute;xima</a>
                        <?php } // Show if not last page ?>                    </td>
                    </tr>
                </table></td>
            </tr>
            
            <tr>
              <td height="19" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="25" align="left" valign="top" class="TITULOS">Mais Galerias de Fotos </td>
            </tr>
            <tr>
              <td height="19" align="left" valign="top">&nbsp;</td>
            </tr>
            
            <tr>
              <td height="19" align="left" valign="top"><?php do { ?>
                  <?php if ($totalRows_RsOutros > 0) { // Show if recordset not empty ?>
                  <table width="100%" border="0" cellpadding="2" cellspacing="4">
                    <tr>
                      <td width="3%" align="left" valign="middle" class="txt_novidades_data"><img src="img/marcador.jpg" width="15" height="15" /></td>
                      <td width="97%" align="left" valign="middle" class="txt_novidades_data"><p><a href="verfotos.php?id=<?php echo $row_RsOutros ['id'];?>"><?php echo $row_RsOutros['titulo']; ?> - <?php echo $row_RsOutros['data']; ?></a></p></td>
                    </tr>
                  </table>
                <?php } // Show if recordset not empty ?>
                  <?php } while ($row_RsOutros = mysql_fetch_assoc($RsOutros)); ?>
                  <?php if ($totalRows_RsOutros == 0) { // Show if recordset empty ?>
                  <table width="100%" border="0" cellspacing="4" cellpadding="0">
                    <tr>
                      <td><span class="txt_novidades_data">Aguarde - Em breve novas fotos!</span></td>
                    </tr>
                  </table>
                <?php } // Show if recordset empty ?></td>
            </tr>
            <tr>
              <td height="287" align="left" valign="top"><p>&nbsp;</p>
                  <p>&nbsp;</p>
                <p>&nbsp;</p></td>
            </tr>
          </table></td>
          <td width="30%" align="left" valign="top" bgcolor="#FFFFFF"><table width="91%" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><img src="img/propagandas/leo2p.jpg" alt="Leo do Som" width="240" height="53" /></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><img src="img/propagandas/peter2p.jpg" alt="Leo do Som" width="240" height="53" /></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="http://www.agitocerto.com" target="_blank"><img src="img/propagandas/agitop.jpg" alt="AgitoCerto.com" width="240" height="53" border="0" /></a><a href="contato.php"></a></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="contato.php"><img src="img/propagandas/anuncie.jpg" alt="Leo do Som" width="240" height="96" border="0" /></a></th>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_4px_azul">
                  <tr>
                    <th scope="col"><a href="contato.php"><img src="img/propagandas/anuncie.jpg" alt="Leo do Som" width="240" height="96" border="0" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle"><img src="../../saquabloco/site/img/png/menu_baixo.png" width="800" height="42" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="../../saquabloco/site/img/png/rodape.png" width="800" height="74" border="0" usemap="#Map2" /></td>
  </tr>
</table>
&nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp; 
<map name="Map" id="Map"><area shape="rect" coords="88,8,154,31" href="../../saquabloco/site/index.php" alt="P&aacute;gina Inicial" />
<area shape="rect" coords="160,8,250,31" href="../../saquabloco/site/novidades" alt="Novidades" />
<area shape="rect" coords="258,8,387,29" href="../../saquabloco/site/fotos" alt="&Aacute;lbum de Fotos" />
<area shape="rect" coords="399,7,470,30" href="../../saquabloco/site/bloco" alt="O Bloco" />
<area shape="rect" coords="478,8,566,32" href="../../saquabloco/site/integrantes" alt="Integrantes" />
<area shape="rect" coords="579,7,692,27" href="../../saquabloco/site/faleconosco" alt="Fale Conosco" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="650,53,754,70" href="http://www.saquabb.com.br/victor" target="_blank" alt="Acesse meu Portif&oacute;lio - Victor Caetano" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsGalerias);

mysql_free_result($fotos);

mysql_free_result($RsOutros);
?>
