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
$tfi_listprodutos3 = new TFI_TableFilter($conn_ConVBS, "tfi_listprodutos3");
$tfi_listprodutos3->addColumn("produtos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listprodutos3->addColumn("produtos.nome", "STRING_TYPE", "nome", "%");
$tfi_listprodutos3->addColumn("produtos.preco", "STRING_TYPE", "preco", "%");
$tfi_listprodutos3->addColumn("produtos.foto1", "FILE_TYPE", "foto1", "%");
$tfi_listprodutos3->Execute();

// Sorter
$tso_listprodutos3 = new TSO_TableSorter("rsprodutos1", "tso_listprodutos3");
$tso_listprodutos3->addColumn("produtos.id");
$tso_listprodutos3->addColumn("produtos.nome");
$tso_listprodutos3->addColumn("produtos.preco");
$tso_listprodutos3->addColumn("produtos.foto1");
$tso_listprodutos3->setDefault("produtos.id DESC");
$tso_listprodutos3->Execute();

// Navigation
$nav_listprodutos3 = new NAV_Regular("nav_listprodutos3", "rsprodutos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsprodutos1 = $_SESSION['max_rows_nav_listprodutos3'];
$pageNum_rsprodutos1 = 0;
if (isset($_GET['pageNum_rsprodutos1'])) {
  $pageNum_rsprodutos1 = $_GET['pageNum_rsprodutos1'];
}
$startRow_rsprodutos1 = $pageNum_rsprodutos1 * $maxRows_rsprodutos1;

$NXTFilter_rsprodutos1 = "1=1";
if (isset($_SESSION['filter_tfi_listprodutos3'])) {
  $NXTFilter_rsprodutos1 = $_SESSION['filter_tfi_listprodutos3'];
}
$NXTSort_rsprodutos1 = "produtos.id DESC";
if (isset($_SESSION['sorter_tso_listprodutos3'])) {
  $NXTSort_rsprodutos1 = $_SESSION['sorter_tso_listprodutos3'];
}
mysql_select_db($database_ConVBS, $ConVBS);

$query_rsprodutos1 = sprintf("SELECT produtos.id, produtos.nome, produtos.preco, produtos.foto1 FROM produtos WHERE %s ORDER BY %s", $NXTFilter_rsprodutos1, $NXTSort_rsprodutos1);
$query_limit_rsprodutos1 = sprintf("%s LIMIT %d, %d", $query_rsprodutos1, $startRow_rsprodutos1, $maxRows_rsprodutos1);
$rsprodutos1 = mysql_query($query_limit_rsprodutos1, $ConVBS) or die(mysql_error());
$row_rsprodutos1 = mysql_fetch_assoc($rsprodutos1);

if (isset($_GET['totalRows_rsprodutos1'])) {
  $totalRows_rsprodutos1 = $_GET['totalRows_rsprodutos1'];
} else {
  $all_rsprodutos1 = mysql_query($query_rsprodutos1);
  $totalRows_rsprodutos1 = mysql_num_rows($all_rsprodutos1);
}
$totalPages_rsprodutos1 = ceil($totalRows_rsprodutos1/$maxRows_rsprodutos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listprodutos3->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../fotos/");
$objDynamicThumb1->setRenameRule("{rsprodutos1.foto1}");
$objDynamicThumb1->setResize(60, 0, true);
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
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_preco {width:140px; overflow:hidden;}
  .KT_col_foto1 {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Editar/Excluir</td>
        </tr>
        <tr>
          <td>Produtos
            <?php
  $nav_listprodutos3->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
            <div class="KT_tng" id="listprodutos3">
                <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listprodutos3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listprodutos3'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listprodutos3']; ?>
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
  if (@$_SESSION['has_filter_tfi_listprodutos3'] == 1) {
?>
                              <a href="<?php echo $tfi_listprodutos3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listprodutos3->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#999999"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th align="center" bgcolor="#999999" class="KT_sorter KT_col_nome <?php echo $tso_listprodutos3->getSortIcon('produtos.nome'); ?>" id="nome"> <a href="<?php echo $tso_listprodutos3->getSortLink('produtos.nome'); ?>">Nome</a> </th>
                        <th align="center" bgcolor="#999999" class="KT_sorter KT_col_preco <?php echo $tso_listprodutos3->getSortIcon('produtos.preco'); ?>" id="preco"> <a href="<?php echo $tso_listprodutos3->getSortLink('produtos.preco'); ?>">Preco</a> </th>
                        <th align="center" bgcolor="#999999" class="KT_sorter KT_col_foto1 <?php echo $tso_listprodutos3->getSortIcon('produtos.foto1'); ?>" id="foto1"> <a href="<?php echo $tso_listprodutos3->getSortLink('produtos.foto1'); ?>">Foto</a></th>
                        <th align="center" bgcolor="#999999">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listprodutos3'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listprodutos3_nome" id="tfi_listprodutos3_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos3_nome']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="text" name="tfi_listprodutos3_preco" id="tfi_listprodutos3_preco" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos3_preco']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="text" name="tfi_listprodutos3_foto1" id="tfi_listprodutos3_foto1" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos3_foto1']); ?>" size="20" maxlength="50" /></td>
                          <td><input type="submit" name="tfi_listprodutos3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsprodutos1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsprodutos1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_produtos" class="id_checkbox" value="<?php echo $row_rsprodutos1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsprodutos1['id']; ?>" />
                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsprodutos1['nome'], 20); ?></div></td>
                            <td><div class="KT_col_preco"><?php echo KT_FormatForList($row_rsprodutos1['preco'], 20); ?></div></td>
                            <td><div class="KT_col_foto1"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><a class="KT_edit_link" href="produtos_add.php?id=<?php echo $row_rsprodutos1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsprodutos1 = mysql_fetch_assoc($rsprodutos1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listprodutos3->Prepare();
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
                    <a class="KT_additem_op_link" href="produtos_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsprodutos1);
?>
