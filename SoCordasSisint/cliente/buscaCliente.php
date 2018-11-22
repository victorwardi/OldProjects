<?php require_once('../Connections/ConBD.php'); ?>
<?php
$cliente=$_GET["cliente"];

mysql_select_db($database_ConBD, $ConBD);

$sql="SELECT * FROM cliente WHERE nome LIKE '%".$cliente."%'";

$result = mysql_query($sql);

$item = "2";


//if($resultado == ""){

//	echo "Nao foi encontrado!";
	
//	}else{

	echo "<table width='100%' border='0' cellpadding='4' cellspacing='0' id='tabelaSemLinha'>";
 	echo "<tr>";
    echo "<td colspan='3' align='left' valign='middle' bgcolor='#336699' class='titulo_tabela'>Resultado da Consulta</td>";
    echo "</tr>";
	echo "<tr>";
    echo "<td width='50%'  class='linha1'><div align='left'>Nome</div></td>";
	echo "<td width='30%' align='center' class='linha1'><div align='center'>Munic&iacute;pio - Estado</div></td>";
	echo "<td width='20%' align='center' class='linha1'><div align='center'>A&ccedil;&otilde;es</div></td>";
	echo "</tr>"; 

while($row = mysql_fetch_array($result))
 {
 

   
	 //Alterna as cores das linhas
	 $class = "linha1";
	 if($item%2 == 0){
 	$class = "linha2"; 
 	}
	echo "<tr>";
	
	// Nome do Cliente
	echo  "<td class='".$class."'><div align='left' class='texto'>". $row['nome'] ."</div></td>";
	
	// Municipio e Estado	
	echo "<td class='".$class."'><div align='center' class='texto'>". $row['municipio'] ." - ". $row['UF'] ."</div></td>";
	
	// Acoes
	echo "<td class='".$class."'><div align='center'><a href='visualizar.php?clienteID=". $row['clienteID'] ."'><img src='../img/ver.png' alt='Ver' 					width='20' height='20' border='0' /></a>&nbsp;&nbsp;<a href='inserir.php?clienteID=". $row['clienteID'] ."'><img src='../img/editar.png' alt='Editar' width='20' height='20' border='0' /></a></div></td>";
              
    
 echo "</tr>";
 
 $item++;
 
 }
 
 echo "</table>";
//}
mysql_free_result($result);
?>
