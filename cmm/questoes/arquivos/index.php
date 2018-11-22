<?php require_once('../../Connections/ConBD.php'); ?>
<?php require_once('login.php'); ?>
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

mysql_select_db($database_ConBD, $ConBD);
$query_QuestoesAtivas = "SELECT * FROM questoes WHERE status = '1' ORDER BY questaoID DESC";
$QuestoesAtivas = mysql_query($query_QuestoesAtivas, $ConBD) or die(mysql_error());
$row_QuestoesAtivas = mysql_fetch_assoc($QuestoesAtivas);
$totalRows_QuestoesAtivas = mysql_num_rows($QuestoesAtivas);

mysql_select_db($database_ConBD, $ConBD);
$query_QuestoesEmAndamento = "SELECT * FROM questoes WHERE status = '2' ORDER BY questaoID DESC";
$QuestoesEmAndamento = mysql_query($query_QuestoesEmAndamento, $ConBD) or die(mysql_error());
$row_QuestoesEmAndamento = mysql_fetch_assoc($QuestoesEmAndamento);
$totalRows_QuestoesEmAndamento = mysql_num_rows($QuestoesEmAndamento);

$maxRows_QuestoesConcluidas = 5;
$pageNum_QuestoesConcluidas = 0;
if (isset($_GET['pageNum_QuestoesConcluidas'])) {
  $pageNum_QuestoesConcluidas = $_GET['pageNum_QuestoesConcluidas'];
}
$startRow_QuestoesConcluidas = $pageNum_QuestoesConcluidas * $maxRows_QuestoesConcluidas;

mysql_select_db($database_ConBD, $ConBD);
$query_QuestoesConcluidas = "SELECT * FROM questoes WHERE status = '3' ORDER BY questaoID DESC";
$query_limit_QuestoesConcluidas = sprintf("%s LIMIT %d, %d", $query_QuestoesConcluidas, $startRow_QuestoesConcluidas, $maxRows_QuestoesConcluidas);
$QuestoesConcluidas = mysql_query($query_limit_QuestoesConcluidas, $ConBD) or die(mysql_error());
$row_QuestoesConcluidas = mysql_fetch_assoc($QuestoesConcluidas);

if (isset($_GET['totalRows_QuestoesConcluidas'])) {
  $totalRows_QuestoesConcluidas = $_GET['totalRows_QuestoesConcluidas'];
} else {
  $all_QuestoesConcluidas = mysql_query($query_QuestoesConcluidas);
  $totalRows_QuestoesConcluidas = mysql_num_rows($all_QuestoesConcluidas);
}
$totalPages_QuestoesConcluidas = ceil($totalRows_QuestoesConcluidas/$maxRows_QuestoesConcluidas)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gerenciamento de Questões</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 12px;
}
body {
	background-color: #096FB7;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #666666;
}
a:active {
	text-decoration: none;
	color: #000000;
}
h1 {
	font-size: 16px;
	color: #FFFFFF;
}
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
}
.seta {
	font-size: 14px;
	font-weight: bold;
	color: #FF3300;
}
.statusVazio {
	font-size: 9px;
}
.questoes {
	font-size: 10px;
}
.para {
	font-size: 10px;
	font-weight: bold;
	color: #FF3300;
}
.Titulo {
	font-size: 16px;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td height="94" colspan="2" bgcolor="#FF9900"><img src="topo.jpg" alt="Sistema de Gerenciamento de Questões" width="800" height="120" /></td>
  </tr>
  <tr>
    <td width="28%" height="120" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="2" bgcolor="#FFFFFF">
      <tr>
        <td align="left" bgcolor="#FF9900" class="Titulo">Questões</td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo; </span><a href="adicionar.php">Adicionar Nova</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"> <span class="seta">&raquo;</span> <a href="listar.php?status=1">Ativas</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="listar.php?status=2">Em Andamento</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="listar.php?status=3">Concluídas</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#FBE6C8"><span class="seta">&raquo;</span> <a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
    </table></td>
    <td width="72%" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td bgcolor="#FF9900" class="Titulo">Bem Vindo!</td>
        </tr>
        <tr>
          <td>Utilize este sistema para Gerenciar as Questões do Site</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFCC99"><strong>Ativas - <span class="seta"><?php echo $totalRows_QuestoesAtivas ?></span> </strong></td>
        </tr>
        <tr>
          <td><?php if ($totalRows_QuestoesAtivas > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="6">
                  <tr>
                    <td align="left"><span class="seta">&raquo;</span> <span class="questoes"><strong><a href="ver.php?questaoID=<?php echo $row_QuestoesAtivas['questaoID']; ?>&amp;status=<?php echo $row_QuestoesAtivas['status']; ?>"><?php echo $row_QuestoesAtivas['titulo']; ?></a></strong> - Atribuído para: </span><span class="para"><?php echo $row_QuestoesAtivas['para']; ?></span></td>
                  </tr>
                                              </table>
                <?php } while ($row_QuestoesAtivas = mysql_fetch_assoc($QuestoesAtivas)); ?>
              <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_QuestoesAtivas == 0) { // Show if recordset empty ?>
                <span class="statusVazio">Não há questoes ativas.</span>
                <?php } // Show if recordset empty ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFCC99"><strong>Em Andamento - <span class="seta"><?php echo $totalRows_QuestoesEmAndamento ?></span> </strong></td>
        </tr>
        <tr>
          <td><?php if ($totalRows_QuestoesEmAndamento > 0) { // Show if recordset not empty ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="6">
                </table>
                <?php do { ?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td align="left"><span class="seta">&raquo;</span> <span class="questoes"><strong><a href="ver.php?questaoID=<?php echo $row_QuestoesEmAndamento['questaoID']; ?>&amp;status=<?php echo $row_QuestoesEmAndamento['status']; ?>"><?php echo $row_QuestoesEmAndamento['titulo']; ?></a></strong> - Atribuído para: </span><span class="para"><?php echo $row_QuestoesEmAndamento['para']; ?></span></td>
                    </tr>
                  </table>
                  <?php } while ($row_QuestoesEmAndamento = mysql_fetch_assoc($QuestoesEmAndamento)); ?>
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_QuestoesEmAndamento == 0) { // Show if recordset empty ?>
                <span class="statusVazio">Não há questoes em andamento.</span>
                <?php } // Show if recordset empty ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFCC99"><strong>Concluídas - <span class="seta"><?php echo $totalRows_QuestoesConcluidas ?></span> </strong></td>
        </tr>
        <tr>
           <td><?php if ($totalRows_QuestoesConcluidas > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="6">
                  <tr>
                    <td align="left"><span class="seta">&raquo;</span> <span class="questoes"><strong><a href="ver.php?questaoID=<?php echo $row_QuestoesConcluidas['questaoID']; ?>&amp;status=<?php echo $row_QuestoesConcluidas['status']; ?>"><?php echo $row_QuestoesConcluidas['titulo']; ?></a></strong> - Atribuído para: </span><span class="para"><?php echo $row_QuestoesConcluidas['para']; ?></span></td>
                  </tr>
                                              </table>
                <?php } while ($row_QuestoesConcluidas = mysql_fetch_assoc($QuestoesConcluidas)); ?>
              <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_QuestoesConcluidas == 0) { // Show if recordset empty ?>
                <span class="statusVazio">Não há questoes concluídas.</span>
                <?php } // Show if recordset empty ?></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#FF9900"><img src="base.jpg" width="800" height="40" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($QuestoesAtivas);

mysql_free_result($QuestoesEmAndamento);

mysql_free_result($QuestoesConcluidas);
?>
