					 <%@LANGUAGE="VBSCRIPT"%>
					 <!--#include file="Connections/conSurf.asp" -->
<%
Dim RsVerNot__MMColParam
RsVerNot__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  RsVerNot__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim RsVerNot
Dim RsVerNot_numRows

Set RsVerNot = Server.CreateObject("ADODB.Recordset")
RsVerNot.ActiveConnection = MM_conSurf_STRING
RsVerNot.Source = "SELECT *  FROM noticias  WHERE CodNoticia = " + Replace(RsVerNot__MMColParam, "'", "''") + "  ORDER BY CodNoticia DESC"
RsVerNot.CursorType = 0
RsVerNot.CursorLocation = 2
RsVerNot.LockType = 3
RsVerNot.Open()

RsVerNot_numRows = 0

'SELECT *  FROM fotos  WHERE CodNoticia = " &  Request.QueryString("CodNot")
%>
<%
Dim Fotos__MMColParam
Fotos__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  Fotos__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim Fotos
Dim Fotos_numRows

Set Fotos = Server.CreateObject("ADODB.Recordset")
Fotos.ActiveConnection = MM_conSurf_STRING
Fotos.Source = "SELECT * FROM fotos WHERE CodNoticia = " + Replace(Fotos__MMColParam, "'", "''") + ""
Fotos.CursorType = 0
Fotos.CursorLocation = 2
Fotos.LockType = 1
Fotos.Open()

Fotos_numRows = 0
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim RsVerNot_total
Dim RsVerNot_first
Dim RsVerNot_last

' set the record count
RsVerNot_total = RsVerNot.RecordCount

' set the number of rows displayed on this page
If (RsVerNot_numRows < 0) Then
  RsVerNot_numRows = RsVerNot_total
Elseif (RsVerNot_numRows = 0) Then
  RsVerNot_numRows = 1
End If

' set the first and last displayed record
RsVerNot_first = 1
RsVerNot_last  = RsVerNot_first + RsVerNot_numRows - 1

' if we have the correct record count, check the other stats
If (RsVerNot_total <> -1) Then
  If (RsVerNot_first > RsVerNot_total) Then
    RsVerNot_first = RsVerNot_total
  End If
  If (RsVerNot_last > RsVerNot_total) Then
    RsVerNot_last = RsVerNot_total
  End If
  If (RsVerNot_numRows > RsVerNot_total) Then
    RsVerNot_numRows = RsVerNot_total
  End If
End If
%>
<%
' *** Recordset Stats: if we don't know the record count, manually count them

If (RsVerNot_total = -1) Then

  ' count the total records by iterating through the recordset
  RsVerNot_total=0
  While (Not RsVerNot.EOF)
    RsVerNot_total = RsVerNot_total + 1
    RsVerNot.MoveNext
  Wend

  ' reset the cursor to the beginning
  If (RsVerNot.CursorType > 0) Then
    RsVerNot.MoveFirst
  Else
    RsVerNot.Requery
  End If

  ' set the number of rows displayed on this page
  If (RsVerNot_numRows < 0 Or RsVerNot_numRows > RsVerNot_total) Then
    RsVerNot_numRows = RsVerNot_total
  End If

  ' set the first and last displayed record
  RsVerNot_first = 1
  RsVerNot_last = RsVerNot_first + RsVerNot_numRows - 1
  
  If (RsVerNot_first > RsVerNot_total) Then
    RsVerNot_first = RsVerNot_total
  End If
  If (RsVerNot_last > RsVerNot_total) Then
    RsVerNot_last = RsVerNot_total
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

Set MM_rs    = RsVerNot
MM_rsCount   = RsVerNot_total
MM_size      = RsVerNot_numRows
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
RsVerNot_first = MM_offset + 1
RsVerNot_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (RsVerNot_first > MM_rsCount) Then
    RsVerNot_first = MM_rsCount
  End If
  If (RsVerNot_last > MM_rsCount) Then
    RsVerNot_last = MM_rsCount
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
%><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
body {
	background-color: #D8D7D5;
}
.style1 {color: #FFFFFF}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	color: #000000;
	text-decoration: none;
}
a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	color: #666666;
	text-decoration: none;
}
.style2 {
	font-size: 12;
	font-weight: bold;
	color: #000000;
}
.BRD {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
.BRD2 {
	border: 1px solid #333333;
}
.brd1 {
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #999999;
}
.esquerdo {
	border-left-width: 1px;
	border-left-style: solid;
	border-left-color: #999999;
}
.cima {
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #999999;
}
-->
</style>
<script language="JavaScript" src="xtra/java.js"></script>
<table width="100%" cellpadding="0"  cellspacing="0" class="BRD">
  <tr>
    <td width="45%"><img src="images/SESSAO.gif" width="159" height="21"></td>
    <td width="22%" bgcolor="#F4F4F4"><div align="center"><a href="ifrema_not.asp"><strong>Home</strong></a> </div></td>
    <td width="33%" bgcolor="#F4F4F4" class="esquerdo"><div align="center"><a href="arquivo.asp"><strong>Arquivo de Noticias </strong></a></div></td>
  </tr>
</table>
<br>
<table width="450" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15"><img src="images/cantoesquerdo.gif" width="15" height="15"></td>
    <td width="418" height="15" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="15" height="15"><img src="images/cantodireito.gif" width="15" height="15"></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FFFFFF"><table width="420" height="66" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td height="23" colspan="2" align="center" bgcolor="#F2F2F2" class="tit"><div align="left"><span class="style2">&nbsp;<%=(RsVerNot.Fields.Item("titulo").Value)%></span></div></td>
      </tr>
      <tr>
        <td width="169" height="25" bgcolor="#FFFFFF">Data: <strong><%=(RsVerNot.Fields.Item("data").Value)%></strong></td>
        <% if (RsVerNot.Fields.Item("autmail").Value) <> ""then %>
        <td width="365" bgcolor="#FFFFFF"><div align="center"><span class="mar">Por </span><a href="mailto:<%=(RsVerNot.Fields.Item("autmail").Value)%>" class="autor"><strong><%=(RsVerNot.Fields.Item("autor").Value)%> </strong></a></div></td>
        <% else %>
        <td width="225" bgcolor="#FFFFFF"><div align="center">Por <strong><%=(RsVerNot.Fields.Item("autor").Value)%></strong></div></td>
        <% end if %>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#FFFFFF" >
          <% if  (Not Fotos.eof) then %>
          <table width="200" border="5" align="right" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#F4F4F4">
            <tr>
              <td valign="top" bgcolor="#FFFFFF">
                <% while (Not Fotos.eof) %>
                <img src="images/spacer.gif" width="1" height="4" >
                <table width="192" height="162" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#000000">
                  <tr>
                    <td width="192" height="58" valign="top"><a href="javascript:openPictureWindow_Fever('fotos/<%=(Fotos.Fields.Item("arquivo").Value)%>','<%=(Fotos.Fields.Item("largura").Value)%>','<%=(Fotos.Fields.Item("altura").Value)%>','Foto - AT!TUDE','10','10')"><img src="fotos/192x144_<%=(Fotos.Fields.Item("arquivo").Value)%>" width="192" height="144" border="0" align="absmiddle"></a><span class="style1"><br>
                          <%=(Fotos.Fields.Item("descricao").Value)%>
                          <% If (Fotos.Fields.Item("fotografo").Value) <> "" then response.Write(" - Foto: ") End If%>
                          <%=(Fotos.Fields.Item("fotografo").Value)%> </span></td>
                  </tr>
                </table>
                <% Fotos.MoveNext() 
Wend %></td>
            </tr>
          </table>
          <% end if  %>
          <% response.write replace((RsVerNot.Fields.Item("materia").Value), vbcrlf,"<br>")%></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/cantodireitoesquerdo.gif" width="15" height="15"></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td><img src="images/cantodireitobaixo.gif" width="15" height="15"></td>
  </tr>
</table>
<div align="center"><br>
Apoio <a href="http://www.360invert.com.br" target="_blank"><strong>360!nvert.com.br</strong></a><!--Code generated by Cool Web Scrollbars from Harmony Hollow Software-->
  <!--http://www.harmonyhollow.net-->
    <STYLE type="text/css">
<!--
BODY {
scrollbar-face-color:#D8D7D5;
scrollbar-highlight-color:#D8D7D5;
scrollbar-3dlight-color:#D8D7D5;
scrollbar-darkshadow-color:#D8D7D5;
scrollbar-shadow-color:#D8D7D5;
scrollbar-arrow-color:#000000;
scrollbar-track-color:#D8D7D5;
}
-->
  </STYLE>
  <!--End Cool Web Scrollbars code-->
</div>
</BODY>
</HTML>
<%
RsVerNot.Close()
Set RsVerNot = Nothing
%>
<%
Fotos.Close()
Set Fotos = Nothing
%>
