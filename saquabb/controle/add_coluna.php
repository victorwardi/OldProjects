<?php require_once('../Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_coluna = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_coluna);
// Register triggers
$ins_coluna->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_coluna->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_coluna->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_coluna->setTable("coluna");
$ins_coluna->addColumn("coluna", "STRING_TYPE", "POST", "coluna");
$ins_coluna->setPrimaryKey("coluna", "STRING_TYPE");

// Make an update transaction instance
$upd_coluna = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_coluna);
// Register triggers
$upd_coluna->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_coluna->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_coluna->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_coluna->setTable("coluna");
$upd_coluna->addColumn("coluna", "STRING_TYPE", "POST", "coluna");
$upd_coluna->setPrimaryKey("coluna", "STRING_TYPE", "GET", "coluna");

// Make an instance of the transaction object
$del_coluna = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_coluna);
// Register triggers
$del_coluna->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_coluna->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_coluna->setTable("coluna");
$del_coluna->setPrimaryKey("coluna", "STRING_TYPE", "GET", "coluna");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscoluna = $tNGs->getRecordset("coluna");
$row_rscoluna = mysql_fetch_assoc($rscoluna);
$totalRows_rscoluna = mysql_num_rows($rscoluna);
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
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
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
if (@$_GET['coluna'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Coluna </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscoluna > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="coluna_<?php echo $cnt1; ?>">Coluna:</label></td>
            <td><input type="text" name="coluna_<?php echo $cnt1; ?>" id="coluna_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscoluna['coluna']); ?>" size="30" maxlength="30" />
                <?php echo $tNGs->displayFieldHint("coluna");?> <?php echo $tNGs->displayFieldError("coluna", "coluna", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_coluna_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscoluna['kt_pk_coluna']); ?>" />
        <?php } while ($row_rscoluna = mysql_fetch_assoc($rscoluna)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['coluna'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'coluna')" />
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
