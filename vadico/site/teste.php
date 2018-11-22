<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" id="form1" method="post" action="resultado.php">
<table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr bgcolor="#CCCCCC">
            <td align="left"><label>
              <select name="marca"  class="txt_detalhes" id="marca">
                <option value="">Selecione a marca</option>
                <option>Volkswagen</option>
                <option>Fiat</option>
                <option>Chevrolet</option>
                <option>Peugeot</option>
                <option>Renault</option>
              </select>
            </label></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><select name="ano" class="txt_detalhes" id="ano">
                <option value="">Selecione o ano</option>
                <option value="where ano = 2009">2009</option>
                <option value="where ano = 2008">2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
            </select></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><select name="preco" class="txt_detalhes" id="preco">
                <option value="">Selecione a faixa de preço</option>
                <option value="where preco > 50000.00">mais de R$50.000,00</option>
                <option value="WHERE preco BETWEEN '30000.00' AND '50000.00'">entre R$30.000,00 e R$50.000,00 </option>
                <option value="WHERE preco BETWEEN '20000.00' AND '30000.00'">entre R$20.000,00 e R$30.000,00</option>
                <option value="WHERE preco < 20000.00">menos de R$20.000,00</option>
            </select></td>
          </tr>
          <tr bgcolor="#CCCCCC">
            <td align="left"><input name="button2" type="submit" class="bt_buscar" id="button2" value="buscar" /></td>
          </tr>

        </table>
        </form>

</body>
</html>
