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
	color: #FF6600;
	font-size: 14px;
	font-weight: bold;
}
.style12 {color: #FF0000}
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
                        <th height="337" colspan="2" align="center" valign="top" scope="col"><table width="95%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th height="52" class="style3" scope="col"><div align="left"><img src="imagens/retalhos/result.jpg" width="200" height="40"></div></th>
                            <th class="style3" scope="col"><span class="style2 style38 style39"><a href="default.asp" class="laranja">Voltar &agrave; P&aacute;gina Inicial</a></span></th>
                          </tr>
                          <tr>
                            <td colspan="2" class="style3"><p class="style10 style11">Ano de 2000</p>
                              <p><strong>Body Treino Rasec da Gloria de Body Board.</strong></p>
                              <p>3&ordf; etapa<br>
                                Iniciante 4&deg; colocado. <br>
                              Local: Ponta da Fruta (V.V. ES)<br>
                              <br>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Conaude de Integra&ccedil;&atilde;o das Escolinhas de Body Board.</strong></p>
                              <p>3&ordf; etapa<br>
                                Gromets 5&deg; colocado.<br>
                              Local: Pomp&eacute;ia (V.V. ES) <br>
                              <br>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Big Beach Anomalia de Bodyboard </strong></p>
                              <p><em><strong>2&ordf; Copa Big Beach Anomalia de Body board </strong></em></p>
                              <p>1&ordf; etapa <br>
                                Iniciante 2&deg; colocado.<br>
                                Local: Pomp&eacute;ia (V.V. ES) </p>
                              <p>2&ordf; etapa<br>
                                Iniciante 2&deg; colocado.<br>
                                Local: Barra do Jucu (V.V. ES)</p>
                              <p>5&ordf; etapa<br>
                                Iniciante 1&deg; colocado.<br>
                                Local: Pomp&eacute;ia (V.V. ES)</p>
                              <p>6&ordf; etapa<br>
                                Iniciante 1&deg; colocado.<br>
                                Local: Barra do Jucu (V.V. ES) </p>
                              <p><em><strong>Obs.: A segunda Copa Big Beach Anomalia foi considerada o Circuito Estadual de 2000. </strong></em></p>
                              <p><strong>CAMPE&Atilde;O DO CIRCUITO</strong> <br>
                                <span class="style12">Resultado Final</span><br>
                              </p>
                              <p><span class="style11">Ano de 2001</span><br>
                              </p>
                              <p><strong>3&ordm; Festival de Ver&atilde;o (Hard Finger Open de body board) </strong></p>
                              <p>2&ordf; etapa <br>
                                Mirim 4&deg; colocado. <br>
                                Local: Barra do Jucu (V.V. ES) <br>
                                <br>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>2&ordm; Body treino Rasec da gloria de body board </strong></p>
                              <p>2&ordf; etapa <br>
                                Mirim 5&deg; colocado<br>
                                Local: Ponta da Fruta (V.V. ES)</p>
                              <p>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>1&ordm; Circuito interno da EPBB</strong></p>
                              <p>4&ordf; etapa<br>
                                Amador 4&deg; colocado<br>
                                Local: Pomp&eacute;ia (V.V. ES) <br>
                              </p>
                              <p><em><strong>Nesta etapa Erisberto foi campe&atilde;o da Best Wave (melhor onda) a qual recebendo um 10 un&acirc;nime dos juizes. </strong></em></p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>3&ordf; Ta&ccedil;a Brilho Veneno de body board (valida pelo Circuito Brasileiro de body board) </strong></p>
                              <p>4&ordf; etapa <br>
                                Amador 9&deg; colocado <br>
                              Local: Farol de S&atilde;o Tom&eacute; (Campos dos Goitacazes R.J.) <br>
                              <br>
                              --------------------------------------------------------------------------------</p>
                              <p><strong>Copa de Bodyboard </strong></p>
                              <p><em><strong>3&ordf; Copa de body board (valida pelo circuito capixaba) </strong></em></p>
                              <p>1&ordf; etapa <br>
                                Amador 2&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES)</p>
                              <p>4&ordf; etapa<br>
                                Amador 1&deg; colocado<br>
                                Local: Pomp&eacute;ia (V.V.ES) </p>
                              <p>4&deg; Colocado na Classifica&ccedil;&atilde;o Geral<br>
                                Resultado da Classifica&ccedil;&atilde;o Geral <br>
                              </p>
                              <p class="style11">Ano de 2002<br>
                              </p>
                              <p><strong>Festival de Ver&atilde;o Unimed 2002 - Amador</strong><br>
                              </p>
                              <p><em><strong>4&deg; Festival de Ver&atilde;o Unimed 2002 </strong></em></p>
                              <p>1&ordf; etapa <br>
                                Amador 7&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p>2&ordf; Etapa <br>
                                Amador 7&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p>3&ordf; Etapa <br>
                                Amador 1&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p><strong>3&deg; Colocado na Classifica&ccedil;&atilde;o Geral</strong><br>
                                <span class="style12">Resultado Final </span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>Festival de Ver&atilde;o Unimed 2002 - Profissional</strong><br>
                              </p>
                              <p><em><strong>4&deg; Festival de ver&atilde;o Unimed 2002 </strong></em></p>
                              <p>2&ordf; Etapa <br>
                                Profissional 7&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES)</p>
                              <p>3&ordf;Etapa <br>
                                Profissional 7&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p><strong>7&deg; Colocado na Classifica&ccedil;&atilde;o Geral </strong><br>
                                <span class="style12">Resultado Final </span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Capixaba de Bodyboard 2002 - Amador</strong><br>
                              </p>
                              <p><em><strong>1&deg; Circuito Estadual Unimed 2002 </strong></em></p>
                              <p>1&ordf; Etapa <br>
                                Amador 1&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p>2&ordf; Etapa <br>
                                Amador 2&deg; colocado <br>
                                Local: Pomp&eacute;ia (V.V.ES) </p>
                              <p>3&ordf; Etapa <br>
                                Amador 4&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p>4&ordf; Etapa <br>
                                Amador 5&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p>5&ordf; Etapa <br>
                                Amador 3&deg; colocado <br>
                                Local: Barra Sol (V.V.ES) </p>
                              <p>6&ordf; Etapa <br>
                                Amador 1&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) </p>
                              <p> </p>
                              <p><strong>CAMPE&Atilde;O CIRCUITO CAPIXABA AMADOR</strong><br>
                                <span class="style12">Resultado Final </span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Brasileiro de body board 2002 </strong></p>
                              <p>6&ordf; Etapa <br>
                                Amador 4&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p><span class="style11">Ano de 2003</span><br>
                              </p>
                              <p><strong>Festival de Ver&atilde;o Unimed 2003 - AM</strong></p>
                              <p><strong><em>5&deg; Festival de ver&atilde;o Unimed 2003 Amador</em></strong></p>
                              <p>1&ordf; Etapa <br>
                                Amador 7&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p>2&ordf; Etapa <br>
                                Amador 1&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p>3&ordf; Etapa <br>
                                Amador 4&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p><strong>Campe&atilde;o do Circuito</strong><br>
                                <span class="style12">Resultado Final</span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>5&deg; Festival de Ver&atilde;o Unimed 2003 OPEN</strong></p>
                              <p>2&ordf; Etapa <br>
                                Open 2&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES)<br>
                              </p>
                              <p>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>Circuito Brasileiro 2003 - Amador</strong><br>
                              </p>
                              <p><strong><em>Circuito Brasileiro 2003</em></strong></p>
                              <p>1&ordf; Etapa<br>
                                Amador 2&ordm; Colocado<br>
                                Local: Farol de S&atilde;o Tome (Campos RJ)<br>
                              </p>
                              <p>2&ordf; Etapa<br>
                                Amador 2&ordm; Colocado<br>
                                Local: Maracaipe (Ipojuca PE)<br>
                              </p>
                              <p>3&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Costa Azul (Rio das Ostras RJ)<br>
                              </p>
                              <p>4&ordf; Etapa<br>
                                Amador 2&ordm; Colocado<br>
                                Local: Cruz da Alma (Macei&oacute; AL)<br>
                              </p>
                              <p>5&ordf; Etapa<br>
                                Amador 2&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)<br>
                              </p>
                              <p><strong>Vice-Campe&atilde;o Brasleiro Amador 2003</strong><br>
                                <span class="style12">Resultado Final</span></p>
                              <p>&nbsp;</p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Jogos Universit&aacute;rios 2003 - Open</strong><br>
                              </p>
                              <p>J<em><strong>UNES Jogos Universit&aacute;rios de 2003 </strong></em></p>
                              <p>Etapa &Uacute;nica<br>
                                Open 1&deg; colocado <br>
                                Local: Solemar (Serra ES) <br>
                              </p>
                              <p><strong>Campe&atilde;o Universit&aacute;rio 2003</strong><br>
                                <span class="style12">Resultado Final</span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Capixaba 2003 - Amador</strong><br>
                              </p>
                              <p><em><strong>Circuito Capixaba 2003 </strong></em></p>
                              <p>1&ordf; Etapa <br>
                                Amador 4&deg; colocado <br>
                                Local: Pomp&eacute;ia (V.V.ES) <br>
                              </p>
                              <p>2&ordf; Etapa <br>
                                Amador 2&deg; colocado <br>
                                Local: Barra do Jucu (V.V.ES) <br>
                              </p>
                              <p>3&ordf; Etapa <br>
                                Amador 5&deg; colocado <br>
                                Local: Barra Sol (V.V.ES)<br>
                              </p>
                              <p>4&ordf; Etapa <br>
                                Amador 1&deg; colocado <br>
                                Local: Barra Sol (V.V.ES)<br>
                              </p>
                              <p><strong>Campe&atilde;o Capixaba Amador 2003 </strong><br>
                                <span class="style12">Resultado Final</span><br>
                              </p>
                              <p><span class="style11">Ano de 2004</span><br>
                              </p>
                              <p><strong>Circuito Brasileiro 2004 </strong></p>
                              <p>1&ordf; Etapa<br>
                                Amador 3&ordm; Colocado<br>
                                Local: Farol de S&atilde;o Tome (Campos RJ) </p>
                              <p>2&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Costa Azul (Rio das Ostras RJ) </p>
                              <p>3&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Maracaipe (Ipojuca PE) </p>
                              <p>4&ordf; Etapa<br>
                                Amador 13&ordm; Colocado<br>
                                Local: Barra da Tijuca (Rio de Janeiro RJ) </p>
                              <p><strong>Vice - Campe&atilde;o Brasileiro de 2004 </strong><br>
                                <span class="style12">Resultado Final</span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Carioca 2004 </strong></p>
                              <p>1&ordf; Etapa <br>
                                Amador 13&ordm; Colocado<br>
                                Local: Praia dos Cavalheiros (Maca&eacute; RJ) </p>
                              <p>3&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Itacoatiara (Niter&oacute;i RJ) </p>
                              <p>4&ordf; Etapa <br>
                                Amador 2&ordm; Colocado<br>
                                Local: Copacabana (Rio de Janeiro RJ) </p>
                              <p>5&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Ipanema(Rio de Janeiro RJ) </p>
                              <p>6&ordf; Etapa<br>
                                Amador 4&ordm; Colocado<br>
                                Local: Rio das Ostras(Rio das Ostras RJ) </p>
                              <p>8&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Copacabana (Rio de Janeiro RJ) </p>
                              <p>9&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Ipanema(Rio de Janeiro RJ)</p>
                              <p>10&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Itacoatiara (Niter&oacute;i RJ) </p>
                              <p><strong>Campe&atilde;o do Circuito Carioca de 2004 </strong><br>
                                <span class="style12">Resultado Final </span><br>
                              </p>
                              <p>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>Circuito Capixaba 2004 </strong></p>
                              <p>1&ordf; Etapa <br>
                                Amador 7&ordm; Colocado<br>
                                Local: Barra Sol (Vila Velha ES) </p>
                              <p>2&ordf; Etapa<br>
                                Amador 9 &ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES) </p>
                              <p>4&ordf; Etapa<br>
                                Amador 3 &ordm; Colocado<br>
                                Local: Barra Sol (Vila Velha ES) </p>
                              <p>4&ordf; Etapa<br>
                                Amador 2&ordm; Colocado<br>
                                Local: Barra Sol (Vila Velha ES)</p>
                              <p>5&ordf; Etapa<br>
                                Amador 1 &ordm; Colocado<br>
                                Local: Barra Sol (Vila Velha ES) </p>
                              <p><strong>Vice - Campe&atilde;o Capixaba Amador </strong><br>
                                <span class="style12">Resultado Final</span></p>
                              <p>&nbsp;</p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Capixaba 2004 OPEN </strong></p>
                              <p>1&ordf; Etapa <br>
                                Open 7&ordm; Colocado<br>
                                Local: Barra Sol (Vila Velha ES) </p>
                              <p> 2&ordf; Etapa<br>
                                Open 1&ordm; Colocado<br>
                                Local: Pomp&eacute;ia (Vila Velha ES) </p>
                              <p>3&ordf; Etapa<br>
                                Open 3&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES) </p>
                              <p>4&ordf; Etapa<br>
                                Open 2&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)</p>
                              <p>5&ordf; Etapa<br>
                                Open 4 &ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)</p>
                              <p>6&ordf; Etapa<br>
                                Open 3 &ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)</p>
                              <p><strong>Campe&atilde;o do Circuito Capixaba<br>
                              Open</strong><br>
                                <span class="style12">Resultado Final </span></p>
                              <p> <br>
                                <span class="style11">Ano de 2005</span></p>
                              <p><strong>Circuito Mundial Profissional 2005</strong></p>
                              <p>1&ordf; Etapa<br>
                                Profissional 5&ordm; Colocado<br>
                                Local: Manta (Equador) </p>
                              <p>3&ordf; Etapa<br>
                                Profissonal 5 &ordm; Colocado<br>
                                Local: Costa Azul (Brasil) </p>
                              <p><strong>Atual 15 colocado no Circuito Mundial</strong></p>
                              <p>Resultado Parcial<br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Mundial Amador 2005</strong></p>
                              <p>1&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Manta (Equador) </p>
                              <p>3&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Costa Azul (Brasil) </p>
                              <p><strong>Atual Lider Circuito Mundial </strong></p>
                              <p>Resultado Parcial<br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Latin America Pro 2005</strong></p>
                              <p>1&ordf; Etapa<br>
                                Profissional 5&ordm; Colocado<br>
                                Local: Manta (Equador) </p>
                              <p>3&ordf; Etapa<br>
                                Profissonal 5 &ordm; Colocado<br>
                                Local: Costa Azul (Brasil) </p>
                              <p><strong>Atual 15&deg; colocado no Circuito Latino Americano</strong></p>
                              <p>Resultado Parcial<br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Latin America Amador 2005</strong></p>
                              <p>1&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Manta (Equador) </p>
                              <p>2&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Costa Azul (Brasil) </p>
                              <p><strong>Atual Lider Circuito Latino Americano</strong></p>
                              <p>Resultado Parcial<br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Brasileiro 2005</strong></p>
                              <p>1&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Maracaipe (Ipojuca PE) </p>
                              <p>2&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Costa Azul (Rio das Ostras RJ) </p>
                              <p>4&ordf; Etapa<br>
                                Amador 5&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES) </p>
                              <p>5&ordf; Etapa<br>
Amador 1 &ordm; Colocado<br>
Local: Copacabana (Rio de Janeiro RJ)</p>
                              <p><strong>Vice Campe&atilde;o Brasileiro de 2005</strong><br>
                              </p>
                              <p>--------------------------------------------------------------------------------</p>
                              <p><strong>Circuito Carioca 2005</strong></p>
                              <p>2&ordf; Etapa<br>
                                Amador 1&ordm; Colocado<br>
                                Local: Ipanema (Rio de Janeiro RJ) </p>
                              <p>3&ordf; Etapa <br>
                                Amador 2 &ordm; Colocado<br>
                                Local: Itacoatiara (Niter&oacute;i RJ) </p>
                              <p>4&ordf; Etapa<br>
                                Amador 1 &ordm; Colocado<br>
                                Local: Costa Azul (Rio das Ostras RJ) </p>
                              <p>5&ordf; Etapa<br>
                                Amador 9&ordm; Colocado<br>
                                Local: Copacabana (Rio de Janeiro RJ) </p>
                              <p>6&ordf; Etapa<br>
Amador 9 &ordm; Colocado<br>
Local: Itacoatiara (Niteroi RJ)</p>
                              <p><strong></strong>7&ordf; Etapa<br>
Amador 9 &ordm; Colocado<br>
Local: Costa Azul (Rio das Ostras RJ)</p>
                              <p>8&ordf; Etapa<br>
Amador 1 &ordm; Colocado<br>
Local: Copacabana (Rio de Janeiro RJ)</p>
                              <p><strong>Vice Campe&atilde;o  Carioca de 2005</strong><br>
                              </p>
                              <p>--------------------------------------------------------------------------------<br>
                              </p>
                              <p><strong>Circuito Capixaba 2005</strong></p>
                              <p>1&ordf; Etapa <br>
                                Amador 1&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)</p>
                              <p>2&ordf; Etapa <br>
                                Amador 5&ordm; Colocado<br>
                                Local: Jacaraipe (Serra ES) </p>
                              <p>3&ordf; Etapa <br>
                                Amador 5&ordm; Colocado<br>
                                Local: Barra do Jucu (Vila Velha ES)</p>
                              <p>4&ordf; Etapa <br>
Amador 3 &ordm; Colocado<br>
Local: Barra do Jucu (Vila Velha ES)</p>
                              <p>5&ordf; Etapa <br>
Amador 1 &ordm; Colocado<br>
Local: Barra do Jucu (Vila Velha ES)</p>
                              <p><strong>Atual Vice Lider do Circuito Capixaba Amador </strong><br>
                                Resultado Parcial<br>
                              </p>
                              <p>&nbsp;</p>
                            <p></p></td>
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
		<td height="28" align="right" background="images/nenu/menu_r1_c16.jpg" bgcolor="#FFCC00" ><div align="center"><font style="color:#000000">Erisberto.Com &copy; 2005 . Todos os Direitos Reservados . Desenvolvido Por <a href="http://www.wardesign.com.br" target="_blank"><strong>Wardesign.com.br</strong></a> </font></div></td>
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
