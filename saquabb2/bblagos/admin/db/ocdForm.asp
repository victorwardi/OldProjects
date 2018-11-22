<%
'1 Click DB ASP Library - SQL to ASP Form Object
'copyright 1997-2003 David J. Kawliche

'1 Click DB ASP Library source code is protected by international
'laws and treaties.  Never use, distribute, or redistribute
'any software and/or source code in violation of its licensing.

'Use of this software and/or source code is strictly at your own risk.
'All warranties are specifically disclaimed except as required by law.

'IMPORTANT : THIS CODE USES PASS-THROUGH DATABASE SECURITY !
'
'To enforce application security, set appropriate logins 
'and permissions for all web server and database users.

'For more information see : http://1ClickDB.com

'**Start Encode**

Class ocdForm
	Public ADOConnection	'ADO connection currently in use for the object
	Public ADORecordset	'ADO recordset containing either the record being edited or the empty structure of the recordset being added to
	Public SQLConnect	'ADO connection string
	Public SQLUser	'ADO connection user name
	Public SQLPass	'ADO connection password
	Public SQLSelect 'Comma delimited list of fields to be displayed for edit
	Public SQLFrom	'Name of table to be edited, using an SQL Join is possible but may sometimes produce unpredictable results, test first
	Public SQLWhereExtra 'Use to set extra security restrictions 
	Public SQLWhere 'When no autoincrement field is present, used to identify record
	Public AllowEdit 'if true, enable editing existing records
	Public AllowAdd	'if true, enable adding new records
	Public AllowView	'if true, enable viewing of records
	Public AllowDelete	'if true, enable deletion of records
	Public AllowMultiDelete
	Public MaxRelatedValues
	Public DatabaseType	'Determined automatically in code, should generally be used as a read only field
	Public HTMLCheckField	'HTML string containing the text displayed by a field that needs checking, default is red letter saying "Check Field"
	Public HTMLAttribSaveBtn 'TAG Attributes, include INPUT TYPE and VALUE for Save Button
	Public HTMLAttribCancelBtn 'TAG Attributes, include INPUT TYPE and VALUE for Cancel Button
	Public HTMLAttribNewBtn 'TAG Attributes, include INPUT TYPE and VALUE for New Button
	Public HTMLAttribDeleteBtn 'TAG Attributes, include INPUT TYPE and VALUE for Delete Button
	Public HTMLStatusFieldError 'HTML displayed in error message when field cannot be updated 
	Public HTMLNotFound 'HTML displayed in error message when record cannot be found
	Public HTMLOLEError 'HTML in place of ADO message "Multiple-step operation generated errors" for generic -2147217887 msg
	Public HTMLUpdateFieldFails
	Public HTMLAutoIncrement 'HTML displayed for autoincrement field value when adding a new record
	Public HTMLStatusStart	'HTML placed before error message display (if any)
	Public HTMLStatusEnd 'HTML placed before error message display (if any)
	Public FormStatus	'a string containing any form error messages
	Public HTMLAttribForm
	Public EnablePrimaryKeyLink
	Public FormMode
	Public EditMode
	Public SQLID
	Public FormEStringToken
	Public FormNullToken
	Public InvalidFields
	Public CallBeforeDelete
	Public CallAfterDelete
	Public CallBeforeUpdate
	Public CallAfterUpdate
	Public CallBeforeInsert
	Public CallAfterInsert
	Public CallOnCancel
	Public CallPreDelete
	Public MayBeReplica
	Public CallValidateBeforeUpdate
	Public CallValidateBeforeInsert
	'**Start Encode**
	'internal reserved
	Public QuoteSuffix
	Public QUotePrefix
	Private SQLSelectPK
	Public SQLSelectID
	Private FormEditConnect
	Private ADOMode 'can be used to set connection lock types 
	Public Debug

	Private Sub Class_Initialize
	
%><!--#INCLUDE FILE=ocdForm_Lang.asp--><%
		MaxRelatedValues = 1000
		MayBeReplica = True
		Debug = False
		FormNullToken = ""
		FormEditConnect = True
		SQLID = ""
		FormEStringToken = """"""
		AllowMultiDelete = False
		DatabaseType = ""
		SQLSelectID = ""
		SQLSelectPK = ""
		SQLWhereExtra = ""
		SQLWHERE = ""
		CallValidateBeforeUpdate = False
		CallValidateBeforeInsert = False
		EnablePrimaryKeyLink = True
		CallBeforeDelete = True
		CallAfterDelete = True
		CallBeforeUpdate = True
		CallAfterUpdate = True
		CallBeforeInsert = True
		CallAfterInsert = True
		CallOnCancel = False
		CallPreDelete = False
		QuoteSuffix = """"
		QuotePrefix = """"
		ADOMode = 3	   'adOpenReadWrite 0 'adOpenUnknown
	End Sub

	Public Sub DisplayFieldAsTextBox(ByVal strFieldName, ByVal strDefault, ByVal strAttributes)
		On Error Resume Next
		Dim tcf		  '- temp for CreateField return value
		tcf = ""
		Select Case EditMode
			Case "Add", "Edit"
				If strFIeldName = "s_Generation" And MayBeReplica Then
					If EditMode = "Edit" Then
						tcf = ADORecordset.Fields(strFieldName).Value
					End If
				ElseIf left(strFIeldName, 4) = "Gen_" And MayBeReplica Then
					If EditMode = "Edit" Then
						tcf = ADORecordset.Fields(strFieldName).Value
					End If
				ElseIf ADORecordset.FIelds(strFieldName).Type = 72 Then
					If EditMode = "Edit" Then
						tcf = ADORecordset.Fields(strFieldName).Value
					End If
				ElseIf UCase(strFieldName) = UCASE(SQLSelectID) Then
					If EditMode = "Edit" Then
						tcf = ADORecordset.Fields(strFieldName).Value & vbCRLF
					Else
						tcf = HTMLAutoIncrement
					End If
				Else
					tcf = tcf & "<input "
					tcf = tcf & "type=""text"" "
					tcf = tcf & "name=""ocdTF" & Server.HTMLEncode(strFieldName) & """ "
					tcf = tcf & "value="""
					If FormMode = "Save" Then
						tcf = tcf & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
					Else
						If EditMode = "Add" Then
							If Request.Form("ocdTF" & strFieldName) <> "" Then
tcf = tcf & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
Else
							tcf = tcf & Server.HTMLEncode(strDefault)
							End If
						Else
							If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
								Select Case ADORecordset.Fields(strFieldName).Type
									Case 6
									If ADORecordset.Fields(strFieldName).Value = CCur(FormatCurrency(ADORecordset.Fields(strFieldName).Value)) Then
											tcf = tcf & Server.HTMLEncode(FormatCurrency(ADORecordset.Fields(strFieldName).Value))
										Else
											tcf = tcf & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)

										End If
									Case 202, 203, 200, 201
										If ADORecordset.Fields(strFieldName).Value = "" Then
											tcf = tcf & Server.HTMLEncode(FormEStringToken)
										Else
											tcf = tcf & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
										End If
									Case Else
										tcf = tcf & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
								End Select
							End If
						End If
					End If
					tcf = tcf & """ "
					tcf = tcf & strAttributes
					tcf = tcf & ">"
					If FormMode = "Save" Then
						If IsFieldDataInvalid(strFieldName) Then
							tCF = tCF & HTMLCheckField
						End If
					End If
				End If
			Case "ReadOnly"
				If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
					If ADORecordset.Fields(strFieldName).Type = 6 Then
						tcf = tcf & Server.HTMLEncode(FormatCurrency(ADORecordset.Fields(strFieldName).Value))
					Else
						tcf = tcf & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
					End If
				End If
			Case Else
				tCF = ""
		End Select
		Response.Write(tcf)
	End Sub

	Public Sub DisplayFieldAsCheckBox(ByVal strFieldName, ByVal varCheckValue, ByVal varUncheckValue, ByVal varDefault, ByVal strAttributes)
		Dim tcf
		tcf = ""
		Select Case EditMode
			Case "Add", "Edit"
				tcf = "<input type=""Checkbox"" name=""ocdCB" & Server.HTMLEncode(strFieldName) & """ "
				If FormMode = "Save" Then
					If Request.Form("ocdCB" & strFieldName) <> "" Then
						tcf = tcf & "checked"
					End If
				ElseIf EditMode = "Edit" Then
					If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
						If CStr(ADORecordset.Fields(StrFieldName).Value) = CStr(varCheckValue & "") Then
							tcf = tcf & "checked"
						End If
					End If
				Else
					If CStr(varDefault & "") = CStr(varCheckValue & "") Then
						tcf = tcf & "checked"
					End If
				End If
				tcf = tcf & " " & strAttributes & " >"
				tcf = tcf & "<input type=""Hidden"" name=""ocdCT" & Server.HTMLEncode(strFieldName) & """ value=""" & Server.HTMLEncode(CStr(varCheckValue & ""))
				tcf = tcf & """ " & strAttributes & " >"
				tcf = tcf & "<input type=""Hidden"" name=""ndchf" & Server.HTMLEncode(strFieldName) & """ value=""" & Server.HTMLEncode(CStr(varUnCheckValue & "")) & """>"
				If FormMode = "Save" Then
					If IsFieldDataInvalid(strFieldName) Then
						tCF = tCF & HTMLCheckField
					End If
				End If
			Case "ReadOnly"
				If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
					tcf = tcf & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
				End If
			Case Else
				tCF = ""
		End Select
		Response.Write(tcf)
	End Sub

	Public Sub DisplayFieldAsMemo(ByVal strFieldName, ByVal strDefault, ByVal strAttributes)
		Dim tcf		  '- temp for CreateField return value
		Dim tvarTemp
		Select Case EditMode
			Case "Add", "Edit"
				tcf = tcf & "<textarea "
				tcf = tcf & "name=""ocdTF" & Server.HTMLEncode(strFieldName) & """ "
				tcf = tcf & strAttributes & " "
				tcf = tcf & ">"
				If FormMode = "Save" Then
					tcf = tcf & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
				Else
					If EditMode = "Add" Then
						If Request.Form("ocdTF" & strFieldName) = "" Then
							tcf = tcf & Server.HTMLEncode(strDefault)
						Else
							tcf = tcf & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
						End If
					Else
						tvarTemp = ADORecordset.Fields(strFieldName).Value
						If Not IsNull(tvarTemp) Then
							If tvarTemp = "" Then
								tcf = tcf & Server.HTMLEncode(FormEStringToken)
							Else
								tcf = tcf & Server.HTMLEncode(tvarTemp)
							End If
						End If
					End If
				End If
				tcf = tcf & "</textarea>"
				If FormMode = "Save" Then
					If IsFieldDataInvalid(strFieldName) Then
						tCF = tCF & HTMLCheckField
					End If
				End If
			Case "ReadOnly"
				tvarTemp = ADORecordset.Fields(strFieldName).Value
				If Not IsNull(tvarTemp) Then
					tcf = tcf & Server.HTMLEncode(tvarTemp)
				End If
			Case Else
				tCF = ""
		End Select
		Response.Write(tcf)
	End Sub

	Public Sub DisplayFieldAsSelectList(ByVal strFieldName, ByVal strBoundValues, ByVal strDisplayValues, ByVal strDefaultValue, ByVal strAttributes)
		Dim tCDDF		  '- variable to hold return value of function
		Dim tarrBound, tarrDisplay, tintI, blnSL
		blnSL = False
		tcDDF = ""
		If AllowEdit Then
			tarrBound = split(strBoundValues, ";")
			tarrDisplay = split(strDisplayValues, ";")
			tCDDF = tCDDF & "<select "
			tCDDF = tCDDF & "name=""ocdTF" & Server.HTMLEncode(strFieldName) & """ "
			tCDDF = tCDDF & strAttributes & ">"
			For tintI = 0 To UBound(tarrBound)
				tCDDF = tCDDF & "<option value="""
				If tarrBound(tintI) <> "" Then
					tCDDF = tCDDF & Server.HTMLEncode(tarrBound(tintI))
				End If
				tCDDF = tCDDF & """ "
				If Request.Form("ocdTF" & strFieldName) <> "" Then
					If CStr(tarrBound(tintI)) = CStr(Request.Form("ocdTF" & strFieldName)) Then
						tCDDF = tCDDF & "selected "
						blnSL = True
					End If
				Else
					If (SQLID <> "" Or SQLWHERE <> "") And FormStatus = "" And InvalidFields = "" Then
						If Not ADORecordset.eof Then
							Select Case ADORecordset.Fields(strFieldName).Type
								Case 11								  'adBoolean
									If tarrBound(tintI) = "" Then
										If IsNull(ADORecordset.Fields(strFieldName).Value) Then
											tCDDF = tCDDF & "selected "
											blnSL = True
										End If
									ElseIf CInt(tarrBound(tintI)) = CInt(ADORecordset.Fields(strFieldName).Value) Then
										tCDDF = tCDDF & "selected "
										blnSL = True
									End If
								Case Else
									If CStr(tarrBound(tintI)) = CStr(ADORecordset.Fields(strFieldName).Value & "") Then
										tCDDF = tCDDF & "selected"
										blnSL = True
									End If
									If tarrBound(tintI) = "" And IsNull(ADORecordset.Fields(strFieldName).Value) Then
										tCDDF = tCDDF & "selected"
										blnSL = True
									End If
							End Select
						Else
							If Request.Form("ocdTF" & strFieldName) = "" Then
								If tarrBound(tintI) = strDefaultValue Then
									tCDDF = tCDDF & "selected"
									blnSL = True
								End If
							Else
								If Request.Form("ocdTF" & strFieldName) = strDefaultValue Then
									tCDDF = tCDDF & "selected"
									blnSL = True
								End If
							End If
						End If
					ElseIf (SQLID = "" And SQLWHERE = "") And FormStatus = "" And InvalidFields = "" Then
						If Request.Form("ocdTF" & strFieldName) = "" Then
							If tarrBound(tintI) = strDefaultValue Then
								tCDDF = tCDDF & "selected"
								blnSL = True
							End If
						Else
							If Request.Form("ocdTF" & strFieldName) = strDefaultValue Then
								tCDDF = tCDDF & "selected"
								blnSL = True
							End If
						End If
					End If
				End If
				tCDDF = tCDDF & ">"
				If strDisplayValues = "" Then
					If tarrBound(tintI) <> "" Then
						tCDDF = tCDDF & Server.HTMLEncode(tarrBound(tintI))
					End If
				Else
					If tarrDisplay(tintI) <> "" Then
						tCDDF = tCDDF & Server.HTMLEncode(tarrDisplay(tintI))
					End If
				End If
				Response.Write(tcddF)
				tcddf = ""
			Next
			If Not blnSL Then
				tCDDF = tCDDF & "<option value="""
				If Request.Form("ocdTF" & strFieldName) <> "" Then
					tCDDF = tCDDF & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
				ElseIf (SQLID <> "" Or SQLWHERE <> "") And FormStatus = "" And InvalidFields = "" Then
					If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
						tCDDF = tCDDF & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
					End If
				End If
				tCDDF = tCDDF & """ SELECTED>"
				If (SQLID <> "" Or SQLWHERE <> "") And FormStatus = "" And InvalidFields = "" Then
					If Request.Form("ocdTF" & strFieldName) <> "" Then
						tCDDF = tCDDF & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
					ElseIf (SQLID <> "" Or SQLWHERE <> "") And FormStatus = "" And InvalidFields = "" Then
						If Not IsNull(ADORecordset.Fields(strFieldName).Value) Then
							tCDDF = tCDDF & Server.HTMLEncode(ADORecordset.Fields(strFieldName).Value)
						End If
					End If
				Else
					tCDDF = tCDDF & Server.HTMLEncode(Request.Form("ocdTF" & strFieldName))
				End If
			End If
			tCDDF = tCDDF & "</select>"
			If IsFieldDataInvalid(strFieldName) Then
				tCDDF = tCDDF & HTMLCheckField
			End If
		Else
			If Not ADORecordset.eof Then
				tCDDF = ADORecordset.Fields(strFieldName).Value & vbCRLF
			End If
		End If
		Response.Write(tCDDF)
	End Sub

	Public Sub DisplayFieldAsButtons(ByVal strFieldName, ByVal strBoundValues, ByVal strDisplayValues, ByVal strDefaultValue, ByVal strOrientation)
		Dim tCDDF		  '- variable to hold return value of function
		Dim tarrBound, tarrDisplay, tintI
		tcDDF = ""
		tarrBound = split(strBoundValues, ";")
		tarrDisplay = split(strDisplayValues, ";")
		If UCASE(strOrientation) = "VERTICAL" Then
			tCDDF = tCDDF & "<table vorder=0>"
		End If
		For tintI = 0 To UBound(tarrBound)
			If UCASE(strOrientation) = "VERTICAL" Then
				tCDDF = tCDDF & "<tr><td>"
			End If
			tCDDF = tCDDF & "<input type=""radio"" name=""ocdTF" & Server.HTMLEncode(strFieldName) & """ "
			tCDDF = tCDDF & "value="""
			If tarrBound(tintI) <> "" Then
				tCDDF = tCDDF & Server.HTMLEncode(tarrBound(tintI))
			End If
			tCDDF = tCDDF & """ "
			If Request.Form("ocdTF" & strFieldName) <> "" Then
				If tarrBound(tintI) = Request.Form("ocdTF" & strFieldName) Then
					tCDDF = tCDDF & "CHECKED "
				End If
			Else
				If (SQLID <> "" Or SQLWHERE <> "") And FormStatus = "" And InvalidFields = "" Then
					If Not ADORecordset.eof Then
						If tarrBound(tintI) = "" And IsNull(ADORecordset.Fields(strFieldName).Value) Then
							tCDDF = tCDDF & "checked"
						ElseIf CStr(tarrBound(tintI)) = CStr(ADORecordset.Fields(strFieldName).Value) Then
							tCDDF = tCDDF & "checked"
						End If
					Else
						If tarrBound(tintI) = strDefaultValue Then
							tCDDF = tCDDF & "checked"
						End If
					End If
				ElseIf (SQLID = "" And SQLWHERE = "") And FormStatus = "" And InvalidFields = "" Then
					If tarrBound(tintI) = strDefaultValue Then
						tCDDF = tCDDF & "checked"
					End If
				End If
			End If
			tCDDF = tCDDF & ">"
			If strDisplayValues = "" Then
				If tarrBound(tintI) <> "" Then
					tCDDF = tCDDF & Server.HTMLEncode(tarrBound(tintI))
				End If
			Else
				If tarrDisplay(tintI) <> "" Then
					tCDDF = tCDDF & Server.HTMLEncode(tarrDisplay(tintI))
				End If
			End If
			If UCASE(strOrientation) = "VERTICAL" Then
