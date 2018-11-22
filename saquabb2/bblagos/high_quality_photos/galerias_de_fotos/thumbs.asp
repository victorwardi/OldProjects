<%@LANGUAGE="VBSCRIPT"%>
<%
Option Explicit
Response.Expires = 0
Response.Buffer = True
Session.LCID = 1110
%>
<!--#include file="../../Connections/conexao.asp" -->
<%
Dim RsAlbum__MMColParam
RsAlbum__MMColParam = "1"
If (Request.QueryString("cod") <> "") Then 
  RsAlbum__MMColParam = Request.QueryString("cod")
End If
%>
<%
Dim RsAlbum
Dim RsAlbum_numRows

Set RsAlbum = Server.CreateObject("ADODB.Recordset")
RsAlbum.ActiveConnection = MM_conexao_STRING
RsAlbum.Source = "SELECT * FROM high_quality_photos WHERE cod = " + Replace(RsAlbum__MMColParam, "'", "''") + " ORDER BY cod DESC"
RsAlbum.CursorType = 0
RsAlbum.CursorLocation = 2
RsAlbum.LockType = 1
RsAlbum.Open()

RsAlbum_numRows = 0
%>
<%
'PAGINAÇÃO DE ARQUIVOS USANDO ARRAY x FSO
Dim iLoop, limite, pagina, totalarq, i
Dim vlMaximo, vlMinimo, anterior, extensao
Dim ObjFso, ObjArq, ObjPasta, ObjSubPasta, foldercollection, folder, SubArq
Dim dir_string, dir

dir = (RsAlbum.Fields.Item("pasta").Value)

dir_string = dir & "/"

Set ObjFso = Server.CreateObject("Scripting.FileSystemObject")
Set ObjPasta = ObjFso.GetFolder(Server.MapPath(dir_string))
Set foldercollection = ObjPasta.SubFolders

totalarq = 0

For Each folder In foldercollection
	For Each SubArq in folder.Files
		extensao = right(SubArq.Name, 3)
		if extensao = "gif" or extensao = "jpg" or extensao = "JPG" Then
			totalarq = totalarq + 1
		end if
	Next
Next


limite = 5 ' limite de registros por página
totalarq = totalarq + ObjPasta.files.count' total de arquivos encontrados

ReDim arrAvatar((totalarq-1))
Dim y
y = 0

' guardamos cada arquivo dentro de um array

For Each ObjArq in ObjPasta.Files
	extensao = right(ObjArq.Name, 3)
	if extensao = "gif" or extensao = "jpg" or extensao = "JPG" Then
		arrAvatar(y) = objArq.Name
		y = y + 1
	end if
Next
For Each folder In foldercollection
	For Each SubArq in folder.Files
	extensao = right(ObjArq.Name, 3)
	if extensao = "gif" or extensao = "jpg" or extensao = "JPG" Then
		arrAvatar(y) = folder.name & "/" & SubArq.Name
		y = y + 1
	end if
	Next
Next

Set SubArq = Nothing
Set Folder = Nothing
Set ObjArq = Nothing
Set ObjPasta = Nothing
Set ObjFso = Nothing

pagina = Request("pag")
IF pagina = "" Then
IF limite < UBound(arrAvatar) Then
vlMinimo = 0
vlMaximo = (limite-1)
Else
vlMinimo = LBound(arrAvatar)
vlMaximo = UBound(arrAvatar)
End IF
pagina = 1
anterior = ""
Else
vlMinimo = (pagina*(limite-1))+(pagina)
vlMaximo = ((limite-1)*(pagina+1))+((pagina)*1)
IF vlMaximo > UBound(arrAvatar) Then vlMaximo = UBound(arrAvatar)
pagina = pagina + 1
anterior = pagina - 2
IF anterior = 0 Then anterior = ""
End IF
%>
<html>
<head>
<title>Saquabb.com.br</title>
<base target="principal">
<link href="../stilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
	scrollbar-face-color: #000000;;
}
.brd {	border: 4px solid #ffffff;
}
.brd2 {	border: 1px solid #000000;
}
.bordapretaimg {
	border:1px solid #FF6600;
}
body,td,th {
	color: #000000;
}
a:link {
	color: #3366CC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3366CC;
}
a:hover {
	text-decoration: none;
	color: #000099;
}
a:active {
	text-decoration: none;
	color: #3366CC;
}
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style6 {
	color: #3366CC;
	font-weight: bold;
}
-->
</style></head>
<div align="center">
<body>
<%
Dim Th
th=Request.QueryString("th")
If th <> "" then
%>
<table width="100" border="0" cellspacing="2" cellpadding="2">
<%
Dim Ultima
Ultima=Ubound(arrAvatar)
For i = vlMinimo to vlMaximo
response.write "<tr><td align=""center""><a target=""principal"" href=""thumbs.asp?Cod="&RsAlbum__MMColParam&"&foto="&i&"&ultima="&ultima&"""><img src=""gerath.asp?arquivo="&dir_string&arrAvatar(i)&""" class=""brd2"" border=""1"" ></a><br></td></tr>"
Next
%>
</table>
<%
IF vlMinimo = 0 Then
IF Not (vlMaximo >= (y-1)) Then
response.write "<a target=""_self"" href="""&Request.ServerVariables("SCRIPT_NAME")&"?Cod="&RsAlbum__MMColParam&"&pag="& pagina &"&th=1""><strong>Avan&ccedil;ar >> </strong></a><br>"
End IF
Else
IF Not (vlMaximo >= (y-1)) Then
response.write "<a target=""_self"" href="""&Request.ServerVariables("SCRIPT_NAME")&"?Cod="&RsAlbum__MMColParam&"&pag="& pagina &"&th=1""><strong>Avan&ccedil;ar >> </strong></a><br>"
End IF
response.write "<a target=""_self"" href="""&Request.ServerVariables("SCRIPT_NAME")&"?Cod="&RsAlbum__MMColParam&"&pag="& anterior &"&th=1""><strong><< Voltar</strong></a>"
End IF


End If
%>

<%
Dim Foto
Ultima=Request.QueryString("Ultima")
Foto=Request.QueryString("foto")

If Foto<> "" Then
%>
<table width="94%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="43%" align="center"><table width="499" border="0" cellspacing="0" cellpadding="0">
      <tr align="center" valign="middle">
        <td colspan="2" valign="bottom">
		<% If Foto<>Ultima Then %>
		<a href="thumbs.asp?foto=<%=(Foto+1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>"><img src="<%=dir_string&arrAvatar(foto)%>" alt="Clique Para Avançar" border="0" class="brd2"></a>
		<% Else %>
        <a href="thumbs.asp?foto=<%=(Foto+1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>"><img src="<%=dir_string&arrAvatar(foto)%>" alt="Clique Para Avançar" border="0" class="brd2" bordercolor="#ffffff" ></a>        <% End If %></td>
      </tr>
      <tr>
        <td height="5" align="right"></td>
        <td></td>
      </tr>
      <tr>
        <td width="50%" align="right">
		<% If Foto=0 Then %>
		<div align="center"></div>
		</td>
        <td width="50%" valign="top">
		<div align="center" class="style6"><span class="style6"><a href="thumbs.asp?foto=<%=(Foto+1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>"><strong>Pr&oacute;xima Fot</strong></a></span><a href="thumbs.asp?foto=<%=(Foto+1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>"><strong>o </strong></a></div>
		<% Else %>
		<div align="center" class="style6"><a href="thumbs.asp?foto=<%=(Foto-1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>">Foto Anterior</a></div>		</td>
        <td width="50%" align="right" valign="top">
		  <% If Foto<>Ultima Then %>
		<div align="center"><a href="thumbs.asp?foto=<%=(Foto+1)%>&Cod=<%=RsAlbum__MMColParam%>&ultima=<%=ultima%>"><strong>Pr&oacute;xima Foto</strong></a> </div>
		<% End If %>
		<% End If %>		</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"></div>
		  <%
		If (RsAlbum.Fields.Item("NCompra").Value) Then%>
          <div align="center"></div>
          <% End If %>		</td>
        </tr>
    </table></td>
  </tr>
</table>
<%
End If
%>
  <%
RsAlbum.Close()
Set RsAlbum = Nothing
%>
