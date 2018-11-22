<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make a login transaction instance
$loginTransaction = new tNG_login($conn_victor);
$tNGs->addTransaction($loginTransaction);
// Register triggers
$loginTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login1");
$loginTransaction->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$loginTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel de Controle - Jr Games</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<style type="text/css">
<!--
body {
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
	color: #999999;
}
a:active {
	text-decoration: none;
	color: #000000;
}
-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="47" align="left" valign="middle" bgcolor="#FFC904"><img src="imagens/topoindex.jpg" width="600" height="96" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;
      <?php
	echo $tNGs->getLoginMsg();
?>
      <?php
	echo $tNGs->getErrorMsg();
?>
      <form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <table width="375" border="1" cellpadding="4" cellspacing="2" bordercolor="#000000">
          <tr>
            <td width="371" bgcolor="#FFC904"><div align="center">Entrar no Administrativo </div></td>
          </tr>
          <tr>
            <td><table cellpadding="0" cellspacing="0" class="KT_tngtable">
              <tr>
                <td width="109" align="center" class="KT_th"><label for="kt_login_user">Usu&aacute;rio:</label></td>
                <td width="273" align="left"><input type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="32" />
                    <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </td>
              </tr>
              <tr>
                <td align="center" class="KT_th"><label for="kt_login_password">Senha:</label></td>
                <td align="left"><input type="password" name="kt_login_password" id="kt_login_password" value="" size="32" />
                    <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </td>
              </tr>
              <tr>
                <td align="center" class="KT_th"><label for="kt_login_rememberme">Lembrar senha:</label></td>
                <td align="left"><input  <?php if (!(strcmp(KT_escapeAttribute($row_rscustom['kt_login_rememberme']),"1"))) {echo "checked";} ?> type="checkbox" name="kt_login_rememberme" id="kt_login_rememberme" value="1" />
                    <?php echo $tNGs->displayFieldError("custom", "kt_login_rememberme"); ?> </td>
              </tr>
              <tr class="KT_buttons">
                <td colspan="2" align="center"><input type="submit" name="kt_login1" id="kt_login1" value="Entrar" />
                </td>
              </tr>
            </table></td>
          </tr>
        </table>
      </form>
    <p><a href="../index.php">Voltar para a p&aacute;gina inicial </a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#FFC904"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
JrGames VideoLocadora&reg; </strong></td>
  </tr>
</table>
</body>
</html>
