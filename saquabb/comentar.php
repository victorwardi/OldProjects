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
$formValidation->addField("nome", true, "text", "", "", "", "insira seu nome!");
$formValidation->addField("mail", true, "text", "", "", "", "insira seu e-mail!");
$formValidation->addField("cidade", true, "text", "", "", "", "insira sua cidade!");
$tNGs->prepareValidation($formValidation);
// End trigger

$colname_coment = "-1";
if (isset($_GET['id'])) {
  $colname_coment = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_coment = sprintf("SELECT * FROM comentarios_not WHERE id = %s ORDER BY id_coment ASC", $colname_coment);
$coment = mysql_query($query_coment, $saquabb) or die(mysql_error());
$row_coment = mysql_fetch_assoc($coment);
$totalRows_coment = mysql_num_rows($coment);

$colname_not = "-1";
if (isset($_GET['id'])) {
  $colname_not = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_not = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id ASC", $colname_not);
$not = mysql_query($query_not, $saquabb) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);
$totalRows_not = mysql_num_rows($not);

// Make an insert transaction instance
$ins_comentarios_not = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_comentarios_not);
// Register triggers
$ins_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$ins_comentarios_not->setTable("comentarios_not");
$ins_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios_not->addColumn("id", "NUMERIC_TYPE", "GET", "id");
$ins_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios_not = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_comentarios_not);
// Register triggers
$upd_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_comentarios_not->setTable("comentarios_not");
$upd_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios_not->addColumn("id", "NUMERIC_TYPE", "POST", "id");
$upd_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios_not = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_comentarios_not);
// Register triggers
$del_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_comentarios_not->setTable("comentarios_not");
$del_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentarios_not = $tNGs->getRecordset("comentarios_not");
$row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not);
$totalRows_rscomentarios_not = mysql_num_rows($rscomentarios_not);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fa&ccedil;a seu Coment&aacute;rio!</title>
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
<script language="javascript" type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	plugins : "emotions",
	
	theme_advanced_buttons3_add : "emotions,",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="painel/css.css" rel="stylesheet" type="text/css" />
<link href="painel/arquivos/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #ffffff;
	background-image: url(imagens/destaque.jpg);
	background-repeat: no-repeat;
	background-position: right bottom;
}
-->
</style></head>

<body>
<div align="center">
  <img src="imagens/solteoverbo.jpg" alt="topo" width="420" height="50" /><br />
  <?php
	echo $tNGs->getErrorMsg();
?>
  <br />
  <br />
</div>
<div class="KT_tng">
  <h1 align="center"><span class="tiutlo_not">    Voc&ecirc; est&aacute; inserindo um coment&aacute;rio na not&iacute;cia:</span><br />
  <span class="resultado_estatistica"><?php echo $row_not['titulo']; ?></span></h1><div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <div align="center">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td align="left" valign="top" class="fonte_colunas"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
              <td align="left" valign="top" class="fonte_colunas"><input name="nome_<?php echo $cnt1; ?>" type="text" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['nome']); ?>" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_not", "nome", $cnt1); ?> </td>
            </tr>
            <tr>
              <td align="left" valign="top" class="fonte_colunas"><label for="mail_<?php echo $cnt1; ?>">E-Mail:</label></td>
              <td align="left" valign="top" class="fonte_colunas"><input name="mail_<?php echo $cnt1; ?>" type="text" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['mail']); ?>" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_not", "mail", $cnt1); ?> </td>
            </tr>
            <tr>
              <td align="left" valign="top" class="fonte_colunas"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
              <td align="left" valign="top" class="fonte_colunas"><input name="cidade_<?php echo $cnt1; ?>" type="text" class="minute" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['cidade']); ?>" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_not", "cidade", $cnt1); ?> </td>
            </tr>
            <tr>
              <td align="left" valign="top" class="fonte_colunas"><label for="comentario_<?php echo $cnt1; ?>">Comentario:</label></td>
              <td align="left" valign="top" class="fonte_colunas"><textarea name="comentario_<?php echo $cnt1; ?>" cols="50" rows="5" class="box" id="comentario_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rscomentarios_not['comentario']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_not", "comentario", $cnt1); ?> </td>
            </tr>
          </table>
          <br />
          <input type="hidden" name="kt_pk_comentarios_not_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['kt_pk_comentarios_not']); ?>" />
          <?php } while ($row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not)); ?>
      </div>
      <div class="KT_bottombuttons">
        <div>
          <div align="center">
            <?php 
      // Show IF Conditional region1
      if (@$_GET['id_coment'] == "") {
      ?>
              <input name="KT_Insert1" type="submit" class="box_confirma" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
          </div>
            <div class="KT_operations">
              <div align="center">
                <input name="KT_Insert1" type="submit" class="box_confirma" onclick="nxt_form_insertasnew(this, 'id_coment')" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" />
              </div>
            </div>
            <div align="center">
              <input name="KT_Update1" type="submit" class="box_confirma" value="<?php echo NXT_getResource("Update_FB"); ?>" />
              <input name="KT_Delete1" type="submit" class="box_confirma" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" value="<?php echo NXT_getResource("Delete_FB"); ?>" />
              <?php }
      // endif Conditional region1
      ?>
            <input name="KT_Cancel1" type="button" class="box_confirma" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" value="<?php echo NXT_getResource("Cancel_FB"); ?>" />
            </div>
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($coment);

mysql_free_result($not);
?>
