<?php require_once('../../Connections/xpress.php'); ?>
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
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Filter
$tfi_listnoticias1 = new TFI_TableFilter($conn_xpress, "tfi_listnoticias1");
$tfi_listnoticias1->addColumn("noticias.titulo", "STRING_TYPE", "data", "%");
$tfi_listnoticias1->addColumn("noticias.data", "STRING_TYPE", "titulo", "%");
$tfi_listnoticias1->addColumn("noticias.fonte", "STRING_TYPE", "materia", "%");
$tfi_listnoticias1->addColumn("noticias.materia", "STRING_TYPE", "fonte", "%");
$tfi_listnoticias1->addColumn("noticias.foto", "FILE_TYPE", "foto", "%");
$tfi_listnoticias1->Execute();

// Sorter
$tso_listnoticias1 = new TSO_TableSorter("rsnoticias1", "tso_listnoticias1");
$tso_listnoticias1->addColumn("noticias.titulo");
$tso_listnoticias1->addColumn("noticias.data");
$tso_listnoticias1->addColumn("noticias.fonte");
$tso_listnoticias1->addColumn("noticias.materia");
$tso_listnoticias1->addColumn("noticias.foto");
$tso_listnoticias1->setDefault("noticias.data DESC");
$tso_listnoticias1->Execute();

// Navigation
$nav_listnoticias1 = new NAV_Regular("nav_listnoticias1", "rsnoticias1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsnoticias1 = $_SESSION['max_rows_nav_listnoticias1'];
$pageNum_rsnoticias1 = 0;
if (isset($_GET['pageNum_rsnoticias1'])) {
  $pageNum_rsnoticias1 = $_GET['pageNum_rsnoticias1'];
}
$startRow_rsnoticias1 = $pageNum_rsnoticias1 * $maxRows_rsnoticias1;

$NXTFilter_rsnoticias1 = "1=1";
if (isset($_SESSION['filter_tfi_listnoticias1'])) {
  $NXTFilter_rsnoticias1 = $_SESSION['filter_tfi_listnoticias1'];
}
$NXTSort_rsnoticias1 = "noticias.data DESC";
if (isset($_SESSION['sorter_tso_listnoticias1'])) {
  $NXTSort_rsnoticias1 = $_SESSION['sorter_tso_listnoticias1'];
}
mysql_select_db($database_xpress, $xpress);

$query_rsnoticias1 = sprintf("SELECT noticias.titulo, noticias.data, noticias.fonte, noticias.materia, noticias.foto, noticias.id FROM noticias WHERE %s ORDER BY %s", $NXTFilter_rsnoticias1, $NXTSort_rsnoticias1);
$query_limit_rsnoticias1 = sprintf("%s LIMIT %d, %d", $query_rsnoticias1, $startRow_rsnoticias1, $maxRows_rsnoticias1);
$rsnoticias1 = mysql_query($query_limit_rsnoticias1, $xpress) or die(mysql_error());
$row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1);

if (isset($_GET['totalRows_rsnoticias1'])) {
  $totalRows_rsnoticias1 = $_GET['totalRows_rsnoticias1'];
} else {
  $all_rsnoticias1 = mysql_query($query_rsnoticias1);
  $totalRows_rsnoticias1 = mysql_num_rows($all_rsnoticias1);
}
$totalPages_rsnoticias1 = ceil($totalRows_rsnoticias1/$maxRows_rsnoticias1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnoticias1->checkBoundries();
?><?php
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

$MM_restrictGoTo = "../index.php";
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_data {width:70px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_materia {width:140px; overflow:hidden;}
  .KT_col_fonte {width:105px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
</style>
<link href="../../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<div class="KT_tng" id="listnoticias1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="top" bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
    </tr>
    <tr>
      <td><h1> Editar / Excluir Not&iacute;cias
<?php
  $nav_listnoticias1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> <a href="<?php echo $nav_listnoticias1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                  <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnoticias1'] == 1) {
?>
                  <?php echo $_SESSION['default_max_rows_nav_listnoticias1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnoticias1'] == 1) {
?>
              <a href="<?php echo $tfi_listnoticias1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listnoticias1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
            </div>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <thead>
                <tr class="KT_row_order">
                  <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                  </th>
                  <th id="data" class="KT_sorter KT_col_data <?php echo $tso_listnoticias1->getSortIcon('noticias.data'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.data'); ?>">Data</a> </th>
                  <th id="titulo" class="KT_sorter KT_col_titulo <?php echo $tso_listnoticias1->getSortIcon('noticias.titulo'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.titulo'); ?>">Titulo</a> </th>
                  <th id="materia" class="KT_sorter KT_col_materia <?php echo $tso_listnoticias1->getSortIcon('noticias.materia'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.materia'); ?>">Materia</a> </th>
                  <th id="fonte" class="KT_sorter KT_col_fonte <?php echo $tso_listnoticias1->getSortIcon('noticias.fonte'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.fonte'); ?>">Fonte</a> </th>
                  <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listnoticias1->getSortIcon('noticias.foto'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.foto'); ?>">Foto</a> </th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnoticias1'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><input type="text" name="tfi_listnoticias1_data" id="tfi_listnoticias1_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_data']); ?>" size="10" maxlength="50" /></td>
                  <td><input type="text" name="tfi_listnoticias1_titulo" id="tfi_listnoticias1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_titulo']); ?>" size="30" maxlength="50" /></td>
                  <td><textarea name="tfi_listnoticias1_materia" cols="30" rows="4" id="tfi_listnoticias1_materia"><?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_materia']); ?></textarea></td>
                  <td><input type="text" name="tfi_listnoticias1_fonte" id="tfi_listnoticias1_fonte" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_fonte']); ?>" size="20" maxlength="50" /></td>
                  <td><input type="text" name="tfi_listnoticias1_foto" id="tfi_listnoticias1_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_foto']); ?>" size="20" maxlength="50" /></td>
                  <td><input type="submit" name="tfi_listnoticias1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
              </thead>
              <tbody>
                <?php if ($totalRows_rsnoticias1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
                <?php if ($totalRows_rsnoticias1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_noticias" class="id_checkbox" value="<?php echo $row_rsnoticias1['id']; ?>" />
                      <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsnoticias1['id']; ?>" />                  </td>
                  <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsnoticias1['data'], 10); ?></div></td>
                  <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsnoticias1['titulo'], 20); ?></div></td>
                  <td><div class="KT_col_materia"><?php echo KT_FormatForList($row_rsnoticias1['materia'], 20); ?></div></td>
                  <td><div class="KT_col_fonte"><?php echo KT_FormatForList($row_rsnoticias1['fonte'], 15); ?></div></td>
                  <td align="center"><div class="KT_col_foto"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsnoticias1.foto}", 100, 0, true); ?>" class="borda" /></div></td>
                  <td><a class="KT_edit_link" href="not_add.php?id=<?php echo $row_rsnoticias1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1)); ?>
                <?php } // Show if recordset not empty ?>
              </tbody>
            </table>
            <div class="KT_bottomnav">
              <div>
                <?php
            $nav_listnoticias1->Prepare();
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
            <a class="KT_additem_op_link" href="not_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
          </form>
        </div>
        <br class="clearfixplain" />
        <br /></td>
    </tr>
    <tr>
      <td height="20" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" align="center" valign="middle" bgcolor="#3B63A1"><span class="barnco">Adminstrativo desenvolvido por Victor Caetano - todos os direitos Reservados Xpressbb.com </span></td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsnoticias1);
?>
