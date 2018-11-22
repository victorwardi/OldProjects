<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$colname_comentarios = "-1";
if (isset($_GET['id'])) {
  $colname_comentarios = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_comentarios = sprintf("SELECT * FROM comentarios_ovni WHERE id = %s AND aprovado = 'y' ORDER BY id_coment DESC", $colname_comentarios);
$comentarios = mysql_query($query_comentarios, $saquabb) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

$colname_ovni = "-1";
if (isset($_GET['id'])) {
  $colname_ovni = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_ovni = sprintf("SELECT * FROM ovni WHERE id = %s ORDER BY id DESC", $colname_ovni);
$ovni = mysql_query($query_ovni, $saquabb) or die(mysql_error());
$row_ovni = mysql_fetch_assoc($ovni);
$totalRows_ovni = mysql_num_rows($ovni);
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
<link rel="stylesheet" href="../litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../litbox/js/lightbox.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {
	color: #000000;
	font-size: 14px;
}
.style3 {
	font-size: 14px;
	font-weight: bolder;
	color: #333333;
}
-->
</style><!-- InstanceEndEditable -->
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
            <td align="left" valign="middle" class="fonte_not"><a href="ovni.php">Not&iacute;cias </a></td>
          </tr>
          <tr>
            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
            <td align="left" valign="middle" class="fonte_not"><a href="galeria.php">Galeria de Fotos </a></td>
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
          <table width="617" border="0" cellpadding="4" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <td width="60%" height="17" align="left" bgcolor="#FFFFFF" class="Titulo_Branco"><span class="perfil_nome"><img src="capa.jpg" alt="ovni _ Qu&eacute; se eu?" width="602" height="200" /></span></td>
            </tr>
            
            <tr>
              <td align="center" valign="middle" class="perfil_nome"><div align="center" class="style3">
                <div align="left"><?php echo $row_ovni['titulo']; ?></div>
              </div></td>
            </tr>
            <tr>
              <td height="36" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                  <tr>
                    <td height="20" align="left" class="style2"><?php echo $row_ovni['data']; ?> </td>
                  </tr>
                  <tr>
                    <td height="108" align="left" bgcolor="#FFFFFF"><table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td width="54"><table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                          <tr>
                            <td width="41" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../uploads/fotos/", "{ovni.foto1}");?>" rel="lightbox" title="<?php echo $row_ovni['desc1']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_ovni['fotografo1']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{ovni.foto1}", 200, 0, true); ?>" border="0" /></a></td>
                          </tr>
                        </table>
                          <br />
                          <?php 
// Show If File Exists (region3)
if (tNG_fileExists("../uploads/fotos/", "{ovni.foto2}")) {
?>
                            <table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td width="41" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../uploads/fotos/", "{ovni.foto2}");?>" rel="lightbox" title="<?php echo $row_ovni['desc2']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_ovni['fotografo2']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{ovni.foto2}", 200, 0, true); ?>" border="0" /></a></td>
                              </tr>
                            </table>
                            <?php } 
// EndIf File Exists (region3)
?>
                          <?php 
// Show If File Exists (region2)
if (tNG_fileExists("../uploads/fotos/", "{ovni.foto3}")) {
?>
                            <br />
                            <table align="center" width="201" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                              <tr>
                                <td width="191" align="center" valign="top" bgcolor="#017C9E"><a href="<?php echo tNG_showDynamicImage("", "../uploads/fotos/", "{ovni.foto3}");?>" rel="lightbox" title="<?php echo $row_ovni['desc3']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_ovni['fotografo3']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{ovni.foto3}", 200, 0, true); ?>" border="0" /></a></td>
                              </tr>
                            </table>
                            <?php } 
// EndIf File Exists (region2)
?></td>
                      </tr>
                    </table>
                    <div align="justify"><?php echo $row_ovni['materia']; ?></div></td>
                  </tr>
                </table>                </td>
            </tr>
            <tr>
              <td height="17" align="left" valign="top" bgcolor="#017C9E" class="mais_festa">Para conferir todos os artigos desta coluna <a href="arquivo.php">clique aqui!</a> </td>
            </tr>
            <tr>
              <td height="17" align="left" valign="top" bgcolor="#017C9E"><span class="Titulo_Branco">Coment&aacute;rios</span></td>
            </tr>
            <tr>
              <td height="236" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                
                <tr>
                  <td align="left" valign="top"><p>O Saquabb.com.br n&atilde;o publicar&aacute; coment&aacute;rios ofensivos, desrespeitosos  e que venham h&aacute; prejudicar ou insultar quem quer que seja! <br />
                    Todos os coment&aacute;rios s&atilde;o analisados para depois serem  publicados!<br />
                    N&atilde;o estamos proibindo que sejam feitas cr&iacute;ticas, apenas que  nosso site n&atilde;o se torne um antro de fofocas!<br />
                    Desde j&aacute;, agradecemos &agrave; compreens&atilde;o!<strong><br />
                      <br />
                    </strong></p></td>
                </tr>
                <tr>
                  <td><?php do { ?>
                      <?php 
// Show If Field Has Changed (region2)
if (tNG_fieldHasChanged("region2", $row_comentarios['id_coment'])) {
?>
                          <?php if ($totalRows_comentarios > 0) { // Show if recordset not empty ?>
                            <table width="100%" border="0" cellpadding="4" cellspacing="0">
                              <tr>
                                <td align="left" bgcolor="#017C9E" class="mais_festa"><strong><?php echo $row_comentarios['nome']; ?> - <?php echo $row_comentarios['mail']; ?> - <?php echo $row_comentarios['cidade']; ?></strong></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" bgcolor="#FFFFFF" class="fonte_not"><?php echo $row_comentarios['comentario']; ?></td>
                              </tr>
                            </table>
                            <?php } // Show if recordset not empty ?>
                          <?php } 
// EndIf Field Has Changed (region2)
?>
                      <br />
                      <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="126" height="22" border="0" cellpadding="0" cellspacing="2" bgcolor="#298CAC" class="borda_tabela">
                      <tr>
                        <td width="122" align="center" valign="middle" bgcolor="#298CAC"><a href="javascript:abrir_janela('comentar.php?id=<?php echo $row_ovni['id']; ?>','Saquabb','','420','400','true')" class="mais_festa">Comentar</a></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="21" align="center" valign="top" bgcolor="#298CAC"><span class="mais_festa">Os pontos de vista expressos nesta coluna, ou coment&aacute;rios, s&atilde;o de responsabilidade exclusiva de seus autores e n&atilde;o representam a opini&atilde;o do Site. </span></td>
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
mysql_free_result($ovni);

mysql_free_result($comentarios);

mysql_free_result($ovni);
?>