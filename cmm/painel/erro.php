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
<title>Painel Administrativo</title>
<link href="arquivos/css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>
<link href="../css/css_cmm_01.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="487" border="0" align="center" cellpadding="8" cellspacing="2">
  <tr>
    <td width="481" height="81" align="center"><img src="../img/logo_02.jpg" width="73" height="79" /></td>
  </tr>
  <tr>
    <td height="122" align="center" valign="middle"><p class="select_link_01">Ocorreu um erro, tente novamente.</p>
    <table width="220" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="257"><form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="216" border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
            
            <tr>
              <td width="200" align="center"><table width="187" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td width="49" align="left" class="fonte">Usu&aacute;rio:</td>
                  <td width="122" align="left"><label>
                    <input name="user" type="text" class="bt_01" id="user" size="20" maxlength="255" />
                  </label></td>
                </tr>
                <tr>
                  <td align="left" class="fonte">Senha:</td>
                  <td align="left"><input name="senha" type="password" class="bt_01" id="senha" size="20" maxlength="255" /></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label>
                  <input type="image" name="ok" id="ok" src="arquivos/ok_painel.jpg" />
                  </label></td>
                </tr>
              </table></td>
            </tr>
          </table>
                </form>        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
