<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/con_bb.asp" -->
<%
Dim RsNot
Dim RsNot_numRows

Set RsNot = Server.CreateObject("ADODB.Recordset")
RsNot.ActiveConnection = MM_con_bb_STRING
RsNot.Source = "SELECT * FROM noticia ORDER BY CodNoticia DESC"
RsNot.CursorType = 0
RsNot.CursorLocation = 2
RsNot.LockType = 1
RsNot.Open()

RsNot_numRows = 0
%>
<%
Dim fotos
Dim fotos_numRows

Set fotos = Server.CreateObject("ADODB.Recordset")
fotos.ActiveConnection = MM_con_bb_STRING
fotos.Source = "SELECT * FROM Galerias ORDER BY Cod DESC"
fotos.CursorType = 0
fotos.CursorLocation = 2
fotos.LockType = 1
fotos.Open()

fotos_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 3
Repeat1__index = 0
RsNot_numRows = RsNot_numRows + Repeat1__numRows
%>
<%
Dim Repeat_fotos__numRowsHL
Dim Repeat_fotos__indexHL

Repeat_fotos__numRowsHL = 8
Repeat_fotos__indexHL = 0
fotos_numRows = fotos_numRows + Repeat_fotos__numRowsHL
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim fotos_total
Dim fotos_first
Dim fotos_last

' set the record count
fotos_total = fotos.RecordCount

' set the number of rows displayed on this page
If (fotos_numRows < 0) Then
  fotos_numRows = fotos_total
Elseif (fotos_numRows = 0) Then
  fotos_numRows = 1
End If

' set the first and last displayed record
fotos_first = 1
fotos_last  = fotos_first + fotos_numRows - 1

' if we have the correct record count, check the other stats
If (fotos_total <> -1) Then
  If (fotos_first > fotos_total) Then
    fotos_first = fotos_total
  End If
  If (fotos_last > fotos_total) Then
    fotos_last = fotos_total
  End If
  If (fotos_numRows > fotos_total) Then
    fotos_numRows = fotos_total
  End If
End If
%>
<%
Dim MM_paramName 
%>
<%
' *** Move To Record and Go To Record: declare variables

Dim MM_rs
Dim MM_rsCount
Dim MM_size
Dim MM_uniqueCol
Dim MM_offset
Dim MM_atTotal
Dim MM_paramIsDefined

Dim MM_param
Dim MM_index

Set MM_rs    = fotos
MM_rsCount   = fotos_total
MM_size      = fotos_numRows
MM_uniqueCol = ""
MM_paramName = ""
MM_offset = 0
MM_atTotal = false
MM_paramIsDefined = false
If (MM_paramName <> "") Then
  MM_paramIsDefined = (Request.QueryString(MM_paramName) <> "")
End If
%>
<%
' *** Move To Record: handle 'index' or 'offset' parameter

if (Not MM_paramIsDefined And MM_rsCount <> 0) then

  ' use index parameter if defined, otherwise use offset parameter
  MM_param = Request.QueryString("index")
  If (MM_param = "") Then
    MM_param = Request.QueryString("offset")
  End If
  If (MM_param <> "") Then
    MM_offset = Int(MM_param)
  End If

  ' if we have a record count, check if we are past the end of the recordset
  If (MM_rsCount <> -1) Then
    If (MM_offset >= MM_rsCount Or MM_offset = -1) Then  ' past end or move last
      If ((MM_rsCount Mod MM_size) > 0) Then         ' last page not a full repeat region
        MM_offset = MM_rsCount - (MM_rsCount Mod MM_size)
      Else
        MM_offset = MM_rsCount - MM_size
      End If
    End If
  End If

  ' move the cursor to the selected record
  MM_index = 0
  While ((Not MM_rs.EOF) And (MM_index < MM_offset Or MM_offset = -1))
    MM_rs.MoveNext
    MM_index = MM_index + 1
  Wend
  If (MM_rs.EOF) Then 
    MM_offset = MM_index  ' set MM_offset to the last possible record
  End If

End If
%>
<%
' *** Move To Record: if we dont know the record count, check the display range

If (MM_rsCount = -1) Then

  ' walk to the end of the display range for this page
  MM_index = MM_offset
  While (Not MM_rs.EOF And (MM_size < 0 Or MM_index < MM_offset + MM_size))
    MM_rs.MoveNext
    MM_index = MM_index + 1
  Wend

  ' if we walked off the end of the recordset, set MM_rsCount and MM_size
  If (MM_rs.EOF) Then
    MM_rsCount = MM_index
    If (MM_size < 0 Or MM_size > MM_rsCount) Then
      MM_size = MM_rsCount
    End If
  End If

  ' if we walked off the end, set the offset based on page size
  If (MM_rs.EOF And Not MM_paramIsDefined) Then
    If (MM_offset > MM_rsCount - MM_size Or MM_offset = -1) Then
      If ((MM_rsCount Mod MM_size) > 0) Then
        MM_offset = MM_rsCount - (MM_rsCount Mod MM_size)
      Else
        MM_offset = MM_rsCount - MM_size
      End If
    End If
  End If

  ' reset the cursor to the beginning
  If (MM_rs.CursorType > 0) Then
    MM_rs.MoveFirst
  Else
    MM_rs.Requery
  End If

  ' move the cursor to the selected record
  MM_index = 0
  While (Not MM_rs.EOF And MM_index < MM_offset)
    MM_rs.MoveNext
    MM_index = MM_index + 1
  Wend
End If
%>
<%
' *** Move To Record: update recordset stats

' set the first and last displayed record
fotos_first = MM_offset + 1
fotos_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (fotos_first > MM_rsCount) Then
    fotos_first = MM_rsCount
  End If
  If (fotos_last > MM_rsCount) Then
    fotos_last = MM_rsCount
  End If
End If

' set the boolean used by hide region to check if we are on the last record
MM_atTotal = (MM_rsCount <> -1 And MM_offset + MM_size >= MM_rsCount)
%>
<%
' *** Go To Record and Move To Record: create strings for maintaining URL and Form parameters

Dim MM_keepNone
Dim MM_keepURL
Dim MM_keepForm
Dim MM_keepBoth

Dim MM_removeList
Dim MM_item
Dim MM_nextItem

' create the list of parameters which should not be maintained
MM_removeList = "&index="
If (MM_paramName <> "") Then
  MM_removeList = MM_removeList & "&" & MM_paramName & "="
End If

MM_keepURL=""
MM_keepForm=""
MM_keepBoth=""
MM_keepNone=""

' add the URL parameters to the MM_keepURL string
For Each MM_item In Request.QueryString
  MM_nextItem = "&" & MM_item & "="
  If (InStr(1,MM_removeList,MM_nextItem,1) = 0) Then
    MM_keepURL = MM_keepURL & MM_nextItem & Server.URLencode(Request.QueryString(MM_item))
  End If
Next

' add the Form variables to the MM_keepForm string
For Each MM_item In Request.Form
  MM_nextItem = "&" & MM_item & "="
  If (InStr(1,MM_removeList,MM_nextItem,1) = 0) Then
    MM_keepForm = MM_keepForm & MM_nextItem & Server.URLencode(Request.Form(MM_item))
  End If
Next

' create the Form + URL string and remove the intial '&' from each of the strings
MM_keepBoth = MM_keepURL & MM_keepForm
If (MM_keepBoth <> "") Then 
  MM_keepBoth = Right(MM_keepBoth, Len(MM_keepBoth) - 1)
End If
If (MM_keepURL <> "")  Then
  MM_keepURL  = Right(MM_keepURL, Len(MM_keepURL) - 1)
End If
If (MM_keepForm <> "") Then
  MM_keepForm = Right(MM_keepForm, Len(MM_keepForm) - 1)
End If

' a utility function used for adding additional parameters to these strings
Function MM_joinChar(firstItem)
  If (firstItem <> "") Then
    MM_joinChar = "&"
  Else
    MM_joinChar = ""
  End If
End Function
%>
<%
' *** Move To Record: set the strings for the first, last, next, and previous links

Dim MM_keepMove
Dim MM_moveParam
Dim MM_moveFirst
Dim MM_moveLast
Dim MM_moveNext
Dim MM_movePrev

Dim MM_urlStr
Dim MM_paramList
Dim MM_paramIndex
Dim MM_nextParam

MM_keepMove = MM_keepBoth
MM_moveParam = "index"

' if the page has a repeated region, remove 'offset' from the maintained parameters
If (MM_size > 1) Then
  MM_moveParam = "offset"
  If (MM_keepMove <> "") Then
    MM_paramList = Split(MM_keepMove, "&")
    MM_keepMove = ""
    For MM_paramIndex = 0 To UBound(MM_paramList)
      MM_nextParam = Left(MM_paramList(MM_paramIndex), InStr(MM_paramList(MM_paramIndex),"=") - 1)
      If (StrComp(MM_nextParam,MM_moveParam,1) <> 0) Then
        MM_keepMove = MM_keepMove & "&" & MM_paramList(MM_paramIndex)
      End If
    Next
    If (MM_keepMove <> "") Then
      MM_keepMove = Right(MM_keepMove, Len(MM_keepMove) - 1)
    End If
  End If
End If

' set the strings for the move to links
If (MM_keepMove <> "") Then 
  MM_keepMove = Server.HTMLEncode(MM_keepMove) & "&"
End If

MM_urlStr = Request.ServerVariables("URL") & "?" & MM_keepMove & MM_moveParam & "="

MM_moveFirst = MM_urlStr & "0"
MM_moveLast  = MM_urlStr & "-1"
MM_moveNext  = MM_urlStr & CStr(MM_offset + MM_size)
If (MM_offset - MM_size < 0) Then
  MM_movePrev = MM_urlStr & "0"
Else
  MM_movePrev = MM_urlStr & CStr(MM_offset - MM_size)
End If
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<!-- TemplateBeginEditable name="doctitle" -->
<title>Erisberto.com ___________________________________________________________________</title>
<!-- TemplateEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
td {
	text-decoration: none;
	border: none;
}
img {
	text-decoration: none;
	border: none;
}
font {
	font-family: Tahoma;
	font-size: 11px;
	color: #FFFFFF;
	text-decoration: none;
	border: none;
}
a {
	font-family: Tahoma;
	font-size: 11px;
	text-decoration: none;
	border: none;
	color: #FFFFFF;
}
.brd {border: 1px solid #F7E849;
}
.brd_pagina {border: 1px solid #666666;
}
.style2 {
	color: #F7E849;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #F7E849;
	font-weight: bold;
}
body {
	background-image:   url(imagens/retalhos/fundo.gif);
}
.style9 {
	font-size: 1px;
	color: #CCD7D9;
}
.style10 {color: #EFDC11}
.brd_laranja {	border: 1px solid #FF9900;
}
-->
</style>
<style type="text/css">
/*inicio:Onde Define a cor e aespessura das marges das Fotos */
#showimage{
	position:absolute;
	visibility:hidden;
	border-left: 10px solid #FFFFFF;
	border-right: 10px solid #FFFFFF;
	border-bottom: 10px solid #FFFFFF;
	z-index: 50;
	background-color: #FFFFFF;
	
}
/*fim*/

/*inicio:Onde Define a cor da margem onde fica o "x" de Fechar */
#dragbar{
	cursor: hand;
	cursor: pointer;
	background-color: #ffffff;
	min-width: 100px;
	}
/*fim*/

/*inicio:Onde Define a cor do "x" de Fechar */
#dragbar #closetext{
color: #000000; 
font-weight: bold;
margin-right: 1px;
font-family:Lucida Console;
}
/*fim*/
</style>
<style type="text/css">
<!--

.brd_laranja {
	border: 1px solid #666666;
}
.laranja {	font-size: 10px;
	font-weight: bold;
	color: #FF6600;
}
.style15 {
	font-size: 9px;
	color: #666666;
}
.style17 {font-size: 9px}
.style19 {
	color: #666666;
	font-weight: bold;
}
.style20 {color: #000000; font-weight: bold; }
-->
</style>
<script type="text/javascript" src="script_foto.js"></script>
<!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable --><!-- TemplateParam name="width" type="text" value="100%" -->
</head>
<body onload="self.focus()">
<div id="showimage"></div>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<table width="778" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="brd_pagina">
	<tr>
				
				<!--FLASH-->
					<td height="9" width="100%"><img src="imagens/topo/topo_01.jpg" width="778" height="28" border="0" usemap="#Map"></td>
				<!--FLASH-->
  </tr>
	<tr>
	  <td height="9"><img src="imagens/topo/1.jpg" width="778" height="92"></td>
	</tr>
	<tr>
	  <td height="33"><table width="778" height="33" border="0" cellpadding="0" cellspacing="0" background="images/nenu/menu_r1_c16.jpg">
        <tr>
          <td width="37"><img src="images/nenu/menu_r1_c1.jpg" width="37" height="33"></td>
          <td width="21"><img src="images/nenu/menu_r1_c2.jpg" width="21" height="33"></td>
          <td width="54"><a href="galerias.asp"><img src="images/nenu/menu_r1_c3.jpg" width="54" height="33" border="0"></a></td>
          <td width="28"><img src="images/nenu/menu_r1_c4.jpg" width="28" height="33"></td>
          <td width="48"><a href="videos.asp"><img src="images/nenu/menu_r1_c5.jpg" width="48" height="33" border="0"></a></td>
          <td width="37"><img src="images/nenu/menu_r1_c6.jpg" width="37" height="33"></td>
          <td width="81"><a href="apresentacao.asp"><img src="images/nenu/menu_r1_c7.jpg" width="81" height="33" border="0"></a></td>
          <td width="97"><img src="images/nenu/menu_r1_c8.jpg" width="24" height="33"><a href="resultados.asp"><img src="images/nenu/menu_r1_c9.jpg" width="73" height="33" border="0"></a></td>
          <td width="72"><img src="images/nenu/menu_r1_c10.jpg" width="27" height="33"><a href="titulos.asp"><img src="images/nenu/menu_r1_c11.jpg" width="45" height="33" border="0"></a></td>
          <td width="92"><img src="images/nenu/menu_r1_c12.jpg" width="55" height="33"><a href="midia.asp"><img src="images/nenu/menu_r1_c13.jpg" width="37" height="33" border="0"></a></td>
          <td width="46"><img src="images/nenu/menu_r1_c14.jpg" width="46" height="33"></td>
          <td width="134"><a href="contato.asp"><img src="images/nenu/menu_r1_c15.jpg" width="53" height="33" border="0"></a></td>
          <td width="21">&nbsp;</td>
        </tr>
      </table></td>
  </tr>

	<tr>
		<td height="100%" width="100%" valign="top">
			<table height="327%" border="0" cellpadding="0" cellspacing="0">
				<tr>
<td width="248" align="center" valign="top" background="images/bg4.jpg">
  <table width="248" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="33"><img src="images/w2.jpg" width="248" height="33"></td>
    </tr>
    <tr>
      <td height="101" align="center">
        <% 
While ((Repeat1__numRows <> 0) AND (NOT RsNot.EOF)) 
%>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="90" align="center" valign="middle"><span class="fonte style22"><span class="data"></span></span>
                <table width="80" height="71" border="0" cellpadding="0" cellspacing="0" class="brd">
                  <tr>
                    <th width="70" height="70" background="fotos/noticia/<%=(RsNot.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                  </tr>
              </table></td>
            <td width="158"><span class="style2"><%=(RsNot.Fields.Item("data").Value)%></span><font><br>
                  <span class="style3"><%=(RsNot.Fields.Item("resumo").Value)%></span> <br>
                  <span class="style5 style10"><a href="ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" class="style5">Leia Mais</a> </span></font></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><br>
                <img src="images/l1.jpg" width="248" height="1"></td>
          </tr>
        </table>
        <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsNot.MoveNext()
Wend
%>
        <table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="20" class="style2" scope="col"><a href="../arquivo.asp" class="style10">Arquivo</a></th>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="100%"></td>
    </tr>
  </table></td>
					<td width="530" height="348" align="left" valign="top" bgcolor="#FFFFFF"><table width="@@(width)@@" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th width="549" height="11" colspan="2" scope="col"><table width="100%" height="11" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="463" background="images/bg6.jpg"></td>
                            </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <!-- TemplateBeginEditable name="tabela_editavel" -->
                        <th height="337" colspan="2" align="center" valign="top" scope="col"><table width="530" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th width="364" scope="col"><div align="left"><img src="imagens/retalhos/galeria_.jpg" width="200" height="40"></div></th>
                            <th width="166" scope="col"><span class="style2 style38 style39"><a href="default.asp" class="laranja">Voltar &agrave; P&aacute;gina Inicial</a></span></th>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" background="galeria_fotos/imagens/fundo_fotos_r3_c1.jpg"><img src="galeria_fotos/imagens/fundo_fotos_r1_c1.jpg" width="530" height="51"></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" background="galeria_fotos/imagens/fundo_fotos_r3_c1.jpg"><table width="100" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th scope="col">&nbsp;</th>
                                  <th scope="col"><table width="100" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <th scope="col"><table border="0">
                                            <tr>
                                              <%
  ' Horizontal Looper version 3
  While ((Repeat_fotos__numRowsHL <> 0) AND (NOT fotos.EOF))
%>
                                              <td width="109" height="75"><table width="109" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#E0E0D7">
                                                  <tr>
                                                    <th width="109" align="center" valign="middle" scope="col"><div class=ch id=Fl style="width:100;height:75; margin-right:9px;text-align:center;"> <a href="fotos/galeria/<%=(fotos.Fields.Item("Foto").Value)%>" onclick="return enlarge('fotos/galeria/foto_<%=(fotos.Fields.Item("Foto").Value)%>',event,'center',512,384);"> <img src="fotos/galeria/<%=(fotos.Fields.Item("Foto").Value)%>" width="100" height="75"   border="0" class="brd_laranja"></a> </div>
                                                      <span class="style3 style15"><span class="style3  style17"><%=(fotos.Fields.Item("descricao").Value)%></span></span></th>
                                                  </tr>
                                              </table></td>
                                              <%
    'Horizontal Looper version 3
    Repeat_fotos__indexHL=Repeat_fotos__indexHL+1
    Repeat_fotos__numRowsHL=Repeat_fotos__numRowsHL-1
    fotos.MoveNext()
    if len(nested_fotos)<=0 then
      nested_fotos = 1
    end if
    if ((Repeat_fotos__numRowsHL <> 0) AND (NOT fotos.EOF) AND (nested_fotos mod 4 = 0)) then
      Response.Write "</tr><tr>"
    end if
    nested_fotos = nested_fotos + 1
    'end horizontal looper version 3
  Wend
%>
                                            </tr>
                                          </table>
                                            <span class="ch"></span></th>
                                      </tr>
                                  </table></th>
                                  <th scope="col">&nbsp;</th>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" background="galeria_fotos/imagens/fundo_fotos_r3_c1.jpg"><table border="0" width="50%" align="center">
                              <tr>
                                <td width="31%" align="center">
                                  <% If MM_offset <> 0 Then %>
                                  <a href="<%=MM_movePrev%>" class="style20">Voltar</a>
                                  <% End If ' end MM_offset <> 0 %>
                                </td>
                                <td width="30%" align="center">
                                  <% If Not MM_atTotal Then %>
                                  <a href="<%=MM_moveNext%>" class="style20">Mais Fotos </a>
                                  <% End If ' end Not MM_atTotal %>
                                </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="galeria_fotos/imagens/fundo_fotos_r5_c1.jpg" width="530" height="22"></td>
                          </tr>
                        </table></th>
                        <!-- TemplateEndEditable --></tr>
                  </table></td>
				</tr>
		  </table>
		</td>
	</tr>
	<tr>
	  <td height="8" background="images/bg5.jpg"></td>
  </tr>
	<tr>
	  <td height="20" bgcolor="#3C9ED1"><div align="center"><font><a href="http://www.erisberto.com">Home</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;<a href="galerias.asp">Galerias</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="videos.asp">V&iacute;deos</a>&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="apresentacao.asp">Apresenta&ccedil;&atilde;o</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;<a href="resultados.asp">&nbsp;Resultados</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="titulos.asp">T&iacute;tulos</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="midia.asp">M&iacute;dia</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="contato.asp">Contato</a></font> </div></td>
  </tr>
	<tr>
		<td height="2" background="images/bg5.jpg"></td>
	</tr>
	<tr>
	  <td height="40" align="center" bgcolor="#3C9ED1" ><table width="97%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th scope="col"><a href="http://www.waverebel.com" target="_blank"><img src="imagens/logos/wr.jpg" width="120" height="30" border="0"></a></th>
          <th scope="col"><a href="http://www.360invert.com.br" target="_blank"><img src="imagens/logos/360.jpg" width="120" height="30" border="0"></a></th>
          <th scope="col"><img src="imagens/logos/redley.jpg" width="120" height="30"></th>
          <th height="40" scope="col"><a href="http://www.saquabb.com.br" target="_blank"><img src="imagens/logos/saquabb.jpg" width="120" height="30" border="0"></a></th>
        </tr>
      </table></td>
  </tr>
	<tr>
	  <td height="1" align="right" bgcolor="#CCD7D9" ><span class="style9">-</span></td>
  </tr>
	<tr>
		<td height="28" align="right" background="images/nenu/menu_r1_c16.jpg" bgcolor="#FFCC00" ><div align="center"><font style="color:#000000">Erisberto.Com &copy; 2005 • Todos os Direitos Reservados • Desenvolvido Por <a href="http://www.wardesign.com.br" target="_blank"><strong>Wardesign.com.br</strong></a> </font></div></td>
	</tr>
</table>

<map name="Map">
  <area shape="rect" coords="694,6,721,26" href="http://www.erisberto.com">
  <area shape="rect" coords="731,5,759,27" href="contato.asp">
</map>
</body>
</html>
<%
RsNot.Close()
Set RsNot = Nothing
%>
<%
fotos.Close()
Set fotos = Nothing
%>
