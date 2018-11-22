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

// Make an insert transaction instance
$ins_fotos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_fotos);
// Register triggers
$ins_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$ins_fotos->setTable("fotos");
$ins_fotos->addColumn("galeriaID", "STRING_TYPE", "POST", "galeriaID");
$ins_fotos->addColumn("arquivo", "STRING_TYPE", "POST", "arquivo");
$ins_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_fotos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_fotos);
// Register triggers
$upd_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_fotos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_fotos->setTable("fotos");
$upd_fotos->addColumn("galeriaID", "STRING_TYPE", "POST", "galeriaID");
$upd_fotos->addColumn("arquivo", "STRING_TYPE", "CURRVAL", "arquivo");
$upd_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE", "GET", "fotoID");

// Make an instance of the transaction object
$del_fotos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_fotos);
// Register triggers
$del_fotos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_fotos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_fotos->setTable("fotos");
$del_fotos->setPrimaryKey("fotoID", "NUMERIC_TYPE", "GET", "fotoID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsfotos = $tNGs->getRecordset("fotos");
$row_rsfotos = mysql_fetch_assoc($rsfotos);
$totalRows_rsfotos = mysql_num_rows($rsfotos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploads/");
$objDynamicThumb1->setRenameRule("{rsfotos.arquivo}");
$objDynamicThumb1->setResize(80, 0, true);
$objDynamicThumb1->setWatermark(false);
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
  show_as_grid: true,
  merge_down_value: true
}
</script>
<link href="css/stilos.css" rel="stylesheet" type="text/css" />
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
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
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
        <table cellpadding="4" cellspacing="1" class="KT_tngtable" id="tabela">
          <tr>
            <td bgcolor="#CCCCCC" class="KT_th"><label for="galeriaID_<?php echo $cnt1; ?>">Galeria:</label></td>
            <td><input type="text" name="galeriaID_<?php echo $cnt1; ?>" id="galeriaID_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsfotos['galeriaID']); ?>" size="40" />
                <?php echo $tNGs->displayFieldHint("galeriaID");?> <?php echo $tNGs->displayFieldError("fotos", "galeriaID", $cnt1); ?> </td>
          </tr>
          <tr>
            <td bgcolor="#CCCCCC" class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Foto:</label></td>
            <td><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /><?php echo $tNGs->displayFieldHint("arquivo");?> <?php echo $tNGs->displayFieldError("fotos", "arquivo", $cnt1); ?> </td></tr>
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
