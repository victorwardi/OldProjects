<?php require_once('../../Connections/ConBD.php'); ?><?php
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
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_agenda = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_agenda);
// Register triggers
$ins_agenda->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_agenda->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_agenda->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_agenda->setTable("agenda");
$ins_agenda->addColumn("dia", "STRING_TYPE", "POST", "dia");
$ins_agenda->addColumn("semana", "STRING_TYPE", "POST", "semana");
$ins_agenda->addColumn("mes", "STRING_TYPE", "POST", "mes");
$ins_agenda->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$ins_agenda->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$ins_agenda->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_agenda = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_agenda);
// Register triggers
$upd_agenda->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_agenda->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_agenda->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_agenda->setTable("agenda");
$upd_agenda->addColumn("dia", "STRING_TYPE", "POST", "dia");
$upd_agenda->addColumn("semana", "STRING_TYPE", "POST", "semana");
$upd_agenda->addColumn("mes", "STRING_TYPE", "POST", "mes");
$upd_agenda->addColumn("titulo", "STRING_TYPE", "POST", "titulo");
$upd_agenda->addColumn("descricao", "STRING_TYPE", "POST", "descricao");
$upd_agenda->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_agenda = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_agenda);
// Register triggers
$del_agenda->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_agenda->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_agenda->setTable("agenda");
$del_agenda->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsagenda = $tNGs->getRecordset("agenda");
$row_rsagenda = mysql_fetch_assoc($rsagenda);
$totalRows_rsagenda = mysql_num_rows($rsagenda);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg_01.gif);
	background-color: #009CE7;
}
.style2 {
	color: #008BE1;
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="topo.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="2">
      <tr>
        <td bgcolor="#DEE7F8" class="style2">Menu</td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">V&iacute;deos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Agenda</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
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
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Agenda - Inserir</td>
        </tr>
        <tr>
          <td>&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <h1 class="style2">
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
                Agenda </h1>
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsagenda > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                      <tr>
                        <td class="KT_th"><label for="dia_<?php echo $cnt1; ?>">Dia:</label></td>
                        <td><label>
                          <select name="dia" id="dia">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                        	<option value="11">11</option>
                          	<option value="12">12</option>
                            <option value="13">13</option>
                        	<option value="14">14</option>
                          	<option value="15">15</option>
                            <option value="16">16</option>
                        	<option value="17">17</option>
                          	<option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                                                   
                          </select>
                        </label>
                          <?php echo $tNGs->displayFieldError("agenda", "dia", $cnt1); ?> </td></tr>
                      <tr>
                        <td class="KT_th"><label for="semana_<?php echo $cnt1; ?>">Semana:</label></td>
                        <td><label>
                          <select name="semana" id="semana">
                          <option value="n&atilde;o selecionou">- selecione o dia da semana -</option>
                          <option value="DOM">DOM</option>
                          <option value="SEG">SEG</option>
                          <option value="TER">TER</option>
                          <option value="QUA">QUA</option>
                          <option value="QUI">QUI</option>
                          <option value="SEX">SEX</option>
                          <option value="SÁB">SAB</option>                          
                          </select>
                        </label>
                        <?php echo $tNGs->displayFieldError("agenda", "semana", $cnt1); ?> </td></tr>
                      <tr>
                        <td class="KT_th"><label for="mes_<?php echo $cnt1; ?>">Mes:</label></td>
                        <td><label>
                          <select name="mes" id="mes">
                            <option value="###">- Selecione um m&ecirc;s -</option>
                            <option value="JAN">JAN</option>
                            <option value="FEV">FEV</option>
                            <option value="MAR">MAR</option>
                            <option value="ABR">ABR</option>
                            <option value="MAI">MAI</option>
                            <option value="JUN">JUN</option>
                            <option value="JUL">JUL</option>
                            <option value="AGO">AGO</option>
                            <option value="SET">SET</option>
                            <option value="OUT">OUT</option>
                            <option value="NOV">NOV</option>
                            <option value="DEZ">DEZ</option>                       
                          </select>
                        </label><?php echo $tNGs->displayFieldError("agenda", "mes", $cnt1); ?> </td></tr>
                      <tr>
                        <td class="KT_th"><label for="titulo_<?php echo $cnt1; ?>">Titulo:</label></td>
                        <td><input type="text" name="titulo_<?php echo $cnt1; ?>" id="titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsagenda['titulo']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("titulo");?> <?php echo $tNGs->displayFieldError("agenda", "titulo", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td class="KT_th"><label for="descricao_<?php echo $cnt1; ?>">Descricao:</label></td>
                        <td><input type="text" name="descricao_<?php echo $cnt1; ?>" id="descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsagenda['descricao']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("descricao");?> <?php echo $tNGs->displayFieldError("agenda", "descricao", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_agenda_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsagenda['kt_pk_agenda']); ?>" />
                    <?php } while ($row_rsagenda = mysql_fetch_assoc($rsagenda)); ?>
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
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
