<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/con_kiuchi.asp" -->

<%
Dim rs_oferta
Dim rs_oferta_numRows

Set rs_oferta = Server.CreateObject("ADODB.Recordset")
rs_oferta.ActiveConnection = MM_con_kiuchi_STRING
rs_oferta.Source = "SELECT * FROM ofertas ORDER BY CodNoticia DESC"
rs_oferta.CursorType = 0
rs_oferta.CursorLocation = 2
rs_oferta.LockType = 1
rs_oferta.Open()

rs_oferta_numRows = 0
%>
<%
Dim RsNot
Dim RsNot_numRows

Set RsNot = Server.CreateObject("ADODB.Recordset")
RsNot.ActiveConnection = MM_con_kiuchi_STRING
RsNot.Source = "SELECT * FROM noticia ORDER BY CodNoticia DESC"
RsNot.CursorType = 0
RsNot.CursorLocation = 2
RsNot.LockType = 1
RsNot.Open()

RsNot_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 3
Repeat1__index = 0
RsNot_numRows = RsNot_numRows + Repeat1__numRows
%>

<html>
<head>
<title>XPRESS BODYBOARDING</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<style type="text/css">
<!--
.brdnoticia {border: 1px solid #000000;}
.brdnoticia_branca {border: 1px solid #ffffff;}
.brd {border: 1px solid #000000;
}
.style23 {
	font-size: 14px;
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.fonte {
	font-size: 10px;
	color: #003399;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style14 {font-size: 9px}
.fonte2 {
	font-size: 10px;
	color: #0066CC;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}
.style26 {font-size: 12px; color: #003399; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style27 {font-size: 12}
.style28 {font-size: 12; color: #003399; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #666666;
}
a:active {
	text-decoration: none;
}
.style35 {
	font-size: 5px;
	color: #000000;
}
.style41 {font-size: 10px; color: #FFFFFF; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style42 {color: #000000}
.style43 {font-size: 10px; color: #000000; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: normal; }
.bordad_preta {border: 1px solid #000000;}
.style16 {	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style20 {	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
}
.style22 {font-size: 9px; color: #000000; font-weight: bold; }
.style7 {color: #FFFFFF}
.style48 {
	color: #336699;
	font-size: 16px;
	font-family: "Times New Roman", Times, serif;
}
-->
</style>
<script language="JavaScript" src="banco_de_dados/java.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (SUPERIOR3.psd) -->
<table id="Table_01" width="774" height="936" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">
			<img src="images/xpress_01.gif" width="126" height="179" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="images/xpress_02.gif" width="610" height="187" alt=""></td>
		<td rowspan="19">
			<img src="images/xpress_03.gif" width="37" height="935" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="179" alt=""></td>
	</tr>
	<tr>
		<td rowspan="16">
			<img src="images/xpress_04.gif" width="38" height="718" alt=""></td>
		<td colspan="2" rowspan="15">
			<img src="images/xpress_05.gif" width="15" height="706" alt=""></td>
		<td>
			<img src="images/xpress_06.gif" width="73" height="8" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/xpress_07.gif" width="153" height="13" alt=""></td>
		<td rowspan="15" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="682" valign="top" bgcolor="#FFFFFF">  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/xpress.jpg" width="209" height="43"></td>
              </tr>
              <tr>
                <td height="597" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr bgcolor="#FFFFFF">
                    <th colspan="2" scope="col">&nbsp;</th>
                  </tr>
                  <tr bgcolor="#999999">
                    <th colspan="2" scope="col"><div align="left"><span class="style23"><strong>:::..</strong> Not&iacute;cias</span></div></th>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <th colspan="2" scope="col"><div align="left"></div></th>
                    </tr>
                  <tr>
                    <td width="40%" rowspan="2" align="center" valign="middle">
                      <table width="100" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <th scope="col"><table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#B8D8FE">
                            <tr>
                              <td width="213" align="center" valign="middle" bgcolor="#FFFFFF" class="fonte style22"><div align="center"><span class="data"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" target="_parent"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style26"><strong></strong></span></span></span></a></span>
                                      <table width="202" height="18" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <th width="210" height="12" align="left" valign="middle" bgcolor="#336699" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="style41">::. <%=(RsNot.Fields.Item("titulo").Value)%></span></span></span> </span> </th>
                                        </tr>
                                      </table>
                              </div>                                <span class="data"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')"><img src="fotos/noticia/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="200" height="150" hspace="5" border="0" align="center" class="brd"></a></span></td>
                            </tr>
                            <tr>
                              <td height="12" align="center" valign="top" bgcolor="#FFFFFF"><div align="center"><a href="mostra_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" class="fonte2 style42"></a>
                                <table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th bgcolor="#F2F2F2" scope="col"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')" class="fonte2 style42"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
                                  </tr>
                                </table>
                              </div></td>
                            </tr>
                          </table></th>
                        </tr>
                      </table>                      <span class="style35"></span></td>
                    <td width="58%" align="right"><% RsNot.MoveNext() %>                      <table width="300" border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <th width="9" rowspan="2" scope="col"><span class="data"></span></th>
                        <th width="190" height="22" align="left" valign="middle" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="fonte"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></span></th>
                        <th width="95" rowspan="2" scope="col"><span class="data"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')" target="_self"><img src="fotos/noticia/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="80" height="60" hspace="5" border="0" align="center" class="brd"></a></span></th>
                      </tr>
                      <tr>
                        <th height="35" align="left" valign="top" scope="col"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')" target="_self" class="style43"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
                      </tr>
                      <tr>
                        <td height="14" colspan="3"><span class="style14">--------------------------------------------------------------------------------------------------</span></td>
                      </tr>
                    </table>
                      <% RsNot.MoveNext() %>
                      <table width="300" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                          <th width="92" rowspan="2" scope="col"><span class="data"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')"><img src="fotos/noticia/<%=(RsNot.Fields.Item("foto").Value)%>" alt="<%=(RsNot.Fields.Item("titulo").Value)%>" width="80" height="60" hspace="5" border="0" align="center" class="brd"></a></span></th>
                          <th width="199" height="22" align="left" valign="middle" scope="col"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="fonte"><strong><%=(RsNot.Fields.Item("titulo").Value)%></strong></span></span></span></span></th>
                        </tr>
                        <tr>
                          <th height="27" align="left" valign="top" scope="col"><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')" target="_self" class="style43"><%=(RsNot.Fields.Item("resumo").Value)%></a></th>
                        </tr>
                        <tr>
                          <td height="14" colspan="2"><span class="style14">--------------------------------------------------------------------------------------------------</span></td>
                        </tr>
                      </table>
                      <% RsNot.MoveNext() %>
                      <table width="300" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                          <th width="10" scope="col"><span class="data"></span></th>
                          <th width="277" colspan="2" align="left" valign="middle" scope="col">
                            <% 
While ((Repeat1__numRows <> 0) AND (NOT RsNot.EOF)) 
%>
                            <table width="266" height="13" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <th scope="col"><div align="left"><span class="data"><span class="tit style26 style28 style27"><span class="tit style26 style27 style49"><span class="fonte"><strong>::. </strong></span></span></span></span><span class="fonte"><strong><a href="javascript:abrir_janela('ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>','oferta','scrollbars=1','518','500','true')" class="fonte"><%=(RsNot.Fields.Item("titulo").Value)%></a></strong></span> </div></th>
                                </tr>
</table>
                            <div align="left"></div>
                            <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsNot.MoveNext()
Wend
%>                            <span class="data"></span></th>
                          </tr>
                        <tr>
                          <td height="14" colspan="3"><span class="style14">--------------------------------------------------------------------------------------------------</span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr bgcolor="#999999">
                    <td colspan="2"><span class="style23"><strong>:::..</strong> Ofertas </span></td>
                  </tr>
                  <tr align="center" valign="middle">
                    <td height="94" colspan="2"><br>
                      <table width="510" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col"><table width="246" height="181" border="0" cellpadding="0" cellspacing="0" class="bordad_preta">
                          <tr>
                            <th bgcolor="#336699" scope="col"><div align="center" class="style16">Modelo: <%=(rs_oferta.Fields.Item("titulo").Value)%> </div></th>
                          </tr>
                          <tr>
                            <th height="150" align="center" scope="col"><span class="style7"><a href="javascript:openPictureWindow_Fever('fotos/ofertas/<%=(rs_oferta.Fields.Item("foto").Value)%>','300','400','XpressBB','10','10')"><img src="fotos/ofertas/<%=(rs_oferta.Fields.Item("foto").Value)%>" width="90" height="120" border="1" align="middle" class="bordad_preta" bordercolor="#000000"></a><span class="style22"><br>
      clique na foto para ampliar </span></span></th>
                          </tr>
                          <tr>
                            <th width="246" bgcolor="#CCCCCC" scope="col"><span class="style20"><%=(rs_oferta.Fields.Item("resumo").Value)%></span></th>
                          </tr>
                        </table></th>
                        <th scope="col">
						<% rs_oferta.MoveNext() %>
						<table width="246" height="24" border="0" cellpadding="0" cellspacing="0" class="bordad_preta">
                          <tr>
                            <th bgcolor="#336699" scope="col"><div align="center" class="style16">Modelo: <%=(rs_oferta.Fields.Item("titulo").Value)%> </div></th>
                          </tr>
                          <tr>
                            <th height="150" align="center" scope="col"><span class="style7"><a href="javascript:openPictureWindow_Fever('fotos/ofertas/<%=(rs_oferta.Fields.Item("foto").Value)%>','300','400','XpressBB','10','10')"><img src="fotos/ofertas/<%=(rs_oferta.Fields.Item("foto").Value)%>" width="90" height="120" border="1" align="middle" class="bordad_preta" bordercolor="#000000"></a><span class="style22"><br>
      clique na foto para ampliar </span></span></th>
                          </tr>
                          <tr>
                            <th width="246" bgcolor="#CCCCCC" scope="col"><span class="style20"><%=(rs_oferta.Fields.Item("resumo").Value)%></span></th>
                          </tr>
                        </table></th>
                      </tr>
                    </table>                      
                      <br>
                      <table width="471" height="20" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <th width="121" scope="col">&nbsp;</th>
                          <th width="350" class="a9 style48" scope="col"><div align="right"><a href="ofertas.htm" class="style28">Mais Ofertas </a></div></th>
                        </tr>
                      </table>                      
                      <div align="center"></div>                      <p>&nbsp;</p>                      </td>
                  </tr>
                </table></td>
              </tr>
            </table>              
            </td>
          </tr>
      </table></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="index.asp"><img src="images/xpress_09.gif" alt="" width="151" height="28" border="0"></a></td>
		<td rowspan="12">
			<img src="images/xpress_10.gif" width="2" height="234" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="28" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_11.gif" width="151" height="11" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="shapes.htm"><img src="images/xpress_12.gif" alt="" width="151" height="29" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_13.gif" width="151" height="9" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="9" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="portifolio.htm"><img src="images/xpress_14.gif" alt="" width="151" height="27" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="27" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_15.gif" width="151" height="13" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="equipe.htm"><img src="images/xpress_16.gif" alt="" width="151" height="25" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="25" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_17.gif" width="151" height="18" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="18" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="vendas.htm"><img src="images/xpress_18.gif" alt="" width="151" height="23" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_19.gif" width="151" height="20" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="contato.asp"><img src="images/xpress_20.gif" alt="" width="151" height="17" border="0" ,></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="17" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/xpress_21.gif" width="151" height="14" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2" bgcolor="#CCCCCC">&nbsp;			</td>
		<td rowspan="2">
			<img src="images/xpress_23.gif" width="2" height="463" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="451" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/xpress_24.gif" width="7" height="12" alt=""></td>
		<td>
			<img src="images/xpress_25.gif" width="8" height="12" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="12" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/xpress_26.gif" width="736" height="8" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" bgcolor="#CCCCCC"><div align="center"><img src="imagens/visualizacao.jpg" width="500" height="15"> </div></td>
		<td>
			<img src="images/spacer.gif" width="1" height="30" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="38" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="73" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="78" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="530" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="37" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
<%
rs_oferta.Close()
Set rs_oferta = Nothing
%>
<%
RsNot.Close()
Set RsNot = Nothing
%>
