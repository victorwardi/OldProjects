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

$MM_restrictGoTo = "../erro.php";
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
?><?php require_once('../../Connections/legion.php'); ?><?php
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
	
  $logoutGoTo = "../index.php";
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
$conn_legion = new KT_connection($legion, $database_legion);

// Filter
$tfi_listnoticias1 = new TFI_TableFilter($conn_legion, "tfi_listnoticias1");
$tfi_listnoticias1->addColumn("noticias.id", "NUMERIC_TYPE", "id", "=");
$tfi_listnoticias1->addColumn("noticias.titulo", "STRING_TYPE", "titulo", "%");
$tfi_listnoticias1->addColumn("noticias.materia", "STRING_TYPE", "materia", "%");
$tfi_listnoticias1->addColumn("noticias.data", "STRING_TYPE", "data", "%");
$tfi_listnoticias1->addColumn("noticias.fonte", "STRING_TYPE", "fonte", "%");
$tfi_listnoticias1->addColumn("noticias.imagem", "NUMERIC_TYPE", "imagem", "=");
$tfi_listnoticias1->addColumn("noticias.coluna", "STRING_TYPE", "coluna", "%");
$tfi_listnoticias1->Execute();

// Sorter
$tso_listnoticias1 = new TSO_TableSorter("rsnoticias1", "tso_listnoticias1");
$tso_listnoticias1->addColumn("noticias.id");
$tso_listnoticias1->addColumn("noticias.titulo");
$tso_listnoticias1->addColumn("noticias.materia");
$tso_listnoticias1->addColumn("noticias.data");
$tso_listnoticias1->addColumn("noticias.fonte");
$tso_listnoticias1->addColumn("noticias.imagem");
$tso_listnoticias1->addColumn("noticias.coluna");
$tso_listnoticias1->setDefault("noticias.id DESC");
$tso_listnoticias1->Execute();

// Navigation
$nav_listnoticias1 = new NAV_Regular("nav_listnoticias1", "rsnoticias1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsnoticias1 = $_SESSION['max_rows_nav_listnoticias1'];
$pageNum_rsnoticias1 = 0;
if (isset($_GET['pageNum_rsnoticias1'])) {
  $pageNum_rsnoticias1 = $_GET['pageNum_rsnoticias1'];
}
$startRow_rsnoticias1 = $pageNum_rsnoticias1 * $maxRows_rsnoticias1;

$NXTFilter_rsnoticias1 = "1=1";
if (isset($_SESSION['filter_tfi_listnoticias1'])) {
  $NXTFilter_rsnoticias1 = $_SESSION['filter_tfi_listnoticias1'];
}
$NXTSort_rsnoticias1 = "noticias.id DESC";
if (isset($_SESSION['sorter_tso_listnoticias1'])) {
  $NXTSort_rsnoticias1 = $_SESSION['sorter_tso_listnoticias1'];
}
mysql_select_db($database_legion, $legion);

$query_rsnoticias1 = sprintf("SELECT noticias.id, noticias.titulo, noticias.materia, noticias.data, noticias.fonte, noticias.imagem, noticias.coluna FROM noticias WHERE %s ORDER BY %s", $NXTFilter_rsnoticias1, $NXTSort_rsnoticias1);
$query_limit_rsnoticias1 = sprintf("%s LIMIT %d, %d", $query_rsnoticias1, $startRow_rsnoticias1, $maxRows_rsnoticias1);
$rsnoticias1 = mysql_query($query_limit_rsnoticias1, $legion) or die(mysql_error());
$row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1);

if (isset($_GET['totalRows_rsnoticias1'])) {
  $totalRows_rsnoticias1 = $_GET['totalRows_rsnoticias1'];
} else {
  $all_rsnoticias1 = mysql_query($query_rsnoticias1);
  $totalRows_rsnoticias1 = mysql_num_rows($all_rsnoticias1);
}
$totalPages_rsnoticias1 = ceil($totalRows_rsnoticias1/$maxRows_rsnoticias1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnoticias1->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - Legionn&aacute;rios</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
#navigation td {
	background-color: #4D494A;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #F7D957;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	padding-top: 8px;
	padding-right: 6px;
	padding-bottom: 8px;
	padding-left: 8px;
	}
	
#navigation a:hover {
	color:#FFCC00;
	background-color: #FFFFFF;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	font-weight: bolder;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
	font-weight: bolder;
	}
#conteudo td {
	left: 10px;
}
#tabela td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: normal;
	font-weight: bolder;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px solid #666666;
}
#tabela li {
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #666666;
	border-right-color: #666666;
	border-bottom-color: #666666;
	border-left-color: #666666;
}
.borda {
	border: 1px solid #000000;
}
.style1 {color: #F8D95A}
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
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* NeXTensio3 List row settings */
  .KT_col_id {width:140px; overflow:hidden;}
  .KT_col_titulo {width:140px; overflow:hidden;}
  .KT_col_materia {width:140px; overflow:hidden;}
  .KT_col_data {width:140px; overflow:hidden;}
  .KT_col_fonte {width:140px; overflow:hidden;}
  .KT_col_imagem {width:140px; overflow:hidden;}
  .KT_col_coluna {width:140px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#4D494A"><img src="topo.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#4D494A"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#4D494A" class="titulo2">Not&iacute;cia</td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_add.php" class="style1">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td height="26" colspan="2"><span class="titulo2">Foto</span></td>
      </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Agenda</td>
      </tr>
      <tr>
        <td colspan="2"><a href="agenda_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="agenda_edite.php">Editar/Excluir</a></td>
        </tr>
      
      

    </table>
    <p><a href="../../index.php"><img src="sair.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td>
            <div class="KT_tng" id="listnoticias1">
              <h1> Noticias
                <?php
  $nav_listnoticias1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
              </h1>
              <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> <a href="<?php echo $nav_listnoticias1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                    <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnoticias1'] == 1) {
?>
                      <?php echo $_SESSION['default_max_rows_nav_listnoticias1']; ?>
                      <?php 
  // else Conditional region1
  } else { ?>
                      <?php echo NXT_getResource("all"); ?>
                      <?php } 
  // endif Conditional region1
?>
                      <?php echo NXT_getResource("records"); ?>&nbsp;
                    &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listnoticias1'] == 1) {
?>
                              <a href="<?php echo $tfi_listnoticias1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                              <?php 
  // else Conditional region2
  } else { ?>
                              <a href="<?php echo $tfi_listnoticias1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                              <?php } 
  // endif Conditional region2
?>
                  </div>
                  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                    <thead>
                      <tr class="KT_row_order">
                        <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th id="titulo" class="KT_sorter KT_col_titulo <?php echo $tso_listnoticias1->getSortIcon('noticias.titulo'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.titulo'); ?>">Titulo</a> </th>
                        <th id="data" class="KT_sorter KT_col_data <?php echo $tso_listnoticias1->getSortIcon('noticias.data'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.data'); ?>">Data</a> </th>
                        <th id="imagem" class="KT_sorter KT_col_imagem <?php echo $tso_listnoticias1->getSortIcon('noticias.imagem'); ?>"> <a href="<?php echo $tso_listnoticias1->getSortLink('noticias.imagem'); ?>">Imagem</a> </th>
                        <th>&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnoticias1'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          <td><input type="text" name="tfi_listnoticias1_titulo" id="tfi_listnoticias1_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_titulo']); ?>" size="20" maxlength="200" /></td>
                          <td><input type="text" name="tfi_listnoticias1_data" id="tfi_listnoticias1_data" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_data']); ?>" size="20" maxlength="20" /></td>
                          <td><input type="text" name="tfi_listnoticias1_imagem" id="tfi_listnoticias1_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnoticias1_imagem']); ?>" size="20" maxlength="30" /></td>
                          <td><input type="submit" name="tfi_listnoticias1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rsnoticias1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rsnoticias1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                            <td><input type="checkbox" name="kt_pk_noticias" class="id_checkbox" value="<?php echo $row_rsnoticias1['id']; ?>" />
                                <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsnoticias1['id']; ?>" />
                            </td>
                            <td><div class="KT_col_titulo"><?php echo KT_FormatForList($row_rsnoticias1['titulo'], 20); ?></div></td>
                            <td><div class="KT_col_data"><?php echo KT_FormatForList($row_rsnoticias1['data'], 20); ?></div></td>
                            <td><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../fotos/", "{rsnoticias1.imagem}", 60, 42, false); ?>" /></td>
                            <td><a class="KT_edit_link" href="not_add.php?id=<?php echo $row_rsnoticias1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rsnoticias1 = mysql_fetch_assoc($rsnoticias1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <?php
            $nav_listnoticias1->Prepare();
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
                    <a class="KT_additem_op_link" href="not_add.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
            <p>&nbsp;</p>
          </a></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#4D494A"><p><span class="style1"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  Legionnarios.com&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsnoticias1);
?>
