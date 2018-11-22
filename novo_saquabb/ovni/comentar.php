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
$ins_comentarios_ovni = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_comentarios_ovni);
// Register triggers
$ins_comentarios_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios_ovni->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_comentarios_ovni->setTable("comentarios_ovni");
$ins_comentarios_ovni->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios_ovni->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios_ovni->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios_ovni->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios_ovni->addColumn("id", "NUMERIC_TYPE", "GET", "id");
$ins_comentarios_ovni->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios_ovni = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_comentarios_ovni);
// Register triggers
$upd_comentarios_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios_ovni->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_comentarios_ovni->setTable("comentarios_ovni");
$upd_comentarios_ovni->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios_ovni->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios_ovni->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios_ovni->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios_ovni->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios_ovni = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_comentarios_ovni);
// Register triggers
$del_comentarios_ovni->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios_ovni->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_comentarios_ovni->setTable("comentarios_ovni");
$del_comentarios_ovni->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentarios_ovni = $tNGs->getRecordset("comentarios_ovni");
$row_rscomentarios_ovni = mysql_fetch_assoc($rscomentarios_ovni);
$totalRows_rscomentarios_ovni = mysql_num_rows($rscomentarios_ovni);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Comentar</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
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
if (@$_GET['id_coment'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
Coment&aacute;rio </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentarios_ovni > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_ovni['nome']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_ovni", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="mail_<?php echo $cnt1; ?>">Mail:</label></td>
            <td><input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_ovni['mail']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_ovni", "mail", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
            <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_ovni['cidade']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_ovni", "cidade", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="comentario_<?php echo $cnt1; ?>">Comentario:</label></td>
            <td><textarea name="comentario_<?php echo $cnt1; ?>" cols="32" rows="4" id="comentario_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rscomentarios_ovni['comentario']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_ovni", "comentario", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_comentarios_ovni_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_ovni['kt_pk_comentarios_ovni']); ?>" />
        <?php } while ($row_rscomentarios_ovni = mysql_fetch_assoc($rscomentarios_ovni)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['id_coment'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_coment')" />
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
