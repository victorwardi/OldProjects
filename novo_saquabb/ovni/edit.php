<?php require_once('../Connections/saquabb.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "erro.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listovni2 = new TFI_TableFilter($conn_saquabb, "tfi_listovni2");
$tfi_listovni2->addColumn("ovni.id", "NUMERIC_TYPE", "id", "=");
$tfi_listovni2->addColumn("ovni.foto1", "STRING_TYPE", "foto1", "%");
$tfi_listovni2->addColumn("ovni.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listovni2->addColumn("ovni.data", "STRING_TYPE", "data", "%");
$tfi_listovni2->Execute();

// Sorter
$tso_listovni2 = new TSO_TableSorter("rsovni1", "tso_listovni2");
$tso_listovni2->addColumn("ovni.id");
$tso_listovni2->addColumn("ovni.foto1");
$tso_listovni2->addColumn("ovni.titulo");
$tso_listovni2->addColumn("ovni.data");
$tso_listovni2->setDefault("ovni.id DESC");
$tso_listovni2->Execute();

// Navigation
$nav_listovni2 = new NAV_Regular("nav_listovni2", "rsovni1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsovni1 = $_SESSION['max_rows_nav_listovni2'];
$pageNum_rsovni1 = 0;
if (isset($_GET['pageNum_rsovni1'])) {
  $pageNum_rsovni1 = $_GET['pageNum_rsovni1'];
}
$startRow_rsovni1 = $pageNum_rsovni1 * $maxRows_rsovni1;

$NXTFilter_rsovni1 = "1=1";
if (isset($_SESSION['filter_tfi_listovni2'])) {
  $NXTFilter_rsovni1 = $_SESSION['filter_tfi_listovni2'];
}
$NXTSort_rsovni1 = "ovni.id DESC";
if (isset($_SESSION['sorter_tso_listovni2'])) {
  $NXTSort_rsovni1 = $_SESSION['sorter_tso_listovni2'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsovni1 = sprintf("SELECT ovni.id, ovni.foto1, ovni.titulo, ovni.data FROM ovni WHERE %s ORDER BY %s", $NXTFilter_rsovni1, $NXTSort_rsovni1);
$query_limit_rsovni1 = sprintf("%s LIMIT %d, %d", $query_rsovni1, $startRow_rsovni1, $maxRows_rsovni1);
$rsovni1 = mysql_query($query_limit_rsovni1, $saquabb) or die(mysql_error());
$row_rsovni1 = mysql_fetch_assoc($rsovni1);

if (isset($_GET['totalRows_rsovni1'])) {
  $totalRows_rsovni1 = $_GET['totalRows_rsovni1'];
} else {
  $all_rsovni1 = mysql_query($query_rsovni1);
  $totalRows_rsovni1 = mysql_num_rows($all_rsovni1);
}
$totalPages_rsovni1 = ceil($totalRows_rsovni1/$maxRows_rsovni1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listovni2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: true,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto1 {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:260px;
	height:70px;
	z-index:1;
	left: 17px;
	top: 21px;
	background-color: #FFFF33;
	overflow: hidden;
}
-->
</style>
</head>
<script language="JavaScript" src="../java.js"></script>
<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-1";
urchinTracker();
</script>
<table width="601" height="396" border="0" align="center" cellpadding="0" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../carnaporto/index.php"></a><img src="../imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="140" align="center" valign="top" bgcolor="#E6F9FD"><table border="0" cellpadding="0" cellspacing="8" class="conteudo_esquerdo_borda_meio">
          <tr>
            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Principal</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="8"><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td width="106" align="left" valign="middle" class="fonte_not"><a href="../index.php">Home</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../arquivo.php">Arquivo de Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../galerias.php">Galerias de Fotos</a> </td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../videos.php">V&iacute;deos</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../perfil.php">Perfil dos Atletas </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../contato.php">Fale Conosco </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">BBLagos</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/gabriel/gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">OVNI</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="galeria.php">Galeria de Fotos </a></td>
          </tr>
          
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Saquabb Girls </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../girls/index.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Variedades</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../festas/index.php">Fotos das Festas </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../vemai.php">Vem a&iacute;... </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../festa_anuncio.php">Anuncie sua Festa </a></td>
          </tr>
        </table>
          <table width="140" border="0" cellpadding="0" cellspacing="2" bgcolor="#E6F9FD">
            <tr>
              <td width="133" height="21" align="left" valign="middle"><img src="../imagens/titulos/publicidade.jpg" width="128" height="16" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="../imagens/publicidade/logorb.jpg" alt="RB Provider" width="120" height="38" border="0" /></a></td>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.saqua.com.br"><img src="../imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="120" height="45" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.redsdesign.com.br"><img src="../imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="120" height="35" border="0" longdesc="http://www.redsdesign.com.br" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.gnunes.net"><img src="../imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="120" height="35" border="0" class="borda_tabela" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        <br /></td>
        <td width="627" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
        <div class="KT_tng" id="listovni2">
          <h1 class="tiutlo_not"> Gabriel
            <?php
  $nav_listovni2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
          </h1>
          <div class="KT_tnglist">
            <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
              <div class="KT_options"> <a href="<?php echo $nav_listovni2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listovni2'] == 1) {
?>
                  <?php echo $_SESSION['default_max_rows_nav_listovni2']; ?>
                  <?php 
  // else Conditional region1
  } else { ?>
                  <?php echo NXT_getResource("all"); ?>
                  <?php } 
  // endif Conditional region1
?>
                    <?php echo NXT_getResource("records"); ?></a> &nbsp;
                &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listovni2'] == 1) {
?>
                              <a href="<?php echo $tfi_listovni2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listovni2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
              </div>
              <table border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" class="KT_tngtable">
                <thead>
                  <tr class="KT_row_order">
                    <th bgcolor="#017C9E" class="comentario"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                    </th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="foto1"> <a href="<?php echo $tso_listovni2->getSortLink('ovni.foto1'); ?>" class="Titulo_Branco">Foto</a></th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="titulo"> <a href="<?php echo $tso_listovni2->getSortLink('ovni.titulo'); ?>" class="Titulo_Branco">Titulo</a> </th>
                    <th align="center" valign="middle" bgcolor="#017C9E" class="comentario" id="data"> <a href="<?php echo $tso_listovni2->getSortLink('ovni.data'); ?>" class="Titulo_Branco">Data</a> </th>
                    <th bgcolor="#017C9E" class="comentario">&nbsp;</th>
                  </tr>
                  <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listovni2'] == 1) {
?>
                    <tr class="KT_row_filter">
                      <td>&nbsp;</td>
                      <td><input type="text" name="tfi_listovni2_foto1" id="tfi_listovni2_foto1" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listovni2_foto1']); ?>" size="10" maxlength="50" /></td>
                      <td><input type="text" name="tfi_listovni2_titulo" id="tfi_listovni2_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listovni2_titulo']); ?>" size="40" maxlength="60" /></td>
                      <td><input type="text" name="tfi_listovni2_data" id="tfi_listovni2_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listovni2_data']); ?>" size="20" maxlength="20" /></td>
                      <td><input type="submit" name="tfi_listovni2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                    </tr>
                    <?php } 
  // endif Conditional region3
?>
                </thead>
                <tbody>
                  <?php if ($totalRows_rsovni1 == 0) { // Show if recordset empty ?>
                    <tr>
                      <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                    </tr>
                    <?php } // Show if recordset empty ?>
                  <?php if ($totalRows_rsovni1 > 0) { // Show if recordset not empty ?>
                    <?php do { ?>
                      <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                        <td><input type="checkbox" name="kt_pk_ovni" class="id_checkbox" value="<?php echo $row_rsovni1['id']; ?>" />
                            <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsovni1['id']; ?>" />
                        </td>
                        <td align="center"><div class="KT_col_foto1"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{rsovni1.foto1}", 80, 60, false); ?>" /></div></td>
                        <td align="center"><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsovni1['titulo'], 40); ?></div></td>
                        <td align="center"><div class="KT_col_data"><?php echo KT_FormatForList($row_rsovni1['data'], 20); ?></div></td>
                        <td><a class="KT_edit_link" href="add.php?id=<?php echo $row_rsovni1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                      </tr>
                      <?php } while ($row_rsovni1 = mysql_fetch_assoc($rsovni1)); ?>
                    <?php } // Show if recordset not empty ?>
                </tbody>
              </table>
              <div class="KT_bottomnav">
                <div class="comentario">
                  
                  <div align="justify">
                    <?php
            $nav_listovni2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                  </div>
                </div>
              </div>
              <div class="KT_bottombuttons">
                <div class="KT_operations"> 
                  <div align="center">
                    <p align="left"><a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></p>
                  </div>
                </div>
                <div align="left"><span>&nbsp;</span>
                  <select name="no_new" id="no_new">
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                  </select>
                  <a class="KT_additem_op_link" href="add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
              </div>
            </form>
          </div>
          <br class="clearfixplain" />
        </div>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
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
mysql_free_result($rsovni1);
?>