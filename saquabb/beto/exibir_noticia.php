<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_exibir = "-1";
if (isset($_GET['id'])) {
  $colname_exibir = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_exibir = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id DESC", $colname_exibir);
$exibir = mysql_query($query_exibir, $saquabb) or die(mysql_error());
$row_exibir = mysql_fetch_assoc($exibir);
$totalRows_exibir = mysql_num_rows($exibir);

$colname_foto_not = "-1";
if (isset($_GET['id'])) {
  $colname_foto_not = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_foto_not = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_foto_not);
$foto_not = mysql_query($query_foto_not, $saquabb) or die(mysql_error());
$row_foto_not = mysql_fetch_assoc($foto_not);
$totalRows_foto_not = mysql_num_rows($foto_not);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>outras.jpg</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"></style>
<!--Fireworks 8 Dreamweaver 8 target.  Created Thu Jul 20 10:22:46 GMT-0300 (Hora oficial do Brasil) 2006-->
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #282804;
	background-image: url(img/fundo.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
<!-- fwtable fwsrc="Untitled" fwbase="outras.jpg" fwstyle="Dreamweaver" fwdocid = "245245136" fwnested="0" -->
  <tr>
   <td><img src="img/spacer.gif" width="770" height="1" border="0" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td><img name="outras_r1_c1" src="img/outras_r1_c1.jpg" width="770" height="115" border="0" id="outras_r1_c1" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="115" border="0" alt="" /></td>
  </tr>
  <tr>
   <td align="right" valign="middle" background="img/outras_r2_c1.jpg">&nbsp;</td>
   <td><img src="img/spacer.gif" width="1" height="48" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="outras_r3_c1" src="img/outras_r3_c1.jpg" width="770" height="3" border="0" id="outras_r3_c1" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="3" border="0" alt="" /></td>
  </tr>
  <tr>
   <td align="center" valign="top" background="img/outras_r3_c1.jpg"><table width="81%" border="0" cellspacing="2" cellpadding="0">
     <tr>
       <td align="center"><table width="100%" border="0" cellspacing="6" cellpadding="0">
         <tr>
           <td height="35" colspan="2" align="left"><span class="titulo_not"><?php echo $row_exibir['titulo']; ?></span></td>
           </tr>
         <tr>
           <td height="20" align="left"><span class="tiutlo_not">Autor:</span> <?php echo $row_exibir['fonte']; ?></td>
           <td align="left"><span class="tiutlo_not">Data:</span> <?php echo $row_exibir['data']; ?> </td>
         </tr>
         <tr>
           <td colspan="2" align="left"><?php 
// Show If File Exists (region1)
if (tNG_fileExists("../uploads/fotos/", "{foto_not.arquivo}")) {
?>
               <table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                 <tr>
                   <td width="54"><?php do { ?>
                       <table align="width="200" border="0" cellpadding="4" cellspacing="0" class="borda_preta_1px">
                         <tr>
                           <td width="41" align="center" valign="top" bgcolor="#ECD219"><a href="javascript:abrir_janela('ver_foto.php?id_foto=<?php echo $row_foto_not['id_foto']; ?>','fotos','','450','420','true')"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{foto_not.arquivo}", 200, 0, true); ?>" border="0" class="borda_tabela" /></a></td>
                         </tr>
                       </table>
                     <br />
                       <?php } while ($row_foto_not = mysql_fetch_assoc($foto_not)); ?></td>
                 </tr>
               </table>
             <?php } 
// EndIf File Exists (region1)
?>
             <div align="justify"><?php echo $row_exibir['materia']; ?></div></td>
         </tr>
       </table></td>
     </tr>
   </table></td>
   <td><img src="img/spacer.gif" width="1" height="241" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="outras_r5_c1" src="img/outras_r5_c1.jpg" width="770" height="123" border="0" id="outras_r5_c1" alt="" /></td>
   <td><img src="img/spacer.gif" width="1" height="123" border="0" alt="" /></td>
  </tr>
</table>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>
    <td width="254" height="139" align="center" valign="middle"><a href="http://www.saquabb.com.br" target="_blank"><img src="patrocinio/saquabb.jpg" alt="saquabb.com.br" width="227" height="68" border="0" /></a></td>
    <td width="224" align="center" valign="middle"><a href="http://www.kaploa.com.br" target="_blank"><img src="patrocinio/kaploa.jpg" alt="kpaloa" width="106" height="120" border="0" /></a></td>
    <td width="284" align="center" valign="middle"><a href="http://www.academiamoviment.com.br/" target="_blank"><img src="patrocinio/mov.jpg" alt="movimet" width="134" height="90" border="0" /></a></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($exibir);

mysql_free_result($foto_not);
?>
