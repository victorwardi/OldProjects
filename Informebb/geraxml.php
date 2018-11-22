<?php
  //conectando ao mysql
  $conn = @mysql_connect("localhost", "infobb_infobb","info2000");  
  $db   = @mysql_select_db("infobb_infobb", $conn);

  //Selecionando todos os registros da tabela tickers
  $sql = "SELECT * FROM `foto_destaque` ORDER BY `id` DESC Limit 1";

  //Executando a instrução sql
  $sql  = @mysql_query($sql);

  //Pegando o numero de registros
  $rst = mysql_num_rows($sql);

  //Se tiver algum registro
  if($rst > 0) {

        //Abre/cria o arquivo tickers.xml com permissão para escrever
    $xml = fopen("destaque.xml", "w");

    //Escreve o cabeçalho e o primeiro nó do xml
    fwrite($xml, "");
	fwrite($xml, "\r\n");
    

    //Para cada registro que tiver
       $imagem = utf8_encode(mysql_result($sql,$i,"arquivo"));
     

    for($i=0; $i<$rst; $i++) {

      //Pegamos o valor de cada registro
         //Guardamos na variavel $conteudo as tags e os valores do xml
          
         $conteudo .= "	<item imagem=\"uploads/fotos/$imagem\"/>";
         
              //Escrevendo no tickers.xml
      fwrite($xml, $conteudo);
    }

    
    //Fechando o arquivo
    fclose($xml);    

  }
?>