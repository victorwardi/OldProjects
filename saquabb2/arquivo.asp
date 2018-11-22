<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/conSurf.asp" -->
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
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 5
Repeat1__index = 0
RsNot_numRows = RsNot_numRows + Repeat1__numRows
%>
<%
'  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

Dim RsNot_total
Dim RsNot_first
Dim RsNot_last

' set the record count
RsNot_total = RsNot.RecordCount

' set the number of rows displayed on this page
If (RsNot_numRows < 0) Then
  RsNot_numRows = RsNot_total
Elseif (RsNot_numRows = 0) Then
  RsNot_numRows = 1
End If

' set the first and last displayed record
RsNot_first = 1
RsNot_last  = RsNot_first + RsNot_numRows - 1

' if we have the correct record count, check the other stats
If (RsNot_total <> -1) Then
  If (RsNot_first > RsNot_total) Then
    RsNot_first = RsNot_total
  End If
  If (RsNot_last > RsNot_total) Then
    RsNot_last = RsNot_total
  End If
  If (RsNot_numRows > RsNot_total) Then
    RsNot_numRows = RsNot_total
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

Set MM_rs    = RsNot
MM_rsCount   = RsNot_total
MM_size      = RsNot_numRows
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
RsNot_first = MM_offset + 1
RsNot_last  = MM_offset + MM_size

If (MM_rsCount <> -1) Then
  If (RsNot_first > MM_rsCount) Then
    RsNot_first = MM_rsCount
  End If
  If (RsNot_last > MM_rsCount) Then
    RsNot_last = MM_rsCount
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>SAQUABB.com.br _________ By Wardesign.com.br _____________________________________________________________________________</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-image:  url(imagens/fundo.gif);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.brd {border: 1px solid #000000;
}
.style23 {
	font-size: 10px;
	color: #FF6600;
	font-weight: bold;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 10px;
	font-weight: bold;
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
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style59 {
	font-size: 10px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
}
.style60 {font-weight: bolder; font-family: Geneva, Arial, Helvetica, sans-serif;}
a {
	font-weight: bold;
}
.linha {
	border-bottom-style: solid;
	border-bottom-color: #000000;
	border-bottom-width: 1px;	
	
}
.mao {
	cursor: hand;
}
-->
</style>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style62 {font-size: 12px}
.linha {
}
-->
</style>
<!-- InstanceEndEditable -->

</head>

<body>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="brd">
  <tr>
    <th align="center" valign="top" scope="col"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
      <tr>
        <th align="center" valign="top" scope="col"><table  border="0" cellpadding="0" cellspacing="0">
            <tr align="left" valign="top">
              <th colspan="3" scope="col"><img src="imagens/topo/modelos/topo_r1_c1.jpg" width="779" height="17"></th>
            </tr>
            <tr>
              <th rowspan="2" scope="col"><img src="imagens/topo/modelos/topo_r2_c1.jpg" width="10" height="139"></th>
              <td height="43"><img src="publicidade/saquabb_publicidade.gif" width="468" height="60"></td>
              <td rowspan="2" align="left" valign="top"><img src="imagens/topo/modelos/topo_r2_c5.jpg" width="301" height="139" border="0" usemap="#Map2"></td>
            </tr>
            <tr>
              <td align="left" valign="top"><img src="imagens/topo/modelos/topo_r3_c2.jpg" width="468" height="79" border="0" usemap="#Map"></td>
            </tr>
            <tr>
              <td colspan="3"><!-- InstanceBeginEditable name="titulo" -->
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="21%" align="left" scope="col"><img src="imagens/topo/modelos/topo_r4_c1.jpg" width="170" height="64"></th>
                    <th width="48%" align="center" valign="top" scope="col"><img src="imagens/topo/topos/noticias.jpg" width="288" height="61"></th>
                    <th width="31%" align="right" valign="top" scope="col"><img src="imagens/topo/modelos/topo_r4_c4.jpg" width="319" height="64"></th>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></td>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="80%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="tabela_principal" -->
          <table width="610" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" valign="bottom" scope="col"><img src="imagens/topo_tabela.jpg" width="610" height="7"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="imagens/fundo_tabela.jpg">
                <% 
While ((Repeat1__numRows <> 0) AND (NOT RsNot.EOF)) 
%>
                <table width="90%"  border="0" cellpadding="0" cellspacing="0" class="linha">
                  <tr>
                    <th width="20%" scope="col">&nbsp;</th>
                    <th width="80%" scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="center" valign="middle" scope="col"><span class="data"><a href="../mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>"><img src="fotos/peq/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="75" height="56" hspace="5" border="0" align="center" class="brd"></a></span></th>
                    <th align="left" valign="middle" class="style59 style62" scope="col"><%=(RsNot.Fields.Item("data").Value)%> - <%=(RsNot.Fields.Item("titulo").Value)%></th>
                  </tr>
                  <tr>
                    <th height="12" scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
</table>
                <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsNot.MoveNext()
Wend
%></td>
            </tr>
            <tr>
              <td align="center" valign="top" background="imagens/fundo_tabela.jpg"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th height="32" scope="col">
                    <table border="0" width="50%" align="center">
                      <tr>
                        <td width="23%" align="center">
                          <% If MM_offset <> 0 Then %>
                          <a href="<%=MM_moveFirst%>"><img src="retalhos/First.gif" alt="1ª Página" border=0></a>
                          <% End If ' end MM_offset <> 0 %>
                        </td>
                        <td width="31%" align="center">
                          <% If MM_offset <> 0 Then %>
                          <a href="<%=MM_movePrev%>"><img src="retalhos/Previous.gif" alt="Anterior" border=0></a>
                          <% End If ' end MM_offset <> 0 %>
                        </td>
                        <td width="23%" align="center">
                          <% If Not MM_atTotal Then %>
                          <a href="<%=MM_moveNext%>"><img src="retalhos/Next.gif" alt="Avançar" border=0></a>
                          <% End If ' end Not MM_atTotal %>
                        </td>
                        <td width="23%" align="center">
                          <% If Not MM_atTotal Then %>
                          <a href="<%=MM_moveLast%>"><img src="retalhos/Last.gif" alt="Última Página" border=0></a>
                          <% End If ' end Not MM_atTotal %>
                        </td>
                      </tr>
                    </table></th>
                </tr>
              </table>                <img src="imagens/base_tabela.jpg" width="610" height="7"></td>
            </tr>
          </table>
          <br>
        <!-- InstanceEndEditable --></th>
        <th width="20%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="publicidade" -->
          <table width="150"  border="0" cellspacing="0" cellpadding="0">
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
                  <p>&nbsp;</p></td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="retalhos/base_publi.jpg" width="150" height="12"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="10" align="center" valign="top" background="retalhos/fundo_base.jpg" scope="col"><img src="retalhos/fundo_base.jpg" width="1" height="10"></th>
          </tr>
          <tr>
            <td height="25" align="center" valign="middle" background="retalhos/meio_fundo.jpg" bgcolor="#D65501"><span class="style59"><a href="home.asp">Home</a> -<a href="arquivo.asp"> Not&iacute;cias</a> - <a href="galerias.asp">Galerias</a> -<a href="atletas.asp"> Atletas</a> - <a href="festa.asp">Festas</a> - <a href="contato.asp" class="style60">Contato</a></span> </td>
          </tr>
          <tr>
            <td background="retalhos/fundo_base_invert.jpg"><img src="retalhos/fundo_base_invert.jpg" width="1" height="10"></td>
          </tr>
        </table></th>
      </tr>
      <tr valign="middle" bgcolor="#FFE6CC">
        <th height="25" colspan="2" align="center" scope="col"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="style23" scope="col"> Saquabb.com.br &copy; 2005 . Todos os Direitos Reservados . Desenvolvido Por <a href="http://www.wardesign.com.br">Wardesign.com.br </a> </th>
          </tr>
        </table></th>
        </tr>
    </table></td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="62,60,105,79" href="home.asp">
  <area shape="rect" coords="120,42,186,61" href="arquivo.asp">
  <area shape="rect" coords="201,31,268,46" href="galerias.asp">
  <area shape="rect" coords="283,26,341,47" href="atletas.asp">
  <area shape="rect" coords="357,28,412,58" href="festa.asp">
  <area shape="rect" coords="424,46,482,76" href="contato.asp">
  <area shape="rect" coords="466,59,479,75" href="#">
  <area shape="rect" coords="25,67,44,86" href="contato.asp">
  <area shape="rect" coords="2,69,15,83" href="home.asp">
</map>
<map name="Map2">
  <area shape="rect" coords="-3,120,15,135" href="contato.asp">
</map>
</body>
<!-- InstanceEnd --></html>
<%
RsNot.Close()
Set RsNot = Nothing
%>
