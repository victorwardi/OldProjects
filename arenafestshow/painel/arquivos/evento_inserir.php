<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('log.php'); ?>
<?php require_once('log.php'); ?>
<?php
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

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("capa");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("capa");
  $uploadObj->setDbFieldName("capa");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 210, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("banner");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("banner");
  $uploadObj->setDbFieldName("banner");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 605, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_evento = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_evento);
// Register triggers
$ins_evento->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_evento->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_evento->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_evento->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_evento->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_evento->setTable("evento");
$ins_evento->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_evento->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_evento->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_evento->addColumn("horario", "STRING_TYPE", "POST", "horario");
$ins_evento->addColumn("local", "STRING_TYPE", "POST", "local");
$ins_evento->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$ins_evento->addColumn("atracoes", "STRING_TYPE", "POST", "atracoes");
$ins_evento->addColumn("postosvendas", "STRING_TYPE", "POST", "postosvendas");
$ins_evento->addColumn("precos", "STRING_TYPE", "POST", "precos");
$ins_evento->addColumn("informacao", "STRING_TYPE", "POST", "informacao");
$ins_evento->addColumn("banner", "FILE_TYPE", "FILES", "banner");
$ins_evento->addColumn("capa", "FILE_TYPE", "FILES", "capa");
$ins_evento->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_evento = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_evento);
// Register triggers
$upd_evento->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_evento->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_evento->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_evento->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_evento->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_evento->setTable("evento");
$upd_evento->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_evento->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_evento->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_evento->addColumn("horario", "STRING_TYPE", "POST", "horario");
$upd_evento->addColumn("local", "STRING_TYPE", "POST", "local");
$upd_evento->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$upd_evento->addColumn("atracoes", "STRING_TYPE", "POST", "atracoes");
$upd_evento->addColumn("postosvendas", "STRING_TYPE", "POST", "postosvendas");
$upd_evento->addColumn("precos", "STRING_TYPE", "POST", "precos");
$upd_evento->addColumn("informacao", "STRING_TYPE", "POST", "informacao");
$upd_evento->addColumn("banner", "FILE_TYPE", "FILES", "banner");
$upd_evento->addColumn("capa", "FILE_TYPE", "FILES", "capa");
$upd_evento->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_evento = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_evento);
// Register triggers
$del_evento->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_evento->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_evento->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_evento->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_evento->setTable("evento");
$del_evento->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsevento = $tNGs->getRecordset("evento");
$row_rsevento = mysql_fetch_assoc($rsevento);
$totalRows_rsevento = mysql_num_rows($rsevento);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>

<!-- TinyMCE-->
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

<link href="../../css/stilo.css" rel="stylesheet" type="text/css" />
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
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFF66">
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
        <td class="txt_06"><a href="novidade_editar.php" class="txt_06">Editar/Excluir </a></td>
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
        <td class="titulo">Eventos</td>
      </tr>
      <tr>
        <td><a href="evento_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="evento_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Promo&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="promo_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="promo_editar.php">Editar/Excluir</a></td>
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
  merge_down_value: false
}
      </script>
	
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Inserir Evento </td>
        </tr>
        <tr>
          <td><div class="KT_tng">
            <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsevento > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="4" cellspacing="2" class="txt_padrao">
                      <tr>
                        <td width="124" class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                        <td width="385"><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['titulo']); ?>" size="50" maxlength="100" />
                        <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("evento", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o:</label></td>
                        <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="10"><?php echo KT_escapeAttribute($row_rsevento['descricao']); ?></textarea>
                        <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("evento", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
                        <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['data']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("evento", "data", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="horario_<?php echo $cnt1; ?>">Hor&aacute;rio:</label></td>
                        <td><input type="text" name="horario_<?php echo $cnt1; ?>" id="horario_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['horario']); ?>" size="20" maxlength="20" />
                            <?php echo $tNGs->displayFieldHint("horario");?> <?php echo $tNGs->displayFieldError("evento", "horario", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="local_<?php echo $cnt1; ?>">Local:</label></td>
                        <td><input type="text" name="local_<?php echo $cnt1; ?>" id="local_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['local']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("local");?> <?php echo $tNGs->displayFieldError("evento", "local", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="endereco_<?php echo $cnt1; ?>">Endere&ccedil;o:</label></td>
                        <td><input type="text" name="endereco_<?php echo $cnt1; ?>" id="endereco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['endereco']); ?>" size="32" maxlength="100" />
                            <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("evento", "endereco", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="atracoes_<?php echo $cnt1; ?>">Atra&ccedil;&otilde;es:</label></td>
                        <td><textarea name="atracoes_<?php echo $cnt1; ?>" id="atracoes_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsevento['atracoes']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("atracoes");?> <?php echo $tNGs->displayFieldError("evento", "atracoes", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="postosvendas_<?php echo $cnt1; ?>">Postos<br />
                        de Vendas:</label></td>
                        <td><textarea name="postosvendas_<?php echo $cnt1; ?>" id="postosvendas_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsevento['postosvendas']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("postosvendas");?> <?php echo $tNGs->displayFieldError("evento", "postosvendas", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="precos_<?php echo $cnt1; ?>">Pre&ccedil;os:</label></td>
                        <td><input type="text" name="precos_<?php echo $cnt1; ?>" id="precos_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['precos']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("precos");?> <?php echo $tNGs->displayFieldError("evento", "precos", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="informacao_<?php echo $cnt1; ?>">Informa&ccedil;&atilde;o:</label></td>
                        <td><input type="text" name="informacao_<?php echo $cnt1; ?>" id="informacao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsevento['informacao']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("informacao");?> <?php echo $tNGs->displayFieldError("evento", "informacao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="KT_th"><fieldset><legend>Upload de Arquivos</legend>
                            <table cellpadding="4" cellspacing="0" class="txt_padrao">
                              <tr>
                                <td width="146" class="KT_th"><label for="label">Banner:<br />
                                  (605 de largura) </label></td>
                                <td width="363"><input type="file" name="banner_<?php echo $cnt1; ?>" id="label" size="32" />
                                    <?php echo $tNGs->displayFieldError("evento", "banner", $cnt1); ?> </td>
                              </tr>
                              <tr>
                                <td class="KT_th"><label for="label2">Capa:<br />
                                  (200  X 120px) </label></td>
                                <td><input type="file" name="capa_<?php echo $cnt1; ?>" id="label2" size="32" />
                                    <?php echo $tNGs->displayFieldError("evento", "capa", $cnt1); ?> </td>
                              </tr>
                            </table>
                        </fieldset>
                         </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_evento_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsevento['kt_pk_evento']); ?>" />
                    <?php } while ($row_rsevento = mysql_fetch_assoc($rsevento)); ?>
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
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por: Lobster Designer" width="850" height="50" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
