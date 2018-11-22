<?php
require('class.mysql.php');
require('config.inc.php');

if($_POST['Submit']){
	$nick = $_POST['nick'];
	
	if(substr_count($nick,' ') == strlen($nick)){
		$erro = 'Apelido não pode conter somente espaços em branco.';
	}else{
		//evitando problemas com javascript ',"",(,),|
		$nick = str_replace('"',' ',$nick);
		$nick = str_replace(';','',$nick);
		$nick = str_replace('(','',$nick);
		$nick = str_replace(')','',$nick);
		$nick = str_replace("'"," ",$nick);
		$nick = str_replace('|','',$nick);
		$nick = sql_inject($nick);
		
		$sql = new Mysql;
		//deleta usuarios sem atividade
		$sql->Consulta("DELETE FROM $tabela_usu WHERE tempo < $tempovida");
		//deleta mensagens antigas
		$sql->Consulta("DELETE FROM $tabela_msg  WHERE tempo < $tempovida"); 
		
		//total de usuários online
		$totalonline  = $sql->Totalreg("SELECT COUNT(*) FROM $tabela_usu");
		if($totalonline == 0){
			include('deletarimg.php');
		}
				
		//verificando se ja tem este nick
		$total  = $sql->Totalreg("SELECT COUNT(*) FROM $tabela_usu WHERE nick='$nick'");			
		if($total > 0){
			$erro = 'Este apelido ja está em uso.';
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
			//insere usuário
			$sql->Consulta("INSERT INTO $tabela_usu
			(nick,frase,cor,ip,tempo)
			VALUES 
			('$nick','','#006699','$ip','$tempo_usu')"); 
			//insere no chat
			$sql->Consulta("INSERT INTO $tabela_msg
			(reservado,usuario,cor,msg,falacom,tempo)
			VALUES 
			('0','$nick','#006699','entrou na sala.','Todos','$tempo_msg')"); 
			//inicia a sessao
			session_start();
			$_SESSION[usu_nick] = $nick;
			//redireciona
			header('Location:principal.php'); 
		}	
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Chat Costa Verde Fm</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function desabilita(){
	document.form1.Submit2.disabled = true;
	//document.form1.Submit.value = 'Enviando...';
}

</script>
<style type="text/css">
<!--
.style2 {color: #666666}
-->
</style>
</head>
<body>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="338" border="0" cellspacing="0" cellpadding="5" class="borda">
    <tr> 
      <td height="71"><img src="logos/chat.jpg" width="350" height="175"></td>
    </tr>
    <tr> 
      <td height="28" align="center" class="texto11"><?=$erro;?></td>
    </tr>
    <tr> 
      <td height="58" align="center"> <form name="form1" method="post" action="index.php" onSubmit="desabilita()">
          <table width="176" border="0" cellspacing="2" cellpadding="0" class="texto11">
            <tr> 
              <td width="29">Apelido:</td>
              <td width="93"> <input type="text" name="nick" class="form" size="15" maxlength="20"> 
              </td>
              <td width="72"><input type="submit" name="Submit2" value="Entrar" class="form">
              </td>
            </tr>
          </table>
          <input type="hidden" name="Submit" value="1">
      </form></td>
    </tr>
    <tr>
      <td height="5">&nbsp;</td>
    </tr>
    <tr> 
      <td height="14" align="center"><p>&nbsp;</p>
      </td>
    </tr>
  </table>
  <p> 
  </p>
</div>
</body>
</html>

