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
$ins_pais = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_pais);
// Register triggers
$ins_pais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_pais->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_pais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_pais->setTable("pais");
$ins_pais->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_pais->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_pais = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_pais);
// Register triggers
$upd_pais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_pais->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_pais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_pais->setTable("pais");
$upd_pais->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_pais->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_pais = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_pais);
// Register triggers
$del_pais->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_pais->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_pais->setTable("pais");
$del_pais->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspais = $tNGs->getRecordset("pais");
$row_rspais = mysql_fetch_assoc($rspais);
$totalRows_rspais = mysql_num_rows($rspais);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(../../img/fundo.jpg);
	background-color: #28370E;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<link href="../../css/painel.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="750" border="1" align="center" cellpadding="1" cellspacing="4" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" background="../img/base.jpg"><img src="../img/topo.jpg" alt="Painel Administrativo" width="600" height="80" /></td>
  </tr>
  <tr>
    <td width="180" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="left" valign="middle" class="titulomenu">Menu</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Produtos</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Pa&iacute;s</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_editar.php">Editar/Excluir</a></td>
      </tr>
      
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Topo</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Lateral</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_editar.php">Editar/Excluir</a></td>
      </tr>
      

      
      <tr>
        <td align="left" valign="middle" class="titulomenu">Logout</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><a href="<?php echo $logoutAction ?>" class="link style6">Sair</a></td>
      </tr>
      
    </table></td>
    <td width="619" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
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
          <td align="left" valign="top" class="titulo">Inserir Pa&iacute;s</td>
        </tr>
        <tr>
          <td height="19" align="left" valign="top">&nbsp;
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
if (@$totalRows_rspais > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="fonte">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspais['nome']); ?>" size="45" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("pais", "nome", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_pais_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspais['kt_pk_pais']); ?>" />
                    <?php } while ($row_rspais = mysql_fetch_assoc($rspais)); ?>
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
    <td height="40" colspan="2" align="center" valign="middle" background="../img/base.jpg" bgcolor="#2B90BA"><span class="txt_branco">Painel Administrativo desenvolvido por: <span class="fonte"><span class="txt_branco"><strong>Victor Caetano</strong></span></span></span></td>
  </tr>
</table>
</body><!-- InstanceEnd -->
</html>
