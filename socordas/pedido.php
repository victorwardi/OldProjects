<?php require_once('Connections/socordas.php'); ?>
<?php
mysql_select_db($database_socordas, $socordas);
$query_fornecedor = "SELECT * FROM fornecedor ORDER BY nome ASC";
$fornecedor = mysql_query($query_fornecedor, $socordas) or die(mysql_error());
$row_fornecedor = mysql_fetch_assoc($fornecedor);
$totalRows_fornecedor = mysql_num_rows($fornecedor);

mysql_select_db($database_socordas, $socordas);
$query_Cliente = "SELECT * FROM cliente ORDER BY nome ASC";
$Cliente = mysql_query($query_Cliente, $socordas) or die(mysql_error());
$row_Cliente = mysql_fetch_assoc($Cliente);
$totalRows_Cliente = mysql_num_rows($Cliente);

mysql_select_db($database_socordas, $socordas);
$query_frete = "SELECT * FROM frete ORDER BY nome DESC";
$frete = mysql_query($query_frete, $socordas) or die(mysql_error());
$row_frete = mysql_fetch_assoc($frete);
$totalRows_frete = mysql_num_rows($frete);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style></head>

<body>
<table width="712" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <th width="708" scope="col"><table width="88%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <th width="18%" align="right" valign="top" scope="col"><img src="img/socordas.jpg" width="100" height="80" /></th>
        <th width="82%" align="left" valign="top" scope="col"><p><strong class="titulo">          S&Oacute; CORDAS REP COM MAT DE PESCA LTDA</strong><br />
          <span class="subtitulo">TEL/FAX: 22-2655  2575&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EMAIL:  SOCORDAS@SAQUAREMA.COM.BR&nbsp;&nbsp;&nbsp;&nbsp; </span><br />
  <br />
        </p></th>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th scope="row"><table width="708" border="0" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
      <tr>
        <th width="704" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th scope="row"><form id="form1" name="form1" method="post" action="">
          <table width="700" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <th colspan="4" align="left" valign="top" scope="col">Pedido:
                <label>
                <input name="textfield" type="text" size="15" maxlength="15" />
                </label></th>
            </tr>
            <tr>
              <th colspan="4" align="left" valign="top" scope="col">Fornecedor:                
                <label>
                <select name="fornecedor" id="fornecedor">
                  <option value="">- Selecione o Fornecedor -</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_fornecedor['nome']?>"><?php echo $row_fornecedor['nome']?></option>
                  <?php
} while ($row_fornecedor = mysql_fetch_assoc($fornecedor));
  $rows = mysql_num_rows($fornecedor);
  if($rows > 0) {
      mysql_data_seek($fornecedor, 0);
	  $row_fornecedor = mysql_fetch_assoc($fornecedor);
  }
?>
                </select>
                </label></th>
            </tr>
            <tr>
              <th colspan="4" align="left" valign="top" scope="col">Cliente: 
                <select name="cliente" id="cliente">
                  <option value="">- Selecione o Cliente -</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Cliente['nome']?>"><?php echo $row_Cliente['nome']?></option>
                  <?php
} while ($row_Cliente = mysql_fetch_assoc($Cliente));
  $rows = mysql_num_rows($Cliente);
  if($rows > 0) {
      mysql_data_seek($Cliente, 0);
	  $row_Cliente = mysql_fetch_assoc($Cliente);
  }
?>
                                </select></th>
              </tr>
            <tr>
              <th colspan="4" align="left" valign="top" scope="row">Endere&ccedil;o:
                <input name="textfield222" type="text" size="100" maxlength="100" /></th>
              </tr>
            <tr>
              <th width="206" align="left" valign="top" scope="row">CEP:
                <input name="textfield3" type="text" size="20" maxlength="20" /></th>
              <td width="442" align="left" valign="top">Tel:
                <input name="textfield32" type="text" size="20" maxlength="20" /></td>
              <td width="26" align="left" valign="top">&nbsp;</td>
              <td width="20" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <th align="left" valign="top" scope="row">CNPJ:
                <input name="textfield33" type="text" size="20" maxlength="20" /></th>
              <td align="left" valign="top">Inscr. Estadual: 
                <input name="textfield34" type="text" size="20" maxlength="20" /></td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <th align="left" valign="top" scope="row">Prazo:                
                <label>
                <select name="prazo" id="prazo">
                  <option value="">- Selecione -</option>
                  <option value="30 dias">30 dias</option>
                  <option value="35 dias">35 dias</option>
                  <option value="30/45 dias">30/45 dias</option>
                  <option value="30/45/60 dias">30/45/60 dias</option>
                  <option value="30/60/90 dias">30/60/90 dias</option>
                </select>
                </label></th>
              <td align="left" valign="top">Frete:                
                <select name="frete" id="frete">
                  <option value="">- Selecione o Frete -</option>
                  <option value="CIF">CIF</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_frete['nome']?>"><?php echo $row_frete['nome']?></option>
                  <?php
} while ($row_frete = mysql_fetch_assoc($frete));
  $rows = mysql_num_rows($frete);
  if($rows > 0) {
      mysql_data_seek($frete, 0);
	  $row_frete = mysql_fetch_assoc($frete);
  }
?>
                                </select></td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <th align="left" valign="top" scope="row">&nbsp;</th>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <th colspan="4" align="left" valign="top" scope="row"><table width="700" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <th width="43" align="center" valign="middle" scope="col">Item</th>
                  <th width="61" align="center" valign="middle" scope="col">Quant.</th>
                  <th width="41" align="center" valign="middle" scope="col">Und.</th>
                  <th width="377" align="center" valign="middle" scope="col">Produto</th>
                  <th width="57" align="center" valign="middle" scope="col"> Unit. </th>
                  <th width="95" align="center" valign="middle" scope="col">Total</th>
                </tr>
                <tr>
                  <th align="center" valign="middle" scope="row">1</th>
                  <td align="center" valign="middle"><input name="quant" type="text" id="quant" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="textfield53" type="text" size="5" maxlength="5" /></td>
                  <td align="center" valign="middle"><input name="textfield24" type="text" size="65" maxlength="65" /></td>
                  <td align="center" valign="middle"><input name="unit" type="text" id="unit" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="total" type="text" id="total" size="15" maxlength="10" value="" /></td>
                </tr>
                <tr>
                  <th align="center" valign="middle" scope="row">2</th>
                  <td align="center" valign="middle"><input name="quant" type="text" id="quant" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="textfield53" type="text" size="5" maxlength="5" /></td>
                  <td align="center" valign="middle"><input name="textfield24" type="text" size="65" maxlength="65" /></td>
                  <td align="center" valign="middle"><input name="unit" type="text" id="unit" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="total" type="text" id="total" size="15" maxlength="10" value="" /></td>
                </tr>
                <tr>
                  <th align="center" valign="middle" scope="row">3</th>
                  <td align="center" valign="middle"><input name="quant" type="text" id="quant" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="textfield53" type="text" size="5" maxlength="5" /></td>
                  <td align="center" valign="middle"><input name="textfield24" type="text" size="65" maxlength="65" /></td>
                  <td align="center" valign="middle"><input name="unit" type="text" id="unit" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="total" type="text" id="total" size="15" maxlength="10" value="" /></td>
                </tr>
                <tr>
                  <th align="center" valign="middle" scope="row">4</th>
                  <td align="center" valign="middle"><input name="quant" type="text" id="quant" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="textfield53" type="text" size="5" maxlength="5" /></td>
                  <td align="center" valign="middle"><input name="textfield24" type="text" size="65" maxlength="65" /></td>
                  <td align="center" valign="middle"><input name="unit" type="text" id="unit" size="10" maxlength="10" /></td>
                  <td align="center" valign="middle"><input name="total" type="text" id="total" size="15" maxlength="10" value="" /></td>
                </tr>
                
              </table></th>
              </tr>
            <tr>
              <th colspan="4" align="center" valign="top" scope="row"><table width="500" border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <th align="center" scope="col"><input type="submit" name="Submit" value="Salvar" /></th>
                  <th align="center" scope="col"><input type="submit" name="Submit2" value="Imprimir" /></th>
                  </tr>
              </table></th>
              </tr>
            
            <tr>
              <th align="left" valign="top" scope="row">&nbsp;</th>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table>
                </form>
        </th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($fornecedor);

mysql_free_result($Cliente);

mysql_free_result($frete);
?>
