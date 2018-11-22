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
	
  $logoutGoTo = "../../index.php";
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

$MM_restrictGoTo = "../../erro.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema do Contato da Central de Reservas</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
          <td align="left" bgcolor="#003300" class="Titulo">Titulo</td>
        </tr>
        <tr>
          <td align="left"><p><span class="seta">Mensagem respondida com sucesso!</span><br />
          </p>
          <p><a href="index.php" class="questoes">Voltar para a Caixa de Entrada</a></p></td>
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
