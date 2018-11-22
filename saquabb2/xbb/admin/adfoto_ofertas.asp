<%@LANGUAGE="VBSCRIPT"%>
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
<!--#include file="../Connections/con_kiuchi.asp" -->
<%

%>
<!--#include file="caminho.asp" -->
<%


Set Upload = Server.CreateObject("Persits.Upload")
Upload.IgnoreNoPost = True
Upload.SaveToMemory  

    Sub CountThisUser()
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
    Session("count")= intCount
    Set objFS = objFSO.OpenTextFile(file, 2)
    objFS.Write intCount
    objFS.Close
    Set objFSO = Nothing
    Set objFS = Nothing
    End Sub

    If IsEmpty(Session("count")) Then
    Call Countthisuser
    End if


If (Upload.Form("Upload")<>"") Then

	Set File = Upload.Files(1)
	File.SaveAs pasta & "fotos\ofertas\original\" & File.OriginalFileName

nomefoto= Session("count") & ".jpg"
caminho = pasta&"fotos\ofertas\"
destino= caminho & "foto_" & nomefoto

			If File.ImageType <> "UNKNOWN" Then
			
			Set jpeg = Server.CreateObject("Persits.Jpeg")
			jpeg.Open( File.Path )
			If UCase(Right(SavePath, 3)) <> "JPG" Then
				SavePath = SavePath & ".jpg"
			End If
			'Foto Original
			Jpeg.Width = 400
			Session("largura") = Jpeg.Width
			Jpeg.Height = Jpeg.OriginalHeight * Jpeg.Width / Jpeg.OriginalWidth
			Session("altura") = Jpeg.Height

SavePath = caminho & nomefoto

			jpeg.Save SavePath

			'Foto Redimensionada						
		
			jpeg.Width = 150
			jpeg.Height = 133

			SavePath = destino

			jpeg.Save SavePath
			
				
	Session("nomefoto") = nomefoto
End If
End If
If (Upload.Form("Submit")<>"") then
CodNoticia=Upload.Form("CodNoticia")
descricao=Upload.Form("descricao")
fotografo=Upload.Form("fotografo")
largura = Session("largura")
altura = Session("altura")


strconn = "DRIVER=Microsoft Access Driver (*.mdb);DBQ="&pasta&"banco_de_dados\db.mdb" 
dim conn
dim rs
dim strID

set conn = server.createobject("adodb.connection")
conn.open strconn
set rs = server.createobject("adodb.recordset")
rs.open "foto_ofertas", conn, 2, 2
rs.addnew
rs("CodNoticia") = CodNoticia
rs("arquivo") = Session("nomefoto") 
rs("descricao") = descricao
rs("fotografo") = fotografo
rs("largura") = largura
rs("altura") = altura
rs.update
rs.movelast
strID = rs("CodFoto")
rs.close
set rs= nothing
set conn = nothing

Session.Contents.Remove("nomefoto")
Session.Contents.Remove("altura")
Session.Contents.Remove("largura")
Session.Contents.Remove("count")
Response.Redirect("adminlink.asp")
End If
Set upl = Nothing

%>
<%
Dim Rs_foto
Dim Rs_foto_numRows

Set Rs_foto = Server.CreateObject("ADODB.Recordset")
Rs_foto.ActiveConnection = MM_con_kiuchi_STRING
Rs_foto.Source = "SELECT * FROM ofertas ORDER BY CodNoticia DESC"
Rs_foto.CursorType = 0
Rs_foto.CursorLocation = 2
Rs_foto.LockType = 1
Rs_foto.Open()

Rs_foto_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 20
Repeat1__index = 0
Rs_foto_numRows = Rs_foto_numRows + Repeat1__numRows

%>
<HTML>
<HEAD>
<TITLE></TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.style23 {font-size: 18px}
.style26 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="464" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
  <tr>
    <td width="795" height="24" bgcolor="#66CC99"><div align="center" class="style23">
      <div align="center" class="style26">:: Adicionar Foto À Oferta :: </div>
    </div></td>
  </tr>
  <tr>
    <td><FORM ACTION="adfoto_ofertas.asp" METHOD="POST" enctype="multipart/form-data" target="_self">
      <br>
      <table width="358" height="338" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#666666" class="tbl">
        <% if (Session("nomefoto") = "") then%>
		<tr>
          <td>Foto:</td>
          <td height="46" colspan="3"><br>
            <input name="foto" type=FILE id="foto4" size=30>              
            <br>
              <input name="upload" type="submit" id="upload4" value="upload"></td>
        </tr>
		<% End If %>
		<% if (Session("nomefoto") <> "") then%>
        <tr>
          <td>evento:</td>
          <td height="46" colspan="3">
            <select name="CodNoticia" id="select3">
              <option selected>Escolha uma oferta</option>
              <% 
While ((Repeat1__numRows <> 0) AND (NOT Rs_foto.EOF)) 
%>
              <option value="<%=(Rs_foto.Fields.Item("CodNoticia").Value)%>"><%=(Rs_foto.Fields.Item("resumo").Value)%> - <%=(Rs_foto.Fields.Item("data").Value)%></option>
              <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  Rs_foto.MoveNext()
Wend
%>
            </select>
          </td>
        </tr>
        <tr>
          <td>Descri&ccedil;&atilde;o:</td>
          <td height="46" colspan="3"><input name="descricao" type="text" id="descricao4" size="50"></td>
        </tr>
        <tr>
          <td>Fot&oacute;grafo:</td>
          <td height="46" colspan="3"><input name="fotografo" type="text" id="fotografo4" size="50"></td>
        </tr>
        <% if (Session("nomefoto") <> "") then%>
		<tr>
          <td>&nbsp;</td>
          <td><table width="403" border="0" cellpadding="0" cellspacing="0" class="tbl">
              
              <tr>
                <td height="26" valign="bottom"><% =Session("nomefoto")%>
                </td>
              </tr>
              <tr>
                <td height="36" valign="top"><img src="../fotos/ofertas/foto_<% =Session("nomefoto")%>" alt="" width="100" height="75" border="0"></td>
                </tr>
              
          </table></td>
        </tr>
		<% End If %>
        <tr>
          <td width="334">&nbsp;</td>
          <td width="334" height="60" colspan="3">
            <INPUT name="Submit" TYPE=SUBMIT id="Submit4" VALUE="Enviar">
          </td>
        </tr>
		<% End If %>
      </table>
      <p>&nbsp;</p>
    </FORM>
    <p>&nbsp;</p></td>
  </tr>
</table>
<br>
</BODY>
</HTML>
<%
Rs_foto.Close()
Set Rs_foto = Nothing
%>
