<%@ LANGUAGE = VBScript.Encode %>
<%'Except for @ Directives, there should be no ASP or HTML codes above this line
'Set LANGUAGE = VBScript.Encode to mix encoded and unencoded ASP script files

'1 Click DB Free copyright 1997-2003 David J. Kawliche

'1 Click DB Free source code is protected by international
'laws and treaties.  Never use, distribute, or redistribute
'any software and/or source code in violation of its licensing.

'See License.txt for Open Source License
'More info online at http://1ClickDB.com/
'Email inquiries to info@1ClickDB.com
        
'**Start Encode**
%>
<!--#INCLUDE FILE=FreeInit.asp-->
<%

'--------------------
'Begin Page_Load
'--------------------

Call CheckTreeMenu()

'--------------------
'End Page_Load
'--------------------

'--------------------
'Begin Page_Render
'--------------------

Call WriteHeader("")

Call DisplaySchema()

Call WriteFooter("")

Response.End()

'--------------------
'End Page_Render 
'--------------------

'--------------------
'Begin Procedures
'--------------------

Sub CheckTreeMenu()
If (((Not CBool(ocdnscCompatibility and ocdNoFrames)) and (not CBool(ocdnscCompatibility and ocdNoJavaScript))) And	Request.QueryString("show") = "")Then
	Response.Clear()
	Response.Redirect("FreeFrame.asp")
End If
End Sub

Sub DisplaySchema()
Dim rsTemp, intCount, argSQLFrom

If (Err.Number <> 0) Then
	Call WriteFooter("")
End If

Response.Write("<p><span class=""Information"">")
Select Case UCase(Request.QueryString("show"))
	Case "TABLES",""
		Response.Write("Tables")
	Case "VIEWS"
		Response.Write("Views")
	Case "PROCS"
		Response.Write("Procedures")
	Case "SYS"
		Response.Write("System Tables")
End Select
Response.Write("</span></p>")
Response.Flush()
Set rsTemp = Server.CreateObject("ADODB.Recordset")
Select Case UCase(Request.QueryString("show"))
	Case "TABLES", "VIEWS","SYS", ""
		If (ocdDatabaseType = "Oracle") Then
			Set rsTemp = ocdTargetConn.Execute ("SELECT OBJECT_TYPE AS TABLE_TYPE, OBJECT_NAME AS TABLE_NAME, OWNER AS TABLE_SCHEMA FROM ALL_OBJECTS WHERE (OBJECT_TYPE = 'TABLE' OR OBJECT_TYPE = 'VIEW') AND NOT OWNER = 'SYS' AND NOT OWNER = 'WKSYS' AND NOT OWNER = 'MDSYS' AND NOT OWNER = 'OLAPSYS' AND NOT OWNER ='CTXSYS' AND NOT OWNER='SYSTEM'")
		Else
			Set rsTemp = ocdTargetConn.OpenSchema(20) 'adSchemaTables
		End If
		If (Not rsTemp.EOF) Then 
			rsTemp.MoveFirst
		End If
		intCount = 0
		Response.Write("<table class=""Grid""><tr class=""GridHeader""><th>&nbsp;</th><th align=""left"">Object&nbsp;Name</th><th>Created</th></tr>")
		Do While Not rsTemp.EOF
			If (ocdDatabaseType = "SQLServer" Or ocdDatabaseType="Oracle") Then
				argSQLFrom = ocdQuotePrefix & rsTemp.Fields("TABLE_SCHEMA").Value & ocdQuoteSuffix & "." & ocdQuotePrefix & rsTemp.Fields("TABLE_NAME").Value & ocdQuoteSuffix
			Else
				argSQLFrom = ocdQuotePrefix & rsTemp.Fields("TABLE_NAME").Value & ocdQuoteSuffix
			End If		
			If (rsTemp.Fields("TABLE_TYPE").Value = "TABLE" And UCase(Left(rsTemp.Fields("TABLE_NAME").Value,4)) <> "MSYS" And (UCase(Request.QueryString("show")) ="TABLES" Or UCase(Request.QueryString("show")) = "")) Or (rsTemp.Fields("TABLE_TYPE") = "VIEW" And UCase(Request.QueryString("show")) = "VIEWS") Or (UCase(Request.QueryString("show"))="SYS" And (rsTemp.Fields("TABLE_TYPE").Value = "SYSTEM TABLE" Or UCase(Left(rsTemp.Fields("TABLE_NAME").Value,4)) = "MSYS")) Then
				Response.Write("<tr")
				If (intCount Mod 2 = 0) Then
					Response.Write(" class=""GridOdd""")
				Else
					Response.Write(" class=""GridEven""")
				End If
				Response.Write("><td align=""left"" nowrap><a href=""FreeBrowse.asp?sqlfrom_A=")
				Response.Write(Server.URLEncode( argSQLFrom)) 
				Response.Write("""> <img border=""0"" src=""AppTable.gif"" alt=""Browse Data""></a> <a href=""FreeBrowse.asp?ocdGridMode_A=Search&amp;sqlfrom_A=" )
				Response.Write(Server.URLEncode(argSQLFrom))
				Response.Write("""><img src=""AppSearch.gif"" alt=""Search"" border=""0""></a> </td><td nowrap width=""100%""><a href=""FreeBrowse.asp?sqlfrom_A=")
				Response.Write(Server.URLEncode(argSQLFrom)) 
				Response.Write("""><span class=""FieldName"">")
				Response.Write(Server.HTMLEncode(argSQLFrom))
				Response.Write("</span></a></td>")
				Response.Write("<td valign=""top"" nowrap>")
				If (Not ocdDatabaseType = "Oracle") Then
					Response.Write(rsTemp.Fields("DATE_CREATED").Value)
					If (Err.Number <> 0) Then ' This is not always available
						Err.Clear()
						Response.Write("&nbsp;")
					End If
				End If
				Response.Write("</td></tr>")
				intCount = intCount + 1
			End If
			rsTemp.MoveNext
		Loop
		Response.Write("</table>")
End Select
End Sub

'-----------------
'End Procedures
'-----------------

%>
