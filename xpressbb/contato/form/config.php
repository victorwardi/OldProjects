<?
# Utiliza Classe - phpmail()
include("email.class.php");

/*
* Configurações do formulário de Contato
* Altere a variavel $mail_destino e $email_nome, coloque seu email e seu nome
* 
*/

# Seu email, para onde irão as informações do formulário
$email_destino	= "saquabb@hotmail.com";

# Seu nome, este aparecerá na linha 'De:' do email;
$nome_destino		= "Victor Saquabb.";

# Campos Obrigatórios
# Colocar o "name" dos campos separados por vírgula -  Ex:'Estado','Nome','Email'
# Atenção, este metodo diferencia maiúsculas de minúsculas,
# entao se no formulário está name="Nome", voc~e deverá usar 'Nome' no array também.
$campos_obrigatorios = array('Nome','Email','Mensagem');

# Define se enviará emails usando autenticação SMTP
$usar_smtp = 0; # 0 - Não usará - 1 - Usará autenticação (Caso marque este ítem, terá que informar os dados no arquivo email.class.php)

# Mensagem para o email de resposta
$msg_resposta	= "<font face=\"Verdana\" size=2>Olá ! Recebemos o seu email. Entraremos em contato o mais rápido possível. <br> Obrigado !<br><p>$nome_destino</p></font>";

$app_autor 	= 'victor Caetano';
$app_nome	= 'Formulário de Contato 2.0';
$app_link	= '<a href="http://www.apoena.net/demoscripts/form/contato.php">www.apoena.net</a>'
?>