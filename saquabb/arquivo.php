<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_arquivo = 6;
$pageNum_arquivo = 0;
if (isset($_GET['pageNum_arquivo'])) {
  $pageNum_arquivo = $_GET['pageNum_arquivo'];
}
$startRow_arquivo = $pageNum_arquivo * $maxRows_arquivo;

mysql_select_db($database_saquabb, $saquabb);
$query_arquivo = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_arquivo = sprintf("%s LIMIT %d, %d", $query_arquivo, $startRow_arquivo, $maxRows_arquivo);
$arquivo = mysql_query($query_limit_arquivo, $saquabb) or die(mysql_error());
$row_arquivo = mysql_fetch_assoc($arquivo);

if (isset($_GET['totalRows_arquivo'])) {
  $totalRows_arquivo = $_GET['totalRows_arquivo'];
} else {
  $all_arquivo = mysql_query($query_arquivo);
  $totalRows_arquivo = mysql_num_rows($all_arquivo);
}
$totalPages_arquivo = ceil($totalRows_arquivo/$maxRows_arquivo)-1;

$queryString_arquivo = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_arquivo") == false && 
        stristr($param, "totalRows_arquivo") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_arquivo = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_arquivo = sprintf("&totalRows_arquivo=%d%s", $totalRows_arquivo, $queryString_arquivo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____________Saquabb.com.br_____________________________________________</title>
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
              <td><table width="570" border="0" cellpadding="0" cellspacing="4" class="borda_tabela">
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_topo">
                    <tr>
                      <td align="left" valign="middle"><img src="imagens/titulos/arquivo_not.jpg" alt="arquivo de noticias" width="128" height="20" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><?php do { ?>
                    <table width="100%" border="0" cellpadding="4">
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#E1F7F3">
                            <tr>
                              <td width="8%" rowspan="2" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{arquivo.imagem}", 100, 75, false); ?>" class="borda_tabela" /></a></td>
                              <td width="92%" height="14" align="left" valign="top" class="arquivo_titulo"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><?php echo $row_arquivo['titulo']; ?></a></td>
                            </tr>
                            <tr>
                              <td height="26" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><?php echo substr($row_arquivo['materia'] ,0,100)."..."; ?><br />
                                <?php echo $row_arquivo['data']; ?></a></td>
                            </tr>
                          </table></td><?php $row_arquivo = mysql_fetch_assoc($arquivo);?>
                      </tr>
                      <tr>
                        <td height="62"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                            <tr>
                              <td align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><span class="arquivo_titulo"><?php echo $row_arquivo['titulo']; ?></span></a></td>
                              <td rowspan="2" align="right" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{arquivo.imagem}", 100, 75, false); ?>" class="borda_tabela" /></a></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_arquivo['id']; ?>"><?php echo substr($row_arquivo['materia'] ,0,100)."..."; ?><br />
                                <?php echo $row_arquivo['data']; ?></a></td>
                            </tr>
                                                  </table></td>
                      </tr>
                                            </table>
                      <?php } while ($row_arquivo = mysql_fetch_assoc($arquivo)); ?>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                          <td align="center" valign="middle"><table border="0" width="50%" align="center">
                              <tr>
                                <td width="23%" align="center"><?php if ($pageNum_arquivo > 0) { // Show if not first page ?>
                                      <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, 0, $queryString_arquivo); ?>" class="fonte_not">Primeira</a>
                                      <?php } // Show if not first page ?>                                </td>
                                <td width="31%" align="center"><?php if ($pageNum_arquivo > 0) { // Show if not first page ?>
                                      <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, max(0, $pageNum_arquivo - 1), $queryString_arquivo); ?>" class="fonte_not">Anterior</a>
                                      <?php } // Show if not first page ?>                                </td>
                                <td width="23%" align="center"><?php if ($pageNum_arquivo < $totalPages_arquivo) { // Show if not last page ?>
                                      <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, min($totalPages_arquivo, $pageNum_arquivo + 1), $queryString_arquivo); ?>" class="fonte_not">Pr&oacute;xima</a>
                                      <?php } // Show if not last page ?>                                </td>
                                <td width="23%" align="center"><?php if ($pageNum_arquivo < $totalPages_arquivo) { // Show if not last page ?>
                                      <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, $totalPages_arquivo, $queryString_arquivo); ?>" class="fonte_not">&Uacute;ltima</a>
                                      <?php } // Show if not last page ?>                                </td>
                              </tr>
                            </table></td>
                        </tr>
                      </table></td>
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
mysql_free_result($arquivo);
?>