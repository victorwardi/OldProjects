<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias WHERE coluna = 'bblagos' ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

$maxRows_fotos = 5;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'bblagos' ORDER BY id_foto DESC";
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <th colspan="2" background="imagens/topo.jpg" bgcolor="#FFFFFF" scope="col"><table width="100%" height="102" border="4" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th width="65%" height="259" align="center" valign="top" scope="col"><table width="400" border="0" cellpadding="4" cellspacing="0">
                <tr>
                  <th bgcolor="#FFFFFF" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{noticias.imagem}");?>" border="0" /></a></th>
                </tr>
                <tr>
                  <th height="25" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><span class="tiutlo_not"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="perfil_nome"><?php echo substr($row_noticias['titulo'] ,0,100).""; ?></a></span></th>
                </tr>
                <tr>
                  <th align="left" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th align="left" valign="middle" bgcolor="#017C9E" scope="col"><span class="mais_festa">Mais Not&iacute;cas </span></th>
                </tr>
                <tr>
                  <th align="left" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><?php do { ?>
                    <table width="400" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                      <tr>
                        <th width="92" align="center" valign="top" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"></a>
                            <table width="100" border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
                              <tr>
                                <th scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}", 100, 0, true); ?>" border="0" /></a></th>
                              </tr>
                          </table></th>
                        <th width="300" align="left" valign="top" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_titulo_not"><?php echo substr($row_noticias['titulo'] ,0,100).""; ?><br />
                        </a><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><?php echo $row_noticias['data']; ?></a></th>
                      </tr>
                    </table>
                    <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
                    <p></p></th>
                </tr>
                <tr>
                  <th align="center" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th height="20" align="right" valign="middle" bgcolor="#017C9E" scope="col"><span class="mais_festa">+ Arquivo de Not&iacute;cias</span></th>
                </tr>
                
                
              </table>
                <br />                </th>
              <th width="35%" align="center" valign="top" bgcolor="#FFFFFF" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="4">
                <tr>
                  <th height="20" align="left" valign="middle" bgcolor="#017C9E" class="mais_festa" scope="col">Fotos das Etapas </th>
                </tr>
                
                <tr>
                  <th height="83" scope="col"><?php do { ?>
                      <img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{fotos.arquivo}", 184, 0, true); ?>" /><br />
                      <br />
                      <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>
                    <br /></th>
                </tr>
                
                
              </table>
              <br />
              <table width="100%" border="0" cellpadding="2" cellspacing="2">
                <tr>
                  <th height="49" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th bgcolor="#017C9E" scope="col"><p>&nbsp;</p>
                      <p>&nbsp;</p></th>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
            </tr>
            
            <tr>
              <th height="20" align="right" valign="middle" class="mais_festa" scope="col">&nbsp;</th>
              <th scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th colspan="2" scope="col">&nbsp;</th>
            </tr>
        </table>
        <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($noticias);

mysql_free_result($fotos);

mysql_free_result($foto);
?>