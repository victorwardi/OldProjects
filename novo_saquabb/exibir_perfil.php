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

$maxRows_mais_perfil = 25;
$pageNum_mais_perfil = 0;
if (isset($_GET['pageNum_mais_perfil'])) {
  $pageNum_mais_perfil = $_GET['pageNum_mais_perfil'];
}
$startRow_mais_perfil = $pageNum_mais_perfil * $maxRows_mais_perfil;

mysql_select_db($database_saquabb, $saquabb);
$query_mais_perfil = "SELECT * FROM perfil WHERE  aprovado = 'y' ORDER BY rand() ";
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
          <table width="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <td align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="0">
                <tr>
                  <td height="22" colspan="2" align="left" valign="middle" bgcolor="#017C9E"><img src="imagens/titulos/atl.jpg" width="128" height="16" /></td>
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
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Data de Nascimento:</span> <span class="fonte_not"><?php echo $row_perfil['data_nasc']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Local de:</span> <span class="fonte_not"><?php echo $row_perfil['local_de']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Tempo de Bodyboard: </span><span class="fonte_not"><?php echo $row_perfil['tempo_de_bb']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_not">Picos Preferidos:</span> <span class="fonte_not"><?php echo $row_perfil['picos_preferidos']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Prancha:</span> <span class="fonte_not"><?php echo $row_perfil['prancha']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">P&eacute;-de-pato:</span> <span class="fonte_not"><?php echo $row_perfil['pe_pato']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Manobra Preferida: </span><span class="fonte_not"><?php echo $row_perfil['manobra']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">&Iacute;dolo:</span> <span class="fonte_not"><?php echo $row_perfil['idolo']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Filme de BB: </span><span class="fonte_not"><?php echo $row_perfil['filme']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Outras Atividades: </span><span class="fonte_not"><?php echo $row_perfil['atividades']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Patrocinio/Apoio:</span> <span class="fonte_not"><?php echo $row_perfil['patrocinio']; ?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" valign="middle"><span class="fonte_titulo_not">Recado para Galera: </span><span class="fonte_not"><?php echo $row_perfil['recado']; ?></span></td>
                      </tr>
                      <tr>
                        <td width="20%" align="left" valign="middle">&nbsp;</td>
                        <td width="80%" align="left" valign="middle">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="left" valign="middle" bgcolor="#017C9E"><span class="mais_festa">+ Atletas </span></td>
                </tr>
                <tr>
				
                  <td height="13" colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><table width="208" border="0" cellspacing="5" cellpadding="0">
                    
                    <tr>
                      <td width="198"><table width="100%" border="0">
                        <tr>
                          <?php
  do { // horizontal looper version 3
?>
                            <td><table width="111%" border="0" cellpadding="2" cellspacing="4">
                                <tr>
                                  <td width="37" align="left" valign="top"><a href="../exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{mais_perfil.foto}", 35, 42, false); ?>" width="35" height="42" class="borda_tabela" /></a></td>
                                  <td width="135" align="left" valign="top"><a href="../exibir_perfil.php?id=<?php echo $row_mais_perfil['id']; ?>"><span class="fonte_titulo_not"><?php echo $row_mais_perfil['nome']; ?></span></a></td>
                                </tr>
                            </table></td>
                            <?php
    $row_mais_perfil = mysql_fetch_assoc($mais_perfil);
    if (!isset($nested_mais_perfil)) {
      $nested_mais_perfil= 1;
    }
    if (isset($row_mais_perfil) && is_array($row_mais_perfil) && $nested_mais_perfil++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_mais_perfil); //end horizontal looper version 3
?>
                        </tr>
                      </table></td>
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