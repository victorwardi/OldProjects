<%@ Language=VBScript %>

<!-- #include file="connectionstring.asp" -->

<%
' variables
dim name
dim email
dim posterIP
dim post
dim CS
dim RS
dim iSQL
dim frmName
dim frmEmail
dim frmPost
dim pdate

' parameters
posterIP = Request.ServerVariables("REMOTE_ADDR")

frmName = QuoteReplace(Request.Form("name"))
frmEmail = QuoteReplace(Request.Form("email"))
frmPost = QuoteReplace(Request.Form("post"))

if frmName = "" then
Response.Redirect("shout.asp?incomplete=true")
end if

if frmEmail = "" then
Response.Redirect("shout.asp?incomplete=true")
end if

if frmPost = "" then
Response.Redirect("shout.asp?incomplete=true")
end if

pdate = now()

' objects
Set CS = Server.CreateObject("ADODB.Connection")

' connection string (info in connectionstring.asp)
CS.ConnectionString = dbasepath
CS.Provider = provider
CS.Open

' sql queries
iSQL = "INSERT INTO shoutbox(name,email,post,posterIP,pdate) VALUES ('" & frmName & "','" & frmEmail & "','" & frmPost & "','" & posterIP & "','" & pdate & "')"

CS.Execute(iSQL)

Function QuoteReplace(formVar)
QuoteReplace = Replace (formVar, Chr(34),"&quot;")
QuoteReplace = Replace (QuoteReplace,"'","&#39;")
End Function

' display shouts
Response.Redirect("shout.asp")
%>
