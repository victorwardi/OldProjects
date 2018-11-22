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
<!--#include file="../Connections/conSurf.asp" -->
<%
'UPLOAD
pasta = "C:\inetpub\wwwroot\saquabb.com.br\"
'quando for publicar na internet deixe o caminho assim: pasta = "C:\inetpub\wwwroot\saquabb.com.br\" '


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
	File.SaveAs pasta & "fotos\upload\" & File.OriginalFileName

nomefoto= Session("count") & ".jpg"
caminho = pasta&"fotos\"
destino= caminho & "192x144_" & nomefoto

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
		
			jpeg.Width = 192
			jpeg.Height = 144

			SavePath = destino

			jpeg.Save SavePath
			
				
	Session("nomefoto") = nomefoto
End If
End If
If (Upload.Form("Submit")<>"" AND Upload.Form("CodGaleria")<>"0") then
CodGaleria=Upload.Form("CodGaleria")
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
rs.open "fotos", conn, 2, 2
rs.addnew
rs("CodGaleria") = CodGaleria
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
Session.Contents.Remove("erro")
Session.Contents.Remove("altura")
Session.Contents.Remove("largura")
Session.Contents.Remove("count")
Response.Redirect("adminlink.asp")
End If
Set upl = Nothing

%>
<%
Dim RsGalerias
Dim RsGalerias_numRows

Set RsGalerias = Server.CreateObject("ADODB.Recordset")
RsGalerias.ActiveConnection = MM_conSurf_STRING
RsGalerias.Source = "SELECT * FROM Galerias ORDER BY Cod ASC"
RsGalerias.CursorType = 0
RsGalerias.CursorLocation = 2
RsGalerias.LockType = 1
RsGalerias.Open()

RsGalerias_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = -1
Repeat1__index = 0
RsGalerias_numRows = RsGalerias_numRows + Repeat1__numRows

%>
<HTML>
<HEAD>
<TITLE>SAQUABB ADMIN</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../banco_de_dados/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style1 {color: #000000}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="464" border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#000099">
  <tr>
    <td width="795" height="25" bgcolor="#FFFFFF"><div align="left"><span class="tur">:::<span class="style1">:: Adicionar Foto na Galeria </span></span></div></td>
  </tr>
  <tr>
    <td align="left"><FORM ACTION="adfotogaleria.asp" METHOD="POST" enctype="multipart/form-data" target="_self">
      <div align="left">      </div>
      <table width="480" border="0" align="left" cellpadding="0" cellspacing="0">
        <% if (Session("nomefoto") = "") then%>
		<tr>
          <td> <table width="358" height="443" border="0" align="left" cellpadding="5" cellspacing="0" bordercolor="#000000">
                <tr>
                  <td>Foto:</td>
                  <td height="46" colspan="3"><br>
                      <input name="foto" type=FILE id="foto2" size=30>
                      <br>
                      <input name="upload" type="submit" id="upload2" value="upload"></td>
                </tr>
				<% End If %>
        <% if (Session("nomefoto") <> "") then%>
						<% If (Upload.Form("Submit")<>"" AND Upload.Form("CodGaleria")="0") then %>
				<tr>
                  <td height="29" colspan="4" class="titur"><div align="center">Erro: Escolha Galeria</div></td>
                </tr>
				<% End If %>

				<tr>
                  <td>Galeria:</td>
                  <td height="46" colspan="3">
                    <select name="CodGaleria" id="select">
                      <option value=0>Escolha uma Galeria</option>
                      <% 
While ((Repeat1__numRows <> 0) AND (NOT RsGalerias.EOF)) 
%>
                      <option value="<%=(RsGalerias.Fields.Item("Cod").Value)%>"><%=(RsGalerias.Fields.Item("titulo").Value)%></option>
                      <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsGalerias.MoveNext()
Wend
%>
                    </select>
</td>
                </tr>
                <tr>
                  <td>Descri&ccedil;&atilde;o:</td>
                  <td height="46" colspan="3"><input name="descricao" type="text" id="descricao2" size="50"></td>
                </tr>
                <tr>
                  <td>Fot&oacute;grafo:</td>
                  <td height="46" colspan="3"><input name="fotografo" type="text" id="fotografo2" size="50"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="403" border="0" cellpadding="0" cellspacing="0" class="tbl">
                      <% if (Session("nomefoto") <> "") then%>
                      <tr>
                        <td height="22" colspan="4" valign="top" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr valign="baseline">
                        <td height="21" colspan="4" valign="top" class="mat">Foto:</td>
                      </tr>
                      <tr>
                        <td height="10" colspan="4" valign="top"><img src="img/spacer.gif" width="1" height="1"></td>
                      </tr>
                      <tr>
                        <td height="26" colspan="4" valign="bottom"><% =Session("nomefoto")%>
                        </td>
                      </tr>
                      <tr>
                        <td height="36" colspan="2" valign="top"><img src="../fotos/192x144_<% =Session("nomefoto")%>" alt="" border="0"></td>
                        <td width="144">&nbsp;</td>
                        <td width="185" valign="baseline">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="19" colspan="4" valign="top" class="textoNormalCorpo9"><img src="img/spacer.gif" width="1" height="1"> </td>
                      </tr>
                      <% 
					  End If %>
                  </table></td>
                </tr>
                <tr>
                  <td width="334">&nbsp;</td>
                  <td width="334" height="60" colspan="3">
                    <INPUT name="Submit" TYPE=SUBMIT id="Submit2" VALUE="Enviar">
                  </td>
                </tr>
<% End If %>
              </table>
              <br>
          </td>
        </tr>
      </table>
      <div align="left"></div>
      <p>&nbsp;</p>
    </FORM>    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<br>
</BODY>
</HTML>
<%
RsGalerias.Close()
Set RsGalerias = Nothing
%>
