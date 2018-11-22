<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#teste {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	background-color: #00FF00;
}
-->
</style>
</head>

<body>
<script> // * Dependencies * 
// Example: obj = findObj("image1");

function findObj(theObj, theDoc)

{

  var p, i, foundObj;

  

  if(!theDoc) theDoc = document;

  if( (p = theObj.indexOf("?")) > 0 && parent.frames.length)

  {

    theDoc = parent.frames[theObj.substring(p+1)].document;

    theObj = theObj.substring(0,p);

  }

  if(!(foundObj = theDoc[theObj]) && theDoc.all) foundObj = theDoc.all[theObj];

  for (i=0; !foundObj && i < theDoc.forms.length; i++) 

    foundObj = theDoc.forms[i][theObj];

  for(i=0; !foundObj && theDoc.layers && i < theDoc.layers.length; i++) 

    foundObj = findObj(theObj,theDoc.layers[i].document);

  if(!foundObj && document.getElementById) foundObj = document.getElementById(theObj);

  

  return foundObj;

}

// * Dependencies * 

// this function requires the following snippets:

// JavaScript/readable_MM_functions/findObj

//

// Accepts a variable number of arguments, in triplets as follows:

// arg 1: simple name of a layer object, such as "Layer1"

// arg 2: ignored (for backward compatibility)

// arg 3: 'hide' or 'show'

// repeat...

//

// Example: showHideLayers(Layer1,'','show',Layer2,'','hide');

function showHideLayers()

{ 

  var i, visStr, obj, args = showHideLayers.arguments;

  for (i=0; i<(args.length-2); i+=3)

  {

    if ((obj = findObj(args[i])) != null)

    {

      visStr = args[i+2];

      if (obj.style)

      {

        obj = obj.style;

        if(visStr == 'show') visStr = 'visible';

        else if(visStr == 'hide') visStr = 'hidden';

      }

      obj.visibility = visStr;

    }

  }

}

/* 

Example:

function test()

{

  if (document.layers) getMouseLoc;     //NS

  else if (document.all) getMouseLoc(); //IE

  alert(mouseLocation.x+","+mouseLocation.y);

}

in the BODY:

<a href="#" onmouseover="test()">test</a>

*/

function Point(x,y) {  this.x = x; this.y = y; }

mouseLocation = new Point(-500,-500);

function getMouseLoc(e)

{

  if(!document.all)  //NS

  {

    mouseLocation.x = e.pageX;

    mouseLocation.y = e.pageY;

  }

  else               //IE

  {

    mouseLocation.x = event.x + document.body.scrollLeft;

    mouseLocation.y = event.y + document.body.scrollTop;

  }

  return true;

}

//NS init:

if(document.layers){ document.captureEvents(Event.MOUSEMOVE); document.onMouseMove = getMouseLoc; }


// this function requires the following snippets:

// JavaScript/readable_MM_functions/findObj

// JavaScript/readable_MM_functions/showHideLayers

// JavaScript/events/getMouseLoc

function moveLayerToMouseLoc(theLayer, offsetH, offsetV)

{

  var obj;

  if ((findObj(theLayer))!=null)

  {

    if (document.layers)  //NS

    {

      document.onMouseMove = getMouseLoc;

      obj = document.layers[theLayer];

      obj.left = mLoc.x +offsetH;

      obj.top  = mLoc.y +offsetV;

    }

    else if (document.all)//IE

    {

      getMouseLoc();

      obj = document.all[theLayer].style;

      obj.pixelLeft = mLoc.x +offsetH;

      obj.pixelTop  = mLoc.y +offsetV;

    }

    showHideLayers(theLayer,'teste','show');

  }

}

// get mouse location

function Point(x,y) {  this.x = x; this.y = y; }

mLoc = new Point(-500,-500);

function getMouseLoc(e)

{

  if(!document.all)  //NS

  {

    mLoc.x = e.pageX;

    mLoc.y = e.pageY;

  }

  else               //IE

  {

    mLoc.x = event.x + document.body.scrollLeft;

    mLoc.y = event.y + document.body.scrollTop;

  }

  return true;

}

//NS init:

if(document.layers){ document.captureEvents(Event.MOUSEMOVE); document.onMouseMove = getMouseLoc; }

</script>
<div id="teste"></div>
<input type="text" name="n" value="Your message" onfocus="if(this.value=='Your message')this.value='';" />

<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <thead>
    <tr>
      <td><a href="#">Lorem</a></td>
      <td>:</td>
      <td><a href="#">Ipsum</a></td>
      <td>:</td>
      <td><a href="#">Dolar</a></td>
      <td>:</td>
      <td width="100%">Amit</td>
    </tr>
  </thead>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tbody>
    <tr>
      <td><a href="#">Lorem</a></td>
      <td>&gt;</td>
      <td><a href="#">Ipsum</a></td>
      <td>&gt;</td>
      <td><a href="#">Dolar</a></td>
      <td>&gt;</td>
      <td width="100%">Amit</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tbody>
    <tr style="text-align: left;">
      <td><a href="#">Lorem</a></td>
      <td>&#149;</td>
      <td><a href="#">Ipsum</a></td>
      <td>&#149;</td>
      <td><a href="#">Dolar</a></td>
      <td>&#149;</td>
      <td><a href="#">Amit</a></td>
      <td>&#149;</td>
      <td><a href="#">Consetetur</a></td>
      <td>&#149;</td>
      <td width="100%"><a href="#">Sandipscing</a></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tbody>
    <tr style="text-align:left;">
      <td><a href="#">Lorem</a></td>
      <td>-</td>
      <td><a href="#">Ipsum</a></td>
      <td>-</td>
      <td><a href="#">Dolar</a></td>
      <td>-</td>
      <td><a href="#">Amit</a></td>
      <td>-</td>
      <td><a href="#">Consetetur</a></td>
      <td>-</td>
      <td width="100%"><a href="#">Sadipscing</a></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tbody>
    <tr>
      <td style="background-color: #cccccc;"><a href="#">&lt;</a></td>
      <td width="100%">&nbsp;</td>
      <td style="background-color: #cccccc;"><a href="#">&gt;</a></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
