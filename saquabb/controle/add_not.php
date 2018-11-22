<?php require_once('../Connections/saquabb.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// KTML 4 Server Side Include
require_once("../includes/ktm/ktml4.php");

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

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../uploads/fotos/");
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
  $uploadObj->setFolder("../uploads/fotos/");
  $uploadObj->setResize("true", 250, 0);
  $uploadObj->setMaxSize(200);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_saquabb, $saquabb);
$query_coluna = "SELECT * FROM coluna";
$coluna = mysql_query($query_coluna, $saquabb) or die(mysql_error());
$row_coluna = mysql_fetch_assoc($coluna);
$totalRows_coluna = mysql_num_rows($coluna);

mysql_select_db($database_saquabb, $saquabb);
$query_Recordset2 = "SELECT id, coluna FROM noticias ORDER BY coluna";
$Recordset2 = mysql_query($query_Recordset2, $saquabb) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_noticias1 = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_noticias1);
// Register triggers
$ins_noticias1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_noticias1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_noticias1->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_noticias1->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_noticias1->setTable("noticias");
$ins_noticias1->addColumn("id", "NUMERIC_TYPE", "POST", "id");
$ins_noticias1->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_noticias1->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$ins_noticias1->addColumn("materia", "STRING_TYPE", "POST", "materia");
$ins_noticias1->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_noticias1->addColumn("fonte", "STRING_TYPE", "POST", "fonte");
$ins_noticias1->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_noticias1->addColumn("coluna", "STRING_TYPE", "POST", "coluna");
$ins_noticias1->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_noticias = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_noticias);
// Register triggers
$upd_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_noticias->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_noticias->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_noticias->setTable("noticias");
$upd_noticias->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_noticias->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$upd_noticias->addColumn("materia", "STRING_TYPE", "POST", "materia");
$upd_noticias->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_noticias->addColumn("fonte", "STRING_TYPE", "POST", "fonte");
$upd_noticias->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_noticias->addColumn("coluna", "STRING_TYPE", "POST", "select");
$upd_noticias->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_noticias = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_noticias);
// Register triggers
$del_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_noticias->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_noticias->setTable("noticias");
$del_noticias->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnoticias = $tNGs->getRecordset("noticias");
$row_rsnoticias = mysql_fetch_assoc($rsnoticias);
$totalRows_rsnoticias = mysql_num_rows($rsnoticias);
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
<script src="../includes/ktm/core/ktml.js" type="text/javascript"></script>
<script src="../includes/resources/ktml.js" type="text/javascript"></script>
<link href="../includes/ktm/core/styles/ktml.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
	ktml_init_object = {
		"debugger_params": false,
		"path": "../includes/ktm/",
		"server": "php"
	};
</script>
<script type="text/javascript">
	materia_config = {
		"width": 700,
		"height": 350,
		"show_toolbar": "load",
		"show_pi": true,
		"background_color": "#FFFFFF",
		"strip_server_location": false,
		"auto_focus": true,
		"module_props": { },
		"buttons": [
			[1, "standard", ["undo", "redo", "find_replace", "toggle_visible", "toggle_editmode", "toggle_fullscreen", "help"]],
			[1, "formatting", ["bold", "italic", "underline", "align_left", "align_center", "align_right", "align_justify", "clean_menu", "foreground_color", "background_color"]],
			[2, "styles", ["heading_list", "style_list", "fonttype_list", "fontsize_list"]],
			[2, "insert", ["insert_link", "insert_table", "insert_image", "horizontal_rule", "insert_character"]]
		]
	};
	<?php
		$ktml_materia = new ktml4("materia");
		$ktml_materia->setModuleProperty("filebrowser", "AllowedModule", "true", false);
		$ktml_materia->setModuleProperty("filebrowser", "MaxFileSize", "1024", true);
		$ktml_materia->setModuleProperty("file", "UploadFolder", "../uploads/files/", false);
		$ktml_materia->setModuleProperty("file", "UploadFolderUrl", "../uploads/files/", true);
		$ktml_materia->setModuleProperty("file", "AllowedFileTypes", "doc, pdf, csv, xls, rtf, sxw, odt", true);
		$ktml_materia->setModuleProperty("media", "UploadFolder", "../uploads/media/", false);
		$ktml_materia->setModuleProperty("media", "UploadFolderUrl", "../uploads/media/", true);
		$ktml_materia->setModuleProperty("media", "AllowedFileTypes", "bmp, jpg, jpeg, gif, png", true);
		$ktml_materia->setModuleProperty("css", "PathToStyle", "../includes/ktm/styles/KT_styles.css", true);
		$ktml_materia->Execute();
	?>
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
    Noticias </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnoticias > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table width="741" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Título:</label></td>
          <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['titulo']); ?>" size="70" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("noticias", "titulo", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="resumo_<?php echo $cnt1; ?>">Resumo:</label></td>
          <td><textarea name="resumo_<?php echo $cnt1; ?>" id="resumo_<?php echo $cnt1; ?>" cols="60" rows="3"><?php echo KT_escapeAttribute($row_rsnoticias['resumo']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("resumo");?> <?php echo $tNGs->displayFieldError("noticias", "resumo", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="materia_<?php echo $cnt1; ?>">Matéria:</label></td>
          <td><input type="hidden" id="materia_<?php echo $cnt1; ?>" name="materia_<?php echo $cnt1; ?>" value="<?php echo KTML4_escapeAttribute($row_rsnoticias['materia']); ?>" />
              <script type="text/javascript">
  // KTML4 Lite Object
  ktml_materia_<?php echo $cnt1; ?> = new ktml("materia_<?php echo $cnt1; ?>");
</script>
              <?php echo $tNGs->displayFieldHint("materia");?> <?php echo $tNGs->displayFieldError("noticias", "materia", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
          <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['data']); ?>" size="20" maxlength="20" />
              <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("noticias", "data", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="fonte_<?php echo $cnt1; ?>">Fonte:</label></td>
          <td><input type="text" name="fonte_<?php echo $cnt1; ?>" id="fonte_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['fonte']); ?>" size="30" maxlength="30" />
              <?php echo $tNGs->displayFieldHint("fonte");?> <?php echo $tNGs->displayFieldError("noticias", "fonte", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
          <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="50" />
              <?php echo $tNGs->displayFieldError("noticias", "imagem", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="coluna_<?php echo $cnt1; ?>">Coluna:</label></td>
          <td><select name="select" id="select">
              <option value="">- Selecione uma Coluna -</option>
              </option>
              <?php
do {  
?>
              <option value="<?php echo $row_coluna['coluna']?>"><?php echo $row_coluna['coluna']?></option>
              <?php
} while ($row_coluna = mysql_fetch_assoc($coluna));
  $rows = mysql_num_rows($coluna);
  if($rows > 0) {
      mysql_data_seek($coluna, 0);
	  $row_coluna = mysql_fetch_assoc($coluna);
  }
?>
            </select>
              <?php echo $tNGs->displayFieldHint("coluna");?> <?php echo $tNGs->displayFieldError("noticias", "coluna", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_noticias_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnoticias['kt_pk_noticias']); ?>" />
      <?php } while ($row_rsnoticias = mysql_fetch_assoc($rsnoticias)); ?>
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
  
        <form id="form2" method="post" action="">
        </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($coluna);
?>
<?php
mysql_free_result($Recordset2);
?>
