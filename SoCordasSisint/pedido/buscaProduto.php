<?php require_once('../Connections/ConBD.php'); ?>
<?php
$q=$_GET["q"];
$id=$_GET["numero"];
$pedido=$_GET["pedidoID"];
mysql_select_db($database_ConBD, $ConBD);

$sql="SELECT * FROM produto WHERE produtoID = '".$q."'";

$result = mysql_query($sql);
 echo "<table width='680' border='0' cellpadding='4' cellspacing='0' >";
while($row = mysql_fetch_array($result))
 {
 // Numera os itens
 $item = $id -1;
  
 //Alterna as cores das linhas
 $class = "linha1";
 if($item%2 == 0){
 $class = "linha2"; 
 }
 
 
 echo "<tr>";

 echo "<th width='30' class='".$class."'>".$item. "</th>";
 
	// ID - hidden 
 echo "<input type='hidden' name='produtoID_".$item."' id='produtoID_".$item."' value='". $row['produtoID'] ."' size='7' />"; 
 
	// PedidoID - hidden  
// echo "<input type='hidden' name='pedidoID' id='pedidoID' value='".$pedido."' size='7' />";
 
 // Quantidade
 echo "<th width='40' class='".$class."'><input class='".$class."' type='text' name='quantidade_".$item."' id='quantidade_".$item."' value='0' size='3' onkeyup='calculaTotalProduto();'  /></th>";
 
  // Unidade
 echo "<th width='30' class='".$class."'><input class='".$class."' type='text' name='unidade_".$item."' id='unidade_".$item."' value='". $row['unidade'] ."' size='3' readonly='readonly'/></th>";
 
 // Nome
  echo "<th width='250' class='".$class."'><input class='".$class."' type='text' name='nome_".$item."' id='nome_".$item."' value='". $row['nome'] ."' size='25' readonly='readonly' /></th>";
  
    // Preco
  echo "<th width='80' class='".$class."'><input class='".$class."' type='text' name='preco_".$item."' id='preco_".$item."' value='". $row['preco'] . "' size='5' readonly='readonly' /></th>";
  
  // Desconto Real
  echo "<th width='80' class='".$class."'><input class='".$class."' type='text' name='descontoReal_".$item."' id='descontoReal_".$item."' value='0.00' size='5' onkeyup='calculaTotalProduto();' /></th>";
  
   // Desconto %
  echo "<th width='80' class='".$class."'><input class='".$class."' type='text' name='descontoPorCento_".$item."' id='descontoPorCento_".$item."' value='0.00' size='5'onkeyup='calculaTotalProduto();' /></th>";
  
    // Total
  echo "<th width='100' class='".$class."'><input class='".$class."' type='text' name='total_".$item."' id='total_".$item."' value='0.00' size='10' readonly='readonly'/></th>";
  
  
   
  
 echo "</tr>";
 echo "<input type='hidden' name='kt_pk_itempedido_".$item."' class='id_field' value='KT_NEW' />";
 //echo " <input type='hidden' name='pedidoID_".$item."' id='pedidoID_".$item."' value='".$pedido."'/>";
 }
 echo "<input type='hidden' id='linha_".$item."' value='".$item."'>";
 echo "</table>";
echo "<div id='novoProduto_".$id."'></div>";


mysql_free_result($result);
?>
