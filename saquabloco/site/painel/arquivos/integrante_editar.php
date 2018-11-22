<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
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

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

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
$tfi_listintegrantes1 = new TFI_TableFilter($conn_ConBD, "tfi_listintegrantes1");
$tfi_listintegrantes1->addColumn("integrantes.id", "NUMERIC_TYPE", "id", "=");
$tfi_listintegrantes1->addColumn("integrantes.foto", "FILE_TYPE", "foto", "%");
$tfi_listintegrantes1->addColumn("integrantes.nome", "STRING_TYPE", "nome", "%");
$tfi_listintegrantes1->addColumn("integrantes.cargo", "STRING_TYPE", "cargo", "%");
$tfi_listintegrantes1->Execute();

// Sorter
$tso_listintegrantes1 = new TSO_TableSorter("rsintegrantes1", "tso_listintegrantes1");
$tso_listintegrantes1->addColumn("integrantes.id");
$tso_listintegrantes1->addColumn("integrantes.foto");
$tso_listintegrantes1->addColumn("integrantes.nome");
$tso_listintegrantes1->addColumn("integrantes.cargo");
$tso_listintegrantes1->setDefault("integrantes.id DESC");
$tso_listintegrantes1->Execute();

// Navigation
$nav_listintegrantes1 = new NAV_Regular("nav_listintegrantes1", "rsintegrantes1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsintegrantes1 = $_SESSION['max_rows_nav_listintegrantes1'];
$pageNum_rsintegrantes1 = 0;
if (isset($_GET['pageNum_rsintegrantes1'])) {
  $pageNum_rsintegrantes1 = $_GET['pageNum_rsintegrantes1'];
}
$startRow_rsintegrantes1 = $pageNum_rsintegrantes1 * $maxRows_rsintegrantes1;

// Defining List Recordset variable
$NXTFilter_rsintegrantes1 = "1=1";
if (isset($_SESSION['filter_tfi_listintegrantes1'])) {
  $NXTFilter_rsintegrantes1 = $_SESSION['filter_tfi_listintegrantes1'];
}
// Defining List Recordset variable
$NXTSort_rsintegrantes1 = "integrantes.id DESC";
if (isset($_SESSION['sorter_tso_listintegrantes1'])) {
  $NXTSort_rsintegrantes1 = $_SESSION['sorter_tso_listintegrantes1'];
}
mysql_select_db($database_ConBD, $ConBD);

$query_rsintegrantes1 = "SELECT integrantes.id, integrantes.foto, integrantes.nome, integrantes.cargo FROM integrantes WHERE {$NXTFilter_rsintegrantes1} ORDER BY {$NXTSort_rsintegrantes1}";
$query_limit_rsintegrantes1 = sprintf("%s LIMIT %d, %d", $query_rsintegrantes1, $startRow_rsintegrantes1, $maxRows_rsintegrantes1);
$rsintegrantes1 = mysql_query($query_limit_rsintegrantes1, $ConBD) or die(mysql_error());
$row_rsintegrantes1 = mysql_fetch_assoc($rsintegrantes1);

if (isset($_GET['totalRows_rsintegrantes1'])) {
  $totalRows_rsintegrantes1 = $_GET['totalRows_rsintegrantes1'];
} else {
  $all_rsintegrantes1 = mysql_query($query_rsintegrantes1);
  $totalRows_rsintegrantes1 = mysql_num_rows($all_rsintegrantes1);
}
$totalPages_rsintegrantes1 = ceil($totalRows_rsintegrantes1/$maxRows_rsintegrantes1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listintegrantes1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../Uploads/");
$objDynamicThumb1->setRenameRule("{rsintegrantes1.foto}");
$objDynamicThumb1->setResize(40, 0, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg.jpg);
	background-color: #60BFF9;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#C0DCFA">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="galeria_editar.php">Editar/Excluir</a></td>
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
        <td class="titulo">Integrantes</td>
      </tr>
      <tr>
        <td><a href="integrante_add.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="integrante_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Depoimentos</td>
      </tr>
      <tr>
        <td><a href="depoimento_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="depoimento_editar.php">Aprovar/Excluir</a></td>
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
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
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
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_foto {width:140px; overflow:hidden;}
  .KT_col_nome {width:140px; overflow:hidden;}
  .KT_col_cargo {width:140px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Integrantes</td>
        </tr>
        <tr>
          <td>&nbsp;
            <div class="KT_tng" id="listintegrantes1">
              <h1> Integrantes
                <?php
  $nav_listintegrantes1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listintegrantes1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listintegrantes1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listintegrantes1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listintegrantes1'] == 1) {
?>
                  <a href="<?php echo $tfi_listintegrantes1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listintegrantes1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="borda_roxa" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th class="titulo"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th id="foto" class="titulo"> <a href="<?php echo $tso_listintegrantes1->getSortLink('integrantes.foto'); ?>">Foto</a> </th>
                        <th id="nome" class="titulo"> <a href="<?php echo $tso_listintegrantes1->getSortLink('integrantes.nome'); ?>">Nome</a> </th>
                        <th id="cargo" class="titulo"> <a href="<?php echo $tso_listintegrantes1->getSortLink('integrantes.cargo'); ?>">Fun&ccedil;&atilde;o</a> </th>
                        <th class="titulo">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listintegrantes1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listintegrantes1_foto" id="tfi_listintegrantes1_foto" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listintegrantes1_foto']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="text" name="tfi_listintegrantes1_nome" id="tfi_listintegrantes1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listintegrantes1_nome']); ?>" size="20" maxlength="200" /></td>
                          <td><input type="text" name="tfi_listintegrantes1_cargo" id="tfi_listintegrantes1_cargo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listintegrantes1_cargo']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="submit" name="tfi_listintegrantes1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsintegrantes1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsintegrantes1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_integrantes" class="id_checkbox" value="<?php echo $row_rsintegrantes1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsintegrantes1['id']; ?>" />                            </td>
                            <td><div class="KT_col_foto"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsintegrantes1['nome'], 20); ?></div></td>
                            <td><div class="KT_col_cargo"><?php echo KT_FormatForList($row_rsintegrantes1['cargo'], 20); ?></div></td>
                            <td><a class="KT_edit_link" href="integrante_add.php?id=<?php echo $row_rsintegrantes1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsintegrantes1 = mysql_fetch_assoc($rsintegrantes1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listintegrantes1->Prepare();
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
                    <a class="KT_additem_op_link" href="integrante_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por Victor Caetano" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsintegrantes1);
?>
