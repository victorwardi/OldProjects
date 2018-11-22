<?php
function storeAddress() {
  $message = "&nbsp;";
  // Check for an email address in the query string
  if( !isset($_GET['address']) ){
    // No email address provided
  }
  else {
    // Get email address from the query string
    $address = $_GET['address'];
    // Validate Address
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $address)) {
      $message = "<strong>Erro</strong>: Email invalido.";
    }
    else {
$key = $address;
//load file into $fc array
$fc=file("lista_email.txt");
//open same file and use "w" to clear file
$f=fopen("lista_email.txt","w");
//loop through array using foreach
foreach($fc as $line)
{
     if (!strstr($line,$key)) //look for $key in each line
           fputs($f,$line); //place $line back in file
}
fclose($f);
$myFile = "lista_email.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, $address);
$stringData = ";\n";
fwrite($fh, $stringData);
fclose($fh);

      if(mysql_error()){
        $message = "<strong>Error</strong>: Ocorreu um erro, tente novamente!";
      }
      else {
        $message = "Email inserido! Obrigado!";
      }
    }
  }
  return $message;
}
?>