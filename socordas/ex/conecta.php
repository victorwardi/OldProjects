<?php
/*
----------------------------------------------------------------------
Arquivo .............: AJAX + PHP                                     
Desenvolvido por ....: J�lio C�sar Martini                            
Mat�ria .............: Artigo 127 - www.imasters.com.br               
Criado em  ..........: 14/03/2006                                     
----------------------------------------------------------------------
*/

//CONECTA AO MYSQL                                       
$conn = mysql_connect("localhost", "root", "582041")    
          or die("Erro na conex�o com a base de dados"); 

//SELECIONA A BASE DE DADOS                
$db = mysql_select_db("socordas", $conn)   
         or die("Erro na sele��o da base de dados");  
?>