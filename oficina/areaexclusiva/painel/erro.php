<?php require_once('../../Connections/ConBD.php'); ?>
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
  
  $LoginRS__query=sprintf("SELECT usuario, senha FROM user WHERE usuario='%s' AND senha='%s'",
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

<title>|| Oficina Criativa ||</title>

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
<link href="../../css/css_oficina_01.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	height:561px;
	z-index:1;
	width: 370px;
	left: 414px;
	top: 260px;
}
-->
</style>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>



<link href="arquivos/css.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="../../painel/arquivos/css.css" rel="stylesheet" type="text/css" />

<link href="../../painel/arquivos/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="180" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="180" valign="top" background="../../img/bg_01.gif"><div align="left"><a href="../../index.php"><img src="../../img/logo.gif" width="198" height="138" border="0" /></a></div></td>
            <td width="770" height="180" valign="top" background="../../img/bg_01.gif"><div align="left">
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="150" valign="middle"><div align="center"><img src="../../img/logo_02.gif" width="419" height="101" /></div></td>
                </tr>
                <tr>
                  <td height="30" bgcolor="#FFFFFF"><div align="left">
                    <table width="770" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" height="30" valign="top"><div align="left"></div></td>
                        <td width="740" height="30" valign="middle" background="../../img/div_02.gif"><div align="left">
                          <table width="740" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><div align="left" class="data_01">Voc&ecirc; est&aacute; em &gt; </div></td>
                              <td width="100" class="titulo_01"><a href="../../index.php">p&aacute;gina inicial &gt; </a></td>
                              <td width="69" class="titulo_01"><div align="left"><a href="../../aescola/index.php">a escola &gt;</a></div></td>
                              <td width="471" class="titulo_01"><div align="left">&Aacute;rea Exclusiva &gt; Painel Administrativo</div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="540" align="center" valign="top"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="540" align="left" valign="top" background="../../img/bg_03.jpg"><div align="left">
              <table width="220" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td height="300" colspan="2"><div align="left">
                    <div align="left">
                      <div align="left">
                        <table width="220" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="6" height="30"><div align="left"></div></td>
                            <td height="30"><div align="center"></div></td>
                          </tr>
                          <tr>
                            <td width="6" height="300"><div align="left"></div></td>
                            <td height="300" align="right" valign="top"><div align="right">
                                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','214','height','300','src','../../flash/menu_aescola1','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','../../flash/menu_aescola1' ); //end AC code
                    </script>
                                <noscript>
                                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="214" height="300">
                                  <param name="wmode" value="transparent"/> 
		     <param name="movie" value="../../flash/menu_aescola1.swf" />
                                  <param name="quality" value="high" />
                                  <embed src="../../flash/menu_aescola1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="214" height="300"></embed>
                                </object>
                                </noscript>
                            </div></td>
                          </tr>
                          <tr>
                            <td width="6"><div align="left"></div></td>
                            <td height="30"><div align="left"></div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><div align="left"></div></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>                    <div align="right"></div></td>
                  </tr>
                <tr>
                  <td width="6"><div align="left"></div></td>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="left"></div></td>
                </tr>
              </table>
            </div></td>
            <td width="30" height="540" align="left" valign="top"><div align="left"></div></td>
            <td width="740" height="540" align="left" valign="top"><div align="left">
              <table width="740" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="30"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="24" valign="middle" bgcolor="#008BE1"><div align="right">
                    <table width="200" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="180" class="txt_01"><div align="right"><a href="#">Sair</a></div></td>
                        <td width="20"><div align="left"></div></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
                
                <tr>
                  <td height="26">                    <table width="513" border="0" align="center" cellpadding="1" cellspacing="2" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                      <tr>
                        <td width="583"><div align="center"><span class="data_02">Painel Administrativo da &aacute;rea exclusiva</span></div></td>
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
                      
                    </table>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <div align="left">
                      <table width="740" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../../img/desenho_01.jpg" width="134" height="94" /></div></td>
                          <td width="60" height="100"><div align="center"></div></td>
                          <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../../img/desenho_02.jpg" width="134" height="94" /></div></td>
                          <td width="60" height="100"><div align="center"></div></td>
                          <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../../img/desenho_03.jpg" width="134" height="94" /></div></td>
                          <td width="60" height="100"><div align="center"></div></td>
                          <td width="140" height="100" bgcolor="#0089E1"><div align="center"><img src="../../img/desenho_04.jpg" width="134" height="94" /></div></td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
                <tr>
                  <td height="26">&nbsp;</td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="21" background="../../img/bg_02.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="220" height="21" align="left" valign="top"><div align="left"></div></td>
            <td width="770" height="21" align="left" valign="top" bgcolor="#FFFFFF"><div align="left"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="94" background="../../img/bg_01.gif"><div align="center">
        <table width="990" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" height="94"><div align="center"></div></td>
            <td width="214" height="94" valign="middle"><div align="left">
              <table width="190" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><div align="left"><img src="../../img/como_chegar_01.gif" width="97" height="19" /></div></td>
                </tr>
                <tr>
                  <td height="4"><div align="left"></div></td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#FFFFFF" class="txt_01"><div align="center"><a href="../../comochegar/index.html"><img src="../../img/logo_mapa_01.gif" width="190" height="40" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
            <td width="400" height="94"><div align="right"><img src="../../img/end_01.gif" width="247" height="52" /></div></td>
            <td width="364" height="94"><div align="right"><a href="http://www.lobsterdesigner.com.br/" target="_blank"><img src="../../img/logo_lobster_01.gif" width="81" height="17" border="0" /></a></div></td>
            <td width="6" height="94"><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
