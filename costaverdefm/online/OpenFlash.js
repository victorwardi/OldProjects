var WMObjName = "WM";
var ASXFile = "mms://costaverde917.ddns.com.br:6666/";
function OpenFlash() {
	document.write('' +
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="398" height="190" id="player">' +
	'  <param name="movie" value="player.swf">' +
	'  <param name="quality" value="high">' +
	'  <param name="wmode" value="transparent">' +
	'  <embed src="player.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="398" height="190"></embed>' +
	'</object>' +
	'');
}
