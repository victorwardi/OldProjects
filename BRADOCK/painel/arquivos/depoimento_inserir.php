<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?><?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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
$ins_depoimentos = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_depoimentos);
// Register triggers
$ins_depoimentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_depoimentos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_depoimentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_depoimentos->setTable("depoimentos");
$ins_depoimentos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_depoimentos->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_depoimentos->addColumn("depoimento", "STRING_TYPE", "POST", "depoimento");
$ins_depoimentos->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado");
$ins_depoimentos->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_depoimentos = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_depoimentos);
// Register triggers
$upd_depoimentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_depoimentos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_depoimentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_depoimentos->setTable("depoimentos");
$upd_depoimentos->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_depoimentos->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_depoimentos->addColumn("depoimento", "STRING_TYPE", "POST", "depoimento");
$upd_depoimentos->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado");
$upd_depoimentos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_depoimentos = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_depoimentos);
// Register triggers
$del_depoimentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_depoimentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_depoimentos->setTable("depoimentos");
$del_depoimentos->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsdepoimentos = $tNGs->getRecordset("depoimentos");
$row_rsdepoimentos = mysql_fetch_assoc($rsdepoimentos);
$totalRows_rsdepoimentos = mysql_num_rows($rsdepoimentos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
 <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
      </script>
	  <script language="javascript" type="text/javascript" src="../../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple",
flash_external_list_url : "example_data/example_flash_list.js"
});
</script> 
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
  show_as_grid: false,
  merge_down_value: true
}
      </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Depoimento</td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsdepoimentos > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdepoimentos['nome']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("depoimentos", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
                        <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdepoimentos['cidade']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("depoimentos", "cidade", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="depoimento_<?php echo $cnt1; ?>">Depoimento:</label></td>
                        <td><textarea name="depoimento_<?php echo $cnt1; ?>" id="depoimento_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsdepoimentos['depoimento']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("depoimento");?> <?php echo $tNGs->displayFieldError("depoimentos", "depoimento", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="aprovado_<?php echo $cnt1; ?>">Aprovado:</label></td>
                        <td><label>
                          <select name="aprovado" id="aprovado">
                            <option value="nao definido" <?php if (!(strcmp("nao definido", $row_rsdepoimentos['aprovado']))) {echo "selected=\"selected\"";} ?>>- Selecione -</option>
                            <option value="sim" <?php if (!(strcmp("sim", $row_rsdepoimentos['aprovado']))) {echo "selected=\"selected\"";} ?>>Sim</option>
                            <option value="nao" <?php if (!(strcmp("nao", $row_rsdepoimentos['aprovado']))) {echo "selected=\"selected\"";} ?>>Não</option>
                          </select>
                        </label>
                          <?php echo $tNGs->displayFieldHint("aprovado");?> <?php echo $tNGs->displayFieldError("depoimentos", "aprovado", $cnt1); ?> </td></tr>
                    </table>
                    <input type="hidden" name="kt_pk_depoimentos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsdepoimentos['kt_pk_depoimentos']); ?>" />
                    <?php } while ($row_rsdepoimentos = mysql_fetch_assoc($rsdepoimentos)); ?>
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
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por Victor Caetano" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
