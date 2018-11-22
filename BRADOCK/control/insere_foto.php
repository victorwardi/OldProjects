<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagem");
  $uploadObj->setDbFieldName("imagem");
  $uploadObj->setFolder("../uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_imovel = new tNG_insert($conn_ConBD);
$tNGs->addTransaction($ins_imovel);
// Register triggers
$ins_imovel->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_imovel->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_imovel->registerTrigger("END", "Trigger_Default_Redirect", 99, "../inseridocomsucesso.php");
$ins_imovel->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_imovel->setTable("imovel");
$ins_imovel->addColumn("tipo", "STRING_TYPE", "POST", "tipo");
$ins_imovel->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_imovel->addColumn("localizacao", "STRING_TYPE", "POST", "localizacao");
$ins_imovel->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_imovel->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_imovel->addColumn("preco", "STRING_TYPE", "POST", "preco");
$ins_imovel->setPrimaryKey("id", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsimovel = $tNGs->getRecordset("imovel");
$row_rsimovel = mysql_fetch_assoc($rsimovel);
$totalRows_rsimovel = mysql_num_rows($rsimovel);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|| Bradock ||</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>

</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="tipo">Tipo:</label></td>
      <td><input type="text" name="tipo" id="tipo" value="<?php echo KT_escapeAttribute($row_rsimovel['tipo']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("tipo");?> <?php echo $tNGs->displayFieldError("imovel", "tipo"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="descricao">Descricao:</label></td>
      <td><input type="text" name="descricao" id="descricao" value="<?php echo KT_escapeAttribute($row_rsimovel['descricao']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("imovel", "descricao"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="localizacao">Localizacao:</label></td>
      <td><input type="text" name="localizacao" id="localizacao" value="<?php echo KT_escapeAttribute($row_rsimovel['localizacao']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("localizacao");?> <?php echo $tNGs->displayFieldError("imovel", "localizacao"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="imagem">Imagem:</label></td>
      <td><input type="file" name="imagem" id="imagem" size="32" />
          <?php echo $tNGs->displayFieldError("imovel", "imagem"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="titulo">Titulo:</label></td>
      <td><input type="text" name="titulo" id="titulo" value="<?php echo KT_escapeAttribute($row_rsimovel['titulo']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("imovel", "titulo"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="preco">Preco:</label></td>
      <td><input type="text" name="preco" id="preco" value="<?php echo KT_escapeAttribute($row_rsimovel['preco']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("preco");?> <?php echo $tNGs->displayFieldError("imovel", "preco"); ?> </td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Insert record" />
      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
