<?php require_once('Connections/CostaverdeFM.php'); ?>
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
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_user = new tNG_multipleInsert($conn_CostaverdeFM);
$tNGs->addTransaction($ins_user);
// Register triggers
$ins_user->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_user->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_user->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$ins_user->setTable("user");
$ins_user->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_user->addColumn("senha", "STRING_TYPE", "POST", "senha");
$ins_user->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_user = new tNG_multipleUpdate($conn_CostaverdeFM);
$tNGs->addTransaction($upd_user);
// Register triggers
$upd_user->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_user->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_user->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_user->setTable("user");
$upd_user->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_user->addColumn("senha", "STRING_TYPE", "POST", "senha");
$upd_user->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_user = new tNG_multipleDelete($conn_CostaverdeFM);
$tNGs->addTransaction($del_user);
// Register triggers
$del_user->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_user->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_user->setTable("user");
$del_user->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsuser = $tNGs->getRecordset("user");
$row_rsuser = mysql_fetch_assoc($rsuser);
$totalRows_rsuser = mysql_num_rows($rsuser);
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
    User </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsuser > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsuser['nome']); ?>" size="30" maxlength="30" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("user", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="senha_<?php echo $cnt1; ?>">Senha:</label></td>
            <td><input type="text" name="senha_<?php echo $cnt1; ?>" id="senha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsuser['senha']); ?>" size="30" maxlength="30" />
                <?php echo $tNGs->displayFieldHint("senha");?> <?php echo $tNGs->displayFieldError("user", "senha", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_user_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsuser['kt_pk_user']); ?>" />
        <?php } while ($row_rsuser = mysql_fetch_assoc($rsuser)); ?>
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
