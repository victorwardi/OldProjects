<?php require_once('../../Connections/saquabb.php'); ?>
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

$MM_restrictGoTo = "../index.php";
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
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

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
  $uploadObj->setFolder("../../album/capa/");
  $uploadObj->setResize("false", 120, 90);
  $uploadObj->setMaxSize(200);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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

// Make an update transaction instance
$upd_galeria = new tNG_update($conn_saquabb);
$tNGs->addTransaction($upd_galeria);
// Register triggers
$upd_galeria->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_galeria->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_galeria->registerTrigger("END", "Trigger_Default_Redirect", 99, "gal_listar.php");
$upd_galeria->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_galeria->setTable("galeria");
$upd_galeria->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_galeria->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_galeria->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_galeria->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgaleria = $tNGs->getRecordset("galeria");
$row_rsgaleria = mysql_fetch_assoc($rsgaleria);
$totalRows_rsgaleria = mysql_num_rows($rsgaleria);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<!--templateinfo codeoutsidehtmlislocked="true"-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle</title>
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
              <td height="32"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><p class="titulo">&nbsp; Atualizar Galeria : </p>
                      <table width="401" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="150" align="center" valign="middle"><table width="45" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                              <tr>
                                <td width="37"><span class="titulo"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../album/capa/", "{rsgaleria.imagem}", 120, 0, true); ?>" /></span></td>
                              </tr>
                            </table></td>
                          <td width="251" align="left" valign="middle" class="titulo"><?php echo $row_rsgaleria['nome']; ?></td>
                        </tr>
                      </table>
                      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                          <tr>
                            <td align="left" valign="top" class="fonte_negrito"><label for="imagem">Imagem:</label></td>
                            <td align="left" valign="top"><input name="imagem" type="file" class="box" id="imagem" size="32" />
                                <?php echo $tNGs->displayFieldError("galeria", "imagem"); ?> </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="fonte_negrito"><label for="nome">Nome:</label></td>
                            <td align="left" valign="top"><input name="nome" type="text" class="box" id="nome" value="<?php echo KT_escapeAttribute($row_rsgaleria['nome']); ?>" size="32" />
                                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("galeria", "nome"); ?> </td>
                          </tr>
                          <tr>
                            <td height="35" align="left" valign="top" class="fonte_negrito"><label for="descricao">Descri��o:</label></td>
                            <td align="left" valign="top"><input name="descricao" type="text" class="box" id="descricao" value="<?php echo KT_escapeAttribute($row_rsgaleria['descricao']); ?>" size="32" />
                                <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("galeria", "descricao"); ?> </td>
                          </tr>
                          <tr class="KT_buttons">
                            <td colspan="2" align="center" valign="middle"><input name="KT_Update1" type="submit" class="box_confirma" id="KT_Update1" value="Atualizar Galeria" />                            </td>
                          </tr>
                        </table>
                      </form>
                      <p>&nbsp;</p></td>
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