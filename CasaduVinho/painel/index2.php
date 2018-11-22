<?php require_once('../Connections/ConBD.php'); ?>
<?php
mysql_select_db($database_ConBD, $ConBD);
$query_login = "SELECT * FROM `user`";
$login = mysql_query($query_login, $ConBD) or die(mysql_error());
$row_login = mysql_fetch_assoc($login);
$totalRows_login = mysql_num_rows($login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "arquivos/home.php";
  $MM_redirectLoginFailed = "?erro=true";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ConBD, $ConBD);
  	
  $LoginRS__query=sprintf("SELECT nome, senha, level FROM user WHERE nome='%s' AND senha='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $ConBD) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exemplo de rodap&eacute; sempre no fim da p&aacute;gina</title>
<style media="screen" type="text/css">
* { margin:0; padding:0; border:0; }
body {
	font:1.2em Arial, Helvetica, sans-serif;
	background-color: #FFFFFF;
}
#content {
	width:100%;
	margin:auto;
}
.form {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #571C32;
	border: 1px solid #000000;
}
#content h1 {
	text-align:center;
	margin:0 0 10px;
	background-image: url(img/base.jpg);
}
#content p {
	padding:5px 40px 10px;
	background-color: #FFFFFF;
	text-align: center;
}
#rodape { background:#9c0; text-align:center; padding:10px 0; }

/* Propriedades utilizadas para posicionar o rodape */
html, body {
	height:100%;/* Necessário */
}
#wrap {
	position:relative;
	min-height:100%;/* Necessário para alguns browsers modernos */
	height:auto !important;/* Necessário para alguns browsers modernos */
	height:100%;/* Para o Internet Explorer */
}
#content {
	padding-bottom:45px;/* Diferença para o rodapé não cobrir uma parte do conteúdo, é o mesmo valor da altura do rodapé */
}
#rodape {
	width:100%;
	position:absolute;
	bottom:0 !important;
	bottom:-1px;
	background-image: url(img/base.jpg);
	height: 50px;
	text-align: center;
	vertical-align: middle;
}
.fonte {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #333333;
}
.erro {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	line-height: normal;
	font-weight: bold;
	color: #FF0000;
}
</style>
</head>
<body>
<div id="wrap">
<div id="content">
<h1><img src="img/topo.jpg" width="600" height="80" /></h1>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" class="fonte_negrito">
  <tr>
    <td height="20" align="center" valign="bottom"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><form id="login" method="post" action="<?php echo $loginFormAction; ?>">
      <table width="95%" border="0" cellpadding="0" cellspacing="2" class="fonte">
        <tr>
          <td height="30" colspan="2" align="center" valign="middle"><?php if (isset ($_GET['erro']) ){?>
                <span class="erro">Usu&aacute;rio ou senha  inv&aacute;lidos! </span>
                <?php } ?></td>
        </tr>
        <tr>
          <td align="left" valign="middle" class="comentario">Usu&aacute;rio:</td>
          <td align="left" valign="middle"><input name="usuario" type="text" class="form" id="usuario" size="32" /></td>
        </tr>
        <tr>
          <td align="left" valign="middle" class="comentario">Senha: </td>
          <td align="left" valign="middle"><input name="senha" type="password" class="form" id="senha" size="32" /></td>
        </tr>
        <tr>
          <td height="40" colspan="2"><div align="center">
            <input name="Entrar" type="submit" id="Entrar" value="Entrar" />
          </div></td>
        </tr>
        <tr>
          <td height="14" colspan="2" align="center"><a href="../index.php" class="fonte">Voltar para o Site </a></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p class="fonte">Desenvolvido por: <a href="http://www.saquabb.com.br/victor" class="fonte">Victor Caetano</a></p>
</div><!-- /#content -->
<div id="rodape">

</div><!-- /#rodape -->
</div><!-- /#wrap -->
</body>
</html>
<?php
mysql_free_result($login);
?>