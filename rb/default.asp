<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/con_kiuchi.asp" -->
<%
Dim agenda
Dim agenda_numRows

Set agenda = Server.CreateObject("ADODB.Recordset")
agenda.ActiveConnection = MM_con_kiuchi_STRING
agenda.Source = "SELECT * FROM agenda ORDER BY CodNoticia DESC"
agenda.CursorType = 0
agenda.CursorLocation = 2
agenda.LockType = 1
agenda.Open()

agenda_numRows = 0
%>
<%
Dim noticia
Dim noticia_numRows

Set noticia = Server.CreateObject("ADODB.Recordset")
noticia.ActiveConnection = MM_con_kiuchi_STRING
noticia.Source = "SELECT * FROM noticia ORDER BY CodNoticia DESC"
noticia.CursorType = 0
noticia.CursorLocation = 2
noticia.LockType = 1
noticia.Open()

noticia_numRows = 0
%>
<%
Dim evento
Dim evento_numRows

Set evento = Server.CreateObject("ADODB.Recordset")
evento.ActiveConnection = MM_con_kiuchi_STRING
evento.Source = "SELECT * FROM Galerias ORDER BY Cod DESC"
evento.CursorType = 0
evento.CursorLocation = 2
evento.LockType = 1
evento.Open()

evento_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 3
Repeat1__index = 0
agenda_numRows = agenda_numRows + Repeat1__numRows
%>
<%
Dim Repeat2__numRows
Dim Repeat2__index

Repeat2__numRows = 3
Repeat2__index = 0
noticia_numRows = noticia_numRows + Repeat2__numRows
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
}.brd_foto {border: 1px solid #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image:  url(http://www.kiuchiimobiliaria.com.br/imagens/fundo.gif);
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
.style8 {color: #000000; font-weight: bold; }
.style15 {color: #CC0000; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
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
.style27 {font-size: 12px}
.style29 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #666666; }
.style31 {font-family: "Courier New", Courier, mono}
.style32 {color: #000000}
.style35 {font-size: 9px}
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
              <th height="60" colspan="2" scope="col"><img src="http://www.kiuchiimobiliaria.com.br/imagens/topo.jpg" width="716" height="161" border="0"></th>
            </tr>
            <tr>
              <th height="694" colspan="2" align="center" valign="top" scope="col"><table width="716" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="190" height="499" align="center" valign="top" scope="col"><table width="185" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                        <tr>
                          <th width="26" height="19" align="right" scope="col"><img src="../imagens/quadrado.gif" width="19" height="17"></th>
                          <th width="159" align="left" scope="col"><div align="left"><span class="style21"><a href="../default.asp" class="fonte">Principal</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <th height="19" align="right" scope="col"><img src="../imagens/quadrado.gif" width="19" height="17"></th>
                          <th align="left" scope="col"><div align="left"><span class="style19"><a href="../casas.asp" class="fonte">Eventos</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <td align="right"><img src="../imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="../apartamentos.asp" class="fonte">Agenda</a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="../imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="../cidade.asp" class="fonte">Sobre a Cidade</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="../imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="../pontos_turisticos.asp" class="fonte">Pontos Tur&iacute;sticos </a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="../imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"> <a href="../empresa.asp" class="fonte">A Empresa</a> </div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="../imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="../contato.asp" class="fonte">Fale Conosco</a></div></td>
                        </tr>
                      </table>
                        <br>
                        <table width="185" height="280" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                          <tr>
                            <th height="278" bgcolor="efefef" scope="col"><table width="180" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th scope="col">Agenda</th>
                                </tr>
                                <tr>
                                  <th height="218" align="center" valign="top" scope="col">
                                    <% 
While ((Repeat1__numRows <> 0) AND (NOT agenda.EOF)) 
%>
                                    <table width="180" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <th scope="col">------------------------------------</th>
                                      </tr>
                                      <tr>
                                        <th scope="col"><span class="style2"><img src="fotos/agenda/<%=(agenda.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                      </tr>
                                      <tr>
                                        <th height="35" scope="col"><span class="style17"><span class="style35"><%=(agenda.Fields.Item("resumo").Value)%> - <%=(agenda.Fields.Item("data").Value)%></span><br>
                                        </span><span class="style21"><a href="javascript:abrir_janela('ver_agenda.asp?CodNot=<%=(agenda.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                      </tr>
                                    </table>
                                  <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  agenda.MoveNext()
Wend
%></th>
                                </tr>
                            </table></th>
                          </tr>
                      </table></th>
                    <th width="526" align="right" valign="top" bgcolor="#FFFFFF" scope="col"><table width="518" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th height="249" align="center" valign="top" bgcolor="#e8ebe0" scope="col"><table height="38" border="0" align="right" cellpadding="0" cellspacing="0">
                                <tr>
                                  <th width="535" height="19" align="center" valign="top" bgcolor="#FFFFFF" class="style19" scope="col"><img src="imagens/topo.jpg" width="535" height="80"></th>
                                </tr>
                                <tr>
                                  <th height="19" align="center" valign="top" bgcolor="#FFFFFF" class="style19" scope="col"><table width="530" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <th height="51" background="imagens/retalho/fundo_fotos_r1_c1.jpg" scope="col">&nbsp;</th>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle" background="imagens/retalho/fundo_fotos_r3_c1.jpg"><table width="500" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <th width="236" align="center" valign="middle" scope="col"><table width="200" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <th height="109" valign="bottom" scope="col"><span class="style2"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')"><img src="fotos/galeria/<%=(evento.Fields.Item("Foto").Value)%>" width="140" height="105" border="1" align="middle" class="brd_foto" bordercolor="#000000"></a></span></th>
                                              </tr>
                                              <tr>
                                                <td height="18" valign="bottom"><div align="center"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style29"><%=(evento.Fields.Item("Titulo").Value)%></a></div></td>
                                              </tr>
                                          </table></th>
                                          <th width="264" align="center" valign="middle" scope="col"><table width="272" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <th width="82" height="64" align="center" scope="col"><span class="style2"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')"><img src="fotos/galeria/<%=(evento.Fields.Item("Foto").Value)%>" width="70" height="53" border="1" align="middle" class="brd_foto" bordercolor="#000000"></a></span></th>
                                                <th width="190" scope="col"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style29"><%=(evento.Fields.Item("Titulo").Value)%></a></th>
                                              </tr>
                                              <tr>
                                                <td align="center"><span class="style2"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')"><img src="fotos/galeria/<%=(evento.Fields.Item("Foto").Value)%>" width="70" height="53" border="1" align="middle" class="brd_foto" bordercolor="#000000"></a></span></td>
                                                <td><div align="center"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style29"><%=(evento.Fields.Item("Titulo").Value)%></a></div></td>
                                              </tr>
                                              <tr>
                                                <td align="center">&nbsp;</td>
                                                <td><div align="right" class="style32">Arquivo</div></td>
                                              </tr>
                                          </table></th>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="22" background="imagens/retalho/fundo_fotos_r5_c1.jpg">&nbsp;</td>
                                    </tr>
                                  </table></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                        <span class="style15"><br>
                        </span>
                        <table width="533" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th width="533" height="19" align="center" valign="top" bgcolor="#CC0000" class="style19" scope="col"><div align="left">
                                <table width="131" height="27" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <th width="131" scope="col">NOVIDADES</th>
                                  </tr>
                                </table>
                            </div></th>
                          </tr>
                          <tr>
                            <th height="248" align="center" valign="top" bgcolor="#E8EBE2" scope="col"><br>
                                <% 
While ((Repeat2__numRows <> 0) AND (NOT noticia.EOF)) 
%>
                                <table width="510" border="0" align="center" cellpadding="0" cellspacing="0" background="imagens/fundo_not.jpg">
                                  <tr align="left" valign="middle" bgcolor="#17859E">
                                    <th height="10" colspan="2" class="style19" scope="col"><div align="left"></div>
                                        <table width="483" height="18" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <th width="18" scope="col">&nbsp; </th>
                                            <th width="465" scope="col"><div align="left"><span class="style31">&gt;&gt;</span> <span class="style19"><%=(noticia.Fields.Item("titulo").Value)%> - <%=(noticia.Fields.Item("data").Value)%></span></div></th>
                                          </tr>
                                      </table></th>
                                  </tr>
                                  <tr align="left" valign="middle">
                                    <th height="11" colspan="2" class="style19" scope="col">&nbsp;</th>
                                  </tr>
                                  <tr>
                                    <td width="190"><span class="style2"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(noticia.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')"><img src="fotos/noticia/<%=(noticia.Fields.Item("foto").Value)%>" width="120" height="90" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></a></span></td>
                                    <td width="320" align="center" valign="middle" class="style15 style27"><div align="left">
                                      <table width="303" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <th width="303" scope="col"><span class="style29"><%=(noticia.Fields.Item("resumo").Value)%></span></th>
                                        </tr>
                                        <tr>
                                          <td><div align="right" class="style15">
                                            <p>&nbsp;</p>
                                            <p><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(noticia.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">... Leia Mais </a></p>
                                          </div></td>
                                        </tr>
                                      </table>
</div>                                      
                                      <div align="center"></div>
                                    <div align="center"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" class="style15">---------------------------------------------------------------------------------------------------</td>
                                  </tr>
                                </table>
                            <% 
  Repeat2__index=Repeat2__index+1
  Repeat2__numRows=Repeat2__numRows-1
  noticia.MoveNext()
Wend
%></th>
                          </tr>
                          <tr>
                            <th scope="col">&nbsp;</th>
                          </tr>
                        </table>
                      <span class="style15">                        </span></th>
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
agenda.Close()
Set agenda = Nothing
%>
<%
noticia.Close()
Set noticia = Nothing
%>
<%
evento.Close()
Set evento = Nothing
%>
