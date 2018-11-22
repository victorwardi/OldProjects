<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conSurf.asp" -->
<%
Dim rs_oferta
Dim rs_oferta_numRows

Set rs_oferta = Server.CreateObject("ADODB.Recordset")
rs_oferta.ActiveConnection = MM_conSurf_STRING
rs_oferta.Source = "SELECT * FROM noticias ORDER BY CodNoticia DESC"
rs_oferta.CursorType = 0
rs_oferta.CursorLocation = 2
rs_oferta.LockType = 1
rs_oferta.Open()

rs_oferta_numRows = 0
%>
<%
Dim Repeat_rs_oferta__numRowsHL
Dim Repeat_rs_oferta__indexHL

Repeat_rs_oferta__numRowsHL = 18
Repeat_rs_oferta__indexHL = 0
rs_oferta_numRows = rs_oferta_numRows + Repeat_rs_oferta__numRowsHL
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim rs_oferta_total
Dim rs_oferta_first
Dim rs_oferta_last

' set the record count
rs_oferta_total = rs_oferta.RecordCount

' set the number of rows displayed on this page
If (rs_oferta_numRows < 0) Then
  rs_oferta_numRows = rs_oferta_total
Elseif (rs_oferta_numRows = 0) Then
  rs_oferta_numRows = 1
End If

' set the first and last displayed record
rs_oferta_first = 1
rs_oferta_last  = rs_oferta_first + rs_oferta_numRows - 1

' if we have the correct record count, check the other stats
If (rs_oferta_total <> -1) Then
  If (rs_oferta_first > rs_oferta_total) Then
    rs_oferta_first = rs_oferta_total
  End If
  If (rs_oferta_last > rs_oferta_total) Then
    rs_oferta_last = rs_oferta_total
  End If
  If (rs_oferta_numRows > rs_oferta_total) Then
    rs_oferta_numRows = rs_oferta_total
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

Set MM_rs    = rs_oferta
MM_rsCount   = rs_oferta_total
MM_size      = rs_oferta_numRows
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
rs_oferta_first = MM_offset + 1
rs_oferta_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (rs_oferta_first > MM_rsCount) Then
    rs_oferta_first = MM_rsCount
  End If
  If (rs_oferta_last > MM_rsCount) Then
    rs_oferta_last = MM_rsCount
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
<html>
	<head>
		<title>flog do Victor</title>
		


	<style>
		

/* PADRAO */

body,a,td{font-size:11px;}
body,a,td{font-family:Tahoma,Helvetica,Arial;}
body,td{text-decoration:none;}

body,td{color:#ffffff;}
body{background-color:#6699CC;}

input,select{border:1px solid #000;font-size:10px;background:#FFF;}

a:link{text-decoration:none;}
a:hover{text-decoration:none;}
a{text-decoration:none;}
a{
	color:#000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}


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
min-width: 100px; /*NS6 style to overcome bug*/
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

body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.bordad_preta {border: 1px solid #000000;}
.style7 {color: #FFFFFF}
.style8 {
	color: #000000;
	font-size: 18px;
	font-weight: bold;
}
</style>
<script type="text/javascript" src="script_foto.js">
</script>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body onload="self.focus()">
<p class="style8">Album teste</p>
<div id="showimage"></div>



<table border="0">
  <tr>
    <%
  ' Horizontal Looper version 3
  While ((Repeat_rs_oferta__numRowsHL <> 0) AND (NOT rs_oferta.EOF))
%>
    <td height="75"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#E0E0D7">
        <tr>
          <th width="100" align="center" valign="middle" scope="col"><div class=ch id=Fl style="width:100;height:75; margin-right:9px;text-align:center;"> <a href="fotos/grande/<%=(rs_oferta.Fields.Item("foto").Value)%>" onclick="return enlarge('fotos/grande/<%=(rs_oferta.Fields.Item("foto").Value)%>',event,'center',512,384);"> <img src="fotos/grande/<%=(rs_oferta.Fields.Item("foto").Value)%>" width="100" height="75"   border="0"></a> </div></th>
        </tr>
    </table></td>
    <%
    'Horizontal Looper version 3
    Repeat_rs_oferta__indexHL=Repeat_rs_oferta__indexHL+1
    Repeat_rs_oferta__numRowsHL=Repeat_rs_oferta__numRowsHL-1
    rs_oferta.MoveNext()
    if len(nested_rs_oferta)<=0 then
      nested_rs_oferta = 1
    end if
    if ((Repeat_rs_oferta__numRowsHL <> 0) AND (NOT rs_oferta.EOF) AND (nested_rs_oferta mod 6 = 0)) then
      Response.Write "</tr><tr>"
    end if
    nested_rs_oferta = nested_rs_oferta + 1
    'end horizontal looper version 3
  Wend
%>

</tr>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <% If MM_offset <> 0 Then %>
      <a href="<%=MM_moveFirst%>">First</a>
      <% End If ' end MM_offset <> 0 %>
    </td>
    <td width="31%" align="center">
      <% If MM_offset <> 0 Then %>
      <a href="<%=MM_movePrev%>">Previous</a>
      <% End If ' end MM_offset <> 0 %>
    </td>
    <td width="23%" align="center">
      <% If Not MM_atTotal Then %>
      <a href="<%=MM_moveNext%>">Next</a>
      <% End If ' end Not MM_atTotal %>
    </td>
    <td width="23%" align="center">
      <% If Not MM_atTotal Then %>
      <a href="<%=MM_moveLast%>">Last</a>
      <% End If ' end Not MM_atTotal %>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p><span class="style7"></span></p>
</body>
</html>
<%
rs_oferta.Close()
Set rs_oferta = Nothing
%>
