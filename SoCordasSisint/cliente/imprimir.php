<?php require_once('../Connections/ConBD.php'); ?>
<?php
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

$colname_RsCliente = "-1";
if (isset($_GET['clienteID'])) {
  $colname_RsCliente = $_GET['clienteID'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsCliente = sprintf("SELECT * FROM cliente WHERE clienteID = %s", GetSQLValueString($colname_RsCliente, "int"));
$RsCliente = mysql_query($query_RsCliente, $ConBD) or die(mysql_error());
$row_RsCliente = mysql_fetch_assoc($RsCliente);
$totalRows_RsCliente = mysql_num_rows($RsCliente);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sisint - Só Cordas Representações LTDA</title>
<link href="../css/stilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body onload="window.print();">
<table width="500" border="1" align="center" cellpadding="4" cellspacing="0" id="tabelaImpressao">
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#EFEFEF" class="titulo_tabela"><strong class="titulo_tabelaImpresao"><?php echo $row_RsCliente['nome']; ?></strong></td>
  </tr>
  <tr>
    <td width="112" bgcolor="#FFFFFF"><span class="style1">
      <label for="razaoSocial_1">Raz&atilde;o Social</label>
    </span></td>
    <td width="366" align="center" valign="top"><?php echo $row_RsCliente['razaoSocial']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="cnpj_1">CNPJ/CPF</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['cnpj']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="inscricaoEstadual_1">Inscri&ccedil;&atilde;o   Estadual</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['inscricaoEstadual']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="tel01_1">Telefone 01</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['tel01']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="tel02_1">Telefone 02</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['tel02']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="fax_1">Fax</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['fax']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="celular_1">Celular</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['celular']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="email_1">Email</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['email']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="responsavel_1">Respons&aacute;vel</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['responsavel']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#EFEFEF" class="titulo_tabelaImpresao">Endere&ccedil;o</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="rua_1">Rua</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['rua']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="numero_1">N&uacute;mero</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['numero']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="bairro_1">Bairro</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['bairro']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="complemento_1">Complemento</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['complemento']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="municipio_1">Munic&iacute;pio</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['municipio']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="UF_1">UF</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['UF']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><span class="style1">
      <label for="CEP_1">CEP</label>
    </span></td>
    <td align="center" valign="top"><?php echo $row_RsCliente['CEP']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsCliente);
?>
