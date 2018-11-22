<?php require_once('../../Connections/xpress.php'); ?>
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
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("foto");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto");
  $uploadObj->setDbFieldName("foto");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_equipe = new tNG_multipleInsert($conn_xpress);
$tNGs->addTransaction($ins_equipe);
// Register triggers
$ins_equipe->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_equipe->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_equipe->registerTrigger("END", "Trigger_Default_Redirect", 99, "equipe_edite.php");
$ins_equipe->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_equipe->setTable("equipe");
$ins_equipe->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_equipe->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$ins_equipe->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_equipe->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_equipe->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_equipe = new tNG_multipleUpdate($conn_xpress);
$tNGs->addTransaction($upd_equipe);
// Register triggers
$upd_equipe->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_equipe->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_equipe->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_equipe->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_equipe->setTable("equipe");
$upd_equipe->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_equipe->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$upd_equipe->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_equipe->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_equipe->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_equipe = new tNG_multipleDelete($conn_xpress);
$tNGs->addTransaction($del_equipe);
// Register triggers
$del_equipe->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_equipe->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_equipe->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_equipe->setTable("equipe");
$del_equipe->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsequipe = $tNGs->getRecordset("equipe");
$row_rsequipe = mysql_fetch_assoc($rsequipe);
$totalRows_rsequipe = mysql_num_rows($rsequipe);
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<script language="javascript" type="text/javascript" src="../../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	plugins : "emotions",
	
	theme_advanced_buttons3_add : "emotions,",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td><?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1>
          <?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
          Equipe </h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rsequipe > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsequipe['nome']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("equipe", "nome", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="resumo_<?php echo $cnt1; ?>">Resumo:</label></td>
                <td><input type="text" name="resumo_<?php echo $cnt1; ?>" id="resumo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsequipe['resumo']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("resumo");?> <?php echo $tNGs->displayFieldError("equipe", "resumo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsequipe['descricao']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("equipe", "descricao", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("equipe", "foto", $cnt1); ?> </td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_equipe_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsequipe['kt_pk_equipe']); ?>" />
            <?php } while ($row_rsequipe = mysql_fetch_assoc($rsequipe)); ?>
            <div class="KT_bottombuttons">
              <div>
                <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
                </div>
                <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                <?php }
      // endif Conditional region1
      ?>
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td bgcolor="#3B63A1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
