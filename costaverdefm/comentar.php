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

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_comentar = "SELECT * FROM comentarios";
$comentar = mysql_query($query_comentar, $CostaverdeFM) or die(mysql_error());
$row_comentar = mysql_fetch_assoc($comentar);
$totalRows_comentar = mysql_num_rows($comentar);

// Make an insert transaction instance
$ins_comentarios = new tNG_multipleInsert($conn_CostaverdeFM);
$tNGs->addTransaction($ins_comentarios);
// Register triggers
$ins_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$ins_comentarios->setTable("comentarios");
$ins_comentarios->addColumn("de", "STRING_TYPE", "POST", "de");
$ins_comentarios->addColumn("para", "STRING_TYPE", "POST", "para");
$ins_comentarios->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios = new tNG_multipleUpdate($conn_CostaverdeFM);
$tNGs->addTransaction($upd_comentarios);
// Register triggers
$upd_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$upd_comentarios->setTable("comentarios");
$upd_comentarios->addColumn("de", "STRING_TYPE", "POST", "de");
$upd_comentarios->addColumn("para", "STRING_TYPE", "POST", "para");
$upd_comentarios->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios = new tNG_multipleDelete($conn_CostaverdeFM);
$tNGs->addTransaction($del_comentarios);
// Register triggers
$del_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$del_comentarios->setTable("comentarios");
$del_comentarios->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentarios = $tNGs->getRecordset("comentarios");
$row_rscomentarios = mysql_fetch_assoc($rscomentarios);
$totalRows_rscomentarios = mysql_num_rows($rscomentarios);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deixe seu recado!</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
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
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <th height="37" align="center" valign="middle" bgcolor="#4ABB6D" class="titulo_anuncio" scope="col">Deixe Seu Recado! </th>
  </tr>
  <tr>
    <th align="left" valign="top" scope="col">&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
          <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentarios > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="de_<?php echo $cnt1; ?>">De:</label></td>
                  <td><input type="text" name="de_<?php echo $cnt1; ?>" id="de_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios['de']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("de");?> <?php echo $tNGs->displayFieldError("comentarios", "de", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="para_<?php echo $cnt1; ?>">Para:</label></td>
                  <td><input type="text" name="para_<?php echo $cnt1; ?>" id="para_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios['para']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("para");?> <?php echo $tNGs->displayFieldError("comentarios", "para", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="comentario_<?php echo $cnt1; ?>">Comentario:</label></td>
                  <td><textarea name="comentario_<?php echo $cnt1; ?>" id="comentario_<?php echo $cnt1; ?>" cols="30" rows="5"><?php echo KT_escapeAttribute($row_rscomentarios['comentario']); ?></textarea>
                      <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios", "comentario", $cnt1); ?> </td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_comentarios_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios['kt_pk_comentarios']); ?>" />
              <?php } while ($row_rscomentarios = mysql_fetch_assoc($rscomentarios)); ?>
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
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p class="fonte11px_preta_bold">*Preencher todos os campos </p></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($comentar);
?>
