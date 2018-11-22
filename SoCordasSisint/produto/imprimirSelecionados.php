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

$colname_RsProduto = "-1";
if (isset($_POST['nome'])) {
  $colname_RsProduto = $_POST['nome'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsProduto = sprintf("SELECT P.*, F.nome AS Nomefabrica FROM produto P INNER JOIN fabrica F on (P.fabricaID = F.fabricaID) WHERE P.nome LIKE %s ", GetSQLValueString("%" . $colname_RsProduto . "%", "text"));
$RsProduto = mysql_query($query_RsProduto, $ConBD) or die(mysql_error());
$row_RsProduto = mysql_fetch_assoc($RsProduto);
$totalRows_RsProduto = mysql_num_rows($RsProduto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sisint - Só Cordas Representações LTDA</title>
<link href="../css/stilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="500" border="0" align="center" cellpadding="4" cellspacing="0" id="tabela">
  <tr>
    <td bgcolor="#CFDAEB" class="texto_item">Nome</td>
    <td bgcolor="#CFDAEB" class="texto_item">Un</td>
    <td bgcolor="#CFDAEB" class="texto_item">Pre&ccedil;o</td>
    <td bgcolor="#CFDAEB" class="texto_item">F&aacute;brica</td>
  </tr>
  <?php $contador = "1"; do {?>
  
  
        <?php 
		$obj = 'check'.$contador;		
		$check = $_POST[$obj];
		
// Show IF Conditional region1 
if (@$check == "on" ) {
?>
          <tr>
            <td class="texto"><?php echo $row_RsProduto['nome']; ?></td>
            <td class="texto"><?php echo $row_RsProduto['unidade']; ?></td>
            <td class="texto"><?php echo $row_RsProduto['preco']; ?></td>
            <td class="texto"><?php echo $row_RsProduto['Nomefabrica']; ?></td>
          </tr>
          <?php } 
// endif Conditional region1
?>


  <?php $contador++; } while ($row_RsProduto = mysql_fetch_assoc($RsProduto)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($RsProduto);
?>
