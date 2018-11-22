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
$query_noticias = "SELECT * FROM noticias WHERE coluna = 'bblagos' ORDER BY id DESC";
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

mysql_select_db($database_saquabb, $saquabb);
$query_foto = "SELECT * FROM fotos WHERE galeria = 'bblagos' ORDER BY id DESC";
$foto = mysql_query($query_foto, $saquabb) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);
$totalRows_foto = mysql_num_rows($foto);

$maxRows_amador = 4;
$pageNum_amador = 0;
if (isset($_GET['pageNum_amador'])) {
  $pageNum_amador = $_GET['pageNum_amador'];
}
$startRow_amador = $pageNum_amador * $maxRows_amador;

mysql_select_db($database_saquabb, $saquabb);
$query_amador = "SELECT * FROM ranking WHERE categoria = 'amador' ORDER BY colocacao ASC";
$query_limit_amador = sprintf("%s LIMIT %d, %d", $query_amador, $startRow_amador, $maxRows_amador);
$amador = mysql_query($query_limit_amador, $saquabb) or die(mysql_error());
$row_amador = mysql_fetch_assoc($amador);

if (isset($_GET['totalRows_amador'])) {
  $totalRows_amador = $_GET['totalRows_amador'];
} else {
  $all_amador = mysql_query($query_amador);
  $totalRows_amador = mysql_num_rows($all_amador);
}
$totalPages_amador = ceil($totalRows_amador/$maxRows_amador)-1;

$maxRows_mirim = 4;
$pageNum_mirim = 0;
if (isset($_GET['pageNum_mirim'])) {
  $pageNum_mirim = $_GET['pageNum_mirim'];
}
$startRow_mirim = $pageNum_mirim * $maxRows_mirim;

mysql_select_db($database_saquabb, $saquabb);
$query_mirim = "SELECT * FROM ranking WHERE categoria = 'mirim' ORDER BY colocacao ASC";
$query_limit_mirim = sprintf("%s LIMIT %d, %d", $query_mirim, $startRow_mirim, $maxRows_mirim);
$mirim = mysql_query($query_limit_mirim, $saquabb) or die(mysql_error());
$row_mirim = mysql_fetch_assoc($mirim);

if (isset($_GET['totalRows_mirim'])) {
  $totalRows_mirim = $_GET['totalRows_mirim'];
} else {
  $all_mirim = mysql_query($query_mirim);
  $totalRows_mirim = mysql_num_rows($all_mirim);
}
$totalPages_mirim = ceil($totalRows_mirim/$maxRows_mirim)-1;

$maxRows_iniciante = 4;
$pageNum_iniciante = 0;
if (isset($_GET['pageNum_iniciante'])) {
  $pageNum_iniciante = $_GET['pageNum_iniciante'];
}
$startRow_iniciante = $pageNum_iniciante * $maxRows_iniciante;

mysql_select_db($database_saquabb, $saquabb);
$query_iniciante = "SELECT * FROM ranking WHERE categoria = 'iniciante' ORDER BY colocacao ASC";
$query_limit_iniciante = sprintf("%s LIMIT %d, %d", $query_iniciante, $startRow_iniciante, $maxRows_iniciante);
$iniciante = mysql_query($query_limit_iniciante, $saquabb) or die(mysql_error());
$row_iniciante = mysql_fetch_assoc($iniciante);

if (isset($_GET['totalRows_iniciante'])) {
  $totalRows_iniciante = $_GET['totalRows_iniciante'];
} else {
  $all_iniciante = mysql_query($query_iniciante);
  $totalRows_iniciante = mysql_num_rows($all_iniciante);
}
$totalPages_iniciante = ceil($totalRows_iniciante/$maxRows_iniciante)-1;

$maxRows_feminino = 4;
$pageNum_feminino = 0;
if (isset($_GET['pageNum_feminino'])) {
  $pageNum_feminino = $_GET['pageNum_feminino'];
}
$startRow_feminino = $pageNum_feminino * $maxRows_feminino;

mysql_select_db($database_saquabb, $saquabb);
$query_feminino = "SELECT * FROM ranking WHERE categoria = 'feminino' ORDER BY colocacao ASC";
$query_limit_feminino = sprintf("%s LIMIT %d, %d", $query_feminino, $startRow_feminino, $maxRows_feminino);
$feminino = mysql_query($query_limit_feminino, $saquabb) or die(mysql_error());
$row_feminino = mysql_fetch_assoc($feminino);

if (isset($_GET['totalRows_feminino'])) {
  $totalRows_feminino = $_GET['totalRows_feminino'];
} else {
  $all_feminino = mysql_query($query_feminino);
  $totalRows_feminino = mysql_num_rows($all_feminino);
}
$totalPages_feminino = ceil($totalRows_feminino/$maxRows_feminino)-1;
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
                            <td align="left" valign="middle"> <a href="index.php">Not&iacute;cias</a> </td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="circuito.php">O Circuito </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')">Galeria de Fotos </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="etapas.php">Etapas 2006 </a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="ranking.php">Ranking</a></td>
                          </tr>
                          <tr>
                            <td><img src="../imagens/titulos/marcador.jpg" width="8" height="10" /></td>
                            <td align="left" valign="middle"><a href="info.php">Informa&ccedil;&otilde;es</a></td>
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
                            <td align="left" valign="middle"><a href="../girls/index.php">Not&iacute;cias </a></td>
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
              <td align="left" valign="top"><table width="568" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bb_lagos_fundo_esquerdo">
                    <tr>
                      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td colspan="3" align="left" valign="top"><table width="100%" height="200" border="0" cellpadding="0" cellspacing="0" class="bb_lagos_fundo_topo">
                                <tr>
                                  <td width="45%">&nbsp;</td>
                                  <td width="55%" align="center" valign="middle"><table width="100" border="0" cellspacing="4" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="top"><table width="100" border="1" cellpadding="0" cellspacing="3" bordercolor="#000000" bgcolor="#FFFFFF">
                                            <tr>
                                              <td><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}", 250, 0, true); ?>" border="0" /></a></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle" class="tiutlo_not"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_colunas"><?php echo substr($row_noticias['titulo'] ,0,40)."..."; ?></a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
							<?php $row_noticias = mysql_fetch_assoc($noticias);?>
                            <tr>
                              <td colspan="3" align="left" valign="top"><table border="0">
                                <tr>
                                  <?php
  do { // horizontal looper version 3
?>
                                    <td><table width="100" border="0" cellspacing="2" cellpadding="0">
                                        <tr>
                                          <td height="72" align="center" valign="top"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{noticias.imagem}", 100, 75, false); ?>" border="0" class="borda_foto_noticia" /></a></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="center" valign="top"><span class="fonte_not"><a href="../exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_colunas_mini"><?php echo substr($row_noticias['titulo'] ,0,25)."..."; ?></a></span></td>
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
                              <td width="56%" align="center" valign="top"><table width="302" border="0" cellpadding="0" cellspacing="0" class="borda_foto_noticia">
                                <tr>
                                  <td width="300" height="17" align="left" valign="top"><img src="../recados/topo2.jpg" alt="solte o verbo!" width="300" height="30" /></td>
                                </tr>
                                <tr>
                                  <td height="68" align="center" valign="middle"><iframe src="../recados/comentario.php" name="coments" width="300" height="290" frameborder="no" id="coments"></iframe></td>
                                </tr>
                                <tr>
                                  <td height="17" align="right" valign="middle" bgcolor="#272B12"><a href="javascript:abrir_janela('../recados/add.php','Saquabb','','350','420','true')"><img src="../recados/escrever.jpg" alt="escrever" width="60" height="18" border="0" /></a></td>
                                </tr>
                              </table></td>
                              <td width="44%" colspan="2" align="left" valign="top"><table width="240" height="120" border="0" cellpadding="6" cellspacing="0" background="imagens/galeria.jpg" class="borda_foto_noticia">
                                
                                <tr>
                                  <td height="84" align="left" valign="bottom"><table width="44" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                                      <tr>
                                        <td width="36"><a href="javascript:abrir_janela('../album/index.php?galeria=bblagos','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{foto.arquivo}", 100, 0, true); ?>" border="0" /></a></td>
                                      </tr>
                                    </table>                                  </td>
                                </tr>
                              </table>
                              <br />
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td class="tiutlo_not">Pr&oacute;xima Etapa! </td>
                                </tr>
                                <tr>
                                  <td height="206"><img src="../imagens/cartaz.jpg" width="240" height="180" /><br /></td>
                                </tr>
                              </table></td>
                            </tr>
                            
                            <tr>
                              <td colspan="3" align="center" valign="top"><table width="90%" border="0" cellspacing="4" cellpadding="0">
                                <tr>
                                  <td colspan="2" align="left" valign="middle" class="arquivo_titulo">Ranking BBlagos 2006 </td>
                                </tr>
                                <tr>
                                  <td width="39%"><table width="200" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="157" align="left" valign="top">Amador</td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top"><?php do { ?>
                                          <table width="200" border="0" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td align="left" valign="middle"><span class="tiutlo_not"><?php echo $row_amador['colocacao']; ?></span> <span class="fonte_not">- <?php echo $row_amador['nome']; ?> - <?php echo $row_amador['pontos']; ?></span></td>
                                            </tr>
                                          </table>
                                        <?php } while ($row_amador = mysql_fetch_assoc($amador)); ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                  <td width="61%" align="left" valign="top"><table width="239" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="239" align="left" valign="top">Mirim</td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top"><?php do { ?>
                                          <table width="239" border="0" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td align="left" valign="middle"><span class="tiutlo_not"><?php echo $row_mirim['colocacao']; ?></span> <span class="fonte_not">- <?php echo $row_mirim['nome']; ?> - <?php echo $row_mirim['pontos']; ?></span></td>
                                            </tr>
                                          </table>
                                        <?php } while ($row_mirim = mysql_fetch_assoc($mirim)); ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top"><table width="20" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                    <tr>
                                      <td width="262" align="left" valign="top">Iniciante</td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top"><?php do { ?>
                                          <table width="200" border="0" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td align="left" valign="middle"><span class="tiutlo_not"><?php echo $row_iniciante['colocacao']; ?></span> <span class="fonte_not">- <?php echo $row_iniciante['nome']; ?> - <?php echo $row_iniciante['pontos']; ?></span></td>
                                            </tr>
                                          </table>
                                        <?php } while ($row_iniciante = mysql_fetch_assoc($iniciante)); ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                  <td align="left" valign="top"><table width="240" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="240" align="left" valign="top">Feminino</td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top"><?php do { ?>
                                          <table width="241" border="0" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td width="237" align="left" valign="middle"><span class="tiutlo_not"><?php echo $row_feminino['colocacao']; ?></span> <span class="fonte_not">- <?php echo $row_feminino['nome']; ?> - <?php echo $row_feminino['pontos']; ?></span></td>
                                            </tr>
                                          </table>
                                        <?php } while ($row_feminino = mysql_fetch_assoc($feminino)); ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="top">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
                              <td colspan="2" align="left" valign="top">&nbsp;</td>
                            </tr>
                          </table>                      </td>
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

mysql_free_result($foto);

mysql_free_result($amador);

mysql_free_result($mirim);

mysql_free_result($iniciante);

mysql_free_result($feminino);
?>