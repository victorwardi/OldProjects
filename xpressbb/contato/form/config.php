<?
# Utiliza Classe - phpmail()
include("email.class.php");

/*
* Configura��es do formul�rio de Contato
* Altere a variavel $mail_destino e $email_nome, coloque seu email e seu nome
* 
*/

# Seu email, para onde ir�o as informa��es do formul�rio
$email_destino	= "saquabb@hotmail.com";

# Seu nome, este aparecer� na linha 'De:' do email;
$nome_destino		= "Victor Saquabb.";

# Campos Obrigat�rios
# Colocar o "name" dos campos separados por v�rgula -  Ex:'Estado','Nome','Email'
# Aten��o, este metodo diferencia mai�sculas de min�sculas,
# entao se no formul�rio est� name="Nome", voc~e dever� usar 'Nome' no array tamb�m.
$campos_obrigatorios = array('Nome','Email','Mensagem');

# Define se enviar� emails usando autentica��o SMTP
$usar_smtp = 0; # 0 - N�o usar� - 1 - Usar� autentica��o (Caso marque este �tem, ter� que informar os dados no arquivo email.class.php)

# Mensagem para o email de resposta
$msg_resposta	= "<font face=\"Verdana\" size=2>Ol� ! Recebemos o seu email. Entraremos em contato o mais r�pido poss�vel. <br> Obrigado !<br><p>$nome_destino</p></font>";

$app_autor 	= 'victor Caetano';
$app_nome	= 'Formul�rio de Contato 2.0';
$app_link	= '<a href="http://www.apoena.net/demoscripts/form/contato.php">www.apoena.net</a>'
?>