<?php require_once('file:///E|/xampp/htdocs/vbs/Connections/ConVBS.php'); ?>
<?php
// Load the tNG classes
require_once('file:///E|/xampp/htdocs/vbs/includes/tng/tNG.inc.php');

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

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMarcas = "SELECT * FROM marcas ORDER BY nome ASC";
$RsMarcas = mysql_query($query_RsMarcas, $ConVBS) or die(mysql_error());
$row_RsMarcas = mysql_fetch_assoc($RsMarcas);
$totalRows_RsMarcas = mysql_num_rows($RsMarcas);

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsTipos = "SELECT * FROM tipo ORDER BY nome ASC";
$RsTipos = mysql_query($query_RsTipos, $ConVBS) or die(mysql_error());
$row_RsTipos = mysql_fetch_assoc($RsTipos);
$totalRows_RsTipos = mysql_num_rows($RsTipos);

$maxRows_RsPublicidade = 10;
$pageNum_RsPublicidade = 0;
if (isset($_GET['pageNum_RsPublicidade'])) {
  $pageNum_RsPublicidade = $_GET['pageNum_RsPublicidade'];
}
$startRow_RsPublicidade = $pageNum_RsPublicidade * $maxRows_RsPublicidade;

mysql_select_db($database_ConVBS, $ConVBS);
$query_RsPublicidade = "SELECT * FROM propaganda ORDER BY id_propaganda DESC";
$query_limit_RsPublicidade = sprintf("%s LIMIT %d, %d", $query_RsPublicidade, $startRow_RsPublicidade, $maxRows_RsPublicidade);
$RsPublicidade = mysql_query($query_limit_RsPublicidade, $ConVBS) or die(mysql_error());
$row_RsPublicidade = mysql_fetch_assoc($RsPublicidade);

if (isset($_GET['totalRows_RsPublicidade'])) {
  $totalRows_RsPublicidade = $_GET['totalRows_RsPublicidade'];
} else {
  $all_RsPublicidade = mysql_query($query_RsPublicidade);
  $totalRows_RsPublicidade = mysql_num_rows($all_RsPublicidade);
}
$totalPages_RsPublicidade = ceil($totalRows_RsPublicidade/$maxRows_RsPublicidade)-1;

$colname_RsProdutos = "-1";
if (isset($_GET['id'])) {
  $colname_RsProdutos = $_GET['id'];
}
mysql_select_db($database_ConVBS, $ConVBS);
$query_RsProdutos = sprintf("SELECT * FROM produtos WHERE id = %s", GetSQLValueString($colname_RsProdutos, "int"));
$RsProdutos = mysql_query($query_RsProdutos, $ConVBS) or die(mysql_error());
$row_RsProdutos = mysql_fetch_assoc($RsProdutos);
$totalRows_RsProdutos = mysql_num_rows($RsProdutos);

$colname_RsMostraMarca = "-1";
if (isset($_GET['marca'])) {
  $colname_RsMostraMarca = $_GET['marca'];
}
mysql_select_db($database_ConVBS, $ConVBS);
$query_RsMostraMarca = sprintf("SELECT * FROM marcas WHERE nome = %s", GetSQLValueString($colname_RsMostraMarca, "text"));
$RsMostraMarca = mysql_query($query_RsMostraMarca, $ConVBS) or die(mysql_error());
$row_RsMostraMarca = mysql_fetch_assoc($RsMostraMarca);
$totalRows_RsMostraMarca = mysql_num_rows($RsMostraMarca);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("fotos/");
$objDynamicThumb1->setRenameRule("{RsPublicidade.imagem}");
$objDynamicThumb1->setResize(200, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("", "KT_thumbnail4");
$objDynamicThumb4->setFolder("fotos/");
$objDynamicThumb4->setRenameRule("{RsMostraMarca.foto}");
$objDynamicThumb4->setResize(468, 0, true);
$objDynamicThumb4->setWatermark(false);

// Load the tNG classes
require_once('file:///E|/xampp/htdocs/vbs/includes/tng/tNG.inc.php');

// Show Dynamic Thumbnail
$objDynamicThumb6 = new tNG_DynamicThumbnail("", "KT_thumbnail6");
$objDynamicThumb6->setFolder("fotos/");
$objDynamicThumb6->setRenameRule("{RsProdutos.foto1}");
$objDynamicThumb6->setResize(250, 0, true);
$objDynamicThumb6->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("fotos/");
$objDynamicThumb2->setRenameRule("{RsProdutos.foto2}");
$objDynamicThumb2->setResize(100, 0, true);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("", "KT_thumbnail3");
$objDynamicThumb3->setFolder("fotos/");
$objDynamicThumb3->setRenameRule("{RsProdutos.foto3}");
$objDynamicThumb3->setResize(100, 0, true);
$objDynamicThumb3->setWatermark(false);
?>
<?php


setlocale(LC_TIME, 'pt_BR', 'portuguese', 'bra', 'brazil');

if ( isset( $_POST["submit"] ) ) 
{

	// Remove o campo submit
	unset( $_POST["submit"] );
	
	// Criação da Mensagem
	$mensagem = null;
	while( list( $campo, $conteudo ) = each( $_POST ) )
	{
		$desc = "".$_POST["desc"]."";
		$titulo = "".$_POST["titulo"]."";
		$amigo = "".$_POST["NomeAmigo"]."";
		$nome = "".$_POST["Nome"]."";
        $foto = "".$_POST["foto"]."";
		$msg_amigo = "".$_POST["mensagem"]."";
		$mensagem = "<HTML><style type=\"text/css\">
<!--
.texto {font-family: Arial;	font-size: 12px;color: #333333;}
.titulo {font-family: Arial;	font-size:16px; color: #333333; font-weight: bold;}
.texto a{text-decoration: none; color: #166A5D;}
.texto a:link{ }
.texto a:hover{ }
.texto_v {font-family: Arial;	font-size: 10px;color: #333333;}
.texto_v a{text-decoration: none; color: #000;}
.texto_v a:link{ }
.texto_v a:hover{ }
body {background-image: url(http://www.vilabeachsurfing.com.br/img/fund2.jpg);}
.style1 {font-family: Arial; font-size: 12px; color: #333333; font-weight: bold; }
-->
</style>

<BODY><table width=\"120\" border=\"0\" align=\"center\" cellpadding=\"6\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">
  <tr>
    <td><img src=\"http://www.vilabeachsurfing.com.br/img/vbs_logo.jpg\" alt=\"Vila Beach Surfing\" width=\"500\" height=\"100\" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"23\" align=\"left\" class=\"texto\"><strong>$amigo</strong>,</td>
  </tr>
  <tr>
    <td align=\"left\" class=\"texto\">Seu amigo(a), $nome, viu este produto no site da <a href=\"http://www.vilabeachsurfing.com.br\" target=\"_blank\"><strong>Vila Beach Surfing </strong></a>e indicou para você.</td>
  </tr>
   <tr>
    <td align=\"center\" class=\"texto\">&nbsp;</td>
  </tr>
  <tr>
    <td align=\"left\" class=\"texto\"><strong>Mensagem do(a) $nome:</strong> $msg_amigo</td>
  </tr>
  <tr>
    <td align=\"center\" class=\"texto\">&nbsp;</td>
  </tr>
  <tr>
    <td align=\"left\" class=\"texto\"><strong>Confira o Produto logo abaixo:</strong></td>
  </tr>
  <tr>
    <td align=\"left\" class=\"titulo\">$titulo</td>
  </tr>
  <tr>
    <td align=\"left\" class=\"texto\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"4\" bgcolor=\"#FFFFFF\">
      <tr>
        <td height=\"108\" align=\"left\" bgcolor=\"#FFFFFF\"><table align=\"right\" width=\"58\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
            <tr>
              <td width=\"54\"><table align=\"center\" width=\"100\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\">
                </table>
                  <img src=\"http://www.vilabeachsurfing.com.br/fotos/$foto\" width=\"150\" /> </td>
            </tr>
          </table>
            <div align=\"justify\" class=\"texto\">
            $desc
            </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align=\"left\" class=\"texto\"><div align=\"center\">Para ver  outros produtos <a href=\"http://www.vilabeachsurfing.com.br\" target=\"_blank\"><strong>clique aqui</strong></a></div></td>
  </tr>
  <tr>
    <td align=\"center\"><span class=\"texto_v\">Desenvolvimento:<strong> </strong><a href=\"http://www.saquabb.com.br/victor\" target=\"_blank\"><strong>Victor Caetano</strong></a></span></td>
  </tr>
  <tr>
    <td align=\"left\"><img src=\"http://www.vilabeachsurfing.com.br/img/base.jpg\" alt=\"vila beach surfing\"/></td>
  </tr></BODY></HTML>";
		
	}

	$remetente = "contato@vilabeachsurfing.com.br";
	$cabecalho .= "From:  \"" . $_POST["Nome"] . "\" <".$_POST["Email"].">\n";
	$cabecalho .= "Reply-To: \"<" . $_POST["Nome"] . ">\" <".$_POST["Email"].">\n"; 
	$cabecalho .= "X-Mailer: Marketing VBS\n"; 
	$cabecalho .= "Content-Type: text/html; charset=iso-8859-1/n";
	$destinatario = "".$_POST["EmailAmigo"]."";
	$assunto = "Seu amigo, ".$_POST["Nome"].", indicou este produto";
	
	
	
	
	
	// Envia o e-mail
	if( !mail( $destinatario, $assunto, $mensagem, $cabecalho ) )
	{
		$cor = "#FF0000";
		$msg = "Ocorreu um erro. A mensagem não foi enviada.";
	}
	else 
	{
		$cor = "#009900";
		$msg = "Mensagem Enviada! Obrigado!";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="file:///E|/xampp/htdocs/vbs/Templates/site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Vila Beach Surfing - A Loja Mais Surf de Saquarema</title>

<!-- InstanceEndEditable -->
<!-- lightbox -->

<link rel="stylesheet" href="file:///E|/xampp/htdocs/vbs/litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="file:///E|/xampp/htdocs/vbs/litbox/js/prototype.js" type="text/javascript"></script>
	<script src="file:///E|/xampp/htdocs/vbs/litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="file:///E|/xampp/htdocs/vbs/litbox/js/lightbox.js" type="text/javascript"></script>
    
    <!-- FIM -->

<link href="file:///E|/xampp/htdocs/vbs/stilo.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="file:///E|/xampp/htdocs/vbs/enviar.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body onload="MM_preloadImages('file:///E|/xampp/htdocs/vbs/img/menu/menu_r2_c10_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c2_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c4_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c6_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c8_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c12_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c14_f2.jpg','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c16_f2.jpg')">
<table width="861" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
  <tr>
    <td width="853" align="center" valign="middle">
	<script src="file:///E|/xampp/htdocs/vbs/Scripts/AC_RunActiveContent.js" type="text/javascript"></script><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','850','height','186','title','Vila Beach Surfing','src','file:///E|/xampp/htdocs/vbs/flash/topo','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','file:///E|/xampp/htdocs/vbs/flash/topo' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="850" height="186" title="Vila Beach Surfing">
	 <param name="wmode" value="transparent"/>
      <param name="movie" value="file:///E|/xampp/htdocs/vbs/flash/topo.swf" />
      <param name="quality" value="high" />
      <embed src="file:///E|/xampp/htdocs/vbs/flash/topo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="850" height="186"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td height="21" align="center" valign="middle"><table border="0" cellpadding="0" cellspacing="0" width="850">
      <!-- fwtable fwsrc="menu.png" fwbase="menu.jpg" fwstyle="Dreamweaver" fwdocid = "1361843291" fwnested="0" -->
      <tr>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="7" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="39" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="80" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="15" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="65" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="146" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="17" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="88" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="22" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="127" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="15" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="100" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="16" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="68" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="11" height="1" border="0" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="17"><img name="menu_r1_c1" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r1_c1.jpg" width="850" height="6" border="0" id="menu_r1_c1" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="6" border="0" alt="" /></td>
      </tr>
      <tr>
        <td colspan="9"><img name="menu_r2_c1" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r2_c1.jpg" width="403" height="3" border="0" id="menu_r2_c1" alt="" /></td>
        <td rowspan="4"><a href="file:///E|/xampp/htdocs/vbs/promo.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r2_c10','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r2_c10_f2.jpg',1)"><img name="menu_r2_c10" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r2_c10.jpg" width="88" height="17" border="0" id="menu_r2_c10" alt="Promo&ccedil;oes" /></a></td>
        <td colspan="7"><img name="menu_r2_c11" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r2_c11.jpg" width="359" height="3" border="0" id="menu_r2_c11" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="3" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="4"><img name="menu_r3_c1" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c1.jpg" width="7" height="21" border="0" id="menu_r3_c1" alt="" /></td>
        <td><a href="file:///E|/xampp/htdocs/vbs/index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c2','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c2_f2.jpg',1)"><img name="menu_r3_c2" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c2.jpg" width="39" height="12" border="0" id="menu_r3_c2" alt="Home" /></a></td>
        <td rowspan="4"><img name="menu_r3_c3" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c3.jpg" width="17" height="21" border="0" id="menu_r3_c3" alt="" /></td>
        <td><a href="file:///E|/xampp/htdocs/vbs/masculino.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c4','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c4_f2.jpg',1)"><img name="menu_r3_c4" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c4.jpg" width="80" height="12" border="0" id="menu_r3_c4" alt="Masculino" /></a></td>
        <td rowspan="4"><img name="menu_r3_c5" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c5.jpg" width="15" height="21" border="0" id="menu_r3_c5" alt="" /></td>
        <td><a href="file:///E|/xampp/htdocs/vbs/feminino.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c6','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c6_f2.jpg',1)"><img name="menu_r3_c6" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c6.jpg" width="65" height="12" border="0" id="menu_r3_c6" alt="Feminino" /></a></td>
        <td rowspan="4"><img name="menu_r3_c7" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c7.jpg" width="17" height="21" border="0" id="menu_r3_c7" alt="" /></td>
        <td rowspan="2"><a href="file:///E|/xampp/htdocs/vbs/outros.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c8','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c8_f2.jpg',1)"><img name="menu_r3_c8" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c8.jpg" width="146" height="13" border="0" id="menu_r3_c8" alt="Outros Produtos" /></a></td>
        <td rowspan="4"><img name="menu_r3_c9" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c9.jpg" width="17" height="21" border="0" id="menu_r3_c9" alt="" /></td>
        <td rowspan="4"><img name="menu_r3_c11" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c11.jpg" width="22" height="21" border="0" id="menu_r3_c11" alt="" /></td>
        <td rowspan="2"><a href="file:///E|/xampp/htdocs/vbs/fotos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c12','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c12_f2.jpg',1)"><img name="menu_r3_c12" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c12.jpg" width="127" height="13" border="0" id="menu_r3_c12" alt="Fotos da Galera" /></a></td>
        <td rowspan="4"><img name="menu_r3_c13" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c13.jpg" width="15" height="21" border="0" id="menu_r3_c13" alt="" /></td>
        <td rowspan="2"><a href="file:///E|/xampp/htdocs/vbs/comochegar.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c14','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c14_f2.jpg',1)"><img name="menu_r3_c14" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c14.jpg" width="100" height="13" border="0" id="menu_r3_c14" alt="Como Chegar" /></a></td>
        <td rowspan="4"><img name="menu_r3_c15" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c15.jpg" width="16" height="21" border="0" id="menu_r3_c15" alt="" /></td>
        <td><a href="file:///E|/xampp/htdocs/vbs/contato.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r3_c16','','file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c16_f2.jpg',1)"><img name="menu_r3_c16" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c16.jpg" width="68" height="12" border="0" id="menu_r3_c16" alt="" /></a></td>
        <td rowspan="4"><img name="menu_r3_c17" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r3_c17.jpg" width="11" height="21" border="0" id="menu_r3_c17" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="12" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="menu_r4_c2" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r4_c2.jpg" width="39" height="9" border="0" id="menu_r4_c2" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c4" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r4_c4.jpg" width="80" height="9" border="0" id="menu_r4_c4" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c6" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r4_c6.jpg" width="65" height="9" border="0" id="menu_r4_c6" alt="" /></td>
        <td rowspan="3"><img name="menu_r4_c16" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r4_c16.jpg" width="68" height="9" border="0" id="menu_r4_c16" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="menu_r5_c8" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r5_c8.jpg" width="146" height="8" border="0" id="menu_r5_c8" alt="" /></td>
        <td rowspan="2"><img name="menu_r5_c12" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r5_c12.jpg" width="127" height="8" border="0" id="menu_r5_c12" alt="" /></td>
        <td rowspan="2"><img name="menu_r5_c14" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r5_c14.jpg" width="100" height="8" border="0" id="menu_r5_c14" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="1" border="0" alt="" /></td>
      </tr>
      <tr>
        <td><img name="menu_r6_c10" src="file:///E|/xampp/htdocs/vbs/img/menu/menu_r6_c10.jpg" width="88" height="7" border="0" id="menu_r6_c10" alt="" /></td>
        <td><img src="file:///E|/xampp/htdocs/vbs/img/menu/spacer.gif" width="1" height="7" border="0" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="38" align="center" valign="top">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
          <td height="25" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="4">
              
              <tr>
              <td width="22%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                    
                <tr>
                  <td height="25" align="left"><table width="98%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                    <tr>
                      <td height="20"><strong>&raquo; Procurar </strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25" align="left"><table width="215" border="0" cellpadding="0" cellspacing="0" class="tabela_margin_cima">
                    <tr>
                      <form id="busca" name="busca" method="GET" action="file:///E|/xampp/htdocs/vbs/procurar.php">
                        <td width="168" height="34" align="center" valign="middle"><input name="busca" type="text" class="textbox2" id="busca" size="20" maxlength="50" /></td>
                        <td width="47" align="center" valign="middle"><input name="enviar" type="submit" class="bg_titulo" id="enviar" value="ok" />                        </td>
                      </form>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                      <td height="25" align="left"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                          <tr>
                            <td height="20"><strong>&raquo;  Marcas</strong></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><?php do { ?>
                        <div id="lista_marcas">&raquo; <a href="file:///E|/xampp/htdocs/vbs/produto_marca.php?marca=<?= $row_RsMarcas['nome'];?>"><?php echo $row_RsMarcas['nome']; ?></a> </div>
                        <?php } while ($row_RsMarcas = mysql_fetch_assoc($RsMarcas)); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25" bgcolor="#B4D6C6"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                        <tr>
                          <td height="20"><strong>&raquo; Tipos</strong></td>
                        </tr>
                      </table></td>
                    </tr>
                <tr>
                  <td><?php do { ?>
                    <div id="lista_marcas">&raquo; <a href="file:///E|/xampp/htdocs/vbs/produto_tipo.php?tipo=<?= $row_RsTipos['id_tipo'];?>"><?php echo $row_RsTipos['nome']; ?></a></div>
                      <?php } while ($row_RsTipos = mysql_fetch_assoc($RsTipos)); ?></td>
                    </tr>
                              </table>                
                <p><strong><br />
                </strong></p></td>
              <td width="59%" rowspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top"><!-- InstanceBeginEditable name="banner" --><img src="<?php echo $objDynamicThumb4->Execute(); ?>" alt="<?php echo $row_RsMostraMarca['nome']; ?>" border="0" class="borda_preta" /><!-- InstanceEndEditable --></td>
                </tr>
                <tr>
                  <td rowspan="2" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
                    <div>
                      <table width="100%" border="0" cellpadding="0" cellspacing="4">
                        <tr>
                          <td width="57%" align="left" valign="top"><span class="ProdutoNome"><?php echo $row_RsProdutos['nome']; ?></span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><span class="ProdutoMarca"><?php echo $row_RsProdutos['marca']; ?></span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><span class="ProdutoPreco">R$<?php echo $row_RsProdutos['preco']; ?></span></td>
                        </tr>
                        <tr>
                          <td width="57%"  class="fundo_tabela2" align="center" valign="top"><table width="100" border="0" cellspacing="0" cellpadding="8">
                              <tr>
                                <td width="47%" align="center" valign="middle"><img src="<?php echo $objDynamicThumb6->Execute(); ?>" border="0" />                                  </td>
                              </tr>
                            </table>
                               <?php 
// Show If File Exists (region1)
if (tNG_fileExists("fotos/", "{RsProdutos.foto2}")) {
?>
                               <fieldset>
                               <legend>Mais Fotos</legend>
                               <table width="100" border="0" cellspacing="0" cellpadding="0">
                                 <tr>
                                   <td align="center" valign="middle">
                                       <a href="<?php echo tNG_showDynamicImage("", "fotos/", "{RsProdutos.foto2}");?>" rel="lightbox" ><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a>                                      </td>
                                   <td align="center" valign="middle"><?php 
// Show If File Exists (region2)
if (tNG_fileExists("fotos/", "{RsProdutos.foto3}")) {
?>
                                       <a href="<?php echo tNG_showDynamicImage("", "fotos/", "{RsProdutos.foto3}");?>" rel="lightbox" ><img src="<?php echo $objDynamicThumb3->Execute(); ?>" border="0" /></a>
                                       <?php } 
// EndIf File Exists (region2)
?></td>
                                 </tr>
                               </table>
                                </fieldset>
                                <?php } 
// EndIf File Exists (region1)
?><br /><br />


                              <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="left"><strong>Descri&ccedil;&atilde;o:</strong></td>
                                </tr>
                                <tr>
                                  <td align="left"><div align="justify"><?php echo $row_RsProdutos['descricao']; ?></div></td>
                                </tr>
                              </table>
                            <p><br />
                                  <strong>Gostou de algum de nossos produtos?<br />
                                    Ent&atilde;o v&aacute; em nossa loja e compre j&aacute;, ou, se preferir, entre em contato pelo tel:(22) 2651-0463 ou pelo email: contato@vilabeachsurfing.com.br <br />
                                    Estamos a disposi&ccedil;&atilde;o para lhe atender!<br />
                                    <br />
                                    ATENDIMENTO ONLINE VIA MSN: <span class="ProdutoPreco">vbs_saqua@hotmail.com</span></strong></p>
                            <p><strong><br />
                            </strong></p></td>
                        </tr>
                        <tr>
                          <td  class="fundo_tabela2" align="center" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="bg_titulo">
                            <tr>
                              <td height="20" align="left" class="ProdutoNomeBranca"><strong class="ProdutoNomeBranca">&raquo;</strong> Indique este produto a um amigo!</td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td  class="fundo_tabela2" align="left" valign="top"><div id="conteudo_interno" class="left">
                    <h2>
                      <?php if ( !empty( $msg ) ) echo( "<b style=\"color:$cor\">".$msg."</b>" );  ?>
                    </h2>
                    <div>
                      <form action="<?php echo $_SERVER['file:///E|/xampp/htdocs/vbs/PHP_SELF'] ?>?id=<?php echo $row_RsProdutos['id'];?>" method="post" onsubmit="MM_validateForm('Nome','','R','Cidade','','R','Email','','RisEmail','Telefone','','R');return document.MM_returnValue">
                        
                        <label for="Nome" class="txt_novidades_data">Seu Nome:</label>
                        <input name="Nome" type="text" tabindex="1" value="" size="37" maxlength="50" class="textbox" />
                        <label for="Email" class="txt_novidades_data">Seu E-mail:</label>
                        <input name="Email" type="text" tabindex="2" value="" size="37" maxlength="50" class="textbox" />
                        <label for="NomeAmigo" class="txt_novidades_data">Nome do seu Amigo:</label>
                        <input name="NomeAmigo" type="text" tabindex="3" value="" size="37" maxlength="50" class="textbox" />
                        <label for="EmailAmigo" class="txt_novidades_data">E-mail do seu Amigo:</label>
                        <input name="EmailAmigo" type="text" tabindex="4" value="" size="37" maxlength="50" class="textbox" />
                        <!-- Invisivel-->
                        <div id="mail">
                          <label for="titulo" class="txt_novidades_data">Titulo:</label>
                          <input name="titulo" type="text" class="textbox" tabindex="5" value="<?php echo $row_RsProdutos['nome']; ?>" size="37" maxlength="50" />
                          <label for="foto" class="txt_novidades_data">foto:</label>
                          <input name="foto" type="text" class="textbox" tabindex="5" value="<?php echo $row_RsProdutos['foto1']; ?>" size="37" maxlength="50" />
                          <label for="desc" class="txt_novidades_data">Mensagem:</label>
                          <textarea name="desc" cols="37" rows="5" class="textbox" id="desc" tabindex="6"><?php echo $row_RsProdutos['descricao']; ?></textarea>
                        </div>
                        <!--  FIm Invisivel-->
                          <label for="mensagem" class="txt_novidades_data">Mensagem para seu Amigo:</label>
                        <textarea name="mensagem" cols="37" rows="5" class="textbox" tabindex="4"></textarea>
                        <input name="submit" id="botao" type="submit" tabindex="6" value="Enviar" />
                      </form>
                    </div>
                  </div></td>
                        </tr>
                      </table>
                    </div>
                  <!-- InstanceEndEditable --></td>
                </tr>
                <tr> </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
                <p class="fundo_tabela2"></p></td>
              <td width="19%" rowspan="2" align="right" valign="top" bgcolor="#F0F0F0"><?php do { ?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="top"><a href="<?php echo $row_RsPublicidade['file:///E|/xampp/htdocs/vbs/link']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_RsPublicidade['titulo']; ?>" width="150" border="0" class="borda_preta" /></a></td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                  </table>
                  <?php } while ($row_RsPublicidade = mysql_fetch_assoc($RsPublicidade)); ?></td>
              </tr>
            
            <tr>
              <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            
            
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="13" class="borda_escura_baixo">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="75" align="center" valign="middle" bgcolor="#FFFFFF">
<script src="file:///E|/xampp/htdocs/vbs/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','820','height','70','title','Marcas','src','file:///E|/xampp/htdocs/vbs/flash/marcas','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','file:///E|/xampp/htdocs/vbs/flash/marcas' ); //end AC code
</script>
<noscript>	
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="820" height="70" title="Marcas">
	 <param name="wmode" value="transparent"/>
      <param name="movie" value="file:///E|/xampp/htdocs/vbs/flash/marcas.swf" />
      <param name="quality" value="high" />
      <embed src="file:///E|/xampp/htdocs/vbs/flash/marcas.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="820" height="70"></embed>
    </object>
	</noscript></td>
  </tr>
  <tr>
    <td height="51" align="center" valign="middle" bgcolor="#FFFFFF"><img src="file:///E|/xampp/htdocs/vbs/img/cartoes.jpg" alt="Cart&otilde;es de Cr&eacute;dito" width="400" height="54" /></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle" class="fonte_12_brc"><img src="file:///E|/xampp/htdocs/vbs/img/rodape.jpg" alt="Vila Beach Surfing" width="850" height="30" border="0" usemap="#Map" /></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="666,12,817,27" href="http://www.saquabb.com.br/victor" alt="Desenvolvido por: Victor Caetano" />
</map>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RsProdutos);

mysql_free_result($RsMostraMarca);

mysql_free_result($RsMarcas);

mysql_free_result($RsTipos);

mysql_free_result($RsPublicidade);
?>
