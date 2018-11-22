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

//start Trigger_FileDelete3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete3(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/fotos/");
  $deleteObj->setDbFieldName("gif_nome");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete3 trigger

//start Trigger_ImageUpload2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload2(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("gif_nome");
  $uploadObj->setDbFieldName("gif_nome");
  $uploadObj->setFolder("../../Uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload2 trigger

//start Trigger_FileDelete2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete2(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/fotos/");
  $deleteObj->setDbFieldName("logotipo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("logotipo");
  $uploadObj->setDbFieldName("logotipo");
  $uploadObj->setFolder("../../Uploads/fotos/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/fotos/");
  $deleteObj->setDbFieldName("foto");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("foto");
  $uploadObj->setDbFieldName("foto");
  $uploadObj->setFolder("../../Uploads/fotos/");
  $uploadObj->setResize("true", 600, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../Uploads/flash/");
  $deleteObj->setDbFieldName("flash");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("flash");
  $uploadObj->setDbFieldName("flash");
  $uploadObj->setFolder("../../Uploads/flash/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("pdf, txt, mp3, wma, swf");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

mysql_select_db($database_ConBD, $ConBD);
$query_RsCategorias = "SELECT * FROM categoria ORDER BY categoria ASC";
$RsCategorias = mysql_query($query_RsCategorias, $ConBD) or die(mysql_error());
$row_RsCategorias = mysql_fetch_assoc($RsCategorias);
$totalRows_RsCategorias = mysql_num_rows($RsCategorias);

// Make an insert transaction instance
$ins_lojas = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_lojas);
// Register triggers
$ins_lojas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_lojas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_lojas->registerTrigger("END", "Trigger_Default_Redirect", 99, "loja_editar.php");
$ins_lojas->registerTrigger("AFTER", "Trigger_FileUpload", 97);
$ins_lojas->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_lojas->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$ins_lojas->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
// Add columns
$ins_lojas->setTable("lojas");
$ins_lojas->addColumn("login", "STRING_TYPE", "POST", "login");
$ins_lojas->addColumn("senha", "STRING_TYPE", "POST", "senha");
$ins_lojas->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_lojas->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_lojas->addColumn("andar", "STRING_TYPE", "POST", "andar");
$ins_lojas->addColumn("gif_nome", "FILE_TYPE", "FILES", "gif_nome");
$ins_lojas->addColumn("numero", "STRING_TYPE", "POST", "numero");
$ins_lojas->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_lojas->addColumn("flash", "FILE_TYPE", "FILES", "flash");
$ins_lojas->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_lojas->addColumn("atividade", "STRING_TYPE", "POST", "atividade");
$ins_lojas->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_lojas->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_lojas->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$ins_lojas->addColumn("website", "STRING_TYPE", "POST", "website");
$ins_lojas->addColumn("logotipo", "FILE_TYPE", "FILES", "logotipo");
$ins_lojas->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_lojas = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_lojas);
// Register triggers
$upd_lojas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_lojas->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_lojas->registerTrigger("END", "Trigger_Default_Redirect", 99, "loja_editar.php");
$upd_lojas->registerTrigger("AFTER", "Trigger_FileUpload", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
$upd_lojas->registerTrigger("AFTER", "Trigger_ImageUpload2", 97);
// Add columns
$upd_lojas->setTable("lojas");
$upd_lojas->addColumn("login", "STRING_TYPE", "POST", "login");
$upd_lojas->addColumn("senha", "STRING_TYPE", "POST", "senha");
$upd_lojas->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_lojas->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_lojas->addColumn("andar", "STRING_TYPE", "POST", "andar");
$upd_lojas->addColumn("gif_nome", "FILE_TYPE", "FILES", "gif_nome");
$upd_lojas->addColumn("numero", "STRING_TYPE", "POST", "numero");
$upd_lojas->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_lojas->addColumn("flash", "FILE_TYPE", "FILES", "flash");
$upd_lojas->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_lojas->addColumn("atividade", "STRING_TYPE", "POST", "atividade");
$upd_lojas->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_lojas->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_lojas->addColumn("foto", "FILE_TYPE", "FILES", "foto");
$upd_lojas->addColumn("website", "STRING_TYPE", "POST", "website");
$upd_lojas->addColumn("logotipo", "FILE_TYPE", "FILES", "logotipo");
$upd_lojas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_lojas = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_lojas);
// Register triggers
$del_lojas->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_lojas->registerTrigger("END", "Trigger_Default_Redirect", 99, "loja_editar.php");
$del_lojas->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_lojas->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_lojas->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
$del_lojas->registerTrigger("AFTER", "Trigger_FileDelete3", 98);
// Add columns
$del_lojas->setTable("lojas");
$del_lojas->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslojas = $tNGs->getRecordset("lojas");
$row_rslojas = mysql_fetch_assoc($rslojas);
$totalRows_rslojas = mysql_num_rows($rslojas);
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
      </script>
      <table width="100%" border="0" cellpadding="2" cellspacing="0" class="txt_06">
        <tr>
          <td class="titulo">Inserir Loja </td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rslojas > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="txt_06">
                      <tr>
                        <td align="left" valign="top" class="KT_th"><fieldset><legend>Cadastro Login/Senha</legend>
                          <table width="100%" border="0" cellspacing="4" cellpadding="0">
                            <tr class="txt_06">
                              <td class="KT_th"><label for="login_<?php echo $cnt1; ?>">Login:</label></td>
                              <td><input type="text" name="login_<?php echo $cnt1; ?>" id="login_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['login']); ?>" size="30" maxlength="30" />
                                  <?php echo $tNGs->displayFieldHint("login");?> <?php echo $tNGs->displayFieldError("lojas", "login", $cnt1); ?> </td>
                            </tr>
                            <tr class="txt_06">
                              <td class="KT_th"><label for="senha_<?php echo $cnt1; ?>">Senha:</label></td>
                              <td><input type="text" name="senha_<?php echo $cnt1; ?>" id="senha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['senha']); ?>" size="30" maxlength="30" />
                                  <?php echo $tNGs->displayFieldHint("senha");?> <?php echo $tNGs->displayFieldError("lojas", "senha", $cnt1); ?> </td>
                            </tr>
                          </table>
                        </fieldset> </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="KT_th"><fieldset><legend>Dados da Loja</legend>
                            <table width="100%" border="0" cellspacing="4" cellpadding="0">
                              <tr class="txt_06">
                                <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                                <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['nome']); ?>" size="40" maxlength="100" />
                                    <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("lojas", "nome", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                                <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['titulo']); ?>" size="32" maxlength="60" />
                                    <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("lojas", "titulo", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="andar_<?php echo $cnt1; ?>">Andar:</label></td>
                                <td><input type="text" name="andar_<?php echo $cnt1; ?>" id="andar_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['andar']); ?>" size="30" maxlength="30" />
                                    <?php echo $tNGs->displayFieldHint("andar");?> <?php echo $tNGs->displayFieldError("lojas", "andar", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="numero_<?php echo $cnt1; ?>">N&uacute;mero:</label></td>
                                <td><input type="text" name="numero_<?php echo $cnt1; ?>" id="numero_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['numero']); ?>" size="20" maxlength="20" />
                                    <?php echo $tNGs->displayFieldHint("numero");?> <?php echo $tNGs->displayFieldError("lojas", "numero", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                                <td><label>
                                  <select name="categoria" id="categoria">
                                    <option value="" <?php if (!(strcmp("", $row_rslojas['categoria']))) {echo "selected=\"selected\"";} ?>>- Selecione uma Categoria - </option>
                                    <?php
do {  
?>
                                    <option value="<?php echo $row_RsCategorias['categoria']?>"<?php if (!(strcmp($row_RsCategorias['categoria'], $row_rslojas['categoria']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsCategorias['categoria']?></option>
                                    <?php
} while ($row_RsCategorias = mysql_fetch_assoc($RsCategorias));
  $rows = mysql_num_rows($RsCategorias);
  if($rows > 0) {
      mysql_data_seek($RsCategorias, 0);
	  $row_RsCategorias = mysql_fetch_assoc($RsCategorias);
  }
?>
                                  </select>
                                  </label>
                                    <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("lojas", "categoria", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td valign="top" class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descri&ccedil;&atilde;o:</label></td>
                                <td><textarea name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rslojas['descricao']); ?></textarea>
                                    <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("lojas", "descricao", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="atividade_<?php echo $cnt1; ?>">Atividade:</label></td>
                                <td><input type="text" name="atividade_<?php echo $cnt1; ?>" id="atividade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['atividade']); ?>" size="32" maxlength="60" />
                                    <?php echo $tNGs->displayFieldHint("atividade");?> <?php echo $tNGs->displayFieldError("lojas", "atividade", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="telefone_<?php echo $cnt1; ?>">Telefone:</label></td>
                                <td><input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['telefone']); ?>" size="32" maxlength="100" />
                                    <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("lojas", "telefone", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                                <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['email']); ?>" size="32" maxlength="50" />
                                    <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("lojas", "email", $cnt1); ?> </td>
                              </tr>
                              <tr class="txt_06">
                                <td class="KT_th"><label for="website_<?php echo $cnt1; ?>">Website:</label></td>
                                <td><input type="text" name="website_<?php echo $cnt1; ?>" id="website_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rslojas['website']); ?>" size="32" maxlength="100" />
                                    <?php echo $tNGs->displayFieldHint("website");?> <?php echo $tNGs->displayFieldError("lojas", "website", $cnt1); ?> </td>
                              </tr>
                            </table>
                          </fieldset>                           </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><fieldset><legend>Upload de Arquivos</legend>
                          <table width="100%" border="0" cellspacing="4" cellpadding="0">
                            <tr class="txt_06">
                              <td class="KT_th"><label for="gif_nome_<?php echo $cnt1; ?>">Titulo em img:</label></td>
                              <td><input type="file" name="gif_nome_<?php echo $cnt1; ?>" id="gif_nome_<?php echo $cnt1; ?>" size="32" />
                                  <?php echo $tNGs->displayFieldHint("gif_nome");?> <?php echo $tNGs->displayFieldError("lojas", "gif_nome", $cnt1); ?> </td>
                            </tr>
                            <tr class="txt_06">
                              <td class="KT_th"><label for="foto_<?php echo $cnt1; ?>">Foto da loja:</label></td>
                              <td><input type="file" name="foto_<?php echo $cnt1; ?>" id="foto_<?php echo $cnt1; ?>" size="32" />
                                  <?php echo $tNGs->displayFieldError("lojas", "foto", $cnt1); ?> </td>
                            </tr>
                            <tr class="txt_06">
                              <td class="KT_th"><label for="logotipo_<?php echo $cnt1; ?>">Logotipo:</label></td>
                              <td><input type="file" name="logotipo_<?php echo $cnt1; ?>" id="logotipo_<?php echo $cnt1; ?>" size="32" />
                                  <?php echo $tNGs->displayFieldError("lojas", "logotipo", $cnt1); ?> </td>
                            </tr>
                            <tr class="txt_06">
                              <td class="KT_th"><label for="flash_<?php echo $cnt1; ?>">Flash:</label></td>
                              <td><input type="file" name="flash_<?php echo $cnt1; ?>" id="flash_<?php echo $cnt1; ?>" size="32" />
                                  <?php echo $tNGs->displayFieldError("lojas", "flash", $cnt1); ?> </td>
                            </tr>
                          </table>
                        </fieldset>&nbsp;</td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_lojas_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rslojas['kt_pk_lojas']); ?>" />
                    <?php } while ($row_rslojas = mysql_fetch_assoc($rslojas)); ?>
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
          <p>&nbsp;</p></td>
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
mysql_free_result($RsCategorias);
?>
