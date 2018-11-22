<?php require_once('../Connections/ConVBS.php'); ?>
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
  $MM_redirectLoginSuccess = "arquivos/home.php";
  $MM_redirectLoginFailed = "erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ConVBS, $ConVBS);
  
  $LoginRS__query=sprintf("SELECT nome, senha FROM user WHERE nome='%s' AND senha='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $ConVBS) or die(mysql_error());
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
<title>Painel Administrativo VBS</title>
<link href="arquivos/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(../img/bg_index_02.gif);
}
-->
</style>
<link href="../stilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body>
<table width="600" border="1" align="center" cellpadding="1" cellspacing="2" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
  <tr>
    <td><img src="arquivos/painel.jpg" alt="Painel Administrativo" width="850" height="80" /></td>
  </tr>
  <tr>
    <td height="146" align="center" valign="middle"><p>&nbsp;</p>
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
                  <td><label>
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
    <td height="38"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="71%" align="center"><span class="fonte">Painel Administrativo desenvolvido por <span class="style1"><a href="http://www.saquabb.com.br/victor">Victor Cae</a></span></span><strong><a href="http://www.saquabb.com.br/victor">tano</a></strong></td>
          <td width="15%">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
