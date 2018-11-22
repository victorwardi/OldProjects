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

$colname_Questoes = "-1";
if (isset($_GET['status'])) {
  $colname_Questoes = $_GET['status'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_Questoes = sprintf("SELECT * FROM questoes WHERE status = %s ORDER BY questaoID ASC", GetSQLValueString($colname_Questoes, "text"));
$Questoes = mysql_query($query_Questoes, $ConBD) or die(mysql_error());
$row_Questoes = mysql_fetch_assoc($Questoes);
$totalRows_Questoes = mysql_num_rows($Questoes);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/questoes.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gerenciamento de Questões</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
          <td align="left" bgcolor="#FF9900" class="Titulo"><?php 
		  
		  if($_GET['status'] == 1){
			 echo "Questões Ativas";}
		 
		 	  
		  if($_GET['status'] == 2){
			echo  "Questões Em Andamento";}
		 	  
		  if($_GET['status'] == 3){
			 echo "Questões Concluídas";}
		  
		   ?></td>
        </tr>
        <tr>
          <td align="left"><?php do { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="6">
                <tr>
                  <td align="left"><span class="seta">&raquo;</span> <span class="questoes"><strong><a href="ver.php?questaoID=<?php echo $row_Questoes['questaoID']; ?>&amp;status=<?php echo $row_Questoes['status']; ?>"><?php echo $row_Questoes['titulo']; ?></a></strong> - Atribuído para: </span><span class="para"><?php echo $row_Questoes['para']; ?></span></td>
                </tr>
                            </table>
              <?php } while ($row_Questoes = mysql_fetch_assoc($Questoes)); ?></td>
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
mysql_free_result($Questoes);
?>
