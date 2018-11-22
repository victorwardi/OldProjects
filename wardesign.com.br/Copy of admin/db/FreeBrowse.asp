<%@ LANGUAGE = VBScript.Encode %>
<% ' Except for @ Directives, there should be no ASP or HTML codes above this line
' Setting LANGUAGE = VBScript.Encode enables mixing of encoded and unencoded ASP scripts

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
<!--#INCLUDE FILE=ocdFunctions.asp-->
<!--#INCLUDE FILE=ocdGrid.asp-->
<%

'--------------------
'Begin Page_Load
'--------------------

Dim objGrid

'--------------------
'End Page_Load
'--------------------

'--------------------
'Begin Page_Render
'--------------------

Call WriteHeader("")

Call DisplayBrowse()

Call WriteFooter("")

Response.End()

'--------------------
'End Page_Render 
'--------------------

'--------------------
'Begin Procedures
'--------------------

Sub DisplayBrowse()
Set objGrid = New ocdGrid
Set objGrid.ADOConnection = ocdTargetConn 'DB Connection opened in FreeInit.asp
objGrid.GridID = "A"
objGrid.Debug = ocdDebug
objGrid.AllowMultiDelete = False
objGrid.ADOMaxRecords = ocdMaxRecordsRetrieve
objGrid.GridMaxRecordsDisplay = ocdMaxRecordsDisplay
objGrid.ADORecordsetTimeout = ocdDBTimeout
objGrid.ADOComputeTimeout  = ocdComputeTimeout
objGrid.SQLSelect = Request.QueryString("sqlselect" & "_" & objGrid.GridID)
objGrid.SQLFrom = Replace(Request.QueryString("sqlfrom" & "_" & objGrid.GridID),";","")
objGrid.SQLGroupBy = Request.QueryString("sqlgroupby" & "_" & objGrid.GridID)
objGrid.SQLHaving = Request.QueryString("sqlhaving" & "_" & objGrid.GridID)
objGrid.UseRegExKeywordSearch = ocdUseRegExKeywordSearch
If ocdGridIcons Then
	objGrid.HTMLGridButtons = "first|<img src=""GRIDSMBTNFIRST.GIF"" alt=""First"" border=""0"" width=""18"" height=""18"">;;prev|<img src=""GRIDSMBTNPREV.GIF"" alt=""Previous"" border=""0"" width=""14"" height=""18"">;;paging|smbutton;;next|<img src=""GRIDSMBTNNEXT.GIF"" border=""0"" alt=""Next"" width=""14"" height=""18"">;;last|<img src=""GRIDSMBTNLAST.GIF"" border=""0"" alt=""Last"" width=""18"" height=""18"">;;new|<img src=""GRIDSMBTNNEW.GIF"" alt=""New"" border=""0"" width=""18"" height=""18"">;;search|<img src=""GRIDSMBTNSEARCH.GIF"" alt=""Search Records"" border=""0"" width=""18"" height=""18"">;;drilldown|<img src=""GRIDSMBTNDRILLDOWN.GIF"" alt=""Drill Down"" border=""0"" width=""18"" height=""18"">;;reset|<img src=""GRIDSMBTNRESET.GIF"" alt=""Show All"" border=""0"" width=""18"" height=""18"">;;print|<img src=""GRIDSMBTNPRINT.GIF"" width=18 height=18 border=""0"" alt=""Print All"">;;excel|<img src=""GRIDSMBTNEXCEL.GIF"" border=""0"" alt=""Export to Excel"" width=""18"" height=""18"">;;xml|<img src=""GRIDSMBTNXML.GIF"" border=""0"" alt=""Export to XML"" width=""18"" height=""18"">"
End If

objGrid.HTMLSortASCLink = "<img src=""GridLnkASC.gif"" border=""0"" alt=""Sort Ascending"" width=""11"" height=""11"">"
objGrid.HTMLSortDESCLink = "<img src=""GridLnkDESC.gif"" border=""0"" alt=""Sort Descending"" width=""11"" height=""11"">"
objGrid.HTMLFilterLink = "<img src=""GridLnkFilter.gif"" border=""0"" alt=""Filter on This Field"" width=""11"" height=""11"">"
objGrid.SearchMultiSort = ocdMultipleFieldSort
objGrid.SearchDefaultTextCompare = ocdDefaultTextCompare
objGrid.SearchCheckAll = ocdShowCheckedSearchFields
objGrid.ExportForceDownload = ocdForceExportDownload
objGrid.SQLPageSizeDefault = ocdPageSizeDefault

If (ocdReadOnly) Then
	objGrid.AllowDelete = False
	objGrid.AllowAdd = False
	objGrid.AllowEdit = False
Else
	objGrid.AllowDelete = True
	objGrid.AllowAdd = True
	objGrid.AllowEdit = True
	objGrid.FormEdit = "FreeEdit.asp"
End If

'Retrieve Data For Browse
objGrid.Open()

If (Err.Number <> 0) then 
	If (Not blnHeaderFlushed) Then
		Call WriteHeader("")
	End If
	Call WriteFooter("")
End If

'Display individual grid elements depending on grid mode
'Valid Modes are BROWSE, SEARCH, EXPORT and FILTER

Select Case UCase(objGrid.GridMode)
	Case "EXPORT"
		If (UCase(Request.QueryString("ocdExportFormat_" & objGRID.GridID)) = "PRINT") Then
			objGrid.HTMLExportStart = "<html><head><title>1 Click DB Export</title><link rel""=stylesheet"" type=""text/css"" href=""ocdStyleSheetExport.css""></head><body onload=""javascript:window.print();"">"
		Else
			objGrid.HTMLExportStart = "<html><head><title>1 Click DB Export</title><body>"
		End If
		objGrid.HTMLExportEnd = "</body></html>"
		Call objGrid.Display("GRID")
		Response.End
	Case "SEARCH" '
		Response.Write("<span class=""Information"">Search in ")
		Response.Write(Server.HTMLEncode(objGrid.SQLFrom))
		Response.Write("</span>")
		objGrid.Display("SEARCH")
	Case "BROWSE" 'Table View of Selected Records
		objGrid.RenderAsHTML = ocdRenderAsHTML
		If (ocdShowSQLText) Then
			Response.Write("<span class=""information"">" ) 
				If (UCase(Left(objGrid.SQLText, 12 + Len(Cstr(objGrid.SQLPageSize)))) = "SELECT TOP " & Trim(Cstr(ObjGrid.SQLPageSize)) & " " And UCase(left(objGrid.SQLSelect, 4)) <> "TOP ") Then
					Response.Write("SELECT " & (Mid(Cstr(objGrid.SQLText), 13 + Len(Cstr(objGrid.SQLPageSize)))))
			Else
				Response.Write(Trim(Server.HTMLEncode(objGrid.SQLText)) )
			End if
			Response.Write("</span>")
		End If
		Response.Write("<p>")
		Response.Write("<table><tr><td nowrap valign=""top"">")
		objGrid.Display("Buttons") 		
		Response.Write("</td><td nowrap valign=""top"">")
		objGrid.Display("Keyword")
		Response.Write("</td></tr></table>")
		Response.Flush()
		objGrid.Display("Grid") 
		If objGrid.AllowEdit = False And Not ocdReadOnly Then
				Response.Write("<p><img src=""appWarningSmall.gif"" border=""0"" alt=""Warning""> An ")
				If (ocdDatabaseType = "Access") Then
					Response.Write(" autonumber field ")
					If (Not ocdIsODBC) Then
						Response.Write(" or eligible primary key ")
					End If
				ElseIf (ocdDatabaseType = "SQLServer") Then
					Response.Write(" identity field ")
					If not ocdIsODBC Then
						Response.Write(" or eligible primary key ")
					End If
				ElseIf(ocdDatabaseType = "MySQL")Then
					Response.Write(" autoincrement field ")
				Else
					Response.Write(" eligible primary key ")
				End If
				Response.Write(" is required to update data.</p>")
		End If
	Case "FILTER" 'Single Field Search
		Response.Write("<span class=""information"">Set Filter</span>")
		objGrid.Display("Filter")
End Select

Response.Flush()

objGrid.Close()

Set objGrid = Nothing
End Sub

'--------------------
'End Procedures
'--------------------

%>