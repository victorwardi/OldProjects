<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
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
$ins_poller_option = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_poller_option);
// Register triggers
$ins_poller_option->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_poller_option->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_poller_option->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_poller_option->setTable("poller_option");
$ins_poller_option->addColumn("optionText", "STRING_TYPE", "POST", "optionText");
$ins_poller_option->addColumn("pollerOrder", "NUMERIC_TYPE", "POST", "pollerOrder");
$ins_poller_option->addColumn("defaultChecked", "CHECKBOX_1_0_TYPE", "POST", "defaultChecked", "0");
$ins_poller_option->setPrimaryKey("ID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_poller_option = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_poller_option);
// Register triggers
$upd_poller_option->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_poller_option->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_poller_option->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_poller_option->setTable("poller_option");
$upd_poller_option->addColumn("optionText", "STRING_TYPE", "POST", "optionText");
$upd_poller_option->addColumn("pollerOrder", "NUMERIC_TYPE", "POST", "pollerOrder");
$upd_poller_option->addColumn("defaultChecked", "CHECKBOX_1_0_TYPE", "POST", "defaultChecked");
$upd_poller_option->setPrimaryKey("ID", "NUMERIC_TYPE", "GET", "ID");

// Make an instance of the transaction object
$del_poller_option = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_poller_option);
// Register triggers
$del_poller_option->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_poller_option->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_poller_option->setTable("poller_option");
$del_poller_option->setPrimaryKey("ID", "NUMERIC_TYPE", "GET", "ID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspoller_option = $tNGs->getRecordset("poller_option");
$row_rspoller_option = mysql_fetch_assoc($rspoller_option);
$totalRows_rspoller_option = mysql_num_rows($rspoller_option);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
	color: #75CCF0;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg.jpg);
	background-color: #60BFF9;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#C0DCFA">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Conte&uacute;do</td>
      </tr>
      <tr>
        <td><a href="conteudo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="conteudo_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Depoimentos</td>
      </tr>
      <tr>
        <td><a href="depoimento_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="depoimento_editar.php">Aprovar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Enquete</td>
      </tr>
      <tr>
        <td><a href="enquete_titulo_add.php?ID=1">Editar titulo da Enquete </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_inserir.php">Inserir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td><a href="enquete_opcoes_editar.php">Editar/Excluir Op&ccedil;&otilde;es </a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
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
  merge_down_value: true
}
      </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo"><p>Inserir Op&ccedil;&otilde;es na Enquete </p>
          </td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rspoller_option > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="2" class="txt_08">
                      <tr>
                        <td class="txt_06"><label for="optionText_<?php echo $cnt1; ?>">Titulo</label></td>
                        <td class="txt_06"><input type="text" name="optionText_<?php echo $cnt1; ?>" id="optionText_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspoller_option['optionText']); ?>" size="32" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("optionText");?> <?php echo $tNGs->displayFieldError("poller_option", "optionText", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="txt_06"><label for="pollerOrder_<?php echo $cnt1; ?>">Ordem na Enquete </label></td>
                        <td class="txt_06"><input type="text" name="pollerOrder_<?php echo $cnt1; ?>" id="pollerOrder_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspoller_option['pollerOrder']); ?>" size="7" />
                        <?php echo $tNGs->displayFieldHint("pollerOrder");?> <?php echo $tNGs->displayFieldError("poller_option", "pollerOrder", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="txt_06"><label for="defaultChecked_<?php echo $cnt1; ?>">Marcado:</label></td>
                        <td class="txt_06"><input  <?php if (!(strcmp(KT_escapeAttribute($row_rspoller_option['defaultChecked']),"1"))) {echo "checked";} ?> type="checkbox" name="defaultChecked_<?php echo $cnt1; ?>" id="defaultChecked_<?php echo $cnt1; ?>" value="1" />
                        <?php echo $tNGs->displayFieldError("poller_option", "defaultChecked", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_poller_option_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspoller_option['kt_pk_poller_option']); ?>" />
                    <?php } while ($row_rspoller_option = mysql_fetch_assoc($rspoller_option)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['ID'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID')" />
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
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por Victor Caetano" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
