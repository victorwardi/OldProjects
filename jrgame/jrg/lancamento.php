<?php require_once('Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_victor, $victor);
$query_RS_genero = "SELECT * FROM genero ORDER BY tipo ASC";
$RS_genero = mysql_query($query_RS_genero, $victor) or die(mysql_error());
$row_RS_genero = mysql_fetch_assoc($RS_genero);
$totalRows_RS_genero = mysql_num_rows($RS_genero);

$maxRows_notica = 4;
$pageNum_notica = 0;
if (isset($_GET['pageNum_notica'])) {
  $pageNum_notica = $_GET['pageNum_notica'];
}
$startRow_notica = $pageNum_notica * $maxRows_notica;

mysql_select_db($database_victor, $victor);
$query_notica = "SELECT * FROM noticia ORDER BY id DESC";
$query_limit_notica = sprintf("%s LIMIT %d, %d", $query_notica, $startRow_notica, $maxRows_notica);
$notica = mysql_query($query_limit_notica, $victor) or die(mysql_error());
$row_notica = mysql_fetch_assoc($notica);

if (isset($_GET['totalRows_notica'])) {
  $totalRows_notica = $_GET['totalRows_notica'];
} else {
  $all_notica = mysql_query($query_notica);
  $totalRows_notica = mysql_num_rows($all_notica);
}
$totalPages_notica = ceil($totalRows_notica/$maxRows_notica)-1;

$maxRows_filme = 8;
$pageNum_filme = 0;
if (isset($_GET['pageNum_filme'])) {
  $pageNum_filme = $_GET['pageNum_filme'];
}
$startRow_filme = $pageNum_filme * $maxRows_filme;

mysql_select_db($database_victor, $victor);
$query_filme = "SELECT * FROM filme WHERE lancamento = 'Y' ORDER BY id DESC";
$query_limit_filme = sprintf("%s LIMIT %d, %d", $query_filme, $startRow_filme, $maxRows_filme);
$filme = mysql_query($query_limit_filme, $victor) or die(mysql_error());
$row_filme = mysql_fetch_assoc($filme);

if (isset($_GET['totalRows_filme'])) {
  $totalRows_filme = $_GET['totalRows_filme'];
} else {
  $all_filme = mysql_query($query_filme);
  $totalRows_filme = mysql_num_rows($all_filme);
}
$totalPages_filme = ceil($totalRows_filme/$maxRows_filme)-1;

$queryString_filme = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_filme") == false && 
        stristr($param, "totalRows_filme") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_filme = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_filme = sprintf("&totalRows_filme=%d%s", $totalRows_filme, $queryString_filme);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>...:: JrGames VideoLocadora ::...</title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<style type="text/css">
<!--
a:link {
	font-weight: bold;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #788035;
}
a:active {
	text-decoration: none;
}
.style5 {
	font-size: 14px;
	font-weight: bold;
	color: #353918;
}
.style8 {font-size: 10px}
#Layer1 {
	position:absolute;
	width:194px;
	height:24px;
	z-index:1;
	left: 487px;
	top: 61px;
	background-color: #FFFFFF;
}
.style9 {color: #000000}
-->
</style>
<script language="JavaScript" src="java.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body><table width="779" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="778"><table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
      
      
      <tr>
        <td width="26%" height="368" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="204" align="left" valign="top" background="imagens/topo/flash.jpg"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="204">
                <param name="movie" value="imagens/flash.swf" />
                <param name="quality" value="high" />
                <embed src="imagens/flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="204"></embed>
            </object></td>
          </tr>
          <tr>
            <td height="29" align="center" valign="top" background="imagens/tv/fundo.jpg"><img src="imagens/topo/menu.jpg" width="301" height="29" /></td>
          </tr>
          <tr>
            <td height="93" align="center" valign="top" bgcolor="#FFFFFF"><table width="200" border="0" cellpadding="0" cellspacing="0" background="imagens/tv/fundo.jpg">
                <tr>
                  <td align="right"><table width="76%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="100%" height="25" align="center" valign="middle" class="fonte_menu"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_baixo">
                        <tr>
                          <td width="11%" align="center" valign="middle"><table width="47%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="right"><div align="left"><img name="seta" src="imagens/seta.jpg" width="12" height="12" border="0" id="seta" alt="" /></div></td>
                              </tr>
                          </table></td>
                          <td width="89%" height="25" align="left" valign="middle" class="medium"><strong><a href="index.php" class="fonte_menu">Home</a></strong></td>
                        </tr>
                      </table></td>
                      </tr>
                    <tr>
                      <td height="25" align="center" valign="middle" class="fonte_menu"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_baixo">
                        <tr>
                          <td width="11%" align="center" valign="middle"><table width="47%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="right"><div align="left"><img name="seta" src="imagens/seta.jpg" width="12" height="12" border="0" id="seta" alt="" /></div></td>
                              </tr>
                          </table></td>
                          <td width="89%" height="25" align="left" valign="middle" class="medium"><strong class="fonte_menu"><a href="noticias.php" class="fonte_menu">Not&iacute;cias</a> </strong></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="25" align="center" valign="middle" class="fonte_menu"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_baixo">
                        <tr>
                          <td height="25" colspan="2" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha_baixo">
                            <tr>
                              <td width="11%" align="center" valign="middle"><table width="47%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="right"><div align="left"><img name="seta" src="imagens/seta.jpg" width="12" height="12" border="0" id="seta" alt="" /></div></td>
                                  </tr>
                              </table></td>
                              <td width="89%" height="25" align="left" valign="middle" class="medium"><strong class="fonte_menu"><a href="lancamento.php" class="fonte_menu">Lan&ccedil;amentos</a></strong></td>
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td width="11%" align="center" valign="middle"><table width="47%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="right"><div align="left"><img name="seta" src="imagens/seta.jpg" width="12" height="12" border="0" id="seta" alt="" /></div></td>
                              </tr>
                          </table></td>
                          <td width="89%" height="25" align="left" valign="middle" class="medium"><strong class="fonte_menu">Loja</strong></td>
                        </tr>
                      </table></td>
                      </tr>
                    
                    <tr>
                      <td height="25" align="center" valign="middle">&nbsp;</td>
                      </tr>
                  </table></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td height="35" colspan="2" align="right" valign="bottom"><img src="imagens/topo/generos.jpg" width="301" height="29" /></td>
                  </tr>
                <tr>
                  <td width="264" align="right"><?php do { ?>
                      <table width="76%" border="0" cellpadding="0" cellspacing="0" class="linha_baixo">
                        <tr>
                          <td width="11%" align="center" valign="middle"><table width="47%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="right"><div align="left"><img name="seta" src="imagens/seta.jpg" width="12" height="12" border="0" id="seta" alt="" /></div></td>
                              </tr>
                          </table></td>
                          <td width="89%" height="25" align="left" valign="middle" class="medium"><strong><a href="listar.php?genero=<?php echo $row_RS_genero['tipo']; ?>" class="fonte_menu"><?php echo $row_RS_genero['tipo']; ?></a></strong></td>
                        </tr>
                      </table>
                    <?php } while ($row_RS_genero = mysql_fetch_assoc($RS_genero)); ?></td>
                  <td width="37" align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" colspan="2" align="center" valign="bottom"><img src="imagens/tv/base.jpg" width="301" height="40" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          
        </table></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="319"><table  width="457" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="41" colspan="3"><img src="imagens/topo/abas.jpg" width="477" height="56" border="0" usemap="#MapMap" /></td>
              </tr>
              <tr>
                <td id="fundo" width="186" height="41" align="left" valign="top"><img src="imagens/topo/procurar.jpg" width="186" height="47" /></td>
                <td id="fundo" width="233" align="center" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="223" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top"><form id="form1" name="form1" method="get" action="resultado.php">
                            
                              <div align="left">
                                <table width="223" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="152" height="35" align="center" valign="middle"><input name="busca" type="text" class="fonte_filme" id="busca" value="Digite o nome do Filme" size="25" /></td>
                                    <td width="71" height="25" align="right" valign="middle"><div align="center" class="titulo_not">
                                      <input name="Submit" type="submit" class="titulo_not" value="buscar" />
                                    </div></td>
                                  </tr>
                                </table>
                              </div>
                        </form></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="58" align="left" valign="top"><img src="imagens/topo/topo_.jpg" width="56" height="47" /></td>
              </tr>
              <tr>
                <td colspan="3" align="left" valign="top"><table width="450" height="60" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
                  <tr>
                    <td width="460" height="45" align="center" valign="middle"><a href="cyberpoint.php"><img src="imagens/cyberpoint.jpg" alt="CyberPoint" width="440" height="60" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top"><!-- InstanceBeginEditable name="meio" -->
              <table width="99%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="249" align="left" valign="top"><table width="112" border="0">
                    <tr>
                      <?php
  do { // horizontal looper version 3
?>
                      <td width="119"><table width="106" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="106">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="139" align="center" valign="middle"><a href="exibir.php?id=<?php echo $row_filme['id']; ?>"><img src="<?php echo tNG_showDynamicImage("", "fotos/", "{filme.capa}");?>" width="90" height="126" border="0" class="borda_preta" /></a></td>
                          </tr>
                          <tr>
                            <td height="52" align="center" valign="middle" class="fonte_filme"><?php echo $row_filme['titulo']; ?></td>
                          </tr>
                          <tr>
                            <td height="20" align="center" valign="middle" class="medium"><a href="exibir.php?id=<?php echo $row_filme['id']; ?>"><img src="imagens/detalhes.jpg" width="60" height="20" border="0" /></a></td>
                          </tr>
                      </table></td>
                      <?php
    $row_filme = mysql_fetch_assoc($filme);
    if (!isset($nested_filme)) {
      $nested_filme= 1;
    }
    if (isset($row_filme) && is_array($row_filme) && $nested_filme++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_filme); //end horizontal looper version 3
?>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center"><table width="59%" border="0" align="center" class="titulo_not">
                          <tr>
                            <td width="23%" height="29" align="center"><?php if ($pageNum_filme > 0) { // Show if not first page ?>
                                <a href="<?php printf("%s?pageNum_filme=%d%s", $currentPage, 0, $queryString_filme); ?>" class="fonte_menu">Primeira</a>
                                <?php } // Show if not first page ?>
                            </td>
                            <td width="31%" align="center"><?php if ($pageNum_filme > 0) { // Show if not first page ?>
                                <a href="<?php printf("%s?pageNum_filme=%d%s", $currentPage, max(0, $pageNum_filme - 1), $queryString_filme); ?>" class="fonte_menu">Anterior</a><a href="<?php printf("%s?pageNum_filme=%d%s", $currentPage, max(0, $pageNum_filme - 1), $queryString_filme); ?>"><br />
                                </a>
                                <?php } // Show if not first page ?>
                            </td>
                            <td width="23%" align="center"><?php if ($pageNum_filme < $totalPages_filme) { // Show if not last page ?>
                                <a href="<?php printf("%s?pageNum_filme=%d%s", $currentPage, min($totalPages_filme, $pageNum_filme + 1), $queryString_filme); ?>" class="fonte_menu">Pr&oacute;xima</a>
                                <?php } // Show if not last page ?>
                            </td>
                            <td width="23%" align="center" class="titulo_not"><?php if ($pageNum_filme < $totalPages_filme) { // Show if not last page ?>
                                <a href="<?php printf("%s?pageNum_filme=%d%s", $currentPage, $totalPages_filme, $queryString_filme); ?>" class="titulo_not">&Uacute;ltima</a>
                                <?php } // Show if not last page ?>
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            <!-- InstanceEndEditable --></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" colspan="3" align="left" bgcolor="#D0D59D"><div align="left" class="xbig style5">
                    <table width="99" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td class="fonte_menu">Not&iacute;cias</td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top"><table width="238" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <?php
  do { // horizontal looper version 3
?>
                      <td align="left" valign="top"><table width="240" border="0" cellpadding="0" cellspacing="0" bgcolor="#ECEED9" class="borda_not">
                          <tr>
                            <td width="38%" rowspan="2" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_notica['id']; ?>"><img src="<?php echo tNG_showDynamicImage("../", "fotos/", "{notica.imagem}");?>" width="80" height="60" border="0" /></a></td>
                            <td width="62%" height="20" align="left" class="style5"><div align="left" class="titulo_not"><?php echo $row_notica['titulo']; ?></div></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="medium"><div align="left" class="resumo_not"><a href="exibir_noticia.php?id=<?php echo $row_notica['id']; ?>" class="resumo_not"><?php echo $row_notica['resumo']; ?></a></div>
                              <div align="center"></div></td>
                          </tr>
                      </table></td>
                      <?php
    $row_notica = mysql_fetch_assoc($notica);
    if (!isset($nested_notica)) {
      $nested_notica= 1;
    }
    if (isset($row_notica) && is_array($row_notica) && $nested_notica++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_notica); //end horizontal looper version 3
?>
                    </tr>
                </table></td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="50" align="center" valign="middle" class="titulo_not"><p class="fonte_menu style8">JrGames V&iacute;deoLocadora - 2006 - Todos os Direitos Reservados<br />
                      Rua Professor Souza 282 - Bacax&aacute; - Saquarema - RJ <br />
                  WebDesign &amp; Desenvolvimento : <a href="mailto:victor@saquabb.com.br" class="style9">Victor Wardi</a> <br />
                  </p>
                    </td>
                </tr>
              </table>
              <map name="MapMap" id="MapMap">
                <area shape="rect" coords="300,30,402,48" href="quemsomos.php" /><area shape="rect" coords="39,29,109,47" href="index.php" />
                <area shape="rect" coords="173,31,241,46" href="contato.php" />
              </map>              </td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>


<map name="Map" id="Map"><area shape="rect" coords="19,30,121,48" href="quemsomos.php" />
<area shape="rect" coords="173,31,241,46" href="contato.php" />
</map></body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RS_genero);

mysql_free_result($notica);

mysql_free_result($filme);
?>