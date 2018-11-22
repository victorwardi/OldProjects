<?php require_once('../../Connections/victor.php'); ?>
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
$conn_victor = new KT_connection($victor, $database_victor);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../victor/fotos/");
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
  $uploadObj->setFolder("../../victor/fotos/");
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_fotografia = new tNG_multipleInsert($conn_victor);
$tNGs->addTransaction($ins_fotografia);
// Register triggers
$ins_fotografia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotografia->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotografia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_fotografia->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_fotografia->setTable("fotografia");
$ins_fotografia->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_fotografia->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotografia->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotografia = new tNG_multipleUpdate($conn_victor);
$tNGs->addTransaction($upd_fotografia);
// Register triggers
$upd_fotografia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotografia->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotografia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_fotografia->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_fotografia->setTable("fotografia");
$upd_fotografia->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_fotografia->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_fotografia->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_fotografia = new tNG_multipleDelete($conn_victor);
$tNGs->addTransaction($del_fotografia);
// Register triggers
$del_fotografia->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotografia->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_fotografia->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_fotografia->setTable("fotografia");
$del_fotografia->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotografia = $tNGs->getRecordset("fotografia");
$row_rsfotografia = mysql_fetch_assoc($rsfotografia);
$totalRows_rsfotografia = mysql_num_rows($rsfotografia);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
</head>

<body>
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
    Fotografia </h1>
  <div class="KT_tngform">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" enctype="multipart/form-data" id="form1">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsfotografia > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
            <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("foto");?> <?php echo $tNGs->displayFieldError("fotografia", "foto", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_fotografia_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfotografia['kt_pk_fotografia']); ?>" />
        <?php } while ($row_rsfotografia = mysql_fetch_assoc($rsfotografia)); ?>
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
</body>
</html>
