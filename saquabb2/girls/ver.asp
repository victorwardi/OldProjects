<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="../Connections/congirls.asp" -->
<%
Dim RsVerNot__MMColParam
RsVerNot__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  RsVerNot__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim RsVerNot
Dim RsVerNot_numRows

Set RsVerNot = Server.CreateObject("ADODB.Recordset")
RsVerNot.ActiveConnection = MM_congirls_STRING
RsVerNot.Source = "SELECT * FROM noticias WHERE CodNoticia = " + Replace(RsVerNot__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
RsVerNot.CursorType = 0
RsVerNot.CursorLocation = 2
RsVerNot.LockType = 1
RsVerNot.Open()

RsVerNot_numRows = 0
%>
<%
Dim Fotos
Dim Fotos_numRows

Set Fotos = Server.CreateObject("ADODB.Recordset")
Fotos.ActiveConnection = MM_congirls_STRING
Fotos.Source = "SELECT * FROM fotos ORDER BY CodNoticia DESC"
Fotos.CursorType = 0
Fotos.CursorLocation = 2
Fotos.LockType = 1
Fotos.Open()

Fotos_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = 5
Repeat1__index = 0
RsVerNot_numRows = RsVerNot_numRows + Repeat1__numRows
%>
<%
Dim Repeat2__numRows
Dim Repeat2__index

Repeat2__numRows = 2
Repeat2__index = 0
bblagos_fotos_numRows = bblagos_fotos_numRows + Repeat2__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/modelo.dwt.asp" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>SAQUABB.com.br _________ By Wardesign.com.br _____________________________________________________________________________</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-image:  url(../imagens/fundo.gif);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.brd {border: 1px solid #000000;
}
.style23 {
	font-size: 10px;
	color: #FF6600;
	font-weight: bold;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 10px;
	font-weight: bold;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style59 {
	font-size: 10px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
}
.style60 {font-weight: bolder; font-family: Geneva, Arial, Helvetica, sans-serif;}
a {
	font-weight: bold;
}
.linha {
	border-bottom-style: solid;
	border-bottom-color: #000000;
	border-bottom-width: 1px;	
	
}
.mao {
	cursor: hand;
}
-->
</style>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style71 {font-size: 11px}
.borda {border: 1px solid #000000;}
.style26 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #ffffff; font-weight: bold; }
.style29 {color: #000000; font-weight: bold; }
.style30 {
	font-size: 12px;
	font-weight: normal;
}
.style31 {font-style: italic; text-transform: capitalize; color: #FF0000; text-decoration: underline; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style74 {font-weight: bold; font-family: Geneva, Arial, Helvetica, sans-serif;}
a:hover {
	color: #FF3366;
}
.style75 {font-size: 12px; font-weight: bold; color: #000000; }
.style77 {color: #000000; font-weight: bold; font-size: 14px; }
.style79 {font-weight: bold; font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="brd">
  <tr>
    <th align="center" valign="top" scope="col"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
      <tr>
        <th align="center" valign="top" scope="col"><table  border="0" cellpadding="0" cellspacing="0">
            <tr align="left" valign="top">
              <th colspan="3" scope="col"><img src="../imagens/topo/modelos/topo_r1_c1.jpg" width="779" height="17"></th>
            </tr>
            <tr>
              <th rowspan="2" scope="col"><img src="../imagens/topo/modelos/topo_r2_c1.jpg" width="10" height="139"></th>
              <td height="43"><img src="../publicidade/saquabb_publicidade.gif" width="468" height="60"></td>
              <td rowspan="2" align="left" valign="top"><img src="../imagens/topo/modelos/topo_r2_c5.jpg" width="301" height="139" border="0" usemap="#Map2"></td>
            </tr>
            <tr>
              <td align="left" valign="top"><img src="../imagens/topo/modelos/topo_r3_c2.jpg" width="468" height="79" border="0" usemap="#Map"></td>
            </tr>
            <tr>
              <td colspan="3"><!-- InstanceBeginEditable name="titulo" -->
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="21%" align="left" scope="col"><img src="../imagens/topo/modelos/topo_r4_c1.jpg" width="170" height="64"></th>
                    <th width="48%" align="center" valign="top" scope="col">&nbsp;</th>
                    <th width="31%" align="right" valign="top" scope="col"><img src="../imagens/topo/modelos/topo_r4_c4.jpg" width="319" height="64"></th>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></td>
            </tr>
        </table></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="80%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="tabela_principal" -->
          <table width="610" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" valign="bottom" scope="col"><img src="topo.jpg" width="610" height="120"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="../imagens/fundo_tabela.jpg"><table width="610" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" valign="top" background="figuras/fundo_news.gif"><table width="95%" height="220" border="0" align="center" cellpadding="0" cellspacing="0" background="figuras/fundo_news.gif">
                    <tr bgcolor="#FFFFFF">
                      <td height="10" align="center" background="figuras/fundo_news.gif" class="tit"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="2" align="center" valign="middle"><span class="style74">&nbsp;::</span><span class="style77"><%=(RsVerNot.Fields.Item("titulo").Value)%></span><span class="style79">::</span></td>
                        </tr>
                        <tr>
                          <td width="50%" height="40"><div align="left" class="style75">Data:<%=(RsVerNot.Fields.Item("data").Value)%></div></td>
                          <td width="50%" height="40"><div align="right"><span class="style30"><span class="style29">Autor: </span><span class="style31"><%=(RsVerNot.Fields.Item("autor").Value)%></span></span></div></td>
                        </tr>
                      </table></td>
                    </tr>
                    
                    <tr>
                      <td height="186" align="left" valign="top" ><div align="justify">
                          <% if  (Not Fotos.eof) then %>
                        </div>
                          <table width="146" border="0" align="right" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" align="right" valign="top"><% while (Not Fotos.eof) %>
                                  <img src="images/spacer.gif" width="1" height="4" >
                                  <table width="130" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF6699" bgcolor="#FF6699">
                                    <tr>
                                      <td width="192" height="58" valign="top"><div align="center"><a href="javascript:openPictureWindow_Fever('fotos/<%=(Fotos.Fields.Item("arquivo").Value)%>','<%=(Fotos.Fields.Item("largura").Value)%>','<%=(Fotos.Fields.Item("altura").Value)%>','Foto - NEWS','10','10')"><img src="fotos/foto_<%=(Fotos.Fields.Item("arquivo").Value)%>" width="120" height="90" border="0" align="absmiddle" class="borda"></a><span class="style1"><br>
                                          </span><span class="style26"><%=(Fotos.Fields.Item("descricao").Value)%><br>
                                          <% If (Fotos.Fields.Item("fotografo").Value) <> "" then response.Write("  Foto: ") End If%>
                                          <%=(Fotos.Fields.Item("fotografo").Value)%></span> </div></td>
                                    </tr>
                                  </table>
                                <div align="right"></div>
                                <div align="right">
                                    <% Fotos.MoveNext() 
Wend %>
                                </div></td>
                            </tr>
                          </table>
                          <p class="style30">
                            <% end if  %>
                            <% response.write replace((RsVerNot.Fields.Item("materia").Value), vbcrlf,"<br>")%></p>
                          </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table width="48%" height="15"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <th colspan="2" scope="col"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="linha">
                        <tr>
                          <th scope="col">&nbsp;</th>
                        </tr>
                      </table></th>
                      </tr>
                    <tr>
                      <th scope="col"><a href="default.asp" class="style71">P&aacute;gina Principal </a></th>
                      <th height="20" scope="col"><a href="arquivo.asp" class="style71">Arquivo de Not&iacute;cias</a></th>
                    </tr>
                  </table></td>
                </tr>
              </table>              
              <p>&nbsp;</p>                </td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="../imagens/base_tabela.jpg" width="610" height="7"></td>
            </tr>
          </table>
          <br>
        <!-- InstanceEndEditable --></th>
        <th width="20%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="publicidade" -->
          <table width="150"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img src="imagens/topo_apoio.jpg" width="150" height="31"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="../retalhos/meio_publi.jpg"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="33" align="center" valign="middle"><br>                      <img src="imagens/apoiadores/saquabb.jpg" width="140" height="80"></td>
                  </tr>
                  <tr>
                    <th height="33" align="center" valign="middle" scope="col"><img src="imagens/apoiadores/abc.jpg" width="108" height="65"></th>
                  </tr>
                  <tr>
                    <td height="33" align="center" valign="middle"><img src="imagens/apoiadores/ok.jpg" width="110" height="81"></td>
                  </tr>
                  <tr>
                    <td height="33" align="center" valign="middle"><img src="imagens/apoiadores/dl.jpg" width="140" height="46"></td>
                  </tr>
                  <tr>
                    <td height="72" align="center" valign="middle"><img src="imagens/apoiadores/bac.jpg" width="140" height="59"></td>
                  </tr>
                  <tr>
                    <td height="156" align="center" valign="top">&nbsp;</td>
                  </tr>
                </table>
                  <p>&nbsp;</p></td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="../retalhos/base_publi.jpg" width="150" height="12"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="10" align="center" valign="top" background="../retalhos/fundo_base.jpg" scope="col"><img src="../retalhos/fundo_base.jpg" width="1" height="10"></th>
          </tr>
          <tr>
            <td height="25" align="center" valign="middle" background="../retalhos/meio_fundo.jpg" bgcolor="#D65501"><span class="style59"><a href="../home.asp">Home</a> -<a href="../arquivo.asp"> Not&iacute;cias</a> - <a href="../galerias.asp">Galerias</a> -<a href="../atletas.asp"> Atletas</a> - <a href="../festa.asp">Festas</a> - <a href="../contato.asp" class="style60">Contato</a></span> </td>
          </tr>
          <tr>
            <td background="../retalhos/fundo_base_invert.jpg"><img src="../retalhos/fundo_base_invert.jpg" width="1" height="10"></td>
          </tr>
        </table></th>
      </tr>
      <tr valign="middle" bgcolor="#FFE6CC">
        <th height="25" colspan="2" align="center" scope="col"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="style23" scope="col"> Saquabb.com.br &copy; 2005 . Todos os Direitos Reservados . Desenvolvido Por <a href="http://www.wardesign.com.br">Wardesign.com.br </a> </th>
          </tr>
        </table></th>
        </tr>
    </table></td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="62,60,105,79" href="../home.asp">
  <area shape="rect" coords="120,42,186,61" href="../arquivo.asp">
  <area shape="rect" coords="201,31,268,46" href="../galerias.asp">
  <area shape="rect" coords="283,26,341,47" href="../atletas.asp">
  <area shape="rect" coords="357,28,412,58" href="../festa.asp">
  <area shape="rect" coords="424,46,482,76" href="../contato.asp">
  <area shape="rect" coords="466,59,479,75" href="#">
  <area shape="rect" coords="25,67,44,86" href="../contato.asp">
  <area shape="rect" coords="2,69,15,83" href="../home.asp">
</map>
<map name="Map2">
  <area shape="rect" coords="-3,120,15,135" href="../contato.asp">
</map>
</body>
<!-- InstanceEnd --></html>
<%
RsVerNot.Close()
Set RsVerNot = Nothing
%>
<%
Fotos.Close()
Set Fotos = Nothing
%>
