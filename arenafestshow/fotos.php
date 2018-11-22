<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$maxRows_RsGalerias = 10;
$pageNum_RsGalerias = 0;
if (isset($_GET['pageNum_RsGalerias'])) {
  $pageNum_RsGalerias = $_GET['pageNum_RsGalerias'];
}
$startRow_RsGalerias = $pageNum_RsGalerias * $maxRows_RsGalerias;

mysql_select_db($database_ConBD, $ConBD);
$query_RsGalerias = "SELECT * FROM galerias ORDER BY id DESC";
$query_limit_RsGalerias = sprintf("%s LIMIT %d, %d", $query_RsGalerias, $startRow_RsGalerias, $maxRows_RsGalerias);
$RsGalerias = mysql_query($query_limit_RsGalerias, $ConBD) or die(mysql_error());
$row_RsGalerias = mysql_fetch_assoc($RsGalerias);

if (isset($_GET['totalRows_RsGalerias'])) {
  $totalRows_RsGalerias = $_GET['totalRows_RsGalerias'];
} else {
  $all_RsGalerias = mysql_query($query_RsGalerias);
  $totalRows_RsGalerias = mysql_num_rows($all_RsGalerias);
}
$totalPages_RsGalerias = ceil($totalRows_RsGalerias/$maxRows_RsGalerias)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/fotos/");
$objDynamicThumb1->setRenameRule("{RsGalerias.imagem}");
$objDynamicThumb1->setResize(100, 75, false);
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
          <td width="70%" height="550" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="6">
            <tr>
              <td width="70%" height="25" align="left" valign="top" class="TITULOS">Galeria de Fotos </td>
            </tr>
            
            <tr>
              <td align="left" valign="top"><?php do { ?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F3F8A8" class="linha_branca">
                    <tr>
                      <td width="16%" height="55" align="left" valign="middle"><table border="0" cellpadding="0" cellspacing="0" width="140">
                        <!-- fwtable fwsrc="fotos.png" fwbase="fotos.jpg" fwstyle="Dreamweaver" fwdocid = "1972568215" fwnested="0" -->
                        <tr>
                          <td><img src="../spacer.gif" width="18" height="1" border="0" alt="" /></td>
                          <td><img src="../spacer.gif" width="100" height="1" border="0" alt="" /></td>
                          <td><img src="../spacer.gif" width="22" height="1" border="0" alt="" /></td>
                          <td><img src="../spacer.gif" width="1" height="1" border="0" alt="" /></td>
                        </tr>
                        <tr>
                          <td colspan="3"><img name="fotos_r1_c1" src="img/fotos_r1_c1.jpg" width="140" height="18" border="0" id="fotos_r1_c1" alt="" /></td>
                          <td><img src="../spacer.gif" width="1" height="18" border="0" alt="" /></td>
                        </tr>
                        <tr>
                          <td><img name="fotos_r2_c1" src="img/fotos_r2_c1.jpg" width="18" height="75" border="0" id="fotos_r2_c1" alt="" /></td>
                          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="verfotos.php?id=<?php echo $row_RsGalerias ['id'];?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_RsGalerias['titulo']; ?>" border="0" /></a><a href="verfotos.php?id=<?php echo $row_RsFotos['id'];?>"></a></td>
                          <td bgcolor="#F3F8A8"><img name="fotos_r2_c3" src="img/fotos_r2_c3.jpg" width="22" height="75" border="0" id="fotos_r2_c3" alt="" /></td>
                          <td><img src="../spacer.gif" width="1" height="75" border="0" alt="" /></td>
                        </tr>
                        <tr>
                          <td colspan="3"><img name="fotos_r3_c1" src="img/fotos_r3_c1.jpg" width="140" height="22" border="0" id="fotos_r3_c1" alt="" /></td>
                          <td><img src="../spacer.gif" width="1" height="22" border="0" alt="" /></td>
                        </tr>
                      </table></td>
                      <td width="84%" align="left" valign="top" bgcolor="#F3F8A8"><span class="txt_novidades_titulo"><a href="verfotos.php?id=<?php echo $row_RsGalerias ['id'];?>"><br />
                        <?php echo $row_RsGalerias['titulo']; ?></a></span><a href="verfotos.php?id=<?php echo $row_RsGalerias ['id'];?>"><span class="txt_novidades_titulo"> - <?php echo $row_RsGalerias['data']; ?></span></a><br />
                          <span class="txt_galeria_descricao"><a href="verfotos.php?id=<?php echo $row_RsGalerias ['id'];?>"><?php echo $row_RsGalerias['descricao']; ?><br />
                        </a></span></td>
                    </tr>
                  </table>
                <?php } while ($row_RsGalerias = mysql_fetch_assoc($RsGalerias)); ?></td>
            </tr>
            <tr>
              <td height="19" align="left" valign="top">&nbsp;</td>
            </tr>
          </table></td>
          <td width="30%" align="left" valign="top"><table width="91%" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
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
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsGalerias);
?>
