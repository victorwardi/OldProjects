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
$formValidation->addField("nome", true, "text", "", "", "", "insira seu nome!");
$formValidation->addField("mail", true, "text", "", "", "", "insira seu e-mail!");
$formValidation->addField("cidade", true, "text", "", "", "", "insira sua cidade!");
$formValidation->addField("comentario", true, "text", "", "", "", "insira seu comentário!");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_comentarios = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_comentarios);
// Register triggers
$ins_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
// Add columns
$ins_comentarios->setTable("comentarios");
$ins_comentarios->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_comentarios);
// Register triggers
$upd_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_comentarios->setTable("comentarios");
$upd_comentarios->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_comentarios = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_comentarios);
// Register triggers
$del_comentarios->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_comentarios->setTable("comentarios");
$del_comentarios->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

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
<title>Solte o Verbo!</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;

}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;	
}
-->
</style>
<link href="../painel/css.css" rel="stylesheet" type="text/css" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
<!--
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}

function close_window() {
    window.close();
}
//-->
</script>

<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="300" border="0" align="left" cellpadding="0" cellspacing="2">
  <tr>
    <td height="24"><img src="topo.jpg" alt="solte o verbo!" width="350" height="60" /></td>
  </tr>
  <tr>
    <td align="left" valign="top">Esse espa&ccedil;o &eacute; para voc&ecirc; deixar suas cr&iacute;ticas e sugest&otilde;es para o site! <br />
<br />
*preencher todos os campos!<br /> 
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng"><h1 class="fonte_negrito"><?php 
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
    Coment&aacute;rio</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
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
            <td align="left" valign="top" class="fonte_excluir"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td align="left" valign="top"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios['nome']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="fonte_excluir"><label for="mail_<?php echo $cnt1; ?>">E-mail:</label></td>
            <td align="left" valign="top"><input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios['mail']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios", "mail", $cnt1); ?> </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="fonte_excluir"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
            <td align="left" valign="top"><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios['cidade']); ?>" size="32" maxlength="50" />
                <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios", "cidade", $cnt1); ?> </td>
          </tr>
          <tr>
            <td align="left" valign="top" class="fonte_excluir"><label for="comentario_<?php echo $cnt1; ?>">Comentário:</label></td>
            <td align="left" valign="top"><textarea name="comentario_<?php echo $cnt1; ?>" id="comentario_<?php echo $cnt1; ?>" cols="25" rows="5"><?php echo KT_escapeAttribute($row_rscomentarios['comentario']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios", "comentario", $cnt1); ?> </td>
          </tr>
        </table>
        <br />
        <input type="hidden" name="kt_pk_comentarios_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios['kt_pk_comentarios']); ?>" />
        <?php } while ($row_rscomentarios = mysql_fetch_assoc($rscomentarios)); ?>
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
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>"  onclick="close_window()" />
        </div>
      </div>
    </form>
  </div>
  </div>
</td>
  </tr>
  <tr>
    <td height="18" bgcolor="#2A300E"><p align="center" class="style1"><br />
      Desenvolvido por Victor Caetano </p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>