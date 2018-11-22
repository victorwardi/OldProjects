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
$tfi_listnoticias6 = new TFI_TableFilter($conn_saquabb, "tfi_listnoticias6");
$tfi_listnoticias6->addColumn("noticias.id", "STRING_TYPE", "id", "%");
$tfi_listnoticias6->addColumn("noticias.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listnoticias6->addColumn("noticias.materia", "STRING_TYPE", "materia", "%");
$tfi_listnoticias6->addColumn("noticias.data", "STRING_TYPE", "data", "%");
$tfi_listnoticias6->addColumn("noticias.fonte", "STRING_TYPE", "fonte", "%");
$tfi_listnoticias6->addColumn("noticias.imagem", "FILE_TYPE", "imagem", "%");
$tfi_listnoticias6->addColumn("noticias.coluna", "STRING_TYPE", "coluna", "%");
$tfi_listnoticias6->Execute();

// Sorter
$tso_listnoticias6 = new TSO_TableSorter("rsnoticias1", "tso_listnoticias6");
$tso_listnoticias6->addColumn("noticias.id");
$tso_listnoticias6->addColumn("noticias.titulo");
$tso_listnoticias6->addColumn("noticias.materia");
$tso_listnoticias6->addColumn("noticias.data");
$tso_listnoticias6->addColumn("noticias.fonte");
$tso_listnoticias6->addColumn("noticias.imagem");
$tso_listnoticias6->addColumn("noticias.coluna");
$tso_listnoticias6->setDefault("noticias.id DESC");
$tso_listnoticias6->Execute();

// Navigation
$nav_listnoticias6 = new NAV_Regular("nav_listnoticias6", "rsnoticias1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsnoticias1 = $_SESSION['max_rows_nav_listnoticias6'];
$pageNum_rsnoticias1 = 0;
if (isset($_GET['pageNum_rsnoticias1'])) {
  $pageNum_rsnoticias1 = $_GET['pageNum_rsnoticias1'];
}
$startRow_rsnoticias1 = $pageNum_rsnoticias1 * $maxRows_rsnoticias1;

$NXTFilter_rsnoticias1 = "1=1";
if (isset($_SESSION['filter_tfi_listnoticias6'])) {
  $NXTFilter_rsnoticias1 = $_SESSION['filter_tfi_listnoticias6'];
}
$NXTSort_rsnoticias1 = "noticias.id DESC";
if (isset($_SESSION['sorter_tso_listnoticias6'])) {
  $NXTSort_rsnoticias1 = $_SESSION['sorter_tso_listnoticias6'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsnoticias1 = sprintf("SELECT noticias.id, noticias.titulo, noticias.materia, noticias.data, noticias.fonte, noticias.imagem, noticias.coluna FROM noticias WHERE %s ORDER BY %s", $NXTFilter_rsnoticias1, $NXTSort_rsnoticias1);
$query_limit_rsnoticias1 = sprintf("%s LIMIT %d, %d", $query_rsnoticias1, $startRow_rsnoticias1, $maxRows_rsnoticias1);
$rsnoticias1 = mysql_query($query_limit_rsnoticias1, $saquabb) or die(mysql_error());
$row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1);

if (isset($_GET['totalRows_rsnoticias1'])) {
  $totalRows_rsnoticias1 = $_GET['totalRows_rsnoticias1'];
} else {
  $all_rsnoticias1 = mysql_query($query_rsnoticias1);
  $totalRows_rsnoticias1 = mysql_num_rows($all_rsnoticias1);
}
$totalPages_rsnoticias1 = ceil($totalRows_rsnoticias1/$maxRows_rsnoticias1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnoticias6->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
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
  .KT_col_id {width:28px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_materia {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
  .KT_col_fonte {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_coluna {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listnoticias6">
  <h1> Noticias
    <?php
  $nav_listnoticias6->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listnoticias6->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnoticias6'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listnoticias6']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnoticias6'] == 1) {
?>
                              <a href="<?php echo $tfi_listnoticias6->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listnoticias6->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="id" class="KT_sorter KT_col_id <?php echo $tso_listnoticias6->getSortIcon('noticias.id'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.id'); ?>">Id</a> </th>
            <th id="titulo" class="KT_sorter KT_col_titulo <?php echo $tso_listnoticias6->getSortIcon('noticias.titulo'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.titulo'); ?>">Titulo</a> </th>
            <th id="materia" class="KT_sorter KT_col_materia <?php echo $tso_listnoticias6->getSortIcon('noticias.materia'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.materia'); ?>">Materia</a> </th>
            <th id="data" class="KT_sorter KT_col_data <?php echo $tso_listnoticias6->getSortIcon('noticias.data'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.data'); ?>">Data</a> </th>
            <th id="fonte" class="KT_sorter KT_col_fonte <?php echo $tso_listnoticias6->getSortIcon('noticias.fonte'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.fonte'); ?>">Fonte</a> </th>
            <th id="imagem" class="KT_sorter KT_col_imagem <?php echo $tso_listnoticias6->getSortIcon('noticias.imagem'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.imagem'); ?>">Imagem</a> </th>
            <th id="coluna" class="KT_sorter KT_col_coluna <?php echo $tso_listnoticias6->getSortIcon('noticias.coluna'); ?>"> <a href="<?php echo $tso_listnoticias6->getSortLink('noticias.coluna'); ?>">Coluna</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnoticias6'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listnoticias6_id" id="tfi_listnoticias6_id" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_id']); ?>" size="4" maxlength="10" /></td>
              <td><input type="text" name="tfi_listnoticias6_titulo" id="tfi_listnoticias6_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_titulo']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listnoticias6_materia" id="tfi_listnoticias6_materia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_materia']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listnoticias6_data" id="tfi_listnoticias6_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_data']); ?>" size="20" maxlength="20" /></td>
              <td><input type="text" name="tfi_listnoticias6_fonte" id="tfi_listnoticias6_fonte" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_fonte']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listnoticias6_imagem" id="tfi_listnoticias6_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_imagem']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listnoticias6_coluna" id="tfi_listnoticias6_coluna" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias6_coluna']); ?>" size="20" maxlength="30" /></td>
              <td><input type="submit" name="tfi_listnoticias6" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsnoticias1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsnoticias1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_noticias" class="id_checkbox" value="<?php echo $row_rsnoticias1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsnoticias1['id']; ?>" />
                </td>
                <td><div class="KT_col_id"><?php echo KT_FormatForList($row_rsnoticias1['id'], 4); ?></div></td>
                <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsnoticias1['titulo'], 20); ?></div></td>
                <td><div class="KT_col_materia"><?php echo KT_FormatForList($row_rsnoticias1['materia'], 20); ?></div></td>
                <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsnoticias1['data'], 20); ?></div></td>
                <td><div class="KT_col_fonte"><?php echo KT_FormatForList($row_rsnoticias1['fonte'], 20); ?></div></td>
                <td><div class="KT_col_imagem"><?php echo KT_FormatForList($row_rsnoticias1['imagem'], 20); ?></div></td>
                <td><div class="KT_col_coluna"><?php echo KT_FormatForList($row_rsnoticias1['coluna'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="add_noticia.php?id=<?php echo $row_rsnoticias1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listnoticias6->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
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
        <a class="KT_additem_op_link" href="add_noticia.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsnoticias1);
?>
