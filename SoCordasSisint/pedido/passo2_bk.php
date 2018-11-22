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

$colname_RsFabrica = "-1";
if (isset($_GET['fabricaID'])) {
  $colname_RsFabrica = $_GET['fabricaID'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsFabrica = sprintf("SELECT * FROM fabrica WHERE fabricaID = %s", GetSQLValueString($colname_RsFabrica, "int"));
$RsFabrica = mysql_query($query_RsFabrica, $ConBD) or die(mysql_error());
$row_RsFabrica = mysql_fetch_assoc($RsFabrica);
$totalRows_RsFabrica = mysql_num_rows($RsFabrica);

mysql_select_db($database_ConBD, $ConBD);
$query_RsPedido = "SELECT * FROM pedido ORDER BY pedidoID DESC";
$RsPedido = mysql_query($query_RsPedido, $ConBD) or die(mysql_error());
$row_RsPedido = mysql_fetch_assoc($RsPedido);
$totalRows_RsPedido = mysql_num_rows($RsPedido);

mysql_select_db($database_ConBD, $ConBD);
$query_RsProduto = "SELECT * FROM produto ORDER BY nome ASC";
$RsProduto = mysql_query($query_RsProduto, $ConBD) or die(mysql_error());
$row_RsProduto = mysql_fetch_assoc($RsProduto);
$totalRows_RsProduto = mysql_num_rows($RsProduto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<script type="text/javascript">

var xmlHttp


function buscaProduto()
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null) {
 alert ("Browser does not support HTTP Request")
 return
 }
 	var pedidoID = document.getElementById('pedidoID');
	// Pega o número do item atual e adiciona mais 1.
	var contador = document.getElementById('totalProduto');
	var id = parseInt(contador.value) + 1;
	contador.value = id;
	var str = document.getElementById('produto').value;
	var url="buscaProduto.php"
	url=url+"?q="+str+"&numero="+id+"&pedidoID="+pedidoID
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 // Pega o número do item atual e adiciona mais 1.
	var cnt = document.getElementById('totalProduto').value -1;
	//alert("contador = "+ cnt);
 	document.getElementById("novoProduto_" + cnt).innerHTML=xmlHttp.responseText;
 	document.getElementById('remove').value = cnt;
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

function removeProduto(){

	//pega o valor atual da ultima linha
	document.getElementById('totalProduto').value--;
	
	var linha =  document.getElementById('remove').value;
	
 	var iten = document.getElementById('linha_'+linha).value;
	
	var novoProduto = document.getElementById('linha_'+linha).value-1;
	
 	document.getElementById("novoProduto_" + iten).innerHTML="<div id='novoProduto_"+novoProduto+"'></div>";
	// campo de controle do ultimo item recebe o valor do novo produto
	document.getElementById('remove').value = novoProduto;
}

function liberaAdd(){

if(document.getElementById('produto').selectedIndex !=0)
document.getElementById('adicionar').disabled = false;
}

function liberaExcluir(){

if(document.getElementById('totalProduto').value == 2)
document.getElementById('remover').disabled = false;
}

// Funcoes de Calculo
function calculaTotalProduto(){

   var quantidade = document.getElementById('totalProduto').value;
   document.getElementById('totalPedido').value = 0.00;   
   var i = quantidade;
   
   for(i=1;i<=quantidade; i++){
   
   document.getElementById('descontoPorCento_'+i).readOnly = false;
   document.getElementById('descontoReal_'+i).readOnly = false;
   
	var qtd = parseFloat(document.getElementById('quantidade_'+i).value);
	var preco = parseFloat(document.getElementById('preco_'+i).value);
	var totalProduto = parseFloat(document.getElementById('total_'+i).value);
	
	//Calcula desconto em R$
	var descontoReal = document.getElementById('descontoReal_'+i);
	
	if (descontoReal.value != 0.00){
	
	preco = parseFloat(preco) - parseFloat(descontoReal.value);
	
	//Bloqueia o campo de desconto em %
	document.getElementById('descontoPorCento_'+i).readOnly = true;
		
	}
	
	
	//Calcula desconto em %
	var descontoPorCento = document.getElementById('descontoPorCento_'+i);
	
	if (descontoPorCento.value != 0.00){
	
	preco = parseFloat(preco) - ((parseFloat(descontoPorCento.value)/100)* parseFloat(preco));
	
	//Bloqueia o campo dem R$
	document.getElementById('descontoReal_'+i).readOnly = true;
		
	}
	
	//calcula o total de cada produto (quantidade X preco)
	totalProduto = qtd*preco;

	
	//Atribui o valor total de cada produto
	document.getElementById('total_'+i).value = parseFloat(totalProduto).toFixed(2);
		
 	var total = document.getElementById('totalPedido');
	
	//Calcula o total do pedido
	total.value = (parseFloat(total.value) + parseFloat(document.getElementById('total_'+i).value)).toFixed(2);
	
	
	
	

}

}

</script>
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
      <table width="78%" border="0" align="center" cellpadding="0" cellspacing="4">
        <tr>
          <td>PASSO2</td>
        </tr>
        <tr>
          <td>Pedido numero:<?php echo $row_RsPedido['numeroPedido']; ?></td>
        </tr>
        <tr>
          <td>Cliente: </td>
        </tr>
        <tr>
          <td><table width="80%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <td width="5%">nome:</td>
              <td width="95%"><?php echo $row_RsCliente['razaoSocial']; ?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>F&aacute;brica: <?php echo $row_RsFabrica['fabricaID']; ?></td>
        </tr>
        <tr>
          <td>Data: <?php echo $row_RsPedido['data']; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr>
          <td><form onSubmit="return false"> 
  <p>
    <label>
    <select name="produto" id="produto" onchange="liberaAdd()">
      <option value="null">- Selecione um produto -</option>
      <?php
do {  
?>
      <option value="<?php echo $row_RsProduto['produtoID']?>"><?php echo $row_RsProduto['nome']?></option>
      <?php
} while ($row_RsProduto = mysql_fetch_assoc($RsProduto));
  $rows = mysql_num_rows($RsProduto);
  if($rows > 0) {
      mysql_data_seek($RsProduto, 0);
	  $row_RsProduto = mysql_fetch_assoc($RsProduto);
  }
?>
        </select>
    </label>
    <label>
    <input name="adicionar" type="image" disabled="disabled" id="adicionar" onClick="buscaProduto();liberaExcluir();calculaTotalProduto();" src="../img/mais.jpg" alt="Adicionar">
    <input name="adicionar" type="image" disabled="disabled" id="remover" onClick="removeProduto();calculaTotalProduto();" src="../img/remove.jpg" alt="Remover">
    </label>
  </p>
</form>
<table width="680" border='0' cellpadding="4" cellspacing="0" >
<tr>
	<th width="30" align="center" bgcolor="#CCCCCC">Item</th>
	<th width="40" align="center" bgcolor="#CCCCCC">Qtd</th>
	<th width="30" align="center" bgcolor="#CCCCCC">Un</th>    
	<th width="250"align="center" bgcolor="#CCCCCC">Produto</th>
	<th width="80" align="center" bgcolor="#CCCCCC">Preco</th>
	<th width="80" align="center" bgcolor="#CCCCCC">Desc.(R$)</th>
    <th width="80" align="center" bgcolor="#CCCCCC">Desc.(%)</th>
    <th width="100"align="center" bgcolor="#CCCCCC">Total</th>
</tr>
</table>
<div id="novoProduto_1"><b>Nenhum produto adicionado.</b></div>
<div id="Total" class="totalPedido">Total: R$<input type="text" class="totalPedidoValor" id="totalPedido" value="0.00"></div>
<input type="hidden" id="totalProduto" value="1">
<input type="hidden" id="remove" value="1"></td>
        </tr>
        
      </table>
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
mysql_free_result($RsCliente);

mysql_free_result($RsFabrica);

mysql_free_result($RsPedido);

mysql_free_result($RsProduto);
?>
