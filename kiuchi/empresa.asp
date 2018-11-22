<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252"%>
<!--#include file="Connections/conex2.asp" -->
<%
Dim House
Dim House_numRows
Dim C
Set House = Server.CreateObject("ADODB.Recordset")
House.ActiveConnection = MM_conex2_STRING
Randomize
C=clng(1E6*rnd) 
House.Source = "SELECT *  FROM casa  ORDER BY rnd(-(1000*Codnoticia)* " & C & ")"
House.CursorType = 0
House.CursorLocation = 2
House.LockType = 1
House.Open()

House_numRows = 0
%>
<%
Dim Rs_apt
Dim Rs_apt_numRows
Dim A
Set Rs_apt = Server.CreateObject("ADODB.Recordset")
Rs_apt.ActiveConnection = MM_conex2_STRING
Randomize
A=clng(1E6*rnd)
Rs_apt.Source = "SELECT * FROM apt ORDER BY rnd(-(1000*Codnoticia)* " & A & ")"
Rs_apt.CursorType = 0
Rs_apt.CursorLocation = 2
Rs_apt.LockType = 1
Rs_apt.Open()

Rs_apt_numRows = 0
%>
<%
Dim Rs_loja
Dim Rs_loja_numRows
Dim L
Set Rs_loja = Server.CreateObject("ADODB.Recordset")
Rs_loja.ActiveConnection = MM_conex2_STRING
Randomize
L=clng(1E6*rnd)
Rs_loja.Source = "SELECT * FROM loja ORDER BY rnd(-(1000*Codnoticia)* " & L & ")"
Rs_loja.CursorType = 0
Rs_loja.CursorLocation = 2
Rs_loja.LockType = 1
Rs_loja.Open()

Rs_loja_numRows = 0
%>
<%
Dim Rs_terreno
Dim Rs_terreno_numRows
Dim T
Set Rs_terreno = Server.CreateObject("ADODB.Recordset")
Rs_terreno.ActiveConnection = MM_conex2_STRING
Randomize
T=clng(1E6*rnd) 
Rs_terreno.Source = "SELECT * FROM terreno ORDER BY rnd(-(1000*Codnoticia)* " & T & ")"
Rs_terreno.CursorType = 0
Rs_terreno.CursorLocation = 2
Rs_terreno.LockType = 1
Rs_terreno.Open()

Rs_terreno_numRows = 0
%>
<%
Dim Rs_sitio
Dim Rs_sitio_numRows

Set Rs_sitio = Server.CreateObject("ADODB.Recordset")
Rs_sitio.ActiveConnection = MM_conex2_STRING
Rs_sitio.Source = "SELECT * FROM sitio"
Rs_sitio.CursorType = 0
Rs_sitio.CursorLocation = 2
Rs_sitio.LockType = 1
Rs_sitio.Open()

Rs_sitio_numRows = 0
%>
<%
Dim imovel
Dim imovel_numRows

Set imovel = Server.CreateObject("ADODB.Recordset")
imovel.ActiveConnection = MM_conex2_STRING
imovel.Source = "SELECT * FROM apt ORDER BY codnoticia DESC"
imovel.CursorType = 0
imovel.CursorLocation = 2
imovel.LockType = 1
imovel.Open()

imovel_numRows = 0
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<script>

// KIUCHI IMOBILIARIA SUA MELHOR OPÇÃO!!!

// ==============================
// Set the following variables...
// ==============================

// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 4000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 3;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

// ESPECIFIQUE SUAS IMAGENS NOS NOMES ABAIXO
// Specify the image files...
// To add more images, just continue
// the pattern, adding to the array below.
// To use fewer images, remove lines
// starting at the end of the Picture array.
// Caution: The number of Pictures *must*
// equal the number of Captions!

Picture[1]  = 'fotos/slide/slide01.jpg';
Picture[2]  = 'fotos/slide/slide02.jpg';
Picture[3]  = 'fotos/slide/slide03.jpg';

var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}

</script>
<head>
<title>:: kiuchi Imobili&aacute;ria ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.brd_menu {	border: 1px solid #e5e5e5;
}.brd_foto {	border: 1px solid #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(imagens/fundo.gif);
}
.linha_tracejada {
	font-size: 9px;
	color: #CCCCCC;
}
.fonte {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #666666;
}
.style2 {color: #FFFFFF}
.style15 {color: #CC0000; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style17 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #FFFFFF; }
.style21 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; color: #FFFFFF; }
.brdnoticia {border: 1px solid #000000;}
.style23 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #9933CC; }
.style25 {color: #330099; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style26 {color: #000000}
.style27 {color: #CC0000}
-->
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="716" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="736" scope="col"><table width="716" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="916" height="901" align="center" valign="top" scope="col"><table width="716" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <th height="60" colspan="2" scope="col"><img src="imagens/topo.jpg" width="716" height="161" border="0"></th>
            </tr>
            <tr>
              <th height="694" colspan="2" align="center" valign="top" scope="col"><table width="716" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="190" height="499" align="center" valign="top" scope="col"><table width="185" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                        <tr>
                          <th width="26" height="19" align="right" scope="col"><img src="imagens/quadrado.gif" width="19" height="17"></th>
                          <th width="159" align="left" scope="col"><div align="left"><span class="style21"><a href="default.asp" class="fonte">Principal</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <th height="19" align="right" scope="col"><img src="imagens/quadrado.gif" width="19" height="17"></th>
                          <th align="left" scope="col"><div align="left"><span class="style19"><a href="casas.asp" class="fonte">Casas</a></span></div></th>
                        </tr>
                        <tr align="center" valign="top">
                          <td colspan="2" class="linha_tracejada">----------------------------------------------------------</td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="apartamentos.asp" class="fonte">Apartamentos</a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="lojas.asp" class="fonte">Lojas</a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><a href="sitios_fazendas.asp" class="fonte">S&iacute;tios e Fazendas</a> </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="terrenos.asp" class="fonte">Terrenos</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="sala.asp" class="fonte">Salas</a></div></td>
                        </tr>
                        <tr>
                          <td height="12" colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="cidade.asp" class="fonte">Sobre a Cidade</a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="pontos_turisticos.asp" class="fonte">Pontos Tur&iacute;sticos </a></div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"> <a href="empresa.asp" class="fonte">A Empresa</a> </div></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"><div align="center"><span class="linha_tracejada">----------------------------------------------------------</span></div></td>
                        </tr>
                        <tr>
                          <td align="right"><img src="imagens/quadrado.gif" width="19" height="17"></td>
                          <td align="left" class="fonte"><div align="left"><a href="contato.asp" class="fonte">Fale Conosco</a></div></td>
                        </tr>
                      </table>
                        <br>
                        <table width="185" height="120" border="0" cellpadding="0" cellspacing="0" class="brd_menu">
                          <tr>
                            <th height="118" bgcolor="efefef" scope="col"><table width="180" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th scope="col">Mais Ofertas!</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style15">Casas</span></th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/casa/<%=(House.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" class="style17" scope="col"><%=(House.Fields.Item("resumo").Value)%><br>
                                  <span class="style15"><a href="javascript:MM_openBrWindow('ver_casa.asp?CodNot=<%=(House.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Apartamentos</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/apt/<%=(Rs_apt.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_apt.Fields.Item("resumo").Value)%><br>
</span><span class="style15"><a href="javascript:MM_openBrWindow('ver_apt.asp?CodNot=<%=(Rs_apt.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a> </span></th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Lojas</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/loja/<%=(Rs_loja.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_loja.Fields.Item("resumo").Value)%> <br>
                                  </span><span class="style23"><a href="javascript:MM_openBrWindow('ver_loja.asp?CodNot=<%=(Rs_loja.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a></span> </th>
                                </tr>
                                <tr>
                                  <th scope="col">------------------------------------</th>
                                </tr>
                                <tr>
                                  <th class="style15" scope="col">Terrenos</th>
                                </tr>
                                <tr>
                                  <th scope="col"><span class="style2"><img src="fotos/terreno/<%=(Rs_terreno.Fields.Item("foto").Value)%>" width="100" height="75" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></th>
                                </tr>
                                <tr>
                                  <th height="35" scope="col"><span class="style17"><%=(Rs_terreno.Fields.Item("resumo").Value)%><br>
                                  </span><span class="style25"><a href="javascript:MM_openBrWindow('ver_terreno.asp?CodNot=<%=(Rs_terreno.Fields.Item("CodNoticia").Value)%>','kiuchiimobiliaria','scrollbars=1','518','500','true')" class="style15">mais detalhes</a></span> </th>
                                </tr>
                            </table></th>
                          </tr>
                      </table></th>
                    <th width="526" align="center" valign="top" scope="col"><table width="518" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                        <tr>
                          <th width="537" height="103" valign="top" bgcolor="#FFFFFF" scope="col"><img src="imagens/empresa.jpg" width="518" height="100"></th>
                        </tr>
                      </table>
                        <table width="518" height="20" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                          <tr>
                            <th width="539" align="center" valign="middle" bgcolor="#17859e" scope="col"><table width="496" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th width="496" class="fonte style2" scope="col"><div align="left">Saiba um pouco mais sobre n&oacute;s!</div></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                        <table width="491" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th height="249" align="center" valign="top" bgcolor="#FFFFFF" scope="col"><p>&nbsp; </p>
                              <p align="justify" class="fonte"><span class="style15"><strong>Kiuchi Imobili&aacute;ria</strong></span><strong> </strong> foi fundada por <strong>Janio Kiuchi </strong>em novembro de 1992, estabelecida &agrave; <strong>Rua Jo&atilde;o Carmo, 50 - T&eacute;rreo - Centro - Rio Bonito - RJ </strong>.</p>
                              <p align="justify" class="fonte">Foi criada com a finalidade de prestar servi&ccedil;os de assessoria na compra, venda e administra&ccedil;&atilde;o de im&oacute;veis. </p>                              <p align="justify" class="fonte">O Resultado de anos de dedica&ccedil;&atilde;o aos nossos clientes, pode ser visto nas ruas, a marca <strong>Kiuchi imobili&aacute;ria </strong>, est&aacute; presente na maioria dos im&oacute;veis da cidade, e certamente os mais importantes. </p>
                              <p align="justify" class="fonte">Colocamos a sua disposi&ccedil;&atilde;o os nossos servi&ccedil;os, esclarecendo que a pol&iacute;tica da nossa empresa &eacute; propiciar sempre o melhor atendimento ao cliente. </p>
                              <p align="justify">&nbsp; </p>
                              <p align="justify" class="fonte style27"> Servi&ccedil;os Oferecidos </p>
                              <p align="justify">&nbsp; </p>
                              <div align="justify">
                                <ul>
                                  <li class="fonte">Administra&ccedil;&atilde;o de Im&oacute;veis </li>
                                    <li class="fonte">Aluguel </li>
                                    <li class="fonte">Compra &amp; Venda </li>
                                    <li class="fonte">Departamento Jur&iacute;dico </li>
                                    <li class="fonte">Legaliza&ccedil;&atilde;o </li>
                                    <li class="fonte">Cobran&ccedil;a </li>
                                    <li class="fonte">Avalia&ccedil;&atilde;o </li>
                                </ul>
                              </div>                              <ul>
                              </ul>
                              <div align="left"></div></th>
                          </tr>
                        </table>
                        <div align="justify"><br>
                      </div></th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th height="27" colspan="2" bgcolor="#17859e" class="style2 style17" scope="col">Todos Os Direitos Reservados - kiuchi Imobili&aacute;ria - Tel: (21) 2734-2431<br>
            Rua Jo&atilde;o Carmo - 50 - Centro - Rio Bonito - RJ </th>
            </tr>
            <tr>
              <th width="354" height="30" scope="col">
                <div align="center" class="style17">Desenvolvido por:<a href="http://www.rbprovider.com" target="_blank" class="style26"> RbProvider.com</a></div></th>
              <th width="382" scope="col"><div align="center" class="style17">WebDesigner: Victor Caetano Wardi </div></th>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<%
House.Close()
Set House = Nothing
%>
<%
Rs_apt.Close()
Set Rs_apt = Nothing
%>
<%
Rs_loja.Close()
Set Rs_loja = Nothing
%>
<%
Rs_terreno.Close()
Set Rs_terreno = Nothing
%>
<%
Rs_sitio.Close()
Set Rs_sitio = Nothing
%>
<%
imovel.Close()
Set imovel = Nothing
%>
