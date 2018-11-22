<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim RsAlbum
Dim RsAlbum_numRows

Set RsAlbum = Server.CreateObject("ADODB.Recordset")
RsAlbum.ActiveConnection = MM_conSurf_STRING

RsAlbum.Source = "SELECT *  FROM Albuns  ORDER BY Cod DESC"
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
RsGaleria.Source = "SELECT *  FROM Galerias  ORDER BY Cod DESC"
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
RsGaleria01.Source = "SELECT *  FROM Galerias  ORDER BY Cod DESC"
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
Record_foto_semana.Source = "SELECT *  FROM foto_semana  ORDER BY id DESC"
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
Rs_atleta.Source = "SELECT *  FROM atletas  ORDER BY rnd(-(10000*CodNoticia)* " & S & ")"
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
<%
Dim not_principal
Dim not_principal_numRows

Set not_principal = Server.CreateObject("ADODB.Recordset")
not_principal.ActiveConnection = MM_conSurf_STRING
not_principal.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
not_principal.CursorType = 0
not_principal.CursorLocation = 2
not_principal.LockType = 1
not_principal.Open()

not_principal_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 4
Repeat1__index = 0
RsNot_numRows = RsNot_numRows + Repeat1__numRows
%>
<html>
<head>
<title>SAQUABB.com.br - 2006 _________ By Wardesign.com.br _____________________________________________________________________________</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
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
	background-image: url(imagens/fundo.gif);
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
.style23 {font-size: 10px; color: #FF6600; }
.dedo {
	border: 1px solid #000000;
	cursor: hand;
}
.brd {border: 1px solid #000000;
}
.brd_branca {border: 1px solid #ffffff;
}
.style56 {font-size: 10px}
.brd_dir {
	border-top: 1px solid #000000;
	border-right: 1px none #000000;
	border-bottom: 1px solid #000000;
	border-left: 1px none #000000;
}
.style58 {font-weight: bold; font-size: 10px;}
.style59 {color: #000000}
-->
</style>

<script language="JavaScript" src="banco_de_dados/java.js"></script>
</head>

<body>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" class="brd">
  <tr>
    <th scope="col"><table width="99%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <th height="902" align="center" valign="top" scope="col"><table width="779" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th colspan="3" scope="col"><img src="imagens/topo/topo_r1_c1.jpg" width="779" height="17"></th>
            </tr>
          <tr>
            <td width="10" rowspan="2" align="left" valign="top"><img src="imagens/topo/topo_r2_c1.jpg" width="10" height="150"></td>
            <td width="468" height="60" align="left" valign="top"><a href="http://www.wardesign.com.br" target="_blank"><img src="publicidade/saquabb_publicidade.gif" width="468" height="60" border="0"></a></td>
            <td width="301" rowspan="2"><img src="imagens/topo/topo_r2_c3.jpg" width="301" height="150" border="0" usemap="#Map2" href="arquivo.asp"></td>
          </tr>
          <tr>
            <td height="16" align="left" valign="top"><img src="imagens/topo/topo_r3_c2.jpg" width="468" height="90" border="0" usemap="#Map"></td>
          </tr>
          <tr>
            <td colspan="3" align="left" valign="top"><img src="imagens/topo/topo_r4_c1.jpg" width="779" height="39"></td>
            </tr>
          <tr>
            <td colspan="3" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="80%" align="center" valign="top" background="imagens/topo/topo_r5_c1.jpg" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                    <th width="51%" height="223" align="left" valign="top" scope="col"><table width="98%"  border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <th scope="col"><table width="96%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FF9966">
                          <tr>
                            <th height="105" bgcolor="#FFFFFF" scope="col"><p>
                                <marquee style="border-style:  solid; border-width: 0; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" direction="down" width="300" height="120" scrollamount="2">
                                <% 
While ((Repeat1__numRows <> 0) AND (NOT RsNot.EOF)) 
%>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr align="center" valign="middle">
                                    <th colspan="2" class="style14" scope="col">------------------------------------------------------------------------</th>
                                  </tr>
                                  <tr align="center" valign="middle" >
                                    <th width="116" height="62"  scope="col"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>"><img src="fotos/peq/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="75" height="56" hspace="5" border="0" align="center" class="brd"></a></span></th>
                                    <th width="243" align="left" class="style3" scope="col">
                                      <table width="90%"  border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <th align="left" class="style4" scope="col">&nbsp;<span class="style14"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>"><%=(RsNot.Fields.Item("data").Value)%> - <%=(RsNot.Fields.Item("titulo").Value)%></a></span></th>
                                        </tr>
                                    </table></th>
                                  </tr>
                                </table>
                                <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsNot.MoveNext()
Wend
%>
                                </marquee></th>
                          </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th align="left" valign="middle" scope="col"><a href="javascript:MM_openBrWindow('gatasbb/galeria.asp?Cod=<%=(RsGaleria.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')"><img src="bblagos/bbalagos_frente.jpg" width="312" height="100" border="0"></a></th>
                      </tr>
                      <tr>
                        <td><table width="100%" height="99"  border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <th height="82" background="imagens/desta_foto.jpg" scope="col"><table width="89%"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th height="100" align="left" valign="middle" scope="col"><div align="left"><a href="javascript:openPictureWindow_Fever('foto_destaque/foto.jpg','640','480','FOTO DA SEMANA','10','10')"><img src="foto_destaque/foto_p.jpg" width="120" height="80" border="0" class="dedo"></a></div></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table></td>
                      </tr>
                    </table></th>
                    <th width="49%" valign="middle" scope="col"><table width="279" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFE6CC">
                      <tr>
                        <td height="21" align="center" valign="middle"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(not_principal.Fields.Item("CodNoticia").Value)%>" target="_parent"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style10 style56"><strong><%=(not_principal.Fields.Item("titulo").Value)%></strong></span></span></span></a></span></td>
                      </tr>
                      <tr>
                        <td width="279" height="198" align="center" valign="middle"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(not_principal.Fields.Item("CodNoticia").Value)%>"><img src="fotos/grande/<%=(not_principal.Fields.Item("foto").Value)%>" alt="<%=(not_principal.Fields.Item("titulo").Value)%>" width="250" height="188" hspace="5" border="0" align="center" class="brd"></a></span></td>
                      </tr>
                      <tr>
                        <td height="20" align="center" valign="top"><div align="center"><a href="mostra_noticia.asp?CodNot=<%=(not_principal.Fields.Item("CodNoticia").Value)%>" class="style23"><%=(not_principal.Fields.Item("resumo").Value)%></a><br>
                          <br>
                        </div></td>
                      </tr>
                    </table></th>
                  </tr>
                  <tr align="left" valign="middle">
                    <td colspan="2"><table width="617"  border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <th align="left" bgcolor="#000000" scope="col"><table width="435" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                            <tr>
                              <td width="11" height="22" align="left" valign="middle">&nbsp; </td>
                              <td width="424" align="left" valign="middle" class="style7"><img src="retalhos/barra_atletas.gif" width="91" height="20"></td>
                            </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <td height="184" align="center" valign="middle" bgcolor="#D75602"><table width="100%" height="93%"  border="0" cellpadding="0" cellspacing="0" background="retalhos/fundo.jpg">
                          <tr>
                            <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                        <td align="center" valign="middle" class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></td>
                                      </tr>
                                  </table></th>
                                  <th width="110" align="center" valign="middle" scope="col">
                                    <% Rs_atleta.MoveNext() %>
                                    <table width="100" border="0" cellspacing="0" cellpadding="0">
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
                                        <td align="center" valign="middle" class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></td>
                                      </tr>
                                  </table></th>
                                  <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %>
                                      <table width="100" border="0" cellspacing="0" cellpadding="0">
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
                                          <td align="center" valign="middle" class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></td>
                                        </tr>
                                    </table></th>
                                  <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %>
                                      <table width="100" border="0" cellspacing="0" cellpadding="0">
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
                                          <td align="center" valign="middle" class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></td>
                                        </tr>
                                    </table></th>
                                  <th width="110" align="center" valign="middle" scope="col"><% Rs_atleta.MoveNext() %>
                                      <table width="100" border="0" cellspacing="0" cellpadding="0">
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
                                          <td align="center" valign="middle" class="style42"><a href="javascript:MM_openBrWindow('ver_atleta.asp?CodNot=<%=(Rs_atleta.Fields.Item("CodNoticia").Value)%>','ATLETAS','scrollbars=1','518','500','true')"><%=(Rs_atleta.Fields.Item("titulo").Value)%></a></td>
                                        </tr>
                                    </table></th>
                                </tr>
                            </table></th>
                          </tr>
                          <tr>
                            <td height="12" align="center" valign="middle"><span class="style42"><a href="atletas.asp">Mais Atletas </a></span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#D65501">
                            <tr align="center" valign="middle">
                              <th scope="col"><img src="retalhos/g_festas.jpg" width="288" height="31"></th>
                              <th scope="col">&nbsp;</th>
                              <th scope="col"><img src="retalhos/g_fotos.jpg" width="288" height="31"></th>
                            </tr>
                            <tr align="center" valign="middle">
                              <td><table width="309" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="144" height="123" align="right"><table width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="brd">
                                        <tr>
                                          <td width="150" height="120" colspan="3" align="center" valign="middle"><p><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><img src="festa/fotos/<%=(RsAlbum.Fields.Item("thumb").Value)%>" width="140" height="105" border="0" class="brd"></a><br>
                                          </p></td>
                                        </tr>
                                        <tr>
                                          <td height="22" colspan="3" valign="top"><p align="center">&nbsp;<span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></p></td>
                                        </tr>
                                    </table></td>
                                    <td width="165" align="right" valign="top"><table width="156" height="132" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="156" height="12" valign="top" class="style12 style14">&nbsp; </td>
                                        </tr>
                                        <br>
                                        <% RsAlbum.MoveNext() %>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                                        </tr>
                                        <% RsAlbum.MoveNext() %>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                                        </tr>
                                        <% RsAlbum.MoveNext() %>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                                        </tr>
                                        <% RsAlbum.MoveNext() %>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                                        </tr>
                                        <% RsAlbum.MoveNext() %>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><span class="style14"><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"></a><a href="javascript:MM_openBrWindow('festa/galerias_de_fotos/?Cod=<%=(RsAlbum.Fields.Item("Cod").Value)%>','Saquabb','','650','450','true')"><%=(RsAlbum.Fields.Item("nome").Value)%></a></span></td>
                                        </tr>
                                        <tr>
                                          <td height="20" align="center" valign="middle"><p class="style14"><span class="style12 style56"><a href="festa.asp">+ mais festas </a></span></p></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                              <td>&nbsp;</td>
                              <td><table width="288" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF00FF">
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
                                    </table></th>
                                    <% RsGaleria.MoveNext() %>
                                    <th width="142" valign="middle" bgcolor="#D65501" scope="col"><table width="110" border="0" cellspacing="0" cellpadding="0">
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
                                    <th align="center" valign="middle" bgcolor="#D65501" scope="col"><p><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria01.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"><%=(RsGaleria01.Fields.Item("Titulo").Value)%></a></p></th>
                                    <th width="142" valign="middle" bgcolor="#D65501" scope="col"><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"></a><a href="javascript:MM_openBrWindow('galeria_fotos/galeria.asp?Cod=<%=(RsGaleria.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')" class="style14"><%=(RsGaleria.Fields.Item("Titulo").Value)%></a> </th>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr align="center" valign="middle">
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    </tr>
                </table>                  </th>
                <th width="20%" align="right" valign="top" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col"><img src="imagens/topo/topo_r5_c4.jpg" width="158" height="14"></th>
                  </tr>
                  <tr>
                    <td><table width="99%"  border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <th align="center" valign="middle" scope="col"><img src="retalhos/msn_saquabb.jpg" width="150" height="170"></th>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="150"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col"><img src="retalhos/topo_publi.jpg" width="150" height="31"></th>
                      </tr>
                      <tr>
                        <td align="center" valign="top" background="retalhos/meio_publi.jpg"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="33" align="center" valign="middle"><a href="http://www.360invert.com.br" target="_blank"><img src="publicidade/360.gif" width="146" height="30" border="0"></a></td>
                          </tr>
                          <tr>
                            <th height="33" align="center" valign="middle" scope="col"><a href="http://www.prosa.com.br" target="_blank"><img src="publicidade/prosa.jpg" width="144" height="30" border="0" class="brd"></a></th>
                          </tr>
                          <tr>
                            <td height="33" align="center" valign="middle"><a href="http://www.erisberto.com" target="_blank"><img src="publicidade/beto.jpg" width="146" height="30" border="0"></a></td>
                          </tr>
                          <tr>
                            <td height="33" align="center" valign="middle"><a href="http://www.saquaonline.com.br" target="_blank"><img src="publicidade/saquaonline.jpg" alt="SaquaOnline" width="146" height="30" border="0"></a></td>
                          </tr>
                          <tr>
                            <td height="33" align="center" valign="middle"><a href="http://www.wardesign.com.br" target="_blank"><img src="publicidade/war.jpg" width="146" height="30" border="0"></a></td>
                          </tr>
                          <tr>
                            <td height="156" align="center" valign="top"><a href="http://www.biarmsdigital.com" target="_blank"><img src="publicidade/Biarms.gif" width="142" height="142" border="0"></a></td>
                          </tr>
                        </table>                          
                          <table width="100" border="0" cellspacing="0" cellpadding="0">
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
                            </script>
                                  <noscript>
                                  <a target="_blank" href="http://www.nedstatbasic.net/stats?ADew/gO36+Vph0qaJDrgnVlsymoQ"><img
src="http://m1.nedstatbasic.net/n?id=ADew/gO36+Vph0qaJDrgnVlsymoQ"
border="0" width="18" height="18"
alt="Nedstat Basic - Free web site statistics
Personal homepage website counter"></a>                                                                                                      </noscript>
                                  <!-- End Nedstat Basic code -->
&nbsp;</th>
                            </tr>
                            <tr>
                              <th scope="col"><span class="style23">Est&aacute;tisticas</span></th>
                            </tr>
                          </table>                          <p>&nbsp;</p>                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top"><img src="retalhos/base_publi.jpg" width="150" height="12"></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></th>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td height="10" colspan="3"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th height="10" align="center" valign="top" background="retalhos/fundo_base.jpg" scope="col"><img src="retalhos/fundo_base.jpg" width="1" height="10"></th>
              </tr>
              <tr>
                <td height="25" background="retalhos/meio_fundo.jpg" bgcolor="#D65501"><div align="center" class="style42 style59"><a href="home.asp">Home</a> -<a href="arquivo.asp"> Not&iacute;cias</a> - <a href="galerias.asp">Galerias</a> -<a href="atletas.asp"> Atletas</a> - <a href="festa.asp">Festas</a> - <a href="contato.asp" class="style58">Contato</a> </div></td>
              </tr>
              <tr>
                <td background="retalhos/fundo_base_invert.jpg"><img src="retalhos/fundo_base_invert.jpg" width="1" height="10"></td>
              </tr>
            </table></td>
            </tr>
        </table>          </th>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle" bgcolor="#FFE6CC"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="style23" scope="col"> Saquabb.com.br &copy; 2005 . Todos os Direitos Reservados . Desenvolvido Por <a href="http://www.wardesign.com.br">Wardesign.com.br </a> </th>
          </tr>
        </table></td>
      </tr>
    </table></th>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="59,59,106,78" href="home.asp">
  <area shape="rect" coords="126,40,190,63" href="arquivo.asp">
  <area shape="rect" coords="204,30,270,49" href="galerias.asp">
  <area shape="rect" coords="283,26,339,48" href="atletas.asp">
  <area shape="rect" coords="355,29,415,57" href="festa.asp">
  <area shape="rect" coords="423,41,485,78" href="contato.asp">
</map>
<map name="Map2">
  <area shape="rect" coords="-2,117,13,138" href="contato.asp">
</map>
</body>
</html>
<%
RsNot.Close()
Set RsNot = Nothing
%>
<%
not_principal.Close()
Set not_principal = Nothing
%>
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
