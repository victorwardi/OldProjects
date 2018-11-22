<?php require_once('Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_promo_video = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_promo_video);
// Register triggers
$ins_promo_video->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_promo_video->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_promo_video->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$ins_promo_video->setTable("promo_video");
$ins_promo_video->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_promo_video->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_promo_video->addColumn("link", "STRING_TYPE", "POST", "link");
$ins_promo_video->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_promo_video = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_promo_video);
// Register triggers
$upd_promo_video->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_promo_video->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_promo_video->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_promo_video->setTable("promo_video");
$upd_promo_video->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_promo_video->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_promo_video->addColumn("link", "STRING_TYPE", "POST", "link");
$upd_promo_video->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_promo_video = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_promo_video);
// Register triggers
$del_promo_video->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_promo_video->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_promo_video->setTable("promo_video");
$del_promo_video->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspromo_video = $tNGs->getRecordset("promo_video");
$row_rspromo_video = mysql_fetch_assoc($rspromo_video);
$totalRows_rspromo_video = mysql_num_rows($rspromo_video);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Promo&ccedil;&atilde;o- Seu V&iacute;deo no Saquabb!</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
<!--
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}

function close_window() {
    window.close();
}
//-->
</script>
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="400" border="8" align="center" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <th bgcolor="#E6F9FD" scope="col">&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng"><h1><?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
              <span class="perfil_nome"><span class="perfil_nome"><?php echo NXT_getResource("Insert_FH"); ?>
              <?php 
// else Conditional region1
} else { ?>
              <?php echo NXT_getResource("Update_FH"); ?>
              <?php } 
// endif Conditional region1
?>
seu v&iacute;deo na Promo&ccedil;&atilde;o</span> </span></h1>
        <table width="300" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <th scope="col"><span class="comentario">cadastre seu video do YouTube e concorra ama camiseta exclusiva do site! </span></th>
          </tr>
        </table>
        <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
          <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rspromo_video > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td align="left" valign="middle" class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                  <td align="left" valign="middle"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspromo_video['nome']); ?>" size="32" maxlength="50" />
                  <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("promo_video", "nome", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                  <td align="left" valign="middle"><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspromo_video['email']); ?>" size="32" maxlength="50" />
                  <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("promo_video", "email", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="KT_th"><label for="link_<?php echo $cnt1; ?>">Link:</label></td>
                  <td align="left" valign="middle"><input type="text" name="link_<?php echo $cnt1; ?>" id="link_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspromo_video['link']); ?>" size="45" maxlength="100" />
                    <br />
                    <span class="fonte_not">http://www.youtube.com/ asaiusa8324oinks</span><br />
                  <?php echo $tNGs->displayFieldHint("link");?> <?php echo $tNGs->displayFieldError("promo_video", "link", $cnt1); ?> </td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_promo_video_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspromo_video['kt_pk_promo_video']); ?>" />
              <?php } while ($row_rspromo_video = mysql_fetch_assoc($rspromo_video)); ?>
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
                <input name="KT_Cancel1" type="button" onclick="close_window()" value="<?php echo NXT_getResource("Cancel_FB"); ?>" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></th>
  </tr>
</table>
</body>
</html>
