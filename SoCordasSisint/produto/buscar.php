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
$query_RsFabrica = "SELECT * FROM fabrica ORDER BY nome ASC";
$RsFabrica = mysql_query($query_RsFabrica, $ConBD) or die(mysql_error());
$row_RsFabrica = mysql_fetch_assoc($RsFabrica);
$totalRows_RsFabrica = mysql_num_rows($RsFabrica);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sisint - S&oacute; Cordas Representa&ccedil;&otilde;es LTDA</title>

<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script language="javascript">

function porNome(){

	var nome = document.getElementById('porNome');
	nome.style.display = "block";
	
	var fabrica = document.getElementById('porFabrica');
	if(fabrica.style.display = "block"){
		fabrica.style.display = "none";	
	}

}

function porFabrica(){

	var fabrica = document.getElementById('porFabrica');
	fabrica.style.display = "block";
	
	var nome = document.getElementById('porNome');
	if(nome.style.display = "block"){
		nome.style.display = "none";
	}
}
</script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
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
</style><!-- InstanceEndEditable -->
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
    <td colspan="3" align="center"><!-- InstanceBeginEditable name="conteudo" --><br />
      <table width="500" border="0" align="center" cellpadding="4" cellspacing="1" id="tabela">
        <tr>
          <td align="left" valign="middle" bgcolor="#336699" class="titulo_tabela">Buscar Produto</td>
        </tr>
        <tr>
          <td align="left" valign="middle"><a href="javascript:porNome();" class="texto_item">Por nome</a></td>
        </tr>
        <tr>
          <td align="left" valign="middle"><a href="javascript:porFabrica();" class="texto_item">Por f&aacute;brica</a></td>
        </tr>
        <tbody >
        </tbody>
      </table>
      <br />
     <form id="form2" name="form2" method="post" action="buscarProdutoPorNome.php"> 
     <table width="500" border="0" cellspacing="0" cellpadding="0" id="porNome" style="display:none">
        <tr>
          <td height="81"><table width="500" border="0" align="center" cellpadding="4" cellspacing="1" id="tabelaImpressao" >
            <tr>
              <td align="left" valign="middle" bgcolor="#336699" class="titulo_tabela">Buscar por Nome</td>
            </tr>
            <tr>
              <td height="37" align="left" valign="middle">
                    <table width="431" border="0" align="center" cellpadding="0" cellspacing="0">
                    </table>
                      <table width="72%" border="0" align="center" cellpadding="4" cellspacing="1">
                        <tr>
                          <td width="66%" align="left"><label>
                            <input name="nome" type="text" id="nome" size="60" />
                          </label></td>
                        <td width="34%" align="left"><label>
                            <input type="image" name="imageField" id="imageField" src="../img/buscarBanco.jpg" />
                          </label></td>
                        </tr>
                      </table>
                  </td>
            </tr>
            
          </table></td>
        </tr>
      </table>
      </form>
      <form id="form1" name="form1" method="get" action="buscarProdutoPorFabrica.php?fabricaID=<?php $_GET['fabrica'];?>">
        <table width="500" border="0" cellpadding="0" cellspacing="0" id="porFabrica" style="display:none">
          <tr>
            <td><table width="500" border="0" align="center" cellpadding="4" cellspacing="1" id="tabelaSemLinha" >
              <tr>
                <td align="left" valign="middle" bgcolor="#336699" class="titulo_tabela">Buscar por F&aacute;brica</td>
              </tr>
              <tr>
                <td align="left" valign="middle"><table width="431" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="379" height="40" align="center" valign="top"><span id="spryselect1">
                        <label>
                        <select name="fabrica" id="fabrica">
                          <option value="">Selecione de qual f&aacute;brica que deseja buscar os produtos</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_RsFabrica['fabricaID']?>"><?php echo $row_RsFabrica['nome']?></option>
                          <?php
} while ($row_RsFabrica = mysql_fetch_assoc($RsFabrica));
  $rows = mysql_num_rows($RsFabrica);
  if($rows > 0) {
      mysql_data_seek($RsFabrica, 0);
	  $row_RsFabrica = mysql_fetch_assoc($RsFabrica);
  }
?>
                        </select>
                        </label>
                        <span class="selectRequiredMsg">Selecione uma f&aacute;brica.</span></span></td>
                      <td width="52" align="center" valign="top"><label>
                        <input type="image" name="buscar" id="buscar" src="../img/buscarBanco.jpg" />
                      </label></td>
                    </tr>
</table></td>
              </tr>
              </table></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
              <script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
//-->
              </script>
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
?>
