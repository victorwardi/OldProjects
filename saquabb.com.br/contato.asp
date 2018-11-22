<%
Dim Mail
	If Request("Send") <> "" Then
		Set Mail = Server.CreateObject("Persits.MailSender")
		Mail.Host = "smtp.prosa.com.br"

		Mail.From = "victor@saquabb.com.br"
		Mail.FromName = "Saquabb"
		Mail.AddAddress "victor@saquabb.com.br"
		Mail.AddBcc "saquabb@hotmail.com"
		Mail.Subject = "Contato Saquabb"
		Mail.Body = "Nome " & Request.Form("nome") & chr(13) & chr(10) & "E-mail: " & Request.Form("email") & chr(13) & chr(10) & "Telefone: " & Request.Form("tel") & chr(13) & chr(10) & "Comentarios: " & Request.Form("comentarios") & chr(13) & chr(10) & "IP: " & Request.ServerVariables("REMOTE_ADDR")

		strErr = ""
		bSuccess = False
		On Error Resume Next ' catch errors
		Mail.Send	' send message
		If Err <> 0 Then ' error occurred
			strErr = Err.Description
		else
			bSuccess = True
		End If
	End If
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
	background-image:  url(imagens/fundo.gif);
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
.style61 {	font-size: 14px;
	font-weight: bold;
	color: #FF9900;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style24 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000; font-weight: bold; }
.style6 {color: #666666}
.style7 {color: #000000}
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
              <th colspan="3" scope="col"><img src="imagens/topo/modelos/topo_r1_c1.jpg" width="779" height="17"></th>
            </tr>
            <tr>
              <th rowspan="2" scope="col"><img src="imagens/topo/modelos/topo_r2_c1.jpg" width="10" height="139"></th>
              <td height="43"><img src="publicidade/saquabb_publicidade.gif" width="468" height="60"></td>
              <td rowspan="2" align="left" valign="top"><img src="imagens/topo/modelos/topo_r2_c5.jpg" width="301" height="139" border="0" usemap="#Map2"></td>
            </tr>
            <tr>
              <td align="left" valign="top"><img src="imagens/topo/modelos/topo_r3_c2.jpg" width="468" height="79" border="0" usemap="#Map"></td>
            </tr>
            <tr>
              <td colspan="3"><!-- InstanceBeginEditable name="titulo" -->
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="21%" align="left" scope="col"><img src="imagens/topo/modelos/topo_r4_c1.jpg" width="170" height="64"></th>
                    <th width="48%" align="center" valign="top" scope="col"><img src="imagens/topo/topos/contato.jpg" width="288" height="61"></th>
                    <th width="31%" align="right" valign="top" scope="col"><img src="imagens/topo/modelos/topo_r4_c4.jpg" width="319" height="64"></th>
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
              <th align="center" valign="bottom" scope="col"><img src="imagens/topo_tabela.jpg" width="610" height="7"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="imagens/fundo_tabela.jpg"><div align="left"></div>
                <div align="left"></div>
                <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <td><table width="372" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                          <th width="372" height="157" align="center" valign="middle" scope="col"><br>
                              <div align="center" class="style6">
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center" class="titpropaganda">
                                      <div align="center">
                                        <% If strErr <> "" Then %>
                                        <FONT COLOR="#FF0000">Erro ocorrido : <I>
                                        <% = strErr %>
                                        </I></FONT><br>
                                        <% End If %>
                                        <% If bSuccess Then %>
                                        <span class="style61">Mensagem enviada com sucesso.<br>
                      Obrigado.</span></div></td>
                                    <% End If %>
                                  </tr>
                                  <tr>
                                    <td align="center" class="style24"> Respons&aacute;vel: Victor Caetano Wardi Cel: (22) 9267-9505 <br>
                    MSN: victorsaquabb@hotmail.com <br>
                    Deixe seu recado! </td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle"><form action="contato.asp" method="POST">
                                        <table width="307" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#990000">
                                          <tr>
                                            <td width="342"><table width="307" border="0" align="left" cellpadding="3" cellspacing="0" class="tdnot">
                                                <tr>
                                                  <td height="10" colspan="2"></td>
                                                </tr>
                                                <tr bgcolor="#FFFF99">
                                                  <td width="80" align="right" bgcolor="#FFFFFF"> <span class="style7">Nome:</span><br>                                                  </td>
                                                  <td width="250" bgcolor="#FFFFFF"><input name="nome" type="text" id="nome" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                                                </tr>
                                                <tr>
                                                  <td align="right"><span class="style7">E-mail:</span></td>
                                                  <td><input name="email" type="text" id="email2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                                                </tr>
                                                <tr>
                                                  <td align="right"><span class="style7">Telefone:</span></td>
                                                  <td><input name="tel" type="text" id="evento2" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" size="30"></td>
                                                </tr>
                                                <tr>
                                                  <td align="right"><span class="style7">Mensagem:</span></td>
                                                  <td><textarea name="comentarios" rows="4" cols="28" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8"></textarea>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td><input name="Send" type="submit" class="caixa" id="send3" style="color: #000000; font-family: Verdana; font-size: 8 pt; border: 1px solid #000000; background-color: #F8F8F8" value="Enviar"></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                        </table>
                                        <div align="left"></div>
                                        <div align="left"></div>
                                        <div align="left"></div>
                                    </form></td>
                                  </tr>
                                </table>
                            </div></th>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                <div align="center"></div>                <p>&nbsp;</p>                </td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="imagens/base_tabela.jpg" width="610" height="7"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
        <th width="20%" align="center" valign="top" scope="col"><!-- InstanceBeginEditable name="publicidade" -->
          <table width="150"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img src="retalhos/topo_publi.jpg" width="150" height="31"></th>
            </tr>
            <tr>
              <td align="center" valign="top" background="retalhos/meio_publi.jpg"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="33" align="center" valign="middle"><a href="http://www.360invert.com.br" target="_blank"><img src="publicidade/360.gif" width="146" height="30" border="0"></a></td>
                  </tr>
                  <tr>
                    <th height="33" align="center" valign="middle" scope="col"><a href="http://www.prosa.com.br" target="_blank"><img src="publicidade/prosa.jpg" width="144" height="30" border="0" class="brd"></a></th>
                  </tr>
                  <tr>
                    <td height="33" align="center" valign="middle"><a href="http://www.erisberto.com" target="_blank"><img src="publicidade/beto.jpg" width="146" height="30" border="0"></a></td>
                  </tr>
                  <tr>
                    <td height="33" align="center" valign="middle"><a href="http://www.saquaonline.com.br" target="_blank"><img src="publicidade/saquaonline.jpg" alt="SaquaOnline" width="146" height="30" border="0"></a></td>
                  </tr>
                  <tr>
                    <td height="33" align="center" valign="middle"><a href="http://www.wardesign.com.br" target="_blank"><img src="publicidade/war.jpg" width="146" height="30" border="0"></a></td>
                  </tr>
                  <tr>
                    <td height="156" align="center" valign="top"><a href="http://www.biarmsdigital.com" target="_blank"><img src="publicidade/Biarms.gif" width="142" height="142" border="0"></a></td>
                  </tr>
                </table>
                  <p>&nbsp;</p></td>
            </tr>
            <tr>
              <td align="center" valign="top"><img src="retalhos/base_publi.jpg" width="150" height="12"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" scope="col"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th height="10" align="center" valign="top" background="retalhos/fundo_base.jpg" scope="col"><img src="retalhos/fundo_base.jpg" width="1" height="10"></th>
          </tr>
          <tr>
            <td height="25" align="center" valign="middle" background="retalhos/meio_fundo.jpg" bgcolor="#D65501"><span class="style59"><a href="home.asp">Home</a> -<a href="arquivo.asp"> Not&iacute;cias</a> - <a href="galerias.asp">Galerias</a> -<a href="atletas.asp"> Atletas</a> - <a href="festa.asp">Festas</a> - <a href="contato.asp" class="style60">Contato</a></span> </td>
          </tr>
          <tr>
            <td background="retalhos/fundo_base_invert.jpg"><img src="retalhos/fundo_base_invert.jpg" width="1" height="10"></td>
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
  <area shape="rect" coords="62,60,105,79" href="home.asp">
  <area shape="rect" coords="120,42,186,61" href="arquivo.asp">
  <area shape="rect" coords="201,31,268,46" href="galerias.asp">
  <area shape="rect" coords="283,26,341,47" href="atletas.asp">
  <area shape="rect" coords="357,28,412,58" href="festa.asp">
  <area shape="rect" coords="424,46,482,76" href="contato.asp">
  <area shape="rect" coords="466,59,479,75" href="#">
  <area shape="rect" coords="25,67,44,86" href="contato.asp">
  <area shape="rect" coords="2,69,15,83" href="home.asp">
</map>
<map name="Map2">
  <area shape="rect" coords="-3,120,15,135" href="contato.asp">
</map>
</body>
<!-- InstanceEnd --></html>
