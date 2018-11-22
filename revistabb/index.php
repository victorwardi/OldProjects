<?php require_once('Connections/revista.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_revista = 1;
$pageNum_revista = 0;
if (isset($_GET['pageNum_revista'])) {
  $pageNum_revista = $_GET['pageNum_revista'];
}
$startRow_revista = $pageNum_revista * $maxRows_revista;

$colname_revista = "-1";
if (isset($_GET['revista'])) {
  $colname_revista = (get_magic_quotes_gpc()) ? $_GET['revista'] : addslashes($_GET['revista']);
}
mysql_select_db($database_revista, $revista);
$query_revista = sprintf("SELECT * FROM pagina WHERE revista = '%s' ORDER BY id ASC", $colname_revista);
$query_limit_revista = sprintf("%s LIMIT %d, %d", $query_revista, $startRow_revista, $maxRows_revista);
$revista = mysql_query($query_limit_revista, $revista) or die(mysql_error());
$row_revista = mysql_fetch_assoc($revista);

if (isset($_GET['totalRows_revista'])) {
  $totalRows_revista = $_GET['totalRows_revista'];
} else {
  $all_revista = mysql_query($query_revista);
  $totalRows_revista = mysql_num_rows($all_revista);
}
$totalPages_revista = ceil($totalRows_revista/$maxRows_revista)-1;

$queryString_revista = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_revista") == false && 
        stristr($param, "totalRows_revista") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_revista = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_revista = sprintf("&totalRows_revista=%d%s", $totalRows_revista, $queryString_revista);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
#corpo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#topo {
	background-color: #000000;
	float: none;
}
#conteudo {
	padding: 10px;
}
.borda_img {
	border: 4px solid #FFFFFF;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	font-weight: bold;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: underline;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<div id="corpo">

<div id="topo">
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center"><?php if ($pageNum_revista > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_revista=%d%s", $currentPage, 0, $queryString_revista); ?>">Primeira</a>
          <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center"><?php if ($pageNum_revista > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_revista=%d%s", $currentPage, max(0, $pageNum_revista - 1), $queryString_revista); ?>">Anterior</a>
          <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_revista < $totalPages_revista) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_revista=%d%s", $currentPage, min($totalPages_revista, $pageNum_revista + 1), $queryString_revista); ?>">Pr&oacute;xima</a>
          <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_revista < $totalPages_revista) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_revista=%d%s", $currentPage, $totalPages_revista, $queryString_revista); ?>">&Uacute;ltima</a>
          <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  <div id="conteudo">
  <div align="center"><img src="<?php echo tNG_showDynamicImage("", "paginas/", "{revista.imagem}");?>" class="borda_img" /></div>
</div>
</div>

</div>

</body>
</html>
<?php
mysql_free_result($revista);
?>
