function VideoObject(wm, file) {

	if ( file == null ) {
		file = "";
	}
	classid = 'CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95';
	document.write('<object	classid="' + classid + '"\n' +
					'codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715"\n' +
					'standby="Loading Microsoft® Windows® Media Player components..." \n' +
					'type="application/x-oleobject"\n' +
					'width="1" height="1"\n' +
					'id="' + wm + '">\n' +
					'<param name="FileName" value="' + file + '">\n' +
					'<param name="AutoStart" value="True">\n' +
					'<param name="ShowControls" value="0">\n' +
					'<param name="ShowDisplay" value="0">\n' +
					'<param name="ShowStatusBar" value="0">\n' +
					'<param name="AutoSize" value="1">\n' +
					'<param NAME="EnableContextMenu" VALUE="0">' +
					'<param name="ShowAudioControls" value="0">\n' +
					'<param name="ShowGotoBar" value="0">\n' +
					'<param name="ShowTracker" value="0">\n' +
					'<param name="ControlType" value="0">\n' +
					'<param name="AnimationAtStart" value="1">\n' +
					'<param name="TransparentAtStart" value="1">\n' +
					'<param name="BufferingTime" value="5">\n' +
					'<param name="WindowLessVideo" value="0">\n' +
					'<embed src="' + file + '" width="1" height="1" autostart="True" filename="' + file + '" showcontrols="0" showdisplay="0" showstatusbar="0" autosize="1" enablecontextmenu="0" showaudiocontrols="0" showgotobar="0" showtracker="0" controltype="0" animationatstart="1" transparentatstart="1" bufferingtime="5" windowlessvideo="0"></embed>\n' +
					'</object>\n');	

}