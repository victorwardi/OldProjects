<%@ Language=VBScript %>

<% 
Option Explicit
%>

<%
' ban ip addresses
' if Request.ServerVariables("REMOTE_ADDR") = "127.0.0.1" then
' response.redirect("banned.asp")
' end if
%>
              
<HTML>
<HEAD>
<title>Comentar</title>
<link rel="stylesheet" type="text/css" href="styles/sb.css">

<SCRIPT LANGUAGE="javascript" TYPE="text/javascript">
<!--
function validate() {
    /*Validate textarea length before submitting the form*/

    var maxChar = 200
    if (document.forms[0].post.value.length > maxChar) {
        diff=document.forms[0].post.value.length - maxChar;
        if (diff>1)
            diff = diff + " characters";
        else
            diff = diff + " character";
            
        alert("This field is limited to " + maxChar + " characters\n" + "Please reduce the text by " + diff);
        document.forms[0].post.focus();
        return (false);
    }
 }

//-->
</SCRIPT>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #8cb1db;
	background-image: url();
}
.style3 {color: #000000}
-->
</style></HEAD>
<BODY>
<table width="99%" cellspacing="0" cellpadding="0">
<tr>
<td height="367" align="center" valign="top">  <%
if Request.QueryString("incomplete") > "" then
Response.Write "Você <strong>deve</strong> preencher todos so campos."
end if
%>
<form name="shoutbox_post_form" action="sbProcess.asp" method="post">
<span class="style3">Nome:</span><br>
<input name="name" type="text" class="brd" size="30" maxlength="40" autocomplete="off" />
<br>
<span class="style3">Email</span><br>
<input name="email" type="text" class="brd" size="30" maxlength="40" autocomplete="off" />
<br> 
<span class="style3">Recado
</span><br>
<textarea name="post" cols="30" rows="12" class="brd" />
</textarea>
<br>

<input type="submit" onclick="sucesso.asp" value="Enviar" />
<input type="reset" value="Apagar" />
</form></td>
</tr>
</table>


</BODY>
</HTML>