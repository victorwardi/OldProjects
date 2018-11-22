<?php require_once('Connections/conBD.php'); ?>
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
$conn_conBD = new KT_connection($conBD, $database_conBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_contato = new tNG_multipleInsert($conn_conBD);
$tNGs->addTransaction($ins_contato);
// Register triggers
$ins_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$ins_contato->setTable("contato");
$ins_contato->addColumn("status", "STRING_TYPE", "POST", "status");
$ins_contato->setPrimaryKey("idContato", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_contato = new tNG_multipleUpdate($conn_conBD);
$tNGs->addTransaction($upd_contato);
// Register triggers
$upd_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_contato->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_contato->setTable("contato");
$upd_contato->addColumn("status", "STRING_TYPE", "POST", "status");
$upd_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Make an instance of the transaction object
$del_contato = new tNG_multipleDelete($conn_conBD);
$tNGs->addTransaction($del_contato);
// Register triggers
$del_contato->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_contato->registerTrigger("END", "Trigger_Default_Redirect", 99, "untitled1.php");
// Add columns
$del_contato->setTable("contato");
$del_contato->setPrimaryKey("idContato", "NUMERIC_TYPE", "GET", "idContato");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscontato = $tNGs->getRecordset("contato");
$row_rscontato = mysql_fetch_assoc($rscontato);
$totalRows_rscontato = mysql_num_rows($rscontato);
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
if (@$_GET['idContato'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Contato </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscontato > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="status_<?php echo $cnt1; ?>">Status:</label></td>
            <td><input type="text" name="status_<?php echo $cnt1; ?>" id="status_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscontato['status']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("status");?> <?php echo $tNGs->displayFieldError("contato", "status", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_contato_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscontato['kt_pk_contato']); ?>" />
        <?php } while ($row_rscontato = mysql_fetch_assoc($rscontato)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idContato'] == "") {
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
