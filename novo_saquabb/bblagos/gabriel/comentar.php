<?php require_once('../../Connections/saquabb.php'); ?>
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Insira seu nome");
$formValidation->addField("mail", true, "text", "", "", "", "Insira seu e-mail");
$formValidation->addField("cidade", true, "text", "", "", "", "Insira sua cidade");
$formValidation->addField("comentario", true, "text", "", "", "", "Insira seu comentário");
$tNGs->prepareValidation($formValidation);
// End trigger

$colname_artigo = "-1";
if (isset($_GET['id'])) {
  $colname_artigo = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_artigo = sprintf("SELECT * FROM gabriel WHERE id = %s", $colname_artigo);
$artigo = mysql_query($query_artigo, $saquabb) or die(mysql_error());
$row_artigo = mysql_fetch_assoc($artigo);
$totalRows_artigo = mysql_num_rows($artigo);

// Make an insert transaction instance
$ins_comentarios_gf = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_comentarios_gf);
// Register triggers
$ins_comentarios_gf->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios_gf->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios_gf->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$ins_comentarios_gf->setTable("comentarios_gf");
$ins_comentarios_gf->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios_gf->addColumn("id", "NUMERIC_TYPE", "GET", "id");
$ins_comentarios_gf->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios_gf->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios_gf->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios_gf->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios_gf = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_comentarios_gf);
// Register triggers
$upd_comentarios_gf->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios_gf->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios_gf->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_comentarios_gf->setTable("comentarios_gf");
$upd_comentarios_gf->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios_gf->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios_gf->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios_gf->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios_gf->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios_gf = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_comentarios_gf);
// Register triggers
$del_comentarios_gf->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios_gf->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_comentarios_gf->setTable("comentarios_gf");
$del_comentarios_gf->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentarios_gf = $tNGs->getRecordset("comentarios_gf");
$row_rscomentarios_gf = mysql_fetch_assoc($rscomentarios_gf);
$totalRows_rscomentarios_gf = mysql_num_rows($rscomentarios_gf);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inserir coment&aacute;rio</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	color: #FFFFFF;
}
.tituloCopy {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bolder;
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="4" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
<th align="left" bgcolor="#017C9E" scope="col"><?php 
// Show IF Conditional region1 
if (@$_GET['id_coment'] == "") {
?>
              <span class="tituloCopy"><span class="tituloCopy"><span class="comentario"><?php echo NXT_getResource("Insert_FH"); ?>
              <?php 
// else Conditional region1
} else { ?>
              <?php echo NXT_getResource("Update_FH"); ?>
              <?php } 
// endif Conditional region1
?>
Coment&aacute;rio</span></span> <br />
<div class="KT_tng">
<div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                <span class="comentario">
                <?php $cnt1 = 0; ?>
              <?php do { ?>
              <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentarios_gf > 1) {
?>
              </MM:DECORATION></MM_HIDDENREGION>
                </MM:DECORATION></MM_REPEATEDREGION>
                </span>
            <MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=2><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If%20(@$totalRows_rscomentarios_gf%20%3E%201)" OUTLINEID=3><h2 class="comentario"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="titulo">
                <tr>
                  <td align="left" valign="top" class="comentario">
                    <label for="nome_<?php echo $cnt1; ?>">Nome:</label>                  </td>
                  <td align="left" valign="top" class="comentario">
                    <input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_gf['nome']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_gf", "nome", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="comentario">
                    <label for="mail_<?php echo $cnt1; ?>">E-Mail:</label>                  </td>
                  <td align="left" valign="top" class="comentario">
                    <input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_gf['mail']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_gf", "mail", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="comentario">
                    <label for="cidade_<?php echo $cnt1; ?>">Cidade:</label>                  </td>
                  <td align="left" valign="top" class="comentario">
                    <input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_gf['cidade']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_gf", "cidade", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="comentario">
                    <label for="comentario_<?php echo $cnt1; ?>">Comentario:</label>                  </td>
                  <td align="left" valign="top" class="comentario">
                    <textarea name="comentario_<?php echo $cnt1; ?>" cols="32" rows="5" id="comentario_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rscomentarios_gf['comentario']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_gf", "comentario", $cnt1); ?> </td>
                </tr>
              </table>
              <p class="tituloCopy"><br />
                  <span class="titulo">* campos requeridos</span> <br />
                <br />
                <span class="comentario">
                <input type="hidden" name="kt_pk_comentarios_gf_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_gf['kt_pk_comentarios_gf']); ?>" />
              </p>
              <?php } while ($row_rscomentarios_gf = mysql_fetch_assoc($rscomentarios_gf)); ?>
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
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="close_window()" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></th>
  </tr>
</table>
<?php
	echo $tNGs->getErrorMsg();
?></body>
</html>
<?php
mysql_free_result($artigo);
?>