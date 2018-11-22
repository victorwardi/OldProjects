<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_arquivo = 3;
$pageNum_arquivo = 0;
if (isset($_GET['pageNum_arquivo'])) {
  $pageNum_arquivo = $_GET['pageNum_arquivo'];
}
$startRow_arquivo = $pageNum_arquivo * $maxRows_arquivo;

mysql_select_db($database_xpress, $xpress);
$query_arquivo = "SELECT * FROM ofertas ORDER BY id DESC";
$query_limit_arquivo = sprintf("%s LIMIT %d, %d", $query_arquivo, $startRow_arquivo, $maxRows_arquivo);
$arquivo = mysql_query($query_limit_arquivo, $xpress) or die(mysql_error());
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 14}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="left" valign="middle" class="fonte style1">Ofertas XpressBB </td>
  </tr>
  <tr>
    <td><?php do { ?>
        <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="18%" align="center" valign="top"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{arquivo.foto}", 80, 60, false); ?>" class="borda" /></td>
            <td width="82%" align="left" valign="middle" class="fonte"><?php echo $row_arquivo['titulo']; ?><br />
              <span class="total"><?php echo $row_arquivo['data']; ?></span></td>
          </tr>
                </table>
        <?php } while ($row_arquivo = mysql_fetch_assoc($arquivo)); ?></td>
  </tr>
  <tr>
    <td><table border="0" width="50%" align="center">
        <tr>
          <td width="31%" align="center"><?php if ($pageNum_arquivo > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, max(0, $pageNum_arquivo - 1), $queryString_arquivo); ?>" class="fonte">Voltar</a>
              <?php } // Show if not first page ?>          </td>
          <td width="23%" align="center"><?php if ($pageNum_arquivo < $totalPages_arquivo) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_arquivo=%d%s", $currentPage, min($totalPages_arquivo, $pageNum_arquivo + 1), $queryString_arquivo); ?>" class="fonte">Avan&ccedil;ar</a>
              <?php } // Show if not last page ?>          </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($arquivo);
?>
