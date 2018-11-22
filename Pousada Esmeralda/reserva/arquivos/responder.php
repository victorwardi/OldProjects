<?php require_once('../../Connections/conBD.php'); ?>
<?php require_once('totais.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_conBD = new KT_connection($conBD, $database_conBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_contato = new tNG_multipleInsert($conn_conBD);
$tNGs->addTransaction($ins_contato);
// Register triggers
$ins_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_contato->setTable("contato");
$ins_contato->addColumn("status", "STRING_TYPE", "POST", "status");
$ins_contato->setPrimaryKey("idContato", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_contato = new tNG_multipleUpdate($conn_conBD);
$tNGs->addTransaction($upd_contato);
// Register triggers
$upd_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_contato->setTable("contato");
$upd_contato->addColumn("status", "STRING_TYPE", "POST", "status");
$upd_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Make an instance of the transaction object
$del_contato = new tNG_multipleDelete($conn_conBD);
$tNGs->addTransaction($del_contato);
// Register triggers
$del_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
$del_contato->setTable("contato");
$del_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscontato = $tNGs->getRecordset("contato");
$row_rscontato = mysql_fetch_assoc($rscontato);
$totalRows_rscontato = mysql_num_rows($rscontato);
?>
<?php
//MX Widgets3 include
require_once('../../includes/wdg/WDG.php');
?><?php
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
?>
<?php
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

$colname_RsResposta = "-1";
if (isset($_GET['idContato'])) {
  $colname_RsResposta = $_GET['idContato'];
}
mysql_select_db($database_conBD, $conBD);
$query_RsResposta = sprintf("SELECT * FROM contato WHERE idContato = %s", GetSQLValueString($colname_RsResposta, "int"));
$RsResposta = mysql_query($query_RsResposta, $conBD) or die(mysql_error());
$row_RsResposta = mysql_fetch_assoc($RsResposta);
$totalRows_RsResposta = mysql_num_rows($RsResposta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema do Contato da Central de Reservas</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../includes/common/js/sigslot_core.js"></script>
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="../../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../../includes/resources/calendar.js"></script>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
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
          <td align="left" bgcolor="#003300" class="Titulo">Responder para - <?php echo $row_RsResposta['nome']; ?> (<?php echo $row_RsResposta['email']; ?>)</td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><fieldset>
          <legend>Dados da Reserva</legend>
          <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Nome: </strong><?php echo $row_RsResposta['nome']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Email: </strong><?php echo $row_RsResposta['email']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Telefone: </strong><?php echo $row_RsResposta['telefone']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Cidade: </strong><?php echo $row_RsResposta['cidade']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>UF: </strong><?php echo $row_RsResposta['uf']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Pa&iacute;s: </strong><?php echo $row_RsResposta['pais']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Data de Chegada: </strong><?php echo $row_RsResposta['chegada']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Data de Partida: </strong><?php echo $row_RsResposta['partida']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Tipo de Acomoda&ccedil;&atilde;o: </strong><?php echo $row_RsResposta['tipoAcomodacao']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Quantidade de Adultos: </strong><?php echo $row_RsResposta['qtdAdulto']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><strong>Quantidade de Crian&ccedil;as: </strong><?php echo $row_RsResposta['qtdCrianca']; ?></td>
            </tr>
            <tr class="KT_tngtable">
              <td class="textbox"><span class="txt_verde"><strong>Informa&ccedil;&otilde;es Adicionais: </strong></span></td>
            </tr>
            <tr>
              <td class="textbox"><?php echo $row_RsResposta['infoAdicionais']; ?></td>
            </tr>
          </table>
          </fieldset>          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><fieldset>
          <legend>Informa&ccedil;&otilde;es para o Dep&oacute;sito</legend>
          <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <td class="textbox"><strong>Banco:</strong> Banco do Brasil</td>
            </tr>
            <tr>
              <td class="textbox"><strong>Ag&ecirc;ncia:</strong> 1571-7</td>
            </tr>
            <tr>
              <td class="textbox"><strong>Conta Corrente:</strong> 11457- X</td>
            </tr>
            <tr>
              <td class="textbox"><strong>Favorecido:</strong> Hotel Pousada Esmeralda</td>
            </tr>
            <tr>
              <td class="textbox"><strong>CNPJ:</strong> 36.513.166/0001-59</td>
            </tr>
            <tr>
              <td class="textbox">A reserva s&oacute; ser&aacute; confirmada mediante envio do comprovante de dep&oacute;sito via:</td>
            </tr>
            <tr>
              <td class="textbox"><strong>Email</strong>: info@pousadaesmeralda.com.br ou FAX: (24)  3352 1769</td>
            </tr>
          </table>
          </fieldset>          </td>
        </tr>
        
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top"><fieldset>
          <legend>Resposta para o Cliente</legend>
          <form id="form1" name="form1" method="POST" action="enviar.php">
            <table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr>
                <td width="23%" align="left" valign="top" class="textbox"><strong>Valor da di&aacute;ria:</strong></td>
                <td width="77%" align="left" valign="top"><label>
                  <span class="statusVazio">R$</span> 
                  <input name="valorDiaria" type="text" class="textbox2" id="valorDiaria" />
                  </label>
                <input name="id" type="hidden" value="<?php echo $row_RsResposta['idContato']; ?>" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="textbox"><strong>Valor total:</strong></td>
                <td align="left" valign="top"><span class="statusVazio">R$</span> 
                  <input name="valorTotal" type="text" class="textbox2" id="valorTotal" /> </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="textbox"><strong>Data do dep&oacute;sito:</strong></td>
                <td align="left" valign="top"> <input name="dataDeposito" class="textbox2" id="dataDeposito" value="" size="15" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" wdg:readonly="true" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="textbox"><strong>Valor do dep&oacute;sito:</strong></td>
                <td align="left" valign="top"><span class="statusVazio">R$</span> 
                  <input name="valorDeposito" type="text" class="textbox2" id="valorDeposito" /></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="textbox"><strong>Outras informa&ccedil;&otilde;es</strong></td>
                <td align="left" valign="top"><label>
                  <textarea name="outras" cols="50" rows="10" class="textbox2" id="outras"></textarea>
                  </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="enviar" id="enviar" value="Enviar Resposta" />
                  <input type="hidden" name="status" id="status"  value="respondida"/>
                </label></td>
              </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
          </form>
          </fieldset>          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
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
mysql_free_result($RsResposta);
?>
