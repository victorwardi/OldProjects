<?php require_once('../Connections/saquabb.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_album = 10;
$pageNum_album = 0;
if (isset($_GET['pageNum_album'])) {
  $pageNum_album = $_GET['pageNum_album'];
}
$startRow_album = $pageNum_album * $maxRows_album;

$colname_album = "-1";
if (isset($_GET['galeria'])) {
  $colname_album = (get_magic_quotes_gpc()) ? $_GET['galeria'] : addslashes($_GET['galeria']);
}
mysql_select_db($database_saquabb, $saquabb);
$query_album = sprintf("SELECT * FROM fotos WHERE galeria = '%s' ORDER BY id_foto DESC", $colname_album);
$query_limit_album = sprintf("%s LIMIT %d, %d", $query_album, $startRow_album, $maxRows_album);
$album = mysql_query($query_limit_album, $saquabb) or die(mysql_error());
$row_album = mysql_fetch_assoc($album);

if (isset($_GET['totalRows_album'])) {
  $totalRows_album = $_GET['totalRows_album'];
} else {
  $all_album = mysql_query($query_album);
  $totalRows_album = mysql_num_rows($all_album);
}
$totalPages_album = ceil($totalRows_album/$maxRows_album)-1;

$queryString_album = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_album") == false && 
        stristr($param, "totalRows_album") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_album = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_album = sprintf("&totalRows_album=%d%s", $totalRows_album, $queryString_album);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/album.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="thumb">
    <td align="center" valign="top"><table border="0">
      <tr>
        <?php
  do { // horizontal looper version 3
?>
          <td><a href="foto.php?id_foto=<?php echo $row_album['id_foto']; ?>" target="meio"><img src="<?php echo tNG_showDynamicThumbnail("../", "../uploads/fotos/", "{album.arquivo}", 80, 60, false); ?>" border="0" class="borda_foto" /></a></td>
          <?php
    $row_album = mysql_fetch_assoc($album);
    if (!isset($nested_album)) {
      $nested_album= 1;
    }
    if (isset($row_album) && is_array($row_album) && $nested_album++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_album); //end horizontal looper version 3
?>
      </tr>
    </table>
      <table width="180" border="0" cellpadding="0" cellspacing="0" id="meio2">
  <tr>
    <td><table border="0" width="50%" align="center">
        <tr>
          <td width="31%" align="center"><?php if ($pageNum_album > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_album=%d%s", $currentPage, max(0, $pageNum_album - 1), $queryString_album); ?>"><img src="imagens/voltar.jpg" alt="Voltar" width="16" height="16" border=0></a>
              <?php } // Show if not first page ?>          </td>
          <td width="23%" align="center"><?php if ($pageNum_album < $totalPages_album) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_album=%d%s", $currentPage, min($totalPages_album, $pageNum_album + 1), $queryString_album); ?>"><img src="imagens/avancar.jpg" alt="Avan&ccedil;ar" width="16" height="16" border=0></a>
              <?php } // Show if not last page ?>          </td>
          </tr>
      </table></td>
  </tr>
</table>

    <br /></td>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($album);

?>
