<?php require_once('Connections/fotos.php'); ?>
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
$conn_fotos = new KT_connection($fotos, $database_fotos);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "insira seu nome!");
$formValidation->addField("mail", true, "text", "", "", "", "insira seu e-mail!");
$formValidation->addField("cidade", true, "text", "", "", "", "insira sua cidade!");
$formValidation->addField("comentario", false, "text", "", "", "", "insira seu comentário!");
$tNGs->prepareValidation($formValidation);
// End trigger

$colname_galeria = "-1";
if (isset($_GET['id'])) {
  $colname_galeria = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_galeria = sprintf("SELECT * FROM galeria WHERE id = %s", $colname_galeria);
$galeria = mysql_query($query_galeria, $fotos) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

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
$upd_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
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
<script language="javascript" type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
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

<link href="stilo.css" rel="stylesheet" type="text/css" />
<script src="includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
<!--

$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
//-->
</script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script type="text/javascript">
<!--
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}

function close_window() {
    window.close();
}
//-->
</script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
</head>

<body>
<table width="101%" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#373B3E" bgcolor="#323639">
  
  <tr>
    <th align="center" valign="middle" scope="row"><span class="titulo">&nbsp; Voc&ecirc; est&aacute; inserindo um comentario na Galeria: </span>
    <table width="37%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <th scope="col">&nbsp;<img src="<?php echo tNG_showDynamicThumbnail("", "fotos/capa/", "{galeria.imagem}", 200, 0, true); ?>" class="borda_galeria" /></th>
          </tr>
    </table>    </th>
  </tr>
  <tr>
    <th height="29" align="center" valign="middle" scope="row"><p>&nbsp;
        <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1 class="negrito">
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
if (@$totalRows_rscomentarios_not > 1) {
?>
                <h2 class="titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td align="left" valign="top" class="titulo_coment"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                  <td align="left" valign="top" class="titulo_coment"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['nome']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_not", "nome", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="titulo_coment"><label for="mail_<?php echo $cnt1; ?>">Mail:</label></td>
                  <td align="left" valign="top" class="titulo_coment"><input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['mail']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_not", "mail", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="titulo_coment"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
                  <td align="left" valign="top" class="titulo_coment"><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['cidade']); ?>" size="32" maxlength="50" />
                      <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_not", "cidade", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="titulo_coment"><label for="comentario_<?php echo $cnt1; ?>">Comentario:</label></td>
                  <td align="left" valign="top" class="titulo_coment"><textarea name="comentario_<?php echo $cnt1; ?>" cols="32" id="comentario_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rscomentarios_not['comentario']); ?></textarea>
                      <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_not", "comentario", $cnt1); ?> </td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_comentarios_not_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['kt_pk_comentarios_not']); ?>" />
              <?php } while ($row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not)); ?>
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
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="close_window()" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
      <p>&nbsp;</p>
    </p></th>
  </tr>
  <tr>
    <th height="463" align="center" valign="middle" scope="row">&nbsp;</th>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($galeria);
?>