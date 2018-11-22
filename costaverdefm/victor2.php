<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the required classes
require_once('includes/tfi/TFI.php');
require_once('includes/tso/TSO.php');
require_once('includes/nav/NAV.php');

// Make unified connection variable
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Filter
$tfi_listuser1 = new TFI_TableFilter($conn_CostaverdeFM, "tfi_listuser1");
$tfi_listuser1->addColumn("user.nome", "STRING_TYPE", "nome", "%");
$tfi_listuser1->addColumn("user.senha", "STRING_TYPE", "senha", "%");
$tfi_listuser1->addColumn("user.level", "NUMERIC_TYPE", "level", "=");
$tfi_listuser1->Execute();

// Sorter
$tso_listuser1 = new TSO_TableSorter("rsuser1", "tso_listuser1");
$tso_listuser1->addColumn("user.nome");
$tso_listuser1->addColumn("user.senha");
$tso_listuser1->addColumn("user.level");
$tso_listuser1->setDefault("user.nome DESC");
$tso_listuser1->Execute();

// Navigation
$nav_listuser1 = new NAV_Regular("nav_listuser1", "rsuser1", "", $_SERVER['PHP_SELF'], 12);

//NeXTenesio3 Special List Recordset
$maxRows_rsuser1 = $_SESSION['max_rows_nav_listuser1'];
$pageNum_rsuser1 = 0;
if (isset($_GET['pageNum_rsuser1'])) {
  $pageNum_rsuser1 = $_GET['pageNum_rsuser1'];
}
$startRow_rsuser1 = $pageNum_rsuser1 * $maxRows_rsuser1;

$NXTFilter_rsuser1 = "1=1";
if (isset($_SESSION['filter_tfi_listuser1'])) {
  $NXTFilter_rsuser1 = $_SESSION['filter_tfi_listuser1'];
}
$NXTSort_rsuser1 = "user.nome DESC";
if (isset($_SESSION['sorter_tso_listuser1'])) {
  $NXTSort_rsuser1 = $_SESSION['sorter_tso_listuser1'];
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);

$query_rsuser1 = sprintf("SELECT user.nome, user.senha, user.level, user.id FROM user WHERE %s ORDER BY %s", $NXTFilter_rsuser1, $NXTSort_rsuser1);
$query_limit_rsuser1 = sprintf("%s LIMIT %d, %d", $query_rsuser1, $startRow_rsuser1, $maxRows_rsuser1);
$rsuser1 = mysql_query($query_limit_rsuser1, $CostaverdeFM) or die(mysql_error());
$row_rsuser1 = mysql_fetch_assoc($rsuser1);

if (isset($_GET['totalRows_rsuser1'])) {
  $totalRows_rsuser1 = $_GET['totalRows_rsuser1'];
} else {
  $all_rsuser1 = mysql_query($query_rsuser1);
  $totalRows_rsuser1 = mysql_num_rows($all_rsuser1);
}
$totalPages_rsuser1 = ceil($totalRows_rsuser1/$maxRows_rsuser1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listuser1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
  duplicate_navigation: true,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_senha {width:140px; overflow:hidden;}
  .KT_col_level {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listuser1">
  <h1> User
    <?php
  $nav_listuser1->Prepare();
  require("includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listuser1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listuser1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listuser1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listuser1'] == 1) {
?>
                              <a href="<?php echo $tfi_listuser1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listuser1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listuser1->getSortIcon('user.nome'); ?>"> <a href="<?php echo $tso_listuser1->getSortLink('user.nome'); ?>">Nome</a> </th>
            <th id="senha" class="KT_sorter KT_col_senha <?php echo $tso_listuser1->getSortIcon('user.senha'); ?>"> <a href="<?php echo $tso_listuser1->getSortLink('user.senha'); ?>">Senha</a> </th>
            <th id="level" class="KT_sorter KT_col_level <?php echo $tso_listuser1->getSortIcon('user.level'); ?>"> <a href="<?php echo $tso_listuser1->getSortLink('user.level'); ?>">Level</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listuser1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listuser1_nome" id="tfi_listuser1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listuser1_nome']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listuser1_senha" id="tfi_listuser1_senha" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listuser1_senha']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listuser1_level" id="tfi_listuser1_level" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listuser1_level']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listuser1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsuser1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsuser1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_user" class="id_checkbox" value="<?php echo $row_rsuser1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsuser1['id']; ?>" />
                </td>
                <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsuser1['nome'], 20); ?></div></td>
                <td><div class="KT_col_senha"><?php echo KT_FormatForList($row_rsuser1['senha'], 20); ?></div></td>
                <td><div class="KT_col_level"><?php echo KT_FormatForList($row_rsuser1['level'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="victor.php?id=<?php echo $row_rsuser1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rsuser1 = mysql_fetch_assoc($rsuser1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listuser1->Prepare();
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
        <a class="KT_additem_op_link" href="victor.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsuser1);
?>
