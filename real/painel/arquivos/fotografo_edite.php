<?php require_once('../../Connections/fotos.php'); ?>
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
?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Filter
$tfi_listfotografo1 = new TFI_TableFilter($conn_fotos, "tfi_listfotografo1");
$tfi_listfotografo1->addColumn("fotografo.nome", "STRING_TYPE", "nome", "%");
$tfi_listfotografo1->Execute();

// Sorter
$tso_listfotografo1 = new TSO_TableSorter("rsfotografo1", "tso_listfotografo1");
$tso_listfotografo1->addColumn("fotografo.nome");
$tso_listfotografo1->setDefault("fotografo.nome");
$tso_listfotografo1->Execute();

// Navigation
$nav_listfotografo1 = new NAV_Regular("nav_listfotografo1", "rsfotografo1", "../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsfotografo1 = $_SESSION['max_rows_nav_listfotografo1'];
$pageNum_rsfotografo1 = 0;
if (isset($_GET['pageNum_rsfotografo1'])) {
  $pageNum_rsfotografo1 = $_GET['pageNum_rsfotografo1'];
}
$startRow_rsfotografo1 = $pageNum_rsfotografo1 * $maxRows_rsfotografo1;

$NXTFilter_rsfotografo1 = "1=1";
if (isset($_SESSION['filter_tfi_listfotografo1'])) {
  $NXTFilter_rsfotografo1 = $_SESSION['filter_tfi_listfotografo1'];
}
$NXTSort_rsfotografo1 = "fotografo.nome";
if (isset($_SESSION['sorter_tso_listfotografo1'])) {
  $NXTSort_rsfotografo1 = $_SESSION['sorter_tso_listfotografo1'];
}
mysql_select_db($database_fotos, $fotos);

$query_rsfotografo1 = sprintf("SELECT fotografo.nome, fotografo.id FROM fotografo WHERE %s ORDER BY %s", $NXTFilter_rsfotografo1, $NXTSort_rsfotografo1);
$query_limit_rsfotografo1 = sprintf("%s LIMIT %d, %d", $query_rsfotografo1, $startRow_rsfotografo1, $maxRows_rsfotografo1);
$rsfotografo1 = mysql_query($query_limit_rsfotografo1, $fotos) or die(mysql_error());
$row_rsfotografo1 = mysql_fetch_assoc($rsfotografo1);

if (isset($_GET['totalRows_rsfotografo1'])) {
  $totalRows_rsfotografo1 = $_GET['totalRows_rsfotografo1'];
} else {
  $all_rsfotografo1 = mysql_query($query_rsfotografo1);
  $totalRows_rsfotografo1 = mysql_num_rows($all_rsfotografo1);
}
$totalPages_rsfotografo1 = ceil($totalRows_rsfotografo1/$maxRows_rsfotografo1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listfotografo1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - Real Fotos &amp; Design</title>
<!-- InstanceEndEditable -->
<link href="../../stilo.css" rel="stylesheet" type="text/css" />
<link href="painel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
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
  duplicate_navigation: true,
  row_effects: false,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_nome {width:280px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="700" border="1" cellpadding="0" cellspacing="2" bordercolor="#313639">
      
      <tr>
        <th height="46" colspan="2" align="center" valign="middle" bgcolor="#313639" scope="row"><img src="img/topo2.jpg" width="600" height="80" /></th>
        </tr>
      <tr>
        <th width="153" height="501" align="center" valign="top" bgcolor="#313639" scope="row"><table width="100%" border="0" cellpadding="2" cellspacing="4" id="navigation">
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Galeria</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="galeria_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="galeria_edite.php">Editar/Excluir</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Foto</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="foto_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="foto_edite.php">Editar/Excluir</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Local</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="local_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="local_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Fot&oacute;grafo</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="fotografo_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="fotografo_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Design</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="design_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="design_edite.php">Editar/Excluir</a></th>
          </tr>
          
          
          
          
          
          
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Coment&aacute;rios</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="comentarios_aprovar.php">Aprovar/Excluir</a></th>
          </tr>
          
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Usu&aacute;rio</th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="user_add.php">Adicionar</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row"><a href="user_edite.php">Editar/Excluir</a></th>
          </tr>
          
          <tr>
            <th align="left" valign="middle" class="titulo_menu" scope="row">Logout</th>
          </tr>
          <tr>
            <th align="center" valign="middle" class="Titulo_galeria" scope="row"><a href="http://www.realfotos.com.br">Sair</a></th>
          </tr>
          <tr>
            <th align="left" valign="middle" scope="row">&nbsp;</th>
          </tr>
          
        </table></th>
        <td width="541" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="2" cellpadding="4">
            
            <tr>
              <th align="left" scope="col">&nbsp;
                <div class="KT_tng" id="listfotografo1">
                  <h1 class="Titulo_galeria"> Fot&oacute;grafo
                    <?php
  $nav_listfotografo1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
                  </h1>
                  <div class="KT_tnglist">
                    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                      <div class="KT_options"> <a href="<?php echo $nav_listfotografo1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listfotografo1'] == 1) {
?>
                              <?php echo $_SESSION['default_max_rows_nav_listfotografo1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listfotografo1'] == 1) {
?>
                              <a href="<?php echo $tfi_listfotografo1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listfotografo1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                      </div>
                      <table border="1" cellpadding="4" cellspacing="0" bordercolor="#313639" class="KT_tngtable">
                        <thead>
                          <tr class="KT_row_order">
                            <th bgcolor="#313639" class="titulo_coment"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                            </th>
                            <th bgcolor="#313639" class="titulo_coment" id="nome"> <a href="<?php echo $tso_listfotografo1->getSortLink('fotografo.nome'); ?>">Nome</a> </th>
                            <th bgcolor="#313639">&nbsp;</th>
                          </tr>
                          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listfotografo1'] == 1) {
?>
                            <tr class="KT_row_filter">
                              <td class="titulo_coment">&nbsp;</td>
                              <td class="titulo_coment"><input type="text" name="tfi_listfotografo1_nome" id="tfi_listfotografo1_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listfotografo1_nome']); ?>" size="40" maxlength="100" /></td>
                              <td><input type="submit" name="tfi_listfotografo1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                            </tr>
                            <?php } 
  // endif Conditional region3
?>
                        </thead>
                        <tbody>
                          <?php if ($totalRows_rsfotografo1 == 0) { // Show if recordset empty ?>
                            <tr class="titulo_coment">
                              <td colspan="3"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                            </tr>
                            <?php } // Show if recordset empty ?>
                          <?php if ($totalRows_rsfotografo1 > 0) { // Show if recordset not empty ?>
                            <?php do { ?>
                              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                                <td class="titulo_coment"><input type="checkbox" name="kt_pk_fotografo" class="id_checkbox" value="<?php echo $row_rsfotografo1['id']; ?>" />
                                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsfotografo1['id']; ?>" />
                                </td>
                                <td class="titulo_coment"><div class="KT_col_nome"><?php echo KT_FormatForList($row_rsfotografo1['nome'], 40); ?></div></td>
                                <td><a class="KT_edit_link" href="fotografo_add.php?id=<?php echo $row_rsfotografo1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                              </tr>
                              <?php } while ($row_rsfotografo1 = mysql_fetch_assoc($rsfotografo1)); ?>
                            <?php } // Show if recordset not empty ?>
                        </tbody>
                      </table>
                      <div class="KT_bottomnav">
                        <div>
                          <?php
            $nav_listfotografo1->Prepare();
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
                        <a class="KT_additem_op_link" href="fotografo_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                    </form>
                  </div>
                  <br class="clearfixplain" />
                </div>
                <p>&nbsp;</p></th>
            </tr>
            <tr>
              <th align="left" scope="col">&nbsp;</th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      <tr>
        <th height="37" colspan="2" bgcolor="#313639" scope="row">&nbsp;</th>
        </tr>
    </table></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsfotografo1);
?>
