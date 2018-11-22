<%@ LANGUAGE = VBScript.Encode %>
<% ' Except for @ Directives, there should be no ASP or HTML codes above this line
' Setting LANGUAGE = VBScript.Encode enables mixing of encoded And unencoded ASP scripts

'1 Click DB Free copyright 1997-2003 David J. Kawliche

'1 Click DB Free source code is protected by international
'laws And treaties. Never use, distribute, or redistribute
'any software and/or source code in violation of its licensing.

'See License.txt for Open Source License
'More info online at http://1ClickDB.com/
'Email inquiries to info@1ClickDB.com
    
'**Start Encode**
%>
<!--#INCLUDE FILE="FreeInit.asp"-->
<!--#INCLUDE FILE="ocdForm.asp"-->
<!--#INCLUDE FILE="ocdGrid.asp"-->
<!--#INCLUDE FILE="ocdFunctions.asp"-->
<%
'--------------------
'Begin Page_Load
'--------------------

Dim objForm

'--------------------
'End Page_Load
'--------------------

'--------------------
'Begin Page_Render
'--------------------

Call WriteHeader("")

Call DisplayEdit()

Call WriteFooter("")

'--------------------
'End Page_Render 
'--------------------

'--------------------
'Begin Procedures
'--------------------

Sub DisplayEdit()

	'Create dynamic HTML FORM for data editing based on database structure
	
	Dim rsDef, evDef, evDefresult, hasdef, fkrelatedfield, fkrelatedtable, fldF, strName, intSize, tQS, bintSize, rsFK, HasFK, intFKColumnCount, strFKColumnName, strPKTables, elePKName, eleFKName, strFKTables, arrPKTables, arrFKTables, prevPKTable, prevFKTable, cat, tblCat, astrTemp, keytblcat, colkeytblcat, rsdefeval, arrrsdef, intrsdef, rtmpqs, intI, arrHomeField, arrfkRelatedField, prevcolumn, objGrid, homefield, showrelated, intcountgrids, strSQLTName, varFormNum, blnRedirectToBrowse

	blnRedirectToBrowse = False

	varFormNum = "0"
	
	'Initialize 1 Click DB Form class and Set properties
	Set objForm = New ocdForm
	objForm.FormNullToken = ocdFormNullToken
	objForm.MaxRelatedValues = ocdMaxRelatedValues
	objForm.SQLConnect = ocdnscSQLConnect 'ADO Connect String, including uid And pw if necessary
	objForm.AllowMultiDelete = True
	objForm.SQLUser = ocdnscSQLUser
	objForm.SQLPass = ocdnscSQLPass
	objForm.SQLSelect = "*" 'Database Field List 
	objForm.CallOnCancel = True
	objForm.SQLFrom = Request.QueryString("sqlFrom")'Database Table Name
	If ocdReadOnly Then
		objForm.AllowEdit = False
		objForm.AllowAdd = False
		objForm.AllowDelete = False
	Else
		objForm.AllowEdit = True
		objForm.AllowAdd = True
		objForm.AllowDelete = True
	End If
	objForm.HTMLCheckField = "<span class=""Warning""> Check </span>"
	objForm.HTMLAttribSaveBtn = "type=""submit"" value=""Save"" class=""Submit"""
	objForm.HTMLAttribCancelBtn = "type=""submit"" value=""Cancel"" class=""Submit"""
	objForm.HTMLAttribNewBtn = "type=""submit"" value=""New"" class=""Submit"""
	objForm.HTMLAttribDeleteBtn = "type=""submit"" value=""Delete"" class=""Submit"""
	
	'Process FORM request and retrieve ADO RecordSet for editing
	objForm.Open
	
	'Determine Foreign Key information for master/detail view and dropdown select input
	If (ocdDataBaseType = "SQLServer") And Request.QueryString("ocdShowRelated") <> "Yes" Then
		ocdSelectForeignKey = false
		ocdShowRelatedRecords = false
	End If
	hasFK = False
	Select Case ocdDatabaseType
		Case "Access"
			strSQLTName = CStr(FormatForSQL(Request.QueryString("SQLFROM"), ocddatabasetype, "RemoveSQLIdentifier"))
		Case "SQLServer"
			strSQLTName = GetSQLIDFPart(Request.QueryString("SQLFROM"),"SQLOBJECTNAME", ocdQuotePrefix,ocdQuoteSuffix)
	End Select

	If (ocdSelectForeignKey Or ocdShowRelatedRecords ) And (objForm.ADOConnection.provider = "Microsoft.Jet.OLEDB.4.0" Or objForm.ADOConnection.provider ="SQLOLEDB.1") Then
		Set rsFK = objForm.ADOConnection.OpenSchema(27)
		If Err.Number = 0 Then
			If Not rsFK.eof Then
				HasFK = True
				strPKTables = ""
				strFKTables = ""
				prevPKTable = ""
				prevFKTable = ""
				Do While Not rsFK.eof
					If (rsFK.Fields("PK_TABLE_NAME").Value) = strSQLTName And (rsFK.Fields("FK_TABLE_NAME").Value) <> (prevFKTABLE) Then
						prevFKTable = (rsFK.Fields("FK_TABLE_NAME").Value)
						strFKTables = strFKTables & (rsFK.Fields("FK_TABLE_NAME").Value) & ","
					End If
					If (rsFK.Fields("FK_TABLE_NAME").Value) = strSQLTName And (rsFK.Fields("FK_NAME").Value) <> (prevPKTABLE) Then
						prevPKTable = (rsFK.Fields("FK_NAME").Value)
						strPKTables = strPKTables & (rsFK.Fields("FK_NAME").Value) & ","
					End If
					rsFK.movenext
				Loop
				If Len(strPKTables) > 0 Then
					strPKTables = Left(strPKTables, Len(strPKTables)-1)
				End If
				If Len(strFKTables) > 0 Then
					strFKTables = Left(strFKTables, Len(strFKTables)-1)
				End If
			Else
				rsFK.close
				Set rsFK = Nothing
			End If
		Else
			Set rsFK = Nothing
			Err.Clear
		End If
	End If

	If ocdShowDefaults And Request.QueryString("Sqlid") = "" And Request.QueryString("sqlwhere") = "" Then
		If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
			Set rsdef = objForm.ADOConnection.OpenSchema(4,Array(Empty,Empty,CStr(FormatForSQL(Request.QueryString("SQLFROM"), ocddatabasetype, "RemoveSQLIdentifier")))) 'columns
			If rsdef.eof Then
				ocdShowDefaults = False
			Else
				arrrsdef = rsdef.getrows (,,Array("TABLE_NAME","COLUMN_NAME","COLUMN_DEFAULT"))
				rsdef.close
				Set rsdef = Nothing
			End If
			Set rsdefeval = Server.CreateObject("ADODB.Recordset")
 		ElseIf (objForm.ADOConnection.provider = "SQLOLEDB.1")Then
			Set rsdef = objForm.ADOConnection.OpenSchema(4,Array(Empty,Empty,CStr(GetSQLIDFPart(Request.QueryString("SQLFROM"),"SQLOBJECTNAME", ocdQuotePrefix,ocdQuoteSuffix)))) 'columns
			If rsdef.eof Then
				ocdShowDefaults = False
			Else
				arrrsdef = rsdef.getrows (,,Array("TABLE_NAME","COLUMN_NAME","COLUMN_DEFAULT"))
				rsdef.close
				Set rsdef = Nothing
			End If
			Set rsdefeval = Server.CreateObject("ADODB.Recordset")
		Else
			ocdShowDefaults = False
		End If					
	Else
		ocdShowDefaults = False
	End If				

	'Begin HTML Display

	Response.Write("<span class=""Information""> ")
	If Request.QueryString("sqlid") = "" And Request.QueryString("SQLWHERE") = "" Then
		Response.Write("Add Record To ")
	Else
		Response.Write("Edit Record In ")
	End If
	Response.Write(" <a href=""Freebrowse.asp?sqlfrom_a=" & Server.URLEncode(Request.QueryString("sqlfrom")) & "&amp;")
	For Each tQS In Request.QueryString
		If UCase(tQS) <> "SQLID" And UCase(tQS) <> "SQLFROM" And UCase(tQS) <> "NDBTNDELETE" And UCase(tQS) <> "SQLFROM_A" And UCase(tQS) <> "ACTION" And UCase(tQS) <> "SQLWHERE" Then
			Response.Write(tQS & "=" & Server.URLEncode(Request.QueryString(tQS)) & "&amp;")
		End If
	Next
	Response.Write(""">")
	Response.Write(Server.HTMLEncode(Request.QueryString("SQLFrom")))
	Response.Write("</a></span>")
	Select Case UCASE(ocdDatabaseType)
		Case "SQLSERVER"
			Response.Write(" <a class=""menu"" href=""" & ocdPageName & "?")
			If Request.QueryString("OCDSHOWRELATED") = "Yes" Then
				Response.Write "ocdShowRelated=&amp;"
			Else
				Response.Write "ocdShowRelated=Yes&amp;"
			End If
			For Each tQS In Request.QueryString
				If UCASE(tQS) <> "OCDSHOWRELATED" Then
					Response.Write(tQS & "=" & Server.URLEncode(Request.QueryString(tQS)) & "&amp;")
				End If
			Next
			If Request.QueryString("OCDSHOWRELATED") = "Yes" Then
				Response.Write(""">(Hide ")
			Else
				Response.Write(""">(Show ")
			End If
			Response.Write("Related)</a>")
	End Select
	Response.Write("<p>")
	Response.Flush

	'start writing main body

	objForm.Display("STATUS")
	objForm.Display("START")


	'Loop to create dynamically create input control for each field 

	Response.Write("<table>")
	For Each fldF in objForm.ADORecordset.Fields
		strName = fldF.Name

		Select Case strName 'check for replication columns
			Case "Gen_Description"
			'Response.Write fldF.type
		End Select
		intSize = fldF.DefinedSize
		If intSize = -1 Then
			intsize=50
		End If
		intFKColumnCount = 0
		strFKColumnName = ""
		fkrelatedtable = ""
		fkrelatedfield = ""
		Select Case fldF.Type
			Case 205, 128, 204 'adLongVarBinary, adBinary, adVarBinary
				Response.Write("<tr><td nowrap valign=""top"" align=""right"">")
				Response.Write("<span class=""FieldName"">" & strName & ":</span>")
				Response.Write(" &nbsp;&nbsp;")
				Response.Write("</td>")
				Response.Write("<td align=""left"" valign=""baseline"">")
				Response.Write("<span class=""Information"">Binary&nbsp;Data</span> ")
				Response.Write("</td></tr>")
			Case Else
				hasdef=false
				If ocdShowDefaults And Request.QueryString("sqlid") = "" And Request.QueryString("sqlwhere") = "" And Not ocdDatabaseType = "Oracle" Then
					intrsdef = 0
					Do while intrsdef < ubound(arrrsdef,2)
						If ocdDataBaseType = "Access" Then				
				 			astrTemp = FormatForSQL((Request.QueryString("sqlfrom")),ocddatabasetype,"REMOVESQLIDENTIFIER")
						ElseIf ocdDataBaseType = "SQLServer" Then
	astrTemp = GetSQLIDFPart(Request.QueryString("SQLFROM"),"SQLOBJECTNAME", ocdQuotePrefix,ocdQuoteSuffix)
						End If
						If astrTemp = (arrrsdef(0,intrsdef)) Then
							If UCase(strName) = UCase(arrrsdef(1,intrsdef)) Then
								If Not isnull(arrrsdef(2,intrsdef)) Then
									evdef = arrrsdef(2,intrsdef)
									hasdef = true
									exit do
								End If
							End If
						End If
						intrsdef = intrsdef + 1
					Loop
					If Not hasdef Then
						evdefresult = "" 
					Else
						call rsdefeval.open ("Select " & evdef & " as expr1", objForm.ADOConnection)
						evdefresult = rsDefeval.Fields(0).Value
						rsdefeval.close
					End If
				Else
					evdefresult = ""
				End If
				If isnull(evdefresult) Then
					evdefresult = ""
				End If
				If ocdSelectForeignKey And HasFK And Not ocdReadOnly Then
					rsFK.MoveFirst
					Do While Not rsFK.EOF
						If (rsFK.Fields("FK_TABLE_NAME").Value) = strSQLTName And rsFK.Fields("FK_COLUMN_NAME").Value = strNAME Then	
							intFKColumnCount = intFKColumnCount + 1
							strFKColumnName = strName
							fkrelatedtable = rsFK.Fields("PK_TABLE_NAME").Value
							fkrelatedfield = rsFK.Fields("PK_COLUMN_NAME").Value
							
						End If
						rsFK.MoveNext
					Loop
				End If
				Response.Write("<tr><td nowrap valign=""top"" align=""right"">")
				Response.Write("<span class=""FieldName"">" & strName & ":</span>")
				If CBool(fldF.Attributes And &H00000020) Then 'adFldIsNullable
					Response.Write(" &nbsp;&nbsp;")
				Else
					Response.Write(" <span class=""Warning"">*</span>")
				End If
				Response.Write("</td>")
				If intfkcolumncount = 1 Then 'multicolumns Not supported as dropdowns
					Response.Write("<td align=""left"" valign=""top"">")
					If objForm.ADOConnection.provider = "Microsoft.Jet.OLEDB.4.0" Then
						Call objForm.DisplayFieldAsRelatedValues(Replace(fldF.Name,"""","""""") ,"Select [" & fkRelatedField & "] From [" & fkRelatedTable & "] Order By [" & fkRelatedField & "]",evdefresult,"class=DataEntry")
					Else
						Call objForm.DisplayFieldAsRelatedValues(Replace(fldF.Name,"""","""""") ,"Select """ & fkRelatedField & """ From """ & fkRelatedTable & """ Order By """ & fkRelatedField & """",evdefresult,"class=DataEntry")
					End If
					Response.Write("</td></tr>")
				Else
					Select Case fldF.Type
						Case 201, 203 'adLongVarChar, adLongVarWChar
							Response.Write("<td align=""left"" valign=""top"">")
							Call objForm.DisplayFieldAsMemo(strName,evdefresult,"rows=""5"" cols=""35"" class=""DataEntry"" ")
							If Not cbool(cint(ocdnscCompatibility) And ocdNoJavaScript) And Not ocdReadOnly Then
								Response.Write("&nbsp;<a href="""" onclick=""javascript:window.open('ocdZoomText.asp?CallingForm=" & varformnum & "&amp;TextField=" & server.urlencode("ocdTF" & strName) & "', 'zoomtext','height=400,width=600,scrollbars=yes');return false""><img alt=""Zoom Text"" SRC=""GridLnkEdit.gif"" border=""0""></a>")
	Response.Write(vbCRLF & "<script type=""text/javascript"" Language=""JavaScript"">" & vbCRLF)		
								Response.Write("if (parseInt(navigator.appVersion) >= 4) {" & vbCRLF)
								Response.Write("	If (navigator.appName == ""Microsoft Internet Explorer"") {" & vbCRLF)
								Response.Write("document.write ('<img alt=\""HTML Edit\"" SRC=\""AppHTMLEdit.gif\"" border=""0"" onClick=\""javascript:window.open(\'ocdHTMLEdit.asp?CallingForm=" & varformnum & "&amp;TextField=" & server.urlencode("ocdTF" & strName) & "\', \'zoomtext\',\'height=400,width=600,scrollbars=yes\')\"">');" & vbCRLF)
								Response.Write("	}" & vbCRLF)
								Response.Write("}" & vbCRLF)
								Response.Write("</script>" & vbCRLF)
							End If
							Response.Write("</td></tr>")
						Case 11 'adBoolean
							Response.Write("<td align=""left"" valign=""top"">")
							If Not CBool(fldF.Attributes And &H00000020) Then
								Call objForm.DisplayFieldAsCheckBox(strName,True,False,True,"")
							Else
								Call objForm.DisplayFieldAsTextBox(strName,"","size=""5"" maxlength=""12"" class=""DataEntry""")
								Response.Write("</td></tr>")
							End If
						Case 133, 135, 134, 7 'adDBDate, adDBTimeStamp, adDBTime, adDate
							Response.Write("<td align=""left"" valign=""top"">")
							Call objForm.DisplayFieldAsTextBox(strName,evdefresult, "size=""20"" maxlength=""50"" class=""DataEntry""")
							If Not (cbool(ocdnscCompatibility) And ocdNoJavaScript) And Not ocdReadOnly Then
								Response.Write("<a href="""" onClick=""javascript:window.open('ocdPickDate.asp?CallingForm=" & varformnum & "&amp;DateField=" & server.urlencode("ocdTF" & strName) & "&amp;InitialDate=' + document.forms[" & varformnum & "].elements['" & ("ocdTF" & strName) & "'].value, 'calendar','height=250,width=250,scrollbars=no');return false""><img width=""17"" height=""17"" alt=""Click for Calendar"" src=""AppCalendar.gif"" border=""0""></a>")
							End If
							Response.Write("</td></tr>")
						Case 6 'adCurrency
							Response.Write("<td align=""left"" valign=""top"">")
							Call objForm.DisplayFieldAsTextBox(strName,evdefresult, "size=""12"" maxlength=""50"" class=""DataEntry""")
							Response.Write("</td></tr>")
						Case 20, 14, 5, 131, 4, 2, 16, 21, 19, 18, 17, 3 'adBigInt, adDecimal, adDouble, adNumeric, adSingle, _
							' adSmallInt, adTinyInt, adUnsignedBigInt, adUnsignedInt, _
							' adUnsignedSmallInt, adUnsignedTinyInt,adInteger
							Response.Write("<td align=""left"" valign=""top"">")
							Call objForm.DisplayFieldAsTextBox(strName,evdefResult, "size=""24"" maxlength=""50"" class=""DataEntry"" ")
							Response.Write("</td></tr>")
						Case Else					
							Response.Write("<td align=""left"" valign=""top"">")
							If intSize > 35 Then
								bintSize = 35
							Else
								bintSize = intSize
							End If
							Call objForm.DisplayFieldAsTextBox(strName,evdefresult, "size=""" & bintSize & """ maxlength=""" & intSize & """ class=""DataEntry""")
							Response.Write("</td></tr>")
					End Select
				End If
		End Select
		Response.flush
		response.clear
	Next
	Response.Write("</table><p>")
	If Not ocdReadOnly Then
		objForm.Display("BUTTONS")
	End If
	objForm.Display("END")	' And finally return the table
	Response.Write("<p><span class=""Warning"">*</span> indicates required field</p>")
	Response.Flush

	If HasFK Then
		rsFK.close
		Set rsFK = Nothing
	End If
	If ocdShowDefaults Then
		Set rsdefeval = Nothing
	End If

	If Err.Number <> 0 Then
		Call WriteFooter("")
	End If

	If ocdShowRelatedRecords Then
		'Dynamically create Grids for foreign key related records
			Select Case ocdDatabaseType
			Case "Access","SQLServer"
				If ((objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0" OR objForm.ADOConnection.provider ="SQLOLEDB.1") And (Request.QueryString("SQLID") <> "" or Request.QueryString("SQLWHERE") <> "") And Not objForm.ADORecordset.eof) Then '
					Set cat = Server.CreateObject("ADOX.Catalog")
					If Err.Number <> 0 Then
						Response.Write("Detailed view of related records is Not available, an ADOX catalog could Not be created.")
						Set cat = Nothing
						Err.Clear
						Call WriteFooter("")
					Else
						intcountgrids = 1
						cat.ActiveConnection = objForm.ADOConnection
						'check for foreign keys field
						If strPKTables <> "" Then '*
							homefield = ""
							fkrelatedfield = ""
							arrPKTables = Split(strPKTables,",") '*
							Set tblcat = cat.Tables(strSQLTName)
							for each elePKName in arrPKTables
								Set keytblcat = tblcat.Keys(elePKName)
								If keytblcat.type = 2 Then
									If fkrelatedfield = "" Then					
										For each colkeytblcat in keytblcat.Columns
											If keytblcat.RelatedTable <> "" Then 
												prevcolumn = ""
												If homefield = "" Then
													homefield = colkeytblcat.Name
													fkrelatedfield =colkeytblcat.RelatedColumn
												Elseif prevcolumn <> homefield Then
													homefield = homefield & "," & colkeytblcat.Name
													fkrelatedfield = fkrelatedfield & "," &colkeytblcat.RelatedColumn
												End If
												prevcolumn = colkeytblcat.Name
												fkrelatedtable = keytblcat.RelatedTable
											End If
										next
									End If
									If fkRelatedTable <> "" Then
										Response.Write("<span class=""Information"">Related Record in <a href=""FreeBrowse.asp?sqlfrom_a=" & server.urlencode(fkRelatedTable) & "&amp;")
										for each tQS in Request.QueryString
											If UCASE(tQS) <> "SQLID" And UCASE(tQS) <> "SQLFROM" And UCASE(tQS) <> "NDBTNDELETE" And UCASE(tQS) <> "SQLFROM_A" And UCASE(tQS) <> "SQLORDERBY_A" And UCASE(tQS) <> "SQLWHERE_A" And UCASE(tQS) <> "SQLGROUPBY_A" And UCASE(tQS) <> "SQLHAVING_A" And UCASE(tQS) <> "ACTION" And UCASE(tQS) <> "SQLWHERE" Then
												Response.Write(tQS & "=" & Server.URLEncode(Request.QueryString(tQS)) & "&amp;")
											End If
										next
										Response.Write("""> " & fkRelatedTable & "</a></span><p>")
										Set objGrid = New ocdGrid
										objGrid.HTMLGridButtons = "First|First;;prev|Prev;;next|Next;;last|Last;;New|New"
										objGrid.HTMLSortASCLink= ""	'HTML to display inside sort ascending link
										objGrid.HTMLSortDESCLink= ""	'HTML to display inside sort descending link	
										objGrid.HTMLFilterLink= ""
										objGrid.SQLConnect = ocdnscSQLConnect
										objGrid.SQLUser = ocdnscSQLUser
										objGrid.SQLPass = ocdnscSQLPass
										objGrid.GridID = "Default" & intcountgrids
										objGrid.SQLSelect = "*"
										objGrid.SQLFrom = fkRelatedTable
										objGrid.SQLSelectPK = ""
										If InStr(homefield,",") = 0 Then
											Select Case objForm.ADORecordset.Fields(homefield).Type
												Case 20, 14, 5, 131, 4, 2, 16, 21, 19, 18, 17, 3 
									'adBigInt, adDecimal, adDouble, adNumeric, adSingle, _
									' adSmallInt, adTinyInt, adUnsignedBigInt, adUnsignedInt, 
									' adUnsignedSmallInt, adUnsignedTinyInt,adInteger
													If isnull(objForm.ADORecordset.Fields(homefield).Value) Then
														objGrid.SQLWhereExtra = "[" & fkrelatedfield & "] Is Null"
													Else
														objGrid.SQLWhereExtra = "[" & fkrelatedfield & "] =" & objForm.ADORecordset.Fields(homefield).Value
													End If
												Case Else
													If isnull(objForm.ADORecordset.Fields(homefield).Value) Then
														objGrid.SQLWhereExtra = "[" & fkrelatedfield & "] Is Null"
													Else
													objGrid.SQLWhereExtra = "[" & fkrelatedfield & "] ='" & Replace(objForm.ADORecordset.Fields(homefield).Value,"'","''") & "'"
													End If
											End Select
										Else
											objGrid.SQLWhereExtra = ""
											arrhomefield = split (homefield,",")
											arrfkrelatedfield = Split(fkrelatedfield,",")
											for intI = 0 to UBound(arrhomefield)
												Select Case objForm.ADORecordset.Fields(arrhomefield(intI)).Type
													Case 20, 14, 5, 131, 4, 2, 16, 21, 19, 18, 17, 3 
										'adBigInt, adDecimal, adDouble, adNumeric, adSingle, _
										' adSmallInt, adTinyInt, adUnsignedBigInt, adUnsignedInt, 
										' adUnsignedSmallInt, adUnsignedTinyInt,adInteger
														If isnull(objForm.ADORecordset.Fields(arrhomefield(intI)).Value) Then
														objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrfkrelatedfield(intI) & "] Is Null And "
														Else
															objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrfkrelatedfield(intI) & "] =" & objForm.ADORecordset.Fields(arrhomefield(intI)).Value & " And "
														End If
												Case Else
													If isnull(objForm.ADORecordset.Fields(arrhomefield(intI)).Value) Then
														objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrfkrelatedfield(intI) & "] Is Null And "
													Else
													objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrfkrelatedfield(intI) & "] ='" & Replace(objForm.ADORecordset.Fields(arrhomefield(intI)).Value,"'","''") & "'" & " And "
													End If
											End Select
										next
										objGrid.SQLWhereExtra = Left(objGrid.SQLWhereExtra,len(objGrid.SQLWhereExtra)-5)
									End If
									objGrid.AllowEdit = True
									objGrid.AllowDelete = False
									objGrid.AllowAdd = False
									objGrid.AllowExport = False
									objGrid.FormEdit = "FreeEdit.asp"
	'								objGrid.SQLSelectID = -1
									objGrid.SQLSelectPK = ""
									objGrid.Open
									objGrid.Display("GRID") 
									Response.Write("<p>")
									Response.flush
									intcountgrids = intcountgrids + 1
									homefield = ""
									fkrelatedfield = ""
									Set objGrid = Nothing
								End If
							Else 'not fkey
								homefield = ""
								fkrelatedfield = ""
							End If
							homefield = ""
							fkrelatedfield = ""
						next
					End If
					If strFKTables <> "" Then '*
						homefield = ""
						fkrelatedfield = ""
						arrFKTables = Split(strFKTables,",") '*
						for each eleFKName in arrFKTables '*
							Set tblcat = cat.Tables(eleFKNAME)
							for each keytblcat in tblcat.Keys
								If keytblcat.type = 2 Then
									For each colkeytblcat in keytblcat.Columns
										If (keytblcat.RelatedTable) = strSQLTName Then
											showrelated = true
											fkrelatedtable = keytblcat.RelatedTable
											If homefield = "" Then
												homefield = colkeytblcat.Name
												fkrelatedfield =colkeytblcat.relatedcolumn
											Else
												homefield = homefield & "," & colkeytblcat.Name
												fkrelatedfield =fkrelatedfield & "," & colkeytblcat.relatedcolumn
											End If
										Else 
											showrelated = false
										End If
									next
									If showrelated Then
						Set objGrid = New ocdGrid
						objGrid.HTMLGridButtons = "First|First;;prev|Prev;;next|Next;;last|Last;;New|New"
						objGrid.HTMLSortASCLink= ""	'HTML to display inside sort ascending link
						objGrid.HTMLSortDESCLink= ""	'HTML to display inside sort descending link
						objGrid.HTMLFilterLink= ""

										objGrid.SQLConnect = ocdnscSQLConnect
										objGrid.SQLUser = ocdnscSQLUser
										objGrid.SQLSelectPK = ""
										objGrid.SQLPass = ocdnscSQLPass
										objGrid.GridID = "Default" & intcountgrids
										objGrid.SQLSelect = "*"
										objGrid.SQLFrom = CStr(tblCat.Name)
										If InStr(homefield,",") = 0 Then
											If isnull(objForm.ADORecordset.Fields(fkrelatedfield).Value) Then	
												If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
													objGrid.SQLWhereExtra = "[" & homefield & "] Is Null"
												Else
													objGrid.SQLWhereExtra = """" & homefield & """ Is Null" 
												End If
											Else
												Select Case objForm.ADORecordset.Fields(fkrelatedfield).Type
													Case 20, 14, 5, 131, 4, 2, 16, 21, 19, 18, 17, 3 
											'adBigInt, adDecimal, adDouble, adNumeric, adSingle, _
											' adSmallInt, adTinyInt, adUnsignedBigInt, adUnsignedInt, 
											' adUnsignedSmallInt, adUnsignedTinyInt,adInteger
														If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
															objGrid.SQLWhereExtra = "[" & homefield & "] = " & objForm.ADORecordset.Fields(fkrelatedfield).Value
														Else
															objGrid.SQLWhereExtra = """" & homefield & """ = " & objForm.ADORecordset.Fields(fkrelatedfield).Value
														End If
													Case Else
														If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
															objGrid.SQLWhereExtra = "[" & homefield & "] ='" & Replace(objForm.ADORecordset.Fields(fkrelatedfield).Value,"'","''") & "'"
														Else
															objGrid.SQLWhereExtra = """" & homefield & """ ='" & Replace(objForm.ADORecordset.Fields(fkrelatedfield).Value,"'","''") & "'"
														End If
												End Select
											End If
										Else
											arrhomefield = Split(homefield,",")
											arrfkrelatedfield = Split(fkrelatedfield,",")
											objGrid.SQLWhereExtra = ""
											For intI = 0 to UBound(arrhomefield)
												Select Case objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Type
													Case 20, 14, 5, 131, 4, 2, 16, 21, 19, 18, 17, 3 
											'adBigInt, adDecimal, adDouble, adNumeric, adSingle, _
											' adSmallInt, adTinyInt, adUnsignedBigInt, adUnsignedInt, 
											' adUnsignedSmallInt, adUnsignedTinyInt,adInteger
														If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
															objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrhomefield(intI) & "]"
															If isnull(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value) Then
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & " Is Null And "
															Else
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "=" & objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value & " And "
															End If 
														Else
															If isnull(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value) Then
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & """" & arrhomefield(intI) & """ Is Null And "
															Else
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & """" & arrhomefield(intI) & """ =" & objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value & " And "
															End If
														End If
												Case Else
													If (objForm.ADOConnection.provider ="Microsoft.Jet.OLEDB.4.0") Then
														If isnull(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value) Then
															objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrhomefield(intI) & "] Is Null And "
														Else
															objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & "[" & arrhomefield(intI) & "] ='" & Replace(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value,"'","''") & "'" & " And "
															End If
														Else
															If isnull(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value) Then
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & """" & arrhomefield(intI) & """ = Is Null And "
															Else
																objGrid.SQLWhereExtra = objGrid.SQLWhereExtra & """" & arrhomefield(intI) & """ ='" & Replace(objForm.ADORecordset.Fields(arrfkrelatedfield(intI)).Value,"'","''") & "'" & " And "
															End If
														End If
												End Select
											next
											objGrid.SQLWhereExtra = Left(objGrid.SQLWhereExtra,len(objGrid.SQLWhereExtra)-5)
										End If
										objGrid.SQLPageSize = ""
										objGrid.SQLPage = ""
										objGrid.AllowEdit = True
										If Not ocdReadOnly Then
											objGrid.AllowDelete = True
										Else
											objGrid.AllowDelete = True
										End If
										objGrid.AllowAdd = True
	'									objGrid.SQLSelectID = -1
										objGrid.SQLSelectPK = ""
										objGrid.FormEdit = "FreeEdit.asp"
										objGrid.Open
										Response.Write("<span class=""information"">")
										Response.Write objGrid.SQLRecordCount
										Response.Write(" Related Records in <a href=""FreeBrowse.asp?sqlfrom_a=" & server.urlencode(tblcat.name) & "&amp;" )
										for each tQS in Request.QueryString
											If UCASE(tQS) <> "SQLID" And UCASE(tQS) <> "SQLFROM" And UCASE(tQS) <> "NDBTNDELETE" And UCASE(tQS) <> "SQLFROM_A" And UCASE(tQS) <> "SQLORDERBY_A" And UCASE(tQS) <> "SQLWHERE_A" And UCASE(tQS) <> "SQLGROUPBY_A" And UCASE(tQS) <> "SQLHAVING_A" And UCASE(tQS) <> "ACTION" And UCASE(tQS) <> "SQLWHERE" Then
												Response.Write(tQS & "=" & Server.URLEncode(Request.QueryString(tQS)) & "&amp;")
											End If
										Next
										Response.Write( """>")
										Response.Write(tblcat.name & "</a></span><BR>")
										objGrid.Display ("BUTTONS") 
										objGrid.Display ("GRID") 
										Response.Write("<p>")
										Response.flush
										intcountgrids = intcountgrids + 1
										homefield = ""
										fkrelatedfield = ""
														Set objGrid = Nothing
									End If
								Else 'not fkey
									homefield = ""
									fkrelatedfield = ""
								End If
							Next
						Next
					End If

					Set tblcat = Nothing
					Set keytblcat = Nothing
					Set cat = Nothing
				End If'adox catalog Not created
			End If
		End Select
	End If 'check if related records should be displayed
	'Response.Write objForm.SQLID
	objForm.Close()
	
End Sub
'React to Form events

Sub ocdOnCancel()
	If blnRedirectToBrowse Then
			Call RedirectToBrowse()
	End If
End Sub

Sub ocdBeforeUpdate ()
End sub

Sub ocdAfterUpdate()
	If blnRedirectToBrowse Then
			Call RedirectToBrowse()
	End If
end sub

sub ocdBeforeInsert ()
	'not used	
End sub

sub ocdAfterInsert()
	If blnRedirectToBrowse Then
			Call RedirectToBrowse()
	End If
end sub

sub ocdAfterDelete()
	Call RedirectToBrowse()
End Sub

Sub ocdBeforeDelete()
Response.Clear
	Call WriteHeader("")
	dim tmpeqs
	Response.Write("<form action=""")
	Response.Write(request.servervariables("SCRIPT_NAME") & "?")
	for each tmpeqs in Request.QueryString
		If UCase(tmpeqs) <> "OCDEDITDELETE" Then
			Response.Write(tmpeqs & "=" & Server.URLEncode(Request.QueryString(tmpeqs)) & "&")
		End If
	next
	Response.Write(""" method=""post"">")
	Response.Write("<center><TABLE WIDTH=""50%"" class=""DialogBox""><tr><TH STYLE=""text-align:left;background-color:navy;color:white;"" align=""left""><DIV STYLE=""color:white;"">Confirm Delete</DIV></TH><tr><td BGCOLOR=Silver valign=""top"">")
	Response.Write("<TABLE><tr class=DIALOGBOXROW><td valign=""top""><img SRC=AppWarning.gif border=""0"" alt=""Warning""></td><td>&nbsp;</td><td valign=""top""><p>")
	If objForm.SQLID <> "" or objForm.SQLWHERE <> "" Then
		Response.Write("<b>Are you sure you want to delete the selected record(s)?</b><p>This action cannot be undone.<p><INPUT type=Submit SPAN class=Submit Name=ocdEditConfirm value=""OK"">&nbsp;<INPUT type=submit Name=ocdEditCancel class=Submit value=""Cancel""><INPUT type=hidden Name=ocdEditCancelPage class=Submit value=""FreeBrowse.asp""><INPUT type=hidden Name=ocdEditDelete class=Submit value=""Delete""></td></tr></table></td></tr></TABLE></CENTER>")		
	Else
		Response.Write("<b>No Records Were Selected</b><p>You may use your browser's back button to continue.</td></tr></table></td></tr></TABLE></CENTER>")		
	End If
	Response.Write("</form>")
	Call writefooter("")
	Response.end
End Sub

Sub RedirectToBrowse()
	Dim strADURL, tmpadqs
	If Request.QueryString("SQLFROM_A") <> "" Then
		strADURL = "FreeBrowse.asp?"
		for each tmpadqs in Request.QueryString
			Select Case UCASE(tmpadqs) 
				Case "SQLFROM","SQLSELECT","SQLWHERE", "SQLID"
				Case Else
					strADURL = strADURL & tmpadqs & "=" & Server.URLEncode(Request.QueryString(tmpadqs)) & "&"
			End Select
		next
		Response.Clear
		Response.Redirect(strADURL)
	End If
End Sub

%>