<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<%
' *** Restrict Access To Page: Grant or deny access to this page
MM_authorizedUsers=""
MM_authFailedURL="default.asp"
MM_grantAccess=false
If Session("MM_Username") <> "" Then
  If (true Or CStr(Session("MM_UserAuthorization"))="") Or _
         (InStr(1,MM_authorizedUsers,Session("MM_UserAuthorization"))>=1) Then
    MM_grantAccess = true
  End If
End If
If Not MM_grantAccess Then
  MM_qsChar = "?"
  If (InStr(1,MM_authFailedURL,"?") >= 1) Then MM_qsChar = "&"
  MM_referrer = Request.ServerVariables("URL")
  if (Len(Request.QueryString()) > 0) Then MM_referrer = MM_referrer & "?" & Request.QueryString()
  MM_authFailedURL = MM_authFailedURL & MM_qsChar & "accessdenied=" & Server.URLEncode(MM_referrer)
  Response.Redirect(MM_authFailedURL)
End If
%>
<!--#include file="config_caminho.asp" -->
<%
Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory

If (Upload.Form("Upload")<>"") Then

    Dim objFSO, objFS, file, intCount
    file = Server.MapPath("hits.txt")
    Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
    If objFSO.FileExists(file) Then
    Set objFS = objFSO.OpenTextFile(file, 1)
    Else
    Set objFS = objFSO.CreateTextFile(file, True)
    End If
    If Not objFS.AtEndOfStream Then
    intCount = objFS.ReadAll
    Else
    intCount = 0
    End If
    objFS.Close
    intCount = intCount + 1
    Set objFS = objFSO.OpenTextFile(file, 2)
    objFS.Write intCount
    objFS.Close
    Set objFSO = Nothing
    Set objFS = Nothing

	Set File = Upload.Files(1)

nomearquivo="p_" & intCount & ".jpg"
Session("capa")=nomearquivo
destino= pasta & "high_quality_photos\fotos\"

	File.SaveAs pasta & "high_quality_photos\fotos\original\" & File.OriginalFileName
		
	
			If File.ImageType <> "UNKNOWN" Then

			Set jpeg = Server.CreateObject("Persits.Jpeg")
			
			jpeg.Open( File.Path )
			
			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If
		
			jpeg.Width = 140
			Jpeg.Height = 105
			
			jpeg.Save destino & nomearquivo
			
	End If
End If
%>
<%

If (Upload.Form("Submit")<>"") then

dim conn
dim rs
dim strID
dim compra

If Upload.Form("compra")= "1" then
compra = TRUE
Else
compra = FALSE
End If

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "high_quality_photos", conn, 2, 2
rs.addnew
rs("nome") = Upload.Form("titulo")
rs("Data") = Upload.Form("data")
rs("Thumb") = Session("capa")
rs("Fotografo") = Upload.Form("fotografo")
rs("Tipo") = Upload.Form("tipo")
rs("NCompra") = Compra
rs("pasta") = Upload.Form("pasta")
rs.update
rs.movelast
strID = rs("Cod")
rs.close
set rs= nothing
set conn = nothing

Session.Contents.Remove("capa")
Response.Redirect("adminlink.asp")
End If

Set Upl = Nothing
%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style></head>

<body>
<div align="left"></div>
<form action="adicionar_high_quality_photos.asp" method="post" enctype="multipart/form-data" name="Formulario" id="Formulario">
  <table width="422"  border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF" class="tdnot">
          <tr align="center" bgcolor="#FFFFFF">
            <td height="20" colspan="2" class="titmateria"><div align="left" class="style1">..:: Adicionar high_quality_photos</div></td>
    </tr>
<% If  Session("capa")="" Then %>
    <tr>
      <td>Foto de Capa (140x105):</td>
            <td><input type="file" name="file"></td>
    </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="Upload" type="submit" id="Upload" value="Upload"></td>
          </tr>
<% End If %>		  
<% If Session("capa")<>"" then %>
    <tr>
      <td>&nbsp;</td>
            <td><img src="../high_quality_photos/fotos/<%=Session("capa")%>"></td>
    </tr>
    <tr>
      <td width="154">T&iacute;tulo:</td>
            <td width="250"><input name="titulo" type="text" class="input" size="30"></td>
    </tr>
    <tr>
      <td>Data:</td>
            <td><input name="data" type="text" class="input" id="data" size="15"></td>
    </tr>
    <tr>
      <td>Fot&oacute;grafo:</td>
            <td><input name="fotografo" type="text" class="input" id="fotografo" size="20"></td>
    </tr>
    <tr>
      <td>Pasta (Nome da pasta que jogou no FTP):</td>
            <td><input name="pasta" type="text" class="input" id="pasta" size="20"></td>
    </tr>
          <tr align="center">
            <td colspan="2"><input name="Submit" type="submit" id="Submit" value="Enviar"></td>
          </tr>
<% End If %>		  
  </table>
  <div align="left">        </div>
</form>
<div align="left"></div>
</body>
</html>
