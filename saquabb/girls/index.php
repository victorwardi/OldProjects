<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$maxRows_noticias = 5;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias WHERE coluna = 'girls' ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

$maxRows_galeria = 2;
$pageNum_galeria = 0;
if (isset($_GET['pageNum_galeria'])) {
  $pageNum_galeria = $_GET['pageNum_galeria'];
}
$startRow_galeria = $pageNum_galeria * $maxRows_galeria;

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM fotos WHERE galeria = 'girls' ORDER BY id_foto DESC";
$query_limit_galeria = sprintf("%s LIMIT %d, %d", $query_galeria, $startRow_galeria, $maxRows_galeria);
$galeria = mysql_query($query_limit_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);

if (isset($_GET['totalRows_galeria'])) {
  $totalRows_galeria = $_GET['totalRows_galeria'];
} else {
  $all_galeria = mysql_query($query_galeria);
  $totalRows_galeria = mysql_num_rows($all_galeria);
}
$totalPages_galeria = ceil($totalRows_galeria/$maxRows_galeria)-1;
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
<table width="739" height="720" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="53" colspan="2" align="center" valign="top"><a href="../carnaporto/index.php"></a><img src="../imagens/banner.jpg" width="775" height="120" /></td>
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
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../index.php">Home</a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="../arquivo.php">Arquivo de Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../galerias.php">Galerias de Fotos</a> </td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')">Gatinhas</a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../perfil.php">Perfil dos Atletas </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')">Cadastrar Perfil </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../contato.php">Fale Conosco </a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_variedades" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">BBLagos</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"> <a href="../bblagos/index.php">Not&iacute;cias</a> </td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../bblagos/circuito.php">O Circuito </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../bblagos/etapas.php">Etapas 2006 </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../bblagos/ranking.php">Ranking</a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../bblagos/info.php">Informa&ccedil;&otilde;es</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table class="borda_titulo_girls" width="100%" border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                  <td align="left" valign="middle" class="tiutlo_not">Saquabb Girls </td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="index.php">Not&iacute;cias </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
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
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../festas/index.php">Fotos das Festas </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../vemai.php">Vem a&iacute;... </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="../festa_anuncio.php">Anuncie sua Festa </a></td>
                          </tr>
                          
                      </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="190" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                    <tr>
                      <td align="left" valign="middle" bgcolor="#333333"><img src="../imagens/titulos/publicidade.jpg" width="118" height="20" /></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle"><a href="http://ww.rbprovider.com"><img src="../imagens/publicidade/logorb.jpg" alt="RB Provider" width="170" height="54" border="0" /></a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><a href="http://ww.saquab.com.br"><img src="../imagens/publicidade/saqua.jpg" alt="Saqua.com.br" width="170" height="64" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td height="58" align="center" valign="middle"><a href="http://www.redsdesign.com.br"><img src="../imagens/publicidade/banner_reds.gif" alt="Reds Design!" width="170" height="50" border="0" longdesc="http://www.redsdesign.com.br" /></a></td>
                    </tr>
                    <tr>
                      <td height="13" align="center" valign="middle"><br />
                        <a href="http://www.gnunes.net"><img src="../imagens/publicidade/gnunes.jpg" alt="Gnunes!" width="170" height="50" border="0" class="borda_tabela" /></a><br />
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
              <td><table width="570" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="girls_fundo_tabela">
                    <tr>
                      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="2" align="right" valign="top"><table width="100%" height="189" border="0" cellpadding="0" cellspacing="0" class="girl_fund0_topo">
                              <tr>
                                <td width="40%" height="189">&nbsp;</td>
                                <td width="60%" align="left" valign="middle"><table width="260" border="0" cellspacing="2" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="middle"><br />
                                          <table width="10" border="1" cellpadding="0" cellspacing="3" bordercolor="#000000" bgcolor="#FFFFFF">
                                            <tr>
                                              <td><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}", 250, 0, true); ?>" border="0" /></a></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="middle" class="fonte_colunas"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><?php echo substr($row_noticias['titulo'] ,0,40)."..."; ?></a></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
						<?php $row_noticias = mysql_fetch_assoc($noticias);?>
                        <tr>
                          <td colspan="2" align="left" valign="top"><table border="0" cellspacing="2">
                            <tr>
                              <?php
  do { // horizontal looper version 3
?>
                                <td><table width="120" border="0" cellpadding="0" cellspacing="4">
                                        <tr>
                                          <td align="center" valign="top"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}",100,75, false); ?>" border="0" class="borda_tabela" /></a></td>
                                        </tr>
                                  <tr>
                                          <td width="28%" height="40" align="center" valign="top" class="fonte_colunas_mini"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><?php echo substr($row_noticias['titulo'] ,0,25)."..."; ?></a></td>
                                        </tr>
                                                                                        </table></td>
                                <?php
    $row_noticias = mysql_fetch_assoc($noticias);
    if (!isset($nested_noticias)) {
      $nested_noticias= 1;
    }
    if (isset($row_noticias) && is_array($row_noticias) && $nested_noticias++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_noticias); //end horizontal looper version 3
?>
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td align="center" valign="top"><table width="100" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                            <tr>
                              <td align="center" valign="middle"><img src="imagens/galeria.jpg" width="360" height="28" /></td>
                            </tr>
                            <tr>
                              <td height="125" align="center" valign="middle"><table border="0">
                                <tr>
                                  <?php
  do { // horizontal looper version 3
?>
                                    <td><table width="10" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                        <tr>
                                          <td><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{galeria.arquivo}", 160, 120, false); ?>" /></td>
                                        </tr>
                                    </table></td>
                                    <?php
    $row_galeria = mysql_fetch_assoc($galeria);
    if (!isset($nested_galeria)) {
      $nested_galeria= 1;
    }
    if (isset($row_galeria) && is_array($row_galeria) && $nested_galeria++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_galeria); //end horizontal looper version 3
?>
                                </tr>
                              </table>
</td>
                            </tr>
                            <tr>
                              <td height="13" align="center" valign="middle" bgcolor="#F5197B">&nbsp;</td>
                            </tr>
                          </table></td>
                          <td align="center" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="78%" align="center" valign="middle">&nbsp;</td>
                          <td width="22%" align="center" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td align="center" valign="middle">&nbsp;</td>
                        </tr>
                      </table>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p></td>
                    </tr>
                  </table></td>
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
mysql_free_result($noticias);

mysql_free_result($galeria);
?>