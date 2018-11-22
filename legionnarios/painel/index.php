<?php require_once('../Connections/legion.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "arquivos/home.php";
  $MM_redirectLoginFailed = "erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_legion, $legion);
  
  $LoginRS__query=sprintf("SELECT nome, senha FROM user WHERE nome='%s' AND senha='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $legion) or die(mysql_error());
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
<title>Painel de Controle - Legionnarios</title>

<style type="text/css">
<!--
body {
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
	color: #999999;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style1 {
	color: #FFFFFF;
	font-size: 12px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style2 {color: #FFFFFF; font-size: 12px; font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>


</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="47" align="left" valign="middle" bgcolor="#4D494A"><img src="arquivos/topo.jpg" width="600" height="96" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;

      <p>

      <p><form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST" >
        <table width="250" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
    <tr>
      <th bgcolor="#000000" class="style2" scope="col">Entrar no Painel </th>
    </tr>
    <tr>
      <th scope="row"><table width="100%" border="0" cellpadding="0" bgcolor="#FFFFFF">
        <tr>
          <th align="left" valign="middle" scope="col">Usu&aacute;rio:</th>
          <th align="left" valign="middle" scope="col"><label>
            <input name="login" type="text" id="login" size="20" maxlength="20" />
          </label></th>
        </tr>
        <tr>
          <th align="left" valign="middle" scope="row">Senha:</th>
          <th align="left" valign="middle" scope="row"><input name="senha" type="password" id="senha" size="20" maxlength="20" /></th>
        </tr>
        <tr>
          <th colspan="2" scope="row"><label>
            <input name="entrar2" type="submit" id="entrar2" value="Entrar" />
                    </label></th>
          </tr>
      </table></th>
    </tr>
  </table>
      </form>&nbsp;</p>
      </p>
<p><a href="../index.php">Voltar para a p&aacute;gina inicial </a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#4D494A"><strong class="othermonth_cal style1">Painel de Controle desenvolvido por <a href="mailto:saquabb@hotmail.com">Victor Caetano</a> - Todos os Direitos Reservados <br />
      Legionnarios.com
      a&reg; </strong></td>
  </tr>
</table>
</body>
</html>
