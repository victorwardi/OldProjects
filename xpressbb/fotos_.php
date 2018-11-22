<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_xpress, $xpress);
$query_foto = "SELECT * FROM fotos ORDER BY id_foto DESC";
$foto = mysql_query($query_foto, $xpress) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);
?>
<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/con_bb.asp" -->
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.brd_laranja {border: 1px solid #FF9900;
}
.brd_laranja {	border: 1px solid #666666;
}
.laranja {font-size: 10px;
	font-weight: bold;
	color: #FF6600;
}
.style15 {	font-size: 9px;
	color: #666666;
}
.style17 {font-size: 9px}
.style3 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style21 {color: #000000; font-weight: bold; font-size: 11px; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #CC0000;
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
-->
</style>
<style type="text/css">
/*inicio:Onde Define a cor e aespessura das margens das Fotos */
#showimage{
	position:absolute;
	visibility:hidden;
	border-left: 3px solid #000000;
	border-right: 3px solid #000000;
	border-bottom: 3px solid #000000;
	z-index: 50;
	background-color: #FFFFFF;
	
}
/*fim*/

/*inicio:Onde Define a cor da margem onde fica o "x" de Fechar */
#dragbar{
	cursor: hand;
	cursor: pointer;
	background-color: #000000;
	min-width: 10px;
	}
/*fim*/

/*inicio:Onde Define a cor do "x" de Fechar */
#dragbar #closetext{
color: #ffffff; 
font-weight: bold;
margin-right: 1px;
font-family:Lucida Console;
}
/*fim*/
</style>
<script type="text/javascript" src="script_foto.js"></script>
</head>
<body onLoad="self.focus()">
<div id="showimage"></div>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<body>
<br />
<table width="404" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="404" colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><table width="145" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="145" scope="col"><table width="145" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="5" scope="col">&nbsp;</th>
            <th width="135" scope="col"><table width="100" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="col"><table border="0">
                      <tr>
                        <%
  ' Horizontal Looper version 3
  While ((Repeat_fotos__numRowsHL <> 0) AND (NOT fotos.EOF))
%>
                        <td width="129" height="75"><table width="129" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#E0E0D7">
                            <tr>
                              <th width="129" align="center" valign="middle" scope="col"><div class="ch" id="Fl" style="width:100;height:75; margin-right:9px;text-align:center;"> <a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>"onclick="return enlarge('<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>',event,'center',512,384);"></a> 
                                <table width="120" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <th scope="col"><img src="images/margem_fotos/topo.jpg" width="120" height="9" /></th>
                                  </tr>
                                  <tr>
                                    <td align="center" background="images/margem_fotos/meio_fundo.jpg"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>" onclick="return enlarge('<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>',event,'center',512,384);"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>" width="100" height="75"   border="0" class="brd_laranja" /></a></td>
                                  </tr>
                                  <tr>
                                    <td><img src="images/margem_fotos/base.jpg" width="120" height="11" /></td>
                                  </tr>
                                </table>
                              </div>
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
            </tr>
        </table></th>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="41" colspan="2" align="center" valign="bottom"><table border="0" width="50%" align="center">
      <tr>
        <td width="31%" align="center"><% If MM_offset <> 0 Then %>
            <a href="<%=MM_movePrev%>" class="style21">Voltar</a>
            <% End If ' end MM_offset <> 0 %></td>
        <td width="30%" align="center"><% If Not MM_atTotal Then %>
              <a href="<%=MM_moveNext%>" class="style21">Mais Fotos </a>
              <% End If ' end Not MM_atTotal %>        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<br />
</body>
</html>
<?php
mysql_free_result($foto);
?>
<%
fotos.Close()
Set fotos = Nothing
%>
