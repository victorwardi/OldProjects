<?php require_once('../../Connections/xpress.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Filter
$tfi_listcomentario1 = new TFI_TableFilter($conn_xpress, "tfi_listcomentario1");
$tfi_listcomentario1->addColumn("comentario.nome", "STRING_TYPE", "nome", "%");
$tfi_listcomentario1->addColumn("comentario.email", "STRING_TYPE", "email", "%");
$tfi_listcomentario1->addColumn("comentario.comentario", "STRING_TYPE", "comentario", "%");
$tfi_listcomentario1->Execute();

// Sorter
$tso_listcomentario1 = new TSO_TableSorter("rscomentario1", "tso_listcomentario1");
$tso_listcomentario1->addColumn("comentario.nome");
$tso_listcomentario1->addColumn("comentario.email");
$tso_listcomentario1->addColumn("comentario.comentario");
$tso_listcomentario1->setDefault("comentario.nome DESC");
$tso_listcomentario1->Execute();

// Navigation
$nav_listcomentario1 = new NAV_Regular("nav_listcomentario1", "rscomentario1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rscomentario1 = $_SESSION['max_rows_nav_listcomentario1'];
$pageNum_rscomentario1 = 0;
if (isset($_GET['pageNum_rscomentario1'])) {
  $pageNum_rscomentario1 = $_GET['pageNum_rscomentario1'];
}
$startRow_rscomentario1 = $pageNum_rscomentario1 * $maxRows_rscomentario1;

$NXTFilter_rscomentario1 = "1=1";
if (isset($_SESSION['filter_tfi_listcomentario1'])) {
  $NXTFilter_rscomentario1 = $_SESSION['filter_tfi_listcomentario1'];
}
$NXTSort_rscomentario1 = "comentario.nome DESC";
if (isset($_SESSION['sorter_tso_listcomentario1'])) {
  $NXTSort_rscomentario1 = $_SESSION['sorter_tso_listcomentario1'];
}
mysql_select_db($database_xpress, $xpress);

$query_rscomentario1 = sprintf("SELECT comentario.nome, comentario.email, comentario.comentario, comentario.id FROM comentario WHERE %s ORDER BY %s", $NXTFilter_rscomentario1, $NXTSort_rscomentario1);
$query_limit_rscomentario1 = sprintf("%s LIMIT %d, %d", $query_rscomentario1, $startRow_rscomentario1, $maxRows_rscomentario1);
$rscomentario1 = mysql_query($query_limit_rscomentario1, $xpress) or die(mysql_error());
$row_rscomentario1 = mysql_fetch_assoc($rscomentario1);

if (isset($_GET['totalRows_rscomentario1'])) {
  $totalRows_rscomentario1 = $_GET['totalRows_rscomentario1'];
} else {
  $all_rscomentario1 = mysql_query($query_rscomentario1);
  $totalRows_rscomentario1 = mysql_num_rows($all_rscomentario1);
}
$totalPages_rscomentario1 = ceil($totalRows_rscomentario1/$maxRows_rscomentario1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcomentario1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
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
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_email {width:140px; overflow:hidden;}
  .KT_col_comentario {width:140px; overflow:hidden;}
</style>
<link href="../../css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td><div class="KT_tng" id="listcomentario1">
      <h1> Apagar Coment&aacute;rios
        <?php
  $nav_listcomentario1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
      <div class="KT_tnglist">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
          <div class="KT_options"> <a href="<?php echo $nav_listcomentario1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcomentario1'] == 1) {
?>
                <?php echo $_SESSION['default_max_rows_nav_listcomentario1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcomentario1'] == 1) {
?>
                <a href="<?php echo $tfi_listcomentario1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                <?php 
  // else Conditional region2
  } else { ?>
                <a href="<?php echo $tfi_listcomentario1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                <?php } 
  // endif Conditional region2
?>
          </div>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                </th>
                <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listcomentario1->getSortIcon('comentario.nome'); ?>"> <a href="<?php echo $tso_listcomentario1->getSortLink('comentario.nome'); ?>">Nome</a> </th>
                <th id="email" class="KT_sorter KT_col_email <?php echo $tso_listcomentario1->getSortIcon('comentario.email'); ?>"> <a href="<?php echo $tso_listcomentario1->getSortLink('comentario.email'); ?>">E-mail</a> </th>
                <th id="comentario" class="KT_sorter KT_col_comentario <?php echo $tso_listcomentario1->getSortIcon('comentario.comentario'); ?>"> <a href="<?php echo $tso_listcomentario1->getSortLink('comentario.comentario'); ?>">Coment&aacute;rio</a> </th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcomentario1'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listcomentario1_nome" id="tfi_listcomentario1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentario1_nome']); ?>" size="20" maxlength="30" /></td>
                <td><input type="text" name="tfi_listcomentario1_email" id="tfi_listcomentario1_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentario1_email']); ?>" size="20" maxlength="30" /></td>
                <td><input type="text" name="tfi_listcomentario1_comentario" id="tfi_listcomentario1_comentario" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcomentario1_comentario']); ?>" size="20" maxlength="100" /></td>
                <td><input type="submit" name="tfi_listcomentario1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
            </thead>
            <tbody>
              <?php if ($totalRows_rscomentario1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rscomentario1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_comentario" class="id_checkbox" value="<?php echo $row_rscomentario1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rscomentario1['id']; ?>" />
                </td>
                <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rscomentario1['nome'], 20); ?></div></td>
                <td><div class="KT_col_email"><?php echo KT_FormatForList($row_rscomentario1['email'], 20); ?></div></td>
                <td><div class="KT_col_comentario"><?php echo KT_FormatForList($row_rscomentario1['comentario'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="coment.php?id=<?php echo $row_rscomentario1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rscomentario1 = mysql_fetch_assoc($rscomentario1)); ?>
              <?php } // Show if recordset not empty ?>
            </tbody>
          </table>
          <div class="KT_bottomnav">
            <div>
              <?php
            $nav_listcomentario1->Prepare();
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
          <a class="KT_additem_op_link" href="coment.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
        </form>
      </div>
      <br class="clearfixplain" />
    </div>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#3B63A1"><span class="barnco">Adminstrativo desenvolvido por Victor Caetano - todos os direitos Reservados Xpressbb.com </span></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rscomentario1);
?>
