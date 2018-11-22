<?php require_once('../../../Connections/fotos.php'); ?>
<?php require_once('../../../Connections/fotos.php'); ?>
<?php require_once('../../../Connections/fotos.php'); ?>
<?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../../");

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../../");

// Make unified connection variable
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Make unified connection variable
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

mysql_select_db($database_fotos, $fotos);
$query_galeria = "SELECT * FROM galeria ORDER BY id DESC";
$galeria = mysql_query($query_galeria, $fotos) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos_digitais/");
  $deleteObj->setDbFieldName("arquivo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("arquivo");
  $uploadObj->setDbFieldName("arquivo");
  $uploadObj->setFolder("../../fotos_digitais/");
  $uploadObj->setMaxSize(500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_fotos_digitais = new tNG_multipleInsert($conn_fotos);
$tNGs->addTransaction($ins_fotos_digitais);
// Register triggers
$ins_fotos_digitais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos_digitais->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos_digitais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$ins_fotos_digitais->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_fotos_digitais->setTable("fotos_digitais");
$ins_fotos_digitais->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_fotos_digitais->addColumn("id", "STRING_TYPE", "POST", "galeriass");
$ins_fotos_digitais->addColumn("local", "STRING_TYPE", "POST", "select2");
$ins_fotos_digitais->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotos_digitais->addColumn("fotografo", "STRING_TYPE", "POST", "fotografo");
$ins_fotos_digitais->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotos_digitais = new tNG_multipleUpdate($conn_fotos);
$tNGs->addTransaction($upd_fotos_digitais);
// Register triggers
$upd_fotos_digitais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotos_digitais->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotos_digitais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$upd_fotos_digitais->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_fotos_digitais->setTable("fotos_digitais");
$upd_fotos_digitais->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_fotos_digitais->addColumn("local", "STRING_TYPE", "POST", "select2");
$upd_fotos_digitais->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_fotos_digitais->addColumn("id", "STRING_TYPE", "POST", "galeriass");
$upd_fotos_digitais->addColumn("fotografo", "STRING_TYPE", "POST", "fotografo");
$upd_fotos_digitais->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Make an instance of the transaction object
$del_fotos_digitais = new tNG_multipleDelete($conn_fotos);
$tNGs->addTransaction($del_fotos_digitais);
// Register triggers
$del_fotos_digitais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotos_digitais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$del_fotos_digitais->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_fotos_digitais->setTable("fotos_digitais");
$del_fotos_digitais->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos_digitais = $tNGs->getRecordset("fotos_digitais");
$row_rsfotos_digitais = mysql_fetch_assoc($rsfotos_digitais);
$totalRows_rsfotos_digitais = mysql_num_rows($rsfotos_digitais);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['id_foto'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Fotos_digitais </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsfotos_digitais > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo:</label></td>
            <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("fotos_digitais", "arquivo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
            <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos_digitais['descricao']); ?>" size="50" maxlength="80" />
                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("fotos_digitais", "descricao", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="galeria_<?php echo $cnt1; ?>">Galeria:</label></td>
            <td><label>
              <select name="galeriass" id="galeriass">
                <option value="">Selecione a Galeria </option>
                <?php
do {  
?>
                <option value="<?php echo $row_galeria['id']?>"><?php echo $row_galeria['nome']?></option>
                <?php
} while ($row_galeria = mysql_fetch_assoc($galeria));
  $rows = mysql_num_rows($galeria);
  if($rows > 0) {
      mysql_data_seek($galeria, 0);
	  $row_galeria = mysql_fetch_assoc($galeria);
  }
?>
              </select>
              </label>
                <?php echo $tNGs->displayFieldHint("galeria");?> <?php echo $tNGs->displayFieldError("fotos_digitais", "galeria", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th">Local:</td>
            <td><label>
              <select name="select2">
                <option>Selecione o Local</option>
                <option value="Praia da Vila - Saquarema - RJ">Praia da Vila - Saquarema - RJ</option>
                <option value="Ita&uacute;na - Saquarema - RJ">Ita&uacute;na - Saquarema - RJ</option>
                <option value="Berro D`agua - Saquarema - RJ">Berro D`agua - Saquarema - RJ</option>
                <option value="Barrinha - Saquarema - RJ">Barrinha - Saquarema - RJ</option>
                <option value="Laj&atilde;o - Saquarema - RJ">Laj&atilde;o - Saquarema - RJ</option>
                <option value="Praia Brava - Arraial do Cabo - RJ">Praia Brava - Arraial do Cabo - RJ</option>
                <option value="Praia Grande - Arraial do Cabo - RJ">Praia Grande - Arraial do Cabo - RJ</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fotografo_<?php echo $cnt1; ?>">Fotografo:</label></td>
            <td><label>
              <select name="fotografo" id="fotografo">
                <option>Selecione o Fot&oacute;grafo</option>
                <option value="Victor Caetano">Victor Caetano</option>
                <option value="Ded&eacute; Siqueira">Ded&eacute; Siqueira</option>
                <option value="Eldon 'Juninho'">Eldon 'Juninho'</option>
                <option value="Raphael Bravo">Raphael Bravo</option>
              </select>
              </label>              <?php echo $tNGs->displayFieldHint("fotografo");?><?php echo $tNGs->displayFieldError("fotos_digitais", "fotografo", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_fotos_digitais_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfotos_digitais['kt_pk_fotos_digitais']); ?>" />
        <?php } while ($row_rsfotos_digitais = mysql_fetch_assoc($rsfotos_digitais)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['id_foto'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_foto')" />
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
<?php
mysql_free_result($galeria);
?>
