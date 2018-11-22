<?php require_once('../Connections/xpress.php'); ?>
<?php require_once('../Connections/xpress.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Make unified connection variable
$conn_xpress = new KT_connection($xpress, $database_xpress);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("nome", true, "text", "", "", "", "Escreva seu nome!");
$formValidation->addField("email", true, "text", "email", "", "", "Escreva seu email!");
$formValidation->addField("comentario", true, "text", "", "", "", "Please enter a valid value.");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_comentario = new tNG_multipleInsert($conn_xpress);
$tNGs->addTransaction($ins_comentario);
// Register triggers
$ins_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentario->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$ins_comentario->setTable("comentario");
$ins_comentario->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentario->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_comentario->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentario->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentario = new tNG_multipleUpdate($conn_xpress);
$tNGs->addTransaction($upd_comentario);
// Register triggers
$upd_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentario->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_comentario->setTable("comentario");
$upd_comentario->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentario->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_comentario->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentario->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_comentario = new tNG_multipleDelete($conn_xpress);
$tNGs->addTransaction($del_comentario);
// Register triggers
$del_comentario->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentario->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_comentario->setTable("comentario");
$del_comentario->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentario = $tNGs->getRecordset("comentario");
$row_rscomentario = mysql_fetch_assoc($rscomentario);
$totalRows_rscomentario = mysql_num_rows($rscomentario);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="author" CONTENT="Victor Caetano"/>
<META NAME="description" CONTENT="Victor Caetano - victor@saquabb.com.br"/>
<META NAME="keywords" CONTENT="sites, web, desenvolvimento, grafica, site, webdesign, cartaz, cartazes, bodyboard, saqua, saquarema, flyer, flyers, fotos, perfil, galeria, contato, fale, conosco, fotos, surf, surfe, noticias"/>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Xpressbb.com</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag --><!-- InstanceEndEditable -->
</head>

<body>
<table width="692" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="conteudo">
  <tr>
    <th scope="col"><img src="img/topo_.jpg" alt="topo" width="700" height="200" border="0" usemap="#Map" /></th>
  </tr>
  <tr>
    <th height="215" align="left" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../includes/skins/style.js" type="text/javascript"></script>
      <link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th align="left" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th align="left" valign="top" bgcolor="#585F89" class="titulo_not" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <th align="left" valign="middle" class="branco_14" scope="col">Mensagens</th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="col"><br />
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
                    Mensagem </h1>
                  <div class="KT_tngform">
                    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                      <?php $cnt1 = 0; ?>
                      <?php do { ?>
                        <?php $cnt1++; ?>
                        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentario > 1) {
?>
                          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                          <?php } 
// endif Conditional region1
?>
                        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                          <tr>
                            <td align="left" valign="top" class="fonte_menu"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                            <td align="left" valign="top" class="fonte_menu"><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentario['nome']); ?>" size="30" maxlength="30" />
                                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentario", "nome", $cnt1); ?> </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="fonte_menu"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                            <td align="left" valign="top" class="fonte_menu"><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentario['email']); ?>" size="30" maxlength="30" />
                                <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("comentario", "email", $cnt1); ?> </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="fonte_menu"><label for="comentario_<?php echo $cnt1; ?>">Mensagem:</label></td>
                            <td align="left" valign="top" class="fonte_menu"><textarea name="comentario_<?php echo $cnt1; ?>" id="comentario_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscomentario['comentario']); ?></textarea>
                                <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentario", "comentario", $cnt1); ?> </td>
                          </tr>
                        </table>
                        <input type="hidden" name="kt_pk_comentario_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentario['kt_pk_comentario']); ?>" />
                        <?php } while ($row_rscomentario = mysql_fetch_assoc($rscomentario)); ?>
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
                          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
                        </div>
                      </div>
                    </form>
                  </div>
                  <br class="clearfixplain" />
                </div>
                <p>&nbsp;</p></th>
              </tr>
            
            
            
          </table></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></th>
  </tr>
  <tr>
    <th height="35" align="left" valign="top" background="img/base.jpg" class="rodape" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="4" id="rodape">
        <tr>
          <th align="center" valign="middle" scope="col">Xpressbb.com&reg; - 2007 - Todos os direitos reservados<br />
Desenvolvido por: <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> </th>
        </tr>
    </table></th>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="7,179,62,195" href="index.php" alt="Home" />
<area shape="rect" coords="72,180,159,197" href="novidades.php" alt="Novidades" />
<area shape="rect" coords="171,179,247,195" href="pranchas.php" alt="Pranchas" />
<area shape="rect" coords="258,180,396,195" href="galeria.php" alt="Galeria de Fotos" />
<area shape="rect" coords="406,179,465,196" href="equipe.php" alt="Equipe" />
<area shape="rect" coords="476,178,607,195" href="onde.php" alt="Onde Encontrar" />
<area shape="rect" coords="620,177,690,196" href="contato.php" alt="Contato" />
</map></body>
<!-- InstanceEnd --></html>