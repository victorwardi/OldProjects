<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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
$query_video = "select*  from videos_ex order by id desc";
$video = mysql_query($query_video, $ConBD) or die(mysql_error());
$row_video = mysql_fetch_assoc($video);
$totalRows_video = mysql_num_rows($video);

$objDynamicMedia1 = new tNG_DynamicMedia("../");
$objDynamicMedia1->setFolder("../uploads/videos/");
$objDynamicMedia1->setRenameRule("{video.video}");
$objDynamicMedia1->setType("wmv");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>

<script type="text/javascript">
AC_AX_RunContent( 'id','Object1','width','320','height','310','classid','CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95','standby','Loading Windows Media Player components...','type','application/x-oleobject','viewastext','VIEWASTEXT','src','../uploads/videos/<?php echo $row_video['video']; ?>','autostart','True','autorewind','true','autosize','False','enabled','1','showstatusbar','true','showdisplay','0','showtracker','False','showcontrols','true','showpositioncontrols','False','pluginspage','http://www.microsoft.com/Windows/MediaPlayer/','codebase','http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,0,0','filename','../uploads/videos/<?php echo $row_video['video']; ?>','displaysize','0','showaudiocontrols','True','uimode','full','mute','False' ); //end AC code
</script><noscript><OBJECT ID="Object1" width="320" height="310"
  CLASSID="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95"
  STANDBY="Carregando Windows Media Player componentes..."
  TYPE="application/x-oleobject" VIEWASTEXT>

  <PARAM NAME="FileName" VALUE="../uploads/videos/<?php echo $row_video['video']; ?>">
  <PARAM NAME="ShowControls" VALUE="true">
  <PARAM NAME="ShowStatusBar" VALUE="true">    
  <PARAM NAME="AutoRewind" VALUE="true">
  <PARAM NAME="AutoStart" VALUE="True">
  <PARAM NAME="AutoSize" VALUE="False">

  <PARAM NAME="DisplaySize" VALUE="0">  
  <PARAM NAME="ShowTracker" VALUE="False">  
  <PARAM NAME="ShowAudioControls" Value="True">
  <PARAM NAME="ShowPositionControls" VALUE="False">     
  <PARAM NAME='uiMode' VALUE='full'>
  <PARAM NAME='mute' VALUE='False'>

  <embed src="../uploads/videos/<?php echo $row_video['video']; ?>" 
  type="application/x-mplayer2" 
  autostart="1" 
  autorewind="1" 
  autosize="0"
  enabled="1" 
  showstatusbar="1" 
  showdisplay="0" 
  showtracker="0"
  showcontrols="1" 
  ShowPositionControls="0"
  pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
  CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,0,0" width="320" height="310">
  </embed>
 
 </OBJECT></noscript>	

</body>
</html>
<?php
mysql_free_result($video);
?>
