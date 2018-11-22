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
$tfi_listmarcas1 = new TFI_TableFilter($conn_ConVBS, "tfi_listmarcas1");
$tfi_listmarcas1->addColumn("marcas.nome", "STRING_TYPE", "nome", "%");
$tfi_listmarcas1->addColumn("marcas.foto", "FILE_TYPE", "foto", "%");
$tfi_listmarcas1->Execute();

// Sorter
$tso_listmarcas1 = new TSO_TableSorter("rsmarcas1", "tso_listmarcas1");
$tso_listmarcas1->addColumn("marcas.nome");
$tso_listmarcas1->addColumn("marcas.foto");
$tso_listmarcas1->setDefault("marcas.nome");
$tso_listmarcas1->Execute();

// Navigation
$nav_listmarcas1 = new NAV_Regular("nav_listmarcas1", "rsmarcas1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsmarcas1 = $_SESSION['max_rows_nav_listmarcas1'];
$pageNum_rsmarcas1 = 0;
if (isset($_GET['pageNum_rsmarcas1'])) {
  $pageNum_rsmarcas1 = $_GET['pageNum_rsmarcas1'];
}
$startRow_rsmarcas1 = $pageNum_rsmarcas1 * $maxRows_rsmarcas1;

// Defining List Recordset variable
$NXTFilter_rsmarcas1 = "1=1";
if (isset($_SESSION['filter_tfi_listmarcas1'])) {
  $NXTFilter_rsmarcas1 = $_SESSION['filter_tfi_listmarcas1'];
}
// Defining List Recordset variable
$NXTSort_rsmarcas1 = "marcas.nome";
if (isset($_SESSION['sorter_tso_listmarcas1'])) {
  $NXTSort_rsmarcas1 = $_SESSION['sorter_tso_listmarcas1'];
}
mysql_select_db($database_ConVBS, $ConVBS);

$query_rsmarcas1 = "SELECT marcas.nome, marcas.foto, marcas.id_marca FROM marcas WHERE {$NXTFilter_rsmarcas1} ORDER BY {$NXTSort_rsmarcas1}";
$query_limit_rsmarcas1 = sprintf("%s LIMIT %d, %d", $query_rsmarcas1, $startRow_rsmarcas1, $maxRows_rsmarcas1);
$rsmarcas1 = mysql_query($query_limit_rsmarcas1, $ConVBS) or die(mysql_error());
$row_rsmarcas1 = mysql_fetch_assoc($rsmarcas1);

if (isset($_GET['totalRows_rsmarcas1'])) {
  $totalRows_rsmarcas1 = $_GET['totalRows_rsmarcas1'];
} else {
  $all_rsmarcas1 = mysql_query($query_rsmarcas1);
  $totalRows_rsmarcas1 = mysql_num_rows($all_rsmarcas1);
}
$totalPages_rsmarcas1 = ceil($totalRows_rsmarcas1/$maxRows_rsmarcas1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listmarcas1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../fotos/");
$objDynamicThumb1->setRenameRule("{rsmarcas1.foto}");
$objDynamicThumb1->setResize(50, 0, true);
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
      </script>
      <style type="text/css">
  /* Dynamic List row settings */
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Marcas Inseridas</td>
        </tr>
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listmarcas1">
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listmarcas1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listmarcas1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listmarcas1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listmarcas1'] == 1) {
?>
                  <a href="<?php echo $tfi_listmarcas1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listmarcas1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#CCCCCC"> <div align="center">
                          <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        
                        </div></th>
                        <th bgcolor="#CCCCCC" class="KT_sorter KT_col_nome <?php echo $tso_listmarcas1->getSortIcon('marcas.nome'); ?>" id="nome"> <div align="center"><a href="<?php echo $tso_listmarcas1->getSortLink('marcas.nome'); ?>">Nome</a> </div></th>
                        <th bgcolor="#CCCCCC" class="KT_sorter KT_col_foto <?php echo $tso_listmarcas1->getSortIcon('marcas.foto'); ?>" id="foto"> <div align="center"><a href="<?php echo $tso_listmarcas1->getSortLink('marcas.foto'); ?>">Foto</a> </div></th>
                        <th bgcolor="#CCCCCC"><div align="center"></div></th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listmarcas1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listmarcas1_nome" id="tfi_listmarcas1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmarcas1_nome']); ?>" size="20" maxlength="200" /></td>
                          <td><input type="text" name="tfi_listmarcas1_foto" id="tfi_listmarcas1_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmarcas1_foto']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="submit" name="tfi_listmarcas1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsmarcas1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsmarcas1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_marcas" class="id_checkbox" value="<?php echo $row_rsmarcas1['id_marca']; ?>" />
                                <input type="hidden" name="id_marca" class="id_field" value="<?php echo $row_rsmarcas1['id_marca']; ?>" />                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsmarcas1['nome'], 20); ?></div></td>
                            <td><div class="KT_col_foto"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><a class="KT_edit_link" href="marca_inserir.php?id_marca=<?php echo $row_rsmarcas1['id_marca']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsmarcas1 = mysql_fetch_assoc($rsmarcas1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listmarcas1->Prepare();
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
                    <a class="KT_additem_op_link" href="marca_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rsmarcas1);
?>
