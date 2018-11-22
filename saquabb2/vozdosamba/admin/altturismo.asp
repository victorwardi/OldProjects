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
Dim RsTurismo__MMColParam
RsTurismo__MMColParam = "1"
If (Request.QueryString("Cod") <> "") Then 
  RsTurismo__MMColParam = Request.QueryString("Cod")
End If
%>
<%
Dim RsTurismo
Dim RsTurismo_numRows

Set RsTurismo = Server.CreateObject("ADODB.Recordset")
RsTurismo.ActiveConnection = MM_conSurf_STRING
RsTurismo.Source = "SELECT * FROM Turismo WHERE Cod = " + Replace(RsTurismo__MMColParam, "'", "''") + ""
RsTurismo.CursorType = 0
RsTurismo.CursorLocation = 2
RsTurismo.LockType = 1
RsTurismo.Open()

RsTurismo_numRows = 0
%>
<HTML>
<HEAD>
<TITLE>Voz do Samba</TITLE>
<script language="JavaScript" src="xtra/java.js"></script>
<link href="../xtra/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<img src="../images/spacer.gif" width="1" height="5">
<table width="776" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000099">
  <tr>
    <td width="772" height="25" bgcolor="#000000"><div align="center"><span class="tur">Administrativo Voz do Samba</span></div></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#000000"><div align="center"><span class="tur">Modificar Turismo</span></div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <form name="form1" target="_self" id=form><div align="center"><center>
        <table width="443" border="0" cellpadding="5" cellspacing="0" class="tbl">
              <tr>
                <td width="96" valign="top">Tipo:</td>
                <td width="327"><select name="tipo" class="caixa" id="tipo">
                  <option <% If (RsTurismo.Fields.Item("tipo").Value)="pousada" Then %> selected <% End If %> value="pousada">Pousada</option>
                  <option <% If (RsTurismo.Fields.Item("tipo").Value)="hotel" Then %> selected <% End If %> value="hotel">Hotel</option>
                  <option <% If (RsTurismo.Fields.Item("tipo").Value)="surfshop" Then %> selected <% End If %> value="surfshop">Surf-Shop</option>
                  <option <% If (RsTurismo.Fields.Item("tipo").Value)="restaurante" Then %> selected <% End If %> value="restaurante">Restaurante</option>
                  <option <% If (RsTurismo.Fields.Item("tipo").Value)="cyber" Then %> selected <% End If %> value="cyber">Cyber</option>
                </select></td>
              </tr>
              <tr>
                <td valign="top">Nome:</td>
                <td><input name="nome" type="text" class="caixa" id="titulo5" value="<%=(RsTurismo.Fields.Item("nome").Value)%>" size="50"></td>
              </tr>
              <tr>
                <td valign="top"><span class="desc"><font face="Verdana" size="2">Telefone:</font></span></td>
                <td><span class="desc">
                  <input name="telefone" type="text" class="caixa" id="data5" value="<%=(RsTurismo.Fields.Item("endereco").Value)%>" size="50">
            </span></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">Endere&ccedil;o</font><span class="desc"><font face="Verdana" size="2">:</font></span></td>
                <td><span class="desc">
                  <input name="endereco" type="text" class="caixa" id="autor5" value="<%=(RsTurismo.Fields.Item("telefone").Value)%>" size="50">
                </span></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">E-mail:</font></td>
                <td><input name="email" type="text" class="caixa" id="autmail5" value="<%=(RsTurismo.Fields.Item("email").Value)%>" size="50"></td>
              </tr>
              <tr>
                <td valign="top"><font face="Verdana" size="2">Site:</font></td>
                <td><input name="site" type="text" class="caixa" id="autmail5" value="<%=(RsTurismo.Fields.Item("site").Value)%>" size="50"></td>
              </tr>
              <tr>
                <td valign="top">Coment&aacute;rios:</td>
                <td><textarea name="comentarios" cols="45" rows="8" class="caixa" id="textarea9" style="border-style: solid; border-width: 2"><%=(RsTurismo.Fields.Item("comentarios").Value)%></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="Submit" type="submit" class="botaoOff" id="submit5" value="Enviar"></td>
              </tr>
            </table>
          </center>
        </div>
      
                
      </form>      
    </td>
  </tr>
</table>
</BODY>
</HTML>
<%
RsTurismo.Close()
Set RsTurismo = Nothing
%>
