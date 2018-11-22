<?php require_once('../Connections/fotos.php'); ?>
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
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "insira seu nome!");
$formValidation->addField("mail", true, "text", "", "", "", "insira seu e-mail!");
$formValidation->addField("cidade", true, "text", "", "", "", "insira sua cidade!");
$formValidation->addField("comentario", false, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

$colname_comente = "-1";
if (isset($_GET['id'])) {
  $colname_comente = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_comente = sprintf("SELECT * FROM comentarios_not WHERE id = %s ORDER BY id_coment ASC", $colname_comente);
$comente = mysql_query($query_comente, $fotos) or die(mysql_error());
$row_comente = mysql_fetch_assoc($comente);
$totalRows_comente = mysql_num_rows($comente);

// Make an insert transaction instance
$ins_comentarios_not = new tNG_multipleInsert($conn_fotos);
$tNGs->addTransaction($ins_comentarios_not);
// Register triggers
$ins_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$ins_comentarios_not->setTable("comentarios_not");
$ins_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios_not->addColumn("id", "NUMERIC_TYPE", "GET", "id");
$ins_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios_not = new tNG_multipleUpdate($conn_fotos);
$tNGs->addTransaction($upd_comentarios_not);
// Register triggers
$upd_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_comentarios_not->setTable("comentarios_not");
$upd_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios_not = new tNG_multipleDelete($conn_fotos);
$tNGs->addTransaction($del_comentarios_not);
// Register triggers
$del_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
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
</style>
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

<link href="stilo.css" rel="stylesheet" type="text/css" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="row"><span class="titulo">&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      </span>
      <div class="KT_tng">
        <h1 class="titulo">
          <?php 
// Show IF Conditional region1 
if (@$_GET['id_coment'] == "") {
?>
              <span class="titulo"><?php echo NXT_getResource("Insert_FH"); ?>
              <?php 
// else Conditional region1
} else { ?>
              <?php echo NXT_getResource("Update_FH"); ?>
              <?php } 
// endif Conditional region1
?>
Coment&aacute;rio </span></h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                <span class="titulo">
                <?php $cnt1 = 0; ?>
              <?php do { ?>
              <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentarios_not > 1) {
?>
                  </MM:DECORATION></MM_HIDDENREGION>
                </MM:DECORATION></MM_REPEATEDREGION>
                </span>
            <MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=2><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If%20(@$totalRows_rscomentarios_not%20%3E%201)" OUTLINEID=3><h2 class="titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="titulo">
                    <label for="nome_<?php echo $cnt1; ?>">Nome:</label>
                  </td>
                  <td align="left" valign="top" class="titulo">
                    <input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['nome']); ?>" size="40" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_not", "nome", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="titulo">
                    <label for="mail_<?php echo $cnt1; ?>">E-mail:</label>
                  </td>
                  <td align="left" valign="top" class="titulo">
                    <input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['mail']); ?>" size="40" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_not", "mail", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="titulo">
                    <label for="cidade_<?php echo $cnt1; ?>">Cidade:</label>
                  </td>
                  <td align="left" valign="top" class="titulo">
                    <input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['cidade']); ?>" size="40" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_not", "cidade", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="titulo">
                    <label for="comentario_<?php echo $cnt1; ?>">Comentario:</label>
                  </td>
                  <td align="left" valign="top" class="titulo">
                    <textarea name="comentario_<?php echo $cnt1; ?>" id="comentario_<?php echo $cnt1; ?>" cols="35" rows="5"><?php echo KT_escapeAttribute($row_rscomentarios_not['comentario']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_not", "comentario", $cnt1); ?> </td>
                </tr>
              </table>
              <span class="titulo">
              <input type="hidden" name="kt_pk_comentarios_not_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['kt_pk_comentarios_not']); ?>" />
              <?php } while ($row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not)); ?>
            </span>
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
    <p>&nbsp;</p></th>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($comente);
?>
