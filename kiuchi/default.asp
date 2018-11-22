<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/conex2.asp" -->
<%
Dim Rs_casa
Dim Rs_casa_numRows
Dim C
Set Rs_casa = Server.CreateObject("ADODB.Recordset")
Rs_casa.ActiveConnection = MM_conex2_STRING
Randomize
C=clng(1E6*rnd) 
Rs_casa.Source = "SELECT * FROM casa ORDER BY rnd(-(1000*Codnoticia)* " & C & ")"
Rs_casa.CursorType = 0
Rs_casa.CursorLocation = 2
Rs_casa.LockType = 1
Rs_casa.Open()

Rs_casa_numRows = 0
%>
<%
Dim Rs_apt
Dim Rs_apt_numRows
Dim A
Set Rs_apt = Server.CreateObject("ADODB.Recordset")
Rs_apt.ActiveConnection = MM_conex2_STRING
Randomize
A=clng(1E6*rnd)
Rs_apt.Source = "SELECT * FROM apt ORDER BY rnd(-(1000*Codnoticia)* " & A & ")"
Rs_apt.CursorType = 0
Rs_apt.CursorLocation = 2
Rs_apt.LockType = 1
Rs_apt.Open()

Rs_apt_numRows = 0
%>
<%
Dim Rs_loja
Dim Rs_loja_numRows
Dim L
Set Rs_loja = Server.CreateObject("ADODB.Recordset")
Rs_loja.ActiveConnection = MM_conex2_STRING
Randomize
L=clng(1E6*rnd)
Rs_loja.Source = "SELECT * FROM loja ORDER BY rnd(-(1000*Codnoticia)* " & L & ")"
Rs_loja.CursorType = 0
Rs_loja.CursorLocation = 2
Rs_loja.LockType = 1
Rs_loja.Open()

Rs_loja_numRows = 0
%>
<%
Dim Rs_terreno
Dim Rs_terreno_numRows
Dim T
Set Rs_terreno = Server.CreateObject("ADODB.Recordset")
Rs_terreno.ActiveConnection = MM_conex2_STRING
Randomize
T=clng(1E6*rnd) 
Rs_terreno.Source = "SELECT * FROM terreno ORDER BY rnd(-(1000*Codnoticia)* " & T & ")"
Rs_terreno.CursorType = 0
Rs_terreno.CursorLocation = 2
Rs_terreno.LockType = 1
Rs_terreno.Open()

Rs_terreno_numRows = 0
%>
<%
Dim Rs_sitio
Dim Rs_sitio_numRows

Set Rs_sitio = Server.CreateObject("ADODB.Recordset")
Rs_sitio.ActiveConnection = MM_conex2_STRING
Rs_sitio.Source = "SELECT * FROM sitio"
Rs_sitio.CursorType = 0
Rs_sitio.CursorLocation = 2
Rs_sitio.LockType = 1
Rs_sitio.Open()

Rs_sitio_numRows = 0
%>
<%
Dim Rs_oferta
Dim Rs_oferta_numRows

Set Rs_oferta = Server.CreateObject("ADODB.Recordset")
Rs_oferta.ActiveConnection = MM_conex2_STRING
Rs_oferta.Source = "SELECT * FROM spc ORDER BY codnoticia DESC"
Rs_oferta.CursorType = 0
Rs_oferta.CursorLocation = 2
Rs_oferta.LockType = 1
Rs_oferta.Open()

Rs_oferta_numRows = 0
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<script>

// KIUCHI IMOBILIARIA SUA MELHOR OPÇÃO!!!

// ==============================
// Set the following variables...
// ==============================

// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 4000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 3;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

// ESPECIFIQUE SUAS IMAGENS NOS NOMES ABAIXO
// Specify the image files...
// To add more images, just continue
// the pattern, adding to the array below.
// To use fewer images, remove lines
// starting at the end of the Picture array.
// Caution: The number of Pictures *must*
// equal the number of Captions!

Picture[1]  = 'fotos/slide/slide01.jpg';
Picture[2]  = 'fotos/slide/slide02.jpg';
Picture[3]  = 'fotos/slide/slide03.jpg';

var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}

</script>
<head>
<title>:: kiuchi Imobili&aacute;ria ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.brd_menu {	border: 1px solid #e5e5e5;
}.brd_foto {	border: 1px solid #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(imagens/fundo.gif);
}
.linha_tracejada {
	font-size: 9px;
	color: #CCCCCC;
}
.fonte {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #666666;
}
.style2 {color: #FFFFFF}
.style3 {
	font-size: 10px;
	color: #000000;
}
.style5 {color: #993300}
.style8 {color: #000000; font-weight: bold; }
.style13 {
	color: #000000;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style15 {color: #CC0000; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style16 {color: #CC0000}
.style17 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
}
.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FFFFFF; }
.style21 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; color: #FFFFFF; }
.brdnoticia {border: 1px solid #000000;}
.style26 {color: #000000}
-->
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="716" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="736" scope="col"><table width="716" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="916" height="901" align="center" valign="top" scope="col"><table width="716" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <th height="60" colspan="2" scope="col"><img src="imagens/topo.jpg" width="716" height="161" border="0"></th>
            </tr>
            <tr>
              <th height="694" colspan="2" align="center" valign="top" scope="col"><table width="716" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="190" height="499" align="center" valign="top" scope="col"><table width="185" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                        <tr>
                          <th width="26" height="19" align="right" scope="col"><img src="imagens/quadrado.gif" width="19" height="17"></th>
                          <th width="159" align="left" scope="col"><div align="left"><span class="style21"><a href="default.asp" class="fonte">Principal</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <th height="19" align="right" scope="col"><img src="imagens/quadrado.gif" width="19" height="17"></th>
                          <th align="left" scope="col"><div align="left"><span class="style19"><a href="casas.asp" class="fonte">Casas</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="apartamentos.asp" class="fonte">Apartamentos</a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="lojas.asp" class="fonte">Lojas</a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="sitios_fazendas.asp" class="fonte">S&iacute;tios e Fazendas</a> </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="terrenos.asp" class="fonte">Terrenos</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="sala.asp" class="fonte">Salas</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="cidade.asp" class="fonte">Sobre a Cidade</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="pontos_turisticos.asp" class="fonte">Pontos Tur&iacute;sticos </a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"> <a href="empresa.asp" class="fonte">A Empresa</a> </div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="contato.asp" class="fonte">Fale Conosco</a></div></td>
                        </tr>
                      </table>
                        <br>
                        <table width="185" height="120" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                          <tr>
                            <th height="118" bgcolor="efefef" scope="col"><table width="180" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th scope="col">Mais Ofertas!</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style15">Casas</span></th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/casa/<%=(Rs_casa.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" class="style17" scope="col"><a href="javascript:MM_openBrWindow('ver_casa.asp?CodNot=<%=(Rs_casa.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style13"><%=(Rs_casa.Fields.Item("resumo").Value)%></a><br>
                                  <span class="style15"><a href="javascript:MM_openBrWindow('ver_casa.asp?CodNot=<%=(Rs_casa.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Apartamentos</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/apt/<%=(Rs_apt.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_apt.Fields.Item("resumo").Value)%><br>
</span><span class="style21"><a href="javascript:MM_openBrWindow('ver_apt.asp?CodNot=<%=(Rs_apt.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Lojas</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/loja/<%=(Rs_loja.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_loja.Fields.Item("resumo").Value)%> <br>
                                  </span><span class="style5"><a href="javascript:MM_openBrWindow('ver_loja.asp?CodNot=<%=(Rs_loja.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a></span> </th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Terrenos</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/terreno/<%=(Rs_terreno.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_terreno.Fields.Item("resumo").Value)%><br>
                                  </span><span class="style21"><a href="javascript:MM_openBrWindow('ver_terreno.asp?CodNot=<%=(Rs_terreno.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                </tr>
                            </table></th>
                          </tr>
                      </table></th>
                    <th width="526" align="left" valign="top" scope="col"><table width="518" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                        <tr>
                          <th width="537" height="115" valign="bottom" scope="col"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="518" height="121">
                            <param name="movie" value="../imagens/banner.swf">
                            <param name="quality" value="high">
                            <embed src="../imagens/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="518" height="121"></embed>
                          </object></th>
                        </tr>
                      </table>
                        <table width="518" height="21" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                          <tr>
                            <th width="539" height="21" align="center" valign="middle" bgcolor="#17859e" scope="col"><table width="496" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th width="496" height="17" class="fonte style2" scope="col"><div align="left">Novidades</div></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                        <table width="518" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th height="249" align="center" valign="top" bgcolor="#e8ebe0" scope="col"><table width="516" height="248" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <th height="248" align="center" valign="middle" scope="col"><table width="320" height="220" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                      <tr>
                                        <th width="320" height="220" align="center" valign="middle" scope="col"><img src=fotos/slide/slide01.jpg name=PictureBox width=300 height=200 class="brd_menu">
                                            <script>runSlideShow()</script></th>
                                      </tr>
                                  </table></th>
                                  <th align="center" valign="top" scope="col"><table width="191" height="214" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <th height="214" scope="col"><table width="184" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <th width="184" scope="col"><span class="style5">Confira!</span></th>
                                            </tr>
                                            <tr>
                                              <th scope="col">&nbsp;</th>
                                            </tr>
                                            <tr>
                                              <th class="fonte style3" scope="col"><div align="center">Casa - <%=(Rs_casa.Fields.Item("resumo").Value)%><br>
                                                      <span class="style5"><a href="javascript:MM_openBrWindow('ver_casa.asp?CodNot=<%=(Rs_casa.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Saiba Mais</a></span></div></th>
                                            </tr>
                                            <tr>
                                              <th scope="col">------------------------------------</th>
                                            </tr>
                                            <tr>
                                              <th scope="col"><span class="fonte style3">Apart. - <%=(Rs_apt.Fields.Item("resumo").Value)%><br>
                                              <span class="style5"><a href="javascript:MM_openBrWindow('ver_apt.asp?CodNot=<%=(Rs_apt.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Saiba Mais</a></span></span></th>
                                            </tr>
                                            <tr>
                                              <th scope="col">------------------------------------</th>
                                            </tr>
                                            <tr>
                                              <th class="fonte style3" scope="col">Loja - <%=(Rs_loja.Fields.Item("resumo").Value)%><br>
                                              <span class="style5"><a href="javascript:MM_openBrWindow('ver_loja.asp?CodNot=<%=(Rs_loja.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Saiba Mais</a></span></th>
                                            </tr>
                                            <tr>
                                              <th scope="col">&nbsp;</th>
                                            </tr>
                                        </table></th>
                                      </tr>
                                  </table>
                                  <br>                                  </th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                        <table width="516" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th height="32" scope="col"><table width="500" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th height="19" scope="col"><div align="left"><span class="style15"><img src="imagens/ofertas.jpg" width="222" height="18"></span></div></th>
                                </tr>
                            </table></th>
                          </tr>
                          <tr>
                            <td height="128" align="center" valign="middle"><table width="500" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <th align="center" valign="middle" scope="col"><div align="center"></div>                                  <table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th height="147" align="center" valign="middle" scope="col"><span class="style15"><img src="fotos/spc/<%=(Rs_oferta.Fields.Item("foto").Value)%>" width="200" height="133" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                 
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Im&oacute;vel: </span><span class="style8"><%=(Rs_oferta.Fields.Item("data").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Categoria : </span><span class="style8"><%=(Rs_oferta.Fields.Item("titulo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13 style16" scope="col"><span class="style15">Descri&ccedil;&atilde;o: </span><span class="style8"><%=(Rs_oferta.Fields.Item("resumo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th height="17" class="style13 style16" scope="col"><p><span class="style15"><a href="javascript:MM_openBrWindow('ver_spc.asp?CodNot=<%=(Rs_oferta.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Mais detalhes </a></span></p></th>
                                  </tr>
                                  <tr>
                                    <th scope="col">&nbsp;</th>
                                  </tr>
                                </table></th>
                                <th align="center" valign="top" scope="col"><% Rs_oferta.MoveNext() %>
                                  <table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th height="147" align="center" valign="middle" scope="col"><span class="style15"><img src="fotos/spc/<%=(Rs_oferta.Fields.Item("foto").Value)%>" width="200" height="133" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                  
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Im&oacute;vel: </span><span class="style8"><%=(Rs_oferta.Fields.Item("data").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Categoria : </span><span class="style8"><%=(Rs_oferta.Fields.Item("titulo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13 style16" scope="col"><span class="style15">Descri&ccedil;&atilde;o: </span><span class="style8"><%=(Rs_oferta.Fields.Item("resumo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th height="17" class="style13 style16" scope="col"><p><span class="style15"><a href="javascript:MM_openBrWindow('ver_spc.asp?CodNot=<%=(Rs_oferta.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Mais detalhes </a></span></p></th>
                                  </tr>
                                  <tr>
                                    <th scope="col">&nbsp;</th>
                                  </tr>
                                </table></th>
                              </tr>
                              <tr class="style2">
                                <th height="17" class="style13 style16" scope="col"><% Rs_oferta.MoveNext() %><table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th height="147" align="center" valign="middle" scope="col"><span class="style15"><img src="fotos/spc/<%=(Rs_oferta.Fields.Item("foto").Value)%>" width="200" height="133" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                    
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Im&oacute;vel: </span><span class="style8"><%=(Rs_oferta.Fields.Item("data").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Categoria : </span><span class="style8"><%=(Rs_oferta.Fields.Item("titulo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13 style16" scope="col"><span class="style15">Descri&ccedil;&atilde;o: </span><span class="style8"><%=(Rs_oferta.Fields.Item("resumo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th height="17" class="style13 style16" scope="col"><p><span class="style15"><a href="javascript:MM_openBrWindow('ver_spc.asp?CodNot=<%=(Rs_oferta.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Mais detalhes </a></span></p></th>
                                  </tr>
                                  <tr>
                                    <th scope="col">&nbsp;</th>
                                  </tr>
                                </table></th>
                                <th height="17" class="style13 style16" scope="col"><% Rs_oferta.MoveNext() %><table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th height="147" align="center" valign="middle" scope="col"><span class="style15"><img src="fotos/spc/<%=(Rs_oferta.Fields.Item("foto").Value)%>" width="200" height="133" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                    
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Im&oacute;vel: </span><span class="style8"><%=(Rs_oferta.Fields.Item("data").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13" scope="col"><span class="style15">Categoria : </span><span class="style8"><%=(Rs_oferta.Fields.Item("titulo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th class="style13 style16" scope="col"><span class="style15">Descri&ccedil;&atilde;o: </span><span class="style8"><%=(Rs_oferta.Fields.Item("resumo").Value)%></span></th>
                                  </tr>
                                  <tr class="style2">
                                    <th height="17" class="style13 style16" scope="col"><p><span class="style15"><a href="javascript:MM_openBrWindow('ver_spc.asp?CodNot=<%=(Rs_oferta.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">Mais detalhes </a></span></p></th>
                                  </tr>
                                  <tr>
                                    <th scope="col">&nbsp;</th>
                                  </tr>
                                </table></th>
                              </tr>
                            </table>
                            </td>
                          </tr>
                        </table>
                        <span class="style15"><br></span></th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th height="27" colspan="2" bgcolor="#17859e" class="style2 style17" scope="col"> Todos Os Direitos Reservados - kiuchi Imobili&aacute;ria - Tel: (21) 2734-2431 <br>
Rua Jo&atilde;o Carmo - 50 - Centro - Rio Bonito - RJ </th>
            </tr>
            <tr>
              <th width="354" height="30" scope="col">
                <div align="center" class="style17"><span class="style15">Desenvolvido por: <a href="http://www.rbprovider.com" class="style8">RbProvider.com</a></span></div></th>
              <th width="382" scope="col"><div align="center" class="style15">WebDesigner:<a href="mailto:victor@saquabb.com.br" target="_blank" class="style8"> Victor Caetano Wardi </a></div></th>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<%
Rs_casa.Close()
Set Rs_casa = Nothing
%>
<%
Rs_apt.Close()
Set Rs_apt = Nothing
%>
<%
Rs_loja.Close()
Set Rs_loja = Nothing
%>
<%
Rs_terreno.Close()
Set Rs_terreno = Nothing
%>
<%
Rs_sitio.Close()
Set Rs_sitio = Nothing
%>
<%
Rs_oferta.Close()
Set Rs_oferta = Nothing
%>
