<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$colname_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_noticias = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_noticias = sprintf("SELECT * FROM noticias WHERE id = %s ORDER BY id DESC", $colname_noticias);
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

$maxRows_foto_not = 10;
$pageNum_foto_not = 0;
if (isset($_GET['pageNum_foto_not'])) {
  $pageNum_foto_not = $_GET['pageNum_foto_not'];
}
$startRow_foto_not = $pageNum_foto_not * $maxRows_foto_not;

$colname_foto_not = "-1";
if (isset($_GET['id'])) {
  $colname_foto_not = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_foto_not = sprintf("SELECT * FROM fotos WHERE id = %s ORDER BY id_foto DESC", $colname_foto_not);
$query_limit_foto_not = sprintf("%s LIMIT %d, %d", $query_foto_not, $startRow_foto_not, $maxRows_foto_not);
$foto_not = mysql_query($query_limit_foto_not, $saquabb) or die(mysql_error());
$row_foto_not = mysql_fetch_assoc($foto_not);

if (isset($_GET['totalRows_foto_not'])) {
  $totalRows_foto_not = $_GET['totalRows_foto_not'];
} else {
  $all_foto_not = mysql_query($query_foto_not);
  $totalRows_foto_not = mysql_num_rows($all_foto_not);
}
$totalPages_foto_not = ceil($totalRows_foto_not/$maxRows_foto_not)-1;

$colname_comentarios = "-1";
if (isset($_GET['id'])) {
  $colname_comentarios = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_comentarios = sprintf("SELECT * FROM comentarios_not WHERE id = %s AND aprovado = 'y' ORDER BY id_coment DESC", $colname_comentarios);
$comentarios = mysql_query($query_comentarios, $saquabb) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" href="litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="litbox/js/prototype.js" type="text/javascript"></script>
	<script src="litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="litbox/js/lightbox.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {
	color: #333333;
	font-size: 12px;
}
.style3 {font-size: 12px}
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
<script language="JavaScript" src="java.js"></script>
<body>
<table width="739" height="720" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="53" colspan="2" align="center" valign="top"><a href="carnaporto/index.php"></a><img src="imagens/banner.jpg" width="775" height="120" /></td>
  </tr>
      <tr>
        <td width="198" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td align="center" valign="top"><table width="190" height="389" border="0" cellpadding="0" cellspacing="1">
              <tr>
                <td height="336" align="center" valign="top"><table  width="190" height="336" cellpadding="0" cellspacing="2" class="borda_fundo_noticas">
                    <tr>
                      <td height="330" align="center" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td colspan="2" align="left" class="tiutlo_not"><table class="borda_titulo_menu" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle">Principal</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="index.php">Home</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="arquivo.php">Arquivo de Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="galerias.php">Galerias de Fotos</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="perfil.php">Perfil dos Atletas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="contato.php">Fale Conosco </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_variedades" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">BBLagos</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="bblagos/index.php">Not&iacute;cias</a> </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/circuito.php">O Circuito </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/etapas.php">Etapas 2006 </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/ranking.php">Ranking</a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_girls" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">Saquabb Girls </td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="girls/index.php">Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=girls','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_bblagos" width="100%" border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td align="left" valign="middle" class="tiutlo_not">Variedades</td>
                              </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festas/index.php">Fotos das Festas </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="vemai.php">Vem a&iacute;... </a></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="festa_anuncio.php">Anuncie sua Festa </a></td>
                          </tr>
                          
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="190" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                    <tr>
                      <td align="left" valign="middle" bgcolor="#333333"><img src="imagens/titulos/publicidade.jpg" width="118" height="20" /></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="imagens/publicidade/logorb.jpg" alt="RB Provider" width="170" height="54" border="0" /></a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><a href="http://ww.saquab.com.br"><img src="imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="170" height="64" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td height="58" align="center" valign="middle"><a href="http://www.redsdesign.com.br"><img src="imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="170" height="50" border="0" longdesc="http://www.redsdesign.com.br" /></a></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><br />
                        <a href="http://www.gnunes.net"><img src="imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="170" height="50" border="0" class="borda_tabela" /></a><br />
                      <br /></td>
                    </tr>
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
        <td width="539" height="193" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <td><table width="572" border="0" cellpadding="2" cellspacing="4" class="borda_fundo_destaque">
                <tr>
                  <td width="60%" height="30" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_topo">
                      <tr>
                        <td><img src="imagens/titulos/not.jpg" width="118" height="20" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" class="perfil_nome"><div align="left"> <?php echo $row_noticias['titulo']; ?></div></td>
                </tr>
                <tr>
                  <td height="36" align="center" valign="middle"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                      <tr>
                        <td height="20" align="left"><span class="tiutlo_not">Autor:</span> <?php echo $row_noticias['fonte']; ?></td>
                        <td align="left"><span class="tiutlo_not">Data:</span> <?php echo $row_noticias['data']; ?> </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left"><?php 
// Show If File Exists (region1)
if (tNG_fileExists("uploads/fotos/", "{foto_not.arquivo}")) {
?>
                          <table align="right" width="58" border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td width="54"><?php do { ?>
                                <table align="center" width="200" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                                  <tr>
                                    <td width="41" align="center" valign="top" bgcolor="#FCE285"><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto_not.arquivo}");?>" rel="lightbox" title="<?php echo $row_foto_not['descricao']; ?> <br />
Fot&oacute;grafo: <?php echo $row_foto_not['fotografo']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{foto_not.arquivo}", 200, 0, true); ?>" border="0" class="borda_tabela" /></a></td>
                                  </tr>
                                </table>
                                <br />
                              <?php } while ($row_foto_not = mysql_fetch_assoc($foto_not)); ?></td>
                            </tr>
                          </table>
                            <?php } 
// EndIf File Exists (region1)
?><div align="justify"><?php echo $row_noticias['materia']; ?></div></td>
                      </tr>
                  </table>
                    
                    <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><br />
                          <br />
<table width="100%" height="21" border="0" cellpadding="0" cellspacing="2" bgcolor="#FCE285" class="borda_tabela">
                          <tr>
                            <td height="17" class="perfil_nome style2">Coment&aacute;rios:</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><p>O Saquabb.com.br n&atilde;o publicar&aacute; coment&aacute;rios ofensivos, desrespeitosos  e que venham h&aacute; prejudicar ou insultar quem quer que seja! <br />
Todos os coment&aacute;rios s&atilde;o analisados para depois serem  publicados!<br />
N&atilde;o estamos proibindo que sejam feitas cr&iacute;ticas, apenas que  nosso site n&atilde;o se torne um antro de fofocas!<br />
Desde j&aacute;, agradecemos &agrave; compreens&atilde;o!<strong><br />
<br />
</strong></p>                        </td>
                      </tr>
                      <tr>
                        <td><?php do { ?>
                              <?php 
// Show If Field Has Changed (region2)
if (tNG_fieldHasChanged("region2", $row_comentarios['id_coment'])) {
?>
                                <table width="100%" border="0" cellpadding="4" cellspacing="0" class="borda_tabela">
                                  <tr>
                                    <td align="left" bgcolor="#FCE285" class="comentario"><strong><?php echo $row_comentarios['nome']; ?></strong><strong> - <?php echo $row_comentarios['mail']; ?></strong><strong> - <?php echo $row_comentarios['cidade']; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" bgcolor="#FFFFFF" class="fonte_not"><?php echo $row_comentarios['comentario']; ?></td>
                                  </tr>
                                </table>
                                <?php } 
// EndIf Field Has Changed (region2)
?><br />

                            <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle"><table width="126" height="22" border="0" cellpadding="0" cellspacing="2" bgcolor="#FCE285" class="borda_tabela">
                          <tr>
                            <td width="122" align="center" valign="middle"><a href="javascript:abrir_janela('comentar.php?id=<?php echo $row_noticias['id']; ?>','Saquabb','','420','400','true')" class="perfil_nome style3">Comentar</a></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </td>
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
mysql_free_result($noticias);

mysql_free_result($foto_not);

mysql_free_result($comentarios);
?>