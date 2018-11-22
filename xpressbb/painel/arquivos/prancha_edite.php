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
$tfi_listpranchas1 = new TFI_TableFilter($conn_xpress, "tfi_listpranchas1");
$tfi_listpranchas1->addColumn("pranchas.nome", "STRING_TYPE", "nome", "%");
$tfi_listpranchas1->addColumn("pranchas.descricao", "NUMERIC_TYPE", "descricao", "=");
$tfi_listpranchas1->addColumn("pranchas.foto", "FILE_TYPE", "foto", "%");
$tfi_listpranchas1->Execute();

// Sorter
$tso_listpranchas1 = new TSO_TableSorter("rspranchas1", "tso_listpranchas1");
$tso_listpranchas1->addColumn("pranchas.nome");
$tso_listpranchas1->addColumn("pranchas.descricao");
$tso_listpranchas1->addColumn("pranchas.foto");
$tso_listpranchas1->setDefault("pranchas.nome DESC");
$tso_listpranchas1->Execute();

// Navigation
$nav_listpranchas1 = new NAV_Regular("nav_listpranchas1", "rspranchas1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rspranchas1 = $_SESSION['max_rows_nav_listpranchas1'];
$pageNum_rspranchas1 = 0;
if (isset($_GET['pageNum_rspranchas1'])) {
  $pageNum_rspranchas1 = $_GET['pageNum_rspranchas1'];
}
$startRow_rspranchas1 = $pageNum_rspranchas1 * $maxRows_rspranchas1;

$NXTFilter_rspranchas1 = "1=1";
if (isset($_SESSION['filter_tfi_listpranchas1'])) {
  $NXTFilter_rspranchas1 = $_SESSION['filter_tfi_listpranchas1'];
}
$NXTSort_rspranchas1 = "pranchas.nome DESC";
if (isset($_SESSION['sorter_tso_listpranchas1'])) {
  $NXTSort_rspranchas1 = $_SESSION['sorter_tso_listpranchas1'];
}
mysql_select_db($database_xpress, $xpress);

$query_rspranchas1 = sprintf("SELECT pranchas.nome, pranchas.descricao, pranchas.foto, pranchas.id FROM pranchas WHERE %s ORDER BY %s", $NXTFilter_rspranchas1, $NXTSort_rspranchas1);
$query_limit_rspranchas1 = sprintf("%s LIMIT %d, %d", $query_rspranchas1, $startRow_rspranchas1, $maxRows_rspranchas1);
$rspranchas1 = mysql_query($query_limit_rspranchas1, $xpress) or die(mysql_error());
$row_rspranchas1 = mysql_fetch_assoc($rspranchas1);

if (isset($_GET['totalRows_rspranchas1'])) {
  $totalRows_rspranchas1 = $_GET['totalRows_rspranchas1'];
} else {
  $all_rspranchas1 = mysql_query($query_rspranchas1);
  $totalRows_rspranchas1 = mysql_num_rows($all_rspranchas1);
}
$totalPages_rspranchas1 = ceil($totalRows_rspranchas1/$maxRows_rspranchas1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listpranchas1->checkBoundries();
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
<link href="../../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 16px}
.style2 {color: #FF0000}
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
  .KT_col_descricao {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><div class="KT_tng" id="listpranchas1">
    <h1> Pranchas
        <?php
  $nav_listpranchas1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
      <div class="KT_tnglist">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
          <div class="KT_options"> <a href="<?php echo $nav_listpranchas1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listpranchas1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listpranchas1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listpranchas1'] == 1) {
?>
                              <a href="<?php echo $tfi_listpranchas1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listpranchas1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
          </div>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                </th>
                <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listpranchas1->getSortIcon('pranchas.nome'); ?>"> <a href="<?php echo $tso_listpranchas1->getSortLink('pranchas.nome'); ?>">Nome</a> </th>
                <th id="descricao" class="KT_sorter KT_col_descricao <?php echo $tso_listpranchas1->getSortIcon('pranchas.descricao'); ?>"> <a href="<?php echo $tso_listpranchas1->getSortLink('pranchas.descricao'); ?>">Descricao</a> </th>
                <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listpranchas1->getSortIcon('pranchas.foto'); ?>"> <a href="<?php echo $tso_listpranchas1->getSortLink('pranchas.foto'); ?>">Foto</a> </th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listpranchas1'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><input type="text" name="tfi_listpranchas1_nome" id="tfi_listpranchas1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpranchas1_nome']); ?>" size="20" maxlength="50" /></td>
                  <td><input type="text" name="tfi_listpranchas1_descricao" id="tfi_listpranchas1_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpranchas1_descricao']); ?>" size="20" maxlength="100" /></td>
                  <td><input type="text" name="tfi_listpranchas1_foto" id="tfi_listpranchas1_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpranchas1_foto']); ?>" size="20" maxlength="50" /></td>
                  <td><input type="submit" name="tfi_listpranchas1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
            </thead>
            <tbody>
              <?php if ($totalRows_rspranchas1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rspranchas1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                    <td><input type="checkbox" name="kt_pk_pranchas" class="id_checkbox" value="<?php echo $row_rspranchas1['id']; ?>" />
                        <input type="hidden" name="id" class="id_field" value="<?php echo $row_rspranchas1['id']; ?>" />
                    </td>
                    <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rspranchas1['nome'], 20); ?></div></td>
                    <td><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rspranchas1['descricao'], 20); ?></div></td>
                    <td><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rspranchas1.foto}", 50, 0, true); ?>" /></td>
                    <td><a class="KT_edit_link" href="prancha_add.php?id=<?php echo $row_rspranchas1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                  </tr>
                  <?php } while ($row_rspranchas1 = mysql_fetch_assoc($rspranchas1)); ?>
                <?php } // Show if recordset not empty ?>
            </tbody>
          </table>
          <div class="KT_bottomnav">
            <div>
              <?php
            $nav_listpranchas1->Prepare();
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
            <a class="KT_additem_op_link" href="prancha_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
        </form>
      </div>
      <br class="clearfixplain" />
    </div>
    <p>&nbsp;</p>
    </p>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td bgcolor="#3B63A1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rspranchas1);
?>
