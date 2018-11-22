<?php require_once('Connections/conBD.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

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

mysql_select_db($database_conBD, $conBD);
$query_RsOutrosDestaques = "SELECT * FROM carro ORDER BY carroId DESC LIMIT 3,3";
$RsOutrosDestaques = mysql_query($query_RsOutrosDestaques, $conBD) or die(mysql_error());
$row_RsOutrosDestaques = mysql_fetch_assoc($RsOutrosDestaques);
$totalRows_RsOutrosDestaques = mysql_num_rows($RsOutrosDestaques);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("fotos/");
$objDynamicThumb1->setRenameRule("{RsOutrosDestaques.fotoDestaque}");
$objDynamicThumb1->setResize(100, 75, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|| Vadico Veículos - Multimarcas ||</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<table width="762" border="0" align="center" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" align="center"><img src="imagens/banner_site.jpg" alt="Vadico Veiculos" width="750" height="208" /></td>
  </tr>
  <tr>
    <td colspan="2" class="menu_site">Página Inicial&nbsp;&nbsp;|&nbsp;&nbsp;Estoque&nbsp;&nbsp;|&nbsp;&nbsp;Comprar&nbsp;&nbsp;|&nbsp;&nbsp;Vender&nbsp;&nbsp;|&nbsp;&nbsp;Localização&nbsp;&nbsp;|&nbsp;&nbsp;Contato</td>
  </tr>
  <tr>
    <td><table width="100" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td width="400" height="222"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','400','height','300','title','destaques','src','destaques','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','destaques' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="400" height="300" title="destaques">
          <param name="movie" value="destaques.swf" />
          <param name="quality" value="high" />
          <embed src="destaques.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="400" height="300"></embed>
        </object></noscript></td>
        </tr>
      
    </table></td>
    <td align="center" valign="top" bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#CCCCCC">
      

      <tr>
        <td height="10" align="left" bgcolor="#666666" class="titulos"><span class="txt_titulo_carro">&raquo;</span> Busca Simples</td>
      </tr>
      <tr>
        <td height="40" align="center"><label>
          <input name="textfield" type="text" class="txt_detalhes" id="textfield" size="40" />
          <input name="button" type="submit" class="bt_buscar" id="button" value="buscar" />
        </label></td>
      </tr>
      
      <tr>
        <td align="left" bgcolor="#666666" class="titulos"><span class="txt_titulo_carro">&raquo;</span> Busca Avançada</td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr bgcolor="#CCCCCC">
            <td align="left"><label>
              <select name="select" class="txt_detalhes" id="select">
                <option>Selecione a marca</option>
                <option>Volkswagen</option>
                <option>Fiat</option>
                <option>Chevrolet</option>
                <option>Peugeot</option>
                <option>Renault</option>
              </select>
            </label></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><select name="select2" class="txt_detalhes" id="select2">
                <option>Selecione o ano</option>
                <option>2009</option>
                <option>2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
            </select></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><select name="select3" class="txt_detalhes" id="select3">
                <option>Selecione a faixa de preço</option>
                <option>mais de R$50.000,00</option>
                <option>entre R$30.000,00 e R$50.000,00 </option>
                <option>entre R$20.000,00 e R$30.000,00</option>
                <option>menos de R$20.000,00</option>
            </select></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><input name="button2" type="submit" class="bt_buscar" id="button2" value="buscar" /></td>
          </tr>

        </table></td>
      </tr>
    </table>
    <img src="imagens/vender.jpg" alt="vender" width="328" height="100" /></td>
  </tr>
  <tr>
    <td width="404" align="center" valign="top" bgcolor="#EFEFEF"><table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#EFEFEF">
        <tr>
          <td colspan="3" align="left" valign="top" class="titulos"><span class="txt_titulo_carro">&raquo;</span>Outros destaques</td>
        </tr>
        <tr>
          <td width="13%" align="center"><table width="100" border="0" cellspacing="0" cellpadding="4">
            <tr>
              <td width="22%" align="center" valign="middle" bgcolor="#CCCCCC"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="100" height="75" border="0" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><p><span class="txt_titulo_carro"><?php echo $row_RsOutrosDestaques['marca']; ?></span><br />
                      <span class="txt_detalhes"><?php echo $row_RsOutrosDestaques['acessorios']; ?><br />
                        <?php echo $row_RsOutrosDestaques['ano']; ?></span></p>
                <p><?php echo number_format($row_RsOutrosDestaques['preco'],"2",",","."); ?><br />
                    <span class="txt_ver_detalhes"><a href="ver.php">Ver detalhes</a></span></p></td>
            </tr>
          </table><?php ($row_RsOutrosDestaques = mysql_fetch_assoc($RsOutrosDestaques)); ?></td>
          <td width="13%" align="center"><table width="100" border="0" cellspacing="0" cellpadding="4">
            <tr>
              <td width="22%" align="center" valign="middle" bgcolor="#CCCCCC"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="100" height="75" border="0" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><span class="txt_titulo_carro"><?php echo $row_RsOutrosDestaques['marca']; ?></span><br />
                  <span class="txt_detalhes"><?php echo $row_RsOutrosDestaques['acessorios']; ?><br />
                  <?php echo $row_RsOutrosDestaques['ano']; ?></span><br />
                  <span class="txt_ver_detalhes"><a href="ver.php">Ver detalhes</a></span></td>
            </tr>
          </table>
          <?php ($row_RsOutrosDestaques = mysql_fetch_assoc($RsOutrosDestaques)); ?></td>
          <td width="13%" align="center"><table width="100" border="0" cellspacing="0" cellpadding="4">
            <tr>
              <td width="22%" align="center" valign="middle" bgcolor="#CCCCCC"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="100" height="75" border="0" /></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><span class="txt_titulo_carro"><?php echo $row_RsOutrosDestaques['marca']; ?></span><br />
                  <span class="txt_detalhes"><?php echo $row_RsOutrosDestaques['acessorios']; ?><br />
                  <?php echo $row_RsOutrosDestaques['ano']; ?></span><br />
                  <span class="txt_ver_detalhes"><a href="ver.php">Ver detalhes</a></span></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    <td width="340" align="left" valign="top" bgcolor="#EFEFEF"><table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#EFEFEF">
      <tr>
        <td class="titulos"><span class="txt_titulo_carro">&raquo;</span>Mais Ofertas</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="4" id="tabela_borda_baixo_cinza_escuro">
          <tr>
            <td><span class="txt_titulo_carro">&raquo;</span> <a href="ver.php"><span class="txt_ver_detalhes">Gol V - Ar, direção e vidros - 2008</span></a></td>
          </tr>
          <tr>
            <td><span class="txt_titulo_carro">&raquo;</span> <span class="txt_ver_detalhes"><a href="ver.php">Gol V - Ar, direção e vidros - 2008</a></span></td>
          </tr>
          <tr>
            <td><span class="txt_titulo_carro">&raquo;</span> <span class="txt_ver_detalhes"><a href="ver.php">Gol V - Ar, direção e vidros - 2008</a></span></td>
          </tr>
          <tr>
            <td><span class="txt_titulo_carro">&raquo;</span> <span class="txt_ver_detalhes"><a href="ver.php">Gol V - Ar, direção e vidros - 2008</a></span></td>
          </tr>
          <tr>
            <td><span class="txt_titulo_carro">&raquo;</span> <span class="txt_ver_detalhes"><a href="ver.php">Gol V - Ar, direção e vidros - 2008</a></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="right" class="txt_ver_detalhes">+ Ver todas as ofertas</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="97" colspan="2" bgcolor="#666666" class="titulos"><div align="center" class="rodape">Vadico Veículos Multimarcas<br />
      Av. Dep. Octávio Cabral, 165 - Itaguai - RJ
      
    Tel: 21-2688-3838</div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($RsOutrosDestaques);
?>
