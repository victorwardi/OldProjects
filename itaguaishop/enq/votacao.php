<?php

// Esta linha abaixo tem a função de verificar se a enquete foi votada e prossegue em frente no caso de verdade 
if ($escolha != "") { 

// Abaixo segue os parâmetros para conexão com o DB
$mysql_host = "localhost"; // local do servidor MySQL
$mysql_user = "root"; // usuário do MySQL
$mysql_pass = ""; // senha do usuário do MySQL
$mysql_dtbs = "shop"; // base de dados onde a tabela foi criada

$num_resp = "4"; // número de opções na tua votação
$pergunta = "O que voce esta achando do site do Itaguaí Shopping Center?"; // pergunta da votação

// A partir daqui você nõ mexe mais em nada, mas tem tudo passo-a-passo para que serve cada linha

$mysql_conx = mysql_connect($mysql_host,$mysql_user,$mysql_pass);
// conexão com o MySQL

$radio = $num_resp + 1;
// para uso posterior

mysql_select_db($mysql_dtbs);
// seleciona a base de dados

//Atualização da base de dados

$query_upd = "SELECT * FROM votacao WHERE id=$escolha";
$resul_upd = mysql_query($query_upd);
// aqui o PHP selecciona apenas os registos que coincidem com a escolha, no nosso caso apenas uma opção


$obj_upd = mysql_fetch_object($resul_upd);
// o comando mysql_fetch_object() separa os resultados de uma query por colunas
// neste caso, $obj_upd -> descrição da opção que o usuário votou

$vot_upd = $obj_upd->votos;
$vot_upd++;
// separa só os votos e adicinona mais um voto

$upd_upd = "UPDATE votacao SET votos=$vot_upd WHERE id=$escolha";
mysql_query($upd_upd);
// atualizou a base de dados

// Agora o PHP fará a pesquisa na base de dados e retornará as opções, seus votos respectivos, o total de votos //até o momento e a escolha do usuário


echo "<H2>" . $pergunta . "</H2>";

for($i=1;$i<$radio;$i++) {

$query[$i] = "SELECT * FROM votacao WHERE id=$i";
$resul[$i] = mysql_query($query[$i]);
$objet[$i] = mysql_fetch_object($resul[$i]);

echo "<FONT FACE=\"Verdana\" SIZE=\"1\"><B>" . $objet[$i]->opcao . "</B> " . $objet[$i]->descricao . "<B> " . $objet[$i]->votos . "</B><BR>";

$tot_vt += $objet[$i]->votos;

// tudo isto serve para requisitar o resultado de cada opção e exibir na tela

}
echo "<FONT SIZE=\"1\"><B>Total de votos:</B>" . $tot_vt . "&nbsp;&nbsp;&nbsp;<B>Sua Escolha</B>:" . $escolha . "</FONT></FONT>";
}
?>

