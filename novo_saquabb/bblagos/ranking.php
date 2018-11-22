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
<title>_____________Saquabb.com.br_____________________________________________</title>
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
<!--
#Layer1 {
	position:absolute;
	width:260px;
	height:70px;
	z-index:1;
	left: 17px;
	top: 21px;
	background-color: #FFFF33;
	overflow: hidden;
}
-->
</style>
</head>
<script language="JavaScript" src="../java.js"></script>
<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-1";
urchinTracker();
</script>
<table width="601" height="396" border="0" align="center" cellpadding="0" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../carnaporto/index.php"></a><img src="../imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="140" align="center" valign="top" bgcolor="#E6F9FD"><table border="0" cellpadding="0" cellspacing="8" class="conteudo_esquerdo_borda_meio">
          <tr>
            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Principal</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="8"><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td width="106" align="left" valign="middle" class="fonte_not"><a href="../index.php">Home</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../arquivo.php">Arquivo de Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../galerias.php">Galerias de Fotos</a> </td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../videos.php">V&iacute;deos</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../perfil.php">Perfil dos Atletas </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../contato.php">Fale Conosco </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">BBLagos</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="gabriel/gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="info.php">Informa&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">OVNI</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../ovni/ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../ovni/galeria.php">Galeria de Fotos </a></td>
          </tr>
          
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Saquabb Girls </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../girls/index.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Variedades</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../festas/index.php">Fotos das Festas </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../vemai.php">Vem a&iacute;... </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../festa_anuncio.php">Anuncie sua Festa </a></td>
          </tr>
        </table>
          <table width="140" border="0" cellpadding="0" cellspacing="2" bgcolor="#E6F9FD">
            <tr>
              <td width="133" height="21" align="left" valign="middle"><img src="../imagens/titulos/publicidade.jpg" width="128" height="16" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="../imagens/publicidade/logorb.jpg" alt="RB Provider" width="120" height="38" border="0" /></a></td>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.saqua.com.br"><img src="../imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="120" height="45" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.redsdesign.com.br"><img src="../imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="120" height="35" border="0" longdesc="http://www.redsdesign.com.br" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.gnunes.net"><img src="../imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="120" height="35" border="0" class="borda_tabela" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        <br /></td>
        <td width="627" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
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
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
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