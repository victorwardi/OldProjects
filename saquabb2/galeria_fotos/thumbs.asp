<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/conSurf.asp" -->
<%
Dim RsGaleria__MMColParam
RsGaleria__MMColParam = "1"
If (Request.QueryString("Cod") <> "") Then 
  RsGaleria__MMColParam = Request.QueryString("Cod")
End If
%>
<%
Dim RsGaleria
Dim RsGaleria_numRows

Set RsGaleria = Server.CreateObject("ADODB.Recordset")
RsGaleria.ActiveConnection = MM_conSurf_STRING
RsGaleria.Source = "SELECT * FROM fotos WHERE CodGaleria = " + Replace(RsGaleria__MMColParam, "'", "''") + " ORDER BY CodFoto DESC"
RsGaleria.CursorType = 0
RsGaleria.CursorLocation = 2
RsGaleria.LockType = 1
RsGaleria.Open()

RsGaleria_numRows = 0
%>
<%
Dim Repeat_RsGaleria__numRowsHL
Dim Repeat_RsGaleria__indexHL

Repeat_RsGaleria__numRowsHL = 10
Repeat_RsGaleria__indexHL = 0
RsGaleria_numRows = RsGaleria_numRows + Repeat_RsGaleria__numRowsHL
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim RsGaleria_total
Dim RsGaleria_first
Dim RsGaleria_last

' set the record count
RsGaleria_total = RsGaleria.RecordCount

' set the number of rows displayed on this page
If (RsGaleria_numRows < 0) Then
  RsGaleria_numRows = RsGaleria_total
Elseif (RsGaleria_numRows = 0) Then
  RsGaleria_numRows = 1
End If

' set the first and last displayed record
RsGaleria_first = 1
RsGaleria_last  = RsGaleria_first + RsGaleria_numRows - 1

' if we have the correct record count, check the other stats
If (RsGaleria_total <> -1) Then
  If (RsGaleria_first > RsGaleria_total) Then
    RsGaleria_first = RsGaleria_total
  End If
  If (RsGaleria_last > RsGaleria_total) Then
    RsGaleria_last = RsGaleria_total
  End If
  If (RsGaleria_numRows > RsGaleria_total) Then
    RsGaleria_numRows = RsGaleria_total
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

Set MM_rs    = RsGaleria
MM_rsCount   = RsGaleria_total
MM_size      = RsGaleria_numRows
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
RsGaleria_first = MM_offset + 1
RsGaleria_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (RsGaleria_first > MM_rsCount) Then
    RsGaleria_first = MM_rsCount
  End If
  If (RsGaleria_last > MM_rsCount) Then
    RsGaleria_last = MM_rsCount
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
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	background-color: #FF99CC;
	background-image: url();
}
.style2 {color: #FFFFFF}
.brd {
	border: 1px solid #333333;
}
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
//-->
</script>
<body scroll="no">
<div id="Layer1" style="position:absolute; width:94px; height:105px; z-index:1; left: 14px; top: -4px;">
  <div align="center"><span class="style2"><img src="../images/spacer.gif" width="1" height="10"> --</span><br>
      <span class="style2">--</span><br>
  </div>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">        <table border="0">
          <tr>
            <%
  ' Horizontal Looper version 3
  While ((Repeat_RsGaleria__numRowsHL <> 0) AND (NOT RsGaleria.EOF))
%>
            <td><a href="foto.asp?CodFoto=<%=(RsGaleria.Fields.Item("CodFoto").Value)%>" target="foto"><img src="gerath.asp?arquivo=../fotos/<%=(RsGaleria.Fields.Item("arquivo").Value)%>" width="60" height="50" border="0" class="brd"></a></td>
            <%
    'Horizontal Looper version 3
    Repeat_RsGaleria__indexHL=Repeat_RsGaleria__indexHL+1
    Repeat_RsGaleria__numRowsHL=Repeat_RsGaleria__numRowsHL-1
    RsGaleria.MoveNext()
    if len(nested_RsGaleria)<=0 then
      nested_RsGaleria = 1
    end if
    if ((Repeat_RsGaleria__numRowsHL <> 0) AND (NOT RsGaleria.EOF) AND (nested_RsGaleria mod 2 = 0)) then
      Response.Write "</tr><tr>"
    end if
    nested_RsGaleria = nested_RsGaleria + 1
    'end horizontal looper version 3
  Wend
%>
          </tr>
              </table></td>
    </tr>
    <tr>
      <td height="3" ></td>
    </tr>
</table>
  <table border="0" width="87" align="center">
    <tr>
      <td width="53%" align="center">
        <% If MM_offset <> 0 Then %>
        <a href="<%=MM_movePrev%>"><img src="../images/esq.gif" width="24" height="24" border="0"></a>
        <% End If ' end MM_offset <> 0 %>
      </td>
      <td width="47%" align="right">
        <% If Not MM_atTotal Then %>
        <a href="<%=MM_moveNext%>"><img src="../images/dir.gif" width="24" height="24" border="0"></a>
        <% End If ' end Not MM_atTotal %></td>
    </tr>
  </table>
  <div align="right"></div>
</div>

</body>
<%
RsGaleria.Close()
Set RsGaleria = Nothing
%>
