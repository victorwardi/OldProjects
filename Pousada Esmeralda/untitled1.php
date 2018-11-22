<?php require_once('Connections/conBD.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the required classes
require_once('includes/tfi/TFI.php');
require_once('includes/tso/TSO.php');
require_once('includes/nav/NAV.php');

// Make unified connection variable
$conn_conBD = new KT_connection($conBD, $database_conBD);

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
$tfi_listcontato9 = new TFI_TableFilter($conn_conBD, "tfi_listcontato9");
$tfi_listcontato9->addColumn("contato.nome", "STRING_TYPE", "nome", "%");
$tfi_listcontato9->addColumn("contato.email", "STRING_TYPE", "email", "%");
$tfi_listcontato9->addColumn("contato.status", "STRING_TYPE", "status", "%");
$tfi_listcontato9->Execute();

// Sorter
$tso_listcontato9 = new TSO_TableSorter("rscontato1", "tso_listcontato9");
$tso_listcontato9->addColumn("contato.nome");
$tso_listcontato9->addColumn("contato.email");
$tso_listcontato9->addColumn("contato.status");
$tso_listcontato9->setDefault("contato.nome DESC");
$tso_listcontato9->Execute();

// Navigation
$nav_listcontato9 = new NAV_Regular("nav_listcontato9", "rscontato1", "", $_SERVER['PHP_SELF'], 15);

//NeXTenesio3 Special List Recordset
$maxRows_rscontato1 = $_SESSION['max_rows_nav_listcontato9'];
$pageNum_rscontato1 = 0;
if (isset($_GET['pageNum_rscontato1'])) {
  $pageNum_rscontato1 = $_GET['pageNum_rscontato1'];
}
$startRow_rscontato1 = $pageNum_rscontato1 * $maxRows_rscontato1;

// Defining List Recordset variable
$NXTFilter_rscontato1 = "1=1";
if (isset($_SESSION['filter_tfi_listcontato9'])) {
  $NXTFilter_rscontato1 = $_SESSION['filter_tfi_listcontato9'];
}
// Defining List Recordset variable
$NXTSort_rscontato1 = "contato.nome DESC";
if (isset($_SESSION['sorter_tso_listcontato9'])) {
  $NXTSort_rscontato1 = $_SESSION['sorter_tso_listcontato9'];
}
mysql_select_db($database_conBD, $conBD);

$query_rscontato1 = "SELECT contato.nome, contato.email, contato.status, contato.idContato FROM contato WHERE {$NXTFilter_rscontato1} ORDER BY {$NXTSort_rscontato1}";
$query_limit_rscontato1 = sprintf("%s LIMIT %d, %d", $query_rscontato1, $startRow_rscontato1, $maxRows_rscontato1);
$rscontato1 = mysql_query($query_limit_rscontato1, $conBD) or die(mysql_error());
$row_rscontato1 = mysql_fetch_assoc($rscontato1);

if (isset($_GET['totalRows_rscontato1'])) {
  $totalRows_rscontato1 = $_GET['totalRows_rscontato1'];
} else {
  $all_rscontato1 = mysql_query($query_rscontato1);
  $totalRows_rscontato1 = mysql_num_rows($all_rscontato1);
}
$totalPages_rscontato1 = ceil($totalRows_rscontato1/$maxRows_rscontato1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcontato9->checkBoundries();
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
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_email {width:140px; overflow:hidden;}
  .KT_col_status {width:70px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listcontato9">
  <h1> Contato
    <?php
  $nav_listcontato9->Prepare();
  require("includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listcontato9->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcontato9'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listcontato9']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcontato9'] == 1) {
?>
                  <a href="<?php echo $tfi_listcontato9->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listcontato9->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listcontato9->getSortIcon('contato.nome'); ?>"> <a href="<?php echo $tso_listcontato9->getSortLink('contato.nome'); ?>">Nome</a> </th>
            <th id="email" class="KT_sorter KT_col_email <?php echo $tso_listcontato9->getSortIcon('contato.email'); ?>"> <a href="<?php echo $tso_listcontato9->getSortLink('contato.email'); ?>">Email</a> </th>
            <th id="status" class="KT_sorter KT_col_status <?php echo $tso_listcontato9->getSortIcon('contato.status'); ?>"> <a href="<?php echo $tso_listcontato9->getSortLink('contato.status'); ?>">Status</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcontato9'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listcontato9_nome" id="tfi_listcontato9_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcontato9_nome']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcontato9_email" id="tfi_listcontato9_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcontato9_email']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcontato9_status" id="tfi_listcontato9_status" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcontato9_status']); ?>" size="10" maxlength="50" /></td>
              <td><input type="submit" name="tfi_listcontato9" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rscontato1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rscontato1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_contato" class="id_checkbox" value="<?php echo $row_rscontato1['idContato']; ?>" />
                    <input type="hidden" name="idContato" class="id_field" value="<?php echo $row_rscontato1['idContato']; ?>" />
                </td>
                <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rscontato1['nome'], 20); ?></div></td>
                <td><div class="KT_col_email"><?php echo KT_FormatForList($row_rscontato1['email'], 20); ?></div></td>
                <td><div class="KT_col_status"><?php echo KT_FormatForList($row_rscontato1['status'], 10); ?></div></td>
                <td><a class="KT_edit_link" href="detalhe.php?idContato=<?php echo $row_rscontato1['idContato']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rscontato1 = mysql_fetch_assoc($rscontato1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listcontato9->Prepare();
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
        <a class="KT_additem_op_link" href="detalhe.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rscontato1);
?>
