<?php require_once('../Connections/saquabb.php'); ?>
<?php
mysql_select_db($database_saquabb, $saquabb);
$query_login = "SELECT * FROM `user`";
$login = mysql_query($query_login, $saquabb) or die(mysql_error());
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
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_saquabb, $saquabb);
  	
  $LoginRS__query=sprintf("SELECT nome, senha, level FROM user WHERE nome='%s' AND senha='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $saquabb) or die(mysql_error());
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>______________________Administrativo Saquabb.com.br_______________________________________________________________</title>
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
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF" class="tabela_fundo">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><img src="banner.jpg" width="775" height="120" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#DFF4F5"><p>&nbsp;</p>
    <p align="center">&nbsp;</p>
    <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#007B9D" bgcolor="#FFFFFF">
      <tr>
        <td height="20" bgcolor="#007B9D"><div align="center" class="barnco">
          <p class="mais_festa">Entrar no Painel </p>
          </div></td>
      </tr>
      <tr>
        <td align="center" valign="top"><form id="login" name="login" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="95%" border="0" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td width="27%" align="left" valign="middle" class="fonte">Usu&aacute;rio:</td>
              <td width="73%" align="left" valign="middle"><input name="usuario" type="text" id="usuario" size="32" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="fonte">Senha: </td>
              <td align="left" valign="middle"><input name="senha" type="password" id="senha" size="32" /></td>
            </tr>
            <tr>
              <td height="40" colspan="2"><div align="center">
                <input name="Entrar" type="submit" id="Entrar" value="Entrar" />
              </div></td>
              </tr>
          </table>
          </form>        </td>
      </tr>
    </table>
    <p><a href="../index.php" class="fonte_titulo_not">Voltar para o Site </a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle" bgcolor="#FFFFFF"><p class="barnco"><img src="../imagens/rodape.jpg" width="775" height="40" /></p>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($login);
?>
