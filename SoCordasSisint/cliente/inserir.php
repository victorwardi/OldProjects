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
$formValidation->addField("nome", true, "text", "", "", "", "Insira o nome.");
$formValidation->addField("razaoSocial", true, "text", "", "", "", "Insira a razão social.");
$formValidation->addField("cnpj", true, "text", "", "", "", "Insira o CNPJ/CPF.");
$formValidation->addField("inscricaoEstadual", false, "text", "", "", "", "Insira a inscrição estadual.");
$formValidation->addField("tel01", true, "text", "phone", "", "", "Insira um telefone.");
$formValidation->addField("tel02", false, "text", "phone", "", "", "Please enter a valid value.");
$formValidation->addField("fax", false, "text", "phone", "", "", "Please enter a valid value.");
$formValidation->addField("celular", false, "text", "phone", "", "", "Please enter a valid value.");
$formValidation->addField("email", false, "text", "email", "", "", "Please enter a valid value.");
$formValidation->addField("responsavel", true, "text", "", "", "", "Insira o nome do responsável.");
$formValidation->addField("rua", true, "text", "", "", "", "Insira a rua.");
$formValidation->addField("numero", true, "numeric", "int", "", "", "Insira o número.");
$formValidation->addField("bairro", true, "text", "", "", "", "Insira o bairro.");
$formValidation->addField("municipio", true, "text", "", "", "", "Insira o município.");
$formValidation->addField("UF", true, "text", "", "", "", "Selecione um Estado.");
$formValidation->addField("CEP", true, "text", "zip_us9", "", "", "Insira o CEP.");
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
$query_RsUF = "SELECT * FROM uf ORDER BY UF ASC";
$RsUF = mysql_query($query_RsUF, $ConBD) or die(mysql_error());
$row_RsUF = mysql_fetch_assoc($RsUF);
$totalRows_RsUF = mysql_num_rows($RsUF);

// Make an insert transaction instance
$ins_cliente = new tNG_multipleInsert($conn_ConBD);
$tNGs->addTransaction($ins_cliente);
// Register triggers
$ins_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_cliente->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "visualizar.php?clienteID={clienteID}");
// Add columns
$ins_cliente->setTable("cliente");
$ins_cliente->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_cliente->addColumn("razaoSocial", "STRING_TYPE", "POST", "razaoSocial");
$ins_cliente->addColumn("cnpj", "STRING_TYPE", "POST", "cnpj");
$ins_cliente->addColumn("inscricaoEstadual", "STRING_TYPE", "POST", "inscricaoEstadual");
$ins_cliente->addColumn("tel01", "STRING_TYPE", "POST", "tel01");
$ins_cliente->addColumn("tel02", "STRING_TYPE", "POST", "tel02");
$ins_cliente->addColumn("fax", "STRING_TYPE", "POST", "fax");
$ins_cliente->addColumn("celular", "STRING_TYPE", "POST", "celular");
$ins_cliente->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_cliente->addColumn("responsavel", "STRING_TYPE", "POST", "responsavel");
$ins_cliente->addColumn("rua", "STRING_TYPE", "POST", "rua");
$ins_cliente->addColumn("numero", "NUMERIC_TYPE", "POST", "numero");
$ins_cliente->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$ins_cliente->addColumn("complemento", "STRING_TYPE", "POST", "complemento");
$ins_cliente->addColumn("municipio", "STRING_TYPE", "POST", "municipio");
$ins_cliente->addColumn("UF", "STRING_TYPE", "POST", "UF", "{rscliente.UF}");
$ins_cliente->addColumn("CEP", "STRING_TYPE", "POST", "CEP");
$ins_cliente->setPrimaryKey("clienteID", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_cliente = new tNG_multipleUpdate($conn_ConBD);
$tNGs->addTransaction($upd_cliente);
// Register triggers
$upd_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_cliente->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "visualizar.php?clienteID={clienteID}");
// Add columns
$upd_cliente->setTable("cliente");
$upd_cliente->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_cliente->addColumn("razaoSocial", "STRING_TYPE", "POST", "razaoSocial");
$upd_cliente->addColumn("cnpj", "STRING_TYPE", "POST", "cnpj");
$upd_cliente->addColumn("inscricaoEstadual", "STRING_TYPE", "POST", "inscricaoEstadual");
$upd_cliente->addColumn("tel01", "STRING_TYPE", "POST", "tel01");
$upd_cliente->addColumn("tel02", "STRING_TYPE", "POST", "tel02");
$upd_cliente->addColumn("fax", "STRING_TYPE", "POST", "fax");
$upd_cliente->addColumn("celular", "STRING_TYPE", "POST", "celular");
$upd_cliente->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_cliente->addColumn("responsavel", "STRING_TYPE", "POST", "responsavel");
$upd_cliente->addColumn("rua", "STRING_TYPE", "POST", "rua");
$upd_cliente->addColumn("numero", "NUMERIC_TYPE", "POST", "numero");
$upd_cliente->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$upd_cliente->addColumn("complemento", "STRING_TYPE", "POST", "complemento");
$upd_cliente->addColumn("municipio", "STRING_TYPE", "POST", "municipio");
$upd_cliente->addColumn("UF", "STRING_TYPE", "POST", "UF");
$upd_cliente->addColumn("CEP", "STRING_TYPE", "POST", "CEP");
$upd_cliente->setPrimaryKey("clienteID", "NUMERIC_TYPE", "GET", "clienteID");

// Make an instance of the transaction object
$del_cliente = new tNG_multipleDelete($conn_ConBD);
$tNGs->addTransaction($del_cliente);
// Register triggers
$del_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_cliente->setTable("cliente");
$del_cliente->setPrimaryKey("clienteID", "NUMERIC_TYPE", "GET", "clienteID");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscliente = $tNGs->getRecordset("cliente");
$row_rscliente = mysql_fetch_assoc($rscliente);
$totalRows_rscliente = mysql_num_rows($rscliente);
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
      <table width="600" border="0" align="center" cellpadding="0" cellspacing="4">
        
        <tr>
          <td align="left">&nbsp;
            <?php
	echo $tNGs->getErrorMsg();
?>
            <div class="KT_tng"><div class="KT_tngform"><form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
              <?php $cnt1 = 0; ?>
                  <?php do { ?>
                    <?php $cnt1++; ?>
                    <?php 
// Show IF Conditional region1 
if (@$totalRows_rscliente > 1) {
?>
                      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                      <?php } 
// endif Conditional region1
?>
                    <table cellpadding="4" cellspacing="1" class="KT_tngtable" id="tabela">
                      <tr>
                        <td colspan="2" align="left" valign="middle" bgcolor="#336699" class="titulo_tabela"><?php 
// Show IF Conditional region1 
if (@$_GET['clienteID'] == "") {
?>
                  <?php echo NXT_getResource("Insert_FH"); ?>
                  <?php 
// else Conditional region1
} else { ?>
                  <?php echo NXT_getResource("Update_FH"); ?>
                  <?php } 
// endif Conditional region1
?>
          Cliente</td>
                      </tr>
                      <tr>
                        <td width="122" bgcolor="#CFDAEB" class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome</label></td>
                      <td width="420"><input name="nome_<?php echo $cnt1; ?>" type="text" class="texto" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['nome']); ?>" size="50" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("cliente", "nome", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="razaoSocial_<?php echo $cnt1; ?>">Raz&atilde;o Social</label></td>
                      <td><input name="razaoSocial_<?php echo $cnt1; ?>" type="text" class="texto" id="razaoSocial_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['razaoSocial']); ?>" size="60" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("razaoSocial");?> <?php echo $tNGs->displayFieldError("cliente", "razaoSocial", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="cnpj_<?php echo $cnt1; ?>">CNPJ/CPF</label></td>
                      <td>
                      <input name="cnpj_<?php echo $cnt1; ?>" type="text" class="texto" id="cnpj_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cnpj']); ?>" size="20" maxlength="20" />
                      <span class="textfieldRequiredMsg">A value is required.</span><?php echo $tNGs->displayFieldHint("cnpj");?> <?php echo $tNGs->displayFieldError("cliente", "cnpj", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="inscricaoEstadual_<?php echo $cnt1; ?>">Inscri&ccedil;&atilde;o Estadual</label></td>
                      <td><input name="inscricaoEstadual_<?php echo $cnt1; ?>" type="text" class="texto" id="inscricaoEstadual_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['inscricaoEstadual']); ?>" size="20" maxlength="20" />
                            <?php echo $tNGs->displayFieldHint("inscricaoEstadual");?> <?php echo $tNGs->displayFieldError("cliente", "inscricaoEstadual", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="tel01_<?php echo $cnt1; ?>">Telefone 01</label></td>
                      <td><span id="sprytextfield1">
                      <input name="tel01_<?php echo $cnt1; ?>" type="text" class="texto" id="tel01_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['tel01']); ?>" size="20" maxlength="13" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "tel01", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="tel02_<?php echo $cnt1; ?>">Telefone 02</label></td>
                      <td><span id="sprytextfield2">
                      <input name="tel02_<?php echo $cnt1; ?>" type="text" class="texto" id="tel02_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['tel02']); ?>" size="20" maxlength="13" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "tel02", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="fax_<?php echo $cnt1; ?>">Fax</label></td>
                      <td><span id="sprytextfield3">
                      <input name="fax_<?php echo $cnt1; ?>" type="text" class="texto" id="fax_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['fax']); ?>" size="20" maxlength="13" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "fax", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="celular_<?php echo $cnt1; ?>">Celular</label></td>
                      <td><span id="sprytextfield4">
                      <input name="celular_<?php echo $cnt1; ?>" type="text" class="texto" id="celular_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['celular']); ?>" size="20" maxlength="13" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "celular", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email</label></td>
                      <td><span id="sprytextfield5">
                      <input name="email_<?php echo $cnt1; ?>" type="text" class="texto" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['email']); ?>" size="32" maxlength="100" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "email", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="responsavel_<?php echo $cnt1; ?>">Respons&aacute;vel</label></td>
                      <td><input name="responsavel_<?php echo $cnt1; ?>" type="text" class="texto" id="responsavel_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['responsavel']); ?>" size="32" maxlength="200" />
                            <?php echo $tNGs->displayFieldHint("responsavel");?> <?php echo $tNGs->displayFieldError("cliente", "responsavel", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td colspan="2" bgcolor="#336699" class="titulo_tabela">Endere&ccedil;o</td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="rua_<?php echo $cnt1; ?>">Rua</label></td>
                      <td><input name="rua_<?php echo $cnt1; ?>" type="text" class="texto" id="rua_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['rua']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("rua");?> <?php echo $tNGs->displayFieldError("cliente", "rua", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="numero_<?php echo $cnt1; ?>">N&uacute;mero</label></td>
                      <td><span id="sprytextfield6">
                      <input name="numero_<?php echo $cnt1; ?>" type="text" class="texto" id="numero_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['numero']); ?>" size="10" />
                      <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "numero", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="bairro_<?php echo $cnt1; ?>">Bairro</label></td>
                      <td><input name="bairro_<?php echo $cnt1; ?>" type="text" class="texto" id="bairro_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['bairro']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("bairro");?> <?php echo $tNGs->displayFieldError("cliente", "bairro", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="complemento_<?php echo $cnt1; ?>">Complemento</label></td>
                      <td><input name="complemento_<?php echo $cnt1; ?>" type="text" class="texto" id="complemento_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['complemento']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("complemento");?> <?php echo $tNGs->displayFieldError("cliente", "complemento", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="municipio_<?php echo $cnt1; ?>">Munic&iacute;pio</label></td>
                      <td><input name="municipio_<?php echo $cnt1; ?>" type="text" class="texto" id="municipio_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['municipio']); ?>" size="32" maxlength="255" />
                            <?php echo $tNGs->displayFieldHint("municipio");?> <?php echo $tNGs->displayFieldError("cliente", "municipio", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="UF_<?php echo $cnt1; ?>">UF</label></td>
                        <td><select name="UF_<?php echo $cnt1; ?>" class="texto" id="UF_<?php echo $cnt1; ?>">
<option value="" <?php if (!(strcmp("", KT_escapeAttribute($row_rscliente['UF'])))) {echo "selected=\"selected\"";} ?>>Selecione</option>
<?php
do {  
?>
<option value="<?php echo $row_RsUF['UF']?>"<?php if (!(strcmp($row_RsUF['UF'], KT_escapeAttribute($row_rscliente['UF'])))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsUF['UF']?></option>
<?php
} while ($row_RsUF = mysql_fetch_assoc($RsUF));
  $rows = mysql_num_rows($RsUF);
  if($rows > 0) {
      mysql_data_seek($RsUF, 0);
	  $row_RsUF = mysql_fetch_assoc($RsUF);
  }
?>
                        </select>
                            <?php echo $tNGs->displayFieldError("cliente", "UF", $cnt1); ?> </td>
                      </tr>
                      <tr>
                        <td bgcolor="#CFDAEB" class="KT_th"><label for="CEP_<?php echo $cnt1; ?>">CEP</label></td>
                      <td><span id="sprytextfield7">
                        <input name="CEP_<?php echo $cnt1; ?>" type="text" class="texto" id="CEP_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['CEP']); ?>" size="15" maxlength="9" />
                        <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span><?php echo $tNGs->displayFieldError("cliente", "CEP", $cnt1); ?> </td>
                      </tr>
                    </table>
                    <input type="hidden" name="kt_pk_cliente_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscliente['kt_pk_cliente']); ?>" />
                    <span class="texto_item">* Campo obrigat&oacute;rio. </span><br />
                    <br />
                    <?php } while ($row_rscliente = mysql_fetch_assoc($rscliente)); ?>
                  <div class="KT_bottombuttons">
                    <div>
                      <?php 
      // Show IF Conditional region1
      if (@$_GET['clienteID'] == "") {
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
      </table>

      <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "phone_number", {format:"phone_custom", pattern:"(00)0000-0000", validateOn:["blur"], useCharacterMasking:true, isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {pattern:"(00)0000-0000", useCharacterMasking:true, isRequired:false, validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {pattern:"(00)0000-0000", validateOn:["blur"], useCharacterMasking:true, isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "custom", {pattern:"(00)0000-0000", validateOn:["blur"], useCharacterMasking:true, isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {isRequired:false, validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {validateOn:["blur"], isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "zip_code", {format:"zip_custom", pattern:"00000-000", useCharacterMasking:true, validateOn:["blur"], isRequired:false});
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
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsUF);
?>
