<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the required classes
require_once('includes/tfi/TFI.php');
require_once('includes/tso/TSO.php');
require_once('includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// Filter
$tfi_listfotos4 = new TFI_TableFilter($conn_ConBD, "tfi_listfotos4");
$tfi_listfotos4->addColumn("fotos.arquivo", "STRING_TYPE", "arquivo", "%");
$tfi_listfotos4->addColumn("fotos.galeriaID", "STRING_TYPE", "galeriaID", "%");
$tfi_listfotos4->Execute();

// Sorter
$tso_listfotos4 = new TSO_TableSorter("rsfotos1", "tso_listfotos4");
$tso_listfotos4->addColumn("fotos.arquivo");
$tso_listfotos4->addColumn("fotos.galeriaID");
$tso_listfotos4->setDefault("fotos.arquivo DESC");
$tso_listfotos4->Execute();

// Navigation
$nav_listfotos4 = new NAV_Regular("nav_listfotos4", "rsfotos1", "", $_SERVER['PHP_SELF'], 30);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotos1 = $_SESSION['max_rows_nav_listfotos4'];
$pageNum_rsfotos1 = 0;
if (isset($_GET['pageNum_rsfotos1'])) {
  $pageNum_rsfotos1 = $_GET['pageNum_rsfotos1'];
}
$startRow_rsfotos1 = $pageNum_rsfotos1 * $maxRows_rsfotos1;

// Defining List Recordset variable
$NXTFilter_rsfotos1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotos4'])) {
  $NXTFilter_rsfotos1 = $_SESSION['filter_tfi_listfotos4'];
}
// Defining List Recordset variable
$NXTSort_rsfotos1 = "fotos.arquivo DESC";
if (isset($_SESSION['sorter_tso_listfotos4'])) {
  $NXTSort_rsfotos1 = $_SESSION['sorter_tso_listfotos4'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsfotos1 = "SELECT fotos.arquivo, fotos.galeriaID, fotos.fotoID FROM fotos WHERE {$NXTFilter_rsfotos1} ORDER BY {$NXTSort_rsfotos1}";
$query_limit_rsfotos1 = sprintf("%s LIMIT %d, %d", $query_rsfotos1, $startRow_rsfotos1, $maxRows_rsfotos1);
$rsfotos1 = mysql_query($query_limit_rsfotos1, $ConBD) or die(mysql_error());
$row_rsfotos1 = mysql_fetch_assoc($rsfotos1);

if (isset($_GET['totalRows_rsfotos1'])) {
  $totalRows_rsfotos1 = $_GET['totalRows_rsfotos1'];
} else {
  $all_rsfotos1 = mysql_query($query_rsfotos1);
  $totalRows_rsfotos1 = mysql_num_rows($all_rsfotos1);
}
$totalPages_rsfotos1 = ceil($totalRows_rsfotos1/$maxRows_rsfotos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotos4->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/");
$objDynamicThumb1->setRenameRule("{rsfotos1.arquivo}");
$objDynamicThumb1->setResize(80, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_arquivo {width:140px; overflow:hidden;}
  .KT_col_galeriaID {width:140px; overflow:hidden;}
</style>
<link href="css/stilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="KT_tng" id="listfotos4">
  <h1> Fotos
    <?php
  $nav_listfotos4->Prepare();
  require("includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listfotos4->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotos4'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listfotos4']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotos4'] == 1) {
?>
                  <a href="<?php echo $tfi_listfotos4->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listfotos4->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="4" cellspacing="1" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th bgcolor="#CCCCCC"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th bgcolor="#CCCCCC" class="KT_sorter KT_col_arquivo <?php echo $tso_listfotos4->getSortIcon('fotos.arquivo'); ?>" id="arquivo"> <a href="<?php echo $tso_listfotos4->getSortLink('fotos.arquivo'); ?>">Foto</a> </th>
            <th bgcolor="#CCCCCC" class="KT_sorter KT_col_galeriaID <?php echo $tso_listfotos4->getSortIcon('fotos.galeriaID'); ?>" id="galeriaID"> <a href="<?php echo $tso_listfotos4->getSortLink('fotos.galeriaID'); ?>">galeria</a> </th>
            <th bgcolor="#CCCCCC">&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotos4'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listfotos4_arquivo" id="tfi_listfotos4_arquivo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos4_arquivo']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listfotos4_galeriaID" id="tfi_listfotos4_galeriaID" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos4_galeriaID']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listfotos4" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
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
                <td><input type="checkbox" name="kt_pk_fotos" class="id_checkbox" value="<?php echo $row_rsfotos1['fotoID']; ?>" />
                    <input type="hidden" name="fotoID" class="id_field" value="<?php echo $row_rsfotos1['fotoID']; ?>" />
                </td>
                <td><div class="KT_col_arquivo"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                <td><div class="KT_col_galeriaID"><?php echo KT_FormatForList($row_rsfotos1['galeriaID'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="editar.php?fotoID=<?php echo $row_rsfotos1['fotoID']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rsfotos1 = mysql_fetch_assoc($rsfotos1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listfotos4->Prepare();
            require("includes/nav/NAV_Text_Navigation.inc.php");
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
        <a class="KT_additem_op_link" href="editar.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsfotos1);
?>
