<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_victor = new KT_connection($victor, $database_victor);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../fotos/");
  $deleteObj->setDbFieldName("arquivo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("arquivo");
  $uploadObj->setDbFieldName("arquivo");
  $uploadObj->setFolder("../fotos/");
  $uploadObj->setResize("true", 400, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

mysql_select_db($database_victor, $victor);
$query_noticia = "SELECT * FROM noticia ORDER BY id DESC";
$noticia = mysql_query($query_noticia, $victor) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);
$totalRows_noticia = mysql_num_rows($noticia);

// Make an insert transaction instance
$ins_noticia_foto = new tNG_multipleInsert($conn_victor);
$tNGs->addTransaction($ins_noticia_foto);
// Register triggers
$ins_noticia_foto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_noticia_foto->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_noticia_foto->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_noticia_foto->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_noticia_foto->setTable("noticia_foto");
$ins_noticia_foto->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$ins_noticia_foto->addColumn("id", "NUMERIC_TYPE", "POST", "noticia");
$ins_noticia_foto->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_noticia_foto->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_noticia_foto->setPrimaryKey("id_foto", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_noticia_foto = new tNG_multipleUpdate($conn_victor);
$tNGs->addTransaction($upd_noticia_foto);
// Register triggers
$upd_noticia_foto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_noticia_foto->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_noticia_foto->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_noticia_foto->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_noticia_foto->setTable("noticia_foto");
$upd_noticia_foto->addColumn("arquivo", "FILE_TYPE", "FILES", "arquivo");
$upd_noticia_foto->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_noticia_foto->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_noticia_foto->addColumn("id", "NUMERIC_TYPE", "POST", "noticia");
$upd_noticia_foto->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Make an instance of the transaction object
$del_noticia_foto = new tNG_multipleDelete($conn_victor);
$tNGs->addTransaction($del_noticia_foto);
// Register triggers
$del_noticia_foto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_noticia_foto->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_noticia_foto->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_noticia_foto->setTable("noticia_foto");
$del_noticia_foto->setPrimaryKey("id_foto", "NUMERIC_TYPE", "GET", "id_foto");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnoticia_foto = $tNGs->getRecordset("noticia_foto");
$row_rsnoticia_foto = mysql_fetch_assoc($rsnoticia_foto);
$totalRows_rsnoticia_foto = mysql_num_rows($rsnoticia_foto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - JrGames</title>
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
	background-color: #FFC904;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #000000;
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
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#FFC904"><img src="imagens/topoindex.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#FFC904"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#000000" class="titulo2">Filme</td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Not&iacute;cia</td>
      </tr>
      <tr>
        <td colspan="2"><a href="not_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_add.php">Adicionar Foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      
      <tr>
        <td height="30" colspan="2" class="titulo2">G&ecirc;nero</td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_edite.php">Editar/Excluir</a></td>
        </tr>
      
    </table>
    <p><a href="<?php echo $logoutAction ?>"><img src="imagens/logout.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1 class="titulo">
                <?php 
// Show IF Conditional region1 
if (@$_GET['id_foto'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
                Foto na Not&iacute;cia </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnoticia_foto > 1) {
?>
                      <h2 class="titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="arquivo_<?php echo $cnt1; ?>">Arquivo:</label></td>
                        <td><input type="file" name="arquivo_<?php echo $cnt1; ?>" id="arquivo_<?php echo $cnt1; ?>" size="32" />
                            <?php echo $tNGs->displayFieldError("noticia_foto", "arquivo", $cnt1); ?> </td>
                      </tr>

                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                        <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticia_foto['descricao']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("noticia_foto", "descricao", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                        <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnoticia_foto['titulo']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("noticia_foto", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th">Not&iacute;cia:</td>
                        <td><select name="noticia" id="noticia">
                          <option value="" <?php if (!(strcmp("", $row_rsnoticia_foto['id']))) {echo "selected=\"selected\"";} ?>>- Selecione a Notícia -</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_noticia['id']?>"<?php if (!(strcmp($row_noticia['id'], $row_rsnoticia_foto['id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_noticia['titulo']?></option>
                          <?php
} while ($row_noticia = mysql_fetch_assoc($noticia));
  $rows = mysql_num_rows($noticia);
  if($rows > 0) {
      mysql_data_seek($noticia, 0);
	  $row_noticia = mysql_fetch_assoc($noticia);
  }
?>
                        </select></td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_noticia_foto_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnoticia_foto['kt_pk_noticia_foto']); ?>" />
                    <?php } while ($row_rsnoticia_foto = mysql_fetch_assoc($rsnoticia_foto)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['id_foto'] == "") {
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
                      <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
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
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#FFC904"><p><span class="resultado_estatistica"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  JrGames VideoLocadora&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($noticia);
?>
