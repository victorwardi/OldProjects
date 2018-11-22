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

// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_comentarios_not = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_comentarios_not);
// Register triggers
$ins_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$ins_comentarios_not->setTable("comentarios_not");
$ins_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$ins_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$ins_comentarios_not->addColumn("id", "NUMERIC_TYPE", "POST", "id");
$ins_comentarios_not->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado");
$ins_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_comentarios_not = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_comentarios_not);
// Register triggers
$upd_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_comentarios_not->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$upd_comentarios_not->setTable("comentarios_not");
$upd_comentarios_not->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_comentarios_not->addColumn("mail", "STRING_TYPE", "POST", "mail");
$upd_comentarios_not->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_comentarios_not->addColumn("comentario", "STRING_TYPE", "POST", "comentario");
$upd_comentarios_not->addColumn("id", "NUMERIC_TYPE", "POST", "id");
$upd_comentarios_not->addColumn("aprovado", "STRING_TYPE", "POST", "aprovado");
$upd_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Make an instance of the transaction object
$del_comentarios_not = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_comentarios_not);
// Register triggers
$del_comentarios_not->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_comentarios_not->registerTrigger("END", "Trigger_Default_Redirect", 99, "ok.php");
// Add columns
$del_comentarios_not->setTable("comentarios_not");
$del_comentarios_not->setPrimaryKey("id_coment", "NUMERIC_TYPE", "GET", "id_coment");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Execute all the registered transactions
$tNGs->executeTransactions();

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscomentarios_not = $tNGs->getRecordset("comentarios_not");
$row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not);
$totalRows_rscomentarios_not = mysql_num_rows($rscomentarios_not);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/controle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: Painel de controle Saquabb ::</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<link href="painel.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#E6F9FD" scope="col"><img src="../banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#E6F9FD" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#017C9E" bgcolor="#017C9E" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#017C9E" scope="row"><a href="../home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Not&iacute;cia</th>
      </tr>
      <tr>
        <th scope="row"><a href="not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Se&ccedil;&atilde;o de Not&iacute;cias </th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Foto</th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Galeria</th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos</th>
      </tr>
      <tr>
        <th scope="row"><a href="video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">V&iacute;deos Enviados </th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="video_env_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Perfil</th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Festas</th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="festa_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Vem ai </th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="vem_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row">Coment&aacute;rios</th>
      </tr>
      
      <tr>
        <th scope="row"><a href="comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Coment&aacute;rios Gabriel</p>          </th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="comentario_gabriel_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#E6F9FD" scope="row"><p>Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#E6F9FD" scope="row">Logout</th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#E6F9FD"><!-- InstanceBeginEditable name="conteudo" -->
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
  show_as_grid: true,
  merge_down_value: false
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <th align="left" valign="middle" bgcolor="#017C9E" class="Titulo_Branco" scope="col">Coment&aacute;rio Noticia </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1 class="titulo_painel">
                <?php 
// Show IF Conditional region1 
if (@$_GET['id_coment'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
              </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rscomentarios_not > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
                        <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['nome']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("comentarios_not", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="mail_<?php echo $cnt1; ?>">Mail:</label></td>
                        <td><input type="text" name="mail_<?php echo $cnt1; ?>" id="mail_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['mail']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("mail");?> <?php echo $tNGs->displayFieldError("comentarios_not", "mail", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
                        <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['cidade']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("comentarios_not", "cidade", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th">Noticia:</td>
                        <td><label>
                        <input name="id" type="text" id="id" value="<?php echo $row_rscomentarios_not['id']; ?>" />
                        </label></td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="comentario_<?php echo $cnt1; ?>">Comentario:</label></td>
                        <td><textarea name="comentario_<?php echo $cnt1; ?>" cols="40" rows="5" id="comentario_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rscomentarios_not['comentario']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("comentario");?> <?php echo $tNGs->displayFieldError("comentarios_not", "comentario", $cnt1); ?> </td>
                      </tr>

                      <tr>
                        <td class="KT_th"><label for="aprovado_<?php echo $cnt1; ?>">Aprovado:</label></td>
                        <td><label>
                          <select name="aprovado" id="aprovado">
                            <option value="" <?php if (!(strcmp("", $row_rscomentarios_not['aprovado']))) {echo "selected=\"selected\"";} ?>>- Selecione -</option>
                            <option value="Y" <?php if (!(strcmp("Y", $row_rscomentarios_not['aprovado']))) {echo "selected=\"selected\"";} ?>>Sim</option>
                            <option value="N" <?php if (!(strcmp("N", $row_rscomentarios_not['aprovado']))) {echo "selected=\"selected\"";} ?>>Não</option>
                          </select>
                        </label>
                          <?php echo $tNGs->displayFieldHint("aprovado");?> <?php echo $tNGs->displayFieldError("comentarios_not", "aprovado", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_comentarios_not_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscomentarios_not['kt_pk_comentarios_not']); ?>" />
                    <?php } while ($row_rscomentarios_not = mysql_fetch_assoc($rscomentarios_not)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['id_coment'] == "") {
      ?>
                        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <div class="KT_operations">
                          <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_coment')" />
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
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <th colspan="2" bgcolor="#E6F9FD" scope="row"><img src="../../imagens/rodape.jpg" width="775" height="40" /></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($not);
?>
