<?php require_once('../Connections/saquabb.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?><?php
mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos ORDER BY id DESC";
$fotos = mysql_query($query_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil";
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil_Y = "SELECT * FROM perfil WHERE aprovado = 'y'";
$perfil_Y = mysql_query($query_perfil_Y, $saquabb) or die(mysql_error());
$row_perfil_Y = mysql_fetch_assoc($perfil_Y);
$totalRows_perfil_Y = mysql_num_rows($perfil_Y);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil_n = "SELECT * FROM perfil WHERE aprovado = 'n'";
$perfil_n = mysql_query($query_perfil_n, $saquabb) or die(mysql_error());
$row_perfil_n = mysql_fetch_assoc($perfil_n);
$totalRows_perfil_n = mysql_num_rows($perfil_n);

mysql_select_db($database_saquabb, $saquabb);
$query_not_saquabb = "SELECT * FROM noticias WHERE coluna = 'saquabb'";
$not_saquabb = mysql_query($query_not_saquabb, $saquabb) or die(mysql_error());
$row_not_saquabb = mysql_fetch_assoc($not_saquabb);
$totalRows_not_saquabb = mysql_num_rows($not_saquabb);

mysql_select_db($database_saquabb, $saquabb);
$query_not_bblagos = "SELECT * FROM noticias WHERE coluna = 'bblagos'";
$not_bblagos = mysql_query($query_not_bblagos, $saquabb) or die(mysql_error());
$row_not_bblagos = mysql_fetch_assoc($not_bblagos);
$totalRows_not_bblagos = mysql_num_rows($not_bblagos);

mysql_select_db($database_saquabb, $saquabb);
$query_not_girls = "SELECT * FROM noticias WHERE coluna = 'girls'";
$not_girls = mysql_query($query_not_girls, $saquabb) or die(mysql_error());
$row_not_girls = mysql_fetch_assoc($not_girls);
$totalRows_not_girls = mysql_num_rows($not_girls);

mysql_select_db($database_saquabb, $saquabb);
$query_festas = "SELECT * FROM festas";
$festas = mysql_query($query_festas, $saquabb) or die(mysql_error());
$row_festas = mysql_fetch_assoc($festas);
$totalRows_festas = mysql_num_rows($festas);

mysql_select_db($database_saquabb, $saquabb);
$query_not_atual = "SELECT * FROM noticias WHERE coluna = 'atualidades'";
$not_atual = mysql_query($query_not_atual, $saquabb) or die(mysql_error());
$row_not_atual = mysql_fetch_assoc($not_atual);
$totalRows_not_atual = mysql_num_rows($not_atual);

mysql_select_db($database_saquabb, $saquabb);
$query_comentarios = "SELECT * FROM comentarios_gf WHERE aprovado = 'n'";
$comentarios = mysql_query($query_comentarios, $saquabb) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

mysql_select_db($database_saquabb, $saquabb);
$query_coment_not = "SELECT * FROM comentarios_not WHERE aprovado = 'n'";
$coment_not = mysql_query($query_coment_not, $saquabb) or die(mysql_error());
$row_coment_not = mysql_fetch_assoc($coment_not);
$totalRows_coment_not = mysql_num_rows($coment_not);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel de Controle</title>
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
<script language="JavaScript" src="../java.js"></script>
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
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0" class="borda_tabela">
  <tr>
    <td height="57" colspan="2"><img src="img/topo.jpg" alt="topo" width="770" height="100" border="0" usemap="#Map" class="borda_topo" /></td>
  </tr>
  <tr>
    <td width="552" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="8" bgcolor="#FFFFFF" class="tabela_meio">
      <tr>
        <td align="center" valign="top"><a href="../index.php"><img src="img/home.jpg" alt="home" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">P&aacute;gina Inicial </span></td>
        <td align="center" valign="top"><a href="arquivos/duvidas.php"><img src="img/duvidas.jpg" alt="duvidas" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">D&uacute;vidas</span></td>
        <td align="center" valign="top"><a href="http://www.saquabb.com.br/cpanel"><img src="img/plesk.png" alt="Gerenciador do Site" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Gerenciador<br /> 
          do Site</span></td>
        <td align="center" valign="top">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="19%" align="center" valign="top"><p><a href="arquivos/not_add.php"><img src="img/news_add.jpg" alt="adicionar noticia" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Adicionar<br />
          Not&iacute;cia</span></p>          </td>
        <td width="20%" align="center" valign="top"><p><a href="arquivos/not_listar.php"><img src="img/news_view.jpg" alt="ver noticias" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Visualizar/Atualizar<br /> 
          Not&iacute;cias </span></p>          </td>
        <td width="19%" align="center" valign="top"><a href="arquivos/not_deletar.php"><img src="img/news_delete.png" alt="Deletar noticias" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Deletar<br />
          Not&iacute;cias</span></td>
        <td align="center" valign="top"><a href="arquivos/foto_add.php"><img src="img/add_foto.jpng.png" alt="Adicionar Fotos" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Adicionar
              Fotos</span></td>
        <td align="center" valign="top"><a href="arquivos/foto_visualizar.php"><img src="img/photo_scenery_view.png" width="32" height="32" /></a><br />
            <span class="fonte_negrito">Visualizar/Atualizar<br />
              Fotos</span></td>
        <td align="center" valign="top"><a href="arquivos/foto_deletar.php"><img src="img/del_foto.png" alt="Deletar Fotos" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Deletar<br />
              Fotos</span></td>
      </tr>
      <tr>
        <td align="center" valign="top"><a href="arquivos/gal_add.php"><img src="img/add_galeria.jpg" alt="galeria" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Adicionar<br />
          Galerias</span></td>
        <td align="center" valign="top"><a href="arquivos/gal_listar.php"><img src="img/ver_gal.jpg" alt="Ver Galeria" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Visualizar/Atualizar<br />
          Galerias</span></td>
        <td align="center" valign="top"><a href="arquivos/gal_deletar.php"><img src="img/del_gal.jpg" alt="deletar galeria" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Deletar <br />
Galerias</span></td>
        <td align="center" valign="top"><p><a href="arquivos/festa_adicionar.php"><img src="img/album_add.png" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Adicionar<br />
          Festa</span> </p>
          </td>
        <td align="center" valign="top"><a href="arquivos/festa_edit.php"><img src="img/album_editar.png" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Visualizar/Atualizar</span><br />
          <span class="fonte_negrito">Festas</span></td>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      
      <tr>
        <td align="center" valign="top"><p><a href="arquivos/perfil_add.php"><img src="img/add_perfil.jpg" alt="Adicionar perfil" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Adicionar<br />
          Perfil</span></p>          </td>
        <td align="center" valign="top"><p><a href="arquivos/perfil_visualizar.php"><img src="img/ver_perfil.jpg" alt="Visualizar Perfil" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Visualizar/Atualizar<br /> 
          Perfil</span></p>          </td>
        <td align="center" valign="top"><a href="arquivos/perfil_deletar.php"><img src="img/del_perfil.jpg" alt="Deletar Perfil" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Deletar<br />
          Perfil</span></td>
        <td align="center" valign="top"><a href="arquivos/perfil_aprovar.php"><img src="img/autorizar_perfil.png" alt="Autorizar Perfil" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Aprovar</span><span class="fonte_negrito"><br />
Perfil</span></td>
        <td align="center" valign="top"><p><a href="arquivos/comentarios.php"><img src="img/coment_ver.png" alt="comente" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Visualizar/Atualizar<br />
            Coment&aacute;rios</span></p>          </td>
        <td align="center" valign="top">&nbsp;</td>
        </tr>
      <tr>
        <td align="center" valign="top"><a href="arquivos/rank_add.php"><img src="../imagens/titulos/rank.jpg" width="32" height="32" border="0" /><br />
          </a><span class="fonte_negrito">Adicionar<br />
            Ranking</span></td>
        <td align="center" valign="top"><p><a href="arquivos/rank_lista.php"><img src="../imagens/titulos/rank_ver.jpg" width="32" height="32" border="0" /></a><br />
            <span class="fonte_negrito">Visualizar/Atualizar<br />
            Ranking</span></p>
          <p><br />
          </p></td>
        <td align="center" valign="top"><a href="arquivos/user_add.php"><img src="img/user_add.jpg" width="32" height="32" border="0" /></a><br />
          <span class="fonte_negrito">Adicionar Usu&aacute;rio </span></td>
        <td align="center" valign="top"><span class="fonte_negrito"><a href="arquivos/user_edite.php"><img src="img/user_edite.jpg" width="32" height="32" border="0" /></a>Editar Usu&aacute;rio</span></td>
        <td align="center" valign="top">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
        </tr>
      <tr>
        <td height="156" colspan="6" align="center" valign="middle"><table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="borda_tabela">
          <tr>
            <td width="13%" height="56" align="center" valign="middle" class="fonte_negrito"><img src="img/warning.jpg" alt="Aviso" width="48" height="48" /></td>
            <td width="87%" class="fonte_negrito"><div align="center">Este painel de controle &eacute; respons&aacute;vel pela administra&ccedil;&atilde;o do seu site, procure trocar sua senha peri&oacute;dicamente e guarde-a em local seguro, para que n&atilde;o ocorra nenhum tipo problema!</div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="59" colspan="6" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="2" class="borda_baixo_estistica">
          <tr>
            <td align="center" valign="middle" class="resultado_estatistica">Administrativo desenvolvido por Victor Caetano - Todos os Direitos Reservados </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="218" align="center" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="4" class="borda_estatistica">
      <tr>
        <td align="center" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="4" class="borda_baixo_estistica">
          <tr class="borda_estatistica">
            <td width="21%" align="center" valign="top"><img src="img/estatisticas.gif" width="32" height="32" /></td>
            <td width="79%" align="left" valign="middle"><span class="fonte_negrito"> Estatisticas</span></td>
          </tr>
        </table>          </td>
        </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="20" class="estatisticas_titulo"><span class="estatisticas_titulo">Noticias</span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_noticias ?> </span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Saquabb: </span><span class="resultado_estatistica"><?php echo $totalRows_not_saquabb ?> </span></td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- BBlagos: </span><span class="resultado_estatistica"><?php echo $totalRows_not_bblagos ?> </span></td>
          </tr>
          <tr>
            <td class="fonte_negrito">- Girls: <span class="resultado_estatistica"><?php echo $totalRows_not_girls ?> </span></td>
          </tr>
          <tr>
            <td class="fonte_negrito">- Atualidades: <span class="resultado_estatistica"><?php echo $totalRows_not_atual ?> </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="fonte_negrito">Total de Fotos:  </span><span class="resultado_estatistica"><?php echo $totalRows_fotos ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td height="20" class="estatisticas_titulo">Perfil de Atletas </td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil ?></span></td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Aprovados: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil_Y ?></span></td>
            </tr>
            <tr>
              <td><span class="fonte_negrito">- Aguardando Aprova&ccedil;&atilde;o: </span><span class="resultado_estatistica"><?php echo $totalRows_perfil_n ?></span></td>
            </tr>
          </table>          </td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="20" class="estatisticas_titulo">&Aacute;lbuns de Festas </td>
          </tr>
          <tr>
            <td><span class="fonte_negrito">- Total: </span><span class="resultado_estatistica"><?php echo $totalRows_festas ?> </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="20" class="estatisticas_titulo">Coment&aacute;rios</td>
          </tr>
          <tr>
            <td><p><span class="fonte_negrito">- Aguardando aprova&ccedil;&atilde;o: <br />
              -bblagos: </span><span class="resultado_estatistica"><?php echo $totalRows_comentarios ?><br />
              </span><span class="fonte_negrito">-Not&iacute;cias: </span><span class="resultado_estatistica"><?php echo $totalRows_coment_not ?> </span></p>
              </td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>

<map name="Map" id="Map">
<area shape="poly" coords="541,11,537,56,576,56,573,10" href="#" alt="Site Seguro!" />
<area shape="circle" coords="612,34,25" href="#" alt="Informa&ccedil;&otilde;es!" />
<area shape="circle" coords="727,33,27" href="<?php echo $logoutAction ?>" alt="Sair do Painel de Controle!" />
<area shape="circle" coords="671,34,21" href="#" alt="Adicionar o Painel ao seus Favoritos!" />
</map></body>
</html>
<?php
mysql_free_result($noticias);

mysql_free_result($fotos);

mysql_free_result($perfil);

mysql_free_result($perfil_Y);

mysql_free_result($perfil_n);

mysql_free_result($not_saquabb);

mysql_free_result($not_bblagos);

mysql_free_result($not_girls);

mysql_free_result($festas);

mysql_free_result($not_atual);

mysql_free_result($comentarios);

mysql_free_result($coment_not);
?>
