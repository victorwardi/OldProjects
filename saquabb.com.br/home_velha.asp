<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim RsAlbum
Dim RsAlbum_numRows

Set RsAlbum = Server.CreateObject("ADODB.Recordset")
RsAlbum.ActiveConnection = MM_conSurf_STRING

RsAlbum.Source = "SELECT * FROM Albuns ORDER BY Cod DESC"
RsAlbum.CursorType = 0
RsAlbum.CursorLocation = 2
RsAlbum.LockType = 1
RsAlbum.Open()

RsAlbum_numRows = 0
%>
<%
Dim RsGaleria
Dim RsGaleria_numRows

Set RsGaleria = Server.CreateObject("ADODB.Recordset")
RsGaleria.ActiveConnection = MM_conSurf_STRING
RsGaleria.Source = "SELECT * FROM Galerias ORDER BY Cod DESC"
RsGaleria.CursorType = 0
RsGaleria.CursorLocation = 2
RsGaleria.LockType = 1
RsGaleria.Open()

RsGaleria_numRows = 0
%>
<%
Dim RsGaleria01
Dim RsGaleria01_numRows

Set RsGaleria01 = Server.CreateObject("ADODB.Recordset")
RsGaleria01.ActiveConnection = MM_conSurf_STRING
RsGaleria01.Source = "SELECT * FROM Galerias ORDER BY Cod DESC"
RsGaleria01.CursorType = 0
RsGaleria01.CursorLocation = 2
RsGaleria01.LockType = 1
RsGaleria01.Open()

RsGaleria01_numRows = 0
%>
<%
Dim Record_foto_semana
Dim Record_foto_semana_numRows

Set Record_foto_semana = Server.CreateObject("ADODB.Recordset")
Record_foto_semana.ActiveConnection = MM_conSurf_STRING
Record_foto_semana.Source = "SELECT * FROM foto_semana ORDER BY id DESC"
Record_foto_semana.CursorType = 0
Record_foto_semana.CursorLocation = 2
Record_foto_semana.LockType = 1
Record_foto_semana.Open()

Record_foto_semana_numRows = 0
%>
<%
Dim Rs_atleta
Dim Rs_atleta_numRows
Dim S
Set Rs_atleta = Server.CreateObject("ADODB.Recordset")
Rs_atleta.ActiveConnection = MM_conSurf_STRING
Randomize
S=clng(1E6*rnd)
Rs_atleta.Source = "SELECT * FROM atletas ORDER BY rnd(-(10000*CodNoticia)* " & S & ")"
Rs_atleta.CursorType = 0
Rs_atleta.CursorLocation = 2
Rs_atleta.LockType = 1
Rs_atleta.Open()

Rs_atleta_numRows = 0
%>
<%
Dim RsNot
Dim RsNot_numRows

Set RsNot = Server.CreateObject("ADODB.Recordset")
RsNot.ActiveConnection = MM_conSurf_STRING
RsNot.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
RsNot.CursorType = 0
RsNot.CursorLocation = 2
RsNot.LockType = 1
RsNot.Open()

RsNot_numRows = 0
%>
<html>
<head>
<title>Saquabb.com.br - Vers&atilde;o 2005.b</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.brd {	border: 1px solid #000000;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #CCCCCC;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style10 {
	font-size: 9px;
	color: #FF6600;
}
.atleta {
	font-size: 14px;
	color: #FFFFFF;
	text-decoration: underline;
}
.style12 {
	color: #FFFFFF;
	font-size: 5px;
}
.style14 {font-size: 9px}
.style42 {	color: #FFFFFF;
	font-size: 10px;
	font-weight: bold;
}
.style22 {font-size: 12}
.style53 {font-size: 12px}
.style55 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; color: #000000;}
.style23 {font-size: 10px; color: #FF6600; }
.style24 {font-size: 11px}
.style25 {color: #000000}
.style57 {color: #FFFFFF}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function Browser(){
	this.name = navigator.appName;
	if (this.name == 'Microsoft Internet Explorer') this.browser = 'ie';
	else if (this.name.match(/Netscape/)) this.browser = 'ns';
	else this.browser = this.name;
	this.version = parseInt(navigator.appVersion);
	this.ns = (this.browser=='ns' && this.version>=4);
	this.ns4 = (this.browser=='ns' && this.version==4);
	this.ns6 = (this.browser=='ns' && this.version>=5);
	this.ie = (this.browser=='ie' && this.version>=4);
	this.ie4 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 4')>-1);
	this.ie5 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 5')>-1);
	this.ie6 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 6')>-1);
	if (this.ie5) this.version = 5;
	this.op5 = (navigator.userAgent.indexOf('Opera 5')>-1);
	if (this.op5){this.browser = 'op'}
	this.dom1 = (document.implementation && document.implementation.hasFeature)?true:false;
	this.os = (navigator.platform)?navigator.platform:'unknown';
	if (this.ie){ this.language = navigator.userLanguage.substring(0,2).toLowerCase() } else if (this.ns || this.op5) { this.language = navigator.language.substring(0,2).toLowerCase() }
	this.toString = function(){ return '[object Browser]'}
	return this;
}

function setOpacity(objId, i){
	b = new Browser()
	if (b.ie){
		obj = document.all[objId]
		obj.style.filter = "alpha(opacity=" + i + ")";
	}
	else if (b.ns6){
		obj = document.getElementById(objId)
		obj.style.MozOpacity = i+'%'
	}
}
//-->
</script>
</script>
<script language="JavaScript" type="text/JavaScript"> 
<!-- 
function MM_reloadPage(init) { //reloads the window if Nav4 resized 
   if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) { 
     document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }} 
else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload(); 
} 
MM_reloadPage(true); 

function Browser(){ 
    this.name = navigator.appName; 
    if (this.name == 'Microsoft Internet Explorer') this.browser = 'ie'; 
    else if (this.name.match(/Netscape/)) this.browser = 'ns'; 
    else this.browser = this.name; 
    this.version = parseInt(navigator.appVersion); 
    this.ns = (this.browser=='ns' && this.version>=4); 
    this.ns4 = (this.browser=='ns' && this.version==4); 
    this.ns6 = (this.browser=='ns' && this.version>=5); 
    this.ie = (this.browser=='ie' && this.version>=4); 
    this.ie4 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 4')>-1); 
    this.ie5 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 5')>-1); 
    this.ie6 = (this.browser=='ie' && navigator.userAgent.indexOf('MSIE 6')>-1); 
    if (this.ie5) this.version = 5; 
    this.op5 = (navigator.userAgent.indexOf('Opera 5')>-1); 
    if (this.op5){this.browser = 'op'} 
    this.dom1 = (document.implementation && document.implementation.hasFeature)?true:false; 
    this.os = (navigator.platform)?navigator.platform:'unknown'; 
    if (this.ie){ this.language = navigator.userLanguage.substring(0,2).toLowerCase() } else if (this.ns || this.op5) {    this.language = navigator.language.substring(0,2).toLowerCase() } 
    this.toString = function(){ return '[object Browser]'} 
    return this; 
} 

function setOpacity(objId, i){ 
     b = new Browser() 
     if (b.ie){ 
            obj = document.all[objId] 
             obj.style.filter = "alpha(opacity=" + i + ")"; 
     } 
     else if (b.ns6){ 
             obj = document.getElementById(objId) 
             obj.style.MozOpacity = i+'%' 
     } 
} 

function MM_findObj(n, d) { //v4.01 
   var p,i,x; if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) { 
     d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);} 
   if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n]; 
   for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); 
   if(!x && d.getElementById) x=d.getElementById(n); return x; 
} 

function MM_showHideLayers() { //v6.0 
   var i,p,v,obj,args=MM_showHideLayers.arguments; 
   for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2]; 
      if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; } 
         obj.visibility=v; } 
} 

function fadeOpacity(objId, sOpacity, fOpacity,speed){ 
     b = new Browser() 
     var finished = false 
     if (sOpacity == fOpacity) 
      { 
          finished=true 
       } 
     else if (sOpacity > fOpacity){ sOpacity-- } 
     else if (sOpacity < fOpacity){ sOpacity++ } 
     setOpacity(objId,sOpacity) 
     if (finished!=true) 
       document.TC_opacity = setTimeout('fadeOpacity(\''+objId+'\','+sOpacity+','+fOpacity+','+speed+')',speed) 
     else MM_showHideLayers('popup','','hide') 
} 
//--> 
</script> 
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="779" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF6600">
  <tr>
    <td width="820"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0" class="brd">
      <tr>
        <td colspan="5"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="779" height="200">
          <param name="movie" value="flash/topo.swf">
          <param name="quality" value="high">
          <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="779" height="200"></embed>
        </object></td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="top"><div align="left"><img src="retalhos/barra_topo.jpg" width="779" height="5"></div></td>
      </tr>
      <tr>
        <td width="158" rowspan="7" align="center" valign="top"><table width="157" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="157"><img src="retalhos/contato.gif" width="156" height="30"></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><table width="142" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="136" height="18"><div align="center"><span class="style53">E-mail / MSN</span></div></td>
                    </tr>
                    <tr>
                      <td height="65"><div align="center" class="style55">victor@saquabb.com.br<br>
          (Victor Caetano) 
                           <br>
          ou
          <div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; left: 208px; top: 256px;">
            <table border="0" cellpadding="0" cellspacing="0" width="400">
              <!-- fwtable fwsrc="Untitled" fwbase="index.jpg" fwstyle="Dreamweaver" fwdocid = "677686652" fwnested="0" -->
              <tr>
                <td><img src="spacer.gif" width="400" height="1" border="0" alt="" /></td>
                <td><img src="spacer.gif" width="1" height="1" border="0" alt="" /></td>
              </tr>
              <tr>
                <td><a href="javascript:MM_openBrWindow('high_quality_photos/galerias_de_fotos/?Cod=18','Saquabb','','770','600','true')"><img name="index_r1_c1" src="popup/index_r1_c1.gif" width="400" height="266" border="0" id="index_r1_c1" alt="" /></a></td>
                <td><img src="spacer.gif" width="1" height="267" border="0" alt="" /></td>
              </tr>
              <tr>
                <td><img src="index_r2_c2.gif" width="399" height="35" onClick="MM_showHideLayers('Layer1','','hide')"></td>
                <td><img src="spacer.gif" width="1" height="35" border="0" alt="" /></td>
              </tr>
            </table>
          </div>          <br>
          dedesaquarema@hotmail.com<br>
          (Ded&eacute; Siqueira)<br>
          <br>
                      </div></td>
                    </tr>
                  </table>                </td>
              </tr>
              <tr>
                <td><img src="retalhos/publicidade.gif" width="156" height="33"></td>
              </tr>
              <tr>
                <td height="6" align="center" valign="bottom"><span class="style12">...</span></td>
              </tr>
              <tr>
                <td height="36" align="center" valign="middle"><a href="http://www.360invert.com.br" target="_blank"><img src="publicidade/360.gif" width="150" height="30" border="0"></a></td>
              </tr>
              <tr>
                <td height="36" align="center" valign="middle"><a href="http://www.saquaonline.com.br" target="_blank"><img src="publicidade/saquaonline.jpg" alt="SaquaOnline" width="150" height="30" border="0"></a></td>
              </tr>
              <tr>
                <td height="36" align="center" valign="middle"><a href="javascript:MM_openBrWindow('beto/index.htm','Galeria','scrollbars=1','800','600','true')"><img src="publicidade/beto.jpg" width="150" height="30" border="0"></a></td>
              </tr>
              <tr>
                <td height="36" align="center" valign="middle"><a href="http://www.bodyboardco.com/" target="_blank"><img src="publicidade/bbco.jpg" width="150" height="75" border="0"></a></td>
              </tr>
              <tr>
                <td align="center" valign="bottom"><a href="http://www.biarmsdigital.com" target="_blank"><img src="publicidade/Biarms.gif" width="142" height="142" border="0"></a></td>
              </tr>
              <tr>
                <td align="center" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="bottom"><img src="imagens/flyer.gif" width="156" height="33"></td>
              </tr>
              <tr>
                <td height="220" align="center" valign="middle"><img src="flyer/flyer.jpg" width="150" height="200" class="brd"><br>
                <span class="style24"><a href="javascript:openPictureWindow_Fever('flyer/flyer.jpg','400','530','FLYER DA SEMANA','10','10')">+ Saiba Mais</a></span></td>
              </tr>
              <tr>
                <td align="center" valign="bottom" class="style24">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="bottom" class="style24"><table width="100" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col"><!-- Begin Nedstat Basic code -->
<!-- Title: saquabb.com.br -->
<!-- URL: http://www.saquabb.com.br/ -->
<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript">
<!--
  nedstatbasic("ADew/gO36+Vph0qaJDrgnVlsymoQ", 0);
// -->
</script><noscript>
<a target="_blank" href="http://www.nedstatbasic.net/stats?ADew/gO36+Vph0qaJDrgnVlsymoQ"><img
src="http://m1.nedstatbasic.net/n?id=ADew/gO36+Vph0qaJDrgnVlsymoQ"
border="0" width="18" height="18"
alt="Nedstat Basic - Free web site statistics
Personal homepage website counter"></a><br>
<span class="style23">Est&aacute;tisticas</span>
</noscript>
<!-- End Nedstat Basic code -->
&nbsp;</th>
                  </tr>
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </table> </td>
              </tr>
          </table></td>
        <td width="6" rowspan="7" align="center" valign="top" background="retalhos/barra_meio.jpg">&nbsp;</td>
        <td width="291" align="center" valign="top" bgcolor="#FFDFB0"><table width="165" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="165" height="22" scope="col"><div align="left" class="style23 style25">Not&iacute;cia Destaque 
              </div></th>
          </tr>
          <tr>
            <td class="style10 style22"><div align="center"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_parent"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style10 style53"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></a></span></div></td>
          </tr>
          <tr>
            <td height="208" align="center" valign="middle"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>"><img src="fotos/grande/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="250" height="188" hspace="5" border="0" align="center" class="brd"></a></span></td>
          </tr>
          <tr>
            <td height="37" align="center" valign="top"><div align="center"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" class="style23"><%=(RsNot.Fields.Item("resumo").Value)%></a></div></td>
          </tr>
        </table></td>
        <td colspan="2" align="left" valign="top"><div align="left"></div>
          
        <% RsNot.MoveNext() %>        
        <table width="311" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <th width="9" rowspan="2" scope="col"><span class="data"></span></th>
            <th width="190" height="22" align="left" valign="middle" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style10 style24"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></span></th>
            <th width="102" rowspan="2" scope="col"><span class="data"><a href="mostra_noticia_teste.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_self"><img src="fotos/peq/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="90" height="68" hspace="5" border="0" align="center" class="brd"></a></span></th>
          </tr>
          <tr>
            <th height="35" align="left" valign="top" scope="col"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_self" class="style10"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
            </tr>
          <tr>
            <td height="14" colspan="3"><span class="style14">----------------------------------------------------------------------------</span></td>
          </tr>
        </table>
<% RsNot.MoveNext() %>
        <table width="311" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <th width="79" rowspan="2" scope="col"><span class="data"><a href="mostra_noticia_teste.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>"><img src="fotos/peq/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="90" height="68" hspace="5" border="0" align="center" class="brd"></a></span></th>
            <th width="231" height="22" align="left" valign="middle" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style10 style24"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></span></th>
          </tr>
          <tr>
            <th height="27" align="left" valign="top" scope="col"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_self" class="style10"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
          </tr>
          <tr>
            <td height="14" colspan="2"><span class="style14">----------------------------------------------------------------------------</span></td>
          </tr>
        </table>
<% RsNot.MoveNext() %>        <table width="311" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <th width="10" rowspan="2" scope="col"><span class="data"></span></th>
            <th width="198" height="22" align="left" valign="middle" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style10 style24"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></span></th>
            <th width="93" rowspan="2" scope="col"><span class="data"><a href="mostra_noticia_teste.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_self"><img src="fotos/peq/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="90" height="68" hspace="5" border="0" align="center" class="brd"></a></span></th>
          </tr>
          <tr>
            <th height="27" align="left" valign="top" scope="col"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_self" class="style10"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
            </tr>
          <tr>
            <td height="14" colspan="3"><span class="style14">----------------------------------------------------------------------------</span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#FFDFB0">&nbsp;</td>
        <td colspan="2" align="right" valign="middle"><div align="right">
          <table width="80" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><span class="style53"><a href="arquivo.asp">+ not&iacute;cias</a></span></td>
            </tr>
          </table>
          </div></td>
      </tr>
      <tr>
        <td colspan="3" bordercolor="#FFFFFF" bgcolor="#000000"><table width="435" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
          <tr>
            <td width="11" height="22" align="left" valign="middle">&nbsp; </td>
            <td width="424" align="left" valign="middle" class="style7"><img src="retalhos/barra_atletas.gif" width="91" height="15"></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3" align="center" valign="middle" background="retalhos/fundo.jpg" bgcolor="#D65501"><table width="588" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="110" align="center" valign="middle" scope="col"><table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="middle" scope="col"><table width="82" height="119" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="3" scope="col"><img src="retalhos/topo_atl2.gif" width="87" height="7"></th>
                    </tr>
                    <tr>
                      <th width="6" scope="col"><img src="retalhos/esq_atl2.gif" width="6" height="100"></th>
                      <th width="70" background="fotos/atletas/<%=(Rs_atleta.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                      <th width="10" scope="col"><img src="retalhos/dir_atl2.gif" width="11" height="100"></th>
                    </tr>
                    <tr>
                      <th height="12" colspan="3" scope="col"><img src="retalhos/base_atl2.gif" width="87" height="12"></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></span></td>
              </tr>
            </table></th>
            <th width="110" align="center" valign="middle" scope="col">        <% Rs_atleta.MoveNext() %> <table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="middle" scope="col"><table width="82" height="119" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="3" scope="col"><img src="retalhos/topo_atl2.gif" width="87" height="7"></th>
                    </tr>
                    <tr>
                      <th width="6" scope="col"><img src="retalhos/esq_atl2.gif" width="6" height="100"></th>
                      <th width="70" background="fotos/atletas/<%=(Rs_atleta.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                      <th width="10" scope="col"><img src="retalhos/dir_atl2.gif" width="11" height="100"></th>
                    </tr>
                    <tr>
                      <th height="12" colspan="3" scope="col"><img src="retalhos/base_atl2.gif" width="87" height="12"></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></span></td>
              </tr>
            </table></th>
            <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %> <table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="middle" scope="col"><table width="82" height="119" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="3" scope="col"><img src="retalhos/topo_atl2.gif" width="87" height="7"></th>
                    </tr>
                    <tr>
                      <th width="6" scope="col"><img src="retalhos/esq_atl2.gif" width="6" height="100"></th>
                      <th width="70" background="fotos/atletas/<%=(Rs_atleta.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                      <th width="10" scope="col"><img src="retalhos/dir_atl2.gif" width="11" height="100"></th>
                    </tr>
                    <tr>
                      <th height="12" colspan="3" scope="col"><img src="retalhos/base_atl2.gif" width="87" height="12"></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></span></td>
              </tr>
            </table></th>
            <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %> <table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="middle" scope="col"><table width="82" height="119" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="3" scope="col"><img src="retalhos/topo_atl2.gif" width="87" height="7"></th>
                    </tr>
                    <tr>
                      <th width="6" scope="col"><img src="retalhos/esq_atl2.gif" width="6" height="100"></th>
                      <th width="70" background="fotos/atletas/<%=(Rs_atleta.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                      <th width="10" scope="col"><img src="retalhos/dir_atl2.gif" width="11" height="100"></th>
                    </tr>
                    <tr>
                      <th height="12" colspan="3" scope="col"><img src="retalhos/base_atl2.gif" width="87" height="12"></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></span></td>
              </tr>
            </table></th>
            <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %> <table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th align="center" valign="middle" scope="col"><table width="82" height="119" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="3" scope="col"><img src="retalhos/topo_atl2.gif" width="87" height="7"></th>
                    </tr>
                    <tr>
                      <th width="6" scope="col"><img src="retalhos/esq_atl2.gif" width="6" height="100"></th>
                      <th width="70" background="fotos/atletas/<%=(Rs_atleta.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                      <th width="10" scope="col"><img src="retalhos/dir_atl2.gif" width="11" height="100"></th>
                    </tr>
                    <tr>
                      <th height="12" colspan="3" scope="col"><img src="retalhos/base_atl2.gif" width="87" height="12"></th>
                    </tr>
                </table></th>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></span></td>
              </tr>
            </table></th>
          </tr>
        </table>
          <br>
          <div align="right"></div>
          <div align="center" class="atleta"><a href="atletas.asp" class="style57">Mais atletas</a></div></td>
        </tr>
      <tr>
        <td height="31" bgcolor="#D65501"><p><img src="retalhos/g_fotos.jpg" width="288" height="31"></p>          </td>
        <td width="13" align="center" valign="top" bgcolor="#D65501">&nbsp;</td>
        <td width="309" bgcolor="#D65501"><div align="right"><img src="retalhos/g_festas.jpg" width="288" height="31"></div></td>
      </tr>
      <tr>
     <td bgcolor="#D65501"><table width="288" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF00FF">
          <tr>
            <th width="142" align="center" valign="top" bgcolor="#D65501" scope="col"><table width="109" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="3"><img src="retalhos/g1_topo.gif" width="131" height="18"></td>
                </tr>
                <tr>
                  <td width="20"><img src="retalhos/g1_esq.gif" width="20" height="75"></td>
                  <td width="100" background="fotos/galeria/<%=(RsGaleria.Fields.Item("Foto").Value)%>">&nbsp;</td>
                  <td width="11"><img src="retalhos/g1_dir.gif" width="11" height="75"></td>
                </tr>
                <tr>
                  <td colspan="3"><img src="retalhos/g1_base.gif" width="131" height="14"></td>
                </tr>
              </table>              </th>
        <% RsGaleria.MoveNext() %>       <th width="142" valign="middle" bgcolor="#D65501" scope="col"><table width="110" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="3"><img src="retalhos/g1_topo.gif" width="131" height="18"></td>
              </tr>
              <tr>
                <td width="20"><img src="retalhos/g1_esq.gif" width="20" height="75"></td>
                 <td width="101" background="fotos/galeria/<%=(RsGaleria.Fields.Item("Foto").Value)%>">&nbsp;</td>
                <td width="11"><img src="retalhos/g1_dir.gif" width="11" height="75"></td>
              </tr>
              <tr>
                <td colspan="3"><img src="retalhos/g1_base.gif" width="131" height="14"></td>
              </tr>
            </table></th>
          </tr>
          <tr>
             <th align="center" valign="middle" bgcolor="#D65501" scope="col"><p><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria01.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"><%=(RsGaleria01.Fields.Item("Titulo").Value)%></a></p>   
	            </th>
   	  <th width="142" valign="middle" bgcolor="#D65501" scope="col"><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"></a><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"><%=(RsGaleria.Fields.Item("Titulo").Value)%></a> </th>
          </tr>
        </table></td>
        <td width="13" align="center" valign="top" bgcolor="#D65501">&nbsp;</td>
        <td height="125" valign="top" bordercolor="#D65501" bgcolor="#D65501"><table width="309" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="144" height="123" align="right"><table width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="brd">
              <tr>
                <td width="150" height="120" colspan="3" align="center" valign="middle"><p><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><img src="festa/fotos/<%=(RsAlbum.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" class="brd"></a><br>
                </p>                  </td>
              </tr>
              <tr>
                <td height="22" colspan="3" valign="top"><p align="center">&nbsp;<span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></p>                  </td>
              </tr>
            </table></td>
			
            <td width="165" align="right" valign="top"><table width="156" height="132" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="156" height="12" valign="top" class="style12 style14"> + mais festas </td>
                </tr><br>
<% RsAlbum.MoveNext() %> 
                <tr>
				
                  <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                </tr>
        <% RsAlbum.MoveNext() %>    <tr>
                  <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                </tr>
       <% RsAlbum.MoveNext() %>         <tr>
				
                  <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
            </tr>
     <% RsAlbum.MoveNext() %>             <tr>
                  <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
             </tr>
      <% RsAlbum.MoveNext() %>            <tr>
				
                  <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
             </tr>
                <tr>
				
                  <td height="20" align="center" valign="middle"><p class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a></p>
                    <p class="style14">&nbsp;</p></td>
                </tr>
              </table>              </td>
          </tr>
        </table></td>
        </tr>
		 
      <tr>
        <td bgcolor="#D65501"><img src="retalhos/linha.gif" width="282" height="6"></td>
        <td width="13" align="center" valign="top" bgcolor="#D65501">&nbsp;</td>
        <td bordercolor="#D65501" bgcolor="#D65501"><img src="retalhos/linha.gif" width="282" height="6"></td>
      </tr>
      <tr>
        <td colspan="5">
          <table width="779" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="349"><img src="retalhos/base01.gif" width="349" height="49"></td>
              <td width="263"><img src="retalhos/base02.gif" width="263" height="49"></td>
              <td width="21" background="retalhos/base3.gif">&nbsp;</td>
              <td width="145"><img src="retalhos/base04.gif" width="145" height="49"></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center"></div>
</body>
</html>
<%
RsAlbum.Close()
Set RsAlbum = Nothing
%>
<%
RsGaleria.Close()
Set RsGaleria = Nothing
%>
<%
RsGaleria01.Close()
Set RsGaleria01 = Nothing
%>
<%
Record_foto_semana.Close()
Set Record_foto_semana = Nothing
%>
<%
Rs_atleta.Close()
Set Rs_atleta = Nothing
%>
<%
RsNot.Close()
Set RsNot = Nothing
%>
