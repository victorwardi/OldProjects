<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$msg = "<font face=’Verdana’ size=’1′><b>Nome:</b> \t$nome</font><br>";
$msg .= "<font face=’Verdana’ size=’1′><b>E-mail:</b> \t$email</font><br>";
$msg .= "<font face=’Verdana’ size=’1′><b>Mensagem:</b> \t$mensagem</font>";

$mensagem = "$msg";
$remetente = "$email";
$destinatario = "ricardo_saqua@netterra.com.br	";
$assunto = "Tutorial de Formulário BrunoDulcetti.com";
$headers = "From: ".$remetente."\nContent-type: text/html"; # o ‘text/html’ é o tipo mime da mensagem
if(!mail($destinatario,$assunto,$mensagem,$headers)){
print "falha no envio da mensagem";
} else {
echo "<script>window.location.href=index.html</script>";
}
?>	