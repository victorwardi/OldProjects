<?php require_once('../Connections/saquabb.php'); ?>
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
?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

mysql_select_db($database_saquabb, $saquabb);
$query_noticias = "SELECT * FROM noticias";
$noticias = mysql_query($query_noticias, $saquabb) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);

mysql_select_db($database_saquabb, $saquabb);
$query_secao = "SELECT * FROM coluna";
$secao = mysql_query($query_secao, $saquabb) or die(mysql_error());
$row_secao = mysql_fetch_assoc($secao);
$totalRows_secao = mysql_num_rows($secao);

mysql_select_db($database_saquabb, $saquabb);
$query_fotos = "SELECT * FROM fotos";
$fotos = mysql_query($query_fotos, $saquabb) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

mysql_select_db($database_saquabb, $saquabb);
$query_galeria = "SELECT * FROM galeria";
$galeria = mysql_query($query_galeria, $saquabb) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);
$totalRows_galeria = mysql_num_rows($galeria);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil = "SELECT * FROM perfil";
$perfil = mysql_query($query_perfil, $saquabb) or die(mysql_error());
$row_perfil = mysql_fetch_assoc($perfil);
$totalRows_perfil = mysql_num_rows($perfil);

mysql_select_db($database_saquabb, $saquabb);
$query_comentarios = "SELECT * FROM comentarios_not";
$comentarios = mysql_query($query_comentarios, $saquabb) or die(mysql_error());
$row_comentarios = mysql_fetch_assoc($comentarios);
$totalRows_comentarios = mysql_num_rows($comentarios);

mysql_select_db($database_saquabb, $saquabb);
$query_perfil_apro = "SELECT * FROM perfil WHERE aprovado = 'N' ORDER BY id DESC";
$perfil_apro = mysql_query($query_perfil_apro, $saquabb) or die(mysql_error());
$row_perfil_apro = mysql_fetch_assoc($perfil_apro);
$totalRows_perfil_apro = mysql_num_rows($perfil_apro);

mysql_select_db($database_saquabb, $saquabb);
$query_coment_apro = "SELECT * FROM comentarios_not WHERE aprovado = 'N'";
$coment_apro = mysql_query($query_coment_apro, $saquabb) or die(mysql_error());
$row_coment_apro = mysql_fetch_assoc($coment_apro);
$totalRows_coment_apro = mysql_num_rows($coment_apro);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/controle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: Painel de controle Saquabb ::</title>
<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="arquivos/painel.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><style type="text/css">
<!--
a:link {
	color: #EA8C06;
}
a:visited {
	color: #EA8C06;
}
a:hover {
	color: #EA8C06;
}
a:active {
	color: #EA8C06;
}
a {
	font-weight: bold;
}
.style1 {color: #333333}
-->
</style><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="800" border="1" align="center" cellpadding="4" cellspacing="8" bordercolor="#EA8C06" bgcolor="#FFFFFF">
  <tr>
    <th height="61" colspan="2" bgcolor="#FFFFFF" scope="col"><img src="banner.jpg" width="775" height="120" /></th>
  </tr>
  <tr>
    <th width="152" align="center" valign="top" bgcolor="#FFFFFF" scope="row"><table width="152" border="1" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EA8C06" id="navigation">
      
      <tr>
        <th width="144" height="30" align="center" valign="middle" bgcolor="#EA8C06" scope="row"><a href="home.php">Home</a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto Destaque </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/foto_destaque_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/foto_destaque_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Not&iacute;cia</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/not_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/not_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Categoria </span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/secao_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/secao_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Foto</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/foto_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/foto_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Galeria</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/galeria_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/galeria_edite.php">Editar / Excluir </a></th>
      </tr>
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">V&iacute;deos</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/video_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/video_edite.php">Editar / Excluir </a></th>
      </tr>
      
      
      
      
      
      
      

      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Perfil</span></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/perfil_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/perfil_edite.php">Editar / Excluir</a> </th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><span class="style1">Coment&aacute;rios</span></th>
      </tr>
      
      <tr>
        <th scope="row"><a href="arquivos/comentario_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/comentario_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" align="center" valign="middle" bgcolor="#7FA14D" scope="row"><p class="style1">Uu&aacute;rios</p></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/user_add.php">Adicionar</a></th>
      </tr>
      <tr>
        <th scope="row"><a href="arquivos/user_edite.php">Editar / Excluir </a></th>
      </tr>
      
      <tr>
        <th height="30" bgcolor="#7FA14D" scope="row"><span class="style1">Logout</span></th>
      </tr>
      <tr>
        <th class="Titulo_galeria" scope="row"><a href="http://www.saquabb.com.br" class="Titulo_galeria">Sair</a></th>
      </tr>
      <tr>
        <th bgcolor="#7FA14D" scope="row">&nbsp;</th>
      </tr>
      
      
    </table></th>
    <td width="608" align="center" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#EA8C06">
        <tr>
          <th align="left" valign="middle" bgcolor="#EA8C06" class="Titulo_Branco" scope="col">Bem Vindo ao Painel de Controle InformeBB! </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Utilize o menu ao lado para realizar atualiza&ccedil;&otilde;es no site </th>
        </tr>
        <tr>
          <th align="left" valign="top" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Estat&iacute;sticas</th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Not&iacute;cias: <span class="fonte_titulo_not"><?php echo $totalRows_noticias ?></span> </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Categorias: <span class="fonte_titulo_not"><?php echo $totalRows_secao ?></span> </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Fotos: <span class="fonte_titulo_not"><?php echo $totalRows_fotos ?></span> </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Galerias:<span class="fonte_titulo_not"> <?php echo $totalRows_galeria ?></span> </th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row">Bodyboarders:<span class="fonte_titulo_not"> <?php echo $totalRows_perfil ?></span> </th>
        </tr>
        <tr>
          <th align="left" valign="top" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Perfis Aguardando aprova&ccedil;&atilde;o: <span class="titulo_menu"><?php echo $totalRows_perfil_apro ?> </span></th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row"><?php do { ?>
                <?php if ($totalRows_perfil_apro > 0) { // Show if recordset not empty ?>
                <table width="100%" border="0" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                  <tr>
                    <th width="21%" align="center" valign="middle" scope="col">&nbsp;<img src="<?php echo tNG_showDynamicThumbnail("../", "../perfil/fotos/", "{perfil_apro.foto}", 100, 0, true); ?>" class="borda_gatinhas" /></th>
                    <th width="44%" align="center" valign="middle" scope="col">&nbsp;<?php echo $row_perfil_apro['nome']; ?></th>
                    <th width="35%" align="center" valign="middle" scope="col"><a href="arquivos/perfil_add.php?id=<?php echo $row_perfil_apro['id']; ?>" class="perfil_nome">Aprovar</a></th>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
                <?php } while ($row_perfil_apro = mysql_fetch_assoc($perfil_apro)); ?></th>
        </tr>
        <tr>
          <th align="left" valign="top" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Coment&aacute;rios de Not&iacute;cias Aguardando Aprova&ccedil;&atilde;o : <span class="titulo_menu"><?php echo $totalRows_coment_apro ?> </span></th>
        </tr>
        <tr>
          <th align="left" valign="top" scope="row"><?php do { ?>
              <?php if ($totalRows_coment_apro > 0) { // Show if recordset not empty ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <th width="26%" align="center" class="tiutlo_not" scope="col"><?php echo $row_coment_apro['nome']; ?></th>
                    <th width="54%" align="center" class="fonte_not" scope="col"><?php echo $row_coment_apro['comentario']; ?></th>
                    <th width="20%" align="center" scope="col"><a href="arquivos/comentario_add.php?id_coment=<?php echo $row_coment_apro['id_coment']; ?>">Aprovar</a></th>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
              <?php } while ($row_coment_apro = mysql_fetch_assoc($coment_apro)); ?></th>
        </tr>
        <tr>
          <th align="left" valign="top" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Mais Fun&ccedil;&otilde;es </th>
        </tr>
        <tr>
          <th align="center" valign="middle" bgcolor="#FFFFFF" scope="row"><a href="http://www.google.com/analytics/pt-BR/" target="_blank"><img src="logo_ga.gif" width="227" height="65" border="0" /></a><a href="http://www.saquabb.com.br/cpanel/"></a></th>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <th height="40" colspan="2" bgcolor="#EA8C06" class="Titulo_Branco" scope="row">Painel Administrativo desenvolvido por: Victor Caetano </th>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($noticias);

mysql_free_result($secao);

mysql_free_result($fotos);

mysql_free_result($galeria);

mysql_free_result($perfil);

mysql_free_result($comentarios);

mysql_free_result($perfil_apro);

mysql_free_result($coment_apro);
?>
