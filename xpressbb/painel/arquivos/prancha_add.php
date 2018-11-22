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
  $uploadObj->setResize("true", 500, 0);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_pranchas = new tNG_multipleInsert($conn_xpress);
$tNGs->addTransaction($ins_pranchas);
// Register triggers
$ins_pranchas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_pranchas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_pranchas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_pranchas->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_pranchas->setTable("pranchas");
$ins_pranchas->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_pranchas->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_pranchas->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_pranchas->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_pranchas = new tNG_multipleUpdate($conn_xpress);
$tNGs->addTransaction($upd_pranchas);
// Register triggers
$upd_pranchas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_pranchas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_pranchas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_pranchas->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_pranchas->setTable("pranchas");
$upd_pranchas->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_pranchas->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_pranchas->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_pranchas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_pranchas = new tNG_multipleDelete($conn_xpress);
$tNGs->addTransaction($del_pranchas);
// Register triggers
$del_pranchas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_pranchas->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_pranchas->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_pranchas->setTable("pranchas");
$del_pranchas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspranchas = $tNGs->getRecordset("pranchas");
$row_rspranchas = mysql_fetch_assoc($rspranchas);
$totalRows_rspranchas = mysql_num_rows($rspranchas);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 16px}
.style2 {color: #FF0000}
-->
</style>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
</script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
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
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#3B63A1"><img src="../topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><p>&nbsp;</p>
    <p class="fonte">&nbsp;</p>
    <p>&nbsp;</p>
    
    <?php
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
        Pranchas </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rspranchas > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                <td align="left"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspranchas['nome']); ?>" size="50" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("pranchas", "nome", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                <td align="left"><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rspranchas['descricao']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("pranchas", "descricao", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                <td align="left"><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="50" />
                    <?php echo $tNGs->displayFieldError("pranchas", "foto", $cnt1); ?> </td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_pranchas_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspranchas['kt_pk_pranchas']); ?>" />
            <?php } while ($row_rspranchas = mysql_fetch_assoc($rspranchas)); ?>
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td bgcolor="#3B63A1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
