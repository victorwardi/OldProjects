<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias WHERE coluna = 'girls' ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos WHERE galeria = 'girls' ORDER BY id_foto DESC";
$fotos = mysql_query($query_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/gabriel/gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="../bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
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
            <td align="left" valign="middle" class="fonte_not"><a href="index.php">Not&iacute;cias </a></td>
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
          <table width="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <th colspan="2" background="imagens/topo.jpg" bgcolor="#FFFFFF" scope="col"><table width="100%" height="102" border="4" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF">
                  <tr>
                    <th scope="col">&nbsp;</th>
                  </tr>
              </table></th>
            </tr>
            <tr>
              <th width="65%" height="259" align="center" valign="top" scope="col"><table width="400" border="0" cellpadding="4" cellspacing="0">
                  <tr>
                    <th bgcolor="#FFFFFF" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "../uploads/fotos/", "{noticias.imagem}");?>" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th height="25" align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><span class="tiutlo_not"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="perfil_nome"><?php echo substr($row_noticias['titulo'] ,0,100).""; ?></a></span></th>
                  </tr>
                  <tr>
                    <th align="left" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="left" valign="middle" bgcolor="#017C9E" scope="col"><span class="mais_festa">Mais Not&iacute;cas </span></th>
                  </tr>
                  <tr>
                    <th align="left" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th align="center" valign="middle" bgcolor="#FFFFFF" scope="col"><?php do { ?>
                        <table width="400" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                          <tr>
                            <th width="92" align="center" valign="top" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"></a>
                                <table width="100" border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
                                  <tr>
                                    <th scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}", 100, 0, true); ?>" border="0" /></a></th>
                                  </tr>
                              </table></th>
                            <th width="300" align="left" valign="top" scope="col"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_titulo_not"><?php echo substr($row_noticias['titulo'] ,0,100).""; ?><br />
                            </a><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><?php echo $row_noticias['data']; ?></a></th>
                          </tr>
                        </table>
                      <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
                        <p></p></th>
                  </tr>
                  <tr>
                    <th align="center" valign="middle" bgcolor="#E6F9FD" scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th height="20" align="right" valign="middle" bgcolor="#017C9E" scope="col"><span class="mais_festa">+ Arquivo de Not&iacute;cias</span></th>
                  </tr>
                </table>
                  <br />
              </th>
              <th width="35%" align="center" valign="top" bgcolor="#FFFFFF" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="4">
                  <tr>
                    <th height="20" align="left" valign="middle" bgcolor="#017C9E" class="mais_festa" scope="col">Fotos </th>
                  </tr>
                  
                  <tr>
                    <th height="96" scope="col"><?php do { ?>
                        <img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{fotos.arquivo}", 184, 0, true); ?>" /><br />
                        <br />
                        <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>
                        <br /></th>
                  </tr>
                </table>
                  <br />
                  <table width="100%" border="0" cellpadding="2" cellspacing="2">
                    <tr>
                      <th height="49" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th bgcolor="#017C9E" scope="col"><p>&nbsp;</p>
                                <p>&nbsp;</p></th>
                          </tr>
                      </table></th>
                    </tr>
                </table></th>
            </tr>
            <tr>
              <th height="20" align="right" valign="middle" class="mais_festa" scope="col">&nbsp;</th>
              <th scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th colspan="2" scope="col">&nbsp;</th>
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
mysql_free_result($noticias);

mysql_free_result($fotos);
?>