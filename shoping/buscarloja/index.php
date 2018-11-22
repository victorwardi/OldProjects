<?php require_once('../Connections/ConBD.php'); ?>
<?php
mysql_select_db($database_ConBD, $ConBD);
$query_RScategoria = "SELECT * FROM categoria ORDER BY categoria ASC";
$RScategoria = mysql_query($query_RScategoria, $ConBD) or die(mysql_error());
$row_RScategoria = mysql_fetch_assoc($RScategoria);
$totalRows_RScategoria = mysql_num_rows($RScategoria);
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

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
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
    <td rowspan="5" background="../img/listra_01.gif">&nbsp;</td>
    <td width="592" rowspan="2" valign="top" bgcolor="#f5f5f5"><table width="592" height="200" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="590" height="138">
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
            <td align="left"><img src="../img/titulo_lojas_buscar.gif" width="172" height="16" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="25">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="553" cellspacing="0" cellpadding="0">
                <tr class="txt_03">
                  <td width="387" valign="top"><table width="373" height="80" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="20" class="txt_02">Conhe&ccedil;a cada uma das lojas do Itagua&iacute; Shopping Center</td>
                    </tr>
                    <tr>
                      <td height="10" valign="top" class="txt_03"><div align="left"></div></td>
                    </tr>
                    <tr>
                      <td height="20" class="txt_03">Buscar por Loja</td>
                    </tr>
                    <tr valign="top">
                      <td height="10" class="txt_03"><div align="left"></div></td>
                    </tr>
                    <tr>
                      <td><form id="busca" name="busca" method="get" action="busca.php">
                        <table width="373" cellspacing="0" cellpadding="0">
                          <tr valign="top">
                            <td width="142" height="19" valign="top"><div align="left">
                              <label>
                              <input name="busca" type="text" class="fundo_campo_03" value="- digite o nome da loja -" size="35" />
                              </label>
                            </div>
                                <div align="left"></div></td>
                            <td width="229" height="19"><div align="left">
                              <label>
                              <input type="image" name="imageField2" src="../img/botao_ok_01.gif" />
                              </label>
                            </div></td>
                          </tr>
                        </table>
                                                                  </form>                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="20">Buscar por Categoria </td>
                    </tr>
                    <tr>
                      <td height="10" valign="top"><div align="left"></div></td>
                    </tr>
                    <tr>
                      <td><form name="form2" id="form2">
                        <select name="menu1" class="fundo_campo_04" onchange="MM_jumpMenu('parent',this,0)">
                          <option value="" selected="selected">- selecione uma categoria -</option>
                                               <?php
do {  
?>
                          <option value="categoria.php?categoria=<?php echo $row_RScategoria['categoria']?>"><?php echo $row_RScategoria['categoria']?></option>
                          <?php
} while ($row_RScategoria = mysql_fetch_assoc($RScategoria));
  $rows = mysql_num_rows($RScategoria);
  if($rows > 0) {
      mysql_data_seek($RScategoria, 0);
	  $row_RScategoria = mysql_fetch_assoc($RScategoria);
  }
?>
                        </select>
                      </form></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                  </table></td>
                  <td width="164" align="right" valign="top"><table width="164" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20">&nbsp;</td>
                        <td width="132" class="contorno_01"><img src="../img/img_horarios_01.jpg" width="132" height="132" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      
                  </table></td>
                </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td height="20"><span class="txt_03">Localiza&ccedil;&atilde;o por Iniciais</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="top">
            <td height="10"><div align="left"></div></td>
            <td height="10"><div align="left"></div></td>
            <td height="10"><div align="left"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="segundo"><span class="txt_03">|</span> <span class="txt_03"><a href="alfabetico.php?nome=a">A</a> | <a href="alfabetico.php?nome=b">B</a> | <a href="alfabetico.php?nome=c">C</a> | <a href="alfabetico.php?nome=d">D</a> | <a href="alfabetico.php?nome=e">E</a> | <a href="alfabetico.php?nome=f">F</a> | <a href="alfabetico.php?nome=g">G</a> | <a href="alfabetico.php?nome=h">H</a> | <a href="alfabetico.php?nome=i">I</a> | <a href="alfabetico.php?nome=j">J</a> | <a href="alfabetico.php?nome=k">K</a> | <a href="alfabetico.php?nome=l">L</a> | <a href="alfabetico.php?nome=m">M</a> | <a href="alfabetico.php?nome=n">N</a> | <a href="alfabetico.php?nome=o">O</a> | <a href="alfabetico.php?nome=p">P</a> | <a href="alfabetico.php?nome=q">Q</a> | <a href="alfabetico.php?nome=r">R</a> | <a href="alfabetico.php?nome=s">S</a> | <a href="alfabetico.php?nome=t">T</a> | <a href="alfabetico.php?nome=u">U</a> | <a href="alfabetico.php?nome=v">V</a> | <a href="alfabetico.php?nome=x">X</a> | <a href="alfabetico.php?nome=w">W</a> | <a href="alfabetico.php?nome=y">Y</a> | <a href="alfabetico.php?nome=z">Z</a> |</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="40">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="553" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="txt_03">Galeria de Fotos</td>
                </tr>
                <tr valign="top">
                  <td height="15"><div align="left"></div></td>
                </tr>
                
                <tr>
                  <td height="15" valign="top"><div align="left"></div></td>
                </tr>
                <tr>
                  <td><table width="541" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="99" class="contorno_01"><img src="../img/DSCF2280pp.jpg" width="99" height="74" /></td>
                        <td width="11">&nbsp;</td>
                        <td width="99" class="contorno_01"><img src="../img/DSCF2291pp.jpg" width="99" height="74" /></td>
                        <td width="11">&nbsp;</td>
                        <td width="99" class="contorno_01"><img src="../img/DSCF2294pp.jpg" width="99" height="74" /></td>
                        <td width="11">&nbsp;</td>
                        <td width="99" class="contorno_01"><img src="../img/DSCF2334pp.jpg" width="99" height="74" /></td>
                        <td width="11">&nbsp;</td>
                        <td width="99" class="contorno_01"><img src="../img/DSCF2310pp.jpg" width="99" height="74" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="40">&nbsp;</td>
                </tr>
                <tr>
                  <td class="txt_03">Planta do Shopping</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','543','height','263','src','../flash/planta3','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../flash/planta3' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="543" height="263">
                    <param name="movie" value="../flash/planta3.swf" />
                    <param name="quality" value="high" />
                    <embed src="../flash/planta3.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="543" height="263"></embed>
                  </object></noscript></td>
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
    <td width="142" valign="top" bgcolor="#e6e6e6"><table width="142" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="142" height="200" cellpadding="0" cellspacing="0">
            <tr>
              <td height="153" bgcolor="#121212"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','142','height','153','src','../flash/banner_vert_01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../flash/banner_vert_01' ); //end AC code
        </script>
                  <noscript>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="142" height="153">
                    <param name="movie" value="../flash/banner_vert_01.swf" />
                    <param name="wmode" value="transparent"/>
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
        <td height="200"><span class="fundo_roxo_01"><a href="http://www.itaguaishoppingcenter.com.br/eventos/ver.php?id=128"><img src="../img/barra_vertical_02.1.gif" width="142" height="200" border="0" /></a></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="142" cellpadding="0" cellspacing="0">
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
    <td width="7" rowspan="5" valign="top" background="../img/listra_03.gif"><div align="left"></div>      
    <div align="left"></div>      <div align="left"></div></td>
  </tr>
  <tr>
    <td width="142" valign="top" bgcolor="#e6e6e6">&nbsp;</td>
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
    <td valign="middle" bgcolor="#e6e6e6"><table width="142" height="90" cellpadding="0" cellspacing="0">
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
mysql_free_result($RScategoria);
?>
