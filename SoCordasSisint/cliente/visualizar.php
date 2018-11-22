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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script><!-- InstanceEndEditable -->
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
      <p>&nbsp;</p>
      <table width="500" border="0" align="center" cellpadding="4" cellspacing="1" id="tabela">
        <tr>
          <td colspan="2" align="center" valign="middle" bgcolor="#336699" class="titulo_tabela">Dados do Cliente</td>
        </tr>
        <tr>
          <td width="105" bgcolor="#cfdaeb"><label for="nome_1">Nome</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['nome']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="razaoSocial_1">Raz&atilde;o Social</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['razaoSocial']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="cnpj_1">CNPJ/CPF</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['cnpj']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="inscricaoEstadual_1">Inscri&ccedil;&atilde;o   Estadual</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['inscricaoEstadual']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="tel01_1">Telefone 01</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['tel01']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="tel02_1">Telefone 02</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['tel02']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="fax_1">Fax</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['fax']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="celular_1">Celular</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['celular']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="email_1">Email</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['email']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="responsavel_1">Respons&aacute;vel</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['responsavel']; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="top" bgcolor="#336699" class="titulo_tabela">Endere&ccedil;o</td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="rua_1">Rua</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['rua']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="numero_1">N&uacute;mero</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['numero']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="bairro_1">Bairro</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['bairro']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="complemento_1">Complemento</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['complemento']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="municipio_1">Munic&iacute;pio</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['municipio']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="UF_1">UF</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['UF']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb"><label for="CEP_1">CEP</label></td>
          <td align="center" valign="top"><?php echo $row_RsCliente['CEP']; ?></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#336699"><span class="titulo_tabela">A&ccedil;&otilde;es</span></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb">Imprimir</td>
          <td align="center" valign="top"><a href="javascript:MM_openBrWindow('imprimir.php?clienteID=<?php echo $row_RsCliente['clienteID']; ?>','','scrollbars=yes,width=560,height=420')"><img src="../img/imprimir.jpg" alt="" width="20" height="20" border="0" /></a></td>
        </tr>
        <tr>
          <td bgcolor="#cfdaeb">Editar</td>
          <td align="center" valign="top"><a href="inserir.php?clienteID=<?php echo $row_RsCliente['clienteID']; ?>"><img src="../img/editar.jpg" alt="Editar" width="20" height="20" border="0" /></a></td>
        </tr>
      </table>
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
?>
