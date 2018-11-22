<?php require_once('../../Connections/xpress.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Inserir seu nome");
$formValidation->addField("email", true, "text", "", "", "", "Inserir seu e-mail");
$formValidation->addField("comentario", true, "text", "", "", "", "Inserir seu comentário");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_comentario = new tNG_multipleInsert($conn_xpress);
$tNGs->addTransaction($ins_comentario);
// Register triggers
$ins_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentario->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_comentario->setTable("comentario");
$ins_comentario->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentario->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_comentario->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentario->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentario = new tNG_multipleUpdate($conn_xpress);
$tNGs->addTransaction($upd_comentario);
// Register triggers
$upd_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentario->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_comentario->setTable("comentario");
$upd_comentario->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentario->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_comentario->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentario->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_comentario = new tNG_multipleDelete($conn_xpress);
$tNGs->addTransaction($del_comentario);
// Register triggers
$del_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_comentario->setTable("comentario");
$del_comentario->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentario = $tNGs->getRecordset("comentario");
$row_rscomentario = mysql_fetch_assoc($rscomentario);
$totalRows_rscomentario = mysql_num_rows($rscomentario);
?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
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
          Coment&aacute;rios </h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentario > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                  <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentario['nome']); ?>" size="30" maxlength="30" />
                      <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentario", "nome", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">E-mail:</label></td>
                  <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentario['email']); ?>" size="30" maxlength="30" />
                      <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("comentario", "email", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="comentario_<?php echo $cnt1; ?>">Comentário:</label></td>
                  <td><textarea name="comentario_<?php echo $cnt1; ?>" id="comentario_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscomentario['comentario']); ?></textarea>
                      <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentario", "comentario", $cnt1); ?> </td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_comentario_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentario['kt_pk_comentario']); ?>" />
              <?php } while ($row_rscomentario = mysql_fetch_assoc($rscomentario)); ?>
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
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
