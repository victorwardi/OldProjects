<?php require_once('../Connections/victor.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

$maxRows_trabalhos = 3;
$pageNum_trabalhos = 0;
if (isset($_GET['pageNum_trabalhos'])) {
  $pageNum_trabalhos = $_GET['pageNum_trabalhos'];
}
$startRow_trabalhos = $pageNum_trabalhos * $maxRows_trabalhos;

mysql_select_db($database_victor, $victor);
$query_trabalhos = "SELECT * FROM trabalhos ORDER BY id DESC";
$query_limit_trabalhos = sprintf("%s LIMIT %d, %d", $query_trabalhos, $startRow_trabalhos, $maxRows_trabalhos);
$trabalhos = mysql_query($query_limit_trabalhos, $victor) or die(mysql_error());
$row_trabalhos = mysql_fetch_assoc($trabalhos);

if (isset($_GET['totalRows_trabalhos'])) {
  $totalRows_trabalhos = $_GET['totalRows_trabalhos'];
} else {
  $all_trabalhos = mysql_query($query_trabalhos);
  $totalRows_trabalhos = mysql_num_rows($all_trabalhos);
}
$totalPages_trabalhos = ceil($totalRows_trabalhos/$maxRows_trabalhos)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/victor.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Victor Caetano - Designer Gr&aacute;fico - WEBDESIGN</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(img/fundo.jpg);
}
.style1 {font-size: 100%}
-->
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
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
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <th width="296" height="116" align="center" valign="middle" scope="col"><img src="logo.jpg" width="296" height="86" /></th>
    <th width="462" align="center" valign="middle" scope="col"><div id="menu"><a href="index.php">Home</a> | <a href="curriculo.php">Curr&iacute;culo</a> | <a href="portifolio.php">Portifolio</a> | <a href="servicos.php">Servi&ccedil;os</a> | <a href="contato.php">Contato</a></div>      </th>
  </tr>
  <tr>
    <th colspan="2" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="44%" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th align="left" valign="middle" class="titulo" scope="col">BEM VINDO! </th>
            </tr>
            <tr>
              <th align="left" class="fonte_11px_branco_normal" scope="row"><div align="justify">Ol&aacute;! Meu nome &eacute; Victor Caetano Preuss Sthel Wardi (n&atilde;o se assustem) tenho 22 anos, sou Designer Gr&aacute;fico especializado em WEB,  desde 2002 venho estudando e me aperfei&ccedil;oando nesta &aacute;rea da inform&aacute;tica. </div></th>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
            </tr>
          </table></th>
          <th width="56%" align="left" valign="top" scope="col"><table width="95%" border="0" align="right" cellpadding="0" cellspacing="4">
            <tr>
              <th align="left" valign="middle" class="titulo" scope="col">&Uacute;LTIMOS TRABALHOS </th>
            </tr>
            <tr>
              <th align="left" valign="top" class="fonte_11px_branco_normal" scope="row"><?php do { ?>
                  <table width="347" border="0" cellpadding="0" cellspacing="4" class="borda">
                    <tr>
                      <th width="15" height="25" align="center" valign="top" scope="col"><img src="<?php echo tNG_showDynamicThumbnail("../", "../victor/uploads/", "{trabalhos.imagem}", 80, 0, true); ?>" width="50" height="50" class="borda_branca_2px" /></th>
                      <th width="326" align="left" valign="top" scope="col"><div align="left" class="fonte_11px_branco_normal">
                        <p><?php echo $row_trabalhos['titulo']; ?><br />
                          Categoria: <?php echo $row_trabalhos['categoria']; ?></p>
                      </div></th>
                    </tr>
                                    </table>
                  <?php } while ($row_trabalhos = mysql_fetch_assoc($trabalhos)); ?></th>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
            </tr>
          </table></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></th>
  </tr>
  <tr>
    <th colspan="2" scope="col"><div id="menu"><a href="index.php">Home</a> | <a href="curriculo.php">Curr&iacute;culo</a> | <a href="portifolio.php">Portifolio</a> | <a href="servicos.php">Servi&ccedil;os</a> | <a href="contato.php">Contato</a></div></th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($trabalhos);

mysql_free_result($trabalhos);
?>
