<?php require_once('Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_foto = 8;
$pageNum_foto = 0;
if (isset($_GET['pageNum_foto'])) {
  $pageNum_foto = $_GET['pageNum_foto'];
}
$startRow_foto = $pageNum_foto * $maxRows_foto;

mysql_select_db($database_xpress, $xpress);
$query_foto = "SELECT * FROM fotos ORDER BY id_foto DESC";
$query_limit_foto = sprintf("%s LIMIT %d, %d", $query_foto, $startRow_foto, $maxRows_foto);
$foto = mysql_query($query_limit_foto, $xpress) or die(mysql_error());
$row_foto = mysql_fetch_assoc($foto);

if (isset($_GET['totalRows_foto'])) {
  $totalRows_foto = $_GET['totalRows_foto'];
} else {
  $all_foto = mysql_query($query_foto);
  $totalRows_foto = mysql_num_rows($all_foto);
}
$totalPages_foto = ceil($totalRows_foto/$maxRows_foto)-1;

$queryString_foto = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_foto") == false && 
        stristr($param, "totalRows_foto") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_foto = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_foto = sprintf("&totalRows_foto=%d%s", $totalRows_foto, $queryString_foto);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.brd_laranja {border: 1px solid #FF9900;
}
.brd_laranja {border: 1px solid #666666;
}
.fonte {
	font-size: 10px;
	font-weight: lighter;
	color: #000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<style type="text/css">
/*inicio:Onde Define a cor e aespessura das margens das Fotos */
#showimage{
	position:absolute;
	visibility:hidden;
	border-left: 3px solid #000000;
	border-right: 3px solid #000000;
	border-bottom: 3px solid #000000;
	z-index: 50;
	background-color: #FFFFFF;
	
}
/*fim*/

/*inicio:Onde Define a cor da margem onde fica o "x" de Fechar */
#dragbar{
	cursor: hand;
	cursor: pointer;
	background-color: #000000;
	min-width: 10px;
	}
/*fim*/

/*inicio:Onde Define a cor do "x" de Fechar */
#dragbar #closetext{
color: #ffffff; 
font-weight: bold;
margin-right: 1px;
font-family:Lucida Console;
}
/*fim*/
</style>
<script type="text/javascript" src="script_foto.js"></script>
</head>
<body onLoad="self.focus()">
<div id="showimage"></div>
<body>
<table border="0" align="center">
  <tr>
    <?php
  do { // horizontal looper version 3
?>
      <td width="117" height="129"><table width="124" border="0" cellspacing="2" cellpadding="0">
        <tr>
          <td width="110" height="80" align="center" valign="top"><table width="100" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                <tr>
                  <td><a href="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>" onclick="return enlarge('<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{foto.arquivo}");?>',event,'center',512,384);"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{foto.arquivo}", 100, 75, false); ?>"   border="0" class="brd_laranja" /></a></td>
                </tr>
            </table></td>
          </tr>
        <tr>
          <td height="22" align="center" valign="middle" class="fonte"><?php echo $row_foto['descricao']; ?></td>
          </tr>
      </table></td>
      <?php
    $row_foto = mysql_fetch_assoc($foto);
    if (!isset($nested_foto)) {
      $nested_foto= 1;
    }
    if (isset($row_foto) && is_array($row_foto) && $nested_foto++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_foto); //end horizontal looper version 3
?>
  </tr>
</table>
<table border="0" width="42%" align="center">
  <tr>
    <td width="31%" align="center"><?php if ($pageNum_foto > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_foto=%d%s", $currentPage, max(0, $pageNum_foto - 1), $queryString_foto); ?>" class="fonte">Anterior</a>
          <?php } // Show if not first page ?>    </td>
    <td width="23%" align="center" class="fonte"><?php if ($pageNum_foto < $totalPages_foto) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_foto=%d%s", $currentPage, min($totalPages_foto, $pageNum_foto + 1), $queryString_foto); ?>" class="fonte">Pr&oacute;ximo</a>
          <?php } // Show if not last page ?>    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($foto);
?>