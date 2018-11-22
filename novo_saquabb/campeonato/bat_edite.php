<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listbblagos_saqua2 = new TFI_TableFilter($conn_saquabb, "tfi_listbblagos_saqua2");
$tfi_listbblagos_saqua2->addColumn("bblagos_saqua.round", "STRING_TYPE", "round", "%");
$tfi_listbblagos_saqua2->Execute();

// Sorter
$tso_listbblagos_saqua2 = new TSO_TableSorter("rsbblagos_saqua1", "tso_listbblagos_saqua2");
$tso_listbblagos_saqua2->addColumn("bblagos_saqua.round");
$tso_listbblagos_saqua2->setDefault("bblagos_saqua.round DESC");
$tso_listbblagos_saqua2->Execute();

// Navigation
$nav_listbblagos_saqua2 = new NAV_Regular("nav_listbblagos_saqua2", "rsbblagos_saqua1", "../", $_SERVER['PHP_SELF'], 5);

//NeXTenesio3 Special List Recordset
$maxRows_rsbblagos_saqua1 = $_SESSION['max_rows_nav_listbblagos_saqua2'];
$pageNum_rsbblagos_saqua1 = 0;
if (isset($_GET['pageNum_rsbblagos_saqua1'])) {
  $pageNum_rsbblagos_saqua1 = $_GET['pageNum_rsbblagos_saqua1'];
}
$startRow_rsbblagos_saqua1 = $pageNum_rsbblagos_saqua1 * $maxRows_rsbblagos_saqua1;

$NXTFilter_rsbblagos_saqua1 = "1=1";
if (isset($_SESSION['filter_tfi_listbblagos_saqua2'])) {
  $NXTFilter_rsbblagos_saqua1 = $_SESSION['filter_tfi_listbblagos_saqua2'];
}
$NXTSort_rsbblagos_saqua1 = "bblagos_saqua.round DESC";
if (isset($_SESSION['sorter_tso_listbblagos_saqua2'])) {
  $NXTSort_rsbblagos_saqua1 = $_SESSION['sorter_tso_listbblagos_saqua2'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsbblagos_saqua1 = sprintf("SELECT bblagos_saqua.round, bblagos_saqua.id FROM bblagos_saqua WHERE %s ORDER BY %s", $NXTFilter_rsbblagos_saqua1, $NXTSort_rsbblagos_saqua1);
$query_limit_rsbblagos_saqua1 = sprintf("%s LIMIT %d, %d", $query_rsbblagos_saqua1, $startRow_rsbblagos_saqua1, $maxRows_rsbblagos_saqua1);
$rsbblagos_saqua1 = mysql_query($query_limit_rsbblagos_saqua1, $saquabb) or die(mysql_error());
$row_rsbblagos_saqua1 = mysql_fetch_assoc($rsbblagos_saqua1);

if (isset($_GET['totalRows_rsbblagos_saqua1'])) {
  $totalRows_rsbblagos_saqua1 = $_GET['totalRows_rsbblagos_saqua1'];
} else {
  $all_rsbblagos_saqua1 = mysql_query($query_rsbblagos_saqua1);
  $totalRows_rsbblagos_saqua1 = mysql_num_rows($all_rsbblagos_saqua1);
}
$totalPages_rsbblagos_saqua1 = ceil($totalRows_rsbblagos_saqua1/$maxRows_rsbblagos_saqua1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listbblagos_saqua2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editar Bateria</title>
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_round {width:140px; overflow:hidden;}
</style>
<link href="../css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">&nbsp;<img src="etapa/saqua/topo.jpg" width="560" height="98" />
      <div class="KT_tng" id="listbblagos_saqua2">
        <h1 align="center" class="tiutlo_not">Editar Resultados de Baterias 
          <?php
  $nav_listbblagos_saqua2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
        </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> 
              <div align="center"><a href="<?php echo $nav_listbblagos_saqua2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listbblagos_saqua2'] == 1) {
?>
                    <?php echo $_SESSION['default_max_rows_nav_listbblagos_saqua2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listbblagos_saqua2'] == 1) {
?>
                              <a href="<?php echo $tfi_listbblagos_saqua2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listbblagos_saqua2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                              <br />
                              <br />
              </div>
            </div>
            <div align="center">
              <table width="72%" cellpadding="4" cellspacing="4" class="KT_tngtable">
                <thead>

                  <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listbblagos_saqua2'] == 1) {
?>
                    <tr class="KT_row_filter">
                      <td colspan="2" align="left" valign="middle"><?php echo KT_escapeAttribute(@$_SESSION['tfi_listbblagos_saqua2_round']); ?></td>
                      <td width="262" align="center" valign="middle"><input type="submit" name="tfi_listbblagos_saqua2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                    </tr>
                    <?php } 
  // endif Conditional region3
?>
                </thead>
                <tbody>
                  <?php if ($totalRows_rsbblagos_saqua1 == 0) { // Show if recordset empty ?>
                    <tr align="center" valign="middle">
                      <td colspan="3" align="center" valign="middle"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                  </tr>
                    <?php } // Show if recordset empty ?>
                  <?php if ($totalRows_rsbblagos_saqua1 > 0) { // Show if recordset not empty ?>
                    <?php do { ?>
                      <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                        <td width="35" align="right" valign="middle"><input type="checkbox" name="kt_pk_bblagos_saqua" class="id_checkbox" value="<?php echo $row_rsbblagos_saqua1['id']; ?>" />
                        <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsbblagos_saqua1['id']; ?>" />                        </td>
                        <td width="165" align="left" valign="middle"><span class="KT_col_round"><?php echo KT_FormatForList($row_rsbblagos_saqua1['round'], 50); ?></span></td>
                        <td align="center" valign="middle"><a class="KT_edit_link" href="bateria.php?id=<?php echo $row_rsbblagos_saqua1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                      </tr>
                      <?php } while ($row_rsbblagos_saqua1 = mysql_fetch_assoc($rsbblagos_saqua1)); ?>
                    <?php } // Show if recordset not empty ?>
                </tbody>
                          </table>
              <br />
            </div>
            <div class="KT_bottomnav">
              <div>
                <div align="center">
                  <?php
            $nav_listbblagos_saqua2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                  <br />
                  <br />
                  <br />
                </div>
              </div>
            </div>
            <div class="KT_bottombuttons">
              <div class="KT_operations"> 
                <div align="center"><a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
              </div>
              <div align="center"></div>
            </div>
          </form>
          <p class="tiutlo_not"><a href="bateria.php">Inserir Nova Bateria </a></p>
        </div>
        <div align="center"><br class="clearfixplain" />
        <img src="etapa/saqua/base.jpg" width="560" height="98" /></div>
      </div>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsbblagos_saqua1);
?>
