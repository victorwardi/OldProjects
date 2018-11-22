<?php require_once('../../Connections/CostaverdeFM.php'); ?>
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
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../mp3/");
  $deleteObj->setDbFieldName("arquivo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("arquivo");
  $uploadObj->setDbFieldName("arquivo");
  $uploadObj->setFolder("../../mp3/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("mp3, wma");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

// Make an insert transaction instance
$ins_mp3 = new tNG_multipleInsert($conn_CostaverdeFM);
$tNGs->addTransaction($ins_mp3);
// Register triggers
$ins_mp3->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_mp3->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_mp3->registerTrigger("END", "Trigger_Default_Redirect", 99, "mp3_edite.php");
$ins_mp3->registerTrigger("AFTER", "Trigger_FileUpload", 98);
// Add columns
$ins_mp3->setTable("mp3");
$ins_mp3->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_mp3->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_mp3->setPrimaryKey("id", "STRING_TYPE");

// Make an update transaction instance
$upd_mp3 = new tNG_multipleUpdate($conn_CostaverdeFM);
$tNGs->addTransaction($upd_mp3);
// Register triggers
$upd_mp3->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_mp3->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_mp3->registerTrigger("END", "Trigger_Default_Redirect", 99, "mp3_edite.php");
$upd_mp3->registerTrigger("AFTER", "Trigger_FileUpload", 98);
// Add columns
$upd_mp3->setTable("mp3");
$upd_mp3->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_mp3->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_mp3->setPrimaryKey("id", "STRING_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_mp3 = new tNG_multipleDelete($conn_CostaverdeFM);
$tNGs->addTransaction($del_mp3);
// Register triggers
$del_mp3->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_mp3->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_mp3->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_mp3->setTable("mp3");
$del_mp3->setPrimaryKey("id", "STRING_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsmp3 = $tNGs->getRecordset("mp3");
$row_rsmp3 = mysql_fetch_assoc($rsmp3);
$totalRows_rsmp3 = mysql_num_rows($rsmp3);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle Costa Verde FM</title>
<!-- InstanceEndEditable -->
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="home.php">Home</a></th>
          </tr>
        </table></th>
      </tr>
      
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fotos </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="foto_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Galerias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="galeria_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Top 12 </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <th scope="row"><a href="top_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Mp3</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="mp3_edite.php"> Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Recados</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="row"><a href="recados_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fique Ligado </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="ligado_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Promo&ccedil;&otilde;es</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="promo_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Equipe</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="equipe_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Programa</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="programa_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" -->
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <script src="../../includes/skins/style.js" type="text/javascript"></script>
    <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
        <tr>
          <th height="27" align="left" scope="col">Mp3</th>
        </tr>
      </table>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rsmp3 > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmp3['nome']); ?>" size="32" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("mp3", "nome", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo:</label></td>
                <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("mp3", "arquivo", $cnt1); ?> </td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_mp3_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsmp3['kt_pk_mp3']); ?>" />
            <?php } while ($row_rsmp3 = mysql_fetch_assoc($rsmp3)); ?>
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
    <p>&nbsp;</p>
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
  merge_down_value: false
}
    </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#3A9456"><span class="fonte11px_branca_negrito">Painel de Controle Desenvolvido por Victor Caetano e Ded&eacute; Siqueira </span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
