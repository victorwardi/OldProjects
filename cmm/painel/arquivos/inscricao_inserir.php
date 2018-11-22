<?php require_once('../../Connections/ConBD.php'); ?><?php
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
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("pdf");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("pdf");
  $uploadObj->setDbFieldName("pdf");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setMaxSize(16000);
  $uploadObj->setAllowedExtensions("pdf, txt, wmv, avi, mpg, mpeg");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_inscricao = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_inscricao);
// Register triggers
$ins_inscricao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_inscricao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_inscricao->registerTrigger("END", "Trigger_Default_Redirect", 99, "inscricao_editar.php");
$ins_inscricao->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_inscricao->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$ins_inscricao->setTable("inscricao");
$ins_inscricao->addColumn("numero", "STRING_TYPE", "POST", "numero");
$ins_inscricao->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_inscricao->addColumn("justificativa", "STRING_TYPE", "POST", "justificativa");
$ins_inscricao->addColumn("dataIndicacao", "STRING_TYPE", "POST", "dataIndicacao");
$ins_inscricao->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_inscricao->addColumn("autor", "STRING_TYPE", "POST", "autor");
$ins_inscricao->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_inscricao->addColumn("pdf", "FILE_TYPE", "FILES", "pdf");
$ins_inscricao->setPrimaryKey("inscricaoID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_inscricao = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_inscricao);
// Register triggers
$upd_inscricao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_inscricao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_inscricao->registerTrigger("END", "Trigger_Default_Redirect", 99, "inscricao_editar.php");
$upd_inscricao->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_inscricao->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$upd_inscricao->setTable("inscricao");
$upd_inscricao->addColumn("numero", "STRING_TYPE", "POST", "numero");
$upd_inscricao->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_inscricao->addColumn("justificativa", "STRING_TYPE", "POST", "justificativa");
$upd_inscricao->addColumn("dataIndicacao", "STRING_TYPE", "POST", "dataIndicacao");
$upd_inscricao->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_inscricao->addColumn("autor", "STRING_TYPE", "POST", "autor");
$upd_inscricao->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_inscricao->addColumn("pdf", "FILE_TYPE", "FILES", "pdf");
$upd_inscricao->setPrimaryKey("inscricaoID", "NUMERIC_TYPE", "GET", "inscricaoID");

// Make an instance of the transaction object
$del_inscricao = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_inscricao);
// Register triggers
$del_inscricao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_inscricao->registerTrigger("END", "Trigger_Default_Redirect", 99, "inscricao_editar.php");
$del_inscricao->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_inscricao->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_inscricao->setTable("inscricao");
$del_inscricao->setPrimaryKey("inscricaoID", "NUMERIC_TYPE", "GET", "inscricaoID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsinscricao = $tNGs->getRecordset("inscricao");
$row_rsinscricao = mysql_fetch_assoc($rsinscricao);
$totalRows_rsinscricao = mysql_num_rows($rsinscricao);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<script language="javascript" type="text/javascript" src="../../Scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple"
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
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #666666;
}
body {
	background-color: #ECEFF4;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" bgcolor="#657D99"><table width="100%" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td width="5%" height="87"><a href="../../index.php"><img src="../../img/logo_02.jpg" width="73" height="79" border="0" /></a></td>
        <td width="95%" align="right"><img src="TOPO.jpg" width="650" height="79" /></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FEDDA5"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#657D99"><img src="../../img/titulo_menu_01.gif" width="62" height="12" class="titulo" /></td>
      </tr>
      <tr>
        <td bgcolor="#FEDDA5">&nbsp;</td>
      </tr>
      <tr>
        <td class="titulo">Not&iacute;cias</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="noticia_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="noticia_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos</td>
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
        <td class="titulo">Galeria Conhe&ccedil;a a C&acirc;mara</td>
      </tr>
      <tr>
        <td><a href="camara_inserir.php">Inserir Foto</a></td>
      </tr>
      <tr>
        <td><a href="camara_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td class="titulo">Lei</td>
      </tr>
      <tr>
        <td><a href="lei_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="lei_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Indica&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="inscricao_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="inscricao_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Licita&ccedil;&atilde;o</td>
      </tr>
      <tr>
        <td><a href="licitacao_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="licitacao_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Vereador</td>
      </tr>
      <tr>
        <td><a href="vereador_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="vereador_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Comiss&otilde;es</td>
      </tr>
      <tr>
        <td><a href="comissoes_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="comissoes_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Mesa Diretora</td>
      </tr>
      
      <tr>
        <td><a href="mesa_inserir.php?MesaID=1">Editar</a></td>
      </tr>
      
      <tr>
        <td bgcolor="#657D99" class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
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
          <td class="titulo">Indica&ccedil;&atilde;o</td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" enctype="multipart/form-data" id="form1">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsinscricao > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="numero_<?php echo $cnt1; ?>">Número:</label></td>
                        <td><input type="text" name="numero_<?php echo $cnt1; ?>" id="numero_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsinscricao['numero']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("numero");?> <?php echo $tNGs->displayFieldError("inscricao", "numero", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descrição:</label></td>
                        <td><textarea name="descricao_<?php echo $cnt1; ?>" cols="50" rows="10" id="descricao_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsinscricao['descricao']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("inscricao", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="justificativa_<?php echo $cnt1; ?>">Justificativa:</label></td>
                        <td><textarea name="justificativa_<?php echo $cnt1; ?>" cols="50" rows="10" id="justificativa_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsinscricao['justificativa']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("justificativa");?> <?php echo $tNGs->displayFieldError("inscricao", "justificativa", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="dataIndicacao_<?php echo $cnt1; ?>">Data Indica&ccedil;&atilde;o (ano):</label></td>
                        <td><input type="text" name="dataIndicacao_<?php echo $cnt1; ?>" id="dataIndicacao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsinscricao['dataIndicacao']); ?>" size="32" />
                            <?php echo $tNGs->displayFieldHint("dataIndicacao");?> <?php echo $tNGs->displayFieldError("inscricao", "dataIndicacao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
                        <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsinscricao['data']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("inscricao", "data", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="autor_<?php echo $cnt1; ?>">Autor:</label></td>
                        <td><input type="text" name="autor_<?php echo $cnt1; ?>" id="autor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsinscricao['autor']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("autor");?> <?php echo $tNGs->displayFieldError("inscricao", "autor", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem:</label></td>
                        <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("inscricao", "imagem", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="pdf_<?php echo $cnt1; ?>">Pdf:</label></td>
                        <td><input type="file" name="pdf_<?php echo $cnt1; ?>" id="pdf_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("inscricao", "pdf", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_inscricao_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsinscricao['kt_pk_inscricao']); ?>" />
                    <?php } while ($row_rsinscricao = mysql_fetch_assoc($rsinscricao)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['inscricaoID'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'inscricaoID')" />
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
    <td colspan="2" bgcolor="#8C9EB4"><div align="center">
      <table width="730" border="0" cellspacing="0" cellpadding="0">
        <tr class="txt_01">
          <td><div align="left"><span class="txt_03">&copy; 2008 C&acirc;mara Municipal de Mangaratiba - Todos os direitos reservados.</span></div></td>
          <td height="25"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../../img/logo_lobster_01.gif" width="83" height="23" border="0" /></a></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
