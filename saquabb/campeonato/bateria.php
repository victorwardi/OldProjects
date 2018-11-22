<?php require_once('../Connections/saquabb.php'); ?>
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

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_saquabb = new KT_connection($saquabb, $database_saquabb);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_bblagos_saqua = new tNG_multipleInsert($conn_saquabb);
$tNGs->addTransaction($ins_bblagos_saqua);
// Register triggers
$ins_bblagos_saqua->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_bblagos_saqua->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_bblagos_saqua->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_bblagos_saqua->setTable("bblagos_saqua");
$ins_bblagos_saqua->addColumn("round", "STRING_TYPE", "POST", "round");
$ins_bblagos_saqua->addColumn("comp1", "STRING_TYPE", "POST", "comp1");
$ins_bblagos_saqua->addColumn("comp2", "STRING_TYPE", "POST", "comp2");
$ins_bblagos_saqua->addColumn("comp3", "STRING_TYPE", "POST", "comp3");
$ins_bblagos_saqua->addColumn("comp4", "STRING_TYPE", "POST", "comp4");
$ins_bblagos_saqua->addColumn("nota1", "STRING_TYPE", "POST", "nota1");
$ins_bblagos_saqua->addColumn("nota2", "STRING_TYPE", "POST", "nota2");
$ins_bblagos_saqua->addColumn("nota3", "STRING_TYPE", "POST", "nota3");
$ins_bblagos_saqua->addColumn("nota4", "STRING_TYPE", "POST", "nota4");
$ins_bblagos_saqua->addColumn("colocacao1", "STRING_TYPE", "POST", "colocacao1");
$ins_bblagos_saqua->addColumn("colocacao2", "STRING_TYPE", "POST", "colocacao2");
$ins_bblagos_saqua->addColumn("colocacao3", "STRING_TYPE", "POST", "colocacao3");
$ins_bblagos_saqua->addColumn("colocacao4", "STRING_TYPE", "POST", "colocacao4");
$ins_bblagos_saqua->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_bblagos_saqua = new tNG_multipleUpdate($conn_saquabb);
$tNGs->addTransaction($upd_bblagos_saqua);
// Register triggers
$upd_bblagos_saqua->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_bblagos_saqua->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_bblagos_saqua->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_bblagos_saqua->setTable("bblagos_saqua");
$upd_bblagos_saqua->addColumn("round", "STRING_TYPE", "POST", "round");
$upd_bblagos_saqua->addColumn("comp1", "STRING_TYPE", "POST", "comp1");
$upd_bblagos_saqua->addColumn("comp2", "STRING_TYPE", "POST", "comp2");
$upd_bblagos_saqua->addColumn("comp3", "STRING_TYPE", "POST", "comp3");
$upd_bblagos_saqua->addColumn("comp4", "STRING_TYPE", "POST", "comp4");
$upd_bblagos_saqua->addColumn("nota1", "STRING_TYPE", "POST", "nota1");
$upd_bblagos_saqua->addColumn("nota2", "STRING_TYPE", "POST", "nota2");
$upd_bblagos_saqua->addColumn("nota3", "STRING_TYPE", "POST", "nota3");
$upd_bblagos_saqua->addColumn("nota4", "STRING_TYPE", "POST", "nota4");
$upd_bblagos_saqua->addColumn("colocacao1", "STRING_TYPE", "POST", "colocacao1");
$upd_bblagos_saqua->addColumn("colocacao2", "STRING_TYPE", "POST", "colocacao2");
$upd_bblagos_saqua->addColumn("colocacao3", "STRING_TYPE", "POST", "colocacao3");
$upd_bblagos_saqua->addColumn("colocacao4", "STRING_TYPE", "POST", "colocacao4");
$upd_bblagos_saqua->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_bblagos_saqua = new tNG_multipleDelete($conn_saquabb);
$tNGs->addTransaction($del_bblagos_saqua);
// Register triggers
$del_bblagos_saqua->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_bblagos_saqua->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_bblagos_saqua->setTable("bblagos_saqua");
$del_bblagos_saqua->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsbblagos_saqua = $tNGs->getRecordset("bblagos_saqua");
$row_rsbblagos_saqua = mysql_fetch_assoc($rsbblagos_saqua);
$totalRows_rsbblagos_saqua = mysql_num_rows($rsbblagos_saqua);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adiconar Bateria</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<link href="../painel/css.css" rel="stylesheet" type="text/css" />
<link href="../css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><p><img src="etapa/saqua/topo.jpg" width="560" height="98" /> <br />
          <?php
	echo $tNGs->getErrorMsg();
?>
    </p>
      <p class="tiutlo_not">
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
      Resultados das Baterias </p>
      <div class="KT_tng">
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
            <div align="center">
              <?php $cnt1 = 0; ?>
              <?php do { ?>
                <?php $cnt1++; ?>
                <?php 
// Show IF Conditional region1 
if (@$totalRows_rsbblagos_saqua > 1) {
?>
            </div>
                <h2 align="center" class="estatisticas_titulo"><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <div align="center">
                  <?php } 
// endif Conditional region1
?>
                <table width="448" align="center" cellpadding="4" cellspacing="0" class="KT_tngtable">
                  <tr>
                    <td width="44" class="KT_th"><label for="round_<?php echo $cnt1; ?>" class="tiutlo_not">Round:</label></td>
                    <td colspan="3" align="left"><input type="text" name="round_<?php echo $cnt1; ?>" id="round_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['round']); ?>" size="50" maxlength="50" />
                    <?php echo $tNGs->displayFieldHint("round");?> <?php echo $tNGs->displayFieldError("bblagos_saqua", "round", $cnt1); ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="tiutlo_not">Lycra</td>
                    <td width="241" align="left" valign="middle" class="tiutlo_not">Nome</td>
                    <td width="63" align="center" valign="middle" class="tiutlo_not">Nota<br />
                    (Somat&oacute;rio)</td>
                    <td width="66" align="center" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" class="KT_th"><label for="comp1_<?php echo $cnt1; ?>"><img src="camisas/preta.jpg" width="30" height="30" /></label></td>
                    <td align="left" valign="middle"><input type="text" name="comp1_<?php echo $cnt1; ?>" id="comp1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['comp1']); ?>" size="40" maxlength="50" /></td>
                    <td align="center" valign="middle"><input type="text" name="nota1_<?php echo $cnt1; ?>" id="nota1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['nota1']); ?>" size="10" maxlength="10" /></td>
                    <td align="center" valign="middle"><input type="text" name="colocacao1_<?php echo $cnt1; ?>" id="colocacao1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['colocacao1']); ?>" size="10" maxlength="10" /></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" class="KT_th"><label for="comp2_<?php echo $cnt1; ?>"><img src="camisas/vermelha.jpg" width="30" height="30" /></label></td>
                    <td align="left" valign="middle"><input type="text" name="comp2_<?php echo $cnt1; ?>" id="comp2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['comp2']); ?>" size="40" maxlength="50" /></td>
                    <td align="center" valign="middle"><input type="text" name="nota2_<?php echo $cnt1; ?>" id="nota2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['nota2']); ?>" size="10" maxlength="10" /></td>
                    <td align="center" valign="middle"><input type="text" name="colocacao2_<?php echo $cnt1; ?>" id="colocacao2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['colocacao2']); ?>" size="10" maxlength="10" /></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" class="KT_th"><label for="comp3_<?php echo $cnt1; ?>"><img src="camisas/azul.jpg" width="30" height="30" /></label></td>
                    <td align="left" valign="middle"><input type="text" name="comp3_<?php echo $cnt1; ?>" id="comp3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['comp3']); ?>" size="40" maxlength="50" /></td>
                    <td align="center" valign="middle"><input type="text" name="nota3_<?php echo $cnt1; ?>" id="nota3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['nota3']); ?>" size="10" maxlength="10" /></td>
                    <td align="center" valign="middle"><input type="text" name="colocacao3_<?php echo $cnt1; ?>" id="colocacao3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['colocacao3']); ?>" size="10" maxlength="10" /></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" class="KT_th"><label for="comp4_<?php echo $cnt1; ?>"><img src="camisas/amarela.jpg" width="30" height="30" /></label></td>
                    <td align="left" valign="middle"><input type="text" name="comp4_<?php echo $cnt1; ?>" id="comp4_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['comp4']); ?>" size="40" maxlength="50" /></td>
                    <td align="center" valign="middle"><input type="text" name="nota4_<?php echo $cnt1; ?>" id="nota4_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['nota4']); ?>" size="10" maxlength="10" /></td>
                    <td align="center" valign="middle"><input type="text" name="colocacao4_<?php echo $cnt1; ?>" id="colocacao4_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['colocacao4']); ?>" size="10" maxlength="10" /></td>
                  </tr>
                  </table>
                <br />
                <input type="hidden" name="kt_pk_bblagos_saqua_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsbblagos_saqua['kt_pk_bblagos_saqua']); ?>" />
                <?php } while ($row_rsbblagos_saqua = mysql_fetch_assoc($rsbblagos_saqua)); ?>
            </div>
            <div class="KT_bottombuttons">
              <div>
                <div align="center">
                  <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
                    <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                    <?php 
      // else Conditional region1
      } else { ?>
                </div>
                  <div class="KT_operations"></div>
                  <div align="center">
                    <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                    <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                    <?php }
      // endif Conditional region1
      ?>
                  <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
                  </div>
              </div>
            </div>
          </form>
          <a href="bat_edite.php"><span class="tiutlo_not">Editar Resultados das Baterias Anteriores </span></a></div>
        <br class="clearfixplain" />
      <img src="etapa/saqua/base.jpg" width="560" height="98" /></div>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
