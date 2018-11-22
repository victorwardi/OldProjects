<?php
/*
----------------------------------------------------------------------
Arquivo .............: AJAX + PHP                                     
Desenvolvido por ....: Júlio César Martini                            
Matéria .............: Artigo 127 - www.imasters.com.br               
Criado em  ..........: 14/03/2006                                     
----------------------------------------------------------------------
*/

//CONECTA AO MYSQL                                       
$conn = mysql_connect("localhost", "root", "582041")    
          or die("Erro na conexão com a base de dados"); 

//SELECIONA A BASE DE DADOS                
$db = mysql_select_db("socordas", $conn)   
         or die("Erro na seleção da base de dados");  
?>