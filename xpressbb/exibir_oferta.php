<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_noticia = "-1";
if (isset($_GET['id'])) {
  $colname_noticia = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_xpress, $xpress);
$query_noticia = sprintf("SELECT * FROM ofertas WHERE id = %s ORDER BY id DESC", $colname_noticia);
$noticia = mysql_query($query_noticia, $xpress) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);
$totalRows_noticia = mysql_num_rows($noticia);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/sb.css">
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<!--Code generated by Cool Web Scrollbars from Harmony Hollow Software-->
<!--http://www.harmonyhollow.net-->
<STYLE type="text/css">
<!--
BODY {
	scrollbar-face-color:#ffffff;
	scrollbar-highlight-color:#ffffff;
	scrollbar-3dlight-color:#ffffff;
	scrollbar-darkshadow-color:#ffffff;
	scrollbar-shadow-color:#ffffff;
	scrollbar-arrow-color:#003366;
	scrollbar-track-color:#ffffff;
	background-color:#FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #ffffff;
}
body,td,th {
	color: #000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:hover {
	color: #CC0000;
	text-decoration: none;
}
h1 {
	color: #ffffff;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	color: #000000;
	text-decoration: none;
}
a:active {
	color: #000000;
	text-decoration: none;
}
.borda {border: 1px solid #000000;}
.style16 {font-size: 12;
	font-weight: bold;
	color: #000000;
}
.style19 {color: #000000}
.style6 {color: #FFFFFF}
.style26 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #ffffff; font-weight: bold; }
.style29 {color: #000000; font-weight: bold; }
.style30 {font-size: 12px}
.style31 {font-style: italic; text-transform: capitalize; color: #FF0000; text-decoration: underline; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style33 {
	font-size: 16px;
	color: #000066;
	font-weight: bold;
}
.style34 {font-size: 10px; color: #000066; font-weight: bold; }
a {
	font-size: 10px;
}
.borda_topo {
	border-top-style: solid;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #000000;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #000000;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
}
-->
</STYLE>
<!--End Cool Web Scrollbars code-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td colspan="2" align="center" class="style29"><?php echo $row_noticia['nome']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><table width="44" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
      <tr>
        <td width="36"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{noticia.foto}");?>" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="240" height="23" align="left" class="style30"><span class="fonte">R$:</span><span class="total"> <?php echo $row_noticia['preco']; ?></span></td>
    <td width="244" align="right" class="style30">&nbsp;</td>
  </tr>
  <tr>
    <td height="29" colspan="2" class="style30"><?php echo $row_noticia['descricao']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($noticia);
?>