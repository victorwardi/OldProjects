<?php require_once('../../Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Filter
$tfi_listfoto_destaque1 = new TFI_TableFilter($conn_saquabb, "tfi_listfoto_destaque1");
$tfi_listfoto_destaque1->addColumn("foto_destaque.id", "NUMERIC_TYPE", "id", "=");
$tfi_listfoto_destaque1->addColumn("foto_destaque.arquivo", "NUMERIC_TYPE", "arquivo", "=");
$tfi_listfoto_destaque1->Execute();

// Sorter
$tso_listfoto_destaque1 = new TSO_TableSorter("rsfoto_destaque1", "tso_listfoto_destaque1");
$tso_listfoto_destaque1->addColumn("foto_destaque.id");
$tso_listfoto_destaque1->addColumn("foto_destaque.arquivo");
$tso_listfoto_destaque1->setDefault("foto_destaque.id DESC");
$tso_listfoto_destaque1->Execute();

// Navigation
$nav_listfoto_destaque1 = new NAV_Regular("nav_listfoto_destaque1", "rsfoto_destaque1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsfoto_destaque1 = $_SESSION['max_rows_nav_listfoto_destaque1'];
$pageNum_rsfoto_destaque1 = 0;
if (isset($_GET['pageNum_rsfoto_destaque1'])) {
  $pageNum_rsfoto_destaque1 = $_GET['pageNum_rsfoto_destaque1'];
}
$startRow_rsfoto_destaque1 = $pageNum_rsfoto_destaque1 * $maxRows_rsfoto_destaque1;

$NXTFilter_rsfoto_destaque1 = "1=1";
if (isset($_SESSION['filter_tfi_listfoto_destaque1'])) {
  $NXTFilter_rsfoto_destaque1 = $_SESSION['filter_tfi_listfoto_destaque1'];
}
$NXTSort_rsfoto_destaque1 = "foto_destaque.id DESC";
if (isset($_SESSION['sorter_tso_listfoto_destaque1'])) {
  $NXTSort_rsfoto_destaque1 = $_SESSION['sorter_tso_listfoto_destaque1'];
}
mysql_select_db($database_saquabb, $saquabb);

$query_rsfoto_destaque1 = sprintf("SELECT foto_destaque.id, foto_destaque.arquivo FROM foto_destaque WHERE %s ORDER BY %s", $NXTFilter_rsfoto_destaque1, $NXTSort_rsfoto_destaque1);
$query_limit_rsfoto_destaque1 = sprintf("%s LIMIT %d, %d", $query_rsfoto_destaque1, $startRow_rsfoto_destaque1, $maxRows_rsfoto_destaque1);
$rsfoto_destaque1 = mysql_query($query_limit_rsfoto_destaque1, $saquabb) or die(mysql_error());
$row_rsfoto_destaque1 = mysql_fetch_assoc($rsfoto_destaque1);

if (isset($_GET['totalRows_rsfoto_destaque1'])) {
  $totalRows_rsfoto_destaque1 = $_GET['totalRows_rsfoto_destaque1'];
} else {
  $all_rsfoto_destaque1 = mysql_query($query_rsfoto_destaque1);
  $totalRows_rsfoto_destaque1 = mysql_num_rows($all_rsfoto_destaque1);
}
$totalPages_rsfoto_destaque1 = ceil($totalRows_rsfoto_destaque1/$maxRows_rsfoto_destaque1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfoto_destaque1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../uploads/fotos/");
$objDynamicThumb1->setRenameRule("{rsfoto_destaque1.arquivo}");
$objDynamicThumb1->setResize(200, 0, true);
$objDynamicThumb1->setWatermark(false);
?>
<?php
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/controle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: Painel de controle Saquabb ::</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<link href="painel.css" rel="stylesheet" type="text/css" />
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
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_arquivo {width:140px; overflow:hidden;}
.style1 {color: #EA8C06}
a:link {
	color: #4D4948;
}
a:visited {
	color: #4D4948;
}
a:hover {
	color: #EA8C06;
}
a:active {
	color: #4D4948;
}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="800" border="1" align="center" cellpadding="4" cellspacing="8" bordercolor="#EA8C06" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#FFFFFF" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#FFFFFF" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EA8C06" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#EA8C06" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto Destaque </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_destaque_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Not&iacute;cia</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Categoria </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Galeria</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">V&iacute;deos</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Perfil</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Coment&aacute;rios</span></th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><p class="style1">Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#7FA14D" scope="row"><span class="style1">Logout</span></th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th bgcolor="#7FA14D" scope="row">&nbsp;</th>
      </tr>
      
      
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#EA8C06" class="Titulo_Branco" scope="col">Editar / Excluir Foto Destaque </th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="row"><span class="style1"></span>
            <div class="comentario" id="listfoto_destaque1"><div class="KT_tnglist"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1"><div class="KT_options">
            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listfoto_destaque1'] == 1) {
?>
                              <a href="<?php echo $tfi_listfoto_destaque1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfoto_destaque1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table width="56%" border="1" align="center" cellpadding="8" cellspacing="0" bordercolor="#EA8C06" class="KT_tngtable" id="menu_pontilhado">
                    <thead>
                      <tr class="KT_row_order">
                        <th width="47" bgcolor="#EA8C06"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th width="154" align="center" bgcolor="#EA8C06" class="KT_sorter KT_col_arquivo <?php echo $tso_listfoto_destaque1->getSortIcon('foto_destaque.arquivo'); ?>" id="arquivo">Foto Destaque </th>
                        <th width="110" bgcolor="#EA8C06">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfoto_destaque1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listfoto_destaque1_arquivo" id="tfi_listfoto_destaque1_arquivo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfoto_destaque1_arquivo']); ?>" size="20" maxlength="200" /></td>
                          <td><input type="submit" name="tfi_listfoto_destaque1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsfoto_destaque1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="3"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsfoto_destaque1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_foto_destaque" class="id_checkbox" value="<?php echo $row_rsfoto_destaque1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsfoto_destaque1['id']; ?>" />                            </td>
                            <td align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                            <td><a class="KT_edit_link" href="foto_destaque_add.php?id=<?php echo $row_rsfoto_destaque1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsfoto_destaque1 = mysql_fetch_assoc($rsfoto_destaque1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listfoto_destaque1->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                    </div>
                  </div>
                  <div class="KT_bottombuttons">
                    <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
                    <span>&nbsp;</span>
                    <select name="no_new" id="no_new">
                      <option value="1">1</option>
					  <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="10">15</option>
                    </select>
                    <a class="KT_additem_op_link" href="foto_destaque_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <th height="40" colspan="2" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Painel Administrativo desenvolvido por: Victor Caetano </th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsfoto_destaque1);
?>
