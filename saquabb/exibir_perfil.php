<?php require_once('Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$colname_perfil = "-1";
if (isset($_GET['id'])) {
  $colname_perfil = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_perfil = sprintf("SELECT * FROM perfil WHERE id = %s AND aprovado = 'y' ORDER BY id DESC", $colname_perfil);
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

$maxRows_mais_perfil = 20;
$pageNum_mais_perfil = 0;
if (isset($_GET['pageNum_mais_perfil'])) {
  $pageNum_mais_perfil = $_GET['pageNum_mais_perfil'];
}
$startRow_mais_perfil = $pageNum_mais_perfil * $maxRows_mais_perfil;

mysql_select_db($database_saquabb, $saquabb);
$query_mais_perfil = "SELECT * FROM perfil ORDER BY rand()";
$query_limit_mais_perfil = sprintf("%s LIMIT %d, %d", $query_mais_perfil, $startRow_mais_perfil, $maxRows_mais_perfil);
$mais_perfil = mysql_query($query_limit_mais_perfil, $saquabb) or die(mysql_error());
$row_mais_perfil = mysql_fetch_assoc($mais_perfil);

if (isset($_GET['totalRows_mais_perfil'])) {
  $totalRows_mais_perfil = $_GET['totalRows_mais_perfil'];
} else {
  $all_mais_perfil = mysql_query($query_mais_perfil);
  $totalRows_mais_perfil = mysql_num_rows($all_mais_perfil);
}
$totalPages_mais_perfil = ceil($totalRows_mais_perfil/$maxRows_mais_perfil)-1;

$queryString_perfil = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_perfil") == false && 
        stristr($param, "totalRows_perfil") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_perfil = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_perfil = sprintf("&totalRows_perfil=%d%s", $totalRows_perfil, $queryString_perfil);
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
<style type="text/css">
<!--
.style1 {color: #999999}
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
              <td><table width="100%" border="0" cellpadding="0" cellspacing="1" class="borda_fundo_destaque">
                <tr>
                  <td height="26" colspan="2" align="left" valign="middle"><img src="imagens/titulos/atl.jpg" width="118" height="20" /></td>
                </tr>
                <tr>
                  <td width="38%" align="center" valign="top"><table width="34%" height="40" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                      <tr>
                        <td align="center" valign="middle"><img src="<?php echo tNG_showDynamicImage("", "perfil/fotos/", "{perfil.foto}");?>" class="perfil_borda_foto" /></td>
                      </tr>
                  </table></td>
                  <td width="62%" align="left" valign="top"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td height="19" colspan="2" align="left" valign="top" class="perfil_nome"><?php echo $row_perfil['nome']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Data de Nascimento:</span> <?php echo $row_perfil['data_nasc']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Local de:</span> <?php echo $row_perfil['local_de']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Tempo de Bodyboard: </span><?php echo $row_perfil['tempo_de_bb']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Picos Preferidos:</span> <?php echo $row_perfil['picos_preferidos']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Prancha:</span> <?php echo $row_perfil['prancha']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">P&eacute;-de-pato:</span> <?php echo $row_perfil['pe_pato']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Manobra Preferida: </span><?php echo $row_perfil['manobra']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">&Iacute;dolo:</span> <?php echo $row_perfil['idolo']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Filme de BB: </span><?php echo $row_perfil['filme']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Outras Atividades: </span><?php echo $row_perfil['atividades']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Patrocinio/Apoio:</span> <?php echo $row_perfil['patrocinio']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="tiutlo_not">Recado para Galera: </span><?php echo $row_perfil['recado']; ?></td>
                      </tr>
                      <tr>
                        <td width="20%" align="left" valign="middle">&nbsp;</td>
                        <td width="80%" align="left" valign="middle">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="13" colspan="2" align="left" valign="top"><span class="style1">_________________________________________________________________________________</span></td>
                </tr>
                <tr>
				
                  <td height="13" colspan="2" align="left" valign="top"><table width="300" border="0" cellspacing="10" cellpadding="0">
                    <tr>
                      <td class="perfil_nome">+ Atletas </td>
                    </tr>
                    <tr>
                      <td><table width="284" border="0">
                        <tr>
                          <?php
  do { // horizontal looper version 3
?>
                            <td width="278"><table width="100%" border="0" cellspacing="4" cellpadding="2">
                                <tr>
                                  <td width="60" align="center" valign="middle"><a href="../exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{mais_perfil.foto}", 35, 42, false); ?>" class="borda_tabela" /></a></td>
                                  <td width="180" align="left" valign="middle"><a href="../exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><span class="tiutlo_not"><?php echo $row_mais_perfil['nome']; ?></span></a></td>
                                </tr>
                            </table></td>
                            <?php
    $row_mais_perfil = mysql_fetch_assoc($mais_perfil);
    if (!isset($nested_mais_perfil)) {
      $nested_mais_perfil= 1;
    }
    if (isset($row_mais_perfil) && is_array($row_mais_perfil) && $nested_mais_perfil++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_mais_perfil); //end horizontal looper version 3
?>
                        </tr>
                      </table>
</td>
                    </tr>
                  </table></td>
                </tr>
                
              </table>
              <p><img src="imagens/cadastre-se2.jpg" alt="Cadastre-se" width="570" height="100" border="0" usemap="#Map" class="borda_foto_noticia" />
                <map name="Map" id="Map">
                  <area shape="rect" coords="439,56,567,102" href="javascript:abrir_janela('perfil/cadastrar.php','Cadastre','scrollbars=1','570','562','true')" alt="Clique Aqui" />
                </map>
              </p></td>
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
mysql_free_result($perfil);

mysql_free_result($mais_perfil);
?>