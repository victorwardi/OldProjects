<?php require_once('../../Connections/ConVBS.php'); ?><?php require_once('log.php'); ?><?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

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
$tfi_listtipo1 = new TFI_TableFilter($conn_ConVBS, "tfi_listtipo1");
$tfi_listtipo1->addColumn("tipo.nome", "STRING_TYPE", "nome", "%");
$tfi_listtipo1->Execute();

// Sorter
$tso_listtipo1 = new TSO_TableSorter("rstipo1", "tso_listtipo1");
$tso_listtipo1->addColumn("tipo.nome");
$tso_listtipo1->setDefault("tipo.nome");
$tso_listtipo1->Execute();

// Navigation
$nav_listtipo1 = new NAV_Regular("nav_listtipo1", "rstipo1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rstipo1 = $_SESSION['max_rows_nav_listtipo1'];
$pageNum_rstipo1 = 0;
if (isset($_GET['pageNum_rstipo1'])) {
  $pageNum_rstipo1 = $_GET['pageNum_rstipo1'];
}
$startRow_rstipo1 = $pageNum_rstipo1 * $maxRows_rstipo1;

// Defining List Recordset variable
$NXTFilter_rstipo1 = "1=1";
if (isset($_SESSION['filter_tfi_listtipo1'])) {
  $NXTFilter_rstipo1 = $_SESSION['filter_tfi_listtipo1'];
}
// Defining List Recordset variable
$NXTSort_rstipo1 = "tipo.nome";
if (isset($_SESSION['sorter_tso_listtipo1'])) {
  $NXTSort_rstipo1 = $_SESSION['sorter_tso_listtipo1'];
}
mysql_select_db($database_ConVBS, $ConVBS);

$query_rstipo1 = "SELECT tipo.nome, tipo.id_tipo FROM tipo WHERE {$NXTFilter_rstipo1} ORDER BY {$NXTSort_rstipo1}";
$query_limit_rstipo1 = sprintf("%s LIMIT %d, %d", $query_rstipo1, $startRow_rstipo1, $maxRows_rstipo1);
$rstipo1 = mysql_query($query_limit_rstipo1, $ConVBS) or die(mysql_error());
$row_rstipo1 = mysql_fetch_assoc($rstipo1);

if (isset($_GET['totalRows_rstipo1'])) {
  $totalRows_rstipo1 = $_GET['totalRows_rstipo1'];
} else {
  $all_rstipo1 = mysql_query($query_rstipo1);
  $totalRows_rstipo1 = mysql_num_rows($all_rstipo1);
}
$totalPages_rstipo1 = ceil($totalRows_rstipo1/$maxRows_rstipo1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtipo1->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Tipos</td>
        </tr>
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listtipo1">
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listtipo1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtipo1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listtipo1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtipo1'] == 1) {
?>
                  <a href="<?php echo $tfi_listtipo1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listtipo1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#CCCCCC"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th bgcolor="#CCCCCC" class="KT_sorter KT_col_nome <?php echo $tso_listtipo1->getSortIcon('tipo.nome'); ?>" id="nome"> <div align="center"><a href="<?php echo $tso_listtipo1->getSortLink('tipo.nome'); ?>">Nome</a> </div></th>
                        <th bgcolor="#CCCCCC">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtipo1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listtipo1_nome" id="tfi_listtipo1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtipo1_nome']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="submit" name="tfi_listtipo1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rstipo1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="3"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rstipo1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_tipo" class="id_checkbox" value="<?php echo $row_rstipo1['id_tipo']; ?>" />
                                <input type="hidden" name="id_tipo" class="id_field" value="<?php echo $row_rstipo1['id_tipo']; ?>" />                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rstipo1['nome'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="tipo_inserir.php?id_tipo=<?php echo $row_rstipo1['id_tipo']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rstipo1 = mysql_fetch_assoc($rstipo1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listtipo1->Prepare();
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
                    <a class="KT_additem_op_link" href="tipo_inserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
mysql_free_result($rstipo1);
?>
