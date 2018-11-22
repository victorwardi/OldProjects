<?php require_once('../../Connections/ConVBS.php'); ?>
<?php require_once('log.php'); ?>
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
$conn_ConVBS = new KT_connection($ConVBS, $database_ConVBS);

// Filter
$tfi_listfotos1 = new TFI_TableFilter($conn_ConVBS, "tfi_listfotos1");
$tfi_listfotos1->addColumn("fotos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listfotos1->addColumn("fotos.foto", "NUMERIC_TYPE", "foto", "=");
$tfi_listfotos1->addColumn("fotos.descricao", "STRING_TYPE", "descricao", "%");
$tfi_listfotos1->Execute();

// Sorter
$tso_listfotos1 = new TSO_TableSorter("rsfotos1", "tso_listfotos1");
$tso_listfotos1->addColumn("fotos.id");
$tso_listfotos1->addColumn("fotos.foto");
$tso_listfotos1->addColumn("fotos.descricao");
$tso_listfotos1->setDefault("fotos.id DESC");
$tso_listfotos1->Execute();

// Navigation
$nav_listfotos1 = new NAV_Regular("nav_listfotos1", "rsfotos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotos1 = $_SESSION['max_rows_nav_listfotos1'];
$pageNum_rsfotos1 = 0;
if (isset($_GET['pageNum_rsfotos1'])) {
  $pageNum_rsfotos1 = $_GET['pageNum_rsfotos1'];
}
$startRow_rsfotos1 = $pageNum_rsfotos1 * $maxRows_rsfotos1;

$NXTFilter_rsfotos1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotos1'])) {
  $NXTFilter_rsfotos1 = $_SESSION['filter_tfi_listfotos1'];
}
$NXTSort_rsfotos1 = "fotos.id DESC";
if (isset($_SESSION['sorter_tso_listfotos1'])) {
  $NXTSort_rsfotos1 = $_SESSION['sorter_tso_listfotos1'];
}
mysql_select_db($database_ConVBS, $ConVBS);

$query_rsfotos1 = sprintf("SELECT fotos.id, fotos.foto, fotos.descricao FROM fotos WHERE %s ORDER BY %s", $NXTFilter_rsfotos1, $NXTSort_rsfotos1);
$query_limit_rsfotos1 = sprintf("%s LIMIT %d, %d", $query_rsfotos1, $startRow_rsfotos1, $maxRows_rsfotos1);
$rsfotos1 = mysql_query($query_limit_rsfotos1, $ConVBS) or die(mysql_error());
$row_rsfotos1 = mysql_fetch_assoc($rsfotos1);

if (isset($_GET['totalRows_rsfotos1'])) {
  $totalRows_rsfotos1 = $_GET['totalRows_rsfotos1'];
} else {
  $all_rsfotos1 = mysql_query($query_rsfotos1);
  $totalRows_rsfotos1 = mysql_num_rows($all_rsfotos1);
}
$totalPages_rsfotos1 = ceil($totalRows_rsfotos1/$maxRows_rsfotos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotos1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../fotos/");
$objDynamicThumb1->setRenameRule("{rsfotos1.foto}");
$objDynamicThumb1->setResize(60, 40, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo VBS</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
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
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
  .KT_col_descricao {width:140px; overflow:hidden;}
</style>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
	color: #333333;
}
-->
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#CCCCCC"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Produtos</td>
      </tr>
      <tr>
        <td><a href="produtos_add.php">Inserir  </a></td>
      </tr>
      <tr>
        <td><a href="produtos_edite.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Marcas</td>
      </tr>
      <tr>
        <td><a href="marca_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="marca_editar.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Tipos</td>
      </tr>
      <tr>
        <td><a href="tipo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="tipo_editar.php">Editar/Excluir </a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_add.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Publicidade</td>
      </tr>
      <tr>
        <td><a href="publicidade_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td><a href="publicidade_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Sair </td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair do Painel</a></td>
      </tr>
      <tr>
        <td><a href="foto_edite.php"></a></td>
      </tr>
      
    </table></td>
    <td width="600" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Editar/Excluir Fotos </td>
        </tr>
        <tr>
          <td><div class="KT_tng" id="listfotos1">
            <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listfotos1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotos1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listfotos1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotos1'] == 1) {
?>
                              <a href="<?php echo $tfi_listfotos1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfotos1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th align="center" bgcolor="#333333"> <input name="KT_selAll" type="checkbox" class="style2" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#333333" class="KT_sorter KT_col_foto <?php echo $tso_listfotos1->getSortIcon('fotos.foto'); ?> style2" id="foto"> Foto </th>
                        <th align="center" bgcolor="#333333" class="KT_sorter KT_col_descricao <?php echo $tso_listfotos1->getSortIcon('fotos.descricao'); ?> style2" id="descricao"> Descri&ccedil;&atilde;o </th>
                        <th align="center" bgcolor="#333333"><span class="style2"></span></th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotos1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listfotos1_foto" id="tfi_listfotos1_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos1_foto']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listfotos1_descricao" id="tfi_listfotos1_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotos1_descricao']); ?>" size="20" maxlength="100" /></td>
                          <td><input type="submit" name="tfi_listfotos1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
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
                            <td><input type="checkbox" name="kt_pk_fotos" class="id_checkbox" value="<?php echo $row_rsfotos1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsfotos1['id']; ?>" />                            </td>
                            <td align="center"><div class="KT_col_foto"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rsfotos1['descricao'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="foto_add.php?id=<?php echo $row_rsfotos1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsfotos1 = mysql_fetch_assoc($rsfotos1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listfotos1->Prepare();
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
                    <a class="KT_additem_op_link" href="foto_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td colspan="2"><img src="../../img/rodape.jpg" width="850" height="30" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsfotos1);
?>
