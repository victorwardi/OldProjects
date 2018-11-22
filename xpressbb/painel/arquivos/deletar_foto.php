<?php require_once('../../Connections/xpress.php'); ?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_del_foto = 6;
$pageNum_del_foto = 0;
if (isset($_GET['pageNum_del_foto'])) {
  $pageNum_del_foto = $_GET['pageNum_del_foto'];
}
$startRow_del_foto = $pageNum_del_foto * $maxRows_del_foto;

mysql_select_db($database_xpress, $xpress);
$query_del_foto = "SELECT * FROM fotos ORDER BY id_foto DESC";
$query_limit_del_foto = sprintf("%s LIMIT %d, %d", $query_del_foto, $startRow_del_foto, $maxRows_del_foto);
$del_foto = mysql_query($query_limit_del_foto, $xpress) or die(mysql_error());
$row_del_foto = mysql_fetch_assoc($del_foto);

if (isset($_GET['totalRows_del_foto'])) {
  $totalRows_del_foto = $_GET['totalRows_del_foto'];
} else {
  $all_del_foto = mysql_query($query_del_foto);
  $totalRows_del_foto = mysql_num_rows($all_del_foto);
}
$totalPages_del_foto = ceil($totalRows_del_foto/$maxRows_del_foto)-1;

$queryString_del_foto = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_del_foto") == false && 
        stristr($param, "totalRows_del_foto") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_del_foto = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_del_foto = sprintf("&totalRows_del_foto=%d%s", $totalRows_del_foto, $queryString_del_foto);
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
<link href="../../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 18}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<script language="JavaScript" src="../../java.js"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="31" align="left" valign="top" bgcolor="#3B63A1" class="fonte style1"><img src="../topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td height="31" align="left" valign="middle" class="fonte style1">Deletar Foto - Clique sobre a foto para delet&aacute;-la </td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="4">
      <tr>
        <?php
  do { // horizontal looper version 3
?>
        <td><table width="44" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
          <tr>
            <td width="36"><a href="javascript:abrir_janela('foto_deletar_popup.php?id_foto=<?php echo $row_del_foto['id_foto']; ?>','','','350','200','true')"><img src="<?php echo tNG_showDynamicThumbnail("../../", "../../uploads/fotos/", "{del_foto.arquivo}", 80, 60, false); ?>" alt="Deletar esta foto!" border="0" /></a></td>
          </tr>
        </table></td>
        <?php
    $row_del_foto = mysql_fetch_assoc($del_foto);
    if (!isset($nested_del_foto)) {
      $nested_del_foto= 1;
    }
    if (isset($row_del_foto) && is_array($row_del_foto) && $nested_del_foto++ % 6==0) {
      echo "</tr><tr>";
    }
  } while ($row_del_foto); //end horizontal looper version 3
?>
      </tr>
    </table>
        <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="38" align="center" valign="middle"><span class="fonte"><br />
            Ap&oacute;s deletar as fotos desejadas Aperte F5 </span><br />
              <br />
              <table border="0" width="50%" align="center">
              <tr>
                <td width="23%" align="center"><?php if ($pageNum_del_foto > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_del_foto=%d%s", $currentPage, 0, $queryString_del_foto); ?>" class="fonte">Primeira</a>
                  <?php } // Show if not first page ?>                  </td>
                    <td width="31%" align="center"><?php if ($pageNum_del_foto > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_del_foto=%d%s", $currentPage, max(0, $pageNum_del_foto - 1), $queryString_del_foto); ?>" class="fonte">Anterior</a>
                      <?php } // Show if not first page ?>                  </td>
                    <td width="23%" align="center"><?php if ($pageNum_del_foto < $totalPages_del_foto) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_del_foto=%d%s", $currentPage, min($totalPages_del_foto, $pageNum_del_foto + 1), $queryString_del_foto); ?>" class="fonte">Pr&oacute;xima</a>
                      <?php } // Show if not last page ?>                  </td>
                    <td width="23%" align="center"><?php if ($pageNum_del_foto < $totalPages_del_foto) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_del_foto=%d%s", $currentPage, $totalPages_del_foto, $queryString_del_foto); ?>" class="fonte">&Uacute;ltima</a>
                      <?php } // Show if not last page ?>                  </td>
              </tr>
            </table></td>
          </tr>
        </table>      
        <br /></td>
  </tr>
  <tr>
    <td height="20" align="center" valign="middle" bgcolor="#3B63A1"><span class="barnco">Adminstrativo desenvolvido por Victor Caetano - todos os direitos Reservados Xpressbb.com </span></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($del_foto);
?>