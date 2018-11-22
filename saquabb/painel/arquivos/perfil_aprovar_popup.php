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

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Inserir seu nome");
$tNGs->prepareValidation($formValidation);
// End trigger

$colname_aprovar = "-1";
if (isset($_GET['id'])) {
  $colname_aprovar = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_aprovar = sprintf("SELECT * FROM perfil WHERE id = %s ORDER BY nome ASC", $colname_aprovar);
$aprovar = mysql_query($query_aprovar, $saquabb) or die(mysql_error());
$row_aprovar = mysql_fetch_assoc($aprovar);
$totalRows_aprovar = mysql_num_rows($aprovar);

// Make an update transaction instance
$upd_perfil = new tNG_update($conn_saquabb);
$tNGs->addTransaction($upd_perfil);
// Register triggers
$upd_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$upd_perfil->setTable("perfil");
$upd_perfil->addColumn("aprovado", "CHECKBOX_YN_TYPE", "POST", "aprovado");
$upd_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsperfil = $tNGs->getRecordset("perfil");
$row_rsperfil = mysql_fetch_assoc($rsperfil);
$totalRows_rsperfil = mysql_num_rows($rsperfil);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aprovar/Reprovar Perfil</title>
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
<table width="100%" height="117" cellpadding="4" cellspacing="0">
    <tr>
      <td align="center" valign="middle" bgcolor="#FFCC00" class="fonte"><label for="nome"></label>        <label for="aprovado">Foto</label></td>
      <td width="117" align="center" valign="middle" bgcolor="#FFCC00" class="fonte">Nome</td>
      <td width="74" align="center" bgcolor="#FFCC00" class="fonte">Aprovado</td>
      <td width="147" align="center" bgcolor="#FFCC00" class="fonte">&nbsp;</td>
    </tr>
    <tr>
      <td height="69" align="center" valign="middle" class="KT_th"><table width="10" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
          <tr>
            <td><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../perfil/fotos/", "{aprovar.foto}", 100, 75, false); ?>" /></td>
          </tr>
        </table></td>
      <td align="center" valign="middle" class="fonte"><?php echo $row_aprovar['nome']; ?></td>
      <td align="center"><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsperfil['aprovado']),"Y"))) {echo "checked";} ?> type="checkbox" name="aprovado" id="aprovado" value="Y" />
          <?php echo $tNGs->displayFieldError("perfil", "aprovado"); ?> </td>
      <td align="center"><input name="KT_Update1" type="submit" class="box_confirma" id="KT_Update1" value="Atualizar" /></td>
    </tr>
    <tr>
      <td height="23" align="center" valign="middle" bgcolor="#FFCC00" class="KT_th">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#FFCC00" class="fonte">&nbsp;</td>
      <td align="center" bgcolor="#FFCC00">&nbsp;</td>
      <td align="center" bgcolor="#FFCC00">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($aprovar);
?>
