<?php require_once('log.php'); ?><br />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/painel.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Painel Administrativo </title>
<!-- InstanceEndEditable -->
<link href="css.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(../../img/fundo.jpg);
	background-color: #28370E;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<link href="../../css/painel.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="750" border="1" align="center" cellpadding="1" cellspacing="4" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" background="../img/base.jpg"><img src="../img/topo.jpg" alt="Painel Administrativo" width="600" height="80" /></td>
  </tr>
  <tr>
    <td width="180" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="left" valign="middle" class="titulomenu">Menu</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Produtos</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="produtos_editar.php">Editar/Excluir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="titulo">Pa&iacute;s</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_inserir.php">Inserir</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="pais_editar.php">Editar/Excluir</a></td>
      </tr>
      
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Topo</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_cima_editar.php">Editar/Excluir</a></td>
      </tr>
      
      <tr>
        <td align="left" valign="middle" class="titulo">Banner Lateral</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_inserir.php">Adicionar</a></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="link"><a href="banner_lateral_editar.php">Editar/Excluir</a></td>
      </tr>
      

      
      <tr>
        <td align="left" valign="middle" class="titulomenu">Logout</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><a href="<?php echo $logoutAction ?>" class="link style6">Sair</a></td>
      </tr>
      
    </table></td>
    <td width="619" align="center" valign="top"><!-- InstanceBeginEditable name="conteudo" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="left" valign="top" class="titulo">Home</td>
        </tr>
        <tr>
          <td height="19" align="left" valign="top">Bem vindo!</td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center" valign="middle" background="../img/base.jpg" bgcolor="#2B90BA"><span class="txt_branco">Painel Administrativo desenvolvido por: <span class="fonte"><span class="txt_branco"><strong>Victor Caetano</strong></span></span></span></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
