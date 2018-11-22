<%@LANGUAGE="VBSCRIPT"%>

<!--#include file="Connections/conex.asp" -->
<%
Dim Rs_agenda
Dim Rs_agenda_numRows

Set Rs_agenda = Server.CreateObject("ADODB.Recordset")
Rs_agenda.ActiveConnection = MM_conex_STRING
Rs_agenda.Source = "SELECT * FROM projetos ORDER BY CodNoticia DESC"
Rs_agenda.CursorType = 0
Rs_agenda.CursorLocation = 2
Rs_agenda.LockType = 1
Rs_agenda.Open()

Rs_agenda_numRows = 0
%>
<%
Dim Rs_eventos
Dim Rs_eventos_numRows

Set Rs_eventos = Server.CreateObject("ADODB.Recordset")
Rs_eventos.ActiveConnection = MM_conex_STRING
Rs_eventos.Source = "SELECT * FROM Albuns ORDER BY cod DESC"
Rs_eventos.CursorType = 0
Rs_eventos.CursorLocation = 2
Rs_eventos.LockType = 1
Rs_eventos.Open()

Rs_eventos_numRows = 0
%>
<%
Dim Rs_novidades
Dim Rs_novidades_numRows

Set Rs_novidades = Server.CreateObject("ADODB.Recordset")
Rs_novidades.ActiveConnection = MM_conex_STRING
Rs_novidades.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
Rs_novidades.CursorType = 0
Rs_novidades.CursorLocation = 2
Rs_novidades.LockType = 1
Rs_novidades.Open()

Rs_novidades_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 3
Repeat1__index = 0
Rs_novidades_numRows = Rs_novidades_numRows + Repeat1__numRows
%>
<%
Dim Repeat2__numRows
Dim Repeat2__index

Repeat2__numRows = 2
Repeat2__index = 0
Rs_agenda_numRows = Rs_agenda_numRows + Repeat2__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<script>

// Criado por Victor e Dedé...
// http://www.saquabb.com.br
// Daniel.. vai se fuder...!!

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
<title>ItaguaiOnline.com.br</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 10px;
	color: #000000;
}
.style3 {color: #FFFFFF}
.style4 {font-size: 9px}
.style5 {font-size: 5px}
.style9 {font-size: 9px; color: #FFFFFF; }
.style10 {color: #FF0000}
.brdnoticia2 {border: 1px solid #ffffff;}
.brdnoticia {border: 1px solid #000000;}
.style7 {font-size: 10px}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style13 {font-size: 9px; color: #666666; }
.style15 {color: #FFFFFF; font-size: 14px; }
.style16 {color: #000000}
.style18 {font-size: 9px; color: #000000; }
.style19 {font-size: 9px; color: #FF0000; }
-->
</style></head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="779" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="817" scope="col"><table width="772" border="0" cellspacing="0" cellpadding="0">
      <tr align="left">
        <th colspan="4" scope="col"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="779" height="162">
          <param name="movie" value="flash/topo.swf">
          <param name="quality" value="high">
          <embed src="flash/topo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="779" height="162"></embed>
        </object></th>
        </tr>
      <tr align="left" valign="baseline">
        <td height="39" colspan="4"><img src="imagens_retalhos/menu.jpg" width="779" height="39"></td>
        </tr>
      <tr>
        <td width="188" height="727" align="center" valign="top" bgcolor="#E9E9E9"><table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="col"><table width="200" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col"><img src="imagens_retalhos/fale_conosco.jpg" width="204" height="33"></th>
              </tr>
              <tr>
                <td align="center" valign="top" background="imagens_retalhos/fale_conosco_fundo.jpg"><table width="190" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th scope="col"><iframe name="coments" width="190" height="150" frameborder="no" src="mural/sframe.asp"></iframe>&nbsp;</th>
                    </tr>
                  </table>
                  <a href="javascript:MM_openBrWindow('mural/comentar.htm','Comentar','scrollbars=1','400','400','true')"><img src="imagens_retalhos/comentar.jpg" width="100" height="20" border="0"></a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><img src="imagens_retalhos/fale_conosco_base.jpg" width="204" height="10"></td>
              </tr>
            </table></th>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="331" align="left" valign="top"><table width="330" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="col"><table width="331" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
              <tr>
                <th width="327" align="right" background="images/fundo_destaque.jpg" scope="col"><table width="315" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="276" align="left" scope="col"><img src="imagens_retalhos/destaque.jpg" width="157" height="29"></th>
                    <th width="39" align="right" scope="col"><img src="images/lado_destaque.jpg" width="39" height="39"></th>
                  </tr>
                </table></th>
              </tr>
              <tr>
                <th scope="col"><img src=fotos/slide/slide01.jpg name=PictureBox width=327 height=160><br>
<script>runSlideShow()</script>				</th>
              </tr>
              <tr>
                <th height="52" align="center" valign="middle" bgcolor="#999999" scope="col"><table width="300" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th height="23" align="center" valign="top" scope="col"><span class="style15"><%=(Rs_eventos.Fields.Item("nome").Value)%></span></th>
                    </tr>
                    <tr>
                      <td><div align="center"><a href="javascript:MM_openBrWindow('eventos/galerias_de_fotos/?Cod=<%=(Rs_eventos.Fields.Item("cod").Value)%>','Saquabb','','650','450','true')"><img src="imagens_retalhos/ver_fotos.jpg" width="80" height="18" border="0"></a></div></td>
                    </tr>
                  </table>                  </th>
              </tr>
            </table></th>
          </tr>
          <tr>
            <th height="36" align="right" scope="col"><table width="331" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
              <tr>
                <th width="331" height="49" align="center" scope="col"><table width="300" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col"><img src="imagens_retalhos/ultimos_eventos.jpg" width="331" height="49"></th>
                  </tr>
                </table></th>
                </tr>
              <tr>
                <th height="147" align="center" valign="middle" background="imagens_retalhos/ultimos_eventos_fundo.jpg" bgcolor="#FFCC00" scope="col"><table width="300" border="0" cellspacing="0" cellpadding="0">
               <% Rs_eventos.MoveNext() %>      <tr>
                    <th height="92" align="center" valign="middle" scope="col"><table width="90" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                        <tr>
                          <th height="77" align="center" valign="middle" scope="col"><p><span class="style7"><img src="eventos/fotos/<%=(Rs_eventos.Fields.Item("thumb").Value)%>" width="80" height="60" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></p>                            </th>
                        </tr>
                        <tr>
                          <td align="center" valign="top" class="style1"><span class="style18"><a href="javascript:MM_openBrWindow('eventos/galerias_de_fotos/?Cod=<%=(Rs_eventos.Fields.Item("cod").Value)%>','Saquabb','','650','450','true')" class="style18"><%=(Rs_eventos.Fields.Item("nome").Value)%></a></span></td>
                        </tr>
                      </table>                      </th>
                  <% Rs_eventos.MoveNext() %>   <th align="center" valign="middle" scope="col"><table width="90" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <th height="77" align="center" valign="middle" scope="col"><p><span class="style7"><img src="eventos/fotos/<%=(Rs_eventos.Fields.Item("thumb").Value)%>" width="80" height="60" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></p></th>
                      </tr>
                      <tr>
                        <td align="center" valign="top" class="style1"><div align="center" class="style4"><a href="javascript:MM_openBrWindow('eventos/galerias_de_fotos/?Cod=<%=(Rs_eventos.Fields.Item("cod").Value)%>','Saquabb','','650','450','true')" class="style9 style16"><%=(Rs_eventos.Fields.Item("nome").Value)%></a></div></td>
                      </tr>
                    </table>                      </th>
                   <th align="center" valign="middle" scope="col"><table width="90" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <th height="77" align="center" valign="middle" scope="col"><p><span class="style7"><img src="eventos/fotos/<%=(Rs_eventos.Fields.Item("thumb").Value)%>" width="80" height="60" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></p></th>
                      </tr>
                      <tr>
                        <td align="center" valign="top" class="style1"><div align="center" class="style4"><a href="javascript:MM_openBrWindow('eventos/galerias_de_fotos/?Cod=<%=(Rs_eventos.Fields.Item("cod").Value)%>','Saquabb','','650','450','true')" class="style9 style16"><%=(Rs_eventos.Fields.Item("nome").Value)%></a></div></td>
                      </tr>
                    </table></th>
                  </tr>
                </table>                                    <div align="center">
                  <table width="100" height="25" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th height="19" align="center" valign="middle" scope="col"><span class="style1"> <img src="imagens_retalhos/mais_eventos.jpg" width="74" height="19"></span></th>
                    </tr>
                  </table>
                </div></th>
              </tr>
              <tr>
                <th height="7" align="center" valign="top" scope="col"><img src="imagens_retalhos/ultimos_eventos_base.jpg" width="331" height="7"></th>
              </tr>
            </table></th>
          </tr>
          <tr>
            <th height="112" align="center" valign="top" scope="col"><table width="331" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col"><img src="imagens_retalhos/novidades.jpg" width="331" height="47"></th>
              </tr>
              <tr>
                <th background="imagens_retalhos/novidades_fundo.jpg" scope="col">
                  <% 
While ((Repeat1__numRows <> 0) AND (NOT Rs_novidades.EOF)) 
%>
                  <table width="311" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th width="89" height="56" align="left" valign="top" scope="col"><table width="87" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th width="18" height="14" align="left" scope="col"><img src="imagens_retalhos/seta_azul.gif" width="15" height="12"></th>
                            <th width="69" class="style1 style3" scope="col"><div align="left" class="style9"><%=(Rs_novidades.Fields.Item("titulo").Value)%></div></th>
                          </tr>
                        </table></th>
                        <th width="68" align="left" valign="middle" scope="col"><div align="left"><span class="style7"><img src="fotos/<%=(Rs_novidades.Fields.Item("foto").Value)%>" width="60" height="45" border="1" align="middle" class="brdnoticia2" bordercolor="#000000"></span></div></th>
                        <th width="200" align="center" valign="middle" class="style3 style4" scope="col"><a href="javascript:MM_openBrWindow('ver_nov.asp?CodNot=<%=(Rs_novidades.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')" class="style3"><%=(Rs_novidades.Fields.Item("resumo").Value)%></a></th>
                    </tr>
                    <tr>
                        <th height="7" colspan="3" align="left" valign="top" scope="col">
                            <table width="312" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <th align="center" valign="top" class="style3 style5" scope="col">----------------------------------------------------------------------------------------------------------------------------------------------------------</th>
                            </tr>
                        </table></th>
                    </tr>
                  </table>
                  <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  Rs_novidades.MoveNext()
Wend
%>                  <p>&nbsp;</p>
                  </th>
              </tr>
              <tr>
                <th align="center" valign="top" scope="col"><img src="imagens_retalhos/novidades_base.jpg" width="331" height="8"></th>
              </tr>
            </table></th>
          </tr>
        </table>
          <p class="style9">&nbsp;</p>
          <p><br class="style7">
          </p></td>
        <td width="253" align="right" valign="top" bgcolor="#5CC7D7"><table width="236" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th align="center" valign="middle" scope="col"><div align="center"><img src="imagens_retalhos/agenda.jpg" width="116" height="29"></div></th>
            <th width="109" align="right" valign="top" scope="col"><img src="imagens_retalhos/agenda_lado.jpg" width="45" height="46"></th>
          </tr>
          <tr>
            <td height="92" colspan="2" align="center" valign="middle">
              <% 
While ((Repeat2__numRows <> 0) AND (NOT Rs_agenda.EOF)) 
%>
              <table width="228" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th width="228" height="21" valign="middle" class="style9" scope="col"><%=(Rs_agenda.Fields.Item("titulo").Value)%><span class="style9"> - </span><%=(Rs_agenda.Fields.Item("resumo").Value)%></th>
                </tr>
                <tr>
                    <td align="center" valign="middle"><span class="style7"><img src="fotos/flyer/<%=(Rs_agenda.Fields.Item("foto").Value)%>" width="120" height="90" border="1" align="middle" class="brdnoticia2" bordercolor="#000000"></span></td>
                </tr>
                <tr>
                    <td height="17" align="center" valign="middle" class="style9"><div align="center"><a href="javascript:MM_openBrWindow('ver_flyer.asp?CodNot=<%=(Rs_agenda.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')" class="style9">Saiba Mais </a></div></td>
                </tr>
                <tr>
                    <td height="17" align="center" valign="top" class="style9"><div align="center" class="style5">------------------------------------------------------------------------------------------------------------------</div></td>
                </tr>
              </table>
              <% 
  Repeat2__index=Repeat2__index+1
  Repeat2__numRows=Repeat2__numRows-1
  Rs_agenda.MoveNext()
Wend
%></td>
          </tr>
          <tr align="left" valign="middle">
            <td colspan="2"><div align="left"><span class="style9"><img src="imagens_retalhos/publicidade.jpg" width="162" height="29"></span></div></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle"><table width="100" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col">&nbsp;</th>
              </tr>
              <tr>
                <td><span class="style9"><img src="imagens_retalhos/prop.jpg" width="174" height="351"></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
              <div align="center"></div></td>
          </tr>
        </table></td>
        <td width="11" align="center" valign="top" background="imagens_retalhos/barra_direita.gif" bgcolor="#5CC7D7">&nbsp;</td>
      </tr>
      <tr align="center" valign="top" bgcolor="#5CC7D7">
        <td height="40" colspan="4"><table width="779" height="73" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th background="imagens_retalhos/fundo_final.jpg" scope="col"><table width="367" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="367" class="style4 style10" scope="col"><span class="style19">PRINCIPAL | QUEM SOMOS | EVENTOS | CONTATO | PUBLICIDADE </span></th>
              </tr>
            </table></th>
          </tr>
        </table></td>
      </tr>
      <tr align="center" valign="middle" bgcolor="#5CC7D7">
        <td height="40" colspan="4"><table width="764" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="389" align="left" class="style9" scope="col"><span class="style9">Todos os direitos reservados &reg; - ItaguaiOnline.com.br 2005 </span></th>
            <th width="375" align="right" class="style9" scope="col"><table width="255" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th width="85" align="right" scope="col"><span class="style9">Criado por : </span></th>
                  <th width="170" scope="col"><table width="155" height="15" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th width="24" height="15" bgcolor="#CC0000" scope="col">&nbsp;</th>
                      <th width="131" height="20" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><span class="style13">XpressionDesign.com.br</span></th>
                    </tr>
                  </table></th>
                </tr>
              </table></th>
          </tr>
        </table></td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<%
Rs_agenda.Close()
Set Rs_agenda = Nothing
%>
<%
Rs_eventos.Close()
Set Rs_eventos = Nothing
%>
<%
Rs_novidades.Close()
Set Rs_novidades = Nothing
%>
