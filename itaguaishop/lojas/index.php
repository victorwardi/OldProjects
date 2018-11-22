<?php require_once('../Connections/ConBD.php'); ?>
<?php
mysql_select_db($database_ConBD, $ConBD);
$query_RSa = "SELECT * FROM lojas WHERE nome LIKE 'a%'";
$RSa = mysql_query($query_RSa, $ConBD) or die(mysql_error());
$row_RSa = mysql_fetch_assoc($RSa);
$totalRows_RSa = mysql_num_rows($RSa);

mysql_select_db($database_ConBD, $ConBD);
$query_RSb = "SELECT * FROM lojas WHERE nome LIKE 'b%'";
$RSb = mysql_query($query_RSb, $ConBD) or die(mysql_error());
$row_RSb = mysql_fetch_assoc($RSb);
$totalRows_RSb = mysql_num_rows($RSb);

mysql_select_db($database_ConBD, $ConBD);
$query_RSc = "SELECT * FROM lojas WHERE nome LIKE 'c%' ORDER BY nome ASC";
$RSc = mysql_query($query_RSc, $ConBD) or die(mysql_error());
$row_RSc = mysql_fetch_assoc($RSc);
$totalRows_RSc = mysql_num_rows($RSc);

mysql_select_db($database_ConBD, $ConBD);
$query_RSd = "SELECT * FROM lojas WHERE nome LIKE 'd%' ORDER BY nome ASC";
$RSd = mysql_query($query_RSd, $ConBD) or die(mysql_error());
$row_RSd = mysql_fetch_assoc($RSd);
$totalRows_RSd = mysql_num_rows($RSd);

mysql_select_db($database_ConBD, $ConBD);
$query_RSe = "SELECT * FROM lojas WHERE nome LIKE 'e%' ORDER BY nome ASC";
$RSe = mysql_query($query_RSe, $ConBD) or die(mysql_error());
$row_RSe = mysql_fetch_assoc($RSe);
$totalRows_RSe = mysql_num_rows($RSe);

mysql_select_db($database_ConBD, $ConBD);
$query_RSf = "SELECT * FROM lojas WHERE nome LIKE 'f%' ORDER BY nome ASC";
$RSf = mysql_query($query_RSf, $ConBD) or die(mysql_error());
$row_RSf = mysql_fetch_assoc($RSf);
$totalRows_RSf = mysql_num_rows($RSf);

mysql_select_db($database_ConBD, $ConBD);
$query_RSg = "SELECT * FROM lojas WHERE nome LIKE 'g%' ORDER BY nome ASC";
$RSg = mysql_query($query_RSg, $ConBD) or die(mysql_error());
$row_RSg = mysql_fetch_assoc($RSg);
$totalRows_RSg = mysql_num_rows($RSg);

mysql_select_db($database_ConBD, $ConBD);
$query_RSh = "SELECT * FROM lojas WHERE nome LIKE 'h%' ORDER BY nome ASC";
$RSh = mysql_query($query_RSh, $ConBD) or die(mysql_error());
$row_RSh = mysql_fetch_assoc($RSh);
$totalRows_RSh = mysql_num_rows($RSh);

mysql_select_db($database_ConBD, $ConBD);
$query_RSi = "SELECT * FROM lojas WHERE nome LIKE 'i%' ORDER BY nome ASC";
$RSi = mysql_query($query_RSi, $ConBD) or die(mysql_error());
$row_RSi = mysql_fetch_assoc($RSi);
$totalRows_RSi = mysql_num_rows($RSi);

mysql_select_db($database_ConBD, $ConBD);
$query_RSj = "SELECT * FROM lojas WHERE nome LIKE 'j%' ORDER BY nome ASC";
$RSj = mysql_query($query_RSj, $ConBD) or die(mysql_error());
$row_RSj = mysql_fetch_assoc($RSj);
$totalRows_RSj = mysql_num_rows($RSj);

mysql_select_db($database_ConBD, $ConBD);
$query_RSk = "SELECT * FROM lojas WHERE nome LIKE 'k%' ORDER BY nome ASC";
$RSk = mysql_query($query_RSk, $ConBD) or die(mysql_error());
$row_RSk = mysql_fetch_assoc($RSk);
$totalRows_RSk = mysql_num_rows($RSk);

mysql_select_db($database_ConBD, $ConBD);
$query_RSl = "SELECT * FROM lojas WHERE nome LIKE 'l%' ORDER BY nome ASC";
$RSl = mysql_query($query_RSl, $ConBD) or die(mysql_error());
$row_RSl = mysql_fetch_assoc($RSl);
$totalRows_RSl = mysql_num_rows($RSl);

mysql_select_db($database_ConBD, $ConBD);
$query_RSm = "SELECT * FROM lojas WHERE nome LIKE 'm%' ORDER BY nome ASC";
$RSm = mysql_query($query_RSm, $ConBD) or die(mysql_error());
$row_RSm = mysql_fetch_assoc($RSm);
$totalRows_RSm = mysql_num_rows($RSm);

mysql_select_db($database_ConBD, $ConBD);
$query_RSn = "SELECT * FROM lojas WHERE nome LIKE 'n%' ORDER BY nome ASC";
$RSn = mysql_query($query_RSn, $ConBD) or die(mysql_error());
$row_RSn = mysql_fetch_assoc($RSn);
$totalRows_RSn = mysql_num_rows($RSn);

mysql_select_db($database_ConBD, $ConBD);
$query_RSo = "SELECT * FROM lojas WHERE nome LIKE 'o%' ORDER BY nome ASC";
$RSo = mysql_query($query_RSo, $ConBD) or die(mysql_error());
$row_RSo = mysql_fetch_assoc($RSo);
$totalRows_RSo = mysql_num_rows($RSo);

mysql_select_db($database_ConBD, $ConBD);
$query_RSp = "SELECT * FROM lojas WHERE nome LIKE 'p%' ORDER BY nome ASC";
$RSp = mysql_query($query_RSp, $ConBD) or die(mysql_error());
$row_RSp = mysql_fetch_assoc($RSp);
$totalRows_RSp = mysql_num_rows($RSp);

mysql_select_db($database_ConBD, $ConBD);
$query_RSq = "SELECT * FROM lojas WHERE nome LIKE 'q%' ORDER BY nome ASC";
$RSq = mysql_query($query_RSq, $ConBD) or die(mysql_error());
$row_RSq = mysql_fetch_assoc($RSq);
$totalRows_RSq = mysql_num_rows($RSq);

mysql_select_db($database_ConBD, $ConBD);
$query_RSr = "SELECT * FROM lojas WHERE nome LIKE 'r%' ORDER BY nome ASC";
$RSr = mysql_query($query_RSr, $ConBD) or die(mysql_error());
$row_RSr = mysql_fetch_assoc($RSr);
$totalRows_RSr = mysql_num_rows($RSr);

mysql_select_db($database_ConBD, $ConBD);
$query_RSs = "SELECT * FROM lojas WHERE nome LIKE 's%' ORDER BY nome ASC";
$RSs = mysql_query($query_RSs, $ConBD) or die(mysql_error());
$row_RSs = mysql_fetch_assoc($RSs);
$totalRows_RSs = mysql_num_rows($RSs);

mysql_select_db($database_ConBD, $ConBD);
$query_RSt = "SELECT * FROM lojas WHERE nome LIKE 't%' ORDER BY nome ASC";
$RSt = mysql_query($query_RSt, $ConBD) or die(mysql_error());
$row_RSt = mysql_fetch_assoc($RSt);
$totalRows_RSt = mysql_num_rows($RSt);

mysql_select_db($database_ConBD, $ConBD);
$query_RSu = "SELECT * FROM lojas WHERE nome LIKE 'u%' ORDER BY nome ASC";
$RSu = mysql_query($query_RSu, $ConBD) or die(mysql_error());
$row_RSu = mysql_fetch_assoc($RSu);
$totalRows_RSu = mysql_num_rows($RSu);

mysql_select_db($database_ConBD, $ConBD);
$query_RSv = "SELECT * FROM lojas WHERE nome LIKE 'v%' ORDER BY nome ASC";
$RSv = mysql_query($query_RSv, $ConBD) or die(mysql_error());
$row_RSv = mysql_fetch_assoc($RSv);
$totalRows_RSv = mysql_num_rows($RSv);

mysql_select_db($database_ConBD, $ConBD);
$query_RSx = "SELECT * FROM lojas WHERE nome LIKE 'x%' ORDER BY nome ASC";
$RSx = mysql_query($query_RSx, $ConBD) or die(mysql_error());
$row_RSx = mysql_fetch_assoc($RSx);
$totalRows_RSx = mysql_num_rows($RSx);

mysql_select_db($database_ConBD, $ConBD);
$query_RSw = "SELECT * FROM lojas WHERE nome LIKE 'w%' ORDER BY nome ASC";
$RSw = mysql_query($query_RSw, $ConBD) or die(mysql_error());
$row_RSw = mysql_fetch_assoc($RSw);
$totalRows_RSw = mysql_num_rows($RSw);

mysql_select_db($database_ConBD, $ConBD);
$query_Rsy = "SELECT * FROM lojas WHERE nome LIKE 'y%' ORDER BY nome ASC";
$Rsy = mysql_query($query_Rsy, $ConBD) or die(mysql_error());
$row_Rsy = mysql_fetch_assoc($Rsy);
$totalRows_Rsy = mysql_num_rows($Rsy);

mysql_select_db($database_ConBD, $ConBD);
$query_Rsz = "SELECT * FROM lojas WHERE nome LIKE 'z%' ORDER BY nome ASC";
$Rsz = mysql_query($query_Rsz, $ConBD) or die(mysql_error());
$row_Rsz = mysql_fetch_assoc($Rsz);
$totalRows_Rsz = mysql_num_rows($Rsz);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>|| Itagua&iacute; Shopping Center ||</title>
<style type="text/css">
<!--
body {
	background-color: #5AC7EE;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../css/estilo_isc.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	z-index:1;
}
#Layer2 {
	position:absolute;
	z-index:2;
}
#Layer3 {
	position:absolute;
	z-index:3;
}
#Layer4 {
	position:absolute;
	z-index:4;
}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/JavaScript">
<!--




function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>

<body>
<a name="topo" id="topo"></a>
<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="19" height="98">&nbsp;</td>
    <td colspan="2"><table width="734" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74" rowspan="2" align="left" valign="top"><a href="../index.php"><img src="../img/logo_01.jpg" width="56" height="93" border="0" /></a></td>
        <td width="660" height="23" align="right" valign="top" background="../img/listra_02.gif" class="txt_04"><table width="250" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','240','height','21','src','../flash/top_menuzinho','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/top_menuzinho','wmode','transparent' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="240" height="21">
              <param name="movie" value="../flash/top_menuzinho.swf" />
			  <param name="wmode" value="transparent">
              <param name="quality" value="high" />
              <embed src="../flash/top_menuzinho.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="21"></embed>
            </object></noscript></td>
            <td width="10">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="75"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','660','height','75','src','../flash/top_menu','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/top_menu' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="660" height="75">
          <param name="movie" value="../flash/top_menu.swf" />
          <param name="quality" value="high" />
          <embed src="../flash/top_menu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="660" height="75"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
    <td width="7" rowspan="2" valign="top" background="../img/listra_03.gif"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"><img src="../img/listra_canto_01.gif" width="19" height="2" /></div></td>
    <td height="2" colspan="2" class="fundo_roxo_01"><div align="left"></div></td>
  </tr>
  <tr valign="top">
    <td height="2"><div align="left"></div></td>
    <td height="2" colspan="2"><div align="left"></div></td>
    <td height="2"><div align="left"></div></td>
  </tr>
  <tr>
    <td rowspan="4" background="../img/listra_01.gif">&nbsp;</td>
    <td width="592" valign="top" bgcolor="#f5f5f5"><table width="592" height="200" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr valign="top">
        <td width="468" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','468','height','60','src','../flash/anuncie_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_01' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="468" height="60">
              <param name="movie" value="../flash/anuncie_01.swf" />
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="468" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
        <td width="120" height="60"><div align="left">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','120','height','60','src','../flash/anuncie_02','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_02' ); //end AC code
    </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="120" height="60">
              <param name="movie" value="../flash/anuncie_02.swf" />
              <param name="quality" value="high" />
              <embed src="../flash/anuncie_02.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="60"></embed>
            </object>
            </noscript>
        </div></td>
        <td width="2" height="60"><div align="left"></div></td>
      </tr>
      <tr valign="top">
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
        <td height="2"><div align="left"></div></td>
        <td width="2" height="2"><div align="left"></div></td>
      </tr>
      <tr>
        <td height="128" colspan="3"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','590','height','138','src','../flash/banner_lojas','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/banner_lojas' ); //end AC code
</script><noscript>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="138">
    <param name="movie" value="../flash/banner_lojas.swf" />
    <param name="quality" value="high" />
    <embed src="../flash/banner_lojas.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="590" height="138"></embed>
  </object></noscript></td>
        <td width="2" rowspan="2" valign="top"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#f5f5f5"><table width="590" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25">&nbsp;</td>
            <td width="553" height="25">&nbsp;</td>
            <td width="10">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left"><img src="../img/titulo_lojas_exibirtodas.gif" width="169" height="16" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="txt_02">Conhe&ccedil;a cada uma das lojas do Itagua&iacute; Shopping Center</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="top">
            <td height="10"><div align="left"></div></td>
            <td height="10"><div align="left"></div></td>
            <td height="10"><div align="left"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="txt_03">Localiza&ccedil;&atilde;o por Iniciais</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="segundo"><span class="txt_03">|</span> <span class="txt_03"><a href="#a">A</a> | <a href="#b">B</a> | <a href="#c">C</a> | <a href="#d">D</a> | <a href="#e">E</a> | <a href="#f">F</a> | <a href="#g">G</a> | <a href="#h">H</a> | <a href="#i">I</a> | <a href="#j">J</a> | <a href="#k">K</a> | <a href="#l">L</a> | <a href="#m">M</a> | <a href="#n">N</a> | <a href="#o">O</a> | <a href="#p">P</a> | <a href="#q">Q</a> | <a href="#r">R</a> | <a href="#s">S</a> | <a href="#t">T</a> | <a href="#u">U</a> | <a href="#v">V</a> | <a href="#x">X</a> | <a href="#w">W</a> | <a href="#y">Y</a> | <a href="#x">Z</a> |</span></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top"><table width="551" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="a" id="a"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;A&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                    </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                              <td width="41%">&nbsp;</td>
                              <td width="23%">&nbsp;</td>
                              <td width="18%">&nbsp;</td>
                              <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                                    <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSa['id']; ?>"><?php echo $row_RSa['nome']; ?></a><br />
                                        <span class="txt_01"><?php echo $row_RSa['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSa['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSa['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSa['numero']; ?></td>
                          </tr>
                                                </table>
                        <?php } while ($row_RSa = mysql_fetch_assoc($RSa)); ?></td>
                    </tr>
                  
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="b" id="b"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;B&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSb['id']; ?>"><?php echo $row_RSb['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSb['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSb['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSb['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSb['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSb= mysql_fetch_assoc($RSb)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="c" id="c"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;C&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSc['id']; ?>"><?php echo $row_RSc['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSc['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSc['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSc['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSc['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSc = mysql_fetch_assoc($RSc)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="e" id="d"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;D&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSd['id']; ?>"><?php echo $row_RSd['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSd['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSd['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSd['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSd['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSd = mysql_fetch_assoc($RSd)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="e" id="e"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;E&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSe['id']; ?>"><?php echo $row_RSe['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSe['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSe['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSe['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSe['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSe = mysql_fetch_assoc($RSe)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="f" id="f"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;F&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSf['id']; ?>"><?php echo $row_RSf['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSf['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSf['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSf['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSf['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSf = mysql_fetch_assoc($RSf)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="g" id="g"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;G&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSg['id']; ?>"><?php echo $row_RSg['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSg['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSg['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSg['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSg['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSg = mysql_fetch_assoc($RSg)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="h" id="h"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;H&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSh['id']; ?>"><?php echo $row_RSh['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSh['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSh['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSh['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSh['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSh = mysql_fetch_assoc($RSh)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="i" id="i"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;I&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSi['id']; ?>"><?php echo $row_RSi['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSi['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSi['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSi['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSi['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSi = mysql_fetch_assoc($RSi)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="j" id="j"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;J&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSj['id']; ?>"><?php echo $row_RSj['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSj['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSj['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSj['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSj['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSj = mysql_fetch_assoc($RSj)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="k" id="k"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;K&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSk['id']; ?>"><?php echo $row_RSk['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSk['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSk['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSk['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSk['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSk = mysql_fetch_assoc($RSk)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="l" id="l"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;L&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSl['id']; ?>"><?php echo $row_RSl['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSl['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSl['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSl['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSl['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSl = mysql_fetch_assoc($RSl)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="m" id="m"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;M&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSm['id']; ?>"><?php echo $row_RSm['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSm['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSm['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSm['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSm['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSm = mysql_fetch_assoc($RSm)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="n" id="n"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;N&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSn['id']; ?>"><?php echo $row_RSn['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSn['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSn['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSn['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSn['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSn = mysql_fetch_assoc($RSn)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="o" id="o"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;O&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSo['id']; ?>"><?php echo $row_RSo['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSo['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSo['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSo['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSo['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSo = mysql_fetch_assoc($RSo)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="p" id="p"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;P&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSp['id']; ?>"><?php echo $row_RSp['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSp['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSp['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSp['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSp['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSp = mysql_fetch_assoc($RSp)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="q" id="q"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;Q&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSq['id']; ?>"><?php echo $row_RSq['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSq['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSq['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSq['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSq['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSq = mysql_fetch_assoc($RSq)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="r" id="r"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;R&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSr['id']; ?>"><?php echo $row_RSr['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSr['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSr['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSr['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSr['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSr = mysql_fetch_assoc($RSr)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="s" id="s"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;S&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSs['id']; ?>"><?php echo $row_RSs['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSs['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSs['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSs['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSs['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSs = mysql_fetch_assoc($RSs)); ?></td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="t" id="t"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;T&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSt['id']; ?>"><?php echo $row_RSt['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSt['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSt['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSt['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSt['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSt = mysql_fetch_assoc($RSt)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="u" id="u"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;U&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSu['id']; ?>"><?php echo $row_RSu['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSu['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSu['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSu['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSu['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSu = mysql_fetch_assoc($RSu)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="v" id="v"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;V&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSv['id']; ?>"><?php echo $row_RSv['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSv['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSv['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSv['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSv['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSv = mysql_fetch_assoc($RSv)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="x" id="x"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;X&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSx['id']; ?>"><?php echo $row_RSx['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSx['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSx['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSx['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSx['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSx = mysql_fetch_assoc($RSx)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="w" id="w"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;W&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_RSw['id']; ?>"><?php echo $row_RSw['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_RSw['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_RSw['telefone']; ?></td>
                            <td align="center" ><?php echo $row_RSw['andar']; ?></td>
                            <td align="center" ><?php echo $row_RSw['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_RSw = mysql_fetch_assoc($RSw)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="y" id="y"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;Y&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_Rsy['id']; ?>"><?php echo $row_Rsy['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_Rsy['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_Rsy['telefone']; ?></td>
                            <td align="center" ><?php echo $row_Rsy['andar']; ?></td>
                            <td align="center" ><?php echo $row_Rsy['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_Rsy = mysql_fetch_assoc($Rsy)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="529" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="215" height="25" class="txt_02"><a name="z" id="z"></a></td>
                    <td width="122" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                    <td width="95" align="center">&nbsp;</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_03">LOJAS COM A LETRA &quot;Z&quot;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><span class="segundo"><img src="../img/marcador_seta_01.jpg" width="14" height="14" align="absmiddle" /> <a href="#topo">topo</a></span></td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" class="txt_09">NOME</td>
                    <td align="center" class="txt_09">TELEFONE</td>
                    <td align="center" class="txt_09">ANDAR</td>
                    <td align="center" class="txt_09">N&Uacute;MERO</td>
                  </tr>
                  <tr class="txt_02">
                    <td height="25" colspan="4" align="left" valign="top" class="txt_09"><?php do { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linhaembaixo03">
                          <tr>
                            <td width="41%">&nbsp;</td>
                            <td width="23%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="40" align="left" valign="middle" ><div class="terceiro"><a href="lj.php?id=<?php echo $row_Rsz['id']; ?>"><?php echo $row_Rsz['nome']; ?></a><br />
                                    <span class="txt_01"><?php echo $row_Rsz['categoria']; ?></span></div></td>
                            <td align="center" ><?php echo $row_Rsz['telefone']; ?></td>
                            <td align="center" ><?php echo $row_Rsz['andar']; ?></td>
                            <td align="center" ><?php echo $row_Rsz['numero']; ?></td>
                          </tr>
                        </table>
                      <?php } while ($row_Rsz = mysql_fetch_assoc($Rsz)); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="142" height="423" valign="top" bgcolor="#e6e6e6"><table width="142" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="142" height="200" cellpadding="0" cellspacing="0">
            <tr>
              <td height="153" bgcolor="#121212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','153','src','../flash/banner_vert_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/banner_vert_01' ); //end AC code
        </script>
                  <noscript>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="153">
                    <param name="movie" value="../flash/banner_vert_01.swf" />
                    <param name="quality" value="high" />
                    <embed src="../flash/banner_vert_01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="153"></embed>
                  </object>
                </noscript></td>
            </tr>
            <tr>
              <td height="47"><img src="../img/img_algumas_lojas_01.gif" width="142" height="47" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="200"><span class="fundo_roxo_01"><a href="../musicaaovivo/index.html"><img src="../img/barra_vertical_02.1.gif" width="142" height="200" border="0" /></a></span></td>
      </tr>
      <tr>
        <td><table width="142" cellpadding="0" cellspacing="0">
          <tr valign="top">
            <td width="10" height="4"><div align="left"></div></td>
            <td width="120" height="4"><div align="left"></div></td>
            <td width="10" height="4"><div align="left"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="30" align="left" class="txt_07">Como Chegar </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="80" align="left" valign="top" class="txt_08">Aqui voc&ecirc; encontra um guia f&aacute;cil para chegar ao Itagua&iacute; Shopping Center.</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="116" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="13"><img src="../img/marcador_mais_02.jpg" width="13" height="13" /></td>
                  <td width="5" valign="top"><div align="left"></div></td>
                  <td width="91" align="left"><a href="../comochegar/index.html">Saiba mais</a> </td>
                </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="22" class="linhaembaixo02">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td rowspan="12" align="left" valign="top" class="txt_07"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="13" align="left" class="txt_07">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="left" class="txt_07">Nossos Hor&aacute;rios </td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="txt_08">Fique por dentro dos nossos hor&aacute;rios de funcionamento.</td>
                </tr>
                <tr>
                  <td class="txt_03">&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt_03">Lojas:</td>
                </tr>
                <tr>
                  <td class="txt_02">Segunda a S&aacute;bado: 09:00 &agrave;s 20:00 h </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt_03">Pra&ccedil;a de Alimenta&ccedil;&atilde;o:</td>
                </tr>
                <tr>
                  <td class="txt_02">Segunda a S&aacute;bado: 09:00 &agrave;s 20:00 h </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt_03">Administra&ccedil;&atilde;o e Atendimento ao Cliente: </td>
                </tr>
                <tr>
                  <td class="txt_02">Segunda a S&aacute;bado: 08:00 &agrave;s 20:00 h </td>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th scope="col">&nbsp;</th>
                </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="top">
            <td height="15"><div align="left"></div></td>
            <td height="15"><div align="left"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="7" rowspan="4" valign="top" background="../img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
  </tr>
  
  <tr>
    <td align="center" valign="top" bgcolor="#f5f5f5"><table width="586" cellpadding="0" cellspacing="0">
      <tr valign="top" bgcolor="#f5f5f5">
        <td width="9" height="4"><div align="left"></div></td>
        <td width="108" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="64" height="4"><div align="left"></div></td>
        <td width="22" height="4"><div align="left"></div></td>
        <td width="208" height="4"><div align="left"></div></td>
        <td width="72" height="4"><div align="left"></div></td>
        <td width="79" height="4"><div align="left"></div></td>
      </tr>
      <tr>
        <td colspan="8"><table width="586" cellpadding="0" cellspacing="0" class="contorno_01">
          <tr>
            <td width="9" height="30">&nbsp;</td>
            <td width="108"><img src="../img/titulo_desenvolvido_01.jpg" width="108" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="64"><img src="../img/titulo_seguranca_01.gif" width="64" height="13" /></td>
            <td width="22">&nbsp;</td>
            <td width="208">&nbsp;</td>
            <td width="72">&nbsp;</td>
            <td width="79">&nbsp;</td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
            <td><a href="http://www.lobsterdesigner.com.br" target="_blank"><img src="../img/logo_lobster_02.jpg" width="108" height="25" border="0" /></a></td>
            <td>&nbsp;</td>
            <td align="left"><a href="http://www.eliteserv.com.br/" target="_blank"><img src="../img/logo_elite_02.jpg" width="36" height="43" border="0" /></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      
      <tr valign="top" bgcolor="#f5f5f5">
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4" align="left"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
        <td height="4"><div align="left"></div></td>
      </tr>
    </table></td>
    <td valign="middle" background="../img/listra_04.gif"><table width="142" height="90" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#e6e6e6"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','82','src','../flash/anuncie_03','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/anuncie_03' ); //end AC code
        </script>
          <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="82">
            <param name="movie" value="../flash/anuncie_03.swf" />
            <param name="quality" value="high" />
            <embed src="../flash/anuncie_03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="142" height="82"></embed>
          </object>
          </noscript>          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" align="center" class="fundo_roxo_01"> Copyright &copy; 2007 Itagua&iacute; Shopping - Inc. All rights reserved.</td>
    <td width="142" rowspan="2" valign="top" background="../img/listra_04.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="592" height="80" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" align="center" valign="bottom"><span class="txt_01"><a href="../horarios/index.html">Hor&aacute;rio de Funcionamento</a>&nbsp; |&nbsp; <a href="../comochegar/index.html">Como Chegar</a>&nbsp; |&nbsp; <a href="../siteadaptado/index.html">Site Adaptado</a></span></td>
      </tr>
      <tr>
        <td height="58" align="center" valign="top" class="primeiro"><span class="txt_02">(0xx21) 2688-4293        |</span> <span class="primeiro_a"><a href="mailto:contato@itaguaishoppingcenter.com.br">contato@itaguaishoppingcenter.com.br</a></span><br />
          <span class="txt_02">Rua Dr. Curvelo Cavalcante, 189 - Centro - Itagua&iacute; - RJ</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RSa);

mysql_free_result($RSb);

mysql_free_result($RSc);

mysql_free_result($RSd);

mysql_free_result($RSe);

mysql_free_result($RSf);

mysql_free_result($RSg);

mysql_free_result($RSh);

mysql_free_result($RSi);

mysql_free_result($RSj);

mysql_free_result($RSk);

mysql_free_result($RSl);

mysql_free_result($RSm);

mysql_free_result($RSn);

mysql_free_result($RSo);

mysql_free_result($RSp);

mysql_free_result($RSq);

mysql_free_result($RSr);

mysql_free_result($RSs);

mysql_free_result($RSt);

mysql_free_result($RSu);

mysql_free_result($RSv);

mysql_free_result($RSx);

mysql_free_result($RSw);

mysql_free_result($Rsy);

mysql_free_result($Rsz);
?>
