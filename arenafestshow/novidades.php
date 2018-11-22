<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_RsNovidades = 10;
$pageNum_RsNovidades = 0;
if (isset($_GET['pageNum_RsNovidades'])) {
  $pageNum_RsNovidades = $_GET['pageNum_RsNovidades'];
}
$startRow_RsNovidades = $pageNum_RsNovidades * $maxRows_RsNovidades;

mysql_select_db($database_ConBD, $ConBD);
$query_RsNovidades = "SELECT * FROM novidades ORDER BY id DESC";
$query_limit_RsNovidades = sprintf("%s LIMIT %d, %d", $query_RsNovidades, $startRow_RsNovidades, $maxRows_RsNovidades);
$RsNovidades = mysql_query($query_limit_RsNovidades, $ConBD) or die(mysql_error());
$row_RsNovidades = mysql_fetch_assoc($RsNovidades);

if (isset($_GET['totalRows_RsNovidades'])) {
  $totalRows_RsNovidades = $_GET['totalRows_RsNovidades'];
} else {
  $all_RsNovidades = mysql_query($query_RsNovidades);
  $totalRows_RsNovidades = mysql_num_rows($all_RsNovidades);
}
$totalPages_RsNovidades = ceil($totalRows_RsNovidades/$maxRows_RsNovidades)-1;

$queryString_RsNovidades = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsNovidades") == false && 
        stristr($param, "totalRows_RsNovidades") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsNovidades = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsNovidades = sprintf("&totalRows_RsNovidades=%d%s", $totalRows_RsNovidades, $queryString_RsNovidades);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsNovidades.imagem}");
$objDynamicThumb1->setResize(100, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____ Arena Fest _________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="134" align="center" valign="top">
	<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','900','height','134','src','flash/topo','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','flash/topo' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="900" height="134">
      <param name="movie" value="flash/topo.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="900" height="134"></embed>
    </object>
    </noscript></td>
  </tr>
  <tr>
    <td height="56" align="center" valign="top"><img src="img/menu2.jpg" width="900" height="56" border="0" usemap="#Map" /></td>
  </tr>
  
  <tr>
    <td height="216" align="center" valign="top" background="img/fundo_meio.jpg"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr>
          <td width="70%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="6">
            <tr>
              <td width="70%" height="25" align="left" valign="middle" class="TITULOS">Novidades</td>
            </tr>
            <tr>
              <td align="left" valign="top"><?php do { ?>
                  <table width="100%" border="0" cellpadding="2" cellspacing="6" class="borda_solid">
                    <tr>
                      <td width="4%" align="left" valign="middle" class="txt_novidades_titulo"><a href="novidade.php?id=<?php echo $row_RsNovidades['id']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_RsNovidades['titulo']; ?>" border="0" class="borda_branca" /></a></td>
                      <td width="96%" align="left" valign="middle" class="txt_novidades_titulo"><a href="novidade.php?id=<?php echo $row_RsNovidades['id']; ?>"><?php echo $row_RsNovidades['titulo']; ?> - <?php echo $row_RsNovidades['data']; ?></a></td>
                    </tr>
                  </table>
                <?php } while ($row_RsNovidades = mysql_fetch_assoc($RsNovidades)); ?></td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="50%" border="0" align="center" class="txt_novidades_data">
                  <tr>
                    <td width="31%" align="center"><?php if ($pageNum_RsNovidades > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_RsNovidades=%d%s", $currentPage, max(0, $pageNum_RsNovidades - 1), $queryString_RsNovidades); ?>">Anterior</a>
                        <?php } // Show if not first page ?>                    </td>
                    <td width="23%" align="center"><?php if ($pageNum_RsNovidades < $totalPages_RsNovidades) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_RsNovidades=%d%s", $currentPage, min($totalPages_RsNovidades, $pageNum_RsNovidades + 1), $queryString_RsNovidades); ?>">Pr&oacute;xima</a>
                        <?php } // Show if not last page ?>                    </td>
                    </tr>
                </table></td>
            </tr>
            <tr>
              <td height="19" align="left" valign="top">&nbsp;</td>
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
    <td height="150" align="center" valign="top"><img src="img/base.jpg" width="900" height="150" border="0" usemap="#Map2" /></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="rect" coords="8,3,48,29" href="index.php" alt="Home" />
<area shape="rect" coords="57,3,127,29" href="eventos.php" alt="Eventos" />
<area shape="rect" coords="133,4,184,30" href="fotos.php" alt="Fotos" />
<area shape="rect" coords="193,4,273,30" href="novidades.php" alt="Novidades" />
<area shape="rect" coords="284,3,385,30" href="patrocinios.php" alt="Patroc&iacute;nios" />
<area shape="rect" coords="394,3,483,30" href="quemsomos.php" alt="Quem Somos" />
<area shape="rect" coords="492,4,541,29" href="arena.php" alt="Arena" />
<area shape="rect" coords="551,1,621,30" href="contato.php" alt="Contato" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="28,111,261,141" href="http://www.saquabb.com.br/victor" alt="Webdesign: Victor Caetano" />
</map></body><!-- InstanceEnd -->
</html>
<?php
mysql_free_result($RsNovidades);
?>
