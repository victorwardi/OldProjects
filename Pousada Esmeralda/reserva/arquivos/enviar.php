<?php require_once('../../Connections/conBD.php'); ?>
<?php require_once('totais.php'); ?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

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
$colname_RsResposta = "-1";
if (isset($_POST['id'])) {
  $colname_RsResposta = $_POST['id'];
}
mysql_select_db($database_conBD, $conBD);
$query_RsResposta = sprintf("SELECT * FROM contato WHERE idContato = %s", GetSQLValueString($colname_RsResposta, "int"));
$RsResposta = mysql_query($query_RsResposta, $conBD) or die(mysql_error());
$row_RsResposta = mysql_fetch_assoc($RsResposta);
$totalRows_RsResposta = mysql_num_rows($RsResposta);

ob_start();

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE contato SET status=%s WHERE idContato=%s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conBD, $conBD);
  $Result1 = mysql_query($updateSQL, $conBD) or die(mysql_error());

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Sistema do Contato da Central de Reservas</title>
<style type="text/css">
<!--
.Titulo {	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
  $sectemailObj = new tNG_EmailPageSection();
  $sectemailObj->getCSSFrom(__FILE__);
  $sectemailObj->setTo("{RsResposta.email}");
  $sectemailObj->setFrom("pousadaesmeralda@terra.com.br");
  $sectemailObj->setSubject("Central de Reservas Pousada Esmeralda");
  $sectemailObj->setFormat("HTML/Text");
  $sectemailObj->setEncoding("ISO-8859-1");
  $sectemailObj->setImportance("Normal");
  $sectemailObj->BeginContent();
?>
  <table width="465" border="0" align="center" cellpadding="4" cellspacing="2">
    <tr>
      <td width="453" align="left" class="Titulo"><img src="topo.jpg" alt="Central de Reservas - Hotel Pousada Esmeralda" border="0"/></td>
    </tr>
    <tr>
      <td align="left"><fieldset>
        <legend>Resposta da Solicita&ccedil;&atilde;o de Reserva</legend>
        <form id="form1" name="form1" method="post" action="">
          <table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td align="left" valign="top" class="textbox"><strong>Valor da di&aacute;ria:</strong> R$ <?php echo $_POST['valorDiaria'];?> </td>
            </tr>
            <tr>
              <td align="left" valign="top" class="textbox"><strong>Valor total:</strong> R$ <?php echo $_POST['valorTotal'];?></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="textbox"><strong>Data do dep&oacute;sito:</strong> <?php echo $_POST['dataDeposito'];?></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="textbox"><strong>Valor do dep&oacute;sito:</strong> R$ <?php echo $_POST['valorDeposito'];?></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="textbox"><strong>Outras informa&ccedil;&otilde;es:</strong><br />
                <br />
                <?php echo $_POST['outras'];?> </td>
            </tr>
          </table>
        </form>
      </fieldset></td>
    </tr>
    <tr>
      <td align="left"><fieldset>
        <legend>Informa&ccedil;&otilde;es para o Dep&oacute;sito</legend>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr>
            <td class="textbox"><strong>Banco:</strong> Banco do Brasil</td>
          </tr>
          <tr>
            <td class="textbox"><strong>Ag&ecirc;ncia:</strong> 1571-7</td>
          </tr>
          <tr>
            <td class="textbox"><strong>Conta Corrente:</strong> 11457- X</td>
          </tr>
          <tr>
            <td class="textbox"><strong>Favorecido:</strong> Hotel Pousada Esmeralda</td>
          </tr>
          <tr>
            <td class="textbox"><strong>CNPJ:</strong> 36.513.166/0001-59</td>
          </tr>
          <tr>
            <td class="textbox"><strong>A reserva s&oacute; ser&aacute; confirmada mediante envio do comprovante de dep&oacute;sito via:</strong></td>
          </tr>
          <tr>
            <td class="textbox"><strong>Email</strong>: info@pousadaesmeralda.com.br ou FAX: (24)  3352 1769</td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
    <tr>
      <td align="left"><fieldset>
        <legend>Dados da Reserva</legend>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Nome: </strong><?php echo $row_RsResposta['nome']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Email: </strong><?php echo $row_RsResposta['email']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Telefone: </strong><?php echo $row_RsResposta['telefone']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Cidade: </strong><?php echo $row_RsResposta['cidade']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>UF: </strong><?php echo $row_RsResposta['uf']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Pa&iacute;s: </strong><?php echo $row_RsResposta['pais']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Data de Chegada: </strong><?php echo $row_RsResposta['chegada']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Data de Partida: </strong><?php echo $row_RsResposta['partida']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Tipo de Acomoda&ccedil;&atilde;o: </strong><?php echo $row_RsResposta['tipoAcomodacao']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Quantidade de Adultos: </strong><?php echo $row_RsResposta['qtdAdulto']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><strong>Quantidade de Crian&ccedil;as: </strong><?php echo $row_RsResposta['qtdCrianca']; ?></td>
          </tr>
          <tr class="KT_tngtable">
            <td class="textbox"><span class="txt_verde"><strong>Informa&ccedil;&otilde;es Adicionais: </strong></span></td>
          </tr>
          <tr>
            <td class="textbox"><?php echo $row_RsResposta['infoAdicionais']; ?></td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
    <tr>
      <td align="left" valign="top"></td>
    </tr>
      </table>
  <?php
  $sectemailObj->EndContent();
  $sectemailObj->Execute();
?></body>
</html>
<?php
mysql_free_result($RsResposta);

//Redirect Email sectemailObj
  $redObj = new tNG_Redirect(null);
  $redObj->setURL("ok.php");
  $redObj->setKeepURLParams(false);
  $redObj->Execute();
//End Redirect Email sectemailObj
?>
