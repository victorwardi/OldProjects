<?php

// Esta linha abaixo tem a fun��o de verificar se a enquete foi votada e prossegue em frente no caso de verdade 
if ($escolha != "") { 

// Abaixo segue os par�metros para conex�o com o DB
$mysql_host = "localhost"; // local do servidor MySQL
$mysql_user = "root"; // usu�rio do MySQL
$mysql_pass = ""; // senha do usu�rio do MySQL
$mysql_dtbs = "shop"; // base de dados onde a tabela foi criada

$num_resp = "4"; // n�mero de op��es na tua vota��o
$pergunta = "O que voce esta achando do site do Itagua� Shopping Center?"; // pergunta da vota��o

// A partir daqui voc� n� mexe mais em nada, mas tem tudo passo-a-passo para que serve cada linha

$mysql_conx = mysql_connect($mysql_host,$mysql_user,$mysql_pass);
// conex�o com o MySQL

$radio = $num_resp + 1;
// para uso posterior

mysql_select_db($mysql_dtbs);
// seleciona a base de dados

//Atualiza��o da base de dados

$query_upd = "SELECT * FROM votacao WHERE id=$escolha";
$resul_upd = mysql_query($query_upd);
// aqui o PHP selecciona apenas os registos que coincidem com a escolha, no nosso caso apenas uma op��o


$obj_upd = mysql_fetch_object($resul_upd);
// o comando mysql_fetch_object() separa os resultados de uma query por colunas
// neste caso, $obj_upd -> descri��o da op��o que o usu�rio votou

$vot_upd = $obj_upd->votos;
$vot_upd++;
// separa s� os votos e adicinona mais um voto

$upd_upd = "UPDATE votacao SET votos=$vot_upd WHERE id=$escolha";
mysql_query($upd_upd);
// atualizou a base de dados

// Agora o PHP far� a pesquisa na base de dados e retornar� as op��es, seus votos respectivos, o total de votos //at� o momento e a escolha do usu�rio


echo "<H2>" . $pergunta . "</H2>";

for($i=1;$i<$radio;$i++) {

$query[$i] = "SELECT * FROM votacao WHERE id=$i";
$resul[$i] = mysql_query($query[$i]);
$objet[$i] = mysql_fetch_object($resul[$i]);

echo "<FONT FACE=\"Verdana\" SIZE=\"1\"><B>" . $objet[$i]->opcao . "</B> " . $objet[$i]->descricao . "<B> " . $objet[$i]->votos . "</B><BR>";

$tot_vt += $objet[$i]->votos;

// tudo isto serve para requisitar o resultado de cada op��o e exibir na tela

}
echo "<FONT SIZE=\"1\"><B>Total de votos:</B>" . $tot_vt . "&nbsp;&nbsp;&nbsp;<B>Sua Escolha</B>:" . $escolha . "</FONT></FONT>";
}
?>

