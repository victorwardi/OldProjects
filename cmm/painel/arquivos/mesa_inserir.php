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

//start Trigger_FileDelete3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete3(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("fotoSecretario2");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete3 trigger

//start Trigger_ImageUpload3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload3(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("fotoSecretario2");
  $uploadObj->setDbFieldName("fotoSecretario2");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload3 trigger

//start Trigger_FileDelete2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete2(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("fotoSecretario1");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("fotoSecretario1");
  $uploadObj->setDbFieldName("fotoSecretario1");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload2 trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("fotoVicePresidente");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("fotoVicePresidente");
  $uploadObj->setDbFieldName("fotoVicePresidente");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/");
  $deleteObj->setDbFieldName("fotoPresidente");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("fotoPresidente");
  $uploadObj->setDbFieldName("fotoPresidente");
  $uploadObj->setFolder("../../uploads/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_mesadiretora = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_mesadiretora);
// Register triggers
$ins_mesadiretora->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_mesadiretora->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_mesadiretora->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$ins_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
$ins_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload3", 97);
// Add columns
$ins_mesadiretora->setTable("mesadiretora");
$ins_mesadiretora->addColumn("presidente", "STRING_TYPE", "POST", "presidente");
$ins_mesadiretora->addColumn("fotoPresidente", "FILE_TYPE", "FILES", "fotoPresidente");
$ins_mesadiretora->addColumn("vicePresidente", "STRING_TYPE", "POST", "vicePresidente");
$ins_mesadiretora->addColumn("fotoVicePresidente", "FILE_TYPE", "FILES", "fotoVicePresidente");
$ins_mesadiretora->addColumn("secretario1", "STRING_TYPE", "POST", "secretario1");
$ins_mesadiretora->addColumn("fotoSecretario1", "FILE_TYPE", "FILES", "fotoSecretario1");
$ins_mesadiretora->addColumn("secretario2", "STRING_TYPE", "POST", "secretario2");
$ins_mesadiretora->addColumn("fotoSecretario2", "FILE_TYPE", "FILES", "fotoSecretario2");
$ins_mesadiretora->setPrimaryKey("MesaID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_mesadiretora = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_mesadiretora);
// Register triggers
$upd_mesadiretora->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_mesadiretora->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_mesadiretora->registerTrigger("END", "Trigger_Default_Redirect", 99, "mesa_inserir.php?MesaID=1");
$upd_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$upd_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
$upd_mesadiretora->registerTrigger("AFTER", "Trigger_ImageUpload3", 97);
// Add columns
$upd_mesadiretora->setTable("mesadiretora");
$upd_mesadiretora->addColumn("presidente", "STRING_TYPE", "POST", "presidente");
$upd_mesadiretora->addColumn("fotoPresidente", "FILE_TYPE", "FILES", "fotoPresidente");
$upd_mesadiretora->addColumn("vicePresidente", "STRING_TYPE", "POST", "vicePresidente");
$upd_mesadiretora->addColumn("fotoVicePresidente", "FILE_TYPE", "FILES", "fotoVicePresidente");
$upd_mesadiretora->addColumn("secretario1", "STRING_TYPE", "POST", "secretario1");
$upd_mesadiretora->addColumn("fotoSecretario1", "FILE_TYPE", "FILES", "fotoSecretario1");
$upd_mesadiretora->addColumn("secretario2", "STRING_TYPE", "POST", "secretario2");
$upd_mesadiretora->addColumn("fotoSecretario2", "FILE_TYPE", "FILES", "fotoSecretario2");
$upd_mesadiretora->setPrimaryKey("MesaID", "NUMERIC_TYPE", "GET", "MesaID");

// Make an instance of the transaction object
$del_mesadiretora = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_mesadiretora);
// Register triggers
$del_mesadiretora->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_mesadiretora->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_mesadiretora->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_mesadiretora->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_mesadiretora->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
$del_mesadiretora->registerTrigger("AFTER", "Trigger_FileDelete3", 98);
// Add columns
$del_mesadiretora->setTable("mesadiretora");
$del_mesadiretora->setPrimaryKey("MesaID", "NUMERIC_TYPE", "GET", "MesaID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsmesadiretora = $tNGs->getRecordset("mesadiretora");
$row_rsmesadiretora = mysql_fetch_assoc($rsmesadiretora);
$totalRows_rsmesadiretora = mysql_num_rows($rsmesadiretora);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../uploads/");
$objDynamicThumb1->setRenameRule("{rsmesadiretora.fotoPresidente}");
$objDynamicThumb1->setResize(100, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../../uploads/");
$objDynamicThumb2->setRenameRule("{rsmesadiretora.fotoVicePresidente}");
$objDynamicThumb2->setResize(100, 0, true);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("../../", "KT_thumbnail3");
$objDynamicThumb3->setFolder("../../uploads/");
$objDynamicThumb3->setRenameRule("{rsmesadiretora.fotoSecretario1}");
$objDynamicThumb3->setResize(100, 0, true);
$objDynamicThumb3->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("../../", "KT_thumbnail4");
$objDynamicThumb4->setFolder("../../uploads/");
$objDynamicThumb4->setRenameRule("{rsmesadiretora.fotoSecretario2}");
$objDynamicThumb4->setResize(100, 0, true);
$objDynamicThumb4->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
          <td class="titulo">Mesa Diretora</td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsmesadiretora > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="4" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td width="171" align="left" valign="top" bgcolor="#FEDDA5" class="KT_th"><label for="presidente_<?php echo $cnt1; ?>"><strong>Presidente:</strong></label></td>
                        <td width="308" align="left" bgcolor="#FEDDA5"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                      </tr>
                      
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FEDDA5" class="KT_th">Nome:</td>
                        <td bgcolor="#FEDDA5"><input type="text" name="presidente_<?php echo $cnt1; ?>" id="presidente_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmesadiretora['presidente']); ?>" size="32" maxlength="255" />
                          <?php echo $tNGs->displayFieldHint("presidente");?> <?php echo $tNGs->displayFieldError("mesadiretora", "presidente", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FEDDA5" class="KT_th"><label for="fotoPresidente_<?php echo $cnt1; ?>">Foto do presidente:</label></td>
                        <td bgcolor="#FEDDA5"><input type="file" name="fotoPresidente_<?php echo $cnt1; ?>" id="fotoPresidente_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("mesadiretora", "fotoPresidente", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="vicePresidente_<?php echo $cnt1; ?>"><strong>Vice-Presidente:</strong></label></td>
                        <td><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="KT_th">Nome:</td>
                        <td><input type="text" name="vicePresidente_<?php echo $cnt1; ?>" id="vicePresidente_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmesadiretora['vicePresidente']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("vicePresidente");?> <?php echo $tNGs->displayFieldError("mesadiretora", "vicePresidente", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="KT_th"><label for="fotoVicePresidente_<?php echo $cnt1; ?>">Foto do Vice-Presidente:</label></td>
                        <td><input type="file" name="fotoVicePresidente_<?php echo $cnt1; ?>" id="fotoVicePresidente_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("mesadiretora", "fotoVicePresidente", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FEDDA5" class="KT_th"><label for="secretario1_<?php echo $cnt1; ?>"><strong>Primeiro Secret&aacute;rio:</strong></label></td>
                        <td bgcolor="#FEDDA5"><img src="<?php echo $objDynamicThumb3->Execute(); ?>" border="0" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FEDDA5" class="KT_th">Nome:</td>
                        <td bgcolor="#FEDDA5"><input type="text" name="secretario1_<?php echo $cnt1; ?>" id="secretario1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmesadiretora['secretario1']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("secretario1");?> <?php echo $tNGs->displayFieldError("mesadiretora", "secretario1", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FEDDA5" class="KT_th"><label for="fotoSecretario1_<?php echo $cnt1; ?>">Foto do Primeiro Secret&aacute;rio:</label></td>
                        <td bgcolor="#FEDDA5"><input type="file" name="fotoSecretario1_<?php echo $cnt1; ?>" id="fotoSecretario1_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("mesadiretora", "fotoSecretario1", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><label for="secretario2_<?php echo $cnt1; ?>"><strong>Segundo Secret&aacute;rio:</strong></label></td>
                        <td><img src="<?php echo $objDynamicThumb4->Execute(); ?>" border="0" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th">Nome:</td>
                        <td><input type="text" name="secretario2_<?php echo $cnt1; ?>" id="secretario2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmesadiretora['secretario2']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("secretario2");?> <?php echo $tNGs->displayFieldError("mesadiretora", "secretario2", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="KT_th"><label for="fotoSecretario2_<?php echo $cnt1; ?>">Foto do Segundo Secret&aacute;rio:</label></td>
                        <td><input type="file" name="fotoSecretario2_<?php echo $cnt1; ?>" id="fotoSecretario2_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("mesadiretora", "fotoSecretario2", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_mesadiretora_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsmesadiretora['kt_pk_mesadiretora']); ?>" />
                    <?php } while ($row_rsmesadiretora = mysql_fetch_assoc($rsmesadiretora)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['MesaID'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
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
