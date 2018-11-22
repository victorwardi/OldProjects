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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET["MM_insert"])) && ($_GET["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pedido (numeroPedido, clienteID, fabricaID, data) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_GET['numeroPedido'], "int"),
                       GetSQLValueString($_GET['clienteID'], "int"),
                       GetSQLValueString($_GET['fabricaID'], "int"),
                       GetSQLValueString($_GET['data'], "text"));

  mysql_select_db($database_ConBD, $ConBD);
  $Result1 = mysql_query($insertSQL, $ConBD) or die(mysql_error());

  $insertGoTo = "passo2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_ConBD, $ConBD);
$query_RsFabrica = "SELECT * FROM fabrica ORDER BY nome ASC";
$RsFabrica = mysql_query($query_RsFabrica, $ConBD) or die(mysql_error());
$row_RsFabrica = mysql_fetch_assoc($RsFabrica);
$totalRows_RsFabrica = mysql_num_rows($RsFabrica);

mysql_select_db($database_ConBD, $ConBD);
$query_RsClientes = "SELECT * FROM cliente ORDER BY nome ASC";
$RsClientes = mysql_query($query_RsClientes, $ConBD) or die(mysql_error());
$row_RsClientes = mysql_fetch_assoc($RsClientes);
$totalRows_RsClientes = mysql_num_rows($RsClientes);

$colname_RsNumero = "-1";
if (isset($_POST['fabrica'])) {
  $colname_RsNumero = $_POST['fabrica'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsNumero = sprintf(" SELECT p.numeroPedido, f.fabricaID FROM pedido p INNER JOIN fabrica f ON f.fabricaID=p.fabricaID WHERE p.fabricaID = %s ORDER BY p.numeroPedido DESC", GetSQLValueString($colname_RsNumero, "int"));
$RsNumero = mysql_query($query_RsNumero, $ConBD) or die(mysql_error());
$row_RsNumero = mysql_fetch_assoc($RsNumero);
$totalRows_RsNumero = mysql_num_rows($RsNumero);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<script type="text/JavaScript">
function liberaFabrica(){
	if(document.getElementById('cliente').selectedIndex != 0){
	document.getElementById('fabrica').disabled = false}
	if(document.getElementById('fabrica').selectedIndex != 0){
	document.getElementById('submitButton').disabled = false}
	}

function liberabutton(){

	if(document.getElementById('fabrica').selectedIndex != 0){
	document.getElementById('submitButton').disabled = false}
	}
	
function criaPedido(){
 document.form1.submit();
 } 

window.onload = function(){
liberaFabrica(); dataAtual();
}


function buscaNumeroPedido2()
{ 

	if(document.getElementById('fabrica').selectedIndex != 0){
	buscaNumeroPedido();	
	}
}

var xmlHttp


function buscaNumeroPedido()
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null) {
 alert ("Browser does not support HTTP Request")
 return
 }
 	var cliente =document.getElementById('cliente').value;
	
	var fabrica =document.getElementById('fabrica').value;
	
	var url="buscaNumeroPedido.php"
	url=url+"?fabricaID="+fabrica+"&cliente="+cliente
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  	document.getElementById("dadosPedido").innerHTML=xmlHttp.responseText;
 	
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}


</script>
<script src="../js/js.js" type="text/javascript"></script>
<link href="../css/stilos.css" rel="stylesheet" type="text/css" />
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
    <td colspan="3" align="center"><!-- InstanceBeginEditable name="conteudo" -->
<table width="31%" border="0" align="center" cellpadding="4" cellspacing="0">
  
  <tr>
    <td align="center" valign="middle"><form id="formDados" name="formDados" method="post" action="">
      <table width="100%" border="0" cellpadding="4" cellspacing="1" class="tabela" id="tabela">
        <tr>
          <td colspan="2" align="left" bgcolor="#336699"><span class="titulo_tabela">PASSO 1</span></td>
          </tr>
        <tr>
          <td width="26%" align="left" bgcolor="#CFDAEB">Cliente</td>
          <td width="74%" align="left"><label>
            <select name="cliente" class="texto_item" id="cliente" onchange="liberaFabrica();buscaNumeroPedido2()">
              <option value="null" <?php if (!(strcmp("null", $_POST['cliente']))) {echo "selected=\"selected\"";} ?>>Selecione</option>
              <?php
do {  
?><option value="<?php echo $row_RsClientes['clienteID']?>"<?php if (!(strcmp($row_RsClientes['clienteID'], $_POST['cliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsClientes['nome']?></option>
                <?php
} while ($row_RsClientes = mysql_fetch_assoc($RsClientes));
  $rows = mysql_num_rows($RsClientes);
  if($rows > 0) {
      mysql_data_seek($RsClientes, 0);
	  $row_RsClientes = mysql_fetch_assoc($RsClientes);
  }
?>
                        </select>
          </label></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">F&aacute;brica</td>
          <td align="left">
            <select name="fabrica" disabled="disabled" class="texto_item" id="fabrica" onchange="buscaNumeroPedido();liberabutton()">
              <option value="null" <?php if (!(strcmp("null", $_POST['fabrica']))) {echo "selected=\"selected\"";} ?>>Selecione</option>
<?php
do {  
?><option value="<?php echo $row_RsFabrica['fabricaID']?>"<?php if (!(strcmp($row_RsFabrica['fabricaID'], $_POST['fabrica']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RsFabrica['nome']?></option>
                <?php
} while ($row_RsFabrica = mysql_fetch_assoc($RsFabrica));
  $rows = mysql_num_rows($RsFabrica);
  if($rows > 0) {
      mysql_data_seek($RsFabrica, 0);
	  $row_RsFabrica = mysql_fetch_assoc($RsFabrica);
  }
?>
            </select>            </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="button" disabled="disabled" class="butao" id="submitButton" onclick="criaPedido()" value="Avan&ccedil;ar &raquo; "/></td>
          </tr>
      </table>
       </form>    </td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" method="get" name="form1" id="form1">
<input type="hidden" name="data" id="data" value="" size="32" />
<div id="dadosPedido"></div>
   <input type="hidden" name="MM_insert" value="form1" />
 
</form>
<p>&nbsp;</p>
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
mysql_free_result($RsFabrica);

mysql_free_result($RsClientes);

mysql_free_result($RsNumero);
?>
