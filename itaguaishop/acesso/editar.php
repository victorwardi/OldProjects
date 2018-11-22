<?php require_once('../Connections/ConBD.php'); ?>
<?php session_start();?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
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
?>
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

//start Trigger_ImageUpload5 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload5(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto4");
  $uploadObj->setDbFieldName("foto4");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload5 trigger

//start Trigger_ImageUpload4 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload4(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto3");
  $uploadObj->setDbFieldName("foto3");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload4 trigger

//start Trigger_ImageUpload3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload3(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto2");
  $uploadObj->setDbFieldName("foto2");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload3 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto1");
  $uploadObj->setDbFieldName("foto1");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setResize("true", 200, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload2 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("logotipo");
  $uploadObj->setDbFieldName("logotipo");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto");
  $uploadObj->setDbFieldName("foto");
  $uploadObj->setFolder("../Uploads/fotos/");
  $uploadObj->setResize("true", 500, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an update transaction instance
$upd_lojas = new tNG_update($conn_ConBD);
$tNGs->addTransaction($upd_lojas);
// Register triggers
$upd_lojas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_lojas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_lojas->registerTrigger("END", "Trigger_Default_Redirect", 99, "entrada.php");
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload3", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload4", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload5", 97);
// Add columns
$upd_lojas->setTable("lojas");
$upd_lojas->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_lojas->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_lojas->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_lojas->addColumn("atividade", "STRING_TYPE", "POST", "atividade");
$upd_lojas->addColumn("andar", "STRING_TYPE", "POST", "andar");
$upd_lojas->addColumn("numero", "STRING_TYPE", "POST", "numero");
$upd_lojas->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_lojas->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_lojas->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_lojas->addColumn("website", "STRING_TYPE", "POST", "website");
$upd_lojas->addColumn("logotipo", "FILE_TYPE", "FILES", "logotipo");
$upd_lojas->addColumn("promocao1", "STRING_TYPE", "POST", "promocao1");
$upd_lojas->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$upd_lojas->addColumn("valor1", "STRING_TYPE", "POST", "valor1");
$upd_lojas->addColumn("promocao2", "STRING_TYPE", "POST", "promocao2");
$upd_lojas->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$upd_lojas->addColumn("valor2", "STRING_TYPE", "POST", "valor2");
$upd_lojas->addColumn("promocao3", "STRING_TYPE", "POST", "promocao3");
$upd_lojas->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$upd_lojas->addColumn("valor3", "STRING_TYPE", "POST", "valor3");
$upd_lojas->addColumn("promocao4", "STRING_TYPE", "POST", "promocao4");
$upd_lojas->addColumn("foto4", "FILE_TYPE", "FILES", "foto4");
$upd_lojas->addColumn("valor4", "STRING_TYPE", "POST", "valor4");
$upd_lojas->setPrimaryKey("login", "STRING_TYPE", "SESSION", "MM_Username");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslojas = $tNGs->getRecordset("lojas");
$row_rslojas = mysql_fetch_assoc($rslojas);
$totalRows_rslojas = mysql_num_rows($rslojas);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Itagua&iacute; Shopping Center ||</title>
<style type="text/css">
<!--
body {
	background-color: #5AC7EE;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css/estilo_isc.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	z-index:1;
}
#Layer2 {
	position:absolute;
	z-index:2;
}
#Layer3 {
	position:absolute;
	z-index:3;
}
#Layer4 {
	position:absolute;
	z-index:4;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<a name="topo" id="topo"></a>
<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="19" height="98">&nbsp;</td>
    <td colspan="2"><table width="734" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74" rowspan="2" align="left" valign="top"><a href="../index.php"><img src="../img/logo_01.jpg" width="56" height="93" border="0" /></a></td>
        <td width="660" height="23" align="right" valign="top" background="../img/listra_02.gif" class="txt_04"><table width="250" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','240','height','21','src','../flash/top_menuzinho','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/top_menuzinho','wmode','transparent' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="240" height="21">
              <param name="movie" value="../flash/top_menuzinho.swf" />
			  <param name="wmode" value="transparent">
              <param name="quality" value="high" />
              <embed src="../flash/top_menuzinho.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="21"></embed>
            </object></noscript></td>
            <td width="10">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="75"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','660','height','75','src','../flash/top_menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/top_menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="660" height="75">
          <param name="movie" value="../flash/top_menu.swf" />
          <param name="quality" value="high" />
          <embed src="../flash/top_menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="660" height="75"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
    <td width="7" rowspan="2" valign="top" background="../img/listra_03.gif"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"><img src="../img/listra_canto_01.gif" width="19" height="2" /></div></td>
    <td height="2" colspan="2" class="fundo_roxo_01"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"></div></td>
    <td height="2" colspan="2"><div align="left"></div></td>
    <td height="2"><div align="left"></div></td>
  </tr>
  <tr>
    <td rowspan="4" background="../img/listra_01.gif">&nbsp;</td>
    <td width="592" valign="top" bgcolor="#f5f5f5"><table width="592" height="200" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr valign="top">
        <td width="468" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','468','height','60','src','../flash/anuncie_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_01' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="468" height="60">
              <param name="movie" value="../flash/anuncie_01.swf" />
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="468" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
        <td width="120" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','120','height','60','src','../flash/anuncie_02','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_02' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="120" height="60">
              <param name="movie" value="../flash/anuncie_02.swf" />
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_02.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
      </tr>
      <tr valign="top">
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
      </tr>
      <tr>
        <td height="128" colspan="3"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','590','height','138','src','../flash/banner_lojas','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/banner_lojas' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="138">
          <param name="movie" value="../flash/banner_lojas.swf" />
          <param name="quality" value="high" />
          <embed src="../flash/banner_lojas.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="590" height="138"></embed>
        </object></noscript></td>
        <td width="2" rowspan="2" valign="top"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="3" align="left" valign="top" bgcolor="#f5f5f5"><table width="590" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25">&nbsp;</td>
            <td width="553" height="25">&nbsp;</td>
            <td width="10">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left"><p><span class="txt_09">P&aacute;gina de Atualiza&ccedil;&atilde;o de dados.</span><br />
              <span class="txt_03">Utilize esta p&aacute;gina para manter seus dados atualizados e inserir promo&ccedil;&otilde;es. </span></p>
              </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top">&nbsp;
<form method="post" id="form2" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                <table cellpadding="4" cellspacing="0" class="txt_02">
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="nome">Nome:</label></td>
                    <td align="left" valign="top"><input type="text" name="nome" id="nome" value="<?php echo KT_escapeAttribute($row_rslojas['nome']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("lojas", "nome"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="titulo">T&iacute;tulo:</label></td>
                    <td align="left" valign="top"><input type="text" name="titulo" id="titulo" value="<?php echo KT_escapeAttribute($row_rslojas['titulo']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("lojas", "titulo"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="logotipo">Logotipo:</label></td>
                    <td align="left" valign="top"><input type="file" name="logotipo" id="logotipo" size="32" />
                        <?php echo $tNGs->displayFieldError("lojas", "logotipo"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="descricao">Descri&ccedil;&atilde;o:</label></td>
                    <td align="left" valign="top"><textarea name="descricao" id="descricao" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rslojas['descricao']); ?></textarea>
                        <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("lojas", "descricao"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="atividade">Atividade:</label></td>
                    <td align="left" valign="top"><input type="text" name="atividade" id="atividade" value="<?php echo KT_escapeAttribute($row_rslojas['atividade']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("atividade");?> <?php echo $tNGs->displayFieldError("lojas", "atividade"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="localizacao">Andar:</label></td>
                    <td align="left" valign="top"><input type="text" name="andar" id="andar" value="<?php echo $row_rslojas['andar']; ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("localizacao");?> <?php echo $tNGs->displayFieldError("lojas", "localizacao"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th">N&uacute;mero</td>
                    <td align="left" valign="top"><input type="text" name="numero" id="numero" value="<?php echo $row_rslojas['numero']; ?>" size="32" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="telefone">Telefone:</label></td>
                    <td align="left" valign="top"><input type="text" name="telefone" id="telefone" value="<?php echo KT_escapeAttribute($row_rslojas['telefone']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("lojas", "telefone"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="foto">Foto da loja:</label></td>
                    <td align="left" valign="top"><input type="file" name="foto" id="foto" size="32" />
                        <?php echo $tNGs->displayFieldError("lojas", "foto"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="email">Email:</label></td>
                    <td align="left" valign="top"><input type="text" name="email" id="email" value="<?php echo KT_escapeAttribute($row_rslojas['email']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("lojas", "email"); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="KT_th"><label for="website">Website:</label></td>
                    <td align="left" valign="top"><input type="text" name="website" id="website" value="<?php echo KT_escapeAttribute($row_rslojas['website']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("website");?> <?php echo $tNGs->displayFieldError("lojas", "website"); ?> </td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" align="left" valign="top" class="KT_th"><fieldset><legend>Promoção 1</legend>
                      <table cellpadding="4" cellspacing="0" class="txt_02">
                        <tr>
                          <td align="left" valign="top" class="KT_th"><label for="promocao1">T&iacute;tulo:</label></td>
                          <td align="left" valign="top"><input type="text" name="promocao1" id="promocao1" value="<?php echo KT_escapeAttribute($row_rslojas['promocao1']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("promocao1");?> <?php echo $tNGs->displayFieldError("lojas", "promocao1"); ?> </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="KT_th"><label for="foto1">Foto:</label></td>
                          <td align="left" valign="top"><input type="file" name="foto1" id="foto1" size="32" />
                              <?php echo $tNGs->displayFieldError("lojas", "foto1"); ?> </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="KT_th"><label for="valor1">Valor:</label></td>
                          <td align="left" valign="top"><input type="text" name="valor1" id="valor1" value="<?php echo KT_escapeAttribute($row_rslojas['valor1']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("valor1");?> <?php echo $tNGs->displayFieldError("lojas", "valor1"); ?> </td>
                        </tr>
                      </table>
                    </fieldset>&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="30" colspan="2" align="left" valign="top" class="KT_th"><fieldset><legend>Promoção 2</legend>
                      <table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr class="txt_02">
                          <td align="left" valign="top" class="KT_th"><label for="label">T&iacute;tulo:</label></td>
                          <td align="left" valign="top"><input type="text" name="promocao2" id="promocao2" value="<?php echo KT_escapeAttribute($row_rslojas['promocao2']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("promocao2");?> <?php echo $tNGs->displayFieldError("lojas", "promocao2"); ?> </td>
                        </tr>
                        <tr class="txt_02">
                          <td align="left" valign="top" class="KT_th"><label for="label2">Foto:</label></td>
                          <td align="left" valign="top"><input type="file" name="foto2" id="foto2" size="32" />
                              <?php echo $tNGs->displayFieldError("lojas", "foto2"); ?> </td>
                        </tr>
                        <tr class="txt_02">
                          <td align="left" valign="top" class="KT_th"><label for="label3">Valor:</label></td>
                          <td align="left" valign="top"><input type="text" name="valor2" id="valor2" value="<?php echo KT_escapeAttribute($row_rslojas['valor2']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("valor2");?> <?php echo $tNGs->displayFieldError("lojas", "valor2"); ?> </td>
                        </tr>
                      </table>
                    </fieldset> </td>
                    </tr>
                  <tr>
                    <td height="30" colspan="2" align="left" valign="top" class="KT_th"><fieldset><legend>Promoção 3</legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr class="txt_02">
                            <td align="left" valign="top" class="KT_th"><label for="label">T&iacute;tulo:</label></td>
                            <td align="left" valign="top"><input type="text" name="promocao3" id="promocao3" value="<?php echo KT_escapeAttribute($row_rslojas['promocao3']); ?>" size="32" />
                                <?php echo $tNGs->displayFieldHint("promocao3");?> <?php echo $tNGs->displayFieldError("lojas", "promocao3"); ?> </td>
                          </tr>
                          <tr class="txt_02">
                            <td align="left" valign="top" class="KT_th"><label for="label2">Foto:</label></td>
                            <td align="left" valign="top"><input type="file" name="foto3" id="foto3" size="32" />
                                <?php echo $tNGs->displayFieldError("lojas", "foto3"); ?> </td>
                          </tr>
                          <tr class="txt_02">
                            <td align="left" valign="top" class="KT_th"><label for="label3">Valor:</label></td>
                            <td align="left" valign="top"><input type="text" name="valor3" id="valor3" value="<?php echo KT_escapeAttribute($row_rslojas['valor3']); ?>" size="32" />
                                <?php echo $tNGs->displayFieldHint("valor3");?> <?php echo $tNGs->displayFieldError("lojas", "valor3"); ?> </td>
                          </tr>
                        </table>
                    </fieldset></td>
                    </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top" class="KT_th"><fieldset><legend>Promoção 4</legend>
                      <table width="92%" cellpadding="4" cellspacing="0" class="txt_02">
                        <tr>
                          <td width="15%" align="left" valign="top" class="KT_th"><label for="label">T&iacute;tulo:</label></td>
                          <td width="85%" align="left" valign="top"><input type="text" name="promocao4" id="promocao4" value="<?php echo KT_escapeAttribute($row_rslojas['promocao4']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("promocao4");?> <?php echo $tNGs->displayFieldError("lojas", "promocao4"); ?> </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="KT_th"><label for="label2">Foto:</label></td>
                          <td align="left" valign="top"><input type="file" name="foto4" id="foto4" size="32" />
                              <?php echo $tNGs->displayFieldError("lojas", "foto4"); ?> </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="KT_th"><label for="label3">Valor:</label></td>
                          <td align="left" valign="top"><input type="text" name="valor4" id="valor4" value="<?php echo KT_escapeAttribute($row_rslojas['valor4']); ?>" size="32" />
                              <?php echo $tNGs->displayFieldHint("valor4");?> <?php echo $tNGs->displayFieldError("lojas", "valor4"); ?> </td>
                        </tr>
                      </table>
                      </fieldset></td>
                    </tr>
                  <tr class="KT_buttons">
                    <td colspan="2"><input type="submit" name="KT_Update1" id="KT_Update1" value="Salvar" />                    </td>
                  </tr>
                </table>
                </form>
              <p>&nbsp;</p></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
    <td width="142" height="423" valign="top" bgcolor="#e6e6e6"><table width="142" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="142" height="200" cellpadding="0" cellspacing="0">
            <tr>
              <td height="153" bgcolor="#121212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','153','src','../flash/banner_vert_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/banner_vert_01' ); //end AC code
        </script>
                  <noscript>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="153">
                    <param name="movie" value="../flash/banner_vert_01.swf" />
                    <param name="quality" value="high" />
                    <embed src="../flash/banner_vert_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="153"></embed>
                  </object>
                </noscript></td>
            </tr>
            <tr>
              <td height="47"><img src="../img/img_algumas_lojas_01.gif" width="142" height="47" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="200"><span class="fundo_roxo_01"><a href="../musicaaovivo/index.html"><img src="../img/barra_vertical_02.1.gif" width="142" height="200" border="0" /></a></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="7" rowspan="4" valign="top" background="../img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
  </tr>
  
  <tr>
    <td align="center" valign="top" bgcolor="#f5f5f5"><table width="586" cellpadding="0" cellspacing="0">
      <tr valign="top" bgcolor="#f5f5f5">
        <td width="9" height="4"><div align="left"></div></td>
        <td width="108" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="64" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="208" height="4"><div align="left"></div></td>
        <td width="72" height="4"><div align="left"></div></td>
        <td width="79" height="4"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="8"><table width="586" cellpadding="0" cellspacing="0" class="contorno_01">
          <tr>
            <td width="9" height="30">&nbsp;</td>
            <td width="108"><img src="../img/titulo_desenvolvido_01.jpg" width="108" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="64"><img src="../img/titulo_seguranca_01.gif" width="64" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="208">&nbsp;</td>
            <td width="72">&nbsp;</td>
            <td width="79">&nbsp;</td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td><a href="http://www.lobsterdesigner.com.br" target="_blank"><img src="../img/logo_lobster_02.jpg" width="108" height="25" border="0" /></a></td>
            <td>&nbsp;</td>
            <td align="left"><a href="http://www.eliteserv.com.br/" target="_blank"><img src="../img/logo_elite_02.jpg" width="36" height="43" border="0" /></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      
      <tr valign="top" bgcolor="#f5f5f5">
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4" align="left"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
      </tr>
    </table></td>
    <td valign="middle" background="../img/listra_04.gif"><table width="142" height="90" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#e6e6e6"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','82','src','../flash/anuncie_03','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_03' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="82">
            <param name="movie" value="../flash/anuncie_03.swf" />
            <param name="quality" value="high" />
            <embed src="../flash/anuncie_03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="82"></embed>
          </object>
          </noscript>          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" class="fundo_roxo_01"> Copyright &copy; 2007 Itagua&iacute; Shopping - Inc. All rights reserved.</td>
    <td width="142" rowspan="2" valign="top" background="../img/listra_04.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="592" height="80" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" align="center" valign="bottom"><span class="txt_01"><a href="../horarios/index.html">Hor&aacute;rio de Funcionamento</a>&nbsp; |&nbsp; <a href="../comochegar/index.html">Como Chegar</a>&nbsp; |&nbsp; <a href="../siteadaptado/index.html">Site Adaptado</a></span></td>
      </tr>
      <tr>
        <td height="58" align="center" valign="top" class="primeiro"><span class="txt_02">(0xx21) 2688-4293        |</span> <span class="primeiro_a"><a href="mailto:contato@itaguaishoppingcenter.com.br">contato@itaguaishoppingcenter.com.br</a></span><br />
          <span class="txt_02">Rua Dr. Curvelo Cavalcante, 189 - Centro - Itagua&iacute; - RJ</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
