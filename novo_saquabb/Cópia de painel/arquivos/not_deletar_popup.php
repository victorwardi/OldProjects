<?php require_once('../../Connections/saquabb.php'); ?>
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
?><?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

$colname_deletar = "-1";
if (isset($_GET['id'])) {
  $colname_deletar = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_deletar = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id ASC", $colname_deletar);
$deletar = mysql_query($query_deletar, $saquabb) or die(mysql_error());
$row_deletar = mysql_fetch_assoc($deletar);
$totalRows_deletar = mysql_num_rows($deletar);

// Make an instance of the transaction object
$del_noticias = new tNG_delete($conn_saquabb);
$tNGs->addTransaction($del_noticias);
// Register triggers
$del_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "deletar");
$del_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$del_noticias->setTable("noticias");
$del_noticias->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confirmar Dele&ccedil;&atilde;o!</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="306" align="center" valign="middle" bgcolor="#FFCC00" class="fonte">Tem certeza que deseja deletar esta not&iacute;cia? </td>
  </tr>
  <tr>
    <td height="96" align="center" valign="bottom" bgcolor="#FFFFCC"><table width="20" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
      <tr>
        <td><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{deletar.imagem}", 100, 75, false); ?>" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="22" align="center" valign="middle" bgcolor="#FFFFCC"><span class="fonte"><?php echo $row_deletar['titulo']; ?></span></td>
  </tr>
  <tr>
    <td height="22" align="center" valign="middle" bgcolor="#FFFFCC" class="fonte"><?php echo $row_deletar['data']; ?></td>
  </tr>
  <tr>
    <td height="32" align="center" valign="middle" bgcolor="#FFFFCC"><form id="form1" name="form1" method="post" action="">
      <input name="deletar" type="submit" class="box_confirma" id="deletar" value="Deletar" />
      </form></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFCC00">&nbsp;</td>
  </tr>
</table>
<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($deletar);
?>
