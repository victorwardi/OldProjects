<?php require_once('../../Connections/saquabb.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../erro.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?><?php
mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos ORDER BY id DESC";
$fotos = mysql_query($query_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil";
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil_Y = "SELECT * FROM perfil WHERE aprovado = 'y'";
$perfil_Y = mysql_query($query_perfil_Y, $saquabb) or die(mysql_error());
$row_perfil_Y = mysql_fetch_assoc($perfil_Y);
$totalRows_perfil_Y = mysql_num_rows($perfil_Y);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil_n = "SELECT * FROM perfil WHERE aprovado = 'n'";
$perfil_n = mysql_query($query_perfil_n, $saquabb) or die(mysql_error());
$row_perfil_n = mysql_fetch_assoc($perfil_n);
$totalRows_perfil_n = mysql_num_rows($perfil_n);

mysql_select_db($database_saquabb, $saquabb);
$query_not_saquabb = "SELECT * FROM noticias WHERE coluna = 'saquabb'";
$not_saquabb = mysql_query($query_not_saquabb, $saquabb) or die(mysql_error());
$row_not_saquabb = mysql_fetch_assoc($not_saquabb);
$totalRows_not_saquabb = mysql_num_rows($not_saquabb);

mysql_select_db($database_saquabb, $saquabb);
$query_not_bblagos = "SELECT * FROM noticias WHERE coluna = 'bblagos'";
$not_bblagos = mysql_query($query_not_bblagos, $saquabb) or die(mysql_error());
$row_not_bblagos = mysql_fetch_assoc($not_bblagos);
$totalRows_not_bblagos = mysql_num_rows($not_bblagos);

mysql_select_db($database_saquabb, $saquabb);
$query_not_girls = "SELECT * FROM noticias WHERE coluna = 'girls'";
$not_girls = mysql_query($query_not_girls, $saquabb) or die(mysql_error());
$row_not_girls = mysql_fetch_assoc($not_girls);
$totalRows_not_girls = mysql_num_rows($not_girls);

mysql_select_db($database_saquabb, $saquabb);
$query_festas = "SELECT * FROM festas";
$festas = mysql_query($query_festas, $saquabb) or die(mysql_error());
$row_festas = mysql_fetch_assoc($festas);
$totalRows_festas = mysql_num_rows($festas);

mysql_select_db($database_saquabb, $saquabb);
$query_not_atual = "SELECT * FROM noticias WHERE coluna = 'atualidades'";
$not_atual = mysql_query($query_not_atual, $saquabb) or die(mysql_error());
$row_not_atual = mysql_fetch_assoc($not_atual);
$totalRows_not_atual = mysql_num_rows($not_atual);
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
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("data_nasc", true, "text", "", "", "", "Inserir sua data de nascimento");
$formValidation->addField("local_de", true, "text", "", "", "", "Inserir sua localidade");
$formValidation->addField("picos_preferidos", true, "text", "", "", "", "Inserir seus picos preferidos");
$formValidation->addField("prancha", true, "text", "", "", "", "Inserir a marca da sua prancha");
$formValidation->addField("pe_pato", true, "text", "", "", "", "Inserir a marca do seu p�-de-pato");
$formValidation->addField("tempo_de_bb", true, "text", "", "", "", "Inserir o tempo que voc� pratica o bodyboarding");
$formValidation->addField("patrocinio", true, "text", "", "", "", "Inserir seus patrocinios e apoios");
$formValidation->addField("manobra", true, "text", "", "", "", "Inserir sua manobra preferida");
$formValidation->addField("idolo", true, "text", "", "", "", "Inserir sua manobra preferida");
$formValidation->addField("filme", true, "text", "", "", "", "Inserir seu Filme de BB preferido");
$formValidation->addField("atividades", true, "text", "", "", "", "Inserir suas outras atividades");
$formValidation->addField("recado", true, "text", "", "", "", "Deixe um racado pra Galera do Saquabb");
$formValidation->addField("foto", true, "", "", "", "", "Insira sua foto");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../perfil/fotos/");
  $deleteObj->setDbFieldName("foto");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto");
  $uploadObj->setDbFieldName("foto");
  $uploadObj->setFolder("../../perfil/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(200);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_perfil = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_perfil);
// Register triggers
$ins_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
$ins_perfil->registerTrigger("BEFORE", "Trigger_SetOrderColumn", 50);
$ins_perfil->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_perfil->setTable("perfil");
$ins_perfil->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_perfil->addColumn("data_nasc", "STRING_TYPE", "POST", "data_nasc");
$ins_perfil->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_perfil->addColumn("local_de", "STRING_TYPE", "POST", "local_de");
$ins_perfil->addColumn("picos_preferidos", "STRING_TYPE", "POST", "picos_preferidos");
$ins_perfil->addColumn("prancha", "STRING_TYPE", "POST", "prancha");
$ins_perfil->addColumn("pe_pato", "STRING_TYPE", "POST", "pe_pato");
$ins_perfil->addColumn("tempo_de_bb", "STRING_TYPE", "POST", "tempo_de_bb");
$ins_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$ins_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$ins_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$ins_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$ins_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$ins_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$ins_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_perfil->addColumn("aprovado", "CHECKBOX_YN_TYPE", "POST", "aprovado", "Y");
$ins_perfil->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_perfil = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_perfil);
// Register triggers
$upd_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_perfil->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
$upd_perfil->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_perfil->setTable("perfil");
$upd_perfil->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_perfil->addColumn("data_nasc", "STRING_TYPE", "POST", "data_nasc");
$upd_perfil->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_perfil->addColumn("local_de", "STRING_TYPE", "POST", "local_de");
$upd_perfil->addColumn("picos_preferidos", "STRING_TYPE", "POST", "picos_preferidos");
$upd_perfil->addColumn("prancha", "STRING_TYPE", "POST", "prancha");
$upd_perfil->addColumn("pe_pato", "STRING_TYPE", "POST", "pe_pato");
$upd_perfil->addColumn("tempo_de_bb", "STRING_TYPE", "POST", "tempo_de_bb");
$upd_perfil->addColumn("patrocinio", "STRING_TYPE", "POST", "patrocinio");
$upd_perfil->addColumn("manobra", "STRING_TYPE", "POST", "manobra");
$upd_perfil->addColumn("idolo", "STRING_TYPE", "POST", "idolo");
$upd_perfil->addColumn("filme", "STRING_TYPE", "POST", "filme");
$upd_perfil->addColumn("atividades", "STRING_TYPE", "POST", "atividades");
$upd_perfil->addColumn("recado", "STRING_TYPE", "POST", "recado");
$upd_perfil->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_perfil->addColumn("aprovado", "CHECKBOX_YN_TYPE", "POST", "aprovado");
$upd_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_perfil = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_perfil);
// Register triggers
$del_perfil->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_perfil->registerTrigger("END", "Trigger_Default_Redirect", 99, "sucesso.php");
$del_perfil->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_perfil->setTable("perfil");
$del_perfil->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsperfil = $tNGs->getRecordset("perfil");
$row_rsperfil = mysql_fetch_assoc($rsperfil);
$totalRows_rsperfil = mysql_num_rows($rsperfil);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!--templateinfo codeoutsidehtmlislocked="true"-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle</title>
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../../java.js"></script>
<!--Script png transparente-->
<script language="JavaScript">
	function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
	{
	   var arVersion = navigator.appVersion.split("MSIE")
	   var version = parseFloat(arVersion[1])
	   if ((version >= 5.5) && (document.body.filters)) 
	   {
		  for(var i=0; i<document.images.length; i++)
		  {
			 var img = document.images[i]
			 var imgName = img.src.toUpperCase()
			 if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
			 {
				var imgID = (img.id) ? "id='" + img.id + "' " : ""
				var imgClass = (img.className) ? "class='" + img.className + "' " : ""
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
				var imgStyle = "display:inline-block;" + img.style.cssText 
				if (img.align == "left") imgStyle = "float:left;" + imgStyle
				if (img.align == "right") imgStyle = "float:right;" + imgStyle
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
				var strNewHTML = "<span " + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
				img.outerHTML = strNewHTML
				i = i-1
			 }
		  }
	   }    
	}
	window.attachEvent("onload", correctPNG);
	</script>

<!-- InstanceBeginEditable name="head" -->
<?php
	echo $tNGs->getErrorMsg();
?>
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="57" colspan="2"><img src="../img/topo.jpg" alt="topo" width="770" height="100" border="0" usemap="#Map" class="borda_topo" /></td>
  </tr>
  <tr>
    <td width="552" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_toda">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_baixo_estistica">
            <tr>
              <td height="15" align="left" valign="middle"><span class="fonte"><a href="../home.php" class="fonte">home</a> - <a href="javascript:history.go(-1);" class="fonte">voltar</a></span> <a href="javascript:history.go(-1);"></a></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="32"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div>
            <h1 class="titulo"><?php 
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
              Perfil </h1>
            <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
            <?php $cnt1 = 0; ?>
                <?php do { ?>
                <?php $cnt1++; ?>
                <?php 
// Show IF Conditional region1 
if (@$totalRows_rsperfil > 1) {
?>
                <h2 class="titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
                <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                  <tr>
                    <td width="171" align="left" valign="top" class="fonte"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                    <td width="350" align="left" valign="top"><input name="nome_<?php echo $cnt1; ?>" type="text" class="box" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['nome']); ?>" size="50" />
                        <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("perfil", "nome", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="data_nasc_<?php echo $cnt1; ?>">Data de Nascimento:</label></td>
                    <td align="left" valign="top"><input name="data_nasc_<?php echo $cnt1; ?>" type="text" class="box" id="data_nasc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['data_nasc']); ?>" size="20" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("data_nasc");?> <?php echo $tNGs->displayFieldError("perfil", "data_nasc", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="mail_<?php echo $cnt1; ?>">Mail:</label></td>
                    <td align="left" valign="top"><input name="mail_<?php echo $cnt1; ?>" type="text" class="box" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['mail']); ?>" size="40" />
                        <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("perfil", "mail", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="local_de_<?php echo $cnt1; ?>">Local de (cidade):</label></td>
                    <td align="left" valign="top"><input name="local_de_<?php echo $cnt1; ?>" type="text" class="box" id="local_de_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['local_de']); ?>" size="40" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("local_de");?> <?php echo $tNGs->displayFieldError("perfil", "local_de", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="picos_preferidos_<?php echo $cnt1; ?>">Picos Preferidos:</label></td>
                    <td align="left" valign="top"><input name="picos_preferidos_<?php echo $cnt1; ?>" type="text" class="box" id="picos_preferidos_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['picos_preferidos']); ?>" size="40" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("picos_preferidos");?> <?php echo $tNGs->displayFieldError("perfil", "picos_preferidos", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="prancha_<?php echo $cnt1; ?>">Prancha (marca):</label></td>
                    <td align="left" valign="top"><input name="prancha_<?php echo $cnt1; ?>" type="text" class="box" id="prancha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['prancha']); ?>" size="32" maxlength="100" />
                        <?php echo $tNGs->displayFieldHint("prancha");?> <?php echo $tNGs->displayFieldError("perfil", "prancha", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="pe_pato_<?php echo $cnt1; ?>">P&eacute;-de-pato:</label></td>
                    <td align="left" valign="top"><input name="pe_pato_<?php echo $cnt1; ?>" type="text" class="box" id="pe_pato_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['pe_pato']); ?>" size="25" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("pe_pato");?> <?php echo $tNGs->displayFieldError("perfil", "pe_pato", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="tempo_de_bb_<?php echo $cnt1; ?>">Tempo que pratica o BB:</label></td>
                    <td align="left" valign="top"><input name="tempo_de_bb_<?php echo $cnt1; ?>" type="text" class="box" id="tempo_de_bb_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['tempo_de_bb']); ?>" size="20" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("tempo_de_bb");?> <?php echo $tNGs->displayFieldError("perfil", "tempo_de_bb", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="patrocinio_<?php echo $cnt1; ?>">Patroc&iacute;nio/Apoio:</label></td>
                    <td align="left" valign="top"><input name="patrocinio_<?php echo $cnt1; ?>" type="text" class="box" id="patrocinio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['patrocinio']); ?>" size="45" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("patrocinio");?> <?php echo $tNGs->displayFieldError("perfil", "patrocinio", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="manobra_<?php echo $cnt1; ?>">Manobra Preferida:</label></td>
                    <td align="left" valign="top"><input name="manobra_<?php echo $cnt1; ?>" type="text" class="box" id="manobra_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['manobra']); ?>" size="32" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("manobra");?> <?php echo $tNGs->displayFieldError("perfil", "manobra", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="idolo_<?php echo $cnt1; ?>">&Iacute;dolo do Esporte:</label></td>
                    <td align="left" valign="top"><input name="idolo_<?php echo $cnt1; ?>" type="text" class="box" id="idolo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['idolo']); ?>" size="32" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("idolo");?> <?php echo $tNGs->displayFieldError("perfil", "idolo", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="filme_<?php echo $cnt1; ?>">Filme de BB:</label></td>
                    <td align="left" valign="top"><input name="filme_<?php echo $cnt1; ?>" type="text" class="box" id="filme_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['filme']); ?>" size="32" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("filme");?> <?php echo $tNGs->displayFieldError("perfil", "filme", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="atividades_<?php echo $cnt1; ?>">Outras Atividades:</label></td>
                    <td align="left" valign="top"><input name="atividades_<?php echo $cnt1; ?>" type="text" class="box" id="atividades_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsperfil['atividades']); ?>" size="50" maxlength="50" />
                        <?php echo $tNGs->displayFieldHint("atividades");?> <?php echo $tNGs->displayFieldError("perfil", "atividades", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="recado_<?php echo $cnt1; ?>">Recado:</label></td>
                    <td align="left" valign="top"><textarea name="recado_<?php echo $cnt1; ?>" cols="50" rows="5" class="box" id="recado_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsperfil['recado']); ?></textarea>
                        <?php echo $tNGs->displayFieldHint("recado");?> <?php echo $tNGs->displayFieldError("perfil", "recado", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="foto_<?php echo $cnt1; ?>">Foto:</label></td>
                    <td align="left" valign="top"><input name="foto_<?php echo $cnt1; ?>" type="file" class="box" id="foto_<?php echo $cnt1; ?>" size="40" />
                        <?php echo $tNGs->displayFieldError("perfil", "foto", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="fonte"><label for="aprovado_<?php echo $cnt1; ?>">Aprovado:</label></td>
                    <td align="left" valign="top"><input name="aprovado_<?php echo $cnt1; ?>" type="checkbox" class="box" id="aprovado_<?php echo $cnt1; ?>" value="Y"  <?php if (!(strcmp(KT_escapeAttribute($row_rsperfil['aprovado']),"Y"))) {echo "checked";} ?> />
                        <?php echo $tNGs->displayFieldError("perfil", "aprovado", $cnt1); ?> </td>
                  </tr>
                </table>
                <input type="hidden" name="kt_pk_perfil_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsperfil['kt_pk_perfil']); ?>" />
                <?php } while ($row_rsperfil = mysql_fetch_assoc($rsperfil)); ?>
                <div class="KT_bottombuttons">
                  <div>
                    <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
                    <input name="KT_Insert1" type="submit" class="box_confirma" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                    <?php 
      // else Conditional region1
      } else { ?>
                    <div class="KT_operations">
                      <input name="KT_Insert1" type="submit" class="box_confirma" onclick="nxt_form_insertasnew(this, 'id')" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" />
                    </div>
                    <input name="KT_Update1" type="submit" class="box_confirma" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                    <input name="KT_Delete1" type="submit" class="box_confirma" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" value="<?php echo NXT_getResource("Delete_FB"); ?>" />
                    <?php }
      // endif Conditional region1
      ?>
                    <input name="KT_Cancel1" type="button" class="box_confirma" onclick="javascript:history.go(-1);" value="<?php echo NXT_getResource("Cancel_FB"); ?>" />
                    <a href="javascript:history.go(-1);"></a>                  </div>
                </div>
              </form>
            </div>
            <br class="clearfixplain" />
          </div></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="218" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="4" class="borda_estatistica">
      <tr>
        <td align="center" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="4" class="borda_baixo_estistica">
          <tr class="borda_estatistica">
            <td width="21%" align="center" valign="top"><img src="../img/estatisticas.gif" width="32" height="32" /></td>
            <td width="79%" align="left" valign="middle"><span class="fonte_negrito"> Estatisticas</span></td>
          </tr>
        </table>          </td>
        </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="20" class="estatisticas_titulo"><span class="estatisticas_titulo">Noticias</span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_noticias ?> </span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Saquabb: </span><span class="resultado_estatistica"><?php echo $totalRows_not_saquabb ?> </span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- BBlagos: </span><span class="resultado_estatistica"><?php echo $totalRows_not_bblagos ?> </span></td>
          </tr>
          <tr>
            <td class="fonte_negrito">- Girls: <span class="resultado_estatistica"><?php echo $totalRows_not_girls ?> </span></td>
          </tr>
          <tr>
            <td class="fonte_negrito">- Atualidades: <span class="resultado_estatistica"><?php echo $totalRows_not_atual ?> </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="fonte_negrito">Total de Fotos:  </span><span class="resultado_estatistica"><?php echo $totalRows_fotos ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td height="20" class="estatisticas_titulo">Perfil de Atletas </td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil ?></span></td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Aprovados: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil_Y ?></span></td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Aguardando Aprova&ccedil;&atilde;o: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil_n ?></span></td>
            </tr>
          </table>          </td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="20" class="estatisticas_titulo">&Aacute;lbuns de Festas </td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_festas ?> </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="poly" coords="541,11,537,56,576,56,573,10" href="#" alt="Site Seguro!" />
<area shape="circle" coords="612,34,25" href="#" alt="Informa&ccedil;&otilde;es!" />
<area shape="circle" coords="727,33,27" href="#" alt="Sair do Painel de Controle!" />
<area shape="circle" coords="671,34,21" href="#" alt="Adicionar o Painel ao seus Favoritos!" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($noticias);

mysql_free_result($fotos);

mysql_free_result($perfil);

mysql_free_result($perfil_Y);

mysql_free_result($perfil_n);

mysql_free_result($not_saquabb);

mysql_free_result($not_bblagos);

mysql_free_result($not_girls);

mysql_free_result($festas);

mysql_free_result($not_atual);
?>