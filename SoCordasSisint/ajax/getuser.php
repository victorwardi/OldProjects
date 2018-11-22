<?php require_once('../Connections/ConBD.php'); ?>
<?php
$q=$_GET["q"];
$id=$_GET["numero"];
mysql_select_db($database_ConBD, $ConBD);

$sql="SELECT * FROM produto WHERE produtoID = '".$q."'";

$result = mysql_query($sql);
 echo "<table width='410' border='0' cellpadding='4' cellspacing='0' >";
while($row = mysql_fetch_array($result))
 {
 $item = $id -1;
 $cor = "#333333";
 if($item%2 == 0){
  $cor = "#666666"; 
 }
 echo "<tr>";
 echo "<th width='30' bgcolor='".$cor."'>".$item. "</th>";
 echo "<th width='300' bgcolor='".$cor."'>" . $row['nome'] . "</th>";
 echo "<th width='80' bgcolor='".$cor."'>". $row['preco'] . "</th>";
 
 echo "</tr>";
 }
 echo "<input type='hidden' id='linha_".$item."' value='".$item."'>";
 echo "</table>";
echo "<div id='novoProduto_".$id."'></div>";


mysql_free_result($result);
?>
