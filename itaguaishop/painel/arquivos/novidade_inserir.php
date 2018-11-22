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

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/fotos/");
  $deleteObj->setDbFieldName("imagem_titulo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem_titulo");
  $uploadObj->setDbFieldName("imagem_titulo");
  $uploadObj->setFolder("../../Uploads/fotos/");
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
  $deleteObj->setFolder("../../Uploads/fotos/");
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
  $uploadObj->setFolder("../../Uploads/fotos/");
  $uploadObj->setResize("true", 300, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_ConBD, $ConBD);
$query_RsCategoria = "SELECT * FROM categoria_novidade ORDER BY categoria ASC";
$RsCategoria = mysql_query($query_RsCategoria, $ConBD) or die(mysql_error());
$row_RsCategoria = mysql_fetch_assoc($RsCategoria);
$totalRows_RsCategoria = mysql_num_rows($RsCategoria);

// Make an insert transaction instance
$ins_novidades = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_novidades);
// Register triggers
$ins_novidades->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_novidades->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_novidades->registerTrigger("END", "Trigger_Default_Redirect", 99, "novidade_editar.php");
$ins_novidades->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_novidades->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_novidades->setTable("novidades");
$ins_novidades->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_novidades->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$ins_novidades->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_novidades->addColumn("materia", "STRING_TYPE", "POST", "materia");
$ins_novidades->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_novidades->addColumn("imagem_titulo", "FILE_TYPE", "FILES", "imagem_titulo");
$ins_novidades->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_novidades->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_novidades = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_novidades);
// Register triggers
$upd_novidades->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_novidades->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_novidades->registerTrigger("END", "Trigger_Default_Redirect", 99, "novidade_editar.php");
$upd_novidades->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_novidades->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_novidades->setTable("novidades");
$upd_novidades->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_novidades->addColumn("resumo", "STRING_TYPE", "POST", "resumo");
$upd_novidades->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_novidades->addColumn("materia", "STRING_TYPE", "POST", "materia");
$upd_novidades->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_novidades->addColumn("imagem_titulo", "FILE_TYPE", "FILES", "imagem_titulo");
$upd_novidades->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_novidades->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_novidades = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_novidades);
// Register triggers
$del_novidades->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_novidades->registerTrigger("END", "Trigger_Default_Redirect", 99, "novidade_editar.php");
$del_novidades->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_novidades->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_novidades->setTable("novidades");
$del_novidades->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnovidades = $tNGs->getRecordset("novidades");
$row_rsnovidades = mysql_fetch_assoc($rsnovidades);
$totalRows_rsnovidades = mysql_num_rows($rsnovidades);
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
<link href="../../css/estilo_isc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#EDE4EF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
      </tr>
      <tr>
        <td class="titulo">Lojas</td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td class="txt_06"><a href="loja_editar.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Categoria de Lojas </td>
      </tr>
      <tr>
        <td><a href="categoria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td><a href="novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="novidade_editar.php">Editar/Excluir</a></td>
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
        <td class="titulo">Categoria de Novidades</td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td><a href="categoria_novidade_editar.php">Editar/Excluir</a></td>
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
  
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Inserir Novidades </td>
        </tr>
        <tr>
          <td>  <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnovidades > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="txt_06">
              <tr>
                <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnovidades['titulo']); ?>" size="40" maxlength="120" />
                    <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("novidades", "titulo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="resumo_<?php echo $cnt1; ?>">Resumo:</label></td>
                <td><input type="text" name="resumo_<?php echo $cnt1; ?>" id="resumo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnovidades['resumo']); ?>" size="70" maxlength="100" />
                    <?php echo $tNGs->displayFieldHint("resumo");?> <?php echo $tNGs->displayFieldError("novidades", "resumo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
                <td><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnovidades['data']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("novidades", "data", $cnt1); ?> </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="KT_th"><label for="materia_<?php echo $cnt1; ?>">Texto:</label></td>
                <td><textarea name="materia_<?php echo $cnt1; ?>" id="materia_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnovidades['materia']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("materia");?> <?php echo $tNGs->displayFieldError("novidades", "materia", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                <td><label>
                  <select name="categoria" id="categoria">
                    <option value="" <?php if (!(strcmp("", $row_rsnovidades['categoria']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Categoria -</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_RsCategoria['categoria']?>"<?php if (!(strcmp($row_RsCategoria['categoria'], $row_rsnovidades['categoria']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsCategoria['categoria']?></option>
                    <?php
} while ($row_RsCategoria = mysql_fetch_assoc($RsCategoria));
  $rows = mysql_num_rows($RsCategoria);
  if($rows > 0) {
      mysql_data_seek($RsCategoria, 0);
	  $row_RsCategoria = mysql_fetch_assoc($RsCategoria);
  }
?>
                  </select>
                  </label>
                    <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("novidades", "categoria", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagem_titulo_<?php echo $cnt1; ?>">Imagem de T&iacute;tulo:</label></td>
                <td><input type="file" name="imagem_titulo_<?php echo $cnt1; ?>" id="imagem_titulo_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("novidades", "imagem_titulo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagem_<?php echo $cnt1; ?>">Imagem de capa (foto):</label></td>
                <td><input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("novidades", "imagem", $cnt1); ?> </td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_novidades_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnovidades['kt_pk_novidades']); ?>" />
            <?php } while ($row_rsnovidades = mysql_fetch_assoc($rsnovidades)); ?>
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
  show_as_grid: false,
  merge_down_value: false
}
    </script></td>
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
<?php
mysql_free_result($RsCategoria);
?>
