<?php require_once('../Connections/xpress.php'); ?>
<?php
mysql_select_db($database_xpress, $xpress);
$query_not = "SELECT * FROM noticias";
$not = mysql_query($query_not, $xpress) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);
$totalRows_not = mysql_num_rows($not);

mysql_select_db($database_xpress, $xpress);
$query_equipe = "SELECT * FROM equipe";
$equipe = mysql_query($query_equipe, $xpress) or die(mysql_error());
$row_equipe = mysql_fetch_assoc($equipe);
$totalRows_equipe = mysql_num_rows($equipe);

mysql_select_db($database_xpress, $xpress);
$query_fotos = "SELECT * FROM fotos";
$fotos = mysql_query($query_fotos, $xpress) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

mysql_select_db($database_xpress, $xpress);
$query_ofertas = "SELECT * FROM ofertas";
$ofertas = mysql_query($query_ofertas, $xpress) or die(mysql_error());
$row_ofertas = mysql_fetch_assoc($ofertas);
$totalRows_ofertas = mysql_num_rows($ofertas);
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

$MM_restrictGoTo = "index.php";
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Xpresbb.com_______________________________________________________________</title>
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
<link href="../css.css" rel="stylesheet" type="text/css" />
<!--Script png transparente-->
<script language="JavaScript">
	function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
	{
	   var arVersion = navigator.appVersion.split("MSIE")
	   var version = parseFloat(arVersion[1])
	   if ((version >= 5.5) && (document.body.filters)) 
	   {
		  for(var i=0; i<document.images.length; i++)
		  {
			 var img = document.images[i]
			 var imgName = img.src.toUpperCase()
			 if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
			 {
				var imgID = (img.id) ? "id='" + img.id + "' " : ""
				var imgClass = (img.className) ? "class='" + img.className + "' " : ""
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
				var imgStyle = "display:inline-block;" + img.style.cssText 
				if (img.align == "left") imgStyle = "float:left;" + imgStyle
				if (img.align == "right") imgStyle = "float:right;" + imgStyle
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
				var strNewHTML = "<span " + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
				img.outerHTML = strNewHTML
				i = i-1
			 }
		  }
	   }    
	}
	window.attachEvent("onload", correctPNG);
	</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle" bgcolor="#3B63A1"><img src="topo.jpg" width="600" height="80" /></td>
  </tr>
  <tr>
    <td height="257" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabela_fundo">
      <tr>
        <td width="2%" align="left" valign="middle"><p class="fonte">&nbsp;</p>          </td>
        <td width="76%" align="left" valign="middle"><span class="fonte">Bem Vindo ao Administrativo Do Site XpressBB.com! <br />
Aqui voc&ecirc; controla todo o conte&uacute;do do Site!<br />
<br />
<br />
        </span></td>
        <td width="1%" rowspan="2" align="center" valign="top">&nbsp;</td>
        <td width="21%" rowspan="2" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linha">
          <tr>
            <td height="40" align="center" valign="middle"> <img src="img/estatisticas.jpg" width="32" height="32" /></td>
            <td align="left" valign="middle" class="fonte">Estat&iacute;sticas </td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="left"><span class="fonte">Not&iacute;cias:</span> <span class="total"><?php echo $totalRows_not ?></span> </td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="left"><span class="fonte">Fotos: </span><span class="total"><?php echo $totalRows_fotos ?> </span></td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="left"><span class="fonte">Membros na Equipe: <span class="total"><?php echo $totalRows_equipe ?></span></span></td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="left">              <span class="fonte">Ofertas: </span><span class="total"><?php echo $totalRows_ofertas ?> </span></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top"><table width="81%" border="0" cellpadding="4" cellspacing="2" class="tabela_meio">
          <tr>
            <td align="center" valign="top"><a href="../index.php"><img src="img/home.jpg" alt="home" width="32" height="32" border="0" /></a><br />
                <span class="fonte">P&aacute;gina Inicial </span></td>
            <td align="center" valign="top"><a href="arquivos/duvidas.php"><img src="img/duvidas.jpg" alt="duvidas" width="32" height="32" border="0" /></a><br />
                <span class="fonte">D&uacute;vidas</span></td>
            <td align="center" valign="top"><a href="http://www.xpressbb.com/cpanel"><img src="img/plesk.png" alt="Gerenciador do Site" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Gerenciador<br />
                  do Site</span></td>
            <td width="80" align="center" valign="top">&nbsp;</td>
            <td width="80" align="center" valign="top">&nbsp;  </td>
          </tr>
          <tr>
            <td width="19%" align="center" valign="top"><p><a href="arquivos/not_add.php"><img src="img/news_add.jpg" alt="adicionar noticia" width="32" height="32" border="0" /></a><br />
                    <span class="fonte">Adicionar<br />
                      Not&iacute;cia</span></p></td>
            <td width="20%" align="center" valign="top"><p><a href="arquivos/not_edite.php"><img src="img/news_view.jpg" alt="ver noticias" width="32" height="32" border="0" /></a><br />
                    <span class="fonte">Visualizar/Atualizar<br />
                      Not&iacute;cias </span></p></td>
            <td width="19%" align="center" valign="top"><a href="arquivos/not_edite.php"><img src="img/news_delete.png" alt="Deletar noticias" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Deletar<br />
                  Not&iacute;cias</span></td>
            <td align="center" valign="top"><a href="arquivos/foto_add.php"><img src="img/add_foto.jpng.png" alt="Adicionar Fotos" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Adicionar
                  Fotos</span></td>
            <td align="center" valign="top"><a href="arquivos/deletar_foto.php"><img src="img/del_foto.png" alt="Deletar Fotos" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Deletar<br />
                  Fotos</span></td>
          </tr>
          <tr>
            <td align="center" valign="top"><p><a href="arquivos/equipe_add.php"><img src="img/add_perfil.jpg" alt="Adicionar perfil" width="32" height="32" border="0" /></a><br />
                    <span class="fonte">Adicionar<br />
                      Atleta </span></p></td>
            <td align="center" valign="top"><p><a href="arquivos/equipe_edite.php"><img src="img/ver_perfil.jpg" alt="Visualizar Perfil" width="32" height="32" border="0" /></a><br />
                    <span class="fonte">Visualizar/Atualizar<br />
                      Atleta</span></p></td>
            <td align="center" valign="top"><a href="arquivos/equipe_edite.php"><img src="img/del_perfil.jpg" alt="Deletar Perfil" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Deletar<br />
                  Atleta</span></td>
            <td align="center" valign="top"><a href="arquivos/oferta_add.php"><img src="img/box_add.png" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Adicionar<br />
                  Ofertas</span></td>
            <td align="center" valign="top"><a href="arquivos/oferta_edite.php"><img src="img/box_delete.png" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Deletar<br />
                  Ofertas</span></td>
          </tr>
          <tr>
            <td align="center" valign="top"><a href="arquivos/oferta_add.php"><img src="img/box_add.png" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Adicionar<br />
                  Ofertas</span></td>
            <td align="center" valign="top"><a href="arquivos/oferta_edite.php"><img src="img/box_delete.png" width="32" height="32" border="0" /></a><br />
                <span class="fonte">Deletar<br />
                  Ofertas</span></td>
            <td align="center" valign="top"><a href="arquivos/apagar_coment.php"><img src="img/del_not.jpg" width="32" height="32" border="0" /></a><br />
              <span class="fonte">Deletar <br />
              Coment&aacute;rios</span></td>
            <td align="center" valign="top"><a href="arquivos/prancha_add.php"><img src="img/prancha.jpg" width="40" height="32" border="0" /></a><br />
              <span class="fonte">Adicionar<br /> 
              Prancha
</span></td>
            <td align="center" valign="top"><a href="arquivos/prancha_edite.php"><img src="img/pranchax.jpg" width="40" height="32" border="0" /></a><br />
              <span class="fonte">Deletar<br /> 
              Prancha
</span></td>
          </tr>
        </table>
          <br />
          <br />
          <br />
          <p><br />
          </p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" align="center" valign="middle" bgcolor="#3E60A7" class="barnco">Adminstrativo desenvolvido por Victor Caetano - todos os direitos Reservados Xpressbb.com </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($not);

mysql_free_result($equipe);

mysql_free_result($fotos);

mysql_free_result($ofertas);
?>
