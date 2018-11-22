<?php require_once('../../Connections/xpress.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

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
$tfi_listofertas1 = new TFI_TableFilter($conn_xpress, "tfi_listofertas1");
$tfi_listofertas1->addColumn("ofertas.nome", "STRING_TYPE", "nome", "%");
$tfi_listofertas1->addColumn("ofertas.descricao", "STRING_TYPE", "descricao", "%");
$tfi_listofertas1->addColumn("ofertas.preco", "STRING_TYPE", "preco", "%");
$tfi_listofertas1->addColumn("ofertas.foto", "STRING_TYPE", "foto", "%");
$tfi_listofertas1->Execute();

// Sorter
$tso_listofertas1 = new TSO_TableSorter("rsofertas1", "tso_listofertas1");
$tso_listofertas1->addColumn("ofertas.nome");
$tso_listofertas1->addColumn("ofertas.descricao");
$tso_listofertas1->addColumn("ofertas.preco");
$tso_listofertas1->addColumn("ofertas.foto");
$tso_listofertas1->setDefault("ofertas.nome DESC");
$tso_listofertas1->Execute();

// Navigation
$nav_listofertas1 = new NAV_Regular("nav_listofertas1", "rsofertas1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsofertas1 = $_SESSION['max_rows_nav_listofertas1'];
$pageNum_rsofertas1 = 0;
if (isset($_GET['pageNum_rsofertas1'])) {
  $pageNum_rsofertas1 = $_GET['pageNum_rsofertas1'];
}
$startRow_rsofertas1 = $pageNum_rsofertas1 * $maxRows_rsofertas1;

$NXTFilter_rsofertas1 = "1=1";
if (isset($_SESSION['filter_tfi_listofertas1'])) {
  $NXTFilter_rsofertas1 = $_SESSION['filter_tfi_listofertas1'];
}
$NXTSort_rsofertas1 = "ofertas.nome DESC";
if (isset($_SESSION['sorter_tso_listofertas1'])) {
  $NXTSort_rsofertas1 = $_SESSION['sorter_tso_listofertas1'];
}
mysql_select_db($database_xpress, $xpress);

$query_rsofertas1 = sprintf("SELECT ofertas.nome, ofertas.descricao, ofertas.preco, ofertas.foto, ofertas.id FROM ofertas WHERE %s ORDER BY %s", $NXTFilter_rsofertas1, $NXTSort_rsofertas1);
$query_limit_rsofertas1 = sprintf("%s LIMIT %d, %d", $query_rsofertas1, $startRow_rsofertas1, $maxRows_rsofertas1);
$rsofertas1 = mysql_query($query_limit_rsofertas1, $xpress) or die(mysql_error());
$row_rsofertas1 = mysql_fetch_assoc($rsofertas1);

if (isset($_GET['totalRows_rsofertas1'])) {
  $totalRows_rsofertas1 = $_GET['totalRows_rsofertas1'];
} else {
  $all_rsofertas1 = mysql_query($query_rsofertas1);
  $totalRows_rsofertas1 = mysql_num_rows($all_rsofertas1);
}
$totalPages_rsofertas1 = ceil($totalRows_rsofertas1/$maxRows_rsofertas1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listofertas1->checkBoundries();
?><?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
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
  .KT_col_descricao {width:140px; overflow:hidden;}
  .KT_col_preco {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="../../css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="KT_tng" id="listofertas1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
    </tr>
    <tr>
      <td><h1> Editar / Excluir Ofertas
          <?php
  $nav_listofertas1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> <a href="<?php echo $nav_listofertas1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                  <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listofertas1'] == 1) {
?>
                  <?php echo $_SESSION['default_max_rows_nav_listofertas1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listofertas1'] == 1) {
?>
              <a href="<?php echo $tfi_listofertas1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listofertas1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
            </div>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <thead>
                <tr class="KT_row_order">
                  <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                  </th>
                  <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listofertas1->getSortIcon('ofertas.nome'); ?>"> <a href="<?php echo $tso_listofertas1->getSortLink('ofertas.nome'); ?>">Nome</a> </th>
                  <th id="descricao" class="KT_sorter KT_col_descricao <?php echo $tso_listofertas1->getSortIcon('ofertas.descricao'); ?>"> <a href="<?php echo $tso_listofertas1->getSortLink('ofertas.descricao'); ?>">Descricao</a> </th>
                  <th id="preco" class="KT_sorter KT_col_preco <?php echo $tso_listofertas1->getSortIcon('ofertas.preco'); ?>"> <a href="<?php echo $tso_listofertas1->getSortLink('ofertas.preco'); ?>">Preco</a> </th>
                  <th id="foto" class="KT_sorter KT_col_foto <?php echo $tso_listofertas1->getSortIcon('ofertas.foto'); ?>"> <a href="<?php echo $tso_listofertas1->getSortLink('ofertas.foto'); ?>">Foto</a> </th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listofertas1'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><input type="text" name="tfi_listofertas1_nome" id="tfi_listofertas1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listofertas1_nome']); ?>" size="20" maxlength="50" /></td>
                  <td><input type="text" name="tfi_listofertas1_descricao" id="tfi_listofertas1_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listofertas1_descricao']); ?>" size="20" maxlength="100" /></td>
                  <td><input type="text" name="tfi_listofertas1_preco" id="tfi_listofertas1_preco" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listofertas1_preco']); ?>" size="20" maxlength="50" /></td>
                  <td><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsofertas1.foto}", 80, 60, true); ?>" class="borda" /></td>
                  <td><input type="submit" name="tfi_listofertas1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
              </thead>
              <tbody>
                <?php if ($totalRows_rsofertas1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
                <?php if ($totalRows_rsofertas1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_ofertas" class="id_checkbox" value="<?php echo $row_rsofertas1['id']; ?>" />
                      <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsofertas1['id']; ?>" />
                  </td>
                  <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsofertas1['nome'], 20); ?></div></td>
                  <td><div class="KT_col_descricao"><?php echo KT_FormatForList($row_rsofertas1['descricao'], 20); ?></div></td>
                  <td><div class="KT_col_preco"><?php echo KT_FormatForList($row_rsofertas1['preco'], 20); ?></div></td>
                  <td align="center" valign="middle"><div class="KT_col_foto"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{rsofertas1.foto}", 60, 0, true); ?>" class="borda" /> </div></td>
                  <td><a class="KT_edit_link" href="oferta_add.php?id=<?php echo $row_rsofertas1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsofertas1 = mysql_fetch_assoc($rsofertas1)); ?>
                <?php } // Show if recordset not empty ?>
              </tbody>
            </table>
            <div class="KT_bottomnav">
              <div>
                <?php
            $nav_listofertas1->Prepare();
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
            <a class="KT_additem_op_link" href="oferta_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
          </form>
        </div>
        <p><br class="clearfixplain" />
        </p>
      <p>&nbsp; </p></td>
    </tr>
    <tr>
      <td height="20" align="center" valign="middle" bgcolor="#3B63A1"><span class="barnco">Adminstrativo desenvolvido por Victor Caetano - todos os direitos Reservados Xpressbb.com </span></td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsofertas1);
?>
