<?php require_once('../Connections/ConBD.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "arquivos/";
  $MM_redirectLoginFailed = "erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ConBD, $ConBD);
  
  $LoginRS__query=sprintf("SELECT nome, senha FROM user WHERE nome='%s' AND senha='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $ConBD) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
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
<title>Sistema de Gerenciamento de Quest&otilde;es</title>
<link href="arquivos/css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="806" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td width="800"><img src="arquivos/topo.jpg" alt="Sistema de Gerenciamento de Quest&otilde;es" width="800" height="120" /></td>
  </tr>
  <tr>
    <td height="146" align="center" valign="middle"><p><strong><br />
      Voc&ecirc; n&atilde;o est&aacute; autorizado a acessar esta p&aacute;gina!</strong><br />
Caso esteja, entre com seu nome de usu&aacute;rio e senha! Obrigado! </p>
      <table width="314" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="310"><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="310" border="0" cellspacing="0" cellpadding="2">
            
            <tr>
              <td width="306" align="center"><table width="291" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="80" class="fonte">Usu&aacute;rio:</td>
                  <td width="203"><label>
                    <input name="user" type="text" id="user" size="30" maxlength="30" />
                  </label></td>
                </tr>
                <tr>
                  <td class="fonte">Senha:</td>
                  <td><input name="senha" type="password" id="senha" size="30" maxlength="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left"><label>
                    <input type="submit" name="Submit" value="Entrar" />
                  </label></td>
                </tr>
              </table></td>
            </tr>
          </table>
                </form>        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="38"><img src="arquivos/base.jpg" alt="Sistema de Gerenciamento de Quest&otilde;es" width="800" height="40" /></td>
  </tr>
</table>
</body>
</html>
