<?php require_once('../../Connections/saquabb.php'); ?>
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
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete2(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("foto3");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto3");
  $uploadObj->setDbFieldName("foto3");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 450, 0);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload2 trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploads/fotos/");
  $deleteObj->setDbFieldName("foto2");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto2");
  $uploadObj->setDbFieldName("foto2");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 450, 0);
  $uploadObj->setMaxSize(1000);
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
  $deleteObj->setDbFieldName("foto1");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto1");
  $uploadObj->setDbFieldName("foto1");
  $uploadObj->setFolder("../../uploads/fotos/");
  $uploadObj->setResize("true", 450, 0);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_gabriel = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_gabriel);
// Register triggers
$ins_gabriel->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_gabriel->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_gabriel->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
$ins_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
$ins_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload1", 98);
$ins_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload2", 98);
// Add columns
$ins_gabriel->setTable("gabriel");
$ins_gabriel->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_gabriel->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_gabriel->addColumn("materia", "STRING_TYPE", "POST", "materia");
$ins_gabriel->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$ins_gabriel->addColumn("desc1", "STRING_TYPE", "POST", "desc1");
$ins_gabriel->addColumn("fotografo1", "STRING_TYPE", "POST", "fotografo1");
$ins_gabriel->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$ins_gabriel->addColumn("desc2", "STRING_TYPE", "POST", "desc2");
$ins_gabriel->addColumn("fotografo2", "STRING_TYPE", "POST", "fotografo2");
$ins_gabriel->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$ins_gabriel->addColumn("desc3", "STRING_TYPE", "POST", "desc3");
$ins_gabriel->addColumn("fotografo3", "STRING_TYPE", "POST", "fotografo3");
$ins_gabriel->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_gabriel = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_gabriel);
// Register triggers
$upd_gabriel->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_gabriel->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_gabriel->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
$upd_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
$upd_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload1", 98);
$upd_gabriel->registerTrigger("AFTER", "Trigger_ImageUpload2", 98);
// Add columns
$upd_gabriel->setTable("gabriel");
$upd_gabriel->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_gabriel->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_gabriel->addColumn("materia", "STRING_TYPE", "POST", "materia");
$upd_gabriel->addColumn("foto1", "FILE_TYPE", "FILES", "foto1");
$upd_gabriel->addColumn("desc1", "STRING_TYPE", "POST", "desc1");
$upd_gabriel->addColumn("fotografo1", "STRING_TYPE", "POST", "fotografo1");
$upd_gabriel->addColumn("foto2", "FILE_TYPE", "FILES", "foto2");
$upd_gabriel->addColumn("desc2", "STRING_TYPE", "POST", "desc2");
$upd_gabriel->addColumn("fotografo2", "STRING_TYPE", "POST", "fotografo2");
$upd_gabriel->addColumn("foto3", "FILE_TYPE", "FILES", "foto3");
$upd_gabriel->addColumn("desc3", "STRING_TYPE", "POST", "desc3");
$upd_gabriel->addColumn("fotografo3", "STRING_TYPE", "POST", "fotografo3");
$upd_gabriel->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_gabriel = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_gabriel);
// Register triggers
$del_gabriel->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_gabriel->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
$del_gabriel->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_gabriel->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_gabriel->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
// Add columns
$del_gabriel->setTable("gabriel");
$del_gabriel->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgabriel = $tNGs->getRecordset("gabriel");
$row_rsgabriel = mysql_fetch_assoc($rsgabriel);
$totalRows_rsgabriel = mysql_num_rows($rsgabriel);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<script language="javascript" type="text/javascript" src="../../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu",
	
	theme_advanced_buttons2_add : "forecolor,backcolor",
	theme_advanced_buttons1_add : "fontsizeselect",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {font-size: 16pt}
-->
</style><!-- InstanceEndEditable -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:260px;
	height:70px;
	z-index:1;
	left: 17px;
	top: 21px;
	background-color: #FFFF33;
	overflow: hidden;
}
-->
</style>
</head>
<script language="JavaScript" src="../../java.js"></script>
<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-1";
urchinTracker();
</script>
<table width="601" height="396" border="0" align="center" cellpadding="0" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../../carnaporto/index.php"></a><img src="../../imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="140" align="center" valign="top" bgcolor="#E6F9FD"><table border="0" cellpadding="0" cellspacing="8" class="conteudo_esquerdo_borda_meio">
          <tr>
            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Principal</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="8"><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td width="106" align="left" valign="middle" class="fonte_not"><a href="../../index.php">Home</a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../arquivo.php">Arquivo de Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../galerias.php">Galerias de Fotos</a> </td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../videos.php">V&iacute;deos</a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../perfil.php">Perfil dos Atletas </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../contato.php">Fale Conosco </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">BBLagos</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../info.php">Informa&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">OVNI</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../ovni/ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../ovni/galeria.php">Galeria de Fotos </a></td>
          </tr>
          
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Saquabb Girls </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../girls/index.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Variedades</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../festas/index.php">Fotos das Festas </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../vemai.php">Vem a&iacute;... </a></td>
          </tr>
          <tr>
            <td><img src="../../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../../festa_anuncio.php">Anuncie sua Festa </a></td>
          </tr>
        </table>
          <table width="140" border="0" cellpadding="0" cellspacing="2" bgcolor="#E6F9FD">
            <tr>
              <td width="133" height="21" align="left" valign="middle"><img src="../../imagens/titulos/publicidade.jpg" width="128" height="16" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="../../imagens/publicidade/logorb.jpg" alt="RB Provider" width="120" height="38" border="0" /></a></td>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.saqua.com.br"><img src="../../imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="120" height="45" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.redsdesign.com.br"><img src="../../imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="120" height="35" border="0" longdesc="http://www.redsdesign.com.br" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.gnunes.net"><img src="../../imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="120" height="35" border="0" class="borda_tabela" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        <br /></td>
        <td width="627" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
            <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
            <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
            <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
            </script>
          <table width="100%" border="0" cellpadding="4" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <th align="left" valign="top" bgcolor="#E6F9FD" scope="col">&nbsp;
                <?php
	echo $tNGs->getErrorMsg();
?>
                <?php 
// Show IF Conditional region1 
if (null) {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?> <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
                  <span class="style1">Inserir Artigo na coluna QU&Eacute; SE EU? </span>
                <div class="KT_tng">
  <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                      <?php $cnt1 = 0; ?>
                      <?php do { ?>
                      <?php $cnt1++; ?>
                      <?php 
// Show IF Conditional region1 
if (null) {
?>
                      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsgabriel > 1) {
?>
                      <h2 class="comentario"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                      <?php } 
// endif Conditional region1
?>
                      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                        <tr>
                          <td width="86" class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                          <td width="411"><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['titulo']); ?>" size="50" maxlength="100" />
                              <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("gabriel", "titulo", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="data_<?php echo $cnt1; ?>">Data:</label></td>
                          <td valign="middle"><input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['data']); ?>" size="30" maxlength="50" />
                              <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("gabriel", "data", $cnt1); ?> <span class="fonte_not">(EX: Quarta-feira, 14 de mar&ccedil;o de 2007) </span></td>
                        </tr>
                        <tr>
                          <td valign="top" class="KT_th"><label for="materia_<?php echo $cnt1; ?>">Materia:</label></td>
                          <td><textarea name="materia_<?php echo $cnt1; ?>" id="materia_<?php echo $cnt1; ?>" cols="60" rows="15"><?php echo KT_escapeAttribute($row_rsgabriel['materia']); ?></textarea>
                              <?php echo $tNGs->displayFieldHint("materia");?> <?php echo $tNGs->displayFieldError("gabriel", "materia", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="foto1_<?php echo $cnt1; ?>">Foto 1:</label></td>
                          <td><input type="file" name="foto1_<?php echo $cnt1; ?>" id="foto1_<?php echo $cnt1; ?>" size="32" />
                              <?php echo $tNGs->displayFieldError("gabriel", "foto1", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="desc1_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o 1:</label></td>
                          <td><input type="text" name="desc1_<?php echo $cnt1; ?>" id="desc1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['desc1']); ?>" size="42" />
                              <?php echo $tNGs->displayFieldHint("desc1");?> <?php echo $tNGs->displayFieldError("gabriel", "desc1", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="fotografo1_<?php echo $cnt1; ?>">Fot&oacute;grafo1:</label></td>
                          <td><input type="text" name="fotografo1_<?php echo $cnt1; ?>" id="fotografo1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['fotografo1']); ?>" size="35" />
                              <?php echo $tNGs->displayFieldHint("fotografo1");?> <?php echo $tNGs->displayFieldError("gabriel", "fotografo1", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="foto2_<?php echo $cnt1; ?>">Foto 2:</label></td>
                          <td><input type="file" name="foto2_<?php echo $cnt1; ?>" id="foto2_<?php echo $cnt1; ?>" size="32" />
                              <?php echo $tNGs->displayFieldError("gabriel", "foto2", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="desc2_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o 2:</label></td>
                          <td><input type="text" name="desc2_<?php echo $cnt1; ?>" id="desc2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['desc2']); ?>" size="42" />
                              <?php echo $tNGs->displayFieldHint("desc2");?> <?php echo $tNGs->displayFieldError("gabriel", "desc2", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="fotografo2_<?php echo $cnt1; ?>">Fot&oacute;grafo2:</label></td>
                          <td><input type="text" name="fotografo2_<?php echo $cnt1; ?>" id="fotografo2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['fotografo2']); ?>" size="35" />
                              <?php echo $tNGs->displayFieldHint("fotografo2");?> <?php echo $tNGs->displayFieldError("gabriel", "fotografo2", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="foto3_<?php echo $cnt1; ?>">Foto 3:</label></td>
                          <td><input type="file" name="foto3_<?php echo $cnt1; ?>" id="foto3_<?php echo $cnt1; ?>" size="32" />
                              <?php echo $tNGs->displayFieldError("gabriel", "foto3", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="desc3_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o 3:</label></td>
                          <td><input type="text" name="desc3_<?php echo $cnt1; ?>" id="desc3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['desc3']); ?>" size="42" />
                              <?php echo $tNGs->displayFieldHint("desc3");?> <?php echo $tNGs->displayFieldError("gabriel", "desc3", $cnt1); ?> </td>
                        </tr>
                        <tr>
                          <td class="KT_th"><label for="fotografo3_<?php echo $cnt1; ?>">Fot&oacute;grafo3:</label></td>
                          <td><input type="text" name="fotografo3_<?php echo $cnt1; ?>" id="fotografo3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgabriel['fotografo3']); ?>" size="35" />
                              <?php echo $tNGs->displayFieldHint("fotografo3");?> <?php echo $tNGs->displayFieldError("gabriel", "fotografo3", $cnt1); ?> </td>
                        </tr>
                      </table>
                      <input type="hidden" name="kt_pk_gabriel_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsgabriel['kt_pk_gabriel']); ?>" />
                      <?php } while ($row_rsgabriel = mysql_fetch_assoc($rsgabriel)); ?>
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
              <p>&nbsp;</p></th>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../../imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>