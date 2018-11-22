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

mysql_select_db($database_ConBD, $ConBD);
$query_RsProdutos = "SELECT * FROM produto ORDER BY nome ASC";
$RsProdutos = mysql_query($query_RsProdutos, $ConBD) or die(mysql_error());
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);
$totalRows_RsProdutos = mysql_num_rows($RsProdutos);
?><html>
<head>
<script>

var xmlHttp


function showUser()
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null) {
 alert ("Browser does not support HTTP Request")
 return
 }
	// Pega o número do item atual e adiciona mais 1.
	var contador = document.getElementById('totalProduto');
	var id = parseInt(contador.value) + 1;
	contador.value = id;
	var str = document.getElementById('produto').value;
	var url="getuser.php"
	url=url+"?q="+str+"&numero="+id
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

</script>
</head>
<body>

<form onSubmit="return false"> 
  <p>
    <label>
    <select name="produto" id="produto" onChange="liberaAdd()">
      <option value="null">- Selecione um produto -</option>
      <?php
do {  
?>
      <option value="<?php echo $row_RsProdutos['produtoID']?>"><?php echo $row_RsProdutos['nome']?></option>
      <?php
} while ($row_RsProdutos = mysql_fetch_assoc($RsProdutos));
  $rows = mysql_num_rows($RsProdutos);
  if($rows > 0) {
      mysql_data_seek($RsProdutos, 0);
	  $row_RsProdutos = mysql_fetch_assoc($RsProdutos);
  }
?>
        </select>
    </label>
    <label>
    <input name="adicionar" type="image" disabled="disabled" id="adicionar" onClick="showUser();liberaExcluir();" src="../img/mais.jpg" alt="Adicionar">
    <input name="adicionar" type="image" disabled="disabled" id="remover" onClick="removeProduto();" src="../img/remove.jpg" alt="Remover">
    </label>
  </p>
</form>
<table width="410" border='0' cellpadding="4" cellspacing="0" >
<tr>
	<th width="30" bgcolor="#CCCCCC">item</th>
	<th width="300" bgcolor="#CCCCCC">nome</th>
	<th width="80" bgcolor="#CCCCCC">preco</th>

</tr>
</table>
<div id="novoProduto_1"><b>Nenhum produto adicionado.</b></div>
<input type="text" id="totalProduto" value="1">
<input type="text" id="remove" value="1">

</body>
</html>
<?php
mysql_free_result($RsProdutos);
?>