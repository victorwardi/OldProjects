<?php require_once('log.php'); ?><?php
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
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->

<!-- InstanceEndEditable -->
<link href="../css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../../img/bg_01.gif);
	background-color: #009CE7;
}
.style2 {
	color: #008BE1;
	font-size: 16px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><img src="topo.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td width="242" align="left" valign="top" bgcolor="#FFFFFF"><table width="250" height="100%" border="0" cellpadding="4" cellspacing="2">
      <tr>
        <td bgcolor="#DEE7F8" class="style2">Menu</td>
      </tr>
      <tr>
        <td class="titulo">Novidades</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_inserir.php" class="txt_06">Inserir  </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8" class="txt_06"><a href="novidade_edite.php" class="txt_06">Editar/Excluir </a></td>
      </tr>
      
      <tr>
        <td class="titulo">Galeria de Fotos </td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="galeria_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Fotos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="foto_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">V&iacute;deos</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="video_edite.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Agenda</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_inserir.php">Inserir </a></td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="agenda_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td class="titulo">Logout</td>
      </tr>
      <tr>
        <td bgcolor="#DEE7F8"><a href="<?php echo $logoutAction ?>">Sair</a></td>
      </tr>
      

    </table></td>
    <td width="600" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="titulo">Bem Vindo! </td>
        </tr>
        <tr>
          <td><p>Utilize o menu ao lado para administrar o conte&uacute;do do site! </p>
            <p>&nbsp;</p>
            </td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>