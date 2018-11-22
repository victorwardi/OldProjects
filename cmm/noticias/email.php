<?php require_once('../Connections/ConBD.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_RsNoticias = "-1";
if (isset($_GET['noticiaID'])) {
  $colname_RsNoticias = $_GET['noticiaID'];
}
mysql_select_db($database_ConBD, $ConBD);
$query_RsNoticias = sprintf("SELECT * FROM novidades WHERE noticiaID = %s", GetSQLValueString($colname_RsNoticias, "int"));
$RsNoticias = mysql_query($query_RsNoticias, $ConBD) or die(mysql_error());
$row_RsNoticias = mysql_fetch_assoc($RsNoticias);
$totalRows_RsNoticias = mysql_num_rows($RsNoticias);

ob_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>C&acirc;mara Municipal de Mangaratiba</title>
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
<link href="../css/css_cmm_01.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
#Layer5 {	position:absolute;
	z-index:1;
	top: 16px;
}
-->
</style>
</head>

<body onload="MM_preloadImages('../img/link_noticias_0102.gif')">
<div align="center">
  <?php
  $sectemailObj = new tNG_EmailPageSection();
  $sectemailObj->getCSSFrom(__FILE__);
  $sectemailObj->setTo("{POST.para}");
  $sectemailObj->setFrom("{POST.de}");
  $sectemailObj->setSubject("{POST.nome} enviou esta notícia para você.");
  $sectemailObj->setFormat("HTML/Text");
  $sectemailObj->setEncoding("ISO-8859-1");
  $sectemailObj->setImportance("Normal");
  $sectemailObj->BeginContent();
?>
    <table width="696" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="45">&nbsp;</td>
        <td width="598" height="20">&nbsp;</td>
        <td width="45">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center">
          <table width="604" cellspacing="0" cellpadding="0">
            <tr class="txt_01">
              <td width="135"><div align="left"><img src="../img/logo_02.jpg" width="73" height="79" /></div></td>
              <td width="223" valign="bottom" class="txt_01"><div align="left"><a href="../index.php">www.cmmangaratiba.rj.gov.br</a></div></td>
              <td width="132" align="right" valign="bottom" class="qua"><div align="right"></div></td>
              <td width="106" align="right" valign="bottom" class="qua"><div align="right"></div></td>
            </tr>
            </table>
        </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td height="25"><div align="left"></div></td>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td height="1"><div align="left"></div></td>
        <td height="20" bgcolor="#4F4C69"><div align="left" class="data_01">&nbsp;&nbsp;<strong> <?php echo $_POST['nome']; ?></strong> enviou esta not&iacute;cia para voc&ecirc;.</div></td>
        <td height="1"><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td height="25"><div align="left"></div></td>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="txt_01"><div align="left" class="titulo_01"><?php echo $row_RsNoticias['titulo']; ?></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" class="txt_03"><div align="justify">
          <p class="txt_01"><?php echo $row_RsNoticias['materia']; ?></p>
        </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td height="30"><div align="left" class="select_link_01">Data: <span class="txt_02"><?php echo $row_RsNoticias['data']; ?></span></div></td>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td height="1"><div align="left"></div></td>
        <td height="1" bgcolor="#4F4C69"><div align="left"></div></td>
        <td height="1"><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td height="25"><div align="left">
          <table width="598" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="30" class="select_link_01"><div align="left"><strong>URL:</strong></div></td>
                <td width="568" class="txt_01"><div align="left"><a href="http://www.cmmangaratiba.rj.gov.br/noticia.php?noticiaID=<?php echo $row_RsNoticias['noticiaID']; ?>">http://www.cmmangaratiba.rj.gov.br/noticia.php?noticiaID=<?php echo $row_RsNoticias['noticiaID']; ?></a></div></td>
              </tr>
            </table>
        </div></td>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td height="1"><div align="left"></div></td>
        <td height="1" bgcolor="#4F4C69"><div align="left"></div></td>
        <td height="1"><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td height="30"><div align="left"></div></td>
        <td><div align="left"></div></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td><div align="center">
          <table width="604" cellspacing="0" cellpadding="0">
            <tr>
              <td width="257" height="19"><div align="left">
                <table width="260" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="1"><div align="left"><img src="../img/img_email_02.jpg" width="25" height="31" /></div></td>
                      <td width="235"><div align="left">
                        <table width="235" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><div align="left"><img src="../img/img_email_02_2.jpg" width="34" height="10" /></div></td>
                            </tr>
                          <tr>
                            <td valign="bottom"><div align="left"><a href="mailto:contato@cmmangaratiba.rj.gov.br">contato@cmmangaratiba.rj.gov.br</a></div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                  </table>
              </div></td>
              <td width="9">&nbsp;</td>
              <td width="283" align="right"><div align="right">
                <table width="115" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="1"><div align="left"><img src="../img/img_telefone_02.jpg" width="25" height="31" /></div></td>
                      <td width="95"><div align="left">
                        <table width="90" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><div align="left"><img src="../img/img_telefone_02_2.jpg" width="47" height="10" /></div></td>
                            </tr>
                          <tr>
                            <td class="txt_01"><div align="left">[21] 2789 1440 </div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td height="19" colspan="3" background="file:///C|/Documents and Settings/Administrador/Meus documentos/projetos_2007/Conclu&iacute;dos/img/img_linha_01.jpg">&nbsp;</td>
            </tr>
            <tr>
              <td height="19" colspan="3" align="center" valign="top" class="txt_01"><div align="center">Travessa Vereador Vivaldo Eloy da Silva Passos, s/n&ordm; &nbsp;-&nbsp; Centro &nbsp;-&nbsp; Mangaratiba &nbsp;-&nbsp; RJ &nbsp;&nbsp;-&nbsp; &nbsp;CEP: 23860-000</div></td>
            </tr>
            </table>
        </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="25">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        </table>
    <?php
  $sectemailObj->EndContent();
  $sectemailObj->Execute();
?></div>
</body>
</html>
<?php
mysql_free_result($RsNoticias);

//Redirect Email sectemailObj
  $redObj = new tNG_Redirect(null);
  $redObj->setURL("ok.php");
  $redObj->setKeepURLParams(true);
  $redObj->Execute();
//End Redirect Email sectemailObj
?>
