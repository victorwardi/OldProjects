// JavaScript Document
<!--
if ( p1 == "controle" ) {
	// Action Play
		if (p2 == "play") MoviePlayV6(WMObjName);
	// Action Stop
		if (p2 == "stop") MovieStopV6(WMObjName);
	// Action Pause
		if (p2 == "pause") MoviePauseV6(WMObjName);
	// Action VolumeDown
		if (p2 == "low") MovieVolumeDownV6(WMObjName);
	// Action VolumeUp
		if (p2 == "high") MovieVolumeUpV6(WMObjName);
	// Exibe layer do video
		if( p2 == "showVideo" ) showVideo();
	// Esconde layer do video
		if( p2 == "hideVideo" ) hideVideo();
}

// Volume
if (p1 == "volume") {
	WM.Volume = 0 - (Exponential((16 / 10), ((100 - p2) / 10) - 1)) * (10000 / ((Exponential((16 / 10), 10)) - 1));
}
function Exponential(Num1, Num2) {
	var Resp;
	if (parseInt(Num2) > 0) {
		Resp = Num1;
		for (i = 1; i < parseInt(Num2); i++) {
			Resp = Num1 * Resp;
		}
	}
	else {
		Resp = 1;
	}
	return(Resp);
}
//WM.settings.volume = p2;
//-->