<?php require_once('../Connections/ConBD.php'); ?>
<?php
$fabrica=$_GET["fabricaID"];
$cliente=$_GET["cliente"];

mysql_select_db($database_ConBD, $ConBD);

$sql="SELECT p.numeroPedido, f.fabricaID FROM pedido p INNER JOIN fabrica f ON f.fabricaID=p.fabricaID WHERE p.fabricaID = '".$fabrica."' ORDER BY p.numeroPedido DESC LIMIT 0,1";


$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
 {
 

$numeroAntigo = $row['numeroPedido'];
$numeroNovo = $numeroAntigo + 1;

 // Numero do Pedido - hidden 
 
 echo "<input type='hidden' name='fabricaID' id='fabricaID' value='".$fabrica."' /> ";
 echo "<input type='hidden' name='clienteID'  id='clienteID' value='".$cliente."' />";
 echo "<input type='hidden' name='numeroPedido' value='".$numeroNovo."' />";
 }
mysql_free_result($result);
?>
