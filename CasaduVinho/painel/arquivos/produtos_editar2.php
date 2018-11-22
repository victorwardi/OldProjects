<?php require_once('../../Connections/ConBD.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

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
$tfi_listprodutos4 = new TFI_TableFilter($conn_ConBD, "tfi_listprodutos4");
$tfi_listprodutos4->addColumn("produtos.id", "NUMERIC_TYPE", "id", "=");
$tfi_listprodutos4->addColumn("produtos.foto", "NUMERIC_TYPE", "foto", "=");
$tfi_listprodutos4->addColumn("produtos.nome", "STRING_TYPE", "nome", "%");
$tfi_listprodutos4->addColumn("produtos.valor", "STRING_TYPE", "valor", "%");
$tfi_listprodutos4->addColumn("produtos.promocao", "STRING_TYPE", "promocao", "%");
$tfi_listprodutos4->Execute();

// Sorter
$tso_listprodutos4 = new TSO_TableSorter("rsprodutos1", "tso_listprodutos4");
$tso_listprodutos4->addColumn("produtos.id");
$tso_listprodutos4->addColumn("produtos.foto");
$tso_listprodutos4->addColumn("produtos.nome");
$tso_listprodutos4->addColumn("produtos.valor");
$tso_listprodutos4->addColumn("produtos.promocao");
$tso_listprodutos4->setDefault("produtos.id DESC");
$tso_listprodutos4->Execute();

// Navigation
$nav_listprodutos4 = new NAV_Regular("nav_listprodutos4", "rsprodutos1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsprodutos1 = $_SESSION['max_rows_nav_listprodutos4'];
$pageNum_rsprodutos1 = 0;
if (isset($_GET['pageNum_rsprodutos1'])) {
  $pageNum_rsprodutos1 = $_GET['pageNum_rsprodutos1'];
}
$startRow_rsprodutos1 = $pageNum_rsprodutos1 * $maxRows_rsprodutos1;

// Defining List Recordset variable
$NXTFilter_rsprodutos1 = "1=1";
if (isset($_SESSION['filter_tfi_listprodutos4'])) {
  $NXTFilter_rsprodutos1 = $_SESSION['filter_tfi_listprodutos4'];
}
// Defining List Recordset variable
$NXTSort_rsprodutos1 = "produtos.id DESC";
if (isset($_SESSION['sorter_tso_listprodutos4'])) {
  $NXTSort_rsprodutos1 = $_SESSION['sorter_tso_listprodutos4'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsprodutos1 = "SELECT produtos.id, produtos.foto, produtos.nome, produtos.valor, produtos.promocao FROM produtos WHERE {$NXTFilter_rsprodutos1} ORDER BY {$NXTSort_rsprodutos1}";
$query_limit_rsprodutos1 = sprintf("%s LIMIT %d, %d", $query_rsprodutos1, $startRow_rsprodutos1, $maxRows_rsprodutos1);
$rsprodutos1 = mysql_query($query_limit_rsprodutos1, $ConBD) or die(mysql_error());
$row_rsprodutos1 = mysql_fetch_assoc($rsprodutos1);

if (isset($_GET['totalRows_rsprodutos1'])) {
  $totalRows_rsprodutos1 = $_GET['totalRows_rsprodutos1'];
} else {
  $all_rsprodutos1 = mysql_query($query_rsprodutos1);
  $totalRows_rsprodutos1 = mysql_num_rows($all_rsprodutos1);
}
$totalPages_rsprodutos1 = ceil($totalRows_rsprodutos1/$maxRows_rsprodutos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listprodutos4->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
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
  /* Dynamic List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_valor {width:140px; overflow:hidden;}
  .KT_col_promocao {width:28px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(../../img/fundo.jpg);
	background-color: #28370E;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<link href="../../css/painel.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="750" border="1" align="center" cellpadding="1" cellspacing="4" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" background="../img/base.jpg"><img src="../img/topo.jpg" alt="Painel Administrativo" width="600" height="80" /></td>
  </tr>
  <tr>
    <td width="180" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="left" valign="middle" class="titulomenu">Menu</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Produtos</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Pa&iacute;s</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_editar.php">Editar/Excluir</a></td>
      </tr>
      
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Topo</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Lateral</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_editar.php">Editar/Excluir</a></td>
      </tr>
      

      
      <tr>
        <td align="left" valign="middle" class="titulomenu">Logout</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><a href="<?php echo $logoutAction ?>" class="link style6">Sair</a></td>
      </tr>
      
    </table></td>
    <td width="619" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
    <div class="KT_tng" id="listprodutos4">
      <div class="KT_tnglist">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
          <div class="KT_options"> <a href="<?php echo $nav_listprodutos4->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listprodutos4'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listprodutos4']; ?>
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
  if (@$_SESSION['has_filter_tfi_listprodutos4'] == 1) {
?>
                  <a href="<?php echo $tfi_listprodutos4->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listprodutos4->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
          </div>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                </th>
                <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listprodutos4->getSortIcon('produtos.foto'); ?>"> <a href="<?php echo $tso_listprodutos4->getSortLink('produtos.foto'); ?>">Foto</a> </th>
                <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listprodutos4->getSortIcon('produtos.nome'); ?>"> <a href="<?php echo $tso_listprodutos4->getSortLink('produtos.nome'); ?>">Nome</a> </th>
                <th id="valor" class="KT_sorter KT_col_valor <?php echo $tso_listprodutos4->getSortIcon('produtos.valor'); ?>"> <a href="<?php echo $tso_listprodutos4->getSortLink('produtos.valor'); ?>">Valor</a> </th>
                <th id="promocao" class="KT_sorter KT_col_promocao <?php echo $tso_listprodutos4->getSortIcon('produtos.promocao'); ?>"> <a href="<?php echo $tso_listprodutos4->getSortLink('produtos.promocao'); ?>">Promoção</a> </th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listprodutos4'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><input type="text" name="tfi_listprodutos4_foto" id="tfi_listprodutos4_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos4_foto']); ?>" size="20" maxlength="100" /></td>
                  <td><input type="text" name="tfi_listprodutos4_nome" id="tfi_listprodutos4_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos4_nome']); ?>" size="20" maxlength="100" /></td>
                  <td><input type="text" name="tfi_listprodutos4_valor" id="tfi_listprodutos4_valor" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listprodutos4_valor']); ?>" size="20" maxlength="20" /></td>
                  <td><select name="tfi_listprodutos4_promocao" id="tfi_listprodutos4_promocao">
                      <option value="sim" <?php if (!(strcmp("sim", KT_escapeAttribute(@$_SESSION['tfi_listprodutos4_promocao'])))) {echo "SELECTED";} ?>>Sim</option>
                      <option value="nao" <?php if (!(strcmp("nao", KT_escapeAttribute(@$_SESSION['tfi_listprodutos4_promocao'])))) {echo "SELECTED";} ?>>Não</option>
                    </select>                  </td>
                  <td><input type="submit" name="tfi_listprodutos4" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
            </thead>
            <tbody>
              <?php if ($totalRows_rsprodutos1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rsprodutos1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                    <td><input type="checkbox" name="kt_pk_produtos" class="id_checkbox" value="<?php echo $row_rsprodutos1['id']; ?>" />
                        <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsprodutos1['id']; ?>" />                    </td>
                    <td><div class="KT_col_foto"><?php echo KT_FormatForList($row_rsprodutos1['foto'], 20); ?></div></td>
                    <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsprodutos1['nome'], 20); ?></div></td>
                    <td><div class="KT_col_valor"><?php echo KT_FormatForList($row_rsprodutos1['valor'], 20); ?></div></td>
                    <td><div class="KT_col_promocao"><?php echo KT_FormatForList($row_rsprodutos1['promocao'], 4); ?></div></td>
                    <td><a class="KT_edit_link" href="produtos_inserir.php?id=<?php echo $row_rsprodutos1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                  </tr>
                  <?php } while ($row_rsprodutos1 = mysql_fetch_assoc($rsprodutos1)); ?>
                <?php } // Show if recordset not empty ?>
            </tbody>
          </table>
          <div class="KT_bottomnav">
            <div>
              <?php
            $nav_listprodutos4->Prepare();
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
            <a class="KT_additem_op_link" href="produtos_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
        </form>
      </div>
      <br class="clearfixplain" />
    </div>
    <p>&nbsp;</p>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="left" valign="top" class="titulo">Titulo</td>
        </tr>
        <tr>
          <td height="19" align="left" valign="top">&nbsp;</td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center" valign="middle" background="../img/base.jpg" bgcolor="#2B90BA"><span class="txt_branco">Painel Administrativo desenvolvido por: <span class="fonte"><span class="txt_branco"><strong>Victor Caetano</strong></span></span></span></td>
  </tr>
</table>
</body><!-- InstanceEnd --></html>
<?php
mysql_free_result($rsprodutos1);
?>
