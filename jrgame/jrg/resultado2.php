<?php require_once('Connections/victor.php'); ?>
<?php
$colname_filme = "-1";
if (isset($_GET['busca'])) {
  $colname_filme = (get_magic_quotes_gpc()) ? $_GET['busca'] : addslashes($_GET['busca']);
}
mysql_select_db($database_victor, $victor);
$query_filme = sprintf("SELECT * FROM filme WHERE titulo = '%s' ORDER BY id ASC", $colname_filme);
$filme = mysql_query($query_filme, $victor) or die(mysql_error());
$row_filme = mysql_fetch_assoc($filme);
$totalRows_filme = mysql_num_rows($filme);
?><? 

if(!empty($HTTP_POST_VARS['busca'])) { 
   $busca = str_replace(" ", "%", $HTTP_POST_VARS[busca]); // Altera os espaços adicionando no lugar o simbolo % 
   $qr = "SELECT * FROM filme WHERE titulo LIKE '%".$busca."%' ORDER BY id DESC"; // definimos para buscar no campo1 e ordenar pelo campo que você quiser.
   $sql = mysql_query($qr) or die (mysql_error()); // Executa a query no Banco de Dados 
   $total = mysql_num_rows($sql); // Conta o total ded resultados encontrados 
   echo "Sua busca retornou <b>$total</b> resultados.<br>\n"; // mostra quantos resultados retornou e logo depois exibe
   while ($dados = mysql_fetch_array($sql)) {
$campo1 = $dados["titulo"];
              $campo2 = $dados["genero"];
              $campo3 = $dados["elenco"];

echo "($titulo) - <a href='$genero'>$elenco</a><br>";
   } 
} 
?>
<?php
mysql_free_result($filme);
?>