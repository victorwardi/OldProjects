<?php require_once('../Connections/revista.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_revista = new KT_connection($revista, $database_revista);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../paginas/");
  $deleteObj->setDbFieldName("imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../paginas/");
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_pagina = new tNG_multipleInsert($conn_revista);
$tNGs->addTransaction($ins_pagina);
// Register triggers
$ins_pagina->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_pagina->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_pagina->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_pagina->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_pagina->setTable("pagina");
$ins_pagina->addColumn("revista", "STRING_TYPE", "POST", "revista");
$ins_pagina->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_pagina->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_pagina = new tNG_multipleUpdate($conn_revista);
$tNGs->addTransaction($upd_pagina);
// Register triggers
$upd_pagina->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_pagina->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_pagina->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_pagina->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_pagina->setTable("pagina");
$upd_pagina->addColumn("revista", "STRING_TYPE", "POST", "revista");
$upd_pagina->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_pagina->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_pagina = new tNG_multipleDelete($conn_revista);
$tNGs->addTransaction($del_pagina);
// Register triggers
$del_pagina->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_pagina->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_pagina->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_pagina->setTable("pagina");
$del_pagina->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspagina = $tNGs->getRecordset("pagina");
$row_rspagina = mysql_fetch_assoc($rspagina);
$totalRows_rspagina = mysql_num_rows($rspagina);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
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
    Pagina </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rspagina > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="revista_<?php echo $cnt1; ?>">Revista:</label></td>
            <td><input type="text" name="revista_<?php echo $cnt1; ?>" id="revista_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspagina['revista']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("revista");?> <?php echo $tNGs->displayFieldError("pagina", "revista", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
            <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("pagina", "imagem", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_pagina_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspagina['kt_pk_pagina']); ?>" />
        <?php } while ($row_rspagina = mysql_fetch_assoc($rspagina)); ?>
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
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
