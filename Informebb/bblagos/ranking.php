<?php require_once('../Connections/saquabb.php'); ?>
<?php
mysql_select_db($database_saquabb, $saquabb);
$query_amador = "SELECT * FROM ranking WHERE categoria = 'amador' ORDER BY colocacao ASC";
$amador = mysql_query($query_amador, $saquabb) or die(mysql_error());
$row_amador = mysql_fetch_assoc($amador);
$totalRows_amador = mysql_num_rows($amador);

mysql_select_db($database_saquabb, $saquabb);
$query_mirim = "SELECT * FROM ranking WHERE categoria = 'mirim' ORDER BY colocacao ASC";
$mirim = mysql_query($query_mirim, $saquabb) or die(mysql_error());
$row_mirim = mysql_fetch_assoc($mirim);
$totalRows_mirim = mysql_num_rows($mirim);

mysql_select_db($database_saquabb, $saquabb);
$query_iniciante = "SELECT * FROM ranking WHERE categoria = 'iniciante' ORDER BY colocacao ASC";
$iniciante = mysql_query($query_iniciante, $saquabb) or die(mysql_error());
$row_iniciante = mysql_fetch_assoc($iniciante);
$totalRows_iniciante = mysql_num_rows($iniciante);

mysql_select_db($database_saquabb, $saquabb);
$query_feminino = "SELECT * FROM ranking WHERE categoria = 'feminino' ORDER BY colocacao ASC";
$feminino = mysql_query($query_feminino, $saquabb) or die(mysql_error());
$row_feminino = mysql_fetch_assoc($feminino);
$totalRows_feminino = mysql_num_rows($feminino);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style2 {color: #FF0000}
.nome {
	text-transform: uppercase;
	color: #000000;
	font-size: 9px;
}
-->
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="4" class="borda_topo">
                    <tr>
                      <td align="left" valign="middle" class="tiutlo_not">Ranking Circuito BBlagos 2006 Ap&oacute;s a 4&ordf; etapa (Praia Brava - Cabo Frio) </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="66" colspan="2" align="left" valign="top"><p class="tiutlo_not"><br />        
                        <strong>O asterisco ( * ) , representa o  atleta que j&aacute;&nbsp; pagou a filia&ccedil;&atilde;o...</strong><br />
                        <strong>Portanto,&nbsp; os demais n&atilde;o est&atilde;o correndo atr&aacute;s dos  grandes pr&ecirc;mios e das&nbsp;</strong><br />
                        <strong>vantagens do circuito em sua fase  final, e conseguentemente <span class="style2">N&Atilde;O EST&Atilde;O PONTUANDO</span></strong> <strong>at&eacute; ent&atilde;o.<br />
                    E lembre-se, s&oacute; se filiando que o atleta passa a ser atleta BBLAGOS e ter a melhor imagem do bodyboarding, ser vis&iacute;vel na m&iacute;dia e aproveitar tudo que o circuito tem a oferecer, filie-se e aproveite as vantagens.</strong></p>
                    <p class="tiutlo_not"><strong>Atletas n&atilde;o filiados n&atilde;o recebem as premia&ccedil;&otilde;es especiais . </strong><br />
                    </p>
                    <p class="tiutlo_not"><strong>GABRIEL  FONSECA &ndash; MANAGER&nbsp; BBLAGOS&nbsp; </strong></p>
                    <p><br />              
                        <br />
                    </p></td>
                </tr>
                <tr>
                  <td width="64%" align="left" valign="top"><table width="280" border="0" cellpadding="2" cellspacing="2" bgcolor="#BAE3E7">
                    <tr>
                      <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="perfil_nome">Amador</td>
                    </tr>
                    <tr>
                      <td width="32%" align="left" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                      <td width="38%" align="left" valign="middle" class="tiutlo_not">Nome</td>
                      <td width="30%" align="left" valign="middle" class="tiutlo_not">Pontos</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle"><?php do { ?>
                          <table width="100%" border="1" cellpadding="4" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
                            <tr>
                              <td width="24%" align="center" valign="middle"><?php echo $row_amador['colocacao']; ?></td>
                              <td width="46%" align="center" valign="middle"><div align="left" class="nome"><?php echo $row_amador['nome']; ?></div></td>
                              <td width="30%" align="left" valign="middle"><?php echo $row_amador['pontos']; ?></td>
                            </tr>
                          </table>
                      <?php } while ($row_amador = mysql_fetch_assoc($amador)); ?></td>
                    </tr>
                  </table>                    
                    <table width="280" border="0" cellpadding="2" cellspacing="2" bgcolor="#BAE3E7">
                    <tr>
                      <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="perfil_nome">Mirim</td>
                    </tr>
                    <tr>
                      <td width="32%" align="left" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                      <td width="38%" align="left" valign="middle" class="tiutlo_not">Nome</td>
                      <td width="30%" align="left" valign="middle" class="tiutlo_not">Pontos</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle"><?php do { ?>
                          <table width="100%" border="1" cellpadding="4" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
                            <tr>
                              <td width="24%" align="center" valign="middle"><?php echo $row_mirim['colocacao']; ?></td>
                              <td width="46%" align="center" valign="middle"><div align="left" class="nome"><?php echo $row_mirim['nome']; ?></div></td>
                              <td width="30%" align="left" valign="middle"><?php echo $row_mirim['pontos']; ?></td>
                            </tr>
                          </table>
                        <?php } while ($row_mirim = mysql_fetch_assoc($mirim)); ?></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p></td>
                  <td width="36%" align="right" valign="top"><table width="280" border="0" cellpadding="2" cellspacing="2" bgcolor="#BAE3E7">
                    <tr>
                      <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="perfil_nome">Iniciante</td>
                    </tr>
                    <tr>
                      <td width="32%" align="left" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                      <td width="38%" align="left" valign="middle" class="tiutlo_not">Nome</td>
                      <td width="30%" align="left" valign="middle" class="tiutlo_not">Pontos</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle"><?php do { ?>
                          <table width="100%" border="1" cellpadding="4" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
                            <tr>
                              <td width="24%" align="center" valign="middle"><?php echo $row_iniciante['colocacao']; ?></td>
                              <td width="46%" align="center" valign="middle"><div align="left" class="nome"><?php echo $row_iniciante['nome']; ?></div></td>
                              <td width="30%" align="left" valign="middle"><?php echo $row_iniciante['pontos']; ?></td>
                            </tr>
                          </table>
                        <?php } while ($row_iniciante = mysql_fetch_assoc($iniciante)); ?></td>
                    </tr>
                  </table>
                    <table width="280" border="0" cellpadding="2" cellspacing="2" bgcolor="#BAE3E7">
                    <tr>
                      <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="perfil_nome">Feminino</td>
                    </tr>
                    <tr>
                      <td width="32%" align="left" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                      <td width="38%" align="left" valign="middle" class="tiutlo_not">Nome</td>
                      <td width="30%" align="left" valign="middle" class="tiutlo_not">Pontos</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle"><?php do { ?>
                          <table width="100%" border="1" cellpadding="4" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
                            <tr>
                              <td width="24%" align="center" valign="middle"><?php echo $row_feminino['colocacao']; ?></td>
                              <td width="46%" align="center" valign="middle"><div align="left" class="nome"><?php echo $row_feminino['nome']; ?></div></td>
                              <td width="30%" align="left" valign="middle"><?php echo $row_feminino['pontos']; ?></td>
                            </tr>
                          </table>
                        <?php } while ($row_feminino = mysql_fetch_assoc($feminino)); ?></td>
                    </tr>
                    </table></td>
                </tr>
                
                <tr>
                  <td height="29" colspan="2" align="center" valign="middle" class="tiutlo_not">Ranking Atualizado pelos organizadores do Circuito BBlagos, quaisquer problema ou d&uacute;vida entre em contato com Gabriel Fonseca (bblagos@hotmail.com). </td>
                </tr>
              </table></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($amador);

mysql_free_result($mirim);

mysql_free_result($iniciante);

mysql_free_result($feminino);
?>