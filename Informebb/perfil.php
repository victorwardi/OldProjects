<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_perfil = 15;
$pageNum_perfil = 0;
if (isset($_GET['pageNum_perfil'])) {
  $pageNum_perfil = $_GET['pageNum_perfil'];
}
$startRow_perfil = $pageNum_perfil * $maxRows_perfil;

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil WHERE aprovado = 'y' ORDER BY id DESC";
$query_limit_perfil = sprintf("%s LIMIT %d, %d", $query_perfil, $startRow_perfil, $maxRows_perfil);
$perfil = mysql_query($query_limit_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);

if (isset($_GET['totalRows_perfil'])) {
  $totalRows_perfil = $_GET['totalRows_perfil'];
} else {
  $all_perfil = mysql_query($query_perfil);
  $totalRows_perfil = mysql_num_rows($all_perfil);
}
$totalPages_perfil = ceil($totalRows_perfil/$maxRows_perfil)-1;

$queryString_perfil = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_perfil") == false && 
        stristr($param, "totalRows_perfil") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_perfil = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_perfil = sprintf("&totalRows_perfil=%d%s", $totalRows_perfil, $queryString_perfil);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellpadding="2" cellspacing="8">
            <tr>
              <td height="16" align="left" valign="middle" bgcolor="#FFFFFF" class="Titulo_Branco"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                <tr>
                  <th align="left" valign="middle" scope="col"><img src="imagens/recorte/titulos/bodyboarders.jpg" alt="bodyboarders" width="300" height="40" border="0" /></th>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="136" bgcolor="#FFFFFF"><table width="133" border="0" cellpadding="0" cellspacing="6">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                    <td width="130"><table width="121" border="0" cellspacing="4" cellpadding="2">
                        <tr>
                          <td width="109" height="100" align="center" valign="top"><table width="10" border="0" cellpadding="0" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                              <tr>
                                <td><a href="exibir_perfil.php?id=<?php echo $row_perfil['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{perfil.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="borda_foto_noticia" /></a></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25" align="center" valign="top" class="fonte_titulo_not"><?php echo $row_perfil['nome']; ?></td>
                        </tr>
                    </table></td>
                    <?php
    $row_perfil = mysql_fetch_assoc($perfil);
    if (!isset($nested_perfil)) {
      $nested_perfil= 1;
    }
    if (isset($row_perfil) && is_array($row_perfil) && $nested_perfil++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_perfil); //end horizontal looper version 3
?>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="14" align="center" valign="middle">Voc&ecirc; est&aacute; vendo do bodyboarder <span class="fonte_titulo_not"><?php echo ($startRow_perfil + 1) ?></span> ao bodyboarder <span class="fonte_titulo_not"><?php echo min($startRow_perfil + $maxRows_perfil, $totalRows_perfil) ?></span> em um total de <span class="fonte_titulo_not"><?php echo $totalRows_perfil ?> </span> bodyboarders.&nbsp;
                  <table border="0" width="50%" align="center">
                    <tr>
                      <td width="23%" height="41" align="center" class="fonte_not"><?php if ($pageNum_perfil > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, 0, $queryString_perfil); ?>">Primeira</a>
                          <?php } // Show if not first page ?>
                      </td>
                      <td width="31%" align="center" class="fonte_not"><?php if ($pageNum_perfil > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, max(0, $pageNum_perfil - 1), $queryString_perfil); ?>">Anterior</a>
                          <?php } // Show if not first page ?>
                      </td>
                      <td width="23%" align="center" class="fonte_not"><?php if ($pageNum_perfil < $totalPages_perfil) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, min($totalPages_perfil, $pageNum_perfil + 1), $queryString_perfil); ?>">Pr&oacute;xima</a>
                          <?php } // Show if not last page ?>
                      </td>
                      <td width="23%" align="center" class="fonte_not"><?php if ($pageNum_perfil < $totalPages_perfil) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_perfil=%d%s", $currentPage, $totalPages_perfil, $queryString_perfil); ?>">&Uacute;ltima</a>
                          <?php } // Show if not last page ?>
                      </td>
                    </tr>
                </table></td>
            </tr>
            <tr>
              <td height="123" align="center" valign="bottom"><img src="imagens/cadastre-se2.jpg" alt="cadastre-se" width="570" height="100" border="0" usemap="#Map" class="borda_tabela" />
                  <map name="Map" id="Map">
                    <area shape="rect" coords="439,58,571,99" href="javascript:abrir_janela('perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')" />
                </map></td>
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
        <td width="889" height="53" align="center" valign="top" background="imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/recorte/rodape.jpg" width="900" height="92" /></td>
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
mysql_free_result($perfil);
?>