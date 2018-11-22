<?php require_once('../../Connections/saquabb.php'); ?>
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_site.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>_____inFORmeBB.com_____________________________________________</title>
<!-- InstanceEndEditable -->
<link href="../../css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style><!-- InstanceEndEditable -->
<style type="text/css">
td img {display: block;}</style>

</head>
<script language="JavaScript" src="../../java.js"></script>
<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write("\<script src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'>\<\/script>" );
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1480426-7");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<script src="../../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table height="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td height="120" colspan="2" align="center" valign="top"><a href="../../carnaporto/index.php"></a>
      <table width="83%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="27%" align="center" valign="top" scope="col"><img name="logo_menu" src="../../imagens/recorte/logo_menu.jpg" width="238" height="311" border="0" id="logo_menu" alt="" /></th>
          <th width="8%" align="center" valign="top" scope="col"><img name="layout_r1_c3" src="../../imagens/recorte/layout_r1_c2.jpg" width="72" height="311" border="0" id="layout_r1_c3" alt="" /></th>
          <th width="60%" align="center" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><img name="layout_r1_c4" src="../../imagens/recorte/layout_r1_c3.jpg" width="540" height="40" border="0" id="layout_r1_c4" alt="" /></th>
            </tr>
            <tr>
              <td align="center" valign="top">
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','540','height','240','src','destaque','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','Transparent','movie','destaque' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="540" height="240">
      <param name="movie" value="../../destaque.swf" />
	    <param name="wmode" value="transparent"/>
      <param name="quality" value="high" />
      <embed src="../../destaque.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="540" height="240"></embed>
    </object>
    </noscript>
			 </td>
            </tr>
            <tr>
              <td><img name="layout_r3_c4" src="../../imagens/recorte/layout_r3_c3.jpg" width="540" height="31" border="0" id="layout_r3_c4" alt="" /></td>
            </tr>
          </table></th>
          <th width="5%" align="center" valign="top" scope="col"><img name="layout_r1_c5" src="../../imagens/recorte/layout_r1_c4.jpg" width="50" height="311" border="0" id="layout_r1_c5" alt="" /></th>
        </tr>
        <tr>
          <th height="146" colspan="4" align="center" valign="top" background="../../imagens/recorte/fundo_pg.jpg" scope="col"><table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="18%" align="left" valign="top" scope="col"><table width="191" border="0" cellpadding="0" cellspacing="10">
                <tr>
                  <td width="5" align="left" valign="top" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td width="147" align="left" valign="middle" class="fonte_menu"><a href="../../index.php" class="fonte_menu">P&aacute;gina Inicial </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../arquivo.php" class="fonte_menu">Not&iacute;cias </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../galerias.php" class="fonte_menu">Galerias de Fotos</a> </td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../videos.php" class="fonte_menu">V&iacute;deos</a></td>
                </tr>
                
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../perfil.php" class="fonte_menu"> Bodyboarders </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../cadastro.php" class="fonte_menu">Cadastrar-se</a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle" background="../../imagens/recorte/fundo_tab.jpg">&nbsp;</td>
                  <td align="left" valign="middle" class="fonte_menu"><a href="../../contato.php" class="fonte_menu">Fale Conosco </a></td>
                </tr>
              </table></th>
              <th width="82%" align="left" valign="top" scope="col"><!-- InstanceBeginEditable name="conteudo" -->
          <table width="100%" height="100%" border="0" cellpadding="4" cellspacing="8" bgcolor="#E6F9FD">
            <tr>
              <th align="center" bgcolor="#017C9E" scope="col"><span class="Titulo_Branco">Administrativo da Coluna - Qu&eacute; se eu? </span></th>
            </tr>
            <tr>
              <th align="center" valign="top" scope="row"><form id="login" name="login" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="50%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td width="30%" align="left" valign="middle" class="fonte">Usu&aacute;rio:</td>
              <td width="70%" align="left" valign="middle"><input name="usuario" type="text" id="usuario" size="32" /></td>
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
              </form>   </th>
            </tr>
            <tr>
              <th align="center" bgcolor="#017C9E" scope="row"><a href="gabriel.php" class="style1">Voltar para o Site </a></th>
            </tr>
          </table>
        <!-- InstanceEndEditable --></th>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></th>
        </tr>
      </table></td>
  </tr>
      <tr>
        <td width="889" height="53" align="center" valign="top" background="../../imagens/recorte/base_pg.jpg"><br />
        <br /></td>
        <td width="1" align="left" valign="top"></td>
      </tr>
      
      <tr>
        <td height="40" colspan="2" align="center" valign="top"><img src="../../imagens/recorte/rodape.jpg" width="900" height="92" /></td>
      </tr>
</table>    
</td>
  </tr>
  <tr>
</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($login);
?>