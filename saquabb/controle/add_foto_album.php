<?php require_once('../Connections/saquabb.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM galeria ORDER BY nome ASC";
$galeria = mysql_query($query_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset1 = "SELECT  id FROM fotos WHERE galeria IS NULL ORDER BY id";
$Recordset1 = mysql_query($query_Recordset1, $saquabb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset2 = "SELECT  id, galeria FROM fotos ORDER BY id";
$Recordset2 = mysql_query($query_Recordset2, $saquabb) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset3 = "SELECT  id_foto FROM fotos WHERE id IS NULL ORDER BY id_foto";
$Recordset3 = mysql_query($query_Recordset3, $saquabb) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset4 = "SELECT  id_foto FROM fotos ORDER BY id";
$Recordset4 = mysql_query($query_Recordset4, $saquabb) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_saquabb, $saquabb);
$query_noticia = "SELECT * FROM noticias ORDER BY id DESC";
$noticia = mysql_query($query_noticia, $saquabb) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);
$totalRows_noticia = mysql_num_rows($noticia);

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../uploads/fotos/");
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
  $uploadObj->setFolder("../uploads/fotos/");
  $uploadObj->setResize("true", 450, 0);
  $uploadObj->setMaxSize(200);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_fotos = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_fotos);
// Register triggers
$ins_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_fotos->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_fotos->setTable("fotos");
$ins_fotos->addColumn("galeria", "STRING_TYPE", "POST", "galeria");
$ins_fotos->addColumn("id", "NUMERIC_TYPE", "POST", "noticia");
$ins_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_fotos->addColumn("fotografo", "STRING_TYPE", "POST", "fotografo");
$ins_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotos = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_fotos);
// Register triggers
$upd_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_fotos->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_fotos->setTable("fotos");
$upd_fotos->addColumn("galeria", "STRING_TYPE", "POST", "galeria");
$upd_fotos->addColumn("id", "NUMERIC_TYPE", "POST", "noticia");
$upd_fotos->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_fotos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_fotos->addColumn("fotografo", "STRING_TYPE", "POST", "fotografo");
$upd_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Make an instance of the transaction object
$del_fotos = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_fotos);
// Register triggers
$del_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_fotos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_fotos->setTable("fotos");
$del_fotos->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos = $tNGs->getRecordset("fotos");
$row_rsfotos = mysql_fetch_assoc($rsfotos);
$totalRows_rsfotos = mysql_num_rows($rsfotos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://www.interaktonline.com/MXWidgets">
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
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset2 = new WDG_JsRecordset("Recordset2");
echo $jsObject_Recordset2->getOutput();
//end JSRecordset
?>
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset4 = new WDG_JsRecordset("Recordset4");
echo $jsObject_Recordset4->getOutput();
//end JSRecordset
?>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
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
            <td class="KT_th"><label for="galeria_<?php echo $cnt1; ?>">Galeria:</label></td>
            <td><select name="galeria" id="galeria">
              <option value="" <?php if (!(strcmp("", $row_galeria['nome']))) {echo "selected=\"selected\"";} ?>>- Escolha uma Galeria -</option>
              <?php
do {  
?><option value="<?php echo $row_galeria['id']?>"<?php if (!(strcmp($row_galeria['id'], $row_galeria['nome']))) {echo "selected=\"selected\"";} ?>><?php echo $row_galeria['nome']?></option>
              <?php
} while ($row_galeria = mysql_fetch_assoc($galeria));
  $rows = mysql_num_rows($galeria);
  if($rows > 0) {
      mysql_data_seek($galeria, 0);
	  $row_galeria = mysql_fetch_assoc($galeria);
  }
?>
              </select>
                <?php echo $tNGs->displayFieldHint("galeria");?> <?php echo $tNGs->displayFieldError("fotos", "galeria", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="id_<?php echo $cnt1; ?>">Not&iacute;cia:</label></td>
            <td><select name="noticia" id="noticia">
              <option value="" <?php if (!(strcmp("", $row_noticia['titulo']))) {echo "selected=\"selected\"";} ?>>- Escolha uma Notícia -</option>
              <?php
do {  
?><option value="<?php echo $row_noticia['id']?>"<?php if (!(strcmp($row_noticia['id'], $row_noticia['titulo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_noticia['titulo']?></option>
              <?php
} while ($row_noticia = mysql_fetch_assoc($noticia));
  $rows = mysql_num_rows($noticia);
  if($rows > 0) {
      mysql_data_seek($noticia, 0);
	  $row_noticia = mysql_fetch_assoc($noticia);
  }
?>
                                                  </select>
                <?php echo $tNGs->displayFieldHint("id");?> <?php echo $tNGs->displayFieldError("fotos", "id", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo:</label></td>
            <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("fotos", "arquivo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
            <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['descricao']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("fotos", "descricao", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fotografo_<?php echo $cnt1; ?>">Fotografo:</label></td>
            <td><input type="text" name="fotografo_<?php echo $cnt1; ?>" id="fotografo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['fotografo']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("fotografo");?> <?php echo $tNGs->displayFieldError("fotos", "fotografo", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_fotos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsfotos['kt_pk_fotos']); ?>" />
        <?php } while ($row_rsfotos = mysql_fetch_assoc($rsfotos)); ?>
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
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  
        
        <form id="form2" method="post" action="">
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
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
<?php
mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($noticia);
?>
