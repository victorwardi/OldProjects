<?php require_once('../Connections/fotos.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_fotos, $fotos);
$query_destaque = "SELECT * FROM destaque ORDER BY id DESC";
$destaque = mysql_query($query_destaque, $fotos) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);

$colname_comentarios = "-1";
if (isset($_GET['id'])) {
  $colname_comentarios = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_comentarios = sprintf("SELECT * FROM comentarios_not WHERE id = %s ORDER BY id_coment DESC", $colname_comentarios);
$comentarios = mysql_query($query_comentarios, $fotos) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

$colname_galeria = "-1";
if (isset($_GET['id'])) {
  $colname_galeria = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_galeria = sprintf("SELECT * FROM galeria WHERE id = %s ORDER BY id ASC", $colname_galeria);
$galeria = mysql_query($query_galeria, $fotos) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

$maxRows_fotos = 15;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

$colname_fotos = "-1";
if (isset($_GET['id'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_fotos, $fotos);
$query_fotos = sprintf("SELECT * FROM fotos_digitais WHERE id = '%s' ORDER BY id_foto DESC", $colname_fotos);
$query_limit_fotos = sprintf("%s LIMIT %d, %d", $query_fotos, $startRow_fotos, $maxRows_fotos);
$fotos = mysql_query($query_limit_fotos, $fotos) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);

if (isset($_GET['totalRows_fotos'])) {
  $totalRows_fotos = $_GET['totalRows_fotos'];
} else {
  $all_fotos = mysql_query($query_fotos);
  $totalRows_fotos = mysql_num_rows($all_fotos);
}
$totalPages_fotos = ceil($totalRows_fotos/$maxRows_fotos)-1;

$queryString_fotos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_fotos") == false && 
        stristr($param, "totalRows_fotos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_fotos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_fotos = sprintf("&totalRows_fotos=%d%s", $totalRows_fotos, $queryString_fotos);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/JavaScript">
<!--
function abrir(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Real Fotos.com.br</title>
<link rel="stylesheet" href="../litbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="../litbox/js/prototype.js" type="text/javascript"></script>
	<script src="../litbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="../litbox/js/lightbox.js" type="text/javascript"></script>

<!-- InstanceEndEditable -->
<link href="css/stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.email {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bolder;
	color: #FF6600;
	text-decoration: underline;
}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1480426-2";
urchinTracker();
</script>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="right" valign="middle" scope="col"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
      <tr>
        <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
        <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
        <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
        <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
        <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
        <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th scope="row"><table width="774" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="59" scope="col">&nbsp;</th>
        </tr>
      <tr>
        <th height="98" align="center" valign="bottom" scope="row"><table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="left" valign="bottom" class="fonte_10px_preta" scope="col">Foto Destaque </th>
            </tr>
            <tr>
              <th align="center" valign="middle" class="fonte_10px_preta" scope="col"><img src="<?php echo tNG_showDynamicImage("../", "../fotos/destaque/", "{destaque.foto}");?>" class="borda_destaque_8px" /></th>
            </tr>
            <tr>
              <th align="right" valign="top" class="fonte_10px_preta" scope="row">Atleta: <?php echo $row_destaque['atleta']; ?> - Local: <?php echo $row_destaque['local']; ?> - Foto: <?php echo $row_destaque['fotografo']; ?></th>
            </tr>
          </table></th>
      </tr>
      <tr>
        <th height="19" align="center" valign="middle" scope="row">&nbsp;</th>
        </tr>
      <tr>
        <th align="center" valign="top" scope="row"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="center" valign="top" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Galeria de fotos - <?php echo $row_galeria['nome']; ?> - <?php echo $row_galeria['data']; ?></th>
                </tr>
                
              </table>
                <table border="0">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                      <td><a href="<?php echo tNG_showDynamicImage("../", "../fotos/", "{fotos.arquivo}");?>"
				title="<?php echo $row_fotos['descricao']; ?> - <?php echo $row_fotos['local']; ?> &lt;br /&gt;
Fotógrafo: <?php echo $row_fotos['fotografo']; ?> - Código: <?php echo $row_fotos['id_foto']; ?> " rel="lightbox[fotos]"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/", "{fotos.arquivo}", 145, 110, false); ?>" border="0" class="borda_4pxcinza_escuto" /></a></td>
                      <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 5==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
                  </tr>
                </table>
                <table border="0" width="18%" align="center">
                  <tr>
                    <td align="center" valign="middle" class="titulo_galerias"><?php if ($pageNum_fotos < $totalPages_fotos) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, min($totalPages_fotos, $pageNum_fotos + 1), $queryString_fotos); ?>" class="titulo_galerias">Pr&oacute;xima P&aacute;gina</a>
                        <?php } // Show if not last page ?>          </td>
                    </tr>
                  <tr>
                    <td width="51%" align="center" valign="middle" class="titulo_galerias"><?php if ($pageNum_fotos > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>" class="titulo_galerias">P&aacute;gina Anterior </a>
                        <?php } // Show if not first page ?>                    </td>
                    </tr>
                </table>
                </p>
</p></th>
            </tr>
            <tr>
              <th align="center" valign="top" scope="row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="2" bordercolor="#333333" bgcolor="#333333" class="borda_tabela">
                      <tr>
                        <td height="19" bgcolor="#333333" class="titulo_branco_16px">Quer comprar alguma dessas fotos? </td>
                      </tr>
                      
                      
                    </table></td>
                  </tr>
                  <tr>
                    <td height="37" align="left" valign="middle"><span class="link_12px_preto_n">Para comprar qualquer uma dessas fotos basta enviar um e-mail para <span class="email">contato@realfotos.com.br</span>, informando o c&oacute;digo da foto. Para saber o c&oacute;digo da foto basta clic&aacute;-la para ampliar, o c&oacute;digo aparecer&aacute; logo ap&oacute;s o nome do fot&oacute;grafo na parte de baixo da foto. </span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="2" bordercolor="#333333" bgcolor="#333333" class="borda_tabela">
                        
                        <tr>
                          <td height="19" bgcolor="#333333" class="titulo_branco_16px">Coment&aacute;rios:</td>
                        </tr>
                    </table>
                      </td>
                  </tr>
                  <tr>
                    <td height="60" align="left" valign="top"><p><span class="link_12px_preto_n">O RealFotos.com.br n&atilde;o publicar&aacute; coment&aacute;rios ofensivos, desrespeitosos  e que venham h&aacute; prejudicar ou insultar quem quer que seja! 
                      Todos os coment&aacute;rios s&atilde;o analisados para depois serem  publicados!<br />
                      N&atilde;o estamos proibindo que sejam feitas cr&iacute;ticas, apenas que  nosso site n&atilde;o se torne um antro de fofocas!<br />
                      Desde j&aacute;, agradecemos &agrave; compreens&atilde;o!</span><strong><br />
                      </strong></p></td>
                  </tr>
                  <tr>
                    <td><?php do { ?>
                        <?php if ($totalRows_comentarios > 0) { // Show if recordset not empty ?>
                        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#333333" class="borda_tabela">
                          <tr>
                            <td align="left" bgcolor="#333333" class="titulo_branco_16px"><strong class="titulo_coment"><?php echo substr($row_comentarios['nome'] ,0,100)." - "; ?> <?php echo substr ($row_comentarios['mail'],0,100)." - "; ?> <?php echo $row_comentarios['cidade']; ?></strong></td>
                          </tr>
                          <tr>
                            <td height="20" align="left" valign="top" bgcolor="#FFFFFF" class="link_12px_preto_n"><?php echo $row_comentarios['comentario']; ?></td>
                          </tr>
                        </table>
                      <?php } // Show if recordset not empty ?>
                      <br />
                        <?php } while ($row_comentarios = mysql_fetch_assoc($comentarios)); ?></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><table width="126" height="22" border="0" cellpadding="0" cellspacing="2" class="borda_tabela">
                        <tr>
                          <td width="122" align="center" valign="middle" bgcolor="#575C60"><a href="javascript:abrir('../comentar.php?id=<?php echo $row_galeria['id']; ?>','','width=420,height=540')" class="titulo_branco_16px">Comentar</a></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
        </tr>
      
      <tr>
        <th align="center" valign="middle" scope="row"><table width="588" border="0" cellpadding="4" cellspacing="0" id="menu">
          <tr>
            <th width="49" align="center" valign="middle" class="menu" scope="col"><a href="index.php">home</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="noticias.php">not&iacute;cias</a></th>
            <th width="123" align="center" valign="middle" class="menu" scope="col"><a href="galerias.php">galerias de fotos </a></th>
            <th width="60" align="center" valign="middle" class="menu" scope="col"><a href="design.php">design</a></th>
            <th width="100" align="center" valign="middle" class="menu" scope="col"><a href="quemsomos.php">quem somos</a></th>
            <th width="68" align="center" valign="middle" class="menu" scope="col"><a href="servicos.php">servi&ccedil;os</a></th>
            <th width="64" align="center" valign="middle" class="menu" scope="col"><a href="contato.php">contato</a></th>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th class="fonte_10px_preta" scope="row">RealFotos.com.br&copy; - Todos os Direitos Reservados<br />
Desenvolvido por Victor Caetano </th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($destaque);

mysql_free_result($comentarios);

mysql_free_result($fotos);

mysql_free_result($galeria);
?>