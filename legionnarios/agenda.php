<?php require_once('Connections/legion.php'); ?>
<?php
$maxRows_agenda = 20;
$pageNum_agenda = 0;
if (isset($_GET['pageNum_agenda'])) {
  $pageNum_agenda = $_GET['pageNum_agenda'];
}
$startRow_agenda = $pageNum_agenda * $maxRows_agenda;

mysql_select_db($database_legion, $legion);
$query_agenda = "SELECT * FROM agenda ORDER BY id DESC";
$query_limit_agenda = sprintf("%s LIMIT %d, %d", $query_agenda, $startRow_agenda, $maxRows_agenda);
$agenda = mysql_query($query_limit_agenda, $legion) or die(mysql_error());
$row_agenda = mysql_fetch_assoc($agenda);

if (isset($_GET['totalRows_agenda'])) {
  $totalRows_agenda = $_GET['totalRows_agenda'];
} else {
  $all_agenda = mysql_query($query_agenda);
  $totalRows_agenda = mysql_num_rows($all_agenda);
}
$totalPages_agenda = ceil($totalRows_agenda/$maxRows_agenda)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_______________________________ Legionnarios.com ________________________________________________________________</title>
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
</head>

<body onload="MM_preloadImages('images/mais2.jpg')">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <!-- fwtable fwsrc="Untitled" fwbase="conteudo.jpg" fwstyle="Dreamweaver" fwdocid = "782951710" fwnested="0" -->
  <tr>
    <td><img src="images/conteudo/spacer.gif" width="37" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="271" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="90" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="319" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="33" height="1" border="0" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img src="images/conteudo/conteudo_r1_c1.jpg" alt="" name="conteudo_r1_c1" width="398" height="166" border="0" usemap="#conteudo_r1_c1Map" id="conteudo_r1_c1" /></td>
    <td rowspan="2" colspan="2"><img src="images/conteudo/conteudo_r1_c4.jpg" alt="" name="conteudo_r1_c4" width="352" height="167" border="0" usemap="#conteudo_r1_c4Map" id="conteudo_r1_c4" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="166" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img name="conteudo_r2_c1" src="images/conteudo/conteudo_r2_c1.jpg" width="398" height="1" border="0" id="conteudo_r2_c1" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>
  <tr>
    <td rowspan="2"><img name="conteudo_r3_c1" src="images/conteudo/conteudo_r3_c1.jpg" width="37" height="141" border="0" id="conteudo_r3_c1" alt="" /></td>
    <td colspan="3" background="images/conteudo/conteudo_r3_c2.jpg" bgcolor="#FFFFFF"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="680" height="135">
      <param name="movie" value="flash/intro.swf" />
      <param name="quality" value="high" />
      <embed src="flash/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="680" height="135"></embed>
    </object></td>
    <td rowspan="2"><img name="conteudo_r3_c5" src="images/conteudo/conteudo_r3_c5.jpg" width="33" height="141" border="0" id="conteudo_r3_c5" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="135" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="3"><img name="conteudo_r4_c2" src="images/conteudo/conteudo_r4_c2.jpg" width="680" height="6" border="0" id="conteudo_r4_c2" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="6" border="0" alt="" /></td>
  </tr>
  <tr>
    <td><img name="conteudo_r5_c1" src="images/conteudo/conteudo_r5_c1.jpg" width="37" height="43" border="0" id="conteudo_r5_c1" alt="" /></td>
    <td align="center" valign="middle" bgcolor="#0E0C0D"><img src="images/titulos/agenda.jpg" alt="Agenda" width="260" height="40" /></td>
    <td colspan="3"><img name="conteudo_r5_c3" src="images/conteudo/conteudo_r5_c3.jpg" width="442" height="43" border="0" id="conteudo_r5_c3" alt="" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="43" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="top" background="images/conteudo/conteudo_r6_c1.jpg"><table width="90%" border="0" cellpadding="0">
      <tr>
        <th height="42" align="left" class="texto" scope="col">Confira a Agenda de Shows da Banda! </th>
      </tr>
      <tr>
        <th align="left" valign="top" scope="col"><?php do { ?>
            <table width="85%" border="0" cellpadding="4" cellspacing="0">
                <tr>
                  <th width="3%" align="center" valign="middle" scope="col"><img src="images/titulos/marcador.jpg" width="5" height="5" /></th>
                  <th width="80%" align="left" valign="middle" class="texto_negrito" scope="col"><?php echo $row_agenda['titulo']; ?> - <?php echo $row_agenda['local']; ?> - <?php echo $row_agenda['data']; ?></th>
                  <th width="17%" align="left" valign="middle" class="texto_negrito" scope="col"><a href="ver_agenda.php?id=<?php echo $row_agenda['id']; ?>"><img src="images/mais.jpg" width="81" height="25" border="0" /></a></th>
                </tr>
                        </table>
            <?php } while ($row_agenda = mysql_fetch_assoc($agenda)); ?></th>
      </tr>
    </table></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="312" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/conteudo/conteudo_r7_c1.jpg" alt="" name="conteudo_r7_c1" width="750" height="46" border="0" usemap="#conteudo_r7_c1Map" id="conteudo_r7_c1" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="46" border="0" alt="" /></td>
  </tr>
  <tr>
    <td colspan="5"><img src="images/conteudo/conteudo_r8_c1.jpg" alt="" name="conteudo_r8_c1" width="750" height="60" border="0" id="conteudo_r8_c1" /></td>
    <td><img src="images/conteudo/spacer.gif" width="1" height="60" border="0" alt="" /></td>
  </tr>
</table>

<map name="conteudo_r1_c4Map" id="conteudo_r1_c4Map"><area shape="rect" coords="15,68,69,88" href="index.php" alt="home" />
<area shape="rect" coords="53,102,121,116" href="arquivo.php" alt="noticias" />
<area shape="rect" coords="102,126,163,145" href="projeto.php" alt="projeto" />
<area shape="rect" coords="132,64,207,88" href="agenda.php" alt="agenda" />
<area shape="rect" coords="158,100,298,116" href="galeria.php" alt="galeria de fotos" />
<area shape="rect" coords="209,128,286,148" href="contato.php" alt="contato" /><area shape="rect" coords="250,69,322,91" href="release.php" alt="release" />
<area shape="rect" coords="17,134,83,156" href="jornais.php" />
</map>
<map name="conteudo_r7_c1Map" id="conteudo_r7_c1Map"><area shape="rect" coords="90,20,142,36" href="index.php" alt="home" />
<area shape="rect" coords="153,21,218,35" href="arquivo.php" alt="noticias" />
<area shape="rect" coords="223,21,361,36" href="galeria.php" alt="galeria de fotos" />
<area shape="rect" coords="370,20,436,38" href="agenda.php" alt="agenda" />
<area shape="rect" coords="451,22,511,35" href="projeto.php" alt="projeto" />
<area shape="rect" coords="524,20,586,33" href="release.php" alt="release" />
<area shape="rect" coords="596,21,669,34" href="contato.php" alt="contato" />
</map>
<map name="conteudo_r1_c1Map" id="conteudo_r1_c1Map"><area shape="rect" coords="2,4,145,16" href="mailto:saquabb@hotmail.com" />
</map></body>
</html>
<?php
mysql_free_result($agenda);
?>
