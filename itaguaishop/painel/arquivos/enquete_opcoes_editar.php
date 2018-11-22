<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Filter
$tfi_listpoller_option2 = new TFI_TableFilter($conn_ConBD, "tfi_listpoller_option2");
$tfi_listpoller_option2->addColumn("poller_option.optionText", "STRING_TYPE", "optionText", "%");
$tfi_listpoller_option2->addColumn("poller_option.pollerOrder", "NUMERIC_TYPE", "pollerOrder", "=");
$tfi_listpoller_option2->addColumn("poller_option.defaultChecked", "CHECKBOX_1_0_TYPE", "defaultChecked", "%");
$tfi_listpoller_option2->Execute();

// Sorter
$tso_listpoller_option2 = new TSO_TableSorter("rspoller_option1", "tso_listpoller_option2");
$tso_listpoller_option2->addColumn("poller_option.optionText");
$tso_listpoller_option2->addColumn("poller_option.pollerOrder");
$tso_listpoller_option2->addColumn("poller_option.defaultChecked");
$tso_listpoller_option2->setDefault("poller_option.pollerOrder");
$tso_listpoller_option2->Execute();

// Navigation
$nav_listpoller_option2 = new NAV_Regular("nav_listpoller_option2", "rspoller_option1", "../../", $_SERVER['PHP_SELF'], 5);

//NeXTenesio3 Special List Recordset
$maxRows_rspoller_option1 = $_SESSION['max_rows_nav_listpoller_option2'];
$pageNum_rspoller_option1 = 0;
if (isset($_GET['pageNum_rspoller_option1'])) {
  $pageNum_rspoller_option1 = $_GET['pageNum_rspoller_option1'];
}
$startRow_rspoller_option1 = $pageNum_rspoller_option1 * $maxRows_rspoller_option1;

$NXTFilter_rspoller_option1 = "1=1";
if (isset($_SESSION['filter_tfi_listpoller_option2'])) {
  $NXTFilter_rspoller_option1 = $_SESSION['filter_tfi_listpoller_option2'];
}
$NXTSort_rspoller_option1 = "poller_option.pollerOrder";
if (isset($_SESSION['sorter_tso_listpoller_option2'])) {
  $NXTSort_rspoller_option1 = $_SESSION['sorter_tso_listpoller_option2'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rspoller_option1 = sprintf("SELECT poller_option.optionText, poller_option.pollerOrder, poller_option.defaultChecked, poller_option.ID FROM poller_option WHERE %s ORDER BY %s", $NXTFilter_rspoller_option1, $NXTSort_rspoller_option1);
$query_limit_rspoller_option1 = sprintf("%s LIMIT %d, %d", $query_rspoller_option1, $startRow_rspoller_option1, $maxRows_rspoller_option1);
$rspoller_option1 = mysql_query($query_limit_rspoller_option1, $ConBD) or die(mysql_error());
$row_rspoller_option1 = mysql_fetch_assoc($rspoller_option1);

if (isset($_GET['totalRows_rspoller_option1'])) {
  $totalRows_rspoller_option1 = $_GET['totalRows_rspoller_option1'];
} else {
  $all_rspoller_option1 = mysql_query($query_rspoller_option1);
  $totalRows_rspoller_option1 = mysql_num_rows($all_rspoller_option1);
}
$totalPages_rspoller_option1 = ceil($totalRows_rspoller_option1/$maxRows_rspoller_option1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listpoller_option2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
	color: #75CCF0;
}
-->
</style>
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#EDE4EF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Lojas</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Categoria de Lojas </td>
      </tr>
      <tr>
        <td><a href="categoria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td><a href="novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="novidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td class="titulo">Categoria de Novidades</td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Enquete</td>
      </tr>
      <tr>
        <td><a href="enquete_titulo_add.php?ID=1">Editar titulo da Enquete </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_inserir.php">Inserir Op&ccedil;&otilde;es </a></td>
      </tr>
      
      <tr>
        <td><a href="enquete_opcoes_editar.php">Editar/Excluir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
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
  /* NeXTensio3 List row settings */
  .KT_col_optionText {width:140px; overflow:hidden;}
  .KT_col_pollerOrder {width:140px; overflow:hidden;}
  .KT_col_defaultChecked {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo"><p>Editar op&ccedil;&otilde;es da Enquete</p>
          </td>
        </tr>
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listpoller_option2">
              <h1><a href="<?php echo $nav_listpoller_option2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listpoller_option2'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listpoller_option2']; ?>
                      <?php 
  // else Conditional region1
  } else { ?>
                      <?php echo NXT_getResource("all"); ?>
              <?php } 
  // endif Conditional region1
?>
                        <?php echo NXT_getResource("records"); ?></a> &nbsp;
                    &nbsp;
              </h1>
              <div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
                <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listpoller_option2'] == 1) {
?>
                              <a href="<?php echo $tfi_listpoller_option2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listpoller_option2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th width="38" align="center" bgcolor="#EDE4EF"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                        </th>
                        <th width="166" align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_optionText <?php echo $tso_listpoller_option2->getSortIcon('poller_option.optionText'); ?>" id="optionText"><a href="<?php echo $tso_listpoller_option2->getSortLink('poller_option.optionText'); ?>">T&iacute;tulo</a></th>
                        <th width="168" align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_pollerOrder <?php echo $tso_listpoller_option2->getSortIcon('poller_option.pollerOrder'); ?>" id="pollerOrder"> <a href="<?php echo $tso_listpoller_option2->getSortLink('poller_option.pollerOrder'); ?>">Ordem na equente </a> </th>
                        <th width="57" align="center" bgcolor="#EDE4EF" class="KT_sorter KT_col_defaultChecked <?php echo $tso_listpoller_option2->getSortIcon('poller_option.defaultChecked'); ?>" id="defaultChecked"> <a href="<?php echo $tso_listpoller_option2->getSortLink('poller_option.defaultChecked'); ?>">Marcado</a> </th>
                        <th width="89" align="center" bgcolor="#EDE4EF">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listpoller_option2'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td align="center" bgcolor="#EDE4EF">&nbsp;</td>
                          <td align="center" bgcolor="#EDE4EF"><input type="text" name="tfi_listpoller_option2_optionText" id="tfi_listpoller_option2_optionText" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpoller_option2_optionText']); ?>" size="20" maxlength="255" /></td>
                          <td align="center" bgcolor="#EDE4EF"><input type="text" name="tfi_listpoller_option2_pollerOrder" id="tfi_listpoller_option2_pollerOrder" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listpoller_option2_pollerOrder']); ?>" size="20" maxlength="100" /></td>
                          <td align="center" bgcolor="#EDE4EF"><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listpoller_option2_defaultChecked']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listpoller_option2_defaultChecked" id="tfi_listpoller_option2_defaultChecked" value="1" /></td>
                          <td align="center" bgcolor="#EDE4EF"><input type="submit" name="tfi_listpoller_option2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rspoller_option1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rspoller_option1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_poller_option" class="id_checkbox" value="<?php echo $row_rspoller_option1['ID']; ?>" />
                                <input type="hidden" name="ID" class="id_field" value="<?php echo $row_rspoller_option1['ID']; ?>" />
                            </td>
                            <td class="txt_06"><div class="KT_col_optionText"><?php echo KT_FormatForList($row_rspoller_option1['optionText'], 20); ?></div></td>
                            <td class="txt_06"><div class="KT_col_pollerOrder"><?php echo KT_FormatForList($row_rspoller_option1['pollerOrder'], 20); ?>&deg;</div></td>
                            <td><div class="KT_col_defaultChecked">
                              <label>
                              <input <?php if (!(strcmp($row_rspoller_option1['defaultChecked'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="checkbox" value="checkbox" />
                              </label>
</div></td>
                            <td><a class="KT_edit_link" href="enquete_opcoes_inserir.php?ID=<?php echo $row_rspoller_option1['ID']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rspoller_option1 = mysql_fetch_assoc($rspoller_option1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <p>&nbsp;</p>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listpoller_option2->Prepare();
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
                    <a class="KT_additem_op_link" href="enquete_opcoes_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por: Lobster Designer" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rspoller_option1);
?>
