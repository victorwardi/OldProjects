<?php require_once('../../Connections/conBD.php'); ?><?php
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
$conn_conBD = new KT_connection($conBD, $database_conBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete6 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete6(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto6");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete6 trigger

//start Trigger_ImageUpload6 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload6(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto6");
  $uploadObj->setDbFieldName("foto6");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload6 trigger

//start Trigger_FileDelete5 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete5(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto5");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete5 trigger

//start Trigger_ImageUpload5 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload5(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto5");
  $uploadObj->setDbFieldName("foto5");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload5 trigger

//start Trigger_FileDelete4 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete4(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto4");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete4 trigger

//start Trigger_ImageUpload4 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload4(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto4");
  $uploadObj->setDbFieldName("foto4");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload4 trigger

//start Trigger_FileDelete3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete3(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto3");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete3 trigger

//start Trigger_ImageUpload3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload3(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto3");
  $uploadObj->setDbFieldName("foto3");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
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
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto2");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto2");
  $uploadObj->setDbFieldName("foto2");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
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
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("foto1");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto1");
  $uploadObj->setDbFieldName("foto1");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 600, 0);
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
  $deleteObj->setFolder("../../fotos/");
  $deleteObj->setDbFieldName("fotoDestaque");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("fotoDestaque");
  $uploadObj->setDbFieldName("fotoDestaque");
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("true", 400, 0);
  $uploadObj->setMaxSize(2000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conBD, $conBD);
$query_RsMarcas = "SELECT * FROM marca ORDER BY marca ASC";
$RsMarcas = mysql_query($query_RsMarcas, $conBD) or die(mysql_error());
$row_RsMarcas = mysql_fetch_assoc($RsMarcas);
$totalRows_RsMarcas = mysql_num_rows($RsMarcas);

// Make an insert transaction instance
$ins_carro = new tNG_multipleInsert($conn_conBD);
$tNGs->addTransaction($ins_carro);
// Register triggers
$ins_carro->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_carro->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_carro->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload3", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload4", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload5", 97);
$ins_carro->registerTrigger("AFTER", "Trigger_ImageUpload6", 97);
// Add columns
$ins_carro->setTable("carro");
$ins_carro->addColumn("placa", "STRING_TYPE", "POST", "placa");
$ins_carro->addColumn("marca", "STRING_TYPE", "POST", "marca");
$ins_carro->addColumn("modelo", "STRING_TYPE", "POST", "modelo");
$ins_carro->addColumn("ano", "STRING_TYPE", "POST", "ano");
$ins_carro->addColumn("cor", "STRING_TYPE", "POST", "cor");
$ins_carro->addColumn("motor", "STRING_TYPE", "POST", "motor");
$ins_carro->addColumn("combustivel", "STRING_TYPE", "POST", "combustivel");
$ins_carro->addColumn("acessorios", "STRING_TYPE", "POST", "acessorios");
$ins_carro->addColumn("preco", "STRING_TYPE", "POST", "preco");
$ins_carro->addColumn("fotoDestaque", "FILE_TYPE", "FILES", "fotoDestaque");
$ins_carro->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$ins_carro->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$ins_carro->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$ins_carro->addColumn("foto4", "FILE_TYPE", "FILES", "foto4");
$ins_carro->addColumn("foto5", "FILE_TYPE", "FILES", "foto5");
$ins_carro->addColumn("foto6", "FILE_TYPE", "FILES", "foto6");
$ins_carro->setPrimaryKey("carroId", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_carro = new tNG_multipleUpdate($conn_conBD);
$tNGs->addTransaction($upd_carro);
// Register triggers
$upd_carro->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_carro->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_carro->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload3", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload4", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload5", 97);
$upd_carro->registerTrigger("AFTER", "Trigger_ImageUpload6", 97);
// Add columns
$upd_carro->setTable("carro");
$upd_carro->addColumn("placa", "STRING_TYPE", "POST", "placa");
$upd_carro->addColumn("marca", "STRING_TYPE", "POST", "marca");
$upd_carro->addColumn("modelo", "STRING_TYPE", "POST", "modelo");
$upd_carro->addColumn("ano", "STRING_TYPE", "POST", "ano");
$upd_carro->addColumn("cor", "STRING_TYPE", "POST", "cor");
$upd_carro->addColumn("motor", "STRING_TYPE", "POST", "motor");
$upd_carro->addColumn("combustivel", "STRING_TYPE", "POST", "combustivel");
$upd_carro->addColumn("acessorios", "STRING_TYPE", "POST", "acessorios");
$upd_carro->addColumn("preco", "STRING_TYPE", "POST", "preco");
$upd_carro->addColumn("fotoDestaque", "FILE_TYPE", "FILES", "fotoDestaque");
$upd_carro->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$upd_carro->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$upd_carro->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$upd_carro->addColumn("foto4", "FILE_TYPE", "FILES", "foto4");
$upd_carro->addColumn("foto5", "FILE_TYPE", "FILES", "foto5");
$upd_carro->addColumn("foto6", "FILE_TYPE", "FILES", "foto6");
$upd_carro->setPrimaryKey("carroId", "NUMERIC_TYPE", "GET", "carroId");

// Make an instance of the transaction object
$del_carro = new tNG_multipleDelete($conn_conBD);
$tNGs->addTransaction($del_carro);
// Register triggers
$del_carro->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_carro->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete3", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete4", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete5", 98);
$del_carro->registerTrigger("AFTER", "Trigger_FileDelete6", 98);
// Add columns
$del_carro->setTable("carro");
$del_carro->setPrimaryKey("carroId", "NUMERIC_TYPE", "GET", "carroId");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscarro = $tNGs->getRecordset("carro");
$row_rscarro = mysql_fetch_assoc($rscarro);
$totalRows_rscarro = mysql_num_rows($rscarro);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../../fotos/");
$objDynamicThumb1->setRenameRule("{rscarro.foto1}");
$objDynamicThumb1->setResize(40, 30, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("../../", "KT_thumbnail2");
$objDynamicThumb2->setFolder("../../fotos/");
$objDynamicThumb2->setRenameRule("{rscarro.foto2}");
$objDynamicThumb2->setResize(40, 30, false);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("../../", "KT_thumbnail3");
$objDynamicThumb3->setFolder("../../fotos/");
$objDynamicThumb3->setRenameRule("{rscarro.foto3}");
$objDynamicThumb3->setResize(40, 30, false);
$objDynamicThumb3->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("../../", "KT_thumbnail4");
$objDynamicThumb4->setFolder("../../fotos/");
$objDynamicThumb4->setRenameRule("{rscarro.foto4}");
$objDynamicThumb4->setResize(40, 30, false);
$objDynamicThumb4->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb5 = new tNG_DynamicThumbnail("../../", "KT_thumbnail5");
$objDynamicThumb5->setFolder("../../fotos/");
$objDynamicThumb5->setRenameRule("{rscarro.foto5}");
$objDynamicThumb5->setResize(40, 30, false);
$objDynamicThumb5->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb6 = new tNG_DynamicThumbnail("../../", "KT_thumbnail6");
$objDynamicThumb6->setFolder("../../fotos/");
$objDynamicThumb6->setRenameRule("{rscarro.foto6}");
$objDynamicThumb6->setResize(40, 30, false);
$objDynamicThumb6->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb7 = new tNG_DynamicThumbnail("../../", "KT_thumbnail7");
$objDynamicThumb7->setFolder("../../fotos/");
$objDynamicThumb7->setRenameRule("{rscarro.fotoDestaque}");
$objDynamicThumb7->setResize(40, 30, false);
$objDynamicThumb7->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo - Vadico Ve&iacute;culos</title>
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
	color: #333333;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../imagens/bg_body.jpg);
	background-color: #848D94;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
	font-weight: bold;
}
a:link {
	color: #333333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #333333;
}
a:hover {
	text-decoration: underline;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #333333;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="0">
      <tr>
        <td><span class="style1">Menu</span></td>
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
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <script src="mascara.js" type="text/javascript"></script>
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
      <link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
      <script src="../../includes/common/js/base.js" type="text/javascript"></script>
      <script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
  
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo"><?php 
// Show IF Conditional region1 
if (@$_GET['carroId'] == "") {
?>
            <?php echo NXT_getResource("Insert_FH"); ?>
            <?php 
// else Conditional region1
} else { ?>
            <?php echo NXT_getResource("Update_FH"); ?>
            <?php } 
// endif Conditional region1
?>
Carro</td>
        </tr>
        <tr>
          <td>  <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rscarro > 1) {
?>
              <h2 class="tituloRegistros"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="6" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="placa_<?php echo $cnt1; ?>">Placa:</label></td>
                <td><input type="text" name="placa_<?php echo $cnt1; ?>" id="placa_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['placa']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("placa");?> <?php echo $tNGs->displayFieldError("carro", "placa", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="marca_<?php echo $cnt1; ?>">Marca:</label></td>
                <td><label>
                  <select name="marca_<?php echo $cnt1; ?>" id="marca_<?php echo $cnt1; ?>">
                    <option value="-" <?php if (!(strcmp("-", $row_rscarro['marca']))) {echo "selected=\"selected\"";} ?>>Selecione</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_RsMarcas['marca']?>"<?php if (!(strcmp($row_RsMarcas['marca'], $row_rscarro['marca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsMarcas['marca']?></option>
                    <?php
} while ($row_RsMarcas = mysql_fetch_assoc($RsMarcas));
  $rows = mysql_num_rows($RsMarcas);
  if($rows > 0) {
      mysql_data_seek($RsMarcas, 0);
	  $row_RsMarcas = mysql_fetch_assoc($RsMarcas);
  }
?>
                  </select>
                  </label>
                    <?php echo $tNGs->displayFieldHint("marca");?> <?php echo $tNGs->displayFieldError("carro", "marca", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="modelo_<?php echo $cnt1; ?>">Modelo:</label></td>
                <td><input type="text" name="modelo_<?php echo $cnt1; ?>" id="modelo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['modelo']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("modelo");?> <?php echo $tNGs->displayFieldError("carro", "modelo", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="ano_<?php echo $cnt1; ?>">Ano:</label></td>
                <td><input type="text" name="ano_<?php echo $cnt1; ?>" id="ano_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['ano']); ?>" size="10" maxlength="4" />
                    <?php echo $tNGs->displayFieldHint("ano");?> <?php echo $tNGs->displayFieldError("carro", "ano", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="cor_<?php echo $cnt1; ?>">Cor:</label></td>
                <td><input type="text" name="cor_<?php echo $cnt1; ?>" id="cor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['cor']); ?>" size="25" maxlength="100" />
                    <?php echo $tNGs->displayFieldHint("cor");?> <?php echo $tNGs->displayFieldError("carro", "cor", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="motor_<?php echo $cnt1; ?>">Motor:</label></td>
                <td><input type="text" name="motor_<?php echo $cnt1; ?>" id="motor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['motor']); ?>" size="10" maxlength="100" />
                    <?php echo $tNGs->displayFieldHint("motor");?> <?php echo $tNGs->displayFieldError("carro", "motor", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="combustivel_<?php echo $cnt1; ?>">Combust&iacute;vel:</label></td>
                <td><input type="text" name="combustivel_<?php echo $cnt1; ?>" id="combustivel_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['combustivel']); ?>" size="32" maxlength="100" />
                    <?php echo $tNGs->displayFieldHint("combustivel");?> <?php echo $tNGs->displayFieldError("carro", "combustivel", $cnt1); ?> </td>
              </tr>
              <tr>
                <td valign="top" class="KT_th"><label for="acessorios_<?php echo $cnt1; ?>">Acess&oacute;rios:</label></td>
                <td><textarea name="acessorios_<?php echo $cnt1; ?>" id="acessorios_<?php echo $cnt1; ?>" cols="50" rows="3"><?php echo KT_escapeAttribute($row_rscarro['acessorios']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("acessorios");?> <?php echo $tNGs->displayFieldError("carro", "acessorios", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="preco_<?php echo $cnt1; ?>">Preco:</label></td>
                <td><input name="preco_<?php echo $cnt1; ?>" type="text" id="preco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscarro['preco']); ?>" size="20"  onKeyDown="Mascara(this,Valor);" onKeyPress="Mascara(this,Valor);" onKeyUp="Mascara(this,Valor);"/>
                    <?php echo $tNGs->displayFieldHint("preco");?> <?php echo $tNGs->displayFieldError("carro", "preco", $cnt1); ?> </td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fotoDestaque_<?php echo $cnt1; ?>">Foto Destaque:</label></td>
                <td><?php if ($row_rscarro['fotoDestaque'] != "") {  ?>
                    <img src="<?php echo $objDynamicThumb7->Execute(); ?>" border="0" class="borda_foto" /> <br />
                  <?php }  ?>
                    <input type="file" name="fotoDestaque_<?php echo $cnt1; ?>" id="fotoDestaque_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("carro", "fotoDestaque", $cnt1); ?> </td>
              </tr>
              <tr>
                <td colspan="2" class="KT_th"><fieldset>
                  <legend>Fotos</legend>
                  <table width="100%" border="0" cellspacing="0" cellpadding="6">
                    <tr class="KT_tngtable">
                      <td class="KT_th"><label for="foto1_<?php echo $cnt1; ?>">Foto 1:</label></td>
                      <td><?php if ($row_rscarro['foto1'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" class="borda_foto" /> <br />
                        <?php }  ?>
                          <input type="file" name="foto1_<?php echo $cnt1; ?>" id="foto1_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto1", $cnt1); ?></td>
                    </tr>
                    <tr class="KT_tngtable">
                      <td bgcolor="#EFEFEF" class="KT_th"><label for="foto2_<?php echo $cnt1; ?>">Foto 2:</label></td>
                      <td bgcolor="#EFEFEF"><?php if ($row_rscarro['foto2'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" class="borda_foto" /> <br />
                          <?php }  ?>
                          <input type="file" name="foto2_<?php echo $cnt1; ?>" id="foto2_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto2", $cnt1); ?></td>
                    </tr>
                    <tr class="KT_tngtable">
                      <td class="KT_th"><label for="foto3_<?php echo $cnt1; ?>">Foto 3:</label></td>
                      <td><?php if ($row_rscarro['foto3'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb3->Execute(); ?>" border="0" class="borda_foto" /> <br />
                        <?php }  ?>
                          <input type="file" name="foto3_<?php echo $cnt1; ?>" id="foto3_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto3", $cnt1); ?></td>
                    </tr>
                    <tr class="KT_tngtable">
                      <td bgcolor="#EFEFEF" class="KT_th"><label for="foto4_<?php echo $cnt1; ?>">Foto 4:</label></td>
                      <td bgcolor="#EFEFEF"><?php if ($row_rscarro['foto4'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb4->Execute(); ?>" border="0" class="borda_foto" /> <br />
                          <?php }  ?>
                          <input type="file" name="foto4_<?php echo $cnt1; ?>" id="foto4_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto4", $cnt1); ?></td>
                    </tr>
                    <tr class="KT_tngtable">
                      <td class="KT_th"><label for="foto5_<?php echo $cnt1; ?>">Foto 5:</label></td>
                      <td><?php if ($row_rscarro['foto5'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb5->Execute(); ?>" border="0" class="borda_foto" /> <br />
                        <?php }  ?>
                          <input type="file" name="foto5_<?php echo $cnt1; ?>" id="foto5_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto5", $cnt1); ?></td>
                    </tr>
                    <tr class="KT_tngtable">
                      <td bgcolor="#EFEFEF" class="KT_th"><label for="foto6_<?php echo $cnt1; ?>">Foto 6:</label></td>
                      <td bgcolor="#EFEFEF"><?php if ($row_rscarro['foto6'] != "") {  ?>
                          <img src="<?php echo $objDynamicThumb6->Execute(); ?>" border="0" class="borda_foto" /> <br />
                          <?php }  ?>
                          <input type="file" name="foto6_<?php echo $cnt1; ?>" id="foto6_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("carro", "foto6", $cnt1); ?></td>
                    </tr>
                  </table>
                </fieldset></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_carro_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscarro['kt_pk_carro']); ?>" />
            <?php } while ($row_rscarro = mysql_fetch_assoc($rscarro)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['carroId'] == "") {
      ?>
                <input name="KT_Insert1" type="submit" class="button" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input name="KT_Insert1" type="submit" class="button" onclick="nxt_form_insertasnew(this, 'carroId')" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" />
                </div>
                <input name="KT_Update1" type="submit" class="button" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                <input name="KT_Delete1" type="submit" class="button" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" value="<?php echo NXT_getResource("Delete_FB"); ?>" />
                <?php }
      // endif Conditional region1
      ?>
              <input name="KT_Cancel1" type="button" class="button" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" value="<?php echo NXT_getResource("Cancel_FB"); ?>" />
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
  merge_down_value: true
}
    </script></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2"><img src="rodape.jpg" alt="Desenvolvido por Victor Caetano" width="850" height="50" /></td>
  </tr>
</table>
</body><!-- InstanceEnd -->
</html>
<?php
mysql_free_result($RsMarcas);
?>
