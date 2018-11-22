<?php require_once('../Connections/ConBD.php'); ?>
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
$conn_ConBD = new KT_connection($ConBD, $database_ConBD);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("fabricaID", true, "numeric", "", "", "", "Please enter a valid value.");
$formValidation->addField("unidade", true, "text", "", "", "", "Please enter a valid value.");
$formValidation->addField("nome", true, "text", "", "", "", "Please enter a valid value.");
$formValidation->addField("preco", true, "double", "", "", "", "Please enter a valid value.");
$tNGs->prepareValidation($formValidation);
// End trigger

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_ConBD, $ConBD);
$query_RsFabrica = "SELECT * FROM fabrica ORDER BY nome ASC";
$RsFabrica = mysql_query($query_RsFabrica, $ConBD) or die(mysql_error());
$row_RsFabrica = mysql_fetch_assoc($RsFabrica);
$totalRows_RsFabrica = mysql_num_rows($RsFabrica);

mysql_select_db($database_ConBD, $ConBD);
$query_RsUn = "SELECT * FROM un ORDER BY UN ASC";
$RsUn = mysql_query($query_RsUn, $ConBD) or die(mysql_error());
$row_RsUn = mysql_fetch_assoc($RsUn);
$totalRows_RsUn = mysql_num_rows($RsUn);

// Make an insert transaction instance
$ins_produto = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_produto);
// Register triggers
$ins_produto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_produto->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_produto->registerTrigger("END", "Trigger_Default_Redirect", 99, "visualizar.php?produtoID={produtoID}");
// Add columns
$ins_produto->setTable("produto");
$ins_produto->addColumn("fabricaID", "NUMERIC_TYPE", "POST", "fabricaID");
$ins_produto->addColumn("unidade", "STRING_TYPE", "POST", "unidade");
$ins_produto->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_produto->addColumn("preco", "DOUBLE_TYPE", "POST", "preco");
$ins_produto->setPrimaryKey("produtoID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_produto = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_produto);
// Register triggers
$upd_produto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_produto->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_produto->registerTrigger("END", "Trigger_Default_Redirect", 99, "visualizar.php?produtoID={produtoID}");
// Add columns
$upd_produto->setTable("produto");
$upd_produto->addColumn("fabricaID", "NUMERIC_TYPE", "POST", "fabricaID");
$upd_produto->addColumn("unidade", "STRING_TYPE", "POST", "unidade");
$upd_produto->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_produto->addColumn("preco", "DOUBLE_TYPE", "POST", "preco");
$upd_produto->setPrimaryKey("produtoID", "NUMERIC_TYPE", "GET", "produtoID");

// Make an instance of the transaction object
$del_produto = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_produto);
// Register triggers
$del_produto->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_produto->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_produto->setTable("produto");
$del_produto->setPrimaryKey("produtoID", "NUMERIC_TYPE", "GET", "produtoID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsproduto = $tNGs->getRecordset("produto");
$row_rsproduto = mysql_fetch_assoc($rsproduto);
$totalRows_rsproduto = mysql_num_rows($rsproduto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<style type="text/css">

#MenuBar1 li {
	width: 8em;
}
#MenuBar1 ul, #MenuBar1 ul li {
	width:8em;
}
#MenuBar1 span {
	margin: 0;
	padding: 2px;
	padding-left: 28px;
	display: block;
	background-position: 0% 50%;
	background-repeat: no-repeat;
}

#MenuBar1 #item1 {
	background-image: url(../img/icones/novo_pedido.png);
	color:#000000;
}
#MenuBar1 #item1-1 {
	background-image: url(../img/icones/adicionar_pedido.png);
}
#MenuBar1 #item1-2 {
	background-image: url(../img/icones/procurar_pedido.png);
}
#MenuBar1 #item1-3 {
	background-image: url(../img/novo.jpg);
}

#MenuBar1 #item2 {
	background-image: url(../img/icones/cliente.png);
}
#MenuBar1 #item2-1 {
	background-image: url(../img/icones/cliente_adicionar.png);
}
#MenuBar1 #item2-2 {
	background-image: url(../img/icones/cliente_procurar.png);
}
#MenuBar1 #item2-3 {
	background-image: url(../img/novo.jpg);
}

#MenuBar1 #item3 {
	background-image: url(../img/icones/produto.png);
}
#MenuBar1 #item3-1 {
	background-image: url(../img/remove.jpg);
}
#MenuBar1 #item3-2 {
	background-image: url(../img/sair.jpg);
}
#MenuBar1 #item3-3 {
	background-image: url(../img/novo.jpg);
}

#MenuBar1 #item4 {
	background-image: url(../img/imprimir.jpg);
}
#MenuBar1 #item4-1 {
	background-image: url(../img/remove.jpg);
}
#MenuBar1 #item4-2 {
	background-image: url(../img/sair.jpg);
}
#MenuBar1 #item4-3 {
	background-image: url(../img/novo.jpg);
}

#MenuBar1 #item5 {
	background-image: url(../img/icones/transp.png);
}
#MenuBar1 #item5-1 {
	background-image: url(../img/icones/transp.png);
}
#MenuBar1 #item5-2 {
	background-image: url(../img/icones/transp.png);
}
#MenuBar1 #item5-3 {
	background-image: url(../img/novo.jpg);
}

<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../css/stilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="3" background="../img/bg_menu.jpg"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a class="MenuBarItemSubmenu" href="#"><span id="item1">Pedidos</span></a>
        <ul>
            <li><a href="#"><span id="item1-1">Inserir</span></a></li>
		    <li><a href="#"><span id="item1-2">Listar</span></a></li>
	      </ul>
      </li>
       <li><a class="MenuBarItemSubmenu" href="#"><span id="item2">Clientes</span></a>
        <ul>
            <li><a href="#"><span id="item2-1">Inserir</span></a></li>
		    <li><a href="#"><span id="item2-2">Listar</span></a></li>
   		 </ul>
      </li> 
      <li><a class="MenuBarItemSubmenu" href="#"><span id="item3">Produtos</span></a>
        <ul>
            <li><a href="#"><span id="item3-1">Inserir</span></a></li>
		    <li><a href="#"><span id="item3-2">Listar</span></a></li>
   		    <li><a href="#"><span id="item3-3">Listar</span></a></li>
          </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#"><span id="item4">Fábricas</span></a>
        <ul>
            <li><a href="#"><span id="item4-1">Inserir</span></a></li>
		    <li><a href="#"><span id="item4-2">Listar</span></a></li>
   		    <li><a href="#"><span id="item4-3">Listar</span></a></li>
          </ul>
      </li>
 	<li><a class="MenuBarItemSubmenu" href="#"><span id="item5">Transportadoras</span></a>
        <ul>
            <li><a href="#"><span id="item5-1">Inserir</span></a></li>
		    <li><a href="#"><span id="item5-2">Listar</span></a></li>
   		    <li><a href="#"><span id="item5-3">Listar</span></a></li>
          </ul>
      </li>     
        
    </ul>    </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><!-- InstanceBeginEditable name="conteudo" --><?php echo $tNGs->displayValidationRules();?>
        <script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
        <script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
        <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
        </script>
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="4">
        <tr>
          <td align="left" valign="middle">&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng">
              <div class="KT_tngform">
                <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
                  <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rsproduto > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="4" cellspacing="1" class="KT_tngtable" id="tabela">
                      <tr>
                        <td colspan="2" bgcolor="#336699" class="titulo_tabela"><?php 
// Show IF Conditional region1 
if (@$_GET['produtoID'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
                Produto</td>
                      </tr>
                      <tr>
                        <td width="60" bgcolor="#CFDAEB" class="KT_th"><label for="fabricaID_<?php echo $cnt1; ?>">F&aacute;brica</label></td>
                        <td width="377"><select name="fabricaID_<?php echo $cnt1; ?>" class="texto" id="fabricaID_<?php echo $cnt1; ?>">
                          <option value="" <?php if (!(strcmp("", KT_escapeAttribute($row_rsproduto['fabricaID'])))) {echo "selected=\"selected\"";} ?>>Selecione</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_RsFabrica['fabricaID']?>"<?php if (!(strcmp($row_RsFabrica['fabricaID'], KT_escapeAttribute($row_rsproduto['fabricaID'])))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsFabrica['nome']?></option>
                          <?php
} while ($row_RsFabrica = mysql_fetch_assoc($RsFabrica));
  $rows = mysql_num_rows($RsFabrica);
  if($rows > 0) {
      mysql_data_seek($RsFabrica, 0);
	  $row_RsFabrica = mysql_fetch_assoc($RsFabrica);
  }
?>
                        </select>
                            <?php echo $tNGs->displayFieldError("produto", "fabricaID", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="unidade_<?php echo $cnt1; ?>">Unidade</label></td>
                        <td><select name="unidade_<?php echo $cnt1; ?>" class="texto" id="unidade_<?php echo $cnt1; ?>">
                          <option value=""  <?php if (!(strcmp("", $row_rsproduto['unidade']))) {echo "selected=\"selected\"";} ?>>Selecione</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_RsUn['UN']?>"<?php if (!(strcmp($row_RsUn['UN'], $row_rsproduto['unidade']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsUn['UN']?></option>
                          <?php
} while ($row_RsUn = mysql_fetch_assoc($RsUn));
  $rows = mysql_num_rows($RsUn);
  if($rows > 0) {
      mysql_data_seek($RsUn, 0);
	  $row_RsUn = mysql_fetch_assoc($RsUn);
  }
?>
                        </select>
                            <?php echo $tNGs->displayFieldError("produto", "unidade", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome</label></td>
                      <td><input name="nome_<?php echo $cnt1; ?>" type="text" class="texto" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsproduto['nome']); ?>" size="50" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("produto", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="preco_<?php echo $cnt1; ?>">Pre&ccedil;o</label></td>
                        <td><span id="sprytextfield1">
                        <input name="preco_<?php echo $cnt1; ?>" type="text" class="texto" id="preco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsproduto['preco']); ?>" size="7" />
                        <span class="textfieldInvalidFormatMsg">Formato inv&aacute;lido.</span></span><?php echo $tNGs->displayFieldHint("preco");?> <?php echo $tNGs->displayFieldError("produto", "preco", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_produto_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsproduto['kt_pk_produto']); ?>" />
                    <span class="texto_item">*Campo obrigat&oacute;rio.</span>
                    <?php } while ($row_rsproduto = mysql_fetch_assoc($rsproduto)); ?>
                    <br />
                    <br />
                    <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['produtoID'] == "") {
      ?>
                        <input name="KT_Insert1" type="submit" class="butao" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                        <?php 
      // else Conditional region1
      } else { ?>
                        <input name="KT_Update1" type="submit" class="butao" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                        <?php }
      // endif Conditional region1
      ?>
                      <input name="KT_Cancel1" type="button" class="butao" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" value="<?php echo NXT_getResource("Cancel_FB"); ?>" />
                    </div>
                  </div>
                </form>
              </div>
              <br class="clearfixplain" />
            </div>
          <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
      </table>
      <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "currency", {isRequired:false, validateOn:["blur"], hint:"0.00", useCharacterMasking:true});
//-->
      </script>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body><!-- InstanceEnd -->
</html>
<?php
mysql_free_result($RsFabrica);

mysql_free_result($RsUn);
?>
