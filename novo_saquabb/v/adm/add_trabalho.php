<?php require_once('../../Connections/victor.php'); ?>
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
$conn_victor = new KT_connection($victor, $database_victor);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../imagens/capas/");
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
  $uploadObj->setFolder("../imagens/capas/");
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_victor, $victor);
$query_categoria = "SELECT * FROM categoria ORDER BY categoria ASC";
$categoria = mysql_query($query_categoria, $victor) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);

// Make an insert transaction instance
$ins_trabalhos = new tNG_multipleInsert($conn_victor);
$tNGs->addTransaction($ins_trabalhos);
// Register triggers
$ins_trabalhos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_trabalhos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_trabalhos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_trabalhos->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_trabalhos->setTable("trabalhos");
$ins_trabalhos->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_trabalhos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_trabalhos->addColumn("cliente", "STRING_TYPE", "POST", "cliente");
$ins_trabalhos->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_trabalhos->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_trabalhos->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_trabalhos = new tNG_multipleUpdate($conn_victor);
$tNGs->addTransaction($upd_trabalhos);
// Register triggers
$upd_trabalhos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_trabalhos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_trabalhos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_trabalhos->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_trabalhos->setTable("trabalhos");
$upd_trabalhos->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_trabalhos->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_trabalhos->addColumn("cliente", "STRING_TYPE", "POST", "cliente");
$upd_trabalhos->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_trabalhos->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_trabalhos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_trabalhos = new tNG_multipleDelete($conn_victor);
$tNGs->addTransaction($del_trabalhos);
// Register triggers
$del_trabalhos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_trabalhos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_trabalhos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_trabalhos->setTable("trabalhos");
$del_trabalhos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstrabalhos = $tNGs->getRecordset("trabalhos");
$row_rstrabalhos = mysql_fetch_assoc($rstrabalhos);
$totalRows_rstrabalhos = mysql_num_rows($rstrabalhos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
</script>
</head>

<body>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
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
          Trabalhos </h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rstrabalhos > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                  <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstrabalhos['titulo']); ?>" size="32" maxlength="100" />
                      <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("trabalhos", "titulo", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                  <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstrabalhos['descricao']); ?>" size="32" />
                      <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("trabalhos", "descricao", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="cliente_<?php echo $cnt1; ?>">Cliente:</label></td>
                  <td><input type="text" name="cliente_<?php echo $cnt1; ?>" id="cliente_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstrabalhos['cliente']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("cliente");?> <?php echo $tNGs->displayFieldError("trabalhos", "cliente", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
                  <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                      <?php echo $tNGs->displayFieldError("trabalhos", "imagem", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                  <td><label>
                    <select name="categoria" id="categoria">
                      <option value="" <?php if (!(strcmp("", $row_rstrabalhos['categoria']))) {echo "selected=\"selected\"";} ?>>- selecione -</option>
                      <?php
do {  
?>
                      <option value="<?php echo $row_categoria['categoria']?>"<?php if (!(strcmp($row_categoria['categoria'], $row_rstrabalhos['categoria']))) {echo "selected=\"selected\"";} ?>><?php echo $row_categoria['categoria']?></option>
                      <?php
} while ($row_categoria = mysql_fetch_assoc($categoria));
  $rows = mysql_num_rows($categoria);
  if($rows > 0) {
      mysql_data_seek($categoria, 0);
	  $row_categoria = mysql_fetch_assoc($categoria);
  }
?>
                    </select>
                  </label>
                    <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("trabalhos", "categoria", $cnt1); ?> </td></tr>
              </table>
              <input type="hidden" name="kt_pk_trabalhos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstrabalhos['kt_pk_trabalhos']); ?>" />
              <?php } while ($row_rstrabalhos = mysql_fetch_assoc($rstrabalhos)); ?>
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
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($categoria);
?>
