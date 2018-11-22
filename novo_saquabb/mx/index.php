<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Start trigger
$formValidation1 = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation1);
// End trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("Filedata");
  $uploadObj->setDbFieldName("descricao");
  $uploadObj->setFolder("../mx/fotos/");
  $uploadObj->setResize("true", 400, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

//start Trigger_Redirect trigger
//remove this line if you want to edit the code by hand
function Trigger_Redirect(&$tNG) {
  $redObj = new tNG_Redirect($tNG);
  $redObj->setURL(KT_getFullUri());
  $redObj->setKeepURLParams(false);
  return $redObj->Execute();
}
//end Trigger_Redirect trigger

// Make an insert transaction instance
$ins_fotos = new tNG_insert($conn_saquabb);
$tNGs->addTransaction($ins_fotos);
// Register triggers
$ins_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "teste.php");
// Add columns
$ins_fotos->setTable("fotos");
$ins_fotos->addColumn("galeria", "STRING_TYPE", "POST", "galeria");
$ins_fotos->addColumn("arquivo", "STRING_TYPE", "POST", "arquivo");
$ins_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotos->addColumn("fotografo", "STRING_TYPE", "POST", "fotografo");
$ins_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_fotos1 = new tNG_insert($conn_saquabb);
$tNGs->addTransaction($ins_fotos1);
// Register triggers
$ins_fotos1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert2");
$ins_fotos1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$ins_fotos1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "FILES", "Filedata");
$ins_fotos1->registerConditionalTrigger("{GET.isFlash} != 1", "END", "Trigger_Redirect", 90);
$ins_fotos1->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_fotos1->registerConditionalTrigger("{GET.isFlash} == 1", "ERROR", "Trigger_Default_MUploadError", 10);
// Add columns
$ins_fotos1->setTable("fotos");
$ins_fotos1->addColumn("galeria", "STRING_TYPE", "VALUE", "");
$ins_fotos1->addColumn("arquivo", "STRING_TYPE", "VALUE", "");
$ins_fotos1->addColumn("fotografo", "STRING_TYPE", "VALUE", "");
$ins_fotos1->addColumn("descricao", "FILE_TYPE", "FILES", "Filedata");
$ins_fotos1->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos = $tNGs->getRecordset("fotos");
$row_rsfotos = mysql_fetch_assoc($rsfotos);
$totalRows_rsfotos = mysql_num_rows($rsfotos);

// Multiple Upload Helper Object
$muploadHelper = new tNG_MuploadHelper("../", 32);
$muploadHelper->setMaxSize(1500);
$muploadHelper->setMaxNumber(0);
$muploadHelper->setExistentNumber(0);
$muploadHelper->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?><?php echo $muploadHelper->getScripts(); ?>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="galeria">Galeria:</label></td>
      <td><input type="text" name="galeria" id="galeria" value="<?php echo KT_escapeAttribute($row_rsfotos['galeria']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("galeria");?> <?php echo $tNGs->displayFieldError("fotos", "galeria"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="arquivo">Arquivo:</label></td>
      <td><input type="text" name="arquivo" id="arquivo" value="<?php echo KT_escapeAttribute($row_rsfotos['arquivo']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("arquivo");?> <?php echo $tNGs->displayFieldError("fotos", "arquivo"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="descricao">Descricao:</label></td>
      <td><input type="text" name="descricao" id="descricao" value="<?php echo KT_escapeAttribute($row_rsfotos['descricao']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("fotos", "descricao"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="KT_th"><label for="fotografo">Fotografo:</label></td>
      <td><input type="text" name="fotografo" id="fotografo" value="<?php echo KT_escapeAttribute($row_rsfotos['fotografo']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("fotografo");?> <?php echo $tNGs->displayFieldError("fotos", "fotografo"); ?> </td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Insert record" />      </td>
    </tr>
  </table>
</form>
<p>&nbsp;
  <?php
// Multiple Upload Helper
echo $tNGs->getSavedErrorMsg();
echo $muploadHelper->Execute();
?></p>
</body>
</html>
