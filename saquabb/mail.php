<?php require_once('Connections/saquabb.php'); ?>
<?php
mysql_select_db($database_saquabb, $saquabb);
$query_Recordset1 = "SELECT * FROM `user`";
$Recordset1 = mysql_query($query_Recordset1, $saquabb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="51">&nbsp;</td>
      <td width="449"><input name="textfield" type="text" size="50" maxlength="50" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="textfield2" type="text" size="50" maxlength="50" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><textarea name="textarea" cols="50" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
