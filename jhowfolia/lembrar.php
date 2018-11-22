<?PHP
$nome_webmaster = "Michelle";
$email_do_webmaster = "msantana@bago.com.br";
$nomedosite = "Laboratórios Bagó";
$linkdosite = "http://www.bago.com.br";

if ($submit){
if (!$email){
     $erro = "O E-mail esta em Branco !!";
   } else if (strpos ($email, "@")) {
     $email = $email;
   } else {
     $erro = "Desculpe!, mais o seu email esta invalido!!";
   }

   if (!$erro){
       $conectar = mysql_connect("localhost", "jhow","") or die (mysql_error());
       mysql_select_db($database, $conectar);

       $sql = mysql_query("SELECT * FROM user WHERE email='$email'");
       $total = mysql_num_rows($sql);

       if ($total == 1){
       while($l = mysql_fetch_array($sql)) {

       $enviar = "Lembrar Senha!!! ".$nomedosite."\n";
       $enviar .= $l[usuario];
       $enviar .= "\n";
       $enviar .= $l[senha];
       }
       $enviar .= "\n";
       $enviar .= "Obrigado!!\n\n Abraços do WebMaster: ".$nome_webmaster."\n\n";
       $enviar .= "                      ".$linkdosite."\n";
       $enviar .= " \n";
       $enviar .= "        Webmaster: ".$email_do_webmaster."\n";

       mail("$email", "[$nomedosite][Lembrar Senha]", $enviar,"From: $email_do_webmaster <$nomedosite>\n");

       $erro = "Sua senha foi enviada para sua conta de email com sucesso! Obrigado !";

       }else{

       $erro = "Desculpe! Seu e-mail não esta cadastrado em nosso site ou Talves você tenha se cadastrado com outro          email! ";
       }
   }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


           <form name="frm1" action="<?  echo $PHP_SELF; ?>" method="POST">
            
            <? if ($erro){ echo $erro; } ?>
            <label for="nome" class="texto" style="width: 300px; border: solid 0px">E-mail</label><BR>
            <input type="text" name="email" style="form_campo" size="50"><BR><BR>
        
              <INPUT TYPE="submit" NAME="submit" VALUE="EnviaEmail">
              </form>
</body>
</html>
