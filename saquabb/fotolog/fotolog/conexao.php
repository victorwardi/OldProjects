<?php
$usuario = "root";
$senha = "582041";
$db = "fotolog";
$error_conexao = "N�o foi poss�vel conectar ao Banco de Dados!";
$conexao = mysql_connect("localhost",$usuario,$senha) or die($error_conexao);
mysql_select_db($db) or die($error_conexao);
?>
