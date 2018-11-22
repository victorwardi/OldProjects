<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_fotos = 20;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

$colname_fotos = "-1";
if (isset($_GET['galeria'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['galeria'] : addslashes($_GET['galeria']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_fotos = sprintf("SELECT * FROM fotos WHERE galeria = '%s' ORDER BY id_foto DESC", $colname_fotos);
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

$colname_galeria = "-1";
if (isset($_GET['nome'])) {
  $colname_galeria = (get_magic_quotes_gpc()) ? $_GET['nome'] : addslashes($_GET['nome']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_galeria = sprintf("SELECT * FROM galeria WHERE nome = '%s'", $colname_galeria);
$galeria = mysql_query($query_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

$colname_outras = "-1";
if (isset($_GET['nome'])) {
  $colname_outras = (get_magic_quotes_gpc()) ? $_GET['nome'] : addslashes($_GET['nome']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_outras = sprintf("SELECT * FROM galeria WHERE nome <> '%s' ORDER BY id DESC", $colname_outras);
$outras = mysql_query($query_outras, $saquabb) or die(mysql_error());
$row_outras = mysql_fetch_assoc($outras);
$totalRows_outras = mysql_num_rows($outras);

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.borda_foto {	border: 1px solid #000000;
}
a:active {
	color: #017C9E;
}
-->
</style>
<!-- InstanceEndEditable -->
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
          <table width="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_laranja_4px">
                <tr>
                  <th align="left" valign="middle" scope="col"><img src="imagens/recorte/titulos/galeria.jpg" alt="Galeria de Fotos" width="300" height="40" border="0" /></th>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="perfil_nome"><?php echo $_GET['galeria'] ?></td>
            </tr>
            <tr>
              <td align="left" valign="top"><table border="0" cellpadding="2">
                <tr>
                  <?php
  do { // horizontal looper version 3
?>
                  <td><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{fotos.arquivo}");?>" 
				rel="lightbox[<?php echo $row_fotos['galeria']; ?>]" 
				title="<?php echo $row_fotos['descricao']; ?> - Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?>"> <img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{fotos.arquivo}", 140, 110, false); ?>" width="115" height="86" border="0" class="borda_foto_noticia" /></a> </td>
                  <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
                </tr>
              </table>
                <br />
                <table border="0" width="50%" align="center">
                  <tr>
                    <td align="center" valign="middle" class="perfil_nome"><?php if ($pageNum_fotos < $totalPages_fotos) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, min($totalPages_fotos, $pageNum_fotos + 1), $queryString_fotos); ?>" class="fonte_titulo_not">Pr&oacute;xima P&aacute;gina</a>
                      <?php } // Show if not last page ?></td>
                  </tr>
                  <tr>
                    <td width="31%" align="center" valign="middle" class="fonte_titulo_not"><?php if ($pageNum_fotos > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>" class="fonte_titulo_not">P&aacute;gina Anterior </a>
                          <?php } // Show if not first page ?>                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td height="66" align="center" valign="top" bgcolor="#FFFFFF" class="mais_festa"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <th align="left" valign="middle" bgcolor="#EE9106" scope="col">* Outras Galerias </th>
                </tr>
                <tr>
                  <th align="left" valign="middle" scope="col"> <table width="295" border="0">
                    <tr>
                      <?php
  do { // horizontal looper version 3
?>
                        <td width="302"><table width="289" border="0" cellspacing="0" cellpadding="4">
                            <tr>
                              <th width="38" align="center" valign="middle" scope="col"><a href="galeria.php?galeria=<?php echo $row_outras['nome']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{outras.imagem}",40,30, false); ?>" border="0" class="borda_foto_noticia" /></a></th>
                              <th width="235" align="left" valign="middle" class="fonte_titulo_not" scope="col"><?php echo $row_outras['nome']; ?></th>
                            </tr>
                        </table></td>
                        <?php
    $row_outras = mysql_fetch_assoc($outras);
    if (!isset($nested_outras)) {
      $nested_outras= 1;
    }
    if (isset($row_outras) && is_array($row_outras) && $nested_outras++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_outras); //end horizontal looper version 3
?>
                    </tr>
                  </table></th>
                </tr>
              </table></td>
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
mysql_free_result($outras);

mysql_free_result($fotos);

mysql_free_result($galeria);

mysql_free_result($outras);
?>