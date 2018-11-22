<html>
<head>
<title>Costa Verde FM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JScript.Encode" src="VideoObjectWM6.js"></script>
<script language="JScript.Encode" src="WindowsMediaBasicControls6.js"></script>
<script language="JavaScript" src="OpenFlash.js"></script>
<script for="player" LANGUAGE="JScript.Encode" EVENT="fscommand(p1,p2)" src="controle.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<table align="left"><script language="JavaScript">
OpenFlash();
</script>

<script language="JavaScript">VideoObject(WMObjName, ASXFile);</script>
<SCRIPT FOR="WM"  EVENT="Buffering(bStart)"  LANGUAGE="JScript">
	if (bStart) {
		player.setVariable("$playing", "buf");
	}
	else {
		player.setVariable("$playing", "true");
	}
</SCRIPT>

<SCRIPT FOR="WM" EVENT="PlayStateChange(lOldState, lNewState)" LANGUAGE="JScript">
	if (lNewState == 0 || lNewState == 8)
		player.setVariable("$playing", "false")
</SCRIPT>

<SCRIPT FOR="WM" EVENT="Error( )" LANGUAGE="JScript">
	if (WM.ErrorCode == "-1072885328")
		alert("Quantidade máxima de conexões simultâneas excedido ... tente novamente mais tarde!");
</SCRIPT>
</table>
</body>
</html>
