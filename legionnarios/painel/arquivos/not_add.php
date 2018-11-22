<?php require_once('../../Connections/legion.php'); ?><?php
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
$conn_legion = new KT_connection($legion, $database_legion);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../fotos/");
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
  $uploadObj->setFolder("../../fotos/");
  $uploadObj->setResize("false", 100, 75);
  $uploadObj->setMaxSize(1000);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_noticias = new tNG_multipleInsert($conn_legion);
$tNGs->addTransaction($ins_noticias);
// Register triggers
$ins_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_noticias->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "not_edite.php");
$ins_noticias->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$ins_noticias->setTable("noticias");
$ins_noticias->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_noticias->addColumn("materia", "STRING_TYPE", "POST", "materia");
$ins_noticias->addColumn("data", "STRING_TYPE", "POST", "data");
$ins_noticias->addColumn("fonte", "STRING_TYPE", "POST", "fonte");
$ins_noticias->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$ins_noticias->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_noticias = new tNG_multipleUpdate($conn_legion);
$tNGs->addTransaction($upd_noticias);
// Register triggers
$upd_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_noticias->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "not_edite.php");
$upd_noticias->registerTrigger("AFTER", "Trigger_ImageUpload", 98);
// Add columns
$upd_noticias->setTable("noticias");
$upd_noticias->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_noticias->addColumn("materia", "STRING_TYPE", "POST", "materia");
$upd_noticias->addColumn("data", "STRING_TYPE", "POST", "data");
$upd_noticias->addColumn("fonte", "STRING_TYPE", "POST", "fonte");
$upd_noticias->addColumn("imagem", "FILE_TYPE", "FILES", "imagem");
$upd_noticias->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_noticias = new tNG_multipleDelete($conn_legion);
$tNGs->addTransaction($del_noticias);
// Register triggers
$del_noticias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_noticias->registerTrigger("END", "Trigger_Default_Redirect", 99, "not_edite.php");
$del_noticias->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_noticias->setTable("noticias");
$del_noticias->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnoticias = $tNGs->getRecordset("noticias");
$row_rsnoticias = mysql_fetch_assoc($rsnoticias);
$totalRows_rsnoticias = mysql_num_rows($rsnoticias);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - Legionn&aacute;rios</title>
<script language="javascript" type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
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
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
#navigation td {
	background-color: #4D494A;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #F7D957;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	padding-top: 8px;
	padding-right: 6px;
	padding-bottom: 8px;
	padding-left: 8px;
	}
	
#navigation a:hover {
	color:#FFCC00;
	background-color: #FFFFFF;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	font-weight: bolder;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
	font-weight: bolder;
	}
#conteudo td {
	left: 10px;
}
#tabela td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: normal;
	font-weight: bolder;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px solid #666666;
}
#tabela li {
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #666666;
	border-right-color: #666666;
	border-bottom-color: #666666;
	border-left-color: #666666;
}
.borda {
	border: 1px solid #000000;
}
.style1 {color: #F8D95A}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#4D494A"><img src="topo.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#4D494A"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#4D494A" class="titulo2">Not&iacute;cia</td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_add.php" class="style1">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td height="26" colspan="2"><span class="titulo2">Foto</span></td>
      </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Agenda</td>
      </tr>
      <tr>
        <td colspan="2"><a href="agenda_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="agenda_edite.php">Editar/Excluir</a></td>
        </tr>
      
      

    </table>
    <p><img src="../imagens/logout.jpg" alt="logout" width="85" height="32" border="0" /></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td>
          <?php
	echo $tNGs->getErrorMsg();
?>
         
            <div class="KT_tng">
              <h1>
                <?php 
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
              Noticias </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                    
                      <?php $cnt1 = 0; ?>
                      <?php do { ?>
                        <?php $cnt1++; ?>
                        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnoticias > 1) {
?>
                          </MM:DECORATION></MM_HIDDENREGION>
                        </MM:DECORATION></MM_REPEATEDREGION>
                
                  <MM_REPEATEDREGION SOURCE=" "><MM:DECORATION OUTLINE="Repeat" OUTLINEID=2><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If%20(@$totalRows_rsnoticias%20%3E%201)" OUTLINEID=3><h2><?php echo NXT_getResource("Record_FH"); ?> </a><?php echo $cnt1; ?></h2>
                           
                              <?php } 
// endif Conditional region1
?>
                          
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th">
                          <label for="titulo_<?php echo $cnt1; ?>">Titulo:</label>
                        </td>
                        <td>
                          <input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['titulo']); ?>" size="60" maxlength="200" />
                          <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("noticias", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th">
                          <label for="materia_<?php echo $cnt1; ?>">Materia:</label>
                        </td>
                        <td>
                          <textarea name="materia_<?php echo $cnt1; ?>" id="materia_<?php echo $cnt1; ?>" cols="90" rows="10"><?php echo KT_escapeAttribute($row_rsnoticias['materia']); ?></textarea>
                          <?php echo $tNGs->displayFieldHint("materia");?> <?php echo $tNGs->displayFieldError("noticias", "materia", $cnt1); ?> </a></td>
                      </tr>
                      <tr>
                        <td class="KT_th">
                          <label for="data_<?php echo $cnt1; ?>">Data:</label>
                        </td>
                        <td>
                          <input type="text" name="data_<?php echo $cnt1; ?>" id="data_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['data']); ?>" size="20" maxlength="20" />
                          <?php echo $tNGs->displayFieldHint("data");?> <?php echo $tNGs->displayFieldError("noticias", "data", $cnt1); ?> </a></td>
                      </tr>
                      <tr>
                        <td class="KT_th">
                          <label for="fonte_<?php echo $cnt1; ?>">Fonte:</label>
                        </td>
                        <td>
                          <input type="text" name="fonte_<?php echo $cnt1; ?>" id="fonte_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticias['fonte']); ?>" size="50" maxlength="30" />
                          <?php echo $tNGs->displayFieldHint("fonte");?> <?php echo $tNGs->displayFieldError("noticias", "fonte", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th">
                          <label for="imagem_<?php echo $cnt1; ?>">Imagem:</label>
                       </td>
                        <td>
                          <input type="file" name="imagem_<?php echo $cnt1; ?>" id="imagem_<?php echo $cnt1; ?>" size="32" />
                          <?php echo $tNGs->displayFieldError("noticias", "imagem", $cnt1); ?> </a></td>
                      </tr>
                    </table>
                          
                          <input type="hidden" name="kt_pk_noticias_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnoticias['kt_pk_noticias']); ?>" />
                          <?php } while ($row_rsnoticias = mysql_fetch_assoc($rsnoticias)); ?>
                  
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
                          </MM:DECORATION></MM_HIDDENREGION>
                     
                      <MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If%20(@$_GET%5B%27id%27%5D%20==%20%22%22)" OUTLINEID=4><div class="KT_operations">
                      
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
                            </a></div>
                            <a href="<?php echo $logoutAction ?>">
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
         </td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#4D494A"><p><span class="style1"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  Legionnarios.com&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
