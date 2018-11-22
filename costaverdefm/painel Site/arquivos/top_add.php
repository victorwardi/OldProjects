<?php require_once('../../Connections/CostaverdeFM.php'); ?>
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
$conn_CostaverdeFM = new KT_connection($CostaverdeFM, $database_CostaverdeFM);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_mp3 = "SELECT * FROM mp3 ORDER BY nome ASC";
$mp3 = mysql_query($query_mp3, $CostaverdeFM) or die(mysql_error());
$row_mp3 = mysql_fetch_assoc($mp3);
$totalRows_mp3 = mysql_num_rows($mp3);

// Make an insert transaction instance
$ins_top = new tNG_multipleInsert($conn_CostaverdeFM);
$tNGs->addTransaction($ins_top);
// Register triggers
$ins_top->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_top->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_top->registerTrigger("END", "Trigger_Default_Redirect", 99, "top_edite.php");
// Add columns
$ins_top->setTable("top");
$ins_top->addColumn("top", "NUMERIC_TYPE", "POST", "top");
$ins_top->addColumn("musica", "STRING_TYPE", "POST", "musica");
$ins_top->addColumn("cantor", "STRING_TYPE", "POST", "cantor");
$ins_top->addColumn("letra", "STRING_TYPE", "POST", "letra");
$ins_top->addColumn("mp3", "STRING_TYPE", "POST", "select");
$ins_top->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_top = new tNG_multipleUpdate($conn_CostaverdeFM);
$tNGs->addTransaction($upd_top);
// Register triggers
$upd_top->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_top->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_top->registerTrigger("END", "Trigger_Default_Redirect", 99, "top_edite.php");
// Add columns
$upd_top->setTable("top");
$upd_top->addColumn("top", "NUMERIC_TYPE", "POST", "top");
$upd_top->addColumn("musica", "STRING_TYPE", "POST", "musica");
$upd_top->addColumn("cantor", "STRING_TYPE", "POST", "cantor");
$upd_top->addColumn("letra", "STRING_TYPE", "POST", "letra");
$upd_top->addColumn("mp3", "STRING_TYPE", "POST", "select");
$upd_top->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_top = new tNG_multipleDelete($conn_CostaverdeFM);
$tNGs->addTransaction($del_top);
// Register triggers
$del_top->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_top->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_top->setTable("top");
$del_top->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstop = $tNGs->getRecordset("top");
$row_rstop = mysql_fetch_assoc($rstop);
$totalRows_rstop = mysql_num_rows($rstop);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle Costa Verde FM</title>
<!-- InstanceEndEditable -->
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
  <tr>
    <td height="81" colspan="3" align="left" valign="middle" bgcolor="#39D351"><img src="../topo.jpg" alt="Painel de Controle" width="775" height="120" /></td>
  </tr>
  <tr>
    <td width="206" height="389" align="center" valign="top" bgcolor="#3A9456"><table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu_painel">
      
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col">Menu</th>
      </tr>
      <tr>
        <th height="32" align="center" class="titulo_anuncio style1" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="home.php">Home</a></th>
          </tr>
        </table></th>
      </tr>
      
      
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fotos </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="foto_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="foto_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Galerias</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="galeria_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="galeria_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th align="left" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Top 12 </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <th scope="row"><a href="top_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Mp3</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="mp3_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="mp3_edite.php"> Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Recados</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="row"><a href="recados_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Fique Ligado </th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="ligado_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="ligado_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Promo&ccedil;&otilde;es</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="promo_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="promo_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Equipe</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="equipe_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="equipe_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="sessao_painel">
          <tr>
            <th scope="col">Programa</th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <th scope="col"><a href="programa_add.php">Inserir</a></th>
          </tr>
          <tr>
            <th scope="row"><a href="programa_edite.php">Modificar / Remover </a></th>
          </tr>
        </table></th>
      </tr>
    </table></td>
    <td width="594" colspan="2" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: false
}
        </script>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <table width="100%" border="0" cellpadding="0" cellspacing="2" class="titulos">
                <tr>
                  <th height="27" align="left" scope="col">Top 12 Modificar </th>
                </tr>
              </table>
              <div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rstop > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="top_<?php echo $cnt1; ?>">Top:</label></td>
                        <td><input type="text" name="top_<?php echo $cnt1; ?>" id="top_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstop['top']); ?>" size="7" />
                            <?php echo $tNGs->displayFieldHint("top");?> <?php echo $tNGs->displayFieldError("top", "top", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="musica_<?php echo $cnt1; ?>">Musica:</label></td>
                        <td><input type="text" name="musica_<?php echo $cnt1; ?>" id="musica_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstop['musica']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("musica");?> <?php echo $tNGs->displayFieldError("top", "musica", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="cantor_<?php echo $cnt1; ?>">Cantor:</label></td>
                        <td><input type="text" name="cantor_<?php echo $cnt1; ?>" id="cantor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstop['cantor']); ?>" size="32" maxlength="50" />
                            <?php echo $tNGs->displayFieldHint("cantor");?> <?php echo $tNGs->displayFieldError("top", "cantor", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="letra_<?php echo $cnt1; ?>">Letra:</label></td>
                        <td><textarea name="letra_<?php echo $cnt1; ?>" id="letra_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstop['letra']); ?></textarea>
                            <?php echo $tNGs->displayFieldHint("letra");?> <?php echo $tNGs->displayFieldError("top", "letra", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="mp3_<?php echo $cnt1; ?>">Mp3:</label></td>
                        <td><label>
                          <select name="select">
                            <option value="" <?php if (!(strcmp("", $row_rstop['mp3']))) {echo "selected=\"selected\"";} ?>>- Selecione o Arquivo -</option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_mp3['arquivo']?>"<?php if (!(strcmp($row_mp3['arquivo'], $row_rstop['mp3']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mp3['nome']?></option>
                            <?php
} while ($row_mp3 = mysql_fetch_assoc($mp3));
  $rows = mysql_num_rows($mp3);
  if($rows > 0) {
      mysql_data_seek($mp3, 0);
	  $row_mp3 = mysql_fetch_assoc($mp3);
  }
?>
                          </select>
                        </label>
                          <?php echo $tNGs->displayFieldHint("mp3");?> <?php echo $tNGs->displayFieldError("top", "mp3", $cnt1); ?> </td></tr>
                    </table>
                    <input type="hidden" name="kt_pk_top_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstop['kt_pk_top']); ?>" />
                    <?php } while ($row_rstop = mysql_fetch_assoc($rstop)); ?>
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
          <p>&nbsp;</p></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" valign="middle" bgcolor="#3A9456"><span class="fonte11px_branca_negrito">Painel de Controle Desenvolvido por Victor Caetano e Ded&eacute; Siqueira </span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($mp3);
?>
