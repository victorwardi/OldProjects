<?php require_once('../../Connections/conBD.php'); ?>
<?php require_once('totais.php'); ?>
<?php
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
	
  $logoutGoTo = "../../questoes/index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');
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

$MM_restrictGoTo = "../../questoes/erro.php";
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
$tfi_listcontato3 = new TFI_TableFilter($conn_conBD, "tfi_listcontato3");
$tfi_listcontato3->addColumn("idContato", "STRING_TYPE", "idContato", "%");
$tfi_listcontato3->addColumn("contato.nome", "STRING_TYPE", "nome", "%");
$tfi_listcontato3->addColumn("contato.email", "STRING_TYPE", "email", "%");
$tfi_listcontato3->addColumn("contato.status", "STRING_TYPE", "status", "%");
$tfi_listcontato3->Execute();

// Sorter
$tso_listcontato3 = new TSO_TableSorter("rscontato1", "tso_listcontato3");
$tso_listcontato3->addColumn("idContato");
$tso_listcontato3->addColumn("contato.nome");
$tso_listcontato3->addColumn("contato.email");
$tso_listcontato3->addColumn("contato.status");
$tso_listcontato3->setDefault("contato.nome DESC");
$tso_listcontato3->Execute();

// Navigation
$nav_listcontato3 = new NAV_Regular("nav_listcontato3", "rscontato1", "../../", $_SERVER['PHP_SELF'], 15);

//NeXTenesio3 Special List Recordset
$maxRows_rscontato1 = $_SESSION['max_rows_nav_listcontato3'];
$pageNum_rscontato1 = 0;
if (isset($_GET['pageNum_rscontato1'])) {
  $pageNum_rscontato1 = $_GET['pageNum_rscontato1'];
}
$startRow_rscontato1 = $pageNum_rscontato1 * $maxRows_rscontato1;

// Defining List Recordset variable
$NXTFilter_rscontato1 = "1=1";
if (isset($_SESSION['filter_tfi_listcontato3'])) {
  $NXTFilter_rscontato1 = $_SESSION['filter_tfi_listcontato3'];
}
// Defining List Recordset variable
$NXTSort_rscontato1 = "contato.idContato DESC";
if (isset($_SESSION['sorter_tso_listcontato3'])) {
  $NXTSort_rscontato1 = $_SESSION['sorter_tso_listcontato3'];
}
mysql_select_db($database_conBD, $conBD);

$query_rscontato1 = "SELECT contato.nome, contato.email, contato.status, contato.idContato FROM contato WHERE contato.status = 'n' ORDER BY {$NXTSort_rscontato1}";
$query_limit_rscontato1 = sprintf("%s LIMIT %d, %d", $query_rscontato1, $startRow_rscontato1, $maxRows_rscontato1);
$rscontato1 = mysql_query($query_limit_rscontato1, $conBD) or die(mysql_error());
$row_rscontato1 = mysql_fetch_assoc($rscontato1);

if (isset($_GET['totalRows_rscontato1'])) {
  $totalRows_rscontato1 = $_GET['totalRows_rscontato1'];
} else {
  $all_rscontato1 = mysql_query($query_rscontato1);
  $totalRows_rscontato1 = mysql_num_rows($all_rscontato1);
}
$totalPages_rscontato1 = ceil($totalRows_rscontato1/$maxRows_rscontato1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcontato3->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema do Contato da Central de Reservas</title>
<!-- InstanceEndEditable -->
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
  .KT_col_nome {width:180px; overflow:hidden;}
  .KT_col_email {width:180px; overflow:hidden;}
  .KT_col_status {width:40px; overflow:hidden;}
.style1 {color: #003300}
.TituloPreto {
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
#tabela {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	margin: 4px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #D8EDDB;
	border-right-color: #D8EDDB;
	border-bottom-color: #D8EDDB;
	border-left-color: #D8EDDB;
}
.linhaVerdeClara {
	background-color: #D8EDDB;
}
.linhaBranca {
	background-color: #FFFFFF;
}
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 12px;
}
body {
	background-color: #003300;
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
	text-decoration: underline;
	color: #666666;
}
a:active {
	text-decoration: none;
	color: #000000;
}
h1 {
	font-size: 16px;
	color: #FFFFFF;
}
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
}
.seta {
	font-size: 14px;
	font-weight: bold;
	color: #003300;
}
.statusVazio {
	font-size: 9px;
}
.questoes {
	font-size: 10px;
}
.para {
	font-size: 10px;
	font-weight: bold;
	color: #FFFFFF;
}
.Titulo {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style1 {color: #333333}
-->
</style>
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td height="94" colspan="2" align="left" bgcolor="#124000"><img src="topo.jpg" alt="Sistema de Gerenciamento de Questões" width="500" height="150" /></td>
  </tr>
  <tr>
    <td width="28%" height="120" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="2" bgcolor="#FFFFFF">
      <tr>
        <td align="left" bgcolor="#003300" class="Titulo">Quest&otilde;es</td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#D8EDDB"><span class="seta">&raquo; </span><span class="style1"><a href="index.php">Caixa de entrada</a></span><strong> (<?php echo $totalRows_RsTotalCaixaEntrada ?>)</strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#D8EDDB"> <span class="seta">&raquo;</span> <a href="naolidas.php" class="style1">N&atilde;o Respondidas</a><strong class="style1"> (<?php echo $totalRows_RsTotalNaoLidas ?>)</strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#D8EDDB"><span class="seta">&raquo; </span><span class="style1"><a href="lidas.php">Respondidas</a></span><strong> (<?php echo $totalRows_RsLidas ?>)</strong></td>
      </tr>
      
      <tr>
        <td align="left" valign="middle" bgcolor="#D8EDDB"><span class="seta">&raquo;</span> <a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
    </table></td>
    <td width="72%" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td align="left" bgcolor="#003300" class="Titulo"><span class="Titulo">Mensagens N&atilde;o Respondidas
              <?php
  $nav_listcontato3->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
          </span></td>
        </tr>
        <tr>
          <td align="left"><div class="KT_tng" id="listcontato3">
            <div class="KT_tnglist">
                <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
                  <div class="KT_options"> 
                    <p><a href="<?php echo $nav_listcontato3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
                      <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcontato3'] == 1) {
?>
                        <?php echo $_SESSION['default_max_rows_nav_listcontato3']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcontato3'] == 1) {
?>
                          <a href="<?php echo $tfi_listcontato3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                        <?php 
  // else Conditional region2
  } else { ?>
                          <a href="<?php echo $tfi_listcontato3->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                    <?php } 
  // endif Conditional region2
?></p>
                    <table width="430" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td colspan="5" align="left" valign="middle" class="TituloPreto">Legenda do Status</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="middle"><img src="nova.png" alt="Nova" width="20" height="20" /></td>
                        <td width="124" align="left" valign="middle">N&atilde;o Respondida</td>
                        <td width="1" align="left" valign="middle">&nbsp;</td>
                        <td width="22" align="left" valign="middle"><img src="ok.png" alt="Respondida" width="20" height="20" /></td>
                        <td width="223" align="left" valign="middle">Respondida</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table>
                  </div>
                  <table width="620" cellpadding="2" cellspacing="0" class="KT_tngtable" id="tabela">
                    <thead>
                      <tr class="KT_row_order">
                        <th bgcolor="#003300"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                        </th>
                        <th bgcolor="#003300" class="Titulo" id="nome"> <a href="<?php echo $tso_listcontato3->getSortLink('contato.nome'); ?>">Nome</a> </th>
                        <th bgcolor="#003300" class="Titulo" id="email"> <a href="<?php echo $tso_listcontato3->getSortLink('contato.email'); ?>">Email</a> </th>
                        <th bgcolor="#003300" class="Titulo" id="status"> <a href="<?php echo $tso_listcontato3->getSortLink('contato.status'); ?>">Status</a> </th>
                        <th bgcolor="#003300" class="Titulo">&nbsp;</th>
                      </tr>
                      <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcontato3'] == 1) {
?>
                        <tr class="KT_row_filter">
                          <td>&nbsp;</td>
                          	<td><input type="text" name="tfi_listcontato3_nome" id="tfi_listcontato3_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcontato3_nome']); ?>" size="20" maxlength="255" /></td>
                          <td><input type="text" name="tfi_listcontato3_email" id="tfi_listcontato3_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcontato3_email']); ?>" size="20" maxlength="255" /></td>
                          <td>&nbsp;</td>
                          <td><input type="submit" name="tfi_listcontato3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                        </tr>
                        <?php } 
  // endif Conditional region3
?>
                    </thead>
                    <tbody>
                      <?php if ($totalRows_rscontato1 == 0) { // Show if recordset empty ?>
                        <tr>
                          <td colspan="5"><?php echo NXT_getResource("N&atilde;o h&aacute; mensagens na sua caixa de entrada."); ?></td>
                        </tr>
                        <?php } // Show if recordset empty ?>
                      <?php if ($totalRows_rscontato1 > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                          <tr class="<?php echo @$cnt1++%2==0 ? "linhaBranca" : "linhaVerdeClara"; ?>">
                            <td><input type="checkbox" name="kt_pk_contato" class="id_checkbox" value="<?php echo $row_rscontato1['idContato']; ?>" />
                                <input type="hidden" name="idContato" class="id_field" value="<?php echo $row_rscontato1['idContato']; ?>" />                            </td>
                            <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rscontato1['nome'], 40); ?></div></td>
                            <td><div class="KT_col_email"><?php echo KT_FormatForList($row_rscontato1['email'], 40); ?></div></td>
                            <td><div class="KT_col_status">
							
							<?php if($row_rscontato1['status'] == n) {							
							   echo "<img src='nova.png' alt='N&atilde;o Respondida' width='20' height='20' border='0' />";
							} else{
							echo "<img src='ok.png' alt='Respondida' width='20' height='20' border='0' />";
							}										
							
							?>
                            
                            
                            
                            </div></td>
                            <td><a class="KT_edit_link" href="responder.php?idContato=<?php echo $row_rscontato1['idContato']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                          </tr>
                          <?php } while ($row_rscontato1 = mysql_fetch_assoc($rscontato1)); ?>
                        <?php } // Show if recordset not empty ?>
                    </tbody>
                  </table>
                  <div class="KT_bottomnav">
                    <div>
                      <div align="left">
                        <?php
            $nav_listcontato3->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
                        </div>
                    </div>
                  </div>
                  <div class="KT_bottombuttons">
                    <div class="KT_operations"><a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
                    </div>
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
    <td colspan="2" align="center" valign="middle" bgcolor="#003300" class="Titulo">Central de Reservas - Hotel Pousada Esmeralda<br />
    Desenvolvido por Victor Caetano</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rscontato1);
?>
