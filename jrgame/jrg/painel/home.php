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
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel de Controle - JrGames</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #000000;
}
#navigation td {
	background-color: #FFC904;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FFFFFF;
	padding-left: 4px;
	padding-right: 4px;
	padding-top: 0px;
	padding-bottom: 0px;
	}
	
#navigation a {
	color: #000000;
	line-height:16px;
	letter-spacing:.1em;
	text-decoration: none;
	display:block;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	padding-top: 8px;
	padding-right: 6px;
	padding-bottom: 8px;
	padding-left: 8px;
	}
	
#navigation a:hover {
	color:#FFCC00;
	background-color: #FFFFFF;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 14px 45%;
	}
.titulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	font-weight: bolder;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
	font-weight: bolder;
	}
#conteudo td {
	left: 10px;
}
#tabela td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: normal;
	font-weight: bolder;
	color: #000000;
	background-color: #FFFFFF;
	border: 1px solid #666666;
}
#tabela li {
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #666666;
	border-right-color: #666666;
	border-bottom-color: #666666;
	border-left-color: #666666;
}
.borda {
	border: 1px solid #000000;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="770" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="borda">
  <tr>
    <td height="68" colspan="2" bgcolor="#FFC904"><img src="imagens/topoindex.jpg" alt="topo" width="600" height="96" border="0" /></td>
  </tr>
  <tr>
    <td width="155" height="307" align="center" valign="top" bgcolor="#FFC904"><table width="168" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFF99" id="navigation">
      
      <tr>
        <td width="168" height="26" colspan="2" bgcolor="#000000" class="titulo2">Filme</td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="filme_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_add.php">Inserir foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="fotos_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      <tr>
        <td height="29" colspan="2" class="titulo2">Not&iacute;cia</td>
      </tr>
      <tr>
        <td colspan="2"><a href="not_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="not_edite.php">Editar/Excluir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_add.php">Adicionar Foto </a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="foto_not_edite.php">Editar/Excluir Foto </a></td>
        </tr>
      
      <tr>
        <td height="30" colspan="2" class="titulo2">G&ecirc;nero</td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_add.php">Inserir</a></td>
        </tr>
      <tr>
        <td colspan="2"><a href="genero_edite.php">Editar/Excluir</a></td>
        </tr>
      
    </table>
    <p><a href="<?php echo $logoutAction ?>"><img src="imagens/logout.jpg" alt="logout" width="85" height="32" border="0" /></a></p>
    <p>&nbsp;</p></td>
    <td width="615" align="left" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td><table width="515" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="507" align="center" bgcolor="#FFC904"><p class="titulo">Bem vindo ao Administrativo JrGames VideoLocadora</p>
                </td>
            </tr>
            <tr>
              <td><p>Use o menu ao lado para administrar o conte&uacute;do do site!</p>
                <p>Est&aacute; com D&uacute;vidas?</p>
                <p>Cel: (22) 9256 3090 - Victor Caetano </p>
                <p>E-mail: saquabb@hotmail.com</p>
                <p>MSN: victorsaquabb@hotmail.com</p></td>
            </tr>
          </table>            <p class="titulo">&nbsp;</p>
          </td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle" bgcolor="#FFC904"><p><span class="resultado_estatistica"><strong>Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
  JrGames VideoLocadora&reg; </strong></span></p>
    </td>
  </tr>
</table>

</body>
<!-- InstanceEnd --></html>
