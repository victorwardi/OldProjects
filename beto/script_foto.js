
/***********************************************
* Image Thumbnail viewer- � Dynamic Drive (www.dynamicdrive.com)
* Last updated Sept 26th, 03'. This notice must stay intact for use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var ie=document.all;
var ns6=document.getElementById&&!document.all;

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat" && !window.opera)? document.documentElement : document.body;
}

function enlarge(which, e, position, imgwidth, imgheight){
if (ie||ns6){
crossobj=document.getElementById? document.getElementById("showimage") : document.all.showimage
if (position=="center"){
pgyoffset=ns6? parseInt(pageYOffset) : parseInt(ietruebody().scrollTop)
horzpos=ns6? pageXOffset+window.innerWidth/2-imgwidth/2 : ietruebody().scrollLeft+ietruebody().clientWidth/2-imgwidth/2
vertpos=ns6? pgyoffset+window.innerHeight/2-imgheight/2 : pgyoffset+ietruebody().clientHeight/2-imgheight/2
if (window.opera && window.innerHeight) //compensate for Opera toolbar
vertpos=pgyoffset+window.innerHeight/2-imgheight/2
vertpos=Math.max(pgyoffset, vertpos)
}
else{
var horzpos=ns6? pageXOffset+e.clientX : ietruebody().scrollLeft+event.clientX
var vertpos=ns6? pageYOffset+e.clientY : ietruebody().scrollTop+event.clientY
}
crossobj.style.left=horzpos+"px"
crossobj.style.top=vertpos+"px"

crossobj.innerHTML='<div align="right" id="dragbar"><span id="closetext" onClick="closepreview()">x </span> </div><img src="'+which+'">'
crossobj.style.visibility="visible"
return false
}
else //if NOT IE 4+ or NS 6+, simply display image in full browser window
return true
}

function closepreview(){
crossobj.style.visibility="hidden";
}

function drag_drop(e){
if (ie&&dragapproved){
crossobj.style.left=tempx+event.clientX-offsetx+"px";
crossobj.style.top=tempy+event.clientY-offsety+"px";
}
else if (ns6&&dragapproved){
crossobj.style.left=tempx+e.clientX-offsetx+"px";
crossobj.style.top=tempy+e.clientY-offsety+"px";
}
return false;
}

function initializedrag(e){
if (ie&&event.srcElement.id=="dragbar"||ns6&&e.target.id=="dragbar"){
offsetx=ie? event.clientX : e.clientX;
offsety=ie? event.clientY : e.clientY;

tempx=parseInt(crossobj.style.left);
tempy=parseInt(crossobj.style.top);

dragapproved=true;
document.onmousemove=drag_drop;
}
}

document.onmousedown=initializedrag;
document.onmouseup=new Function("dragapproved=false");
