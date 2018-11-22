// JavaScript Document
function objeto(nome,largura,altura){

document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"'+
' codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"'+
' width="'+largura+'" height="'+altura+'" id="'+nome+'" align="middle">');

document.write('<param name="allowScriptAccess" value="sameDomain" />');

document.write('<param name="movie" value="'+nome+'.swf" />');

document.write('<param name="quality" value="high" />');
            
document.write('<param name="menu" value="false" />');

document.write('<param name="wmode" value="transparent" />');

document.write('<embed src="'+nome+'.swf" quality="high" menu="false" wmode="transparent" '+
' width="'+largura+'" height="'+altura+'" name="'+nome+'" align="middle"'+
' allowScriptAccess="sameDomain" type="application/x-shockwave-flash"'+
' pluginspage="http://www.macromedia.com/go/getflashplayer" />');

document.write('</object>');

}