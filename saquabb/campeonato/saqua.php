<?php require_once('../Connections/saquabb.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_result = 5;
$pageNum_result = 0;
if (isset($_GET['pageNum_result'])) {
  $pageNum_result = $_GET['pageNum_result'];
}
$startRow_result = $pageNum_result * $maxRows_result;

mysql_select_db($database_saquabb, $saquabb);
$query_result = "SELECT * FROM bblagos_saqua ORDER BY id DESC";
$query_limit_result = sprintf("%s LIMIT %d, %d", $query_result, $startRow_result, $maxRows_result);
$result = mysql_query($query_limit_result, $saquabb) or die(mysql_error());
$row_result = mysql_fetch_assoc($result);

if (isset($_GET['totalRows_result'])) {
  $totalRows_result = $_GET['totalRows_result'];
} else {
  $all_result = mysql_query($query_result);
  $totalRows_result = mysql_num_rows($all_result);
}
$totalPages_result = ceil($totalRows_result/$maxRows_result)-1;

$queryString_result = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_result") == false && 
        stristr($param, "totalRows_result") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_result = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_result = sprintf("&totalRows_result=%d%s", $totalRows_result, $queryString_result);
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
.style1 {font-size: 16px}
.borda_azul {
	border: 1px solid #0066CC;
}
.style2 {
	font-size: 14px;
	color: #FFFFFF;
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
          <table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td height="572" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <td height="79" align="center" valign="top" class="tiutlo_not style1"><p class="tiutlo_not"><img src="etapa/saqua/topo.jpg" alt="Etapa_saquarema_topo" width="560" height="98" /><br />
                      <br /> 
                      <img src="inetnet_2.jpg" alt="intnet" width="300" height="80" class="borda_tabela" /></p>
                    <p class="tiutlo_not">Resultados Atualizados ao final de cada bateria!<br />
                      <br />
                                      </p></td>
                </tr>
                <tr>
                  <td height="80" align="center" valign="top" class="tiutlo_not style1"><?php do { ?>
                    <table width="534" class="borda_azul" border="0" cellpadding="2" cellspacing="4">
                      <tr>
                        <td height="21" colspan="4" align="center" valign="middle" bgcolor="#0066CC" class="tiutlo_not style2"><?php echo $row_result['round']; ?></td>
                      </tr>
                      <tr>
                        <td width="80" height="24" align="center" class="tiutlo_not">Lycra</td>
                        <td width="141" align="left" valign="middle" class="tiutlo_not">Nome</td>
                        <td width="113" align="center" valign="middle" class="tiutlo_not">Nota(Somat&oacute;rio)</td>
                        <td width="180" align="center" valign="middle" class="tiutlo_not">Coloca&ccedil;&atilde;o</td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" class="tiutlo_not"><img src="camisas/preta.jpg" alt="preta" width="30" height="30" /></td>
                        <td align="left" valign="middle" class="tiutlo_not"><?php echo $row_result['comp1']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['nota1']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['colocacao1']; ?></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" class="tiutlo_not"><img src="camisas/vermelha.jpg" alt="vermelha" width="30" height="30" /></td>
                        <td align="left" valign="middle" class="tiutlo_not"><?php echo $row_result['comp2']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['nota2']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['colocacao2']; ?></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" class="tiutlo_not"><img src="camisas/azul.jpg" alt="azul" width="30" height="30" /></td>
                        <td align="left" valign="middle" class="tiutlo_not"><?php echo $row_result['comp3']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['nota3']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['colocacao3']; ?></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" class="tiutlo_not"><img src="camisas/amarela.jpg" alt="amarela" width="30" height="30" /></td>
                        <td align="left" valign="middle" class="tiutlo_not"><?php echo $row_result['comp4']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['nota4']; ?></td>
                        <td align="center" valign="middle" class="tiutlo_not"><?php echo $row_result['colocacao4']; ?></td>
                      </tr>
                                            </table>
											<br />

                      <?php } while ($row_result = mysql_fetch_assoc($result)); ?></td>
                </tr>
                <tr>
                  <td height="32" align="center" valign="top" class="tiutlo_not style1"><table border="0" width="50%" align="center">
                    <tr>
                        <td width="31%" align="center" valign="middle"><?php if ($pageNum_result > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_result=%d%s", $currentPage, max(0, $pageNum_result - 1), $queryString_result); ?>" class="tiutlo_not">Voltar</a>
                            <?php } // Show if not first page ?>                        </td>
                        <td width="23%" align="center" valign="middle" class="tiutlo_not"><?php if ($pageNum_result < $totalPages_result) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_result=%d%s", $currentPage, min($totalPages_result, $pageNum_result + 1), $queryString_result); ?>">Mais Resultados </a>
                            <?php } // Show if not last page ?>                        </td>
                    </tr>
                    </table></td>
                </tr>
                
                <tr>
                  <td align="center" valign="top"><img src="etapa/saqua/base.jpg" alt="bae" width="560" height="98" /><br />
                  <br /></td>
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
mysql_free_result($result);
?>