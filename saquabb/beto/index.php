<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$maxRows_not = 3;
$pageNum_not = 0;
if (isset($_GET['pageNum_not'])) {
  $pageNum_not = $_GET['pageNum_not'];
}
$startRow_not = $pageNum_not * $maxRows_not;

mysql_select_db($database_saquabb, $saquabb);
$query_not = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_not = sprintf("%s LIMIT %d, %d", $query_not, $startRow_not, $maxRows_not);
$not = mysql_query($query_limit_not, $saquabb) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);

if (isset($_GET['totalRows_not'])) {
  $totalRows_not = $_GET['totalRows_not'];
} else {
  $all_not = mysql_query($query_not);
  $totalRows_not = mysql_num_rows($all_not);
}
$totalPages_not = ceil($totalRows_not/$maxRows_not)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>____Erisberto.com________________________________________________________</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	background-image: url(img/fundo.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #292905;
}
.style2 {
	font-size: 11px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.borda {
	border: 1px solid #000000;
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
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
</style>
<!--Fireworks 8 Dreamweaver 8 target.  Created Wed Jul 19 21:06:15 GMT-0300 (Hora oficial do Brasil) 2006-->
</head>
<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
<!-- fwtable fwsrc="Untitled" fwbase="index.jpg" fwstyle="Dreamweaver" fwdocid = "412468209" fwnested="0" -->
  <tr>
   <td><img src="img/spacer.gif" width="34" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="275" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="74" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="23" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="299" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="65" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="2" colspan="2"><img name="index_r1_c1" src="img/index_r1_c1.jpg" width="309" height="101" border="0" id="index_r1_c1" alt="" /></td>
   <td colspan="4"><img name="index_r1_c3" src="img/index_r1_c3.jpg" width="461" height="51" border="0" id="index_r1_c3" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="51" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="index_r2_c3" src="img/index_r2_c3.jpg" width="461" height="50" border="0" id="index_r2_c3" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="50" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="5"><img name="index_r3_c1" src="img/index_r3_c1.jpg" width="34" height="429" border="0" id="index_r3_c1" alt="" /></td>
   <td colspan="2" rowspan="4"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="349" height="401" title="flash">
     <param name="movie" value="flash.swf" />
     <param name="quality" value="high" />
     <embed src="flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="349" height="401"></embed>
   </object></td>
   <td rowspan="3"><img name="index_r3_c4" src="img/index_r3_c4.jpg" width="23" height="362" border="0" id="index_r3_c4" alt="" /></td>
   <td colspan="2"><img name="index_r3_c5" src="img/index_r3_c5.jpg" width="364" height="14" border="0" id="index_r3_c5" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="14" border="0" alt="" /></td>
  </tr>
  <tr>
   <td align="center" valign="top" background="img/index_r4_c5.jpg" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td height="29" align="left" valign="top"><img src="img/not.jpg" width="55" height="19" /></td>
     </tr>
     <tr>
       <td><?php do { ?>
           <table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                 <td width="31%" align="center" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_not['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{not.imagem}", 80, 60, false); ?>" border="0" class="borda" /></a></td>
                  <td width="69%" align="left" valign="top"><span class="tiutlo_not  style2"><a href="exibir_noticia.php?id=<?php echo $row_not['id']; ?>"><?php echo $row_not['titulo']; ?></a></span><a href="exibir_noticia.php?id=<?php echo $row_not['id']; ?>"><br />
                        <span class="fonte_not style3"><?php echo $row_not['data']; ?></span></a></td>
                </tr>
              </table><br />

          <?php } while ($row_not = mysql_fetch_assoc($not)); ?></td>
     </tr>
     
   </table></td>
   <td rowspan="2"><img name="index_r4_c6" src="img/index_r4_c6.jpg" width="65" height="348" border="0" id="index_r4_c6" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="303" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="index_r5_c5" src="img/index_r5_c5.jpg" width="299" height="45" border="0" id="index_r5_c5" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="45" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" colspan="3"><img name="index_r6_c4" src="img/index_r6_c4.jpg" width="387" height="67" border="0" id="index_r6_c4" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="39" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="index_r7_c2" src="img/index_r7_c2.jpg" width="349" height="28" border="0" id="index_r7_c2" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
</table>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>
    <td width="254" height="139" align="center" valign="middle"><a href="http://www.saquabb.com.br" target="_blank"><img src="patrocinio/saquabb.jpg" alt="saquabb.com.br" width="227" height="68" border="0" /></a></td>
    <td width="224" align="center" valign="middle"><a href="http://www.kaploa.com.br" target="_blank"><img src="patrocinio/kaploa.jpg" alt="kpaloa" width="106" height="120" border="0" /></a></td>
    <td width="284" align="center" valign="middle"><a href="http://www.academiamoviment.com.br/" target="_blank"><img src="patrocinio/mov.jpg" alt="movimet" width="134" height="90" border="0" /></a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($not);
?>
