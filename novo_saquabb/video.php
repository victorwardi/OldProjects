<?php require_once('Connections/saquabb.php'); ?>
<?php require('_drawrating.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_video = "-1";
if (isset($_GET['id'])) {
  $colname_video = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_video = sprintf("SELECT * FROM videos WHERE id = %s ORDER BY id DESC", $colname_video);
$video = mysql_query($query_video, $saquabb) or die(mysql_error());
$row_video = mysql_fetch_assoc($video);
$totalRows_video = mysql_num_rows($video);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<script type="text/javascript" language="javascript" src="votacao/js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="votacao/js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="votacao/css/rating.css" />
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
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
<script language="JavaScript" src="java.js"></script>
<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-1";
urchinTracker();
</script>
<table width="601" height="396" border="0" align="center" cellpadding="0" cellspacing="8" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a><img src="imagens/banner.jpg" width="775" height="120" /></td>
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
            <td width="8"><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td width="106" align="left" valign="middle" class="fonte_not"><a href="index.php">Home</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="arquivo.php">Arquivo de Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="galerias.php">Galerias de Fotos</a> </td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="videos.php">V&iacute;deos</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="perfil.php">Perfil dos Atletas </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="contato.php">Fale Conosco </a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">BBLagos</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/index.php">Not&iacute;cias</a> </td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/gabriel/gabriel.php">Qu&eacute; Se Eu? </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/circuito.php">O Circuito </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/etapas.php">Etapas 2006 </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/ranking.php">Ranking</a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
          </tr>
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">OVNI</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ovni/ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="ovni/galeria.php">Galeria de Fotos </a></td>
          </tr>
          
          <tr>
            <td colspan="2"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="left" valign="middle">Saquabb Girls </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="girls/index.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
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
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="festas/index.php">Fotos das Festas </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="vemai.php">Vem a&iacute;... </a></td>
          </tr>
          <tr>
            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="festa_anuncio.php">Anuncie sua Festa </a></td>
          </tr>
        </table>
          <table width="140" border="0" cellpadding="0" cellspacing="2" bgcolor="#E6F9FD">
            <tr>
              <td width="133" height="21" align="left" valign="middle"><img src="imagens/titulos/publicidade.jpg" width="128" height="16" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                          <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="imagens/publicidade/logorb.jpg" alt="RB Provider" width="120" height="38" border="0" /></a></td>
                        </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.saqua.com.br"><img src="imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="120" height="45" border="0" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.redsdesign.com.br"><img src="imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="120" height="35" border="0" longdesc="http://www.redsdesign.com.br" /></a></th>
                  </tr>
                  <tr>
                    <th scope="row"><a href="http://www.gnunes.net"><img src="imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="120" height="35" border="0" class="borda_tabela" /></a></th>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        <br /></td>
        <td width="627" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="617" border="0" cellpadding="2" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <td width="60%" height="17" align="left" bgcolor="#017C9E" class="Titulo_Branco">Videos</td>
            </tr>
            
            <tr>
              <td align="left" valign="middle" class="perfil_nome"><?php echo $row_video['titulo']; ?></td>
            </tr>
            
            <tr>
              <td height="36" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                  <tr>
                    <td height="31" align="center"><?php echo $row_video['descricao']; ?></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><span class="tiutlo_not">Enviado por :</span> <span class="fonte_titulo_not"><?php echo $row_video['autor']; ?></span></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><span class="tiutlo_not">Link no You Tube:</span> <a href="<?php echo $row_video['link']; ?>" class="fonte_titulo_not"><?php echo $row_video['link']; ?></a> </td>
                  </tr>

              </table></td>
            </tr>
            <tr>
              <td height="17" align="right" valign="top" bgcolor="#017C9E" class="mais_festa"><a href="videos.php">Mais V&iacute;deos </a></td>
            </tr>
            <tr>
              <td height="17" align="left" valign="top" bgcolor="#017C9E" class="Titulo_Branco">Classifica&ccedil;&atilde;o</td>
            </tr>
            <tr>
              <td height="36" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="4" cellpadding="4">
                <tr>
                  <th align="left" scope="col">Classifique o V&iacute;deo! <br />
                    Nota m&aacute;xima do v&iacute;deo &eacute; de 5 pontos! </th>
                </tr>
                <tr>
                  <th align="left" scope="row"><?php echo rating_bar($row_video['id'],5); ?></th>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="36" align="center" valign="top" bgcolor="#E6F9FD"><table width="100" border="4" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                  <tr>
                    <th scope="col"><img src="imagens/cadastre_video.jpg" alt="video" width="590" height="100" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="413,47,587,90" href="promo_video.php" alt="Clique Aqui!" />
</map></th>
                  </tr>
                </table></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="imagens/rodape.jpg" alt="rodape" width="775" height="40" /></td>
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
mysql_free_result($video);
?>