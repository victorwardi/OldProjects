<?php require_once('Connections/CostaverdeFM.php'); ?>
<?php
$colname_top = "-1";
if (isset($_GET['id'])) {
  $colname_top = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_CostaverdeFM, $CostaverdeFM);
$query_top = sprintf("SELECT * FROM top WHERE id = %s", $colname_top);
$top = mysql_query($query_top, $CostaverdeFM) or die(mysql_error());
$row_top = mysql_fetch_assoc($top);
$totalRows_top = mysql_num_rows($top);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rádio Costa Verde FM</title>
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table align="center" width="200" border="0" cellpadding="0" cellspacing="0" class="ad-box-right-noticia">
<tr>
	<td><div align="center"><img src="img/playr.jpg" alt="Costa Verde FM" width="200" height="150" /></div></td>
</tr>
  <tr>
    <td align="center"><script type="text/javascript">
AC_AX_RunContent( 'classid','CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95','codebase','http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701','type','application/x-oleobject','width','200','height','70','hspace','0','vspace','0','standby','Loading Microsoft® Windows® Media Player components...','id','MediaPlayer1','src','mp3/<?php echo $row_top['mp3']; ?>','autostart','true','pluginspage','http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/','border','0','transparentatstart','false','animationatstart','false','showcontrols','true','displaysize','0','showstatusbar','true','filename','mp3/<?php echo $row_top['mp3']; ?>' ); //end AC code
</script>
    <noscript>
    <object classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" type="application/x-oleobject" width="200" height="70" hspace="0" vspace="0" standby="Loading Microsoft&reg; Windows&reg; Media Player components..." id="MediaPlayer1">

      <param name="AutoStart" value="true" />
      <param name="ShowControls" value="true" />
      <param name="ShowStatusBar" value="true" />
      <param name="TransparentAtStart" value="false" />
      <param name="AnimationatStart" value="false" />
      <param name="displaySize" value="0" />
      <param name="FileName" value="mp3/<?php echo $row_top['mp3']; ?> />
      <embed src="mp3/<?php echo $row_top['mp3'];?>" width="200" height="70" hspace="0" vspace="0" autostart="1" type="application/x-mplayer2" 
      pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" border="0" transparentatstart="0" animationatstart="0" showcontrols="1" displaysize="0" ShowStatusBar="1" >
      
      </embed>
      
    </object></noscript>
    </td>

  </tr>
</table>
</body>

</html>
<?php
mysql_free_result($top);
?>
