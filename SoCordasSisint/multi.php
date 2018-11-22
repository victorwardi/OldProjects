<?php require_once('Connections/ConBD.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_DeleteFolder trigger
//remove this line if you want to edit the code by hand 
function Trigger_DeleteFolder(&$tNG) {
  $deleteObj = new tNG_DeleteFolder($tNG);
  $deleteObj->setBaseFolder("uploads/");
  $deleteObj->setFolder("{fotoID}");
  return $deleteObj->Execute();
}
//end Trigger_DeleteFolder trigger

// Start Multiple Image Upload Object
$multipleImageUpload = new tNG_MImageUpload("", "KT_Upload1", "ConBD");
$multipleImageUpload->setPrimaryKey("fotoID", "{rsfotos.fotoID}");
$multipleImageUpload->setBaseFolder("uploads/");
$multipleImageUpload->setFolder("{fotoID}");
$multipleImageUpload->setMaxSize(2000);
$multipleImageUpload->setMaxFiles(200);
$multipleImageUpload->setAllowedExtensions("bmp, jpg, jpeg, gif, png");
$multipleImageUpload->setResize(500, 0, true);
// End Multiple Image Upload Object

// Make an insert transaction instance
$ins_fotos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_fotos);
// Register triggers
$ins_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$ins_fotos->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$ins_fotos->setTable("fotos");
$ins_fotos->addColumn("galeriaID", "STRING_TYPE", "POST", "galeriaID");
$ins_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_fotos);
// Register triggers
$upd_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$upd_fotos->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$upd_fotos->setTable("fotos");
$upd_fotos->addColumn("galeriaID", "STRING_TYPE", "POST", "galeriaID");
$upd_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE", "GET", "fotoID");

// Make an instance of the transaction object
$del_fotos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_fotos);
// Register triggers
$del_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$del_fotos->registerTrigger("AFTER", "Trigger_DeleteFolder", 99);
// Add columns
$del_fotos->setTable("fotos");
$del_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE", "GET", "fotoID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos = $tNGs->getRecordset("fotos");
$row_rsfotos = mysql_fetch_assoc($rsfotos);
$totalRows_rsfotos = mysql_num_rows($rsfotos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
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
if (@$_GET['fotoID'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Fotos </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsfotos > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="galeriaID_<?php echo $cnt1; ?>">galeriaID:</label></td>
            <td><input type="text" name="galeriaID_<?php echo $cnt1; ?>" id="galeriaID_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['galeriaID']); ?>" size="7" />
                <?php echo $tNGs->displayFieldHint("galeriaID");?> <?php echo $tNGs->displayFieldError("fotos", "galeriaID", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descrição:</label></td>
            <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['descricao']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("fotos", "descricao", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Foto:</label></td>
            <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
              <a target="_blank" onclick="<?php echo $multipleImageUpload->getUploadAction(); ?>" href="<?php echo $multipleImageUpload->getUploadLink(); ?>">Upload</a>
              <input type="hidden" name="<?php echo $multipleImageUpload->getUploadReference(); ?>" value="1" />
              <?php echo $tNGs->displayFieldError("fotos", "arquivo", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_fotos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfotos['kt_pk_fotos']); ?>" />
        <?php } while ($row_rsfotos = mysql_fetch_assoc($rsfotos)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['fotoID'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
