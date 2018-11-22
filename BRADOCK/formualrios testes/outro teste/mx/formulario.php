<?php

/*A variável $mensagem recebe os dados da array. Repare que estamos concatenando de acordo com o formato que
queremos receber no email. O \n é uma quebra de linha. */
$mensagem = "Nome: ".$_POST[’nome’]." \n";
$mensagem .= "Email: ".$_POST[’email’]." \n";
$mensagem .= "Email: ".$_POST[’assunto’]." \n";
$mensagem .= "Descrição:". $_POST[’mensagem’];
/*
Função Mail:
Primeiro parâmetro: Coloque o email que vai receber os dados do formulário;
Segundo parâmetro: Coloque o titulo do email;
Terceiro parâmetro: Os dados do formulário.
*/
mail("ricardo_saqua@hotmail.com", "Formulário - MX Studio", $mensagem);

/*
Mensagem que será impressa na tela após o envio do formulário.
*/
echo "<h1>Enviado com Sucesso!</h1>";
echo "<h1>Em breve entraremos em contato.</h1>";
?>
