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

$maxRows_fotos = 15;
$pageNum_fotos = 0;
if (isset($_GET['pageNum_fotos'])) {
  $pageNum_fotos = $_GET['pageNum_fotos'];
}
$startRow_fotos = $pageNum_fotos * $maxRows_fotos;

$colname_fotos = "-1";
if (isset($_GET['busca'])) {
  $colname_fotos = (get_magic_quotes_gpc()) ? $_GET['busca'] : addslashes($_GET['busca']);
}
mysql_select_db($database_fotos, $fotos);
$query_fotos = sprintf("SELECT * FROM fotos_digitais WHERE `local` LIKE '%%%s%%' ORDER BY id_foto DESC", $colname_fotos);
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
              <th align="left" valign="middle" bgcolor="#333333" scope="col"><table width="100%" border="0" cellpadding="0" cellspacing="4" bgcolor="#333333">
                <tr>
                  <th align="left" valign="middle" class="titulo_branco_16px" scope="col">Resultado da busca de fotos pelo nome da Praia </th>
                </tr>
              </table></th>
            </tr>
            <tr>
              <th scope="col">&nbsp;
                <table border="0">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                    <td><a href="<?php echo tNG_showDynamicImage("../", "../fotos/", "{fotos.arquivo}");?>"
				title="<?php echo $row_fotos['descricao']; ?> &lt;br /&gt;
Fot&oacute;grafo: <?php echo $row_fotos['fotografo']; ?> - C&oacute;digo: <?php echo $row_fotos['id_foto']; ?> " rel="lightbox[fotos]"><img src="<?php echo tNG_showDynamicThumbnail("../", "../fotos/", "{fotos.arquivo}", 145, 110, false); ?>" border="0" class="borda_4pxcinza_escuto" /></a></td>
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
                        <?php } // Show if not last page ?>                    </td>
                  </tr>
                  <tr>
                    <td width="51%" align="center" valign="middle" class="titulo_galerias"><?php if ($pageNum_fotos > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_fotos=%d%s", $currentPage, max(0, $pageNum_fotos - 1), $queryString_fotos); ?>" class="titulo_galerias">P&aacute;gina Anterior </a>
                        <?php } // Show if not first page ?>                    </td>
                  </tr>
                </table></th>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
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

mysql_free_result($fotos);
?>