<?php require_once('Connections/ConBD.php'); ?>
<?php
$colname_RsEventos = "-1";
if (isset($_GET['id'])) {
  $colname_RsEventos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsEventos = sprintf("SELECT * FROM evento WHERE id = %s ORDER BY id DESC", $colname_RsEventos);
$RsEventos = mysql_query($query_RsEventos, $ConBD) or die(mysql_error());
$row_RsEventos = mysql_fetch_assoc($RsEventos);
$totalRows_RsEventos = mysql_num_rows($RsEventos);
?>
<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

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
          <td width="65%" height="544" align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="25" class="TITULOS"><?php echo $row_RsEventos['titulo']; ?></td>
            </tr>
          </table>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
              <tr>
                <td width="70%" height="40" align="left" valign="middle" bgcolor="#F3F8A6"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{RsEventos.banner}");?>" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="txt_novidades_titulo"></td>
              </tr>
              <tr>
                <td align="left" valign="top"></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="top" class="recado"><?php echo $row_RsEventos['descricao']; ?></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top"><p>&nbsp;</p></td>
              </tr>
          </table></td>
          <td width="35%" align="left" valign="top" bgcolor="#FFFFFF"><table width="98%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F3F8A6">
              <tr>
                <td height="25" align="center" valign="top" bgcolor="#FFFFFF" class="TITULOS">Informa&ccedil;&otilde;es</td>
              </tr>
              <tr>
                <td align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="4" cellspacing="4" bgcolor="#F3F8A6">
                  <tr>
                    <td align="left" valign="middle" class="txt_galeria_descricao">Evento: <span class="recado"><?php echo $row_RsEventos['titulo']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="txt_galeria_descricao">Data: <span class="recado"><?php echo $row_RsEventos['data']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="txt_galeria_descricao">Hor&aacute;rio:</span> <span class="recado"><?php echo $row_RsEventos['horario']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="recado"><span class="txt_galeria_descricao">Local:</span> <?php echo $row_RsEventos['local']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="txt_galeria_descricao">Endere&ccedil;o:</span> <span class="recado"><?php echo $row_RsEventos['endereco']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><p class="txt_galeria_descricao">Atra&ccedil;&otilde;es:</p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="recado"><?php echo $row_RsEventos['atracoes']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><p class="txt_galeria_descricao">Pontos de vendas:</p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="recado"><?php echo $row_RsEventos['postosvendas']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="txt_galeria_descricao">Pre&ccedil;o:</span> <span class="recado"><?php echo $row_RsEventos['precos']; ?></span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><span class="txt_galeria_descricao">Mais Informa&ccedil;&otilde;es:</span> <span class="recado"><?php echo $row_RsEventos['informacao']; ?></span></td>
                  </tr>
                  <tr>
                    <td height="42" align="left" valign="middle">&nbsp;</td>
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
mysql_free_result($RsEventos);
?>