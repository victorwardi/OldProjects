<?php require_once('Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

mysql_select_db($database_victor, $victor);
$query_RS_genero = "SELECT * FROM genero ORDER BY tipo ASC";
$RS_genero = mysql_query($query_RS_genero, $victor) or die(mysql_error());
$row_RS_genero = mysql_fetch_assoc($RS_genero);
$totalRows_RS_genero = mysql_num_rows($RS_genero);

$maxRows_filme = 9;
$pageNum_filme = 0;
if (isset($_GET['pageNum_filme'])) {
  $pageNum_filme = $_GET['pageNum_filme'];
}
$startRow_filme = $pageNum_filme * $maxRows_filme;

mysql_select_db($database_victor, $victor);
$query_filme = "SELECT * FROM filme ORDER BY id DESC";
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
.style1 {color: #FFFFFF}
a:link {
	color: #000000;
	font-weight: bold;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="104" colspan="2" align="left" background="imagens/topo_jpg.jpg">&nbsp;</td>
        </tr>
      <tr>
        <td width="26%" align="center" bgcolor="#FFCC66"><img src="imagens/topo_01.jpg" width="239" height="151" /></td>
        <td width="74%" rowspan="2" align="center" valign="top"><p>&nbsp;</p>
          <table width="155" border="0">
            <tr>
              <?php
  do { // horizontal looper version 3
?>
              <td width="200"><table width="149" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="149">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><a href="ver.php?id=<?php echo $row_filme['id']; ?>">
                      <?php 
// Show If File Exists (region1)
if (tNG_fileExists("fotos/", "{filme.capa}")) {
?>
                      <img src="<?php echo tNG_showDynamicImage("", "fotos/", "{filme.capa}");?>" width="100" height="120" border="0" />
                      <?php } 
// EndIf File Exists (region1)
?>
                    </a></td>
                  </tr>
                  <tr>
                    <td height="20" align="center" valign="middle" class="medium"><strong><a href="ver.php?id=<?php echo $row_filme['id']; ?>"><?php echo $row_filme['titulo']; ?></a></strong></td>
                  </tr>
              </table></td>
              <?php
    $row_filme = mysql_fetch_assoc($filme);
    if (!isset($nested_filme)) {
      $nested_filme= 1;
    }
    if (isset($row_filme) && is_array($row_filme) && $nested_filme++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_filme); //end horizontal looper version 3
?>
            </tr>
          </table>
          <p>&nbsp;</p>          <p>&nbsp;</p></td>
        </tr>
      
      <tr>
        <td height="68" align="center" valign="top" bgcolor="#FFFFFF"><table width="200" border="0" cellpadding="0" cellspacing="0" background="imagens/fundo.jpg">
          <tr>
            <td align="center"><?php do { ?>
                <table width="78%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="19%" align="center" valign="middle"><img src="imagens/seta.png" width="12" height="12" /></td>
                    <td width="81%" height="25" align="left" valign="middle" class="medium"><strong><a href="listar.php?genero=<?php echo $row_RS_genero['tipo']; ?>"><?php echo $row_RS_genero['tipo']; ?></a></strong></td>
                  </tr>
                </table>
                <?php } while ($row_RS_genero = mysql_fetch_assoc($RS_genero)); ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="center" valign="bottom"><img src="imagens/base.jpg" width="239" height="25" /></td>
          </tr>
        </table></td>
        </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RS_genero);

mysql_free_result($filme);
?>
