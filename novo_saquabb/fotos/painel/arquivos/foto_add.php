<?php require_once('../../../Connections/fotos.php'); ?>
<?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../../");

// Make unified connection variable
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../fotos/capa/");
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
  $uploadObj->setFolder("../../../fotos/capa/");
  $uploadObj->setMaxSize(500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_galeria = new tNG_multipleInsert($conn_fotos);
$tNGs->addTransaction($ins_galeria);
// Register triggers
$ins_galeria->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_galeria->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_galeria->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$ins_galeria->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_galeria->setTable("galeria");
$ins_galeria->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_galeria->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_galeria->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_galeria->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_galeria = new tNG_multipleUpdate($conn_fotos);
$tNGs->addTransaction($upd_galeria);
// Register triggers
$upd_galeria->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_galeria->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_galeria->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$upd_galeria->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_galeria->setTable("galeria");
$upd_galeria->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_galeria->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_galeria->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_galeria->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_galeria = new tNG_multipleDelete($conn_fotos);
$tNGs->addTransaction($del_galeria);
// Register triggers
$del_galeria->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_galeria->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$del_galeria->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_galeria->setTable("galeria");
$del_galeria->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgaleria = $tNGs->getRecordset("galeria");
$row_rsgaleria = mysql_fetch_assoc($rsgaleria);
$totalRows_rsgaleria = mysql_num_rows($rsgaleria);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
</script>
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
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
    Galeria </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsgaleria > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
            <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("galeria", "imagem", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgaleria['nome']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("galeria", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
            <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsgaleria['descricao']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("galeria", "descricao", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_galeria_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsgaleria['kt_pk_galeria']); ?>" />
        <?php } while ($row_rsgaleria = mysql_fetch_assoc($rsgaleria)); ?>
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
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
