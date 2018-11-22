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

//start CheckCaptcha trigger
//remove this line if you want to edit the code by hand
function CheckCaptcha(&$tNG) {
	$captcha = new tNG_Captcha("captcha_id_id", $tNG);
	$captcha->setFormField("POST", "captcha_id");
	$captcha->setErrorMsg("Voce digitou errado, tente novamente!");
	return $captcha->Execute();
}
//end CheckCaptcha trigger

// Make an insert transaction instance
$ins_produtos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_produtos);
// Register triggers
$ins_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$ins_produtos->registerTrigger("BEFORE", "CheckCaptcha", 10);
// Add columns
$ins_produtos->setTable("produtos");
$ins_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_produtos->addColumn("pais", "STRING_TYPE", "POST", "pais");
$ins_produtos->addColumn("produtor", "STRING_TYPE", "POST", "produtor");
$ins_produtos->addColumn("valor", "STRING_TYPE", "POST", "valor");
$ins_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_produtos->addColumn("foto", "NUMERIC_TYPE", "POST", "foto");
$ins_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$ins_produtos->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_produtos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_produtos);
// Register triggers
$upd_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_produtos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
$upd_produtos->registerTrigger("BEFORE", "CheckCaptcha", 10);
// Add columns
$upd_produtos->setTable("produtos");
$upd_produtos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_produtos->addColumn("pais", "STRING_TYPE", "POST", "pais");
$upd_produtos->addColumn("produtor", "STRING_TYPE", "POST", "produtor");
$upd_produtos->addColumn("valor", "STRING_TYPE", "POST", "valor");
$upd_produtos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_produtos->addColumn("foto", "NUMERIC_TYPE", "POST", "foto");
$upd_produtos->addColumn("promocao", "STRING_TYPE", "POST", "promocao");
$upd_produtos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_produtos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_produtos);
// Register triggers
$del_produtos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_produtos->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_produtos->setTable("produtos");
$del_produtos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsprodutos = $tNGs->getRecordset("produtos");
$row_rsprodutos = mysql_fetch_assoc($rsprodutos);
$totalRows_rsprodutos = mysql_num_rows($rsprodutos);

// Captcha Image
$captcha_id_obj = new KT_CaptchaImage("captcha_id_id");
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
    Produtos </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsprodutos > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['nome']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("produtos", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="pais_<?php echo $cnt1; ?>">Pais:</label></td>
            <td><input type="text" name="pais_<?php echo $cnt1; ?>" id="pais_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['pais']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("pais");?> <?php echo $tNGs->displayFieldError("produtos", "pais", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="produtor_<?php echo $cnt1; ?>">Produtor:</label></td>
            <td><input type="text" name="produtor_<?php echo $cnt1; ?>" id="produtor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['produtor']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("produtor");?> <?php echo $tNGs->displayFieldError("produtos", "produtor", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="valor_<?php echo $cnt1; ?>">Valor:</label></td>
            <td><input type="text" name="valor_<?php echo $cnt1; ?>" id="valor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['valor']); ?>" size="20" maxlength="20" />
                <?php echo $tNGs->displayFieldHint("valor");?> <?php echo $tNGs->displayFieldError("produtos", "valor", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
            <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsprodutos['descricao']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("produtos", "descricao", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
            <td><input type="text" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsprodutos['foto']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("foto");?> <?php echo $tNGs->displayFieldError("produtos", "foto", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="promocao_<?php echo $cnt1; ?>">Promoção:</label></td>
            <td><select name="promocao_<?php echo $cnt1; ?>" id="promocao_<?php echo $cnt1; ?>">
              <option value="sim" <?php if (!(strcmp("sim", KT_escapeAttribute($row_rsprodutos['promocao'])))) {echo "SELECTED";} ?>>Sim</option>
              <option value="nao" <?php if (!(strcmp("nao", KT_escapeAttribute($row_rsprodutos['promocao'])))) {echo "SELECTED";} ?>>Não</option>
            </select>
              <?php echo $tNGs->displayFieldError("produtos", "promocao", $cnt1); ?>
              <br />
              <br />
              <br />
              <input type="text" name="captcha_id" id="captcha_id" value="" />
                <br /><br />

Type the characters you see in the picture below.<br />
<img src="<?php echo $captcha_id_obj->getImageURL("");?>" border="1" /></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_produtos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsprodutos['kt_pk_produtos']); ?>" />
        <?php } while ($row_rsprodutos = mysql_fetch_assoc($rsprodutos)); ?>
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
