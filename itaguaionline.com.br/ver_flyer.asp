<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/conex.asp" -->
<%
Dim Rs_foto_flyer__MMColParam
Rs_foto_flyer__MMColParam = "1"
If (Request.QueryString("CodNot") <> "") Then 
  Rs_foto_flyer__MMColParam = Request.QueryString("CodNot")
End If
%>
<%
Dim Rs_foto_flyer
Dim Rs_foto_flyer_numRows

Set Rs_foto_flyer = Server.CreateObject("ADODB.Recordset")
Rs_foto_flyer.ActiveConnection = MM_conex_STRING
Rs_foto_flyer.Source = "SELECT * FROM projetos WHERE CodNoticia = " + Replace(Rs_foto_flyer__MMColParam, "'", "''") + " ORDER BY CodNoticia DESC"
Rs_foto_flyer.CursorType = 0
Rs_foto_flyer.CursorLocation = 2
Rs_foto_flyer.LockType = 1
Rs_foto_flyer.Open()

Rs_foto_flyer_numRows = 0
%>
<%
Dim Repeat1__numRows
Dim Repeat1__index

Repeat1__numRows = -1
Repeat1__index = 0
Fotos_numRows = Fotos_numRows + Repeat1__numRows
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>VAI ROLAR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript"> <br>

<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #000000;
}
.brdnoticia {border: 1px solid #000000;}
.style11 {
	color: #333333;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style12 {
	color: #CC0000;
	font-weight: bold;
}
.style17 {color: #FFFFFF; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<script language="JavaScript" src="banco_de_dados/java.js"></script>
<body>
<table width="450" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table border="0" cellpadding="0" cellspacing="0" width="500">
      <!-- fwtable fwsrc="Untitled" fwbase="rolar.jpg" fwstyle="Dreamweaver" fwdocid = "2118343187" fwnested="0" -->
      <tr>
        <td><img src="images/vai_rolar/spacer.gif" width="4" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="22" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="51" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="14" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="26" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="22" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="5" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="40" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="18" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="23" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="7" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="18" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="27" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="14" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="9" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="7" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="29" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="13" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="11" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="10" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="5" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="6" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="14" height="1" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="1" border="0" alt=""></td>
      </tr>
      <tr>
        <td colspan="2"><img name="rolar_r1_c1" src="images/vai_rolar/rolar_r1_c1.jpg" width="15" height="12" border="0" alt=""></td>
        <td><img name="rolar_r1_c3" src="images/vai_rolar/rolar_r1_c3.jpg" width="1" height="12" border="0" alt=""></td>
        <td rowspan="8" colspan="2"><img name="rolar_r1_c4" src="images/vai_rolar/rolar_r1_c4.jpg" width="73" height="66" border="0" alt=""></td>
        <td rowspan="12"><img name="rolar_r1_c6" src="images/vai_rolar/rolar_r1_c6.jpg" width="10" height="100" border="0" alt=""></td>
        <td rowspan="2" colspan="3"><img name="rolar_r1_c7" src="images/vai_rolar/rolar_r1_c7.jpg" width="62" height="23" border="0" alt=""></td>
        <td rowspan="2" colspan="6"><img name="rolar_r1_c10" src="images/vai_rolar/rolar_r1_c10.jpg" width="108" height="23" border="0" alt=""></td>
        <td rowspan="2" colspan="4"><img name="rolar_r1_c16" src="images/vai_rolar/rolar_r1_c16.jpg" width="33" height="23" border="0" alt=""></td>
        <td rowspan="5" colspan="3"><img name="rolar_r1_c20" src="images/vai_rolar/rolar_r1_c20.jpg" width="59" height="46" border="0" alt=""></td>
        <td rowspan="6"><img name="rolar_r1_c23" src="images/vai_rolar/rolar_r1_c23.jpg" width="9" height="56" border="0" alt=""></td>
        <td rowspan="6"><img name="rolar_r1_c24" src="images/vai_rolar/rolar_r1_c24.jpg" width="10" height="56" border="0" alt=""></td>
        <td rowspan="4" colspan="2"><img name="rolar_r1_c25" src="images/vai_rolar/rolar_r1_c25.jpg" width="16" height="40" border="0" alt=""></td>
        <td rowspan="2"><img name="rolar_r1_c27" src="images/vai_rolar/rolar_r1_c27.jpg" width="29" height="23" border="0" alt=""></td>
        <td><img name="rolar_r1_c28" src="images/vai_rolar/rolar_r1_c28.jpg" width="10" height="12" border="0" alt=""></td>
        <td rowspan="4" colspan="4"><img name="rolar_r1_c29" src="images/vai_rolar/rolar_r1_c29.jpg" width="40" height="40" border="0" alt=""></td>
        <td rowspan="6" colspan="3"><img name="rolar_r1_c33" src="images/vai_rolar/rolar_r1_c33.jpg" width="25" height="56" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="12" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="3"><img name="rolar_r2_c1" src="images/vai_rolar/rolar_r2_c1.jpg" width="4" height="28" border="0" alt=""></td>
        <td rowspan="3" colspan="2"><img name="rolar_r2_c2" src="images/vai_rolar/rolar_r2_c2.jpg" width="12" height="28" border="0" alt=""></td>
        <td><img name="rolar_r2_c28" src="images/vai_rolar/rolar_r2_c28.jpg" width="10" height="11" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="11" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="10"><img name="rolar_r3_c7" src="images/vai_rolar/rolar_r3_c7.jpg" width="14" height="77" border="0" alt=""></td>
        <td rowspan="8" colspan="5"><img name="rolar_r3_c8" src="images/vai_rolar/rolar_r3_c8.jpg" width="75" height="59" border="0" alt=""></td>
        <td rowspan="3" colspan="3"><img name="rolar_r3_c13" src="images/vai_rolar/rolar_r3_c13.jpg" width="81" height="23" border="0" alt=""></td>
        <td rowspan="2"><img name="rolar_r3_c16" src="images/vai_rolar/rolar_r3_c16.jpg" width="11" height="17" border="0" alt=""></td>
        <td rowspan="3" colspan="3"><img name="rolar_r3_c17" src="images/vai_rolar/rolar_r3_c17.jpg" width="22" height="23" border="0" alt=""></td>
        <td rowspan="8" colspan="2"><img name="rolar_r3_c27" src="images/vai_rolar/rolar_r3_c27.jpg" width="39" height="59" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="8" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="9" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="7" colspan="3"><img name="rolar_r5_c1" src="images/vai_rolar/rolar_r5_c1.jpg" width="16" height="48" border="0" alt=""></td>
        <td><img name="rolar_r5_c16" src="images/vai_rolar/rolar_r5_c16.jpg" width="11" height="6" border="0" alt=""></td>
        <td rowspan="2"><img name="rolar_r5_c25" src="images/vai_rolar/rolar_r5_c25.jpg" width="9" height="16" border="0" alt=""></td>
        <td rowspan="7"><img name="rolar_r5_c26" src="images/vai_rolar/rolar_r5_c26.jpg" width="7" height="48" border="0" alt=""></td>
        <td rowspan="6" colspan="3"><img name="rolar_r5_c29" src="images/vai_rolar/rolar_r5_c29.jpg" width="30" height="42" border="0" alt=""></td>
        <td rowspan="6"><img name="rolar_r5_c32" src="images/vai_rolar/rolar_r5_c32.jpg" width="10" height="42" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="7" colspan="3"><img name="rolar_r6_c13" src="images/vai_rolar/rolar_r6_c13.jpg" width="81" height="54" border="0" alt=""></td>
        <td rowspan="7" colspan="5"><img name="rolar_r6_c16" src="images/vai_rolar/rolar_r6_c16.jpg" width="51" height="54" border="0" alt=""></td>
        <td rowspan="3" colspan="2"><img name="rolar_r6_c21" src="images/vai_rolar/rolar_r6_c21.jpg" width="41" height="20" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="10" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="6" colspan="3"><img name="rolar_r7_c23" src="images/vai_rolar/rolar_r7_c23.jpg" width="28" height="44" border="0" alt=""></td>
        <td rowspan="4" colspan="3"><img name="rolar_r7_c33" src="images/vai_rolar/rolar_r7_c33.jpg" width="25" height="26" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="4" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="3" colspan="2"><img name="rolar_r9_c4" src="images/vai_rolar/rolar_r9_c4.jpg" width="73" height="22" border="0" alt=""></td>
        <td rowspan="4" colspan="2"><img name="rolar_r9_c21" src="images/vai_rolar/rolar_r9_c21.jpg" width="41" height="34" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="7" border="0" alt=""></td>
      </tr>
      <tr>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="9" border="0" alt=""></td>
      </tr>
      <tr>
        <td rowspan="2"><img name="rolar_r11_c8" src="images/vai_rolar/rolar_r11_c8.jpg" width="26" height="18" border="0" alt=""></td>
        <td rowspan="2" colspan="4"><img name="rolar_r11_c9" src="images/vai_rolar/rolar_r11_c9.jpg" width="49" height="18" border="0" alt=""></td>
        <td rowspan="2" colspan="4"><img name="rolar_r11_c27" src="images/vai_rolar/rolar_r11_c27.jpg" width="58" height="18" border="0" alt=""></td>
        <td colspan="4"><img name="rolar_r11_c31" src="images/vai_rolar/rolar_r11_c31.jpg" width="32" height="6" border="0" alt=""></td>
        <td rowspan="2"><img name="rolar_r11_c35" src="images/vai_rolar/rolar_r11_c35.jpg" width="14" height="18" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="6" border="0" alt=""></td>
      </tr>
      <tr>
        <td colspan="5"><img name="rolar_r12_c1" src="images/vai_rolar/rolar_r12_c1.jpg" width="89" height="12" border="0" alt=""></td>
        <td><img name="rolar_r12_c26" src="images/vai_rolar/rolar_r12_c26.jpg" width="7" height="12" border="0" alt=""></td>
        <td colspan="4"><img name="rolar_r12_c31" src="images/vai_rolar/rolar_r12_c31.jpg" width="32" height="12" border="0" alt=""></td>
        <td><img src="images/vai_rolar/spacer.gif" width="1" height="12" border="0" alt=""></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td align="center" valign="middle" background="images/projetos/fundo.jpg">
      <br>
      <table width="397" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="397" align="center" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <td align="center" valign="middle"><span class="style7"><img src="fotos/flyer/original/<%=(Rs_foto_flyer.Fields.Item("foto").Value)%>" border="1" align="middle" class="brdnoticia" bordercolor="#000000"></span></td>
        </tr>
        <tr>
          <td align="center"> <span class="style12"></span></td>
        </tr>
        <tr>
          <td align="center"><span class="style12"><%=(Rs_foto_flyer.Fields.Item("materia").Value)%></span></td>
        </tr>
    </table>      
    <br></td>
  </tr>
</table>
</body>
</html>
<%
Rs_foto_flyer.Close()
Set Rs_foto_flyer = Nothing
%>
