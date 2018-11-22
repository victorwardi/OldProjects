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
$tfi_listtrabalhos1 = new TFI_TableFilter($conn_victor, "tfi_listtrabalhos1");
$tfi_listtrabalhos1->addColumn("trabalhos.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listtrabalhos1->addColumn("trabalhos.descricao", "STRING_TYPE", "descricao", "%");
$tfi_listtrabalhos1->addColumn("trabalhos.cliente", "STRING_TYPE", "cliente", "%");
$tfi_listtrabalhos1->addColumn("trabalhos.imagem", "FILE_TYPE", "imagem", "%");
$tfi_listtrabalhos1->addColumn("trabalhos.categoria", "STRING_TYPE", "categoria", "%");
$tfi_listtrabalhos1->Execute();

// Sorter
$tso_listtrabalhos1 = new TSO_TableSorter("rstrabalhos1", "tso_listtrabalhos1");
$tso_listtrabalhos1->addColumn("trabalhos.titulo");
$tso_listtrabalhos1->addColumn("trabalhos.descricao");
$tso_listtrabalhos1->addColumn("trabalhos.cliente");
$tso_listtrabalhos1->addColumn("trabalhos.imagem");
$tso_listtrabalhos1->addColumn("trabalhos.categoria");
$tso_listtrabalhos1->setDefault("trabalhos.titulo DESC");
$tso_listtrabalhos1->Execute();

// Navigation
$nav_listtrabalhos1 = new NAV_Regular("nav_listtrabalhos1", "rstrabalhos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rstrabalhos1 = $_SESSION['max_rows_nav_listtrabalhos1'];
$pageNum_rstrabalhos1 = 0;
if (isset($_GET['pageNum_rstrabalhos1'])) {
  $pageNum_rstrabalhos1 = $_GET['pageNum_rstrabalhos1'];
}
$startRow_rstrabalhos1 = $pageNum_rstrabalhos1 * $maxRows_rstrabalhos1;

$NXTFilter_rstrabalhos1 = "1=1";
if (isset($_SESSION['filter_tfi_listtrabalhos1'])) {
  $NXTFilter_rstrabalhos1 = $_SESSION['filter_tfi_listtrabalhos1'];
}
$NXTSort_rstrabalhos1 = "trabalhos.titulo DESC";
if (isset($_SESSION['sorter_tso_listtrabalhos1'])) {
  $NXTSort_rstrabalhos1 = $_SESSION['sorter_tso_listtrabalhos1'];
}
mysql_select_db($database_victor, $victor);

$query_rstrabalhos1 = sprintf("SELECT trabalhos.titulo, trabalhos.descricao, trabalhos.cliente, trabalhos.imagem, trabalhos.categoria, trabalhos.id FROM trabalhos WHERE %s ORDER BY %s", $NXTFilter_rstrabalhos1, $NXTSort_rstrabalhos1);
$query_limit_rstrabalhos1 = sprintf("%s LIMIT %d, %d", $query_rstrabalhos1, $startRow_rstrabalhos1, $maxRows_rstrabalhos1);
$rstrabalhos1 = mysql_query($query_limit_rstrabalhos1, $victor) or die(mysql_error());
$row_rstrabalhos1 = mysql_fetch_assoc($rstrabalhos1);

if (isset($_GET['totalRows_rstrabalhos1'])) {
  $totalRows_rstrabalhos1 = $_GET['totalRows_rstrabalhos1'];
} else {
  $all_rstrabalhos1 = mysql_query($query_rstrabalhos1);
  $totalRows_rstrabalhos1 = mysql_num_rows($all_rstrabalhos1);
}
$totalPages_rstrabalhos1 = ceil($totalRows_rstrabalhos1/$maxRows_rstrabalhos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtrabalhos1->checkBoundries();
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
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_descricao {width:140px; overflow:hidden;}
  .KT_col_cliente {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_categoria {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listtrabalhos1">
  <h1> Trabalhos
    <?php
  $nav_listtrabalhos1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listtrabalhos1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtrabalhos1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listtrabalhos1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtrabalhos1'] == 1) {
?>
                              <a href="<?php echo $tfi_listtrabalhos1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listtrabalhos1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="titulo" class="KT_sorter KT_col_titulo <?php echo $tso_listtrabalhos1->getSortIcon('trabalhos.titulo'); ?>"> <a href="<?php echo $tso_listtrabalhos1->getSortLink('trabalhos.titulo'); ?>">Titulo</a> </th>
            <th id="descricao" class="KT_sorter KT_col_descricao <?php echo $tso_listtrabalhos1->getSortIcon('trabalhos.descricao'); ?>"> <a href="<?php echo $tso_listtrabalhos1->getSortLink('trabalhos.descricao'); ?>">Descricao</a> </th>
            <th id="cliente" class="KT_sorter KT_col_cliente <?php echo $tso_listtrabalhos1->getSortIcon('trabalhos.cliente'); ?>"> <a href="<?php echo $tso_listtrabalhos1->getSortLink('trabalhos.cliente'); ?>">Cliente</a> </th>
            <th id="imagem" class="KT_sorter KT_col_imagem <?php echo $tso_listtrabalhos1->getSortIcon('trabalhos.imagem'); ?>"> <a href="<?php echo $tso_listtrabalhos1->getSortLink('trabalhos.imagem'); ?>">Imagem</a> </th>
            <th id="categoria" class="KT_sorter KT_col_categoria <?php echo $tso_listtrabalhos1->getSortIcon('trabalhos.categoria'); ?>"> <a href="<?php echo $tso_listtrabalhos1->getSortLink('trabalhos.categoria'); ?>">Categoria</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtrabalhos1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listtrabalhos1_titulo" id="tfi_listtrabalhos1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtrabalhos1_titulo']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtrabalhos1_descricao" id="tfi_listtrabalhos1_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtrabalhos1_descricao']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listtrabalhos1_cliente" id="tfi_listtrabalhos1_cliente" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtrabalhos1_cliente']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listtrabalhos1_imagem" id="tfi_listtrabalhos1_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtrabalhos1_imagem']); ?>" size="20" maxlength="50" /></td>
              <td><input type="text" name="tfi_listtrabalhos1_categoria" id="tfi_listtrabalhos1_categoria" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtrabalhos1_categoria']); ?>" size="20" maxlength="30" /></td>
              <td><input type="submit" name="tfi_listtrabalhos1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rstrabalhos1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rstrabalhos1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_trabalhos" class="id_checkbox" value="<?php echo $row_rstrabalhos1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rstrabalhos1['id']; ?>" />
                </td>
                <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rstrabalhos1['titulo'], 20); ?></div></td>
                <td><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rstrabalhos1['descricao'], 20); ?></div></td>
                <td><div class="KT_col_cliente"><?php echo KT_FormatForList($row_rstrabalhos1['cliente'], 20); ?></div></td>
                <td><div class="KT_col_imagem"><?php echo KT_FormatForList($row_rstrabalhos1['imagem'], 20); ?></div></td>
                <td><div class="KT_col_categoria"><?php echo KT_FormatForList($row_rstrabalhos1['categoria'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="../../Copy of victor/adm/add_trabalho.php?id=<?php echo $row_rstrabalhos1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rstrabalhos1 = mysql_fetch_assoc($rstrabalhos1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listtrabalhos1->Prepare();
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
        <a class="KT_additem_op_link" href="../../Copy of victor/adm/add_trabalho.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rstrabalhos1);
?>
