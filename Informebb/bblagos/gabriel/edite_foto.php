<?php require_once('../../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listfotos6 = new TFI_TableFilter($conn_saquabb, "tfi_listfotos6");
$tfi_listfotos6->addColumn("fotos.id_foto", "NUMERIC_TYPE", "id_foto", "=");
$tfi_listfotos6->addColumn("fotos.arquivo", "NUMERIC_TYPE", "arquivo", "=");
$tfi_listfotos6->addColumn("fotos.descricao", "STRING_TYPE", "descricao", "%");
$tfi_listfotos6->Execute();

// Sorter
$tso_listfotos6 = new TSO_TableSorter("rsfotos1", "tso_listfotos6");
$tso_listfotos6->addColumn("fotos.id_foto");
$tso_listfotos6->addColumn("fotos.arquivo");
$tso_listfotos6->addColumn("fotos.descricao");
$tso_listfotos6->setDefault("fotos.id_foto DESC");
$tso_listfotos6->Execute();

// Navigation
$nav_listfotos6 = new NAV_Regular("nav_listfotos6", "rsfotos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotos1 = $_SESSION['max_rows_nav_listfotos6'];
$pageNum_rsfotos1 = 0;
if (isset($_GET['pageNum_rsfotos1'])) {
  $pageNum_rsfotos1 = $_GET['pageNum_rsfotos1'];
}
$startRow_rsfotos1 = $pageNum_rsfotos1 * $maxRows_rsfotos1;

$NXTFilter_rsfotos1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotos6'])) {
  $NXTFilter_rsfotos1 = $_SESSION['filter_tfi_listfotos6'];
}
$NXTSort_rsfotos1 = "fotos.id_foto DESC";
if (isset($_SESSION['sorter_tso_listfotos6'])) {
  $NXTSort_rsfotos1 = $_SESSION['sorter_tso_listfotos6'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsfotos1 = sprintf("SELECT fotos.id_foto, fotos.arquivo, fotos.descricao FROM fotos WHERE galeria = 'gabriel'  ORDER BY %s", $NXTFilter_rsfotos1, $NXTSort_rsfotos1);
$query_limit_rsfotos1 = sprintf("%s LIMIT %d, %d", $query_rsfotos1, $startRow_rsfotos1, $maxRows_rsfotos1);
$rsfotos1 = mysql_query($query_limit_rsfotos1, $saquabb) or die(mysql_error());
$row_rsfotos1 = mysql_fetch_assoc($rsfotos1);

if (isset($_GET['totalRows_rsfotos1'])) {
  $totalRows_rsfotos1 = $_GET['totalRows_rsfotos1'];
} else {
  $all_rsfotos1 = mysql_query($query_rsfotos1);
  $totalRows_rsfotos1 = mysql_num_rows($all_rsfotos1);
}
$totalPages_rsfotos1 = ceil($totalRows_rsfotos1/$maxRows_rsfotos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotos6->checkBoundries();
?>
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

$MM_restrictGoTo = "index.php";
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
          <script src="../../includes/common/js/base.js" type="text/javascript"></script>
          <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
          <script src="../../includes/skins/style.js" type="text/javascript"></script>
          <script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
          <script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
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
  .KT_col_id_foto {width:140px; overflow:hidden;}
  .KT_col_arquivo {width:140px; overflow:hidden;}
  .KT_col_descricao {width:140px; overflow:hidden;}
          </style>
<table width="100%" border="0" cellpadding="4" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <th bgcolor="#FFFFFF" scope="col"><div class="KT_tng" id="listfotos6">
                <h1 class="perfil_nome"> Fotos
                    <?php
  $nav_listfotos6->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                  </h1>
                  <div class="KT_tnglist">
                    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                      <div class="KT_options"> <a href="<?php echo $nav_listfotos6->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotos6'] == 1) {
?>
                          <?php echo $_SESSION['default_max_rows_nav_listfotos6']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotos6'] == 1) {
?>
                              <a href="<?php echo $tfi_listfotos6->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfotos6->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                      </div>
                      <table border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" class="KT_tngtable">
                        <thead>
                          <tr class="KT_row_order">
                            <th align="center" bgcolor="#017C9E"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                            </th>
                            <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_arquivo <?php echo $tso_listfotos6->getSortIcon('fotos.arquivo'); ?>" id="arquivo"> <a href="<?php echo $tso_listfotos6->getSortLink('fotos.arquivo'); ?>">Arquivo</a> </th>
                            <th align="center" bgcolor="#017C9E" class="KT_sorter KT_col_descricao <?php echo $tso_listfotos6->getSortIcon('fotos.descricao'); ?>" id="descricao"> <a href="<?php echo $tso_listfotos6->getSortLink('fotos.descricao'); ?>">Descricao</a> </th>
                            <th align="center" bgcolor="#017C9E">&nbsp;</th>
                          </tr>
                          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotos6'] == 1) {
?>
                            <tr class="KT_row_filter">
                              <td>&nbsp;</td>
                              <td><input type="text" name="tfi_listfotos6_arquivo" id="tfi_listfotos6_arquivo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos6_arquivo']); ?>" size="20" maxlength="50" /></td>
                              <td><input type="text" name="tfi_listfotos6_descricao" id="tfi_listfotos6_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos6_descricao']); ?>" size="20" maxlength="50" /></td>
                              <td><input type="submit" name="tfi_listfotos6" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                            </tr>
                            <?php } 
  // endif Conditional region3
?>
                        </thead>
                        <tbody>
                          <?php if ($totalRows_rsfotos1 == 0) { // Show if recordset empty ?>
                            <tr>
                              <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                            </tr>
                            <?php } // Show if recordset empty ?>
                          <?php if ($totalRows_rsfotos1 > 0) { // Show if recordset not empty ?>
                            <?php do { ?>
                              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                <td align="center"><input type="checkbox" name="kt_pk_fotos" class="id_checkbox" value="<?php echo $row_rsfotos1['id_foto']; ?>" />
                                    <input type="hidden" name="id_foto" class="id_field" value="<?php echo $row_rsfotos1['id_foto']; ?>" />
                                </td>
                                <td align="center"><div class="KT_col_arquivo"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsfotos1.arquivo}", 80, 60, false); ?>" /></div></td>
                                <td align="center"><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rsfotos1['descricao'], 20); ?></div></td>
                                <td align="center"><a class="KT_edit_link" href="add_foto.php?id_foto=<?php echo $row_rsfotos1['id_foto']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                              </tr>
                              <?php } while ($row_rsfotos1 = mysql_fetch_assoc($rsfotos1)); ?>
                            <?php } // Show if recordset not empty ?>
                        </tbody>
                      </table>
                      <div class="KT_bottomnav">
                        <div>
                          <?php
            $nav_listfotos6->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                        </div>
                      </div>
                      <div class="KT_bottombuttons">
                        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
                        <span>&nbsp;</span>
                        <select name="no_new" id="no_new">
                          <option value="1">1</option>
                          <option value="3">3</option>
                          <option value="6">6</option>
                        </select>
                        <a class="KT_additem_op_link" href="add_foto.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                    </form>
                  </div>
                  <br class="clearfixplain" />
                </div>
              <p>&nbsp;</p></th>
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
        <td width="889" height="53" align="center" valign="top" background="../../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
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
mysql_free_result($rsfotos1);
?>
