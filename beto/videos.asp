<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/con_bb.asp" -->
<%
Dim RsNot
Dim RsNot_numRows

Set RsNot = Server.CreateObject("ADODB.Recordset")
RsNot.ActiveConnection = MM_con_bb_STRING
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/template.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Erisberto.com ___________________________________________________________________</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
td {
	text-decoration: none;
	border: none;
}
img {
	text-decoration: none;
	border: none;
}
font {
	font-family: Tahoma;
	font-size: 11px;
	color: #FFFFFF;
	text-decoration: none;
	border: none;
}
a {
	font-family: Tahoma;
	font-size: 11px;
	text-decoration: none;
	border: none;
	color: #FFFFFF;
}
.laranja {
	font-size: 10px;
	font-weight: bold;
	color: #FF6600;
}
.brd {border: 1px solid #F7E849;
}
.brd_pagina {border: 1px solid #666666;
}
.style2 {
	color: #F7E849;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #F7E849;
	font-weight: bold;
}
.preto {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
}
body {
	background-image:  url(imagens/retalhos/fundo.gif);
}
.style9 {
	font-size: 1px;
	color: #CCD7D9;
}
.style10 {color: #EFDC11}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style11 {
	font-size: 14px;
	color: #000000;
	font-family: tahoma;
}
.style12 {color: #666666}
.style13 {color: #000000}
.style14 {color: #FF3300}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<!-- InstanceEndEditable --><!-- InstanceParam name="width" type="text" value="100%" -->
</head>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<table width="778" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="brd_pagina">
	<tr>
				
				<!--FLASH-->
					<td height="9" width="100%"><img src="imagens/topo/topo_01.jpg" width="778" height="28" border="0" usemap="#Map"></td>
				<!--FLASH-->
  </tr>
	<tr>
	  <td height="9"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="778" height="92">
        <param name="movie" value="imagens/topo/flash.swf">
        <param name=quality value=high>
        <embed src="imagens/topo/flash.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="778" height="92"></embed>
      </object></td>
  </tr>
	<tr>
	  <td height="33"><table width="778" height="33" border="0" cellpadding="0" cellspacing="0" background="images/nenu/menu_r1_c16.jpg">
        <tr>
          <td width="37"><img src="images/nenu/menu_r1_c1.jpg" width="37" height="33"></td>
          <td width="21"><img src="images/nenu/menu_r1_c2.jpg" width="21" height="33"></td>
          <td width="54"><a href="galerias.asp"><img src="images/nenu/menu_r1_c3.jpg" width="54" height="33" border="0"></a></td>
          <td width="28"><img src="images/nenu/menu_r1_c4.jpg" width="28" height="33"></td>
          <td width="48"><a href="videos.asp"><img src="images/nenu/menu_r1_c5.jpg" width="48" height="33" border="0"></a></td>
          <td width="37"><img src="images/nenu/menu_r1_c6.jpg" width="37" height="33"></td>
          <td width="81"><a href="apresentacao.asp"><img src="images/nenu/menu_r1_c7.jpg" width="81" height="33" border="0"></a></td>
          <td width="97"><img src="images/nenu/menu_r1_c8.jpg" width="24" height="33"><a href="resultados.asp"><img src="images/nenu/menu_r1_c9.jpg" width="73" height="33" border="0"></a></td>
          <td width="72"><img src="images/nenu/menu_r1_c10.jpg" width="27" height="33"><a href="titulos.asp"><img src="images/nenu/menu_r1_c11.jpg" width="45" height="33" border="0"></a></td>
          <td width="92"><img src="images/nenu/menu_r1_c12.jpg" width="55" height="33"><a href="midia.asp"><img src="images/nenu/menu_r1_c13.jpg" width="37" height="33" border="0"></a></td>
          <td width="46"><img src="images/nenu/menu_r1_c14.jpg" width="46" height="33"></td>
          <td width="134"><a href="contato.asp"><img src="images/nenu/menu_r1_c15.jpg" width="53" height="33" border="0"></a></td>
          <td width="21">&nbsp;</td>
        </tr>
      </table></td>
  </tr>

	<tr>
		<td height="100%" width="100%" valign="top">
			<table height="327%" border="0" cellpadding="0" cellspacing="0">
				<tr>
<td width="248" align="center" valign="top" background="images/bg4.jpg">
  <table width="248" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="33"><img src="images/w2.jpg"></td>
    </tr>
    <tr>
      <td height="101" align="center">
        <% 
While ((Repeat1__numRows <> 0) AND (NOT RsNot.EOF)) 
%>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="90" align="center" valign="middle"><span class="fonte style22"><span class="data"></span></span>
                  <table width="80" height="71" border="0" cellpadding="0" cellspacing="0" class="brd">
                    <tr>
                      <th width="70" height="70" background="fotos/noticia/<%=(RsNot.Fields.Item("foto").Value)%>" scope="col">&nbsp;</th>
                    </tr>
                  </table></td>
                <td width="158"><span class="style2"><%=(RsNot.Fields.Item("data").Value)%></span><font><br>
                        <span class="style3"><%=(RsNot.Fields.Item("resumo").Value)%></span> <br>
                        <span class="style5 style10"><a href="ver_noticia.asp?CodNot=<%=(RsNot.Fields.Item("CodNoticia").Value)%>" class="style5">Leia Mais</a> </span></font></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br>
                    <img src="images/l1.jpg"></td>
            </tr>
              </table>
        <% 
  Repeat1__index=Repeat1__index+1
  Repeat1__numRows=Repeat1__numRows-1
  RsNot.MoveNext()
Wend
%>
        <table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="20" class="style2" scope="col"><a href="arquivo.asp" class="style10">Arquivo</a></th>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="100%"></td>
    </tr>
  </table></td>
					<td width="530" height="348" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th width="549" height="11" colspan="2" scope="col"><table width="100%" height="11" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="463" background="images/bg6.jpg"></td>
                            </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <!-- InstanceBeginEditable name="tabela_editavel" -->
                        <th height="337" colspan="2" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th align="left" scope="col"><img src="imagens/retalhos/videos_.jpg" width="200" height="40"></th>
                            <th align="left" scope="col"><div align="center"><span class="style2 style38 style39"><a href="default.asp" class="laranja">Voltar &agrave; P&aacute;gina Inicial</a></span></div></th>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <th height="134" background="imagens/fundos/galeria.jpg" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <th width="46%" scope="col"><img src="imagens/fundos/gal1.gif" width="242" height="113"></th>
                                    <th width="54%" height="134" scope="col"><span class="style11"><span class="style12">Erisberto Quebrando Tudo em um Normal A&eacute;reo Animal em S&atilde;o Conrado!<br>
                                          <span class="preto"><strong><a href="videos/beto_360_aereo.mpg" class="preto">Clique Aqui</a></strong></span> para Baixar o v&iacute;deo!</span><br>
                                    <span class="style3 style14">tamanho 2,3M </span></span></th>
                                  </tr>
                                </table></th>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table></th>
                        <!-- InstanceEndEditable --></tr>
                  </table></td>
				</tr>
		  </table>
		</td>
	</tr>
	<tr>
	  <td height="8" background="images/bg5.jpg"></td>
  </tr>
	<tr>
	  <td height="20" bgcolor="#3C9ED1"><div align="center"><font><a href="http://www.erisberto.com">Home</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;<a href="galerias.asp">Galerias</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="videos.asp">V&iacute;deos</a>&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="apresentacao.asp">Apresenta&ccedil;&atilde;o</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;<a href="resultados.asp">&nbsp;Resultados</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="titulos.asp">T&iacute;tulos</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="midia.asp">M&iacute;dia</a>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;<a href="contato.asp">Contato</a></font> </div></td>
  </tr>
	<tr>
		<td height="2" background="images/bg5.jpg"></td>
	</tr>
	<tr>
	  <td height="40" align="center" bgcolor="#3C9ED1" ><table width="97%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th scope="col"><a href="http://www.waverebel.com" target="_blank"><img src="imagens/logos/wr.jpg" width="120" height="30" border="0"></a></th>
          <th scope="col"><a href="http://www.360invert.com.br" target="_blank"><img src="imagens/logos/360.jpg" width="120" height="30" border="0"></a></th>
          <th scope="col"><img src="imagens/logos/redley.jpg" width="120" height="30"></th>
          <th height="40" scope="col"><a href="http://www.saquabb.com.br" target="_blank"><img src="imagens/logos/saquabb.jpg" width="120" height="30" border="0"></a></th>
        </tr>
      </table></td>
  </tr>
	<tr>
	  <td height="1" align="right" bgcolor="#CCD7D9" ><span class="style9">-</span></td>
  </tr>
	<tr>
		<td height="28" align="right" background="images/nenu/menu_r1_c16.jpg" bgcolor="#FFCC00" ><div align="center"><font style="color:#000000">Erisberto.Com &copy; 2005 • Todos os Direitos Reservados • Desenvolvido Por <a href="http://www.wardesign.com.br" target="_blank"><strong>Wardesign.com.br</strong></a> </font></div></td>
	</tr>
</table>

<map name="Map">
  <area shape="rect" coords="694,6,721,26" href="http://www.erisberto.com">
  <area shape="rect" coords="731,5,759,27" href="contato.asp">
</map>
</body>
<!-- InstanceEnd --></html>
<%
RsNot.Close()
Set RsNot = Nothing
%>
