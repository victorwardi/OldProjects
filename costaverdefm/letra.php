<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
$colname_letra = "-1";
if (isset($_GET['id'])) {
  $colname_letra = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_letra = sprintf("SELECT * FROM top WHERE id = %s", $colname_letra);
$letra = mysql_query($query_letra, $CostaverdeFM) or die(mysql_error());
$row_letra = mysql_fetch_assoc($letra);
$totalRows_letra = mysql_num_rows($letra);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859" />
<title>RÁDIO COSTA VERDE FM - A RADIO QUE TEM A CARA DO RIO - 91,7mhz</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
-->
</style></head>

<body>
<table width="400" border="0" align="center" cellpadding="2" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td align="left" class="Titulo_Not"><?php echo $row_letra['musica']; ?></td>
  </tr>
  <tr>
    <td align="left" class="top_cantor"><?php echo $row_letra['cantor']; ?></td>
  </tr>
  <tr>
    <td><div align="justify"><?php echo $row_letra['letra']; ?></div></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#47BA6C"><p class="fonte11px_branca">Rádio Costa Verde FM - 91,7 mhz - A Rádio Que Tem A Cara do Rio <br />
    Todos os Direitos Resevados - 2007 - Desenvolvido por: <a href="mailto:saquabb@hotmail.com" class="fonte11px_branca_negrito">Victor Caetano </a></p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($letra);
?>
