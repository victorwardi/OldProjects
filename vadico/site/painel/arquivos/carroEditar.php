<?php require_once('../../Connections/conBD.php'); ?><?php
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
$conn_conBD = new KT_connection($conBD, $database_conBD);

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
$tfi_listcarro1 = new TFI_TableFilter($conn_conBD, "tfi_listcarro1");
$tfi_listcarro1->addColumn("carro.carroId", "NUMERIC_TYPE", "carroId", "=");
$tfi_listcarro1->addColumn("carro.fotoDestaque", "FILE_TYPE", "fotoDestaque", "%");
$tfi_listcarro1->addColumn("carro.placa", "STRING_TYPE", "placa", "%");
$tfi_listcarro1->addColumn("carro.modelo", "STRING_TYPE", "modelo", "%");
$tfi_listcarro1->addColumn("carro.ano", "STRING_TYPE", "ano", "%");
$tfi_listcarro1->Execute();

// Sorter
$tso_listcarro1 = new TSO_TableSorter("rscarro1", "tso_listcarro1");
$tso_listcarro1->addColumn("carro.carroId");
$tso_listcarro1->addColumn("carro.fotoDestaque");
$tso_listcarro1->addColumn("carro.placa");
$tso_listcarro1->addColumn("carro.modelo");
$tso_listcarro1->addColumn("carro.ano");
$tso_listcarro1->setDefault("carro.carroId DESC");
$tso_listcarro1->Execute();

// Navigation
$nav_listcarro1 = new NAV_Regular("nav_listcarro1", "rscarro1", "../../", $_SERVER['PHP_SELF'], 15);

//NeXTenesio3 Special List Recordset
$maxRows_rscarro1 = $_SESSION['max_rows_nav_listcarro1'];
$pageNum_rscarro1 = 0;
if (isset($_GET['pageNum_rscarro1'])) {
  $pageNum_rscarro1 = $_GET['pageNum_rscarro1'];
}
$startRow_rscarro1 = $pageNum_rscarro1 * $maxRows_rscarro1;

// Defining List Recordset variable
$NXTFilter_rscarro1 = "1=1";
if (isset($_SESSION['filter_tfi_listcarro1'])) {
  $NXTFilter_rscarro1 = $_SESSION['filter_tfi_listcarro1'];
}
// Defining List Recordset variable
$NXTSort_rscarro1 = "carro.carroId DESC";
if (isset($_SESSION['sorter_tso_listcarro1'])) {
  $NXTSort_rscarro1 = $_SESSION['sorter_tso_listcarro1'];
}
mysql_select_db($database_conBD, $conBD);

$query_rscarro1 = "SELECT carro.carroId, carro.fotoDestaque, carro.placa, carro.modelo, carro.ano FROM carro WHERE {$NXTFilter_rscarro1} ORDER BY {$NXTSort_rscarro1}";
$query_limit_rscarro1 = sprintf("%s LIMIT %d, %d", $query_rscarro1, $startRow_rscarro1, $maxRows_rscarro1);
$rscarro1 = mysql_query($query_limit_rscarro1, $conBD) or die(mysql_error());
$row_rscarro1 = mysql_fetch_assoc($rscarro1);

if (isset($_GET['totalRows_rscarro1'])) {
  $totalRows_rscarro1 = $_GET['totalRows_rscarro1'];
} else {
  $all_rscarro1 = mysql_query($query_rscarro1);
  $totalRows_rscarro1 = mysql_num_rows($all_rscarro1);
}
$totalPages_rscarro1 = ceil($totalRows_rscarro1/$maxRows_rscarro1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcarro1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../fotos/");
$objDynamicThumb1->setRenameRule("{rscarro1.fotoDestaque}");
$objDynamicThumb1->setResize(50, 0, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo - Vadico Ve&iacute;culos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style><!-- InstanceEndEditable -->
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
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../imagens/bg_body.jpg);
	background-color: #848D94;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
	font-weight: bold;
}
a:link {
	color: #333333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #333333;
}
a:hover {
	text-decoration: underline;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #333333;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
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
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
      </script>
      <style type="text/css">
  /* Dynamic List row settings */
   .KT_col_fotoDestaque {width:120px; overflow:hidden;}
  .KT_col_placa {width:80px; overflow:hidden;}
  .KT_col_modelo {width:120px; overflow:hidden;}
  .KT_col_ano {width:60px; overflow:hidden;}
      </style>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo"><span class="titulo">Carros
              <?php
  $nav_listcarro1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
          </span></td>
        </tr>
        <tr>
          <td><div class="KT_tng" id="listcarro1">
            <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listcarro1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcarro1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listcarro1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcarro1'] == 1) {
?>
                  <a href="<?php echo $tfi_listcarro1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listcarro1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="6" cellspacing="0" class="borda_tabela style2" id="painel">
                    <thead>
                      <tr class="KT_row_order">
                        <th width="30" bgcolor="#CCCCCC"> 
                          <div align="center">
                            <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        
                          </div></th>
                        <th width="95" bgcolor="#CCCCCC" class="KT_sorter KT_col_fotoDestaque <?php echo $tso_listcarro1->getSortIcon('carro.fotoDestaque'); ?>" id="fotoDestaque"> <div align="center" class="style2">
                          <div align="center"><a href="<?php echo $tso_listcarro1->getSortLink('carro.fotoDestaque'); ?>">Foto Destaque</a> </div>
                        </div></th>
                        <th width="89" bgcolor="#CCCCCC" class="KT_sorter KT_col_placa <?php echo $tso_listcarro1->getSortIcon('carro.placa'); ?>" id="placa"> <div align="center"><a href="<?php echo $tso_listcarro1->getSortLink('carro.placa'); ?>">Placa</a> </div></th>
                        <th width="101" bgcolor="#CCCCCC" class="KT_sorter KT_col_modelo <?php echo $tso_listcarro1->getSortIcon('carro.modelo'); ?>" id="modelo"> <div align="center"><a href="<?php echo $tso_listcarro1->getSortLink('carro.modelo'); ?>">Modelo</a> </div></th>
                        <th width="80" bgcolor="#CCCCCC" class="KT_sorter KT_col_ano <?php echo $tso_listcarro1->getSortIcon('carro.ano'); ?>" id="ano"> <div align="center"><a href="<?php echo $tso_listcarro1->getSortLink('carro.ano'); ?>">Ano</a> </div></th>
                        <th width="115" bgcolor="#CCCCCC"><div align="center"></div></th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcarro1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listcarro1_fotoDestaque" id="tfi_listcarro1_fotoDestaque" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcarro1_fotoDestaque']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="text" name="tfi_listcarro1_placa" id="tfi_listcarro1_placa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcarro1_placa']); ?>" size="8" maxlength="20" /></td>
                          <td><select name="tfi_listcarro1_modelo" id="tfi_listcarro1_modelo">
                              <option value="menuitem1" <?php if (!(strcmp("menuitem1", KT_escapeAttribute(@$_SESSION['tfi_listcarro1_modelo'])))) {echo "SELECTED";} ?>>[ Label ]</option>
                              <option value="menuitem2" <?php if (!(strcmp("menuitem2", KT_escapeAttribute(@$_SESSION['tfi_listcarro1_modelo'])))) {echo "SELECTED";} ?>>[ Label ]</option>
                            </select>                          </td>
                          <td><input type="text" name="tfi_listcarro1_ano" id="tfi_listcarro1_ano" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcarro1_ano']); ?>" size="5" maxlength="100" /></td>
                          <td><input name="tfi_listcarro1" type="submit" class="button" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rscarro1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rscarro1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_carro" class="id_checkbox" value="<?php echo $row_rscarro1['carroId']; ?>" />
                                <input type="hidden" name="carroId" class="id_field" value="<?php echo $row_rscarro1['carroId']; ?>" />                            </td>
                            <td><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_foto" /></td>
                            <td><div class="KT_col_placa"><?php echo KT_FormatForList($row_rscarro1['placa'], 8); ?></div></td>
                            <td><div class="KT_col_modelo"><?php echo KT_FormatForList($row_rscarro1['modelo'], 20); ?></div></td>
                            <td><div class="KT_col_ano"><?php echo KT_FormatForList($row_rscarro1['ano'], 5); ?></div></td>
                            <td><a class="KT_edit_link" href="carroInserir.php?carroId=<?php echo $row_rscarro1['carroId']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rscarro1 = mysql_fetch_assoc($rscarro1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listcarro1->Prepare();
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
                    <a class="KT_additem_op_link" href="carroInserir.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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
</body><!-- InstanceEnd --></html>
<?php
mysql_free_result($rscarro1);
?>
