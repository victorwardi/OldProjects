<?php require_once('../../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Filter
$tfi_listfotografia1 = new TFI_TableFilter($conn_victor, "tfi_listfotografia1");
$tfi_listfotografia1->addColumn("fotografia.id", "NUMERIC_TYPE", "id", "=");
$tfi_listfotografia1->addColumn("fotografia.foto", "STRING_TYPE", "foto", "%");
$tfi_listfotografia1->Execute();

// Sorter
$tso_listfotografia1 = new TSO_TableSorter("rsfotografia1", "tso_listfotografia1");
$tso_listfotografia1->addColumn("fotografia.id");
$tso_listfotografia1->addColumn("fotografia.foto");
$tso_listfotografia1->setDefault("fotografia.id DESC");
$tso_listfotografia1->Execute();

// Navigation
$nav_listfotografia1 = new NAV_Regular("nav_listfotografia1", "rsfotografia1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotografia1 = $_SESSION['max_rows_nav_listfotografia1'];
$pageNum_rsfotografia1 = 0;
if (isset($_GET['pageNum_rsfotografia1'])) {
  $pageNum_rsfotografia1 = $_GET['pageNum_rsfotografia1'];
}
$startRow_rsfotografia1 = $pageNum_rsfotografia1 * $maxRows_rsfotografia1;

$NXTFilter_rsfotografia1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotografia1'])) {
  $NXTFilter_rsfotografia1 = $_SESSION['filter_tfi_listfotografia1'];
}
$NXTSort_rsfotografia1 = "fotografia.id DESC";
if (isset($_SESSION['sorter_tso_listfotografia1'])) {
  $NXTSort_rsfotografia1 = $_SESSION['sorter_tso_listfotografia1'];
}
mysql_select_db($database_victor, $victor);

$query_rsfotografia1 = sprintf("SELECT fotografia.id, fotografia.foto FROM fotografia WHERE %s ORDER BY %s", $NXTFilter_rsfotografia1, $NXTSort_rsfotografia1);
$query_limit_rsfotografia1 = sprintf("%s LIMIT %d, %d", $query_rsfotografia1, $startRow_rsfotografia1, $maxRows_rsfotografia1);
$rsfotografia1 = mysql_query($query_limit_rsfotografia1, $victor) or die(mysql_error());
$row_rsfotografia1 = mysql_fetch_assoc($rsfotografia1);

if (isset($_GET['totalRows_rsfotografia1'])) {
  $totalRows_rsfotografia1 = $_GET['totalRows_rsfotografia1'];
} else {
  $all_rsfotografia1 = mysql_query($query_rsfotografia1);
  $totalRows_rsfotografia1 = mysql_num_rows($all_rsfotografia1);
}
$totalPages_rsfotografia1 = ceil($totalRows_rsfotografia1/$maxRows_rsfotografia1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotografia1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listfotografia1">
  <h1> Fotografia
    <?php
  $nav_listfotografia1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listfotografia1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotografia1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listfotografia1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotografia1'] == 1) {
?>
                              <a href="<?php echo $tfi_listfotografia1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfotografia1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listfotografia1->getSortIcon('fotografia.foto'); ?>"> <a href="<?php echo $tso_listfotografia1->getSortLink('fotografia.foto'); ?>">Foto</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotografia1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="tfi_listfotografia1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsfotografia1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="3"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsfotografia1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_fotografia" class="id_checkbox" value="<?php echo $row_rsfotografia1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsfotografia1['id']; ?>" />                </td>
                <td><div class="KT_col_foto"><?php echo KT_FormatForList($row_rsfotografia1['foto'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="../../Copy of victor/adm/foto_add.php?id=<?php echo $row_rsfotografia1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rsfotografia1 = mysql_fetch_assoc($rsfotografia1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listfotografia1->Prepare();
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
        <a class="KT_additem_op_link" href="../../Copy of victor/adm/foto_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsfotografia1);
?>
