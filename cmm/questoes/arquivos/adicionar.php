<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('login.php'); ?>
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
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_questoes = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_questoes);
// Register triggers
$ins_questoes->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_questoes->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_questoes->registerTrigger("END", "Trigger_Default_Redirect", 99, "ver.php?questaoID={questaoID}&status={status}");
// Add columns
$ins_questoes->setTable("questoes");
$ins_questoes->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_questoes->addColumn("de", "STRING_TYPE", "POST", "de");
$ins_questoes->addColumn("para", "STRING_TYPE", "POST", "para");
$ins_questoes->addColumn("status", "STRING_TYPE", "POST", "status");
$ins_questoes->addColumn("discussao", "STRING_TYPE", "POST", "discussao");
$ins_questoes->setPrimaryKey("questaoID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_questoes = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_questoes);
// Register triggers
$upd_questoes->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_questoes->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_questoes->registerTrigger("END", "Trigger_Default_Redirect", 99, "ver.php?questaoID={questaoID}&status={status}");
// Add columns
$upd_questoes->setTable("questoes");
$upd_questoes->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_questoes->addColumn("de", "STRING_TYPE", "POST", "de");
$upd_questoes->addColumn("para", "STRING_TYPE", "POST", "para");
$upd_questoes->addColumn("status", "STRING_TYPE", "POST", "status");
$upd_questoes->addColumn("discussao", "STRING_TYPE", "POST", "discussao");
$upd_questoes->setPrimaryKey("questaoID", "NUMERIC_TYPE", "GET", "questaoID");

// Make an instance of the transaction object
$del_questoes = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_questoes);
// Register triggers
$del_questoes->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_questoes->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
$del_questoes->setTable("questoes");
$del_questoes->setPrimaryKey("questaoID", "NUMERIC_TYPE", "GET", "questaoID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsquestoes = $tNGs->getRecordset("questoes");
$row_rsquestoes = mysql_fetch_assoc($rsquestoes);
$totalRows_rsquestoes = mysql_num_rows($rsquestoes);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gerenciamento de Questões</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
  <script language="javascript" type="text/javascript" src="../../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple"
});
</script> 

<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 12px;
}
body {
	background-color: #096FB7;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #666666;
}
a:active {
	text-decoration: none;
	color: #000000;
}
h1 {
	font-size: 16px;
	color: #FFFFFF;
}
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
}
.seta {
	font-size: 14px;
	font-weight: bold;
	color: #FF3300;
}
.statusVazio {
	font-size: 9px;
}
.questoes {
	font-size: 10px;
}
.para {
	font-size: 10px;
	font-weight: bold;
	color: #FF3300;
}
.Titulo {
	font-size: 16px;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td height="94" colspan="2" bgcolor="#FF9900"><img src="topo.jpg" alt="Sistema de Gerenciamento de Questões" width="800" height="120" /></td>
  </tr>
  <tr>
    <td width="28%" height="120" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="2" bgcolor="#FFFFFF">
      <tr>
        <td align="left" bgcolor="#FF9900" class="Titulo">Questões</td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo; </span><a href="adicionar.php">Adicionar Nova</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"> <span class="seta">&raquo;</span> <a href="listar.php?status=1">Ativas</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="listar.php?status=2">Em Andamento</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="listar.php?status=3">Concluídas</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
    </table></td>
    <td width="72%" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
      <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
      <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
      <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
        </script>
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td align="left" bgcolor="#FF9900" class="Titulo">Questão - <?php 
// Show IF Conditional region1 
if (@$_GET['questaoID'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?></td>
        </tr>
        <tr>
          <td align="left">
                <div class="KT_tng">
                <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <table width="100%" cellpadding="4" cellspacing="2" bgcolor="#FFFFFF" class="questoes">
                      <tr>
                        <td width="150" align="left" valign="middle" bgcolor="#FFCC99" class="para"><label for="titulo_<?php echo $cnt1; ?>">Título</label></td>
                        <td width="519" align="left" valign="top" bgcolor="#FBE6C8"><input name="titulo_<?php echo $cnt1; ?>" type="text" class="questoes" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsquestoes['titulo']); ?>" size="60" maxlength="255" />
                          <span class="para">*</span>                           <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("questoes", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFCC99" class="para"><label for="de_<?php echo $cnt1; ?>">Criada por</label></td>
                        <td align="left" valign="top" bgcolor="#FBE6C8"><select name="de_<?php echo $cnt1; ?>" class="questoes" id="de_<?php echo $cnt1; ?>">
                            <option value="Ningu&eacute;m" <?php if (!(strcmp("Ninguém", KT_escapeAttribute($row_rsquestoes['de'])))) {echo "SELECTED";} ?>>- Selecione -</option>
                            <option value="Victor" <?php if (!(strcmp("Victor", KT_escapeAttribute($row_rsquestoes['de'])))) {echo "SELECTED";} ?>>Victor</option>
                            <option value="Fl&aacute;via" <?php if (!(strcmp("Flávia", KT_escapeAttribute($row_rsquestoes['de'])))) {echo "SELECTED";} ?>>Flávia</option>
                            <option value="Igor" <?php if (!(strcmp("Igor", KT_escapeAttribute($row_rsquestoes['de'])))) {echo "SELECTED";} ?>>Igor</option>
                          </select>
                            <span class="para">*</span><?php echo $tNGs->displayFieldError("questoes", "de", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFCC99" class="para"><label for="para_<?php echo $cnt1; ?>">Atribuído à</label></td>
                        <td align="left" valign="top" bgcolor="#FBE6C8"><select name="para_<?php echo $cnt1; ?>" class="questoes" id="para_<?php echo $cnt1; ?>">
                            <option value="Ningu&eacute;m" <?php if (!(strcmp("Ninguém", KT_escapeAttribute($row_rsquestoes['para'])))) {echo "SELECTED";} ?>> - Selecione -</option>
                            <option value="Victor" <?php if (!(strcmp("Victor", KT_escapeAttribute($row_rsquestoes['para'])))) {echo "SELECTED";} ?>>Victor</option>
                            <option value="Fl&aacute;via" <?php if (!(strcmp("Flávia", KT_escapeAttribute($row_rsquestoes['para'])))) {echo "SELECTED";} ?>>Flávia</option>
                            <option value="Igor" <?php if (!(strcmp("Igor", KT_escapeAttribute($row_rsquestoes['para'])))) {echo "SELECTED";} ?>>Igor</option>
                          </select>
                          <span class="para">*</span>                            <?php echo $tNGs->displayFieldError("questoes", "para", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFCC99" class="para"><label for="status_<?php echo $cnt1; ?>">Status</label></td>
                        <td align="left" valign="top" bgcolor="#FBE6C8"><select name="status_<?php echo $cnt1; ?>" class="questoes" id="status_<?php echo $cnt1; ?>">
                            <option value="1" <?php if (!(strcmp(1, KT_escapeAttribute($row_rsquestoes['status'])))) {echo "selected=\"selected\"";} ?>>Ativas</option>
                            <option value="2" <?php if (!(strcmp(2, KT_escapeAttribute($row_rsquestoes['status'])))) {echo "selected=\"selected\"";} ?>>Em Andamento</option>
                            <option value="3" <?php if (!(strcmp(3, KT_escapeAttribute($row_rsquestoes['status'])))) {echo "selected=\"selected\"";} ?>>Concluída</option>
                          </select>
                            <span class="para">*</span><?php echo $tNGs->displayFieldError("questoes", "status", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFCC99" class="para"><label for="discussao_<?php echo $cnt1; ?>">Discussão</label></td>
                        <td align="left" valign="top" bgcolor="#FBE6C8"><textarea name="discussao_<?php echo $cnt1; ?>" cols="60" rows="8" class="questoes" id="discussao_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsquestoes['discussao']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("discussao");?> <?php echo $tNGs->displayFieldError("questoes", "discussao", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_questoes_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsquestoes['kt_pk_questoes']); ?>" /> 
                    <span class="para">*</span><span class="questoes">Campos obrigatórios.</span><br />
                    <br />
                    <?php } while ($row_rsquestoes = mysql_fetch_assoc($rsquestoes)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['questaoID'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick=" nxt_form_insertasnew(this, 'questaoID'); "  />
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
      </table>
      <?php
	echo $tNGs->getErrorMsg();
?><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#FF9900"><img src="base.jpg" width="800" height="40" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
