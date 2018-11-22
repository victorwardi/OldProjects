<?php require_once('Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("uploads/fotos/");
  $deleteObj->setDbFieldName("foto1");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto1");
  $uploadObj->setDbFieldName("foto1");
  $uploadObj->setFolder("uploads/fotos/");
  $uploadObj->setResize("true", 100, 100);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_ovni = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_ovni);
// Register triggers
$ins_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_ovni->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$ins_ovni->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_ovni->setTable("ovni");
$ins_ovni->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_ovni->addColumn("materia", "STRING_TYPE", "POST", "materia");
$ins_ovni->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_ovni->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$ins_ovni->addColumn("desc1", "STRING_TYPE", "POST", "desc1");
$ins_ovni->addColumn("fotografo1", "STRING_TYPE", "POST", "fotografo1");
$ins_ovni->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$ins_ovni->addColumn("desc2", "STRING_TYPE", "POST", "desc2");
$ins_ovni->addColumn("fotografo2", "STRING_TYPE", "POST", "fotografo2");
$ins_ovni->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$ins_ovni->addColumn("desc3", "STRING_TYPE", "POST", "desc3");
$ins_ovni->addColumn("fotografo3", "STRING_TYPE", "POST", "fotografo3");
$ins_ovni->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_ovni = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_ovni);
// Register triggers
$upd_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_ovni->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$upd_ovni->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_ovni->setTable("ovni");
$upd_ovni->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_ovni->addColumn("materia", "STRING_TYPE", "POST", "materia");
$upd_ovni->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_ovni->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$upd_ovni->addColumn("desc1", "STRING_TYPE", "POST", "desc1");
$upd_ovni->addColumn("fotografo1", "STRING_TYPE", "POST", "fotografo1");
$upd_ovni->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$upd_ovni->addColumn("desc2", "STRING_TYPE", "POST", "desc2");
$upd_ovni->addColumn("fotografo2", "STRING_TYPE", "POST", "fotografo2");
$upd_ovni->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$upd_ovni->addColumn("desc3", "STRING_TYPE", "POST", "desc3");
$upd_ovni->addColumn("fotografo3", "STRING_TYPE", "POST", "fotografo3");
$upd_ovni->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_ovni = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_ovni);
// Register triggers
$del_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$del_ovni->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_ovni->setTable("ovni");
$del_ovni->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsovni = $tNGs->getRecordset("ovni");
$row_rsovni = mysql_fetch_assoc($rsovni);
$totalRows_rsovni = mysql_num_rows($rsovni);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
    Ovni </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsovni > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
            <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['titulo']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("ovni", "titulo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="materia_<?php echo $cnt1; ?>">Materia:</label></td>
            <td><input type="text" name="materia_<?php echo $cnt1; ?>" id="materia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['materia']); ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("materia");?> <?php echo $tNGs->displayFieldError("ovni", "materia", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
            <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['data']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("ovni", "data", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="foto1_<?php echo $cnt1; ?>">Foto1:</label></td>
            <td><input type="file" name="foto1_<?php echo $cnt1; ?>" id="foto1_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("ovni", "foto1", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="desc1_<?php echo $cnt1; ?>">Desc1:</label></td>
            <td><input type="text" name="desc1_<?php echo $cnt1; ?>" id="desc1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['desc1']); ?>" size="32" maxlength="60" />
                <?php echo $tNGs->displayFieldHint("desc1");?> <?php echo $tNGs->displayFieldError("ovni", "desc1", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fotografo1_<?php echo $cnt1; ?>">Fotografo1:</label></td>
            <td><input type="text" name="fotografo1_<?php echo $cnt1; ?>" id="fotografo1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['fotografo1']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("fotografo1");?> <?php echo $tNGs->displayFieldError("ovni", "fotografo1", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="foto2_<?php echo $cnt1; ?>">Foto2:</label></td>
            <td><input type="text" name="foto2_<?php echo $cnt1; ?>" id="foto2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['foto2']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("foto2");?> <?php echo $tNGs->displayFieldError("ovni", "foto2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="desc2_<?php echo $cnt1; ?>">Desc2:</label></td>
            <td><input type="text" name="desc2_<?php echo $cnt1; ?>" id="desc2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['desc2']); ?>" size="32" maxlength="60" />
                <?php echo $tNGs->displayFieldHint("desc2");?> <?php echo $tNGs->displayFieldError("ovni", "desc2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fotografo2_<?php echo $cnt1; ?>">Fotografo2:</label></td>
            <td><input type="text" name="fotografo2_<?php echo $cnt1; ?>" id="fotografo2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['fotografo2']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("fotografo2");?> <?php echo $tNGs->displayFieldError("ovni", "fotografo2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="foto3_<?php echo $cnt1; ?>">Foto3:</label></td>
            <td><input type="text" name="foto3_<?php echo $cnt1; ?>" id="foto3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['foto3']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("foto3");?> <?php echo $tNGs->displayFieldError("ovni", "foto3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="desc3_<?php echo $cnt1; ?>">Desc3:</label></td>
            <td><input type="text" name="desc3_<?php echo $cnt1; ?>" id="desc3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['desc3']); ?>" size="32" maxlength="60" />
                <?php echo $tNGs->displayFieldHint("desc3");?> <?php echo $tNGs->displayFieldError("ovni", "desc3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fotografo3_<?php echo $cnt1; ?>">Fotografo3:</label></td>
            <td><input type="text" name="fotografo3_<?php echo $cnt1; ?>" id="fotografo3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsovni['fotografo3']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("fotografo3");?> <?php echo $tNGs->displayFieldError("ovni", "fotografo3", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_ovni_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsovni['kt_pk_ovni']); ?>" />
        <?php } while ($row_rsovni = mysql_fetch_assoc($rsovni)); ?>
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
