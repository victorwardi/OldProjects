
<%@LANGUAGE="VBSCRIPT"%>

<!--#include file="Connections/con_kiuchi.asp" -->
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
evento_numRows = evento_numRows + Repeat1__numRows
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim evento_total
Dim evento_first
Dim evento_last

' set the record count
evento_total = evento.RecordCount

' set the number of rows displayed on this page
If (evento_numRows < 0) Then
  evento_numRows = evento_total
Elseif (evento_numRows = 0) Then
  evento_numRows = 1
End If

' set the first and last displayed record
evento_first = 1
evento_last  = evento_first + evento_numRows - 1

' if we have the correct record count, check the other stats
If (evento_total <> -1) Then
  If (evento_first > evento_total) Then
    evento_first = evento_total
  End If
  If (evento_last > evento_total) Then
    evento_last = evento_total
  End If
  If (evento_numRows > evento_total) Then
    evento_numRows = evento_total
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

Set MM_rs    = evento
MM_rsCount   = evento_total
MM_size      = evento_numRows
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
evento_first = MM_offset + 1
evento_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (evento_first > MM_rsCount) Then
    evento_first = MM_rsCount
  End If
  If (evento_last > MM_rsCount) Then
    evento_last = MM_rsCount
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
%><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.brdnoticia_branca {border: 1px solid #ffffff;}
.bordad_preta {border: 1px solid #000000;}
.style7 {color: #FFFFFF}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style16 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style20 {
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
a:visited {
	color: #000000;
	text-decoration: none;
}
a:hover {
	color: #999999;
	text-decoration: none;
}
a:active {
	color: #000000;
	text-decoration: none;
}
.style22 {font-size: 9px; color: #000000; font-weight: bold; }
.brd_foto {border: 1px solid #000000;
}
.style23 {font-size: 10px}
a:link {
	text-decoration: none;
}
-->
</style>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
</head>

<body>
<table width="410" height="29" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="col">
      <% 
While ((Repeat1__numRows <> 0) AND (NOT evento.EOF)) 
%>
      <table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr bgcolor="#336699">
          <th height="20" colspan="2" scope="col"><div align="center" class="style16">Galeria: <%=(evento.Fields.Item("titulo").Value)%>  
          </div></th>
        </tr>
        <tr bgcolor="#F2F2F2">
          <td width="153" height="137" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><span class="style7"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')"><img src="fotos/galeria/<%=(evento.Fields.Item("Foto").Value)%>" width="140" height="105" border="1" align="middle" class="brd_foto" bordercolor="#000000"></a><br>
          </span></td>
          <td width="247" height="89" align="center" valign="middle" bgcolor="#CCCCCC"><table width="246" height="24" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <th width="246" align="center" valign="bottom" scope="col"><span class="style20"><%=(evento.Fields.Item("descricao").Value)%></span></th>
            </tr>
          </table>            </td>
        </tr>
        <tr bgcolor="#F2F2F2">
          <td align="center" valign="middle" bgcolor="#CCCCCC" class="style22 style23"><a href="javascript:abrir_janela('galeria_fotos/galeria.asp?Cod=<%=(evento.Fields.Item("Cod").Value)%>','Galeria','','750','500','true')">+ ver fotos</a></td>
        </tr>
        <tr>
          <td colspan="2" class="brdnoticia_branca">&nbsp;</td>
        </tr>
      </table>
      <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  evento.MoveNext()
Wend
%></th>
  </tr>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <% If MM_offset <> 0 Then %>
      <a href="<%=MM_moveFirst%>">Primeira</a>
      <% End If ' end MM_offset <> 0 %>
    </td>
    <td width="31%" align="center">
      <% If MM_offset <> 0 Then %>
      <a href="<%=MM_movePrev%>">Anterior</a>
      <% End If ' end MM_offset <> 0 %>
    </td>
    <td width="23%" align="center">
      <% If Not MM_atTotal Then %>
      <a href="<%=MM_moveNext%>">Pr&oacute;xima</a>
      <% End If ' end Not MM_atTotal %>
    </td>
    <td width="23%" align="center">
      <% If Not MM_atTotal Then %>
      <a href="<%=MM_moveLast%>">&Uacute;ltima</a>
      <% End If ' end Not MM_atTotal %>
    </td>
  </tr>
</table>
<div align="center"></div>
</body>
</html>
<%
evento.Close()
Set evento = Nothing
%>
