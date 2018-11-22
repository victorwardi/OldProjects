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
$query_RsCliente = "SELECT * FROM cliente";
$RsCliente = mysql_query($query_RsCliente, $ConBD) or die(mysql_error());
$row_RsCliente = mysql_fetch_assoc($RsCliente);
$totalRows_RsCliente = mysql_num_rows($RsCliente);

mysql_select_db($database_ConBD, $ConBD);
$query_RsItemPedido = "SELECT * FROM itempedido ORDER BY itemID ASC";
$RsItemPedido = mysql_query($query_RsItemPedido, $ConBD) or die(mysql_error());
$row_RsItemPedido = mysql_fetch_assoc($RsItemPedido);
$totalRows_RsItemPedido = mysql_num_rows($RsItemPedido);

$colname_RsProduto = "-1";
if (isset($_GET['produtoID'])) {
  $colname_RsProduto = $_GET['produtoID'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsProduto = sprintf("SELECT * FROM produto WHERE produtoID = %s", GetSQLValueString($colname_RsProduto, "int"));
$RsProduto = mysql_query($query_RsProduto, $ConBD) or die(mysql_error());
$row_RsProduto = mysql_fetch_assoc($RsProduto);
$totalRows_RsProduto = mysql_num_rows($RsProduto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
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
      <table width="100%" border="0" cellpadding="4" cellspacing="1" id="tabela">
        <tr>
          <td colspan="2" align="left" bgcolor="#336699" class="titulo_tabela">Dados do Pedido</td>
        </tr>
        <tr>
          <td width="15%" align="left" bgcolor="#CFDAEB">N&uacute;mero</td>
          <td width="85%" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">F&aacute;brica</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Data</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Forma de Pagamento</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#336699"><span class="titulo_tabela">Dados do Cliente</span></td>
        </tr>
        <tr>
          <td width="15%" align="left" bgcolor="#CFDAEB">Nome</td>
          <td align="left"><?php echo $row_RsCliente['razaoSocial']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Endere&ccedil;o</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">CNPJ</td>
          <td align="left"><?php echo $row_RsCliente['cnpj']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Inscri&ccedil;&atilde;o Estadual</td>
          <td align="left"><?php echo $row_RsCliente['inscricaoEstadual']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Telefone 1</td>
          <td align="left"><?php echo $row_RsCliente['tel01']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Telefone 2</td>
          <td align="left"><?php echo $row_RsCliente['tel02']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Fax</td>
          <td align="left"><?php echo $row_RsCliente['fax']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Celular</td>
          <td align="left"><?php echo $row_RsCliente['celular']; ?></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Respons&aacute;vel</td>
          <td align="left"><?php echo $row_RsCliente['responsavel']; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#336699" class="titulo_tabela">Dados da Transportadora</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Nome</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Telefone 1</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Telefone 2</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Fax</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Email</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Respons&aacute;vel</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#336699"><span class="titulo_tabela">Itens do Pedido</span></td>
        </tr>
        <tr>
          <td colspan="2" align="left"><table width="100%" border="0" cellpadding="4" cellspacing="0">
            <tr>
                <th width="5%" align="center" bgcolor="#336699" class="titulo_tabela">Item</th>
                <th width="6%" align="center" bgcolor="#336699" class="titulo_tabela">Qtd</th>
                <th width="5%" align="center" bgcolor="#336699" class="titulo_tabela">Un</th>
                <th width="40%"align="center" bgcolor="#336699" class="titulo_tabela">Produto</th>
                <th width="8%" align="center" bgcolor="#336699" class="titulo_tabela">Preco</th>
                <th width="9%" align="center" bgcolor="#336699" class="titulo_tabela">Desc.(R$)</th>
                <th width="9%" align="center" bgcolor="#336699" class="titulo_tabela">Desc.(%)</th>
                <th width="18%"align="center" bgcolor="#336699" class="titulo_tabela">Total</th>
              </tr>
              <?php $contador = "1"; do {
			  
			  
			  //Alterna as cores das linhas
               $class = "linha1";
               if($contador%2 == 0){
               $class = "linha2"; 
               }
			   
			   ?>
              <tr class="<?php echo $class ?>">
                  <td align="center"><div align="center"><?php echo $contador; ?></div></td>
                  <td align="center"><div align="center"><?php echo $row_RsItemPedido['quantidade']; ?></div></td>
                <td height="30" align="center"><?php echo $row_RsProduto['unidade']; ?></td>
                  <td align="left"><?php echo $row_RsProduto['nome']; ?></td>
                  <td align="center"><div align="center"><?php echo $row_RsProduto['preco']; ?></div></td>
                  <td align="center"><div align="center"><?php echo $row_RsItemPedido['descontoReal']; ?></div></td>
                  <td align="center"><div align="center"><?php echo $row_RsItemPedido['descontoPorCento']; ?></div></td>
                  <td align="center"><div align="center"><?php echo $row_RsItemPedido['total']; ?></div></td>
              </tr>
                <?php $contador++; } while ($row_RsItemPedido = mysql_fetch_assoc($RsItemPedido)); 
				
				 ?>
            <tr>
              <td colspan="3" align="center" bgcolor="#CFDAEB" class="texto_item">TOTAL</td>
                <td align="left" bgcolor="#CFDAEB">&nbsp;</td>
                <td align="center" bgcolor="#CFDAEB">&nbsp;</td>
                <td align="center" bgcolor="#CFDAEB">&nbsp;</td>
                <td align="center" bgcolor="#CFDAEB">&nbsp;</td>
                <td align="center" bgcolor="#CFDAEB"><div align="center"><strong>879.00</strong></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#336699" class="titulo_tabela">A&ccedil;&otilde;es</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Imprimir</td>
          <td align="left"><img src="../img/imprimir.jpg" alt="imprimir" width="20" height="20" /></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Enviar para a Fr&aacute;brica</td>
          <td align="left"><img src="../img/mail.jpg" alt="email" width="20" height="20" /></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Inserir outro Pedido</td>
          <td align="left"><img src="../img/novo.jpg" alt="novo" width="20" height="20" /></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#CFDAEB">Sair</td>
          <td align="left"><img src="../img/sair.jpg" alt="sair" width="20" height="20" /></td>
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

mysql_free_result($RsItemPedido);

mysql_free_result($RsProduto);
?>
