<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_equipe = 8;
$pageNum_equipe = 0;
if (isset($_GET['pageNum_equipe'])) {
  $pageNum_equipe = $_GET['pageNum_equipe'];
}
$startRow_equipe = $pageNum_equipe * $maxRows_equipe;

mysql_select_db($database_xpress, $xpress);
$query_equipe = "SELECT * FROM equipe ORDER BY id DESC";
$query_limit_equipe = sprintf("%s LIMIT %d, %d", $query_equipe, $startRow_equipe, $maxRows_equipe);
$equipe = mysql_query($query_limit_equipe, $xpress) or die(mysql_error());
$row_equipe = mysql_fetch_assoc($equipe);

if (isset($_GET['totalRows_equipe'])) {
  $totalRows_equipe = $_GET['totalRows_equipe'];
} else {
  $all_equipe = mysql_query($query_equipe);
  $totalRows_equipe = mysql_num_rows($all_equipe);
}
$totalPages_equipe = ceil($totalRows_equipe/$maxRows_equipe)-1;

$queryString_equipe = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_equipe") == false && 
        stristr($param, "totalRows_equipe") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_equipe = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_equipe = sprintf("&totalRows_equipe=%d%s", $totalRows_equipe, $queryString_equipe);
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
</style></head>

<body>
<table width="165" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="165" align="center"><table width="106" border="0">
      <tr>
        <?php
  do { // horizontal looper version 3
?>
          <td height="126" align="center" valign="top"><table width="100" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="138" height="90" align="center" valign="top"><table width="44" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                    <tr>
                      <td width="36"><a href="ver_equipe.php?id=<?php echo $row_equipe['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{equipe.foto}", 100, 75, false); ?>" width="100" height="75" border="0" /></a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="fonte"><?php echo $row_equipe['nome']; ?></td>
                </tr>
            </table></td>
          <?php
    $row_equipe = mysql_fetch_assoc($equipe);
    if (!isset($nested_equipe)) {
      $nested_equipe= 1;
    }
    if (isset($row_equipe) && is_array($row_equipe) && $nested_equipe++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_equipe); //end horizontal looper version 3
?>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="76" align="center"><table border="0" width="64%" align="center">
        <tr>
          <td width="31%" height="47" align="center" valign="middle"><?php if ($pageNum_equipe > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_equipe=%d%s", $currentPage, max(0, $pageNum_equipe - 1), $queryString_equipe); ?>" class="fonte">Voltar</a>
          <?php } // Show if not first page ?>          </td>
          <td width="23%" align="center" valign="middle"><?php if ($pageNum_equipe < $totalPages_equipe) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_equipe=%d%s", $currentPage, min($totalPages_equipe, $pageNum_equipe + 1), $queryString_equipe); ?>" class="fonte">Mais</a>
          <?php } // Show if not last page ?>          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($equipe);

?>
