<?php
include("phpmailer.class.php");

class Email extends phpmailer{
	
	var $conteudo;		// Conteúdo do Email
	var $obrigatorios;	// Campos obrigatórios
	
	var $msg;			// Mensagem de Sucesso
	var $erro;			// Erros 
	
	function Email($use_smtp = 0){
		if($use_smtp == 1){
			$this->IsSMTP();	 					# Seta o uso de SMTP
		}
		$this->Host 		= "mail.seudominio.com"; 	# SMTP server
		$this->SMTPAuth 	= true; 					# SMTP Autenticado
		$this->Username 	= "seu_usuario"; 			# User do SMTP
		$this->Password 	= "sua_senha"; 				# senha
		$this->IsHTML(true);
		$this->WordWrap = 60;
		
	}
	
	# Seta campos obrigatorios
	function set_obrigatorios($array){
		$this->obrigatorios = $array;
	}
	
	# Testa todos os valores vindos do formuário
	function testa_valores($form_vars){
		$ok = 0;
		foreach ($form_vars as $key => $value){
    		if (!isset($key) || ($value == "")){ 
    	    	//echo $key." Está vazio <br>";
        		//return false;
				if($this->valida($key)){
					$ok = 1;
				}
				
	    	}
			//echo '<b>Campo</b> = '.$key;
			//echo '<br><b>Valor</b> = '.$value;
			//echo '<hr>';
			if($key != 'submit'){
				$this->conteudo .= '<b>'.$key.': </b>'.$value.'<br>'."\n";
			}
  		}
		if($ok == 1){
			return false;
		}
 	 	return true;
	}
	
	# Valida Campos
	function valida($campo){
		# Se não for vazio retorna falso
		if($_POST[$campo] != ''){
			return true;
		}
		# Se for vazio, compara com array de campos obrigatórios
		$num = sizeof($this->obrigatorios);
		for($i = 0; $i <= $num ;$i++){
			if($campo == $this->obrigatorios[$i]){
				$this->erro .= sprintf('Campo <b>%s</b> é obrigatório.<br>', $campo);
				return false;
			}
		}
	}
	
	function envia($tipo = ''){
		if($this->erro != ''){
			return false;
		}
		
		$this->AltBody = strip_tags($this->conteudo); 	# Conteudo versão texto
		$this->Body = $this->conteudo; 					# Conteudo versão html
		
		if(!$this->Send()){
		    $this->ClearAddresses();
		    $this->ClearAttachments();
			
			$this->erro .= sprintf('Erro ao enviar email.<br>');
			return false;
		}
		else{
		    $this->ClearAddresses();
		    $this->ClearAttachments();
			
			if($tipo != 'reply'){
				$this->msg .= sprintf('<b>%s</b>, sua mensagem foi enviada com sucesso.<br>',$this->FromName);
			}
			return true;
		}
	}
	
	function mostra_msg(){
		# mensagem de Erro de sucesso
		if($this->erro != ''){
			$this->erro =  '<font face="Verdana" color="red" size="2">'.$this->erro.'</font>';
		}
		if($this->msg != ''){
			$this->msg =  '<font face="Verdana" color="#000000" size="2">'.$this->msg.'</font>';
		}
	}
	
	function msg_resposta($mensagem, $nome = '', $email = ''){
		
		# Seta os campos para envio
		$this->From 		= $email;				 		# Email de Remetente
		$this->FromName 	= $nome;						# Nome Remetente
		$this->AddAddress($_POST['Email'], $_POST['Nome']); # Email Destino
		$this->Subject 	= 'Recebemos seu email!';			# Assunto
		
		$this->conteudo = $mensagem; 
		# Envia Email
		$this->envia('reply');
	}
}
?>