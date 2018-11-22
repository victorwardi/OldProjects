<%
	'*******
	' A Simple, easy to navigate album. 
	' Developed by: Salman Quazi [admin@setcomputing.com]
	' January, 22nd 2002.
	'*******

	Dim album_FSO, album_list, img_id, item
	Dim dir_string,tmp
	Dim max_file

	response.write "<script type=""text/javascript"" src=""" & album_dir & "_system/script.js""></script>"
	Select Case (Request.QueryString("prv")) 
	
	Case ""	
		dir_string = album_dir & Request.QueryString("dir")
		set album_FSO = Server.CreateObject("Scripting.FileSystemObject")
		set album_list = album_FSO.GetFolder(Server.MapPath(dir_string))
		img_id=0
	
		For each item in album_list.SubFolders
				If (InStr(1, item, "_vti", 1) = 0) And InStr(1, item, "_system", 1) = 0 Then
					img_id = img_id + 1
				end if
		Next
		set item = nothing
		set album_list = nothing
		set album_FSO = nothing
		
		if img_id = 0 then
			Dim dir_name, show_pic
			dir_name = Request.QueryString("dir")
		
			dir_string = album_dir & dir_name
			if Request.QueryString("Próxima_id") = "" then
				show_pic = "0"
			else
				show_pic = Request.QueryString("Próxima_id")
			end if
		
			set album_FSO = Server.CreateObject("Scripting.FileSystemObject")
			set album_list = album_FSO.GetFolder(Server.MapPath(dir_string))
			
			dim mark_num, img_dir_name
			img_id=0
			mark_num = 0
		
			img_dir_name = dir_name
			dir_name=Server.URLEncode(dir_name)
			For each item in album_list.Files
				tmp=Mid(item, Instr(item, "."))
				if (tmp<>".asp" AND tmp<>".htm" AND tmp<>".html" AND tmp<>".php" AND show_pic = (img_id&"")) then
					with(response)
						.write "<center><table><tr><td>"
						.write "<img src=""" & album_dir & img_dir_name & "/" & item.name & """ border=""0"" alt=""" & item.name & """></td></tr></table>"
						.write "<table><tr><td align=""center"">" & Request.QueryString("evento") & "<br>Fotógrafo: " & Request.QueryString("fotografo") & ".</td></tr></table>"
					end with
					mark_num = img_id
				end if
				img_id = img_id+1
			Next 
			response.write "<table border=""0"" cellpadding=""0"" cellspacing=""0"" width=""100%"">"
			response.write "<tr>"
		
			if mark_num = 0 then
				response.write "<td width=""50%"" align=""left""></td>"
			ElseIf(Request.QueryString("dir")<>"") then
				response.write "<td width=""50%"" align=""left""><a onMouseover=""javascript:status_window(0); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_file & "?compra=" & Request.QueryString("compra") & "&dir=" & dir_name & "&Próxima_id=" & mark_num-1 & "&evento=" & Request.QueryString("evento") & "&fotografo=" & Request.QueryString("fotografo") & "&max_pic=" & img_id & """><img src='" & album_dir & "_system/images/backarrow.gif' border='0'> Voltar Foto</a></td>"
			end if
					
			if ((mark_num+1)&"") = Request.QueryString("max_pic") then
				response.write "<td width=""50%"" align=""right""></td>"
			ElseIf(Request.QueryString("dir")<>"" AND (mark_num+1) <> img_id AND (mark_num+img_id+0)<>0) Then
				response.write "<td width=""50%"" align=""right""><a onMouseover=""javascript:status_window(1); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_file & "?compra=" & Request.QueryString("compra") &"&dir=" & dir_name & "&Próxima_id=" & mark_num+1 & "&evento=" & Request.QueryString("evento") & "&fotografo=" & Request.QueryString("fotografo") & "&max_pic=" & img_id & """>Próxima Foto <img align=""middle"" src=""" & album_dir & "_system/images/nextarrow.gif"" border=""0"" /></a></td>"
			end if
						
			response.write "</tr>"
			response.write "</table>"
		
			set item = nothing
			set album_list = nothing
			set album_FSO = nothing
		end if

		if(Request.QueryString("dir") <> "") then
			with(response) 
				.write "<div align=""center"">"
				.write "<p />"
				.write "<table border=""0"" cellpadding=""0"" style=""border: 1 solid silver; border-style: dotted;"">"
				.write "<tr>"
				.write "<td>&nbsp;&nbsp;&nbsp;"
				.write "<a onMouseover=""javascript:status_window(2); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & """></a>"
			
				If ((mark_num+img_id+0)<>0) then
					.write "  <a onMouseover=""javascript:status_window(5); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""javascript:window.location=jump_uri('" & album_dir & "','" & (mark_num+1) & "','" & Request.QueryString("dir") & "','" &  img_id & "');""></a>"
				end if
							
								
				.write "<a href=""" & album_dir & album_file & "?dir=" & Request.QueryString("dir") & "&prv=y" & """ onMouseover=""javascript:status_window(6); return true;"" onMouseOut=""window.status=''; return true;"" class=""album""></a> "
				.write "<a onMouseover=""javascript:status_window(9); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & album_file & "?prv=sld&dir=" & Request.QueryString("dir") & """>Ver Como Slide Show</a>"
				.write "&nbsp;&nbsp;&nbsp;</td></tr></table></div>"
			end with
		else
			response.write "<br /></p></form>"
		end if
	Case "sld"
		if(Request.QueryString("dir") <> "") then
			dir_string = album_dir & Request.QueryString("dir")

			set album_FSO = Server.CreateObject("Scripting.FileSystemObject")
			set album_list = album_FSO.GetFolder(Server.MapPath(dir_string))
		
			img_dir_name = Request.QueryString("dir")
			dir_name=Server.URLEncode(dir_name)
			with(response)
				img_id=0
				// A loop to find the max, file
				max_file=0
				For each item in album_list.Files
					max_file=max_file+1
				Next
				
				.write "<script language=""JavaScript"" type=""text/javascript"">"
				.write "var slideShowSpeed =" & slideShowDelay & ";"
				.write "var length=" & max_file & ";"
				if (Request.QueryString("rand") = "y") then
					.write "var rand_anim_len=3;"
				else
					.write "var rand_anim_len=1;"
				end if
				.write "var t;"
				.write "var j = 0;"
				.write "var preLoad = new Array(" & max_file & ");"
				dim save_image
				For each item in album_list.Files						
					tmp=Mid(item, Instr(item, "."))

					if (tmp<>".asp" AND tmp<>".htm" AND tmp<>".html" AND tmp<>".php") then
						if(img_id=0)then 
							save_image= album_dir & img_dir_name & "/" & item.name
						end if
						.write "preLoad[" & img_id & "] = new Image();"
						.write "preLoad[" & img_id & "].src = '" & album_dir & img_dir_name & "/" & item.name & "';"
					end if
					img_id=img_id+1
				Next
				.write "var rand_anim = new Array(rand_anim_len);"
				.write "rand_anim[0] = ""blendTrans(duration=2);"";"
				.write "rand_anim[1] = ""revealTrans(duration=2, transition=12);"";"
				.write "rand_anim[2] = ""revealTrans(duration=2);"";"
					
				.write "</script><div align=""center"">"
				.write "<br /><br /><img src=""" & save_image &""" alt=""SlideShow"" name=""SlideShow"" />"
				.write "<p /><br /><br /><table border=""0"" cellpadding=""0"" style=""border: 1 solid silver; border-style: dotted;"">"
				.write "<tr>"
				.write "<td>&nbsp;&nbsp;&nbsp;"
				.write "<a onMouseover=""javascript:status_window(2); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & """></a>  "
				.write "<a onMouseover=""javascript:status_window(8); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & album_file & "?prv=y&dir=" & Request.QueryString("dir") & """></a>  "
				.write "<a onMouseover=""javascript:status_window(7); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & album_file & "?dir=" & Request.QueryString("dir") & """>Voltar Ao Modo Normal</a>&nbsp;&nbsp;&nbsp;"
				.write "</td></tr></table></div>"
				.write "<script type=""text/javascript"" language=""JavaScript"">runSlideShow();</script>"
			end with
			set album_list = nothing
			set album_FSO = nothing

		else
			response.write "<p />No Directory to thumbnail preview"
		end if
	Case "y"
		if(Request.QueryString("dir") <> "") then
			dir_string = album_dir & Request.QueryString("dir")

			set album_FSO = Server.CreateObject("Scripting.FileSystemObject")
			set album_list = album_FSO.GetFolder(Server.MapPath(dir_string))
		
			img_dir_name = Request.QueryString("dir")
			dir_name=Server.URLEncode(dir_name)
			with(response)
				.write "<div align=""center""><table width=""100"" border=""0"" cellspacing=""2"" cellpadding=""2"">"
				.write "<tr>"
				img_id=0
				// A loop to find the max, file
				max_file=0
				For each item in album_list.Files
					max_file=max_file+1
				Next
				For each item in album_list.Files						
					tmp=Mid(item, Instr(item, "."))
					img_id=img_id+1

					if (tmp<>".asp" AND tmp<>".htm" AND tmp<>".html" AND tmp<>".php") then
						.write "<td width=""100"" align=""center""><a href=""" & album_dir & album_file & "?compra=" & Request.QueryString("compra") & "&dir=" & img_dir_name & "&Próxima_id=" & (img_id-1) & "&evento=" & Request.QueryString("evento") & "&fotografo=" & Request.QueryString("fotografo") & "&max_pic=" & max_file & "&thmb=y""><img class=""trans"" src=""http://www.saquaonline.com.br/novo/album/_system/gerath.asp?arquivo=" & album_dir & img_dir_name & "/" & item.name & """ onMouseOut=""out();"" onMouseOver=""over();"" & border=""0"" alt=""" & item.name & """></a><br></td>"
					end if
					if ((img_id Mod imgPerRow) = 0) then
						.write "</tr><tr>"
					end if
				Next
				
				.write "</tr></table></div>"
				.write "<div align=""center"">"
				.write "<p><br><br><table border=""0"" cellpadding=""0"" style=""border: 1 solid silver; border-style: dotted;"">"
				.write "<tr>"
				.write "<td>&nbsp;&nbsp;&nbsp;"
				.write "<a onMouseover=""javascript:status_window(2); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & """></a>  "
				.write "<a onMouseover=""javascript:status_window(9); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & album_file & "?prv=sld&dir=" & Request.QueryString("dir") & """>Ver Como Slide Show</a> | "
				.write "<a onMouseover=""javascript:status_window(7); return true;"" onMouseOut=""window.status=''; return true;"" class=""album"" href=""" & album_dir & album_file & "?dir=" & Request.QueryString("dir") & """>Voltar Ao Modo Normal</a>&nbsp;&nbsp;&nbsp;"
				.write "</td></tr></table></div>"
			end with
			set album_list = nothing
			set album_FSO = nothing
		else
			response.write "<p />No Directory to thumbnail preview"
		end if
	end select
%>